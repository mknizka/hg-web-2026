import argparse,json,pathlib,re
from html.parser import HTMLParser
ROOT=pathlib.Path(__file__).resolve().parents[2]
class Check(HTMLParser):
 def handle_starttag(self,tag,attrs):
  assert tag in {'p','em','h2','ol','li','a'},tag
  for k,v in attrs:assert tag=='a' and k=='href' and v.startswith('https://'),(tag,k)
parser=argparse.ArgumentParser();parser.add_argument('--payload',default='docs/editorial/payload.json');args=parser.parse_args()
data=json.loads((ROOT/args.payload).read_text())
assert data
assert len({r['update']['sef'] for r in data})==len(data)
for r in data:
 u=r['update'];assert u['id']==r['expected']['id'] and u['sef']==r['expected']['sef']
 assert len(u['name'])<=250 and len(u['title'])<=240
 assert len(re.sub('<[^>]+>',' ',u['text']).split())>=180
 assert len(r['modules'])>=2
 Check().feed(u['text'])
 assert not re.search(r'100 %|90 %|v milisekundách|nulové riziko',u['text'],re.I) or 'nie' in u['text'] or 'neoznačujte' in u['text']
print('Validated',len(data),'unique existing articles, HTML, lengths and module associations')
