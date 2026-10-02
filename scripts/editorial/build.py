"""Build reviewed editorial payload; this is not a public content source."""
import json, html, pathlib, hashlib
ROOT=pathlib.Path(__file__).resolve().parents[2]
D=ROOT/'docs/editorial'
# Short summaries, not reproduced passages. Recommendations in the cases are ours.
sources={
 'service':dict(title='Cyborg Service: The Unexpected Effect of Technology in the Employee–Guest Exchange',institution='Cornell University',year=2014,url='https://ecommons.cornell.edu/entities/publication/50c34d43-22dd-48f7-9c78-3c16e75c38b3',finding='Výskum upozorňuje, že technológia mení vzťah medzi hosťom a personálom; v terénnom experimente hostia ocenili blízkosť dostupného pracovníka pri samoobsluhe.',application='Pre tento proces z toho odvodzujeme odporúčanie zachovať dostupnú pomoc. Štúdia nemerala Ellipse ani nočnú prevádzku bez recepcie.'),
 'restaurant':dict(title='Customer Preferences for Restaurant Technology Innovations',institution='Cornell University',year=2009,url='https://ecommons.cornell.edu/entities/publication/1cb2925a-5a54-4791-b21f-a2e5289ce96f',finding='Prieskum hodnotil postoje hostí k reštauračným technológiám. Upozorňuje, že pri zavádzaní treba hodnotiť aj zákaznícku skúsenosť, nielen úsporu práce.',application='Odporúčame preto sledovať zrozumiteľnosť platobného procesu. Ide o starší výskum princípu prijatia technológie, nie o aktuálny podiel používania mobilných platieb.'),
 'profit':dict(title='Total Hotel Revenue Management: A Strategic Profit Perspective',institution='Cornell University',year=2017,url='https://ecommons.cornell.edu/entities/publication/bc445799-c6ce-4168-b86a-d87bbc25f81a',finding='Kvalitatívna štúdia so šestnástimi vedúcimi predstaviteľmi hotelierstva a dodávateľov zdôrazňuje ziskovosť, distribučné náklady a viacero zdrojov výnosu.',application='Naše odporúčanie je vyhodnocovať obchod po nákladoch a v kontexte celej prevádzky. Rozhovorová štúdia nedokazuje konkrétny nárast výnosov po zavedení softvéru.'),
 'pricing':dict(title='Hotel Revenue Management in an Economic Downturn: Results from an International Study',institution='Cornell University',year=2009,url='https://ecommons.cornell.edu/entities/publication/faf6d074-1bc3-4f64-84f6-3eeaf5f65a87',finding='Výskum v kontexte hospodárskeho poklesu rozoberá cielené cenové ponuky aj necenové možnosti, napríklad pridanú hodnotu a ďalšie segmenty dopytu.',application='Pre dnešnú prevádzku z toho odvodzujeme potrebu posudzovať aj alternatívy plošného zlacňovania. Výsledok z roku 2009 nie je prognózou súčasného dopytu.'),
 'waste':dict(title='The Business Case for Reducing Food Loss and Waste: Hotels',institution='WRI / WRAP, Champions 12.3',year=2018,url='https://champions123.org/sites/default/files/2020-08/business-case-reducing-food-loss-and-waste-hotels.pdf',finding='Analýza 42 hotelových prevádzok v 15 krajinách zistila priemerný pomer prínosov k nákladom znižovania potravinového odpadu takmer 7 : 1. Autori upozorňujú na obmedzenú zovšeobecniteľnosť vzorky.',application='Ide o meranie programov znižovania odpadu, nie o univerzitný test Ellipse ani prísľub návratnosti softvéru. Pre vlastnú prevádzku odporúčame osobitne merať odpad a náklady zavedených opatrení.'),
 'ai':dict(title='Artificial Intelligence Risk Management Framework: Generative Artificial Intelligence Profile',institution='NIST',year=2024,url='https://nvlpubs.nist.gov/nistpubs/ai/NIST.AI.600-1.pdf',finding='Metodika NIST opisuje riziko presvedčivých, ale nepravdivých výstupov generatívnej AI a odporúča testovanie a riadenie rizík pri jej použití.',application='Pre tento proces odporúčame kontrolu podkladov, oprávnení a výsledkov človekom. Je to medziodvetvová metodika, nie štúdia výkonu konkrétneho hotelového produktu.'),
 'spa':dict(title='Spa Revenue Management',institution='Cornell University',year=2009,url='https://ecommons.cornell.edu/entities/publication/95f66589-de4c-4ce6-87bf-d6ff4d3a0cf4',finding='Práca rozoberá systematické riadenie výnosu wellness prevádzok a ukazovateľ RevPATH, výnos na dostupnú hodinu procedúr.',application='Pre plánovanie z toho odvodzujeme potrebu pracovať s časom aj kapacitou služby. Výskum nenahrádza vlastné meranie nákladov a kvality procedúr.'),
 'training':dict(title='Changing Behaviors: Improving Customer Service in a Digital-Driven World',institution='Cornell University, diplomová práca Elizabeth M. Martyn',year=2018,url='https://ecommons.cornell.edu/entities/publication/1d51dc73-0075-4c46-a720-1433dc3fc757',finding='Výskum v hotelierstve spája zmenu správania pracovníkov s kombinovanou formou školenia, nie iba so samostatným technologickým zásahom.',application='Pri zavádzaní odporúčame spojiť aplikáciu s praktickým nácvikom. Táto práca nemeria úsporu času housekeepingového modulu.'),
 'loyalty':dict(title='Customer Engagement: The Key to Long-term Loyalty and Impact',institution='Cornell University',year=2021,url='https://ecommons.cornell.edu/entities/publication/acce6bef-767f-498b-91b6-7d39048f0ff2',finding='Séria štúdií skúma vzťah zapojenia hostí k spokojnosti, vernosti a voľbe rezervačného kanála na dátach hotelového reťazca a poskytovateľa spätnej väzby.',application='Odporúčame merať vzťah a návrat hosťa, nielen registráciu. Z výskumu nevyplýva, že samotné zavedenie kreditov zaručí vyšší priamy predaj.')
}
cases=json.loads((D/'cases.sk.json').read_text())
baseline=json.loads((D/'baseline.json').read_text())
assert len(cases)==len(baseline)==34
esc=html.escape
pack=[]
md=['# Príklady z prevádzky: redakčná revízia 34 riešení\n','Modelové situácie a odporúčané postupy. Nejde o doložené prípadové štúdie klientov. Pri dodaní zápisov zo stretnutí možno doplniť schválený konkrétny príbeh a namerané výsledky.\n']
modulemap=[]
for c,old in zip(cases,baseline):
 parts=['<p><em>Modelová situácia z hotelovej a HORECA prevádzky. Odporúčaný postup na spoločný rozbor s vaším tímom.</em></p>', '<h2>Situácia na prevádzke</h2><p>'+esc(c['scene'])+'</p>', '<h2>Čo treba vyriešiť</h2><p>'+esc(c['diagnosis'])+'</p>', '<h2>Odporúčaný postup s Ellipse</h2><ol>'+''.join('<li>'+esc(s)+'</li>' for s in c['steps'])+'</ol>', '<h2>Výnimka, na ktorú treba myslieť</h2><p>'+esc(c['exception'])+'</p>', '<h2>Ako overiť prínos</h2><p>'+esc(c['measure'])+'</p>']
 if c['research']:
  s=sources[c['research']]
  parts+=['<h2>Čo hovorí zahraničný výskum</h2><p>'+esc(s['finding'])+'</p><p>'+esc(s['application'])+'</p><p>Zdroj: <a href="'+esc(s['url'],quote=True)+'">'+esc(s['title'])+'</a> — '+esc(s['institution'])+', '+str(s['year'])+'.</p>']
 parts+=['<p>Konkrétne prepojenia a rozsah funkcií prejdeme podľa konfigurácie vašej prevádzky. V schéme pod článkom nájdete súvisiace súčasti Ellipse.</p>']
 update=dict(id=old['id'],sef=old['sef'],name=c['title'],title=c['title'],parex_text=c['lead'],text='\n'.join(parts))
 pack.append(dict(expected=old,update=update,modules=c['modules']))
 md += ['\n## '+c['title']+'\n',c['lead']+'\n']
 for label,key in [('Situácia','scene'),('Rozbor','diagnosis')]: md+=['### '+label+'\n',c[key]+'\n']
 md+=['### Postup\n']+['- '+s for s in c['steps']]+['\n### Výnimky\n',c['exception'],'\n### Meranie\n',c['measure']]
 if c['research']:
  s=sources[c['research']];md+=['\n### Výskum\n',s['finding']+' '+s['application'],f"Zdroj: [{s['title']}]({s['url']}) ({s['year']})."]
 md+=['\nModuly: '+', '.join(c['modules'])+'.\n']
 modulemap.append("  "+repr(old['sef'])+" => array("+', '.join(repr(m) for m in c['modules'])+"),")
(D/'payload.json').write_text(json.dumps(pack,ensure_ascii=False,indent=2)+'\n')
(D/'sources.json').write_text(json.dumps(sources,ensure_ascii=False,indent=2)+'\n')
(D/'articles.sk.md').write_text('\n'.join(md)+'\n')
(ROOT/'template/ellipse/files/hg-solution-modules.php').write_text("<?php\n// Fallback associations; RS ellipse_meta.related_modules takes precedence.\nreturn array(\n"+'\n'.join(modulemap)+"\n);\n")
print('Built',len(pack),'articles;',len(sources),'verified research sources')
