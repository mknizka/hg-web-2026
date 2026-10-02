"""SEO metadata pack and complete sitemap disposition; URL moves are a separate migration."""
import copy,csv,json,pathlib,xml.etree.ElementTree as ET
ROOT=pathlib.Path(__file__).resolve().parents[2]
MODULES={
'pms':('hotelovy-system','Hotelový rezervačný systém Ellipse PMS','Cloudový hotelový systém pre rezervácie, hotelovú plachtu, pobyty a účty hostí. Ellipse PMS prepája recepciu, platby a každodennú prevádzku.'),
'booking':('web-booking','Rezervačný systém na web hotela | Ellipse Booking','Priame online rezervácie izieb a pobytových balíkov na vlastnom webe. Ellipse Booking prepája dostupnosť z PMS, platby a správu pobytu.'),
'channel':('channel-manager','Channel manager pre hotely | Ellipse','Spravujte ceny a dostupnosť izieb na rezervačných portáloch z jedného miesta. Ellipse Channel Manager prepája online predaj s hotelovým PMS.'),
'pay':('online-platby','Platobná brána a terminály pre hotely | Ellipse Pay','Online aj terminálové platby pre hotely a gastro. Ellipse Pay prepája úhrady s rezerváciami, hotelovými účtami a predajom na pokladni.'),
'self':('online-check-in','Online check-in a samoobslužné ubytovanie | Ellipse','Online check-in, správa rezervácie, doplnkové služby a check-out v hosťovskom portáli Ellipse. Menej prepisovania údajov na recepcii.'),
'crm':('crm-a-vernost','Vernostný a CRM systém pre hotely a gastro | Ellipse','Budujte vzťah s hosťami pomocou Ellipse CRM: klientské účty, vernostné výhody, kredit a podpora priamych návratov do hotela či reštaurácie.'),
'team':('ellipse-team','Housekeeping a riadenie tímu hotela | Ellipse Team','Mobilná aplikácia pre housekeeping, úlohy, údržbu a prehľady prevádzky. Ellipse Team spája recepciu, chyžné, údržbu a manažment.'),
'pos':('pos-systemy','Pokladničný POS systém pre gastro | Ellipse POS','Pokladničný systém pre predaj v reštaurácii, hoteli aj prevádzke služieb. Ellipse POS prepája účty, platby a zákazníkov v jednej platforme.'),
'reviews':('sprava-recenzii-hotela','Správa online recenzií hotela | Ellipse Reviews','Sledujte a spravujte online recenzie hostí na jednom mieste. Ellipse Reviews pomáha tímu s prehľadom hodnotení a prípravou odpovedí.'),
'messages':('komunikacia-s-hostami','Komunikácia s hosťami z portálov | Ellipse Messages','Správy hostí z podporovaných rezervačných portálov a priamych rezervácií v spoločnom prostredí Ellipse. Komunikácia dostupná aj tímu v mobile.'),
'vouchers':('darcekove-poukazy','Predaj a evidencia darčekových poukazov | Ellipse','Predávajte darčekové poukazy online a sledujte ich čerpanie, platnosť aj zostatky. Spoločná evidencia pre hotel, wellness a reštauráciu.'),
'aqua':('vstupy-a-akvaparky','Systém pre aquaparky a riadenie vstupov | Ellipse','Vstupenky, RFID náramky, oprávnenia a vyúčtovanie spotreby v aquaparku. Ellipse prepája vstupy, predaj a hotelovú prevádzku.'),
'tables':('rezervacie-stolov','Rezervačný systém pre stoly v reštaurácii | Ellipse','Prehľad rezervácií stolov a kapacity reštaurácie v Ellipse. Organizujte príchody hostí a zdieľajte informácie s obsluhou.'),
'gastro':('restauracia-gastronomia-skladove-hospodarstvo','Reštauračný a skladový systém | Ellipse Gastro','Predaj v reštaurácii, skladové hospodárstvo, receptúry a spotreba surovín. Ellipse Gastro prepája obsluhu s kontrolou zásob a nákladov.'),
'services':('casove-rezervacie','Rezervačný systém pre wellness a služby | Ellipse','Online rezervácie masáží, procedúr a služieb podľa času a kapacity. Ellipse prepája termíny, pracovníkov a pobyt hosťa.'),
'revenue':('vynosovy-modul-revpro','Revenue management a cenotvorba hotela | revPRO','Obsadenosť, tempo predaja a cenotvorba hotela v Ellipse revPRO. Podklady pre výnosový manažment a automatizáciu cien podľa nastavených pravidiel.'),
'ella':('virtualna-recepcia-ella-ai','AI chatbot a virtuálna recepcia pre hotel | Ella','Ella je AI asistent pre komunikáciu s hotelovými hosťami. Pomáha s otázkami, ponukou pobytov a nadväzujúcimi krokmi podľa dostupných prepojení.'),
'events':('eventovy-modul-planovanie-skoleni-a-cenove-ponuky','Kongresový a eventový systém pre hotely | Ellipse','Plánujte kongresy, konferencie a skupinové podujatia. Ellipse prepája rezervácie sál, izieb a služieb s prípravou cenovej ponuky.'),
'websites':('moderne-webove-stranky','Webové stránky pre hotely s rezerváciami | Ellipse','Hotelový web s priamymi rezerváciami, ponukou pobytov a služieb. Prepojte prezentáciu hotela s predajom cez Ellipse Booking.'),
'mcp':('ellipse-mcp','MCP konektor: hotelové dáta v AI nástrojoch | Ellipse','Prepojte podporované údaje Ellipse s AI nástrojmi cez MCP konektor. Otázky nad hotelovými dátami a analýzy v rozsahu prideleného prístupu.')}
TITLES=[
'Nočný príchod do hotela bez recepcie: automatizácia',
'Hotel a aquapark: jeden RFID náramok a spoločný účet',
'Bezkontaktné platby a elektronické doklady v hoteli',
'Elektronická fakturácia firemných pobytov v hoteli',
'Darčekové poukazy: predaj, čerpanie a evidencia',
'Expirované darčekové poukazy: evidencia a uzávierka',
'Rozpočet firemného podujatia: limity a kontrola čerpania',
'Online check-in: OCR dokladov a overenie hosťa',
'Channel manager: synchronizácia cien a dostupnosti izieb',
'Priame rezervácie hotela: od webu po potvrdený pobyt',
'Dynamické ceny hotela a tempo rezervácií v revPRO',
'Garancia rezervácie kartou a neskoršie platby',
'Virtuálne platobné karty z rezervačných portálov',
'Sprepitné kartou v reštaurácii: evidencia a rozdelenie',
'Útrata v reštaurácii na hotelový účet hosťa',
'Food cost v reštaurácii: kontrola nákladov a receptúr',
'AI pri tvorbe receptúr a kalkulácii jedál',
'Skladové hospodárstvo v gastro: príjem, výdaj, inventúra',
'Online rezervácie wellness, masáží a procedúr',
'Permanentky a kontrola vstupov do wellness',
'Samoobslužné vyúčtovanie v aquaparku: kiosk aj mobil',
'Kongresový hotel: spoločná rezervácia sál a izieb',
'Overbooking v hoteli: ako predchádzať dvojitým rezerváciám',
'Housekeeping v hoteli: upratovanie, kontrola a údržba',
'Vyúčtovanie prenájmu apartmánov pre majiteľov',
'AI recepcia hotela: odpovede hosťom s Ella',
'Hotelové dáta v AI: analýzy cez Ellipse MCP konektor',
'Párovanie bankových platieb s hotelovými rezerváciami',
'Domová kniha a štatistické výkazy v hotelovom systéme',
'Predĺženie pobytu online a aktualizácia rezervácie',
'Hotelové účtovníctvo: doklady, platby a ranné reporty',
'Vernostný program hotela a viac priamych rezervácií',
'Rezervácie sál a kapacít bez prekrývania termínov',
'Riadenie hotelového tímu: úlohy a údržba v mobile']

def build():
 dest=ROOT/'docs/seo';dest.mkdir(exist_ok=True)
 original=json.loads((ROOT/'docs/editorial/payload.json').read_text())
 voice={r['update']['id']:r for r in json.loads((ROOT/'docs/editorial/voice-payload.json').read_text())}
 result=[];moves=[]
 for key,(target,title,lead) in MODULES.items():
  row=json.loads(pathlib.Path('/tmp/hg-seo/modul-'+key+'.json').read_text())
  assert row.get('id') and row['sef']=='modul-'+key
  expected={k:row[k] for k in ('id','sef','name','title','parex_text','text','categories')}
  update={k:v for k,v in expected.items() if k!='categories'}
  update.update(title=title,parex_text=lead)
  result.append(dict(expected=expected,update=update,modules=[key],kind='module'))
  moves.append(dict(id=row['id'],source='/'+row['sef']+'/',target='/'+target+'/',title=title,status='server_migration_required'))
 for i,r in enumerate(original):
  current=voice.get(r['update']['id'],r)
  expected=copy.deepcopy(current['update']);expected['categories']=current['expected']['categories']
  update=copy.deepcopy(current['update']);update['title']=TITLES[i]+' | Ellipse'
  result.append(dict(expected=expected,update=update,modules=r['modules'],kind='solution'))
 (dest/'payload.json').write_text(json.dumps(result,ensure_ascii=False,indent=2)+'\n')
 (dest/'module-url-migration.json').write_text(json.dumps(moves,ensure_ascii=False,indent=2)+'\n')
 urls=[e.text for e in ET.parse('/tmp/hg-sitemap.xml').iter() if e.tag.endswith('loc')]
 active={r['update']['sef'] for r in result}; modules={'modul-'+k for k in MODULES}
 internal={'hlavne-menu','footer-menu','povinne-info','kontakt-footer','address-footer','claim-klientov','citaty','ellipse-obsah','moduly-ellipse','koncepty-produktov','segmenty-modulov'}
 with (dest/'sitemap-inventory.csv').open('w') as f:
  w=csv.writer(f);w.writerow(['url','classification','action','basis'])
  for url in urls:
   slug=url.rstrip('/').rsplit('/',1)[-1]
   if slug in internal:kind,action,basis='internal_cms','exclude_from_sitemap; noindex_follow','known CMS structural name'
   elif slug in modules:kind,action,basis='module','optimize_metadata; migrate_with_301','RS article read'
   elif slug in active:kind,action,basis='solution','optimize_title; retain_url','reviewed current article'
   elif slug.startswith('integracia-'):kind,action,basis='integration','review_content_before_indexing','URL classification only'
   elif slug in {v[0] for v in MODULES.values()}:kind,action,basis='product_target','merge_relevant_content_before_URL_migration','proposed topic owner'
   else:kind,action,basis='existing_page_or_archive','retain_URL; review_language_duplicates_content','URL classification only; not a full content review'
   w.writerow([url,kind,action,'verified sitemap; '+('not crawled individually' if kind not in ('module','solution') else 'RS content available')])
 print('Prepared',len(result),'metadata updates;',len(urls),'sitemap entries classified; 20 URL migrations deferred until redirects work')

if __name__=='__main__':build()
