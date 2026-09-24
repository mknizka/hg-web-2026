# Napojenie produktových konceptov na existujúci RS

## Čo už poznáme z témy

`$content['id']`, `name`, `sef`, `description`, `parex_text`, `text[0]`, `file_type` a `rs_template`. Ide o rozhranie PHP témy, nie o potvrdený formát API. Nesmieme z neho odhadnúť endpointy alebo názvy zápisových polí.

## Čo načítať po sprístupnení API

Dokumentáciu, zoznam kategórií a šablón, export produktových záznamov vrátane ID/SEF/jazyka/stavu/verzie, model médií a SEO polí, podporu konceptov a preview, pravidlá autentifikácie a aktualizácie jednotlivých polí. Tajomstvá majú byť iba v prostredí alebo správcovi tajomstiev, nikdy v JSON balíku, Git histórii či HTML náhľade.

## Mapovanie

| Podklad | Cieľ v RS | Pravidlo |
|---|---|---|
| `existing_id` | ID článku | Doplniť po presnom vyhľadaní; nikdy nehádame |
| `source_url` | Pôvodný SEF a URL | Zachovať pri úprave produktovej stránky |
| `proposed_path` | SEF novej stránky | Len nový koncept; overiť kolízie a presmerovania |
| `name` | Názov produktu | Nezamieňať automaticky s SEO titulkom |
| `hero.heading` | H1 | Ak RS nemá samostatné pole, dohodnúť mapovanie s témou |
| `hero.lead` | Perex | Plain text, bez duplicity v tele |
| `seo` | Title/description | Overiť natívnu podporu; hlavička dnes používa názov |
| `body_html` | Hlavný text | Predpripravené základné sekcie; finálne rozšíriť po kontrole faktov |
| `media` | Galéria/obrázky | Overiť upload a existenciu, ponechať originály |
| `related_keys` | Súvisiace produkty | Preložiť na reálne ID alebo overené SEF |
| `faq` | Obsah FAQ | Vykresliť na stránke; nevytvárať skrytý SEO obsah |

## Postup zápisu

1. Read-only export aktuálneho obsahu a mapovanie ID, jazykov, kategórií a URL.
2. Uložiť pôvodné hodnoty dotknutých polí pre návrat; neverejný export neukladať do verejného repozitára.
3. Najprv jeden PMS koncept a kontrola náhľadu. Ak API nemá koncepty, použiť staging kópiu; neprepisovať živý článok ako skúšobný zápis.
4. Aktualizovať len výslovne mapované polia. Zachovať počítadlá, reakcie, dátumy, autora, preklady, galérie, formuláre a cudzie metadáta.
5. Použiť verziu/ETag/updated_at, ak ho API poskytuje; pri konflikte znovu načítať záznam. Pri retry vytvárania najprv dohľadať už vytvorený SEF, aby nevznikli duplicity.
6. Po zápise načítať výsledok a porovnať upravené polia. Overiť URL, canonical, H1, fotografie, mobil, CTA, galériu a relevantné prekliky.
7. Pôvodné blogové články o marketingu, Foodie, účtovníctve a MCP ostávajú článkami. Nové produktové stránky na ne môžu odkazovať.

## Poradie implementácie

P1: PMS, booking, gastro, POS, CRM, Team, check-in, revPRO, MCP.
P2: ostatné produkty podľa `content-pack.sk.json`.

Spustiť všetky stránky v rovnakom vizuálnom systéme. Verejné menu meniť až po existencii cieľových záznamov. Nepublikovať odkazy na neexistujúce koncepty. Pri prechode zo stagingu na produkčnú DB znovu overiť ID — rovnaký názov alebo SEF nemusí znamenať rovnaké ID.
