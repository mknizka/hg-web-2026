# SEO audit — 2. október 2026

Overený beh: https://github.com/mknizka/hg-web-2026/actions/runs/36978248315

## Skutočne vykonané

- 54 existujúcich záznamov RS aktualizovaných a spätne overených: 20 SEO titulkov modulov a ich perexov, 34 SEO titulkov riešení. ID, SEF a hlavné texty zachované; záloha v artefakte behu.
- Crawl všetkých 372 URL v aktuálnej sitemap, HTTP požiadavky po najviac štyroch naraz.
- Výstupný artefakt ellipse-seo-audit-36978248315 obsahuje seo-crawl.csv, seo-crawl.json, seo-duplicates.json a zálohu pôvodných RS údajov. Dostupnosť artefaktu je nastavená na 30 dní.

## Výsledok pred nasadením opráv šablón

| Kontrola | Výsledok |
|---|---:|
| URL skontrolované | 372 |
| HTTP 200 | 372 |
| Chýbajúci title | 0 |
| Chýbajúci meta description | 75 |
| Počet H1 odlišný od 1 | 5 |
| Skupiny zhodných title | 5 |
| Skupiny zhodných description | 3 |
| Skupiny zhodných H1 | 23 |
| Stránky s noindex | 372 |

74 URL vrátane skutočnej homepage má rovnaký title „Ellipse Cloud — HORECA GROUP“ a rovnaký H1 „Celá prevádzka. Jeden systém.“. Teda 73 ďalších adries pôsobí ako náhradná homepage. Ide o silný signál nesprávneho fallback routovania, nie o dôkaz na základe porovnania celých tiel HTML. Skupina obsahuje interné menu, footerové bloky, kategórie, ale aj segmentové názvy typu hotely-a-penziony. Toto má vyššiu prioritu než kozmetické premenovanie slugov.

Blog a novinky-a-blog používajú meta description „Demo Hotel Site blog. Prinášame Vám novinky z nášho hotela.“. Náhrada je pripravená v spoločnej hlavičke. Pri chýbajúcich popisoch používa hlavička existujúci perex alebo úvod textu, nie vymyslené tvrdenia; ručne spracované description má naďalej prednosť.

Zhodné H1 potvrdzujú páry aktuálnych riešení s príponou -riesenie a starších ciest bez nej. Pred zjednotením treba preveriť obsah, počítadlá a uložené väzby. Presmerovania a filtrovanie sitemap sa dokončia v serverovom routeri; nie sú ešte nasadené.

Všetky stránky sú noindex, čo zodpovedá staging doméne n.horecagroup.sk. Toto nie je dôvod odomknúť staging na indexáciu. Produkčný prechod musí overiť robots, canonical, sitemap aj presmerovania samostatne.

## Poradie ďalších serverových krokov

1. Registrácia rs_template a oprava routovania podľa RS-TEMPLATES.md.
2. Skutočný archív /problemy-a-riesenia/; čisté detailové URL a lokálny výber sektora.
3. Konsolidácia produktových adries podľa module-url-migration.json, s kontrolou kolízií a 301.
4. Vylúčenie interných a nekanonických URL zo sitemap. Namiesto náhradnej homepage správny obsah, konkrétny 301 alebo 404/410 podľa situácie.
5. Opakovaný crawl a mobilná vizuálna kontrola po nasadení. SEO/GEO výsledky potom merať v Search Console a na dopytoch, nie odhadovať z počtu kľúčových slov.
