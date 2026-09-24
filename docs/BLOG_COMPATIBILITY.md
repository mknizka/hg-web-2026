# Existujúci RS, blog a tematická kolekcia

## Zachované rozhranie
- Bežný archív používa pôvodné `$content['blog']` a `$content['pagination']` bez zmeny dopytu a poradia.
- Staré články ostávajú na `/{sef}/`. ID, SEF, reakcie, počítadlá, audio a HTML v DB sa nemenia.
- `page.php` vypisuje pôvodné `text[0]` bez sanitizácie či prepisovania uloženého obsahu. Zachované sú aj pôvodné výnimky pre formuláre a galériu.
- Obrázok z `/img/rs/{id}.{file_type}` má fallback na pôvodný variant `{id}-01.{file_type}`. Externé aj vložené obrázky a odkazy v texte ostávajú pôvodné.
- Doplnené štýly izolujú blog a archív. Široké tabuľky dostanú posuvný obal iba v DOM, nie v DB. Editorové triedy, odkazy a identifikátory sa zachovávajú.
- Dve existujúce produktové CTA sa vkladajú mimo uloženého textu. Prvá sa pri dostatočne dlhom článku presunie iba medzi priame odseky.

## Aké problémy rieši Ellipse
- Verejný vstup: `/blog/?tema=problemy`, odkazy z homepage a menu Riešenia.
- Výber problému: `problem=recepcia|predaj|vynosy|vernost|prehlad|apartmany`.
- Dnes je to tematická kolekcia existujúcich publikovaných článkov, vybraná presne podľa SEF v `hg-blog-data.php`. Nevytvára duplikáty článkov ani nepresúva staré záznamy medzi kategóriami.
- Používa existujúce `rs_last_articles` cez `hg_articles`. Dočasný výber prechádza najviac 500 najnovších článkov v pôvodných kategóriách 55,57,76; bežný archív tým nie je obmedzený.
- Novú skutočnú kategóriu vytvoriť v administrácii existujúceho RS, priradiť publikované články a jej reálne ID vložiť do `HG_PROBLEM_CATEGORY_ID` v `hg-blog-config.php` (aktuálne 0).
- Po nastavení ID sa hlavný pohľad kolekcie načítava z tejto kategórie, vrátane nových článkov. Tematické podfiltre zostávajú explicitným redakčným mapovaním SEF.
- Pri raste nad 500 článkov zapojiť natívny stránkovaný reader kontroléra. Backend/kontrolér a prístup k DB nie sú v repozitári, preto sa tu nepredpokladá neexistujúce API ani nové stĺpce.

## Kontroly pri prechode na produkciu
Zachovať existujúce routovanie, obrázky `/img/rs/`, médiá v článkoch, reakčné endpointy a dáta RS. Nový web je téma nad existujúcou DB; nejde o import ani migráciu obsahu. Ukážky starého formátovaného obsahu overiť na rovnakých článkoch na pôvodnom aj novom webe.

Tematické filtre zahŕňajú aj gastro (`problem=gastro`): QR objednávanie, platby pri stole a optimalizácia receptúr. Na homepage je šesť hlavných problémov; apartmánové témy zostávajú v úplnom rozcestníku.

## Médiá homepage
V `product-originals/` sú štyri presné dodané originály: web booking, klientsky CRM účet a dve ukážky Claude/MCP. Sú vložené do príslušných sekcií. CRM používa CSS výrez okolo celého telefónu; jeho originál sa nemení. Náhľady sa dajú zväčšiť, MCP navyše otvoriť ako originálny súbor. V POS galérii je všetkých 9 súborov zo schváleného priečinka. Pás používa všetkých 14 log v dvoch rovnakých skupinách pre neprerušovaný cyklus, s pauzou a režimom obmedzeného pohybu.
