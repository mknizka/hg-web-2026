#!/usr/bin/env python3
"""Import existing public solutions through the authenticated RS Feed API.
Dry run is the default. RS_FEED_TOKEN is read only from the environment or a hidden prompt.
"""
import argparse
import getpass
import json
import os
from pathlib import Path
import re
import subprocess
import tempfile

ROOT = Path(__file__).resolve().parents[2]
SOURCE = ROOT / 'template/ellipse/files/hg-solutions.json'
MANIFEST = ROOT / 'template/ellipse/files/hg-solutions-rs.json'
BASE = 'https://n.horecagroup.sk/api/rs/'
CATEGORY = 'ako-ellipse-pomaha'

def payloads():
    source = json.loads(SOURCE.read_text())
    result = []
    for item in source:
        body = re.sub(r'<h1\b[^>]*>.*?</h1>', '', item['html'], flags=re.I | re.S)
        result.append({'sef': item['slug'], 'name': item['title'], 'title': item['title'],
                       'parex_text': item['lead'], 'text': body,
                       'description': item['description'], 'keywords': item['keywords'],
                       'status': 1, 'user_name': 'HORECA GROUP',
                       'category_sef': CATEGORY,
                       'category_name': 'Aké HORECA problémy Ellipse rieši'})
    assert len(result) == 34 and len({x['sef'] for x in result}) == 34
    for article in result:
        for field, limit in [('name',250),('title',240),('description',240),('keywords',240)]:
            if len(article[field]) > limit:
                raise ValueError(f"Field exceeds API limit: {article['sef']} / {field}")
    return result

def request(kind, token='', data=None, sef=None):
    from urllib.parse import urlencode
    url = BASE + '?' + urlencode({'type': kind, **({'sef': sef} if sef else {})})
    with tempfile.TemporaryDirectory(prefix='ellipse-rs-') as directory:
        folder = Path(directory)
        headers = folder / 'headers'; headers.write_text('Content-Type: application/json\n'+('X-RS-Feed-Token: '+token+'\n' if token else '')); headers.chmod(0o600)
        response = folder / 'response'
        cmd=['curl','--silent','--show-error','--max-time','60','--proto','=https','--header','@'+str(headers), '--output',str(response),'--write-out','%{http_code}',url]
        if data is not None:
            body=folder/'body.json';body.write_text(json.dumps(data,ensure_ascii=False));cmd += ['--request','POST','--data-binary','@'+str(body)]
        status=subprocess.check_output(cmd,text=True).strip()
        value=json.loads(response.read_text())
        if status == '401': raise RuntimeError('RS API rejected the write token (401). No fallback authentication is attempted.')
        if not status.startswith('2') and value.get('error') != 'not_found': raise RuntimeError('RS API HTTP '+status)
        return value

def article_record(response):
    # Accept common documented field envelopes; refuse to guess a record if ambiguous.
    if isinstance(response,dict) and 'sef' in response and 'id' in response:return response
    if isinstance(response,dict):
        for key in ('article','data'):
            value=response.get(key)
            if isinstance(value,dict) and 'sef' in value and 'id' in value:return value
    raise RuntimeError('Unrecognized article response: inspect API output before proceeding.')

def verify(record, article):
    body=record.get('text')
    if isinstance(body,list):body=body[0] if body else ''
    if record.get('sef') != article['sef'] or record.get('name') != article['name'] or body != article['text']:
        raise RuntimeError('Existing RS content differs: '+article['sef']+'. Nothing is overwritten; inspect the record.')
    for field in ('parex_text','description','keywords','status'):
        if field in record and str(record[field]) != str(article[field]):
            raise RuntimeError('Existing RS '+field+' differs: '+article['sef']+'. Nothing is overwritten.')

def main():
    parser=argparse.ArgumentParser(description=__doc__)
    parser.add_argument('--apply',action='store_true')
    parser.add_argument('--payload',type=Path,help='Write the reviewed import JSON without a token')
    args=parser.parse_args();articles=payloads()
    if args.payload:args.payload.write_text(json.dumps({'articles':articles},ensure_ascii=False,indent=2)+'\n')
    print(f'Validated {len(articles)} articles. Category: {CATEGORY}. Source ordinal IDs are NOT sent as RS IDs.')
    if not args.apply:
        print('Dry run only. Use --apply with RS_FEED_TOKEN or the hidden prompt to import.');return
    token=os.environ.get('RS_FEED_TOKEN') or getpass.getpass('RS Feed write token: ')
    if not token or '\n' in token or '\r' in token:raise RuntimeError('Missing or invalid token')
    # Read every target first; do not overwrite articles edited in RS or an unrelated slug collision.
    for article in articles:
        response=request('article',sef=article['sef'])
        if response.get('error')=='not_found':continue
        verify(article_record(response),article)
    results=request('articles_upsert',token,{'articles':articles})
    rows=results.get('results',[])
    if not results.get('ok') or len(rows)!=len(articles) or any(not r.get('ok') for r in rows):
        raise RuntimeError('Import incomplete. Frontend not activated. Inspect API results and rerun preflight before retrying.')
    by_slug={r['sef']:r for r in rows}
    bindings=[];categories=set()
    for article in articles:
        row=by_slug.get(article['sef'])
        if not row:raise RuntimeError('Missing import result for '+article['sef'])
        verify(article_record(request('article',sef=article['sef'])),article)
        categories.add(int(row['category_id']))
        bindings.append({'legacy_slug':article['sef'],'id':int(row['id']),'sef':row['sef']})
    if len(categories)!=1 or min(categories)<=0:raise RuntimeError('Unexpected category mapping; frontend not activated.')
    manifest={'version':1,'category_id':categories.pop(),'category_sef':CATEGORY,'articles':bindings}
    target=MANIFEST.with_suffix('.tmp');target.write_text(json.dumps(manifest,ensure_ascii=False,indent=2)+'\n');target.replace(MANIFEST)
    print('All 34 articles verified. Manifest written:',MANIFEST)
    print('Commit and deploy this manifest with the RS adapter to activate database content on the website.')

if __name__=='__main__':main()
