"""Synchronize edited article summaries, with a public-page metadata backup."""
import concurrent.futures, html, json, pathlib, re, subprocess
from publish import ROOT, request, equivalent

def description(slug):
 p=subprocess.run(['curl','-fsS','--retry','2','--max-time','60','https://n.horecagroup.sk/'+slug+'/'],capture_output=True,text=True)
 if p.returncode:raise RuntimeError('Could not read public metadata')
 m=re.search(r'<meta\s+name="description"\s+content="([^"]*)"',p.stdout,re.I)
 if not m:raise RuntimeError('Missing description metadata')
 return html.unescape(m.group(1))

def main():
 rows=json.loads((ROOT/'docs/editorial/payload.json').read_text())
 with concurrent.futures.ThreadPoolExecutor(max_workers=4) as pool:
  old=list(pool.map(lambda r:description(r['update']['sef']),rows))
 backup=ROOT/'editorial-backup';backup.mkdir(exist_ok=True)
 (backup/'descriptions-before.json').write_text(json.dumps([{'id':r['update']['id'],'sef':r['update']['sef'],'description':d} for r,d in zip(rows,old)],ensure_ascii=False,indent=2))
 for r,prior in zip(rows,old):
  u=r['update'];new=u['parex_text'];assert len(new)<=240
  if prior==new:continue
  current=request('article',u['sef'])
  if not equivalent(current,u):raise RuntimeError('Article changed before metadata update: '+str(u['id']))
  if description(u['sef'])!=prior:raise RuntimeError('Metadata changed concurrently: '+str(u['id']))
  result=request('article_upsert',payload={k:u[k] for k in ('id','sef','name')}|{'description':new})
  if not result.get('ok') or result.get('created'):raise RuntimeError('Unexpected metadata response')
  if description(u['sef'])!=new:raise RuntimeError('Metadata verification failed: '+str(u['id']))
  print('Summary verified',u['id'],flush=True)
 print('All 34 summaries verified')
if __name__=='__main__':
 try:main()
 except Exception as e:
  print('STOP:',type(e).__name__,str(e) if isinstance(e,RuntimeError) else 'Metadata update failed; response withheld');raise SystemExit(1)
