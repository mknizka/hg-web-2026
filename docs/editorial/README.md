# Redakčná aktualizácia riešení

Revízia 34 existujúcich článkov kategórie 107 na n.horecagroup.sk.

- `cases.sk.json`: autorské situácie, rozbory, postupy, výnimky, merania a väzby na moduly.
- `sources.json`: deväť overených zahraničných zdrojov; rozlišujeme univerzitný výskum, odvetvové meranie a metodiku.
- `articles.sk.md`: čitateľná verzia všetkých článkov.
- `baseline.json`: pôvodný verejný obsah pre kontrolu súbežnej editácie.
- `payload.json`: presné aktualizácie existujúcich ID a slugov. Nie je zdrojom obsahu webu.

Texty používajú modelové situácie. Nepripisujú vymyslené výroky klientom, neuvádzajú domnelé výsledky projektov ani podporu Ellipse zo strany univerzít. Konkrétne prípadové štúdie možno doplniť po získaní schválených podkladov a meraní.

## Publikovanie

GitHub Actions `editorial-rs.yml` použije repository secret `RS_FEED_TOKEN` výhradne pre API n.horecagroup.sk. Pred prvým zápisom načíta všetkých 34 záznamov a overí identitu, kategórie a pôvodný obsah. Pred každým zápisom znovu kontroluje súbežnú editáciu. Už aktualizované záznamy preskočí. Zápisy sú jednotlivé, nie transakcia; pri chybe sa zastavia. Záloha a zoznam overených aktualizácií sú v artefakte workflowu (30 dní). Obnova má prebehnúť až po kontrole prípadných novších redakčných zmien, nie slepým prepisom.

`python3 scripts/editorial/publish.py` je kontrola bez zápisu. `--apply` vykoná autorizované aktualizácie. Skript nečíta ani nevypisuje hodnoty GitHub secretov; kľúč používa iba runner z prostredia. API odpovede sa nevypisujú do logu.

## Schéma

Pod každý detail riešenia sa cez spoločnú šablónu vkladá schéma, vrátane budúcich článkov. Priame súvisiace odkazy sa čítajú najprv z `ellipse_meta.related_modules`; pri súčasných článkoch existuje verzovaný fallback `hg-solution-modules.php`. Neexistujúci alebo nezverejnený modul sa nezobrazuje. Schéma zostáva napojená na publikované moduly a segmenty v RS a používa existujúci localStorage `ellipse-audience`. Klik otvorí dialóg, hover nemení výber. Obsahové odkazy zachovávajú bezpečné HTTP(S), lokálne cesty a kotvy, ostatné HTML atribúty sa odstraňujú.

## Kontrola

`python3 scripts/editorial/validate.py`: jedinečnosť existujúcich ID/slugov, dĺžky názvov, štruktúra HTML a väzby na moduly. PHP šablóny boli parsované parserom PHP 8.2. Pred publikovaním sa vykonáva kontrola proti živému API a po každom zápise čítanie späť. Web sa naďalej číta výhradne z RS.
