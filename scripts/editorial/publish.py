#!/usr/bin/env python3
"""Update existing RS articles only. Never prints authentication or response bodies."""
import argparse, concurrent.futures, json, os, pathlib, time, urllib.parse, subprocess, tempfile
BASE='https://n.horecagroup.sk/api/rs/'
ROOT=pathlib.Path(__file__).resolve().parents[2]
FIELDS=('name','title','parex_text','text')
def request(kind,slug=None,payload=None):
 url=BASE+'?'+urllib.parse.urlencode({'type':kind,**({'sef':slug} if slug else {})})
 config=['url = '+json.dumps(url), 'silent', 'show-error', 'fail', 'max-time = 60', 'header = "Accept: application/json"']
 if payload is None: config.extend(['retry = 2', 'retry-delay = 2'])
 with tempfile.TemporaryDirectory() as tmp:
  if payload is not None:
   token=os.environ['RS_FEED_TOKEN']
   if any(ord(c)<32 for c in token):raise RuntimeError('Invalid credential format')
   config.append('header = '+json.dumps('X-RS-Feed-Token: '+token))
   config.append('header = "Content-Type: application/json"')
   path=pathlib.Path(tmp)/'payload.json';path.write_text(json.dumps(payload,ensure_ascii=False))
   config.append('data-binary = '+json.dumps('@'+str(path)))
  response=subprocess.run(['curl','--config','-'],input='\n'.join(config),text=True,capture_output=True)
  if response.returncode:raise RuntimeError('RS request failed (curl '+str(response.returncode)+'); response withheld')
  result=json.loads(response.stdout)
 if not isinstance(result,dict) or result.get('error'): raise RuntimeError('RS returned an error; response withheld')
 return result

def equivalent(row,wanted):
 return all(str(row.get(k,''))==str(wanted[k]) for k in FIELDS)

def main():
 parser=argparse.ArgumentParser();parser.add_argument('--apply',action='store_true');args=parser.parse_args()
 if args.apply and not os.environ.get('RS_FEED_TOKEN'): raise SystemExit('Missing RS_FEED_TOKEN; no writes made')
 records=json.loads((ROOT/'docs/editorial/payload.json').read_text())
 assert len(records)==34 and len({r['update']['id'] for r in records})==34
 def fetch(r):return request('article',r['update']['sef'])
 with concurrent.futures.ThreadPoolExecutor(max_workers=4) as pool: current=list(pool.map(fetch,records))
 pending=[]
 for r,old in zip(records,current):
  new=r['update']; before=r['expected']
  if old.get('id')!=new['id'] or old.get('sef')!=new['sef']: raise RuntimeError('Article identity mismatch; no writes made')
  if sorted(c['id'] for c in old.get('categories',[]))!=sorted(c['id'] for c in before['categories']): raise RuntimeError('Category changed; no writes made')
  if equivalent(old,new):continue
  if not equivalent(old,before):raise RuntimeError('Editorial conflict at article '+str(new['id'])+'; no writes made')
  pending.append(r)
 backup=ROOT/'editorial-backup';backup.mkdir(exist_ok=True)
 (backup/'before.json').write_text(json.dumps(current,ensure_ascii=False,indent=2))
 (backup/'results.json').write_text('[]\n')
 print('Preflight verified:',len(records),'existing records;',len(pending),'pending updates; backup saved')
 if not args.apply:return
 results=[]
 for r in pending:
  update=r['update']
  # Recheck immediately before each write to avoid overwriting an editor.
  latest=request('article',update['sef'])
  if not equivalent(latest,r['expected']):raise RuntimeError('Concurrent edit at '+str(update['id'])+'; stopped')
  result=request('article_upsert',payload=update)
  if not result.get('ok') or result.get('created') or int(result.get('id',0))!=update['id']:
   raise RuntimeError('Unexpected update result at '+str(update['id'])+'; stopped')
  check=request('article',update['sef'])
  if not equivalent(check,update):raise RuntimeError('Read-back mismatch at '+str(update['id'])+'; stopped')
  if sorted(c['id'] for c in check.get('categories',[]))!=sorted(c['id'] for c in r['expected']['categories']):
   raise RuntimeError('Category mismatch after '+str(update['id'])+'; stopped')
  results.append({'id':update['id'],'sef':update['sef'],'verified':True})
  (backup/'results.json').write_text(json.dumps(results,indent=2))
  print('Updated and verified article',update['id'],flush=True)
 print('Complete:',len(results),'updated;',len(records)-len(pending),'already current')
if __name__=='__main__':
 try:main()
 except Exception as exc:
  # Never include server response bodies, request headers or environment in logs.
  print('STOP:',type(exc).__name__,str(exc) if isinstance(exc,RuntimeError) else 'Request or local operation failed; inspect saved progress.');raise SystemExit(1)
