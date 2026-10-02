# SEO migrácia Ellipse — serverové dokončenie

**Aktualizácia po požiadavke používateľa:** najprv vykonať `RS-TEMPLATES.md` — explicitné typy podľa rs_template a čistý archív. Aktuálne výsledky úplného crawlu sú v `AUDIT-RESULTS.md`. Až potom pokračovať konsolidáciou produktových SEF nižšie.

## Aktuálny stav a hranice

Audit sitemap.xml z 2. 10. 2026: 372 URL. `sitemap-inventory.csv` klasifikuje každú adresu; nejde o predstieranú individuálnu obsahovú revíziu všetkých starších článkov. Workflow `editorial-seo.yml` navyše prejde všetky URL a uloží HTTP stav, presmerovanie, title, description, H1, canonical a robots do artefaktu. Prevádzka n.horecagroup.sk je staging a má zostať noindex. Produkčnú indexáciu riešiť až pri schválenom prechode na horecagroup.sk.

54 záznamov RS má pripravené SEO titulky (20 modulov + 34 riešení); moduly aj nové perexy používané v description. Obsahy hlasoviek, názvy krátkych položiek navigácie, ID, kategórie, staré SEF a reakcie sa nemenia. Titulky vychádzajú z obsahu a prirodzených slovenských výrazov; nejde o tvrdenie o meranej hľadanosti. Na kvantifikáciu treba Search Console alebo keyword dataset.

Šablóny teraz čítajú skutočné pole title; module H1 vychádza z titulku bez suffixu značky. Hlavička neodkazuje každú SK podstránku cez hreflang na EN homepage. Schéma obsahuje crawlable HTML odkazy, ktoré fungujú aj bez JS; moduly odkazujú späť na súvisiace prípady z praxe. llms.txt vychádza z publikovaných RS záznamov, nie z pevne zapísaného starého zoznamu. Je doplnkom, nie zárukou viditeľnosti v LLM. Nevytvárame nepravdivé hodnotenia, ceny ani skrytý FAQ obsah.

## Prompt pre Cursor priamo na serveri

Pracuješ na n.horecagroup.sk s existujúcim PHP RS a repozitárom mknizka/hg-web-2026, vetva qa/mobile-performance-v1. Dokonči SEO migráciu podľa docs/seo/module-url-migration.json a výsledkov úplného crawlu v GitHub Actions artefakte ellipse-seo-audit. Opravy šablón sú už pripravené vo vetve. Zálohuj menené súbory aj dotknuté riadky DB; neprepisuj lokálne úpravy servera. Nenasadzuj celý template cez rsync --delete ani nespúšťaj staré obsahové importy.

1. Identifikuj skutočný front controller, routing SEF, generátor sitemap.xml a tabulky RS. Tieto serverové súbory nie sú v tomto repozitári; názvy tabuliek ani stĺpcov neodhaduj. Tokeny nevypisuj. Na zmenu SEF nepoužívaj article_upsert — podľa dostupného kontraktu existujúci SEF nemení.
2. Pre všetkých 20 modulov over ID, súčasný SEF a cieľ z module-url-migration.json. Viaceré ciele už existujú, napr. hotelovy-system, web-booking či channel-manager. Pred migráciou porovnaj obsah, jazyk, obrázky, formuláre a interné odkazy oboch stránok. Vyber jeden trvalý záznam pre danú tému; prenes všetok relevantný unikátny obsah a obrazové materiály. Nevymaž cieľ len preto, aby sa uvoľnil SEF. Zachovaj staršie články, ktoré majú samostatný informačný zámer.
3. PMS má vlastniť adresu /hotelovy-system/ s H1 „Hotelový rezervačný systém Ellipse PMS“. Táto existujúca krátka adresa je vhodná; nevytváraj ďalšiu konkurenčnú stránku iba kvôli presnej fráze. /modul-pms/ bude trvalý 301 na ňu. Staršie /pms-hotelovy-rezervacny-system/ alebo /ellipse-pms/ presmeruj až po kontrole jazyka a obsahovej ekvivalencie. EN obsah nepresmerúvaj na SK iba podľa názvu.
4. Presmerovania vykonávaj pred výstupom HTML. Povoľ iba lokálne pevne mapované ciele. Vyhnúť sa slučkám, reťazcom a presmerovaniu na homepage. Pri jednorazovej migrácii zachovaj marketingové parametre; canonical má smerovať na čistú finálnu URL. Parametre prevadzka patria iba k UI personalizácii a nemajú byť v sitemape. Schéma si segment pamätá cez localStorage.
5. URL modulov v navigácii, schéme, súvisiacich článkoch a llms.txt musia vychádzať z finálneho publikovaného RS záznamu. Pozri aj meta.link používané katalógom: nesmie zostať druhá konkurenčná adresa. Canonical prepnúť až vtedy, keď cieľ vracia 200 a správny obsah.
6. Generátor sitemap musí vyberať len publikované verejné kanonické stránky správneho jazyka. Vylúč interné menu, footerové bloky, citáty, segmentové konfigurácie, interné obsahové kontajnery a presmerované aliasy. Minimálne skontroluj hlave-menu/hlavne-menu, footer-menu, kontakt-footer, address-footer, claim-klientov, citaty, ellipse-obsah, moduly-ellipse, koncepty-produktov a segmenty-modulov. Neodstraňuj automaticky všetky kategórie: kvalitné verejné archívy a segmentové landing pages môžu zostať. K interným stránkam pridaj noindex,follow alebo ich neroutuj verejne; samotné vynechanie zo sitemap nie je zákaz indexácie.
7. Integrácia má mať samostatnú indexovanú stránku len s vlastným užitočným obsahom: účel, podporované operácie, obmedzenia a overený postup. Samotné logo a názov patria do centrálneho katalógu, nie do samostatnej tenkej SEO stránky. Rozhodni podľa skutočného obsahu z crawlu, nie iba podľa prefixu integracia-.
8. Dvojice riešení s koncovkou -riesenie a bez nej porovnaj podľa záznamov a obsahu. Nezamieňaj rovnaký názov za dôkaz duplicity. Pri skutočnej duplicite ponechaj aktuálny publikovaný článok s obohateným obsahom a pôvodnú URL presmeruj 301. Zachovaj počítadlá, reakcie a obsahové väzby pri konsolidácii.
9. Hreflang doplň iba pre overené obojsmerné ekvivalenty SK/EN. Preklady nesmú všetky ukazovať na jazykovú homepage. Archívy a interné RS záznamy neoznačuj ako Article. Article schema používa skutočného autora/vydavateľa a len skutočné dátumy, ak sú dostupné; WebPage/BreadcrumbList majú súhlasiť s viditeľnou navigáciou. Nesľubuj SoftwareApplication rich result bez splnených podmienok.
10. Over všetkých 20 cieľov (200, správne H1, title, description, canonical), staré adresy (jeden 301), sitemap bez aliasov a interných blokov, návrat segmentu schémy z localStorage, funkčný kontakt, mobil a dostupnosť bez JavaScriptu. Znovu spusti seo_audit.py. Staging noindex zachovaj. Produkčnú sitemap a robots aktualizuj pri samostatnom produkčnom deployi.

## Informačná architektúra

- Platforma: jedna homepage vysvetľujúca Ellipse a HORECA GROUP.
- Typ prevádzky: existujúce hotely-a-penziony, rezorty-a-aquaparky, gastro-a-restauracie, wellness-sluzby-fitness, mali-ubytovatelia-a-prenajimanie. Každá potrebuje vlastný problém, postup a relevantné moduly, nie kopírovanú homepage.
- Produkty: jedna komerčná cieľová stránka pre každú z 20 tém podľa manifestu.
- Riešenia z praxe: konkrétne postupy s hlasovkami, odbornými zdrojmi a preklikmi na produkty. Nemajú súperiť s produktovým detailom o totožný zámer.
- Integrácie: centrálny katalóg, samostatné detaily až pri dostatku unikátneho obsahu.
- Blog: návody, aktualizácie a prípadové štúdie; staršie užitočné URL sa neskracujú len pre estetiku.
- Kontakt, firma, referencia a obchodné informácie: ľahko dohľadateľný vydavateľ a spôsob overenia tvrdení.

## Primárne zdroje

- https://developers.google.com/search/docs/appearance/ai-features
- https://developers.google.com/search/docs/crawling-indexing/consolidate-duplicate-urls
- https://developers.google.com/search/docs/crawling-indexing/301-redirects

Google uvádza pre AI funkcie rovnaké základné SEO požiadavky. Optimalizácia je orientovaná na jasný, užitočný, overiteľný a dostupný obsah; nijaké garantované citácie v LLM ani univerzálny „GEO trik“.
