"""Read-only crawl of every sitemap URL; modest concurrency, public metadata only."""
import collections,concurrent.futures,csv,html,json,pathlib,subprocess,xml.etree.ElementTree as ET
from html.parser import HTMLParser
from publish import ROOT
BASE='https://n.horecagroup.sk'
class Page(HTMLParser):
 def __init__(self):
  super().__init__();self.title=[];self.h1=[];self.words=[];self.in_title=False;self.in_h1=False;self.skip=0;self.meta={};self.canonical='';self.h1_count=0
 def handle_starttag(self,tag,attrs):
  a=dict(attrs)
  if tag in ('script','style'):self.skip+=1
  if tag=='title':self.in_title=True
  if tag=='h1':self.in_h1=True;self.h1_count+=1
  if tag=='meta':self.meta[a.get('name',a.get('property','')).lower()]=a.get('content','')
  if tag=='link' and a.get('rel')=='canonical':self.canonical=a.get('href','')
 def handle_endtag(self,tag):
  if tag in ('script','style'):self.skip=max(0,self.skip-1)
  if tag=='title':self.in_title=False
  if tag=='h1':self.in_h1=False
 def handle_data(self,data):
  if self.in_title:self.title.append(data)
  if self.in_h1:self.h1.append(data)
  if not self.skip:self.words.extend(data.split())
def fetch(url):
 if not url.startswith(BASE+'/'):raise RuntimeError('Unexpected sitemap origin')
 p=subprocess.run(['curl','-sS','-L','--max-redirs','5','--max-time','20','--max-filesize','3000000','-w','\n%{http_code}\t%{url_effective}',url],capture_output=True,text=True)
 if p.returncode:return {'url':url,'status':'curl-'+str(p.returncode)}
 body,_,last=p.stdout.rpartition('\n');status,_,effective=last.partition('\t')
 page=Page();page.feed(body)
 return dict(url=url,status=status,effective=effective,title=' '.join(page.title).strip(),description=page.meta.get('description',''),h1=' '.join(page.h1).strip(),h1_count=page.h1_count,canonical=page.canonical,robots=page.meta.get('robots',''),word_count=len(page.words))
def main():
 p=subprocess.run(['curl','-fsS','--max-time','30',BASE+'/sitemap.xml'],capture_output=True,text=True,check=True)
 urls=list(dict.fromkeys(e.text for e in ET.fromstring(p.stdout).iter() if e.tag.endswith('loc')))
 rows=[]
 with concurrent.futures.ThreadPoolExecutor(max_workers=4) as pool:
  for row in pool.map(fetch,urls):
   rows.append(row)
   if len(rows)%50==0:print('Crawled',len(rows),'of',len(urls),flush=True)
 dest=ROOT/'editorial-backup';dest.mkdir(exist_ok=True)
 (dest/'seo-crawl.json').write_text(json.dumps(rows,ensure_ascii=False,indent=2))
 with (dest/'seo-crawl.csv').open('w') as f:
  w=csv.DictWriter(f,fieldnames=list(next(r for r in rows if 'title' in r)));w.writeheader();w.writerows(rows)
 counts=collections.Counter(r['status'] for r in rows)
 duplicate={}
 for field in ('title','description','h1'):
  grouped=collections.defaultdict(list)
  for r in rows:
   if r.get(field):grouped[r[field]].append(r['url'])
  duplicate[field]={k:v for k,v in grouped.items() if len(v)>1}
 (dest/'seo-duplicates.json').write_text(json.dumps(duplicate,ensure_ascii=False,indent=2))
 print('SEO_CRAWL_SUMMARY',json.dumps({'urls':len(rows),'statuses':dict(counts),'missing_title':sum(not r.get('title') for r in rows),'missing_description':sum(not r.get('description') for r in rows),'h1_not_one':sum(r.get('h1_count')!=1 for r in rows),'duplicate_groups':{k:len(v) for k,v in duplicate.items()},'noindex':sum('noindex' in r.get('robots','') for r in rows)}),flush=True)
 for row in rows:
  if row['status']!='200':print('SEO_CRAWL_STATUS',row['status'],row['url'],flush=True)
 for key,groups in duplicate.items():
  for value,links in list(groups.items())[:8]:print('SEO_DUPLICATE',key,json.dumps(value,ensure_ascii=False),json.dumps(links),flush=True)
if __name__=='__main__':main()
