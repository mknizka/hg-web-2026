# Produktové podstránky Ellipse — audit a príprava

Dátum: 24. 9. 2026. Rozsah: 26 cieľových stránok produktového a automatizačného menu pôvodného webu, článok o MCP, aktuálna lokálna šablóna nového webu a schválené produktové screenshoty. Výsledok: 33 obsahových konceptov. Toto je príprava na redakčné spracovanie a integráciu; nie potvrdenie, že všetky stránky sú publikované alebo že všetky funkcie boli otestované.

## Hlavné zistenia

1. **Nesúlad adries.** Nová téma používa `/hotelovy-system/`, `/web-booking/`, `/virtualna-recepcia-ella-ai/` a `/vynosovy-modul-revpro/`. Pôvodné menu vedie na `/pms-hotelovy-rezervacny-system/`, `/booking-engine/`, `/virtualna-recepcna-ella/` a `/sofistikovany-revenue-modul-ellipse-revpro/`. Nie je overené, či kratšie adresy predstavujú alias, samostatný záznam alebo chýbajúcu stránku. Pred zásahom načítať ID/SEF z RS; zachovať pôvodnú kanonickú URL. Nezavádzať plošné presmerovania bez mapovania.
2. **Produkty zastúpené článkom.** Marketing, Foodie a automatizácia účtovníctva sú v menu odkazované na blogový článok. Vytvoriť samostatné produktové koncepty a články ponechať s pôvodnou adresou, obsahom, reakciami a históriou. Rovnaký postup pre MCP.
3. **Nejasné rozdelenie produktov.** Rozlíšiť reporting Pickup od cenového automatu revPRO; administračný kalendár služieb od zákazníckeho Timi; registráciu check-in od celej hosťovskej aplikácie; gastro systém od mobilnej POS aplikácie a hardvéru. Roomie neoznačovať za zrušené ani nahradené Team bez potvrdenia.
4. **Slabé vysvetlenie prínosu.** Častý vzor starého webu: všeobecný nadpis, obrázok, dlhý zoznam funkcií, všeobecné demo. Nový návrh: konkrétna situácia, reálna obrazovka, pracovný postup, výsledok a tematické demo.
5. **Obsah na overenie.** Starý web opakuje 500+ klientov, 99,99 % dostupnosť a 45 % zvýšenie predaja. Mailing sľubuje úsporu 80 %, revPRO uvádza percentuálny rast. Bez obdobia, metodiky a podkladu čísla nepreberať. Pri Ella overiť cenník, províziu, viazanosť a označenie „predbežný záujem“. Marketingový článok obsahuje budúce funkcie; nevydávať ich za dostupné.
6. **Ukážky musia dokazovať konkrétny produkt.** Časť starých alt popisov odkazuje na iný modul. Nový balík priraďuje originálny booking, klientsky CRM účet, 9 POS obrazoviek, 9 Team obrazoviek a oba Claude/MCP screenshoty. Chýbajúce médiá sú označené; nenahrádzame ich nesúvisiacim PMS obrázkom.
7. **MCP odlíšiť od Elly.** Ella komunikuje s hosťom; MCP podporuje prácu manažéra v externom AI klientovi. Pôvodný MCP článok spomína aj voliteľný zápis cien, preto nový web nemá všeobecne tvrdiť, že MCP vie výlučne čítať. Retenciu dát externého AI klienta nemožno garantovať marketingovým textom Ellipse.

## Audit pripravenej šablóny

Kontrolované súbory: `hg-product-page.php`, `hg-editorial.php`, `hg_nav.php`, `header.php`, `page.php` a dokumentácia kompatibility.

- Šablóna už zachováva text z RS, breadcrumb, hero, CTA a súvisiace produkty. Typografia 650 pre veľké nadpisy a 600 pre malé popisy zostáva záväzná. Ikony iba čisté jednofarebné SVG.
- Rozpoznávanie produktu explicitne pozná len niekoľko krátkych SEF a template 13. Overiť všetky existujúce ID a ich template; blogové články nepreklasifikovať automaticky.
- Súvisiace produkty sú dnes rovnaké štyri odkazy pre všetky moduly. Nahradiť výberom `related_keys` podľa témy a vyradiť vlastný produkt.
- Doplniť vlastné prínosy, postup, detailné funkcie, galériu, FAQ a záverečné CTA. Sekcie bez obsahu nevykresliť. Žiadne prázdne karty alebo predstierané ukážky.
- Produktový obrázok potrebuje rovnaký fallback `{id}-01.{file_type}` ako blog, rozmery a možnosť zväčšenia. Hero načítať prioritne, ostatné lazy.
- Existujúci HTML obsah zostáva ako kompatibilný fallback. Nepoužívať globálne CSS selektory zasahujúce staré články.
- Kontrola starého a nového obsahu v tomto kroku je obsahová a zdrojová. Nejde o kompletný vizuálny audit všetkých URL a viewportov. Indexovaná verzia Roomie je stará; aktuálnosť potvrdiť z RS.

## Rozloženie produktovej stránky

| Poradie | Obsah | Úloha |
|---|---|---|
| 1 | Breadcrumb, názov modulu, silný H1, dvojvetový úvod, tematické demo | Jasne vysvetliť, komu produkt pomáha |
| 2 | Veľký reálny screenshot alebo mobilné ukážky | Ukázať produkt čitateľne, so zväčšením |
| 3 | Tri konkrétne prínosy | Spojiť funkcie s každodennou prácou |
| 4 | Postup v troch krokoch | Vysvetliť spoluprácu hosťa a prevádzky |
| 5 | Dve až štyri podrobné funkčné sekcie so screenshotmi | Rozvinúť odlišnosti produktu |
| 6 | Relevantná referencia alebo prípadová štúdia | Doložiť použitie; iba overená citácia a čísla |
| 7 | Tri súvisiace moduly a články o probléme | Ukázať ďalší krok v ekosystéme |
| 8 | FAQ a konkrétna výzva na demo | Odstrániť bariéry pred kontaktom |

Desktop: obsah do 1200 px, titulok s obrazovkou podľa orientácie média; široké desktopové screenshoty pod úvodom. Mobil: prirodzené poradie, jeden plnohodnotný screen, ďalšie vodorovne s tlačidlami. Žiadne drobné screenshotové koláže. Galéria ovládateľná klávesnicou, viditeľný focus, alternatívne texty, rešpektovanie reduced-motion. Žiadne emoji, falošné čísla, vymyslené referencie alebo neoverené logo partnerstva.

## Súbory

- `content-pack.sk.json`: 33 konceptov so SEO, H1, úvodom, prínosmi, postupom, médiami, FAQ, súvisiacimi modulmi a otvorenými bodmi.
- `url-map.csv`: zdrojová URL, navrhovaný cieľ a operácia; nové adresy sú návrhy, nie overené živé URL.
- `preview.html`: prehliadateľný návrh layoutu a konceptov všetkých modulov; nejde o pripojený RS.
- `RS_API_HANDOFF.md`: podmienky mapovania a bezpečnej úpravy existujúcich záznamov.

Obsahové koncepty sú prvý redakčný základ, nie finálne dlhé texty všetkých funkcií. Individuálne otvorené body sú pri každom module. Publikovať až po mapovaní na RS, doplnení potrebných médií a overení označených produktových faktov. Priamy prístup do existujúcej databázy ani zápis cez API sa v tomto kroku nevykonal.

## Inventár jednotlivých modulov

| Modul | Zdroj | Hlavná úprava | Priorita |
|---|---|---|---|
| Hotelový PMS | [Pôvodná stránka](https://www.horecagroup.sk/pms-hotelovy-rezervacny-system/) | Superlatív v úvode, staršie ukážky, chýba denný pracovný scenár. | P1 |
| Booking engine | [Pôvodná stránka](https://www.horecagroup.sk/booking-engine/) | Dlhý zoznam funkcií bez viditeľného nákupného postupu. | P1 |
| Channel manager | [Pôvodná stránka](https://www.horecagroup.sk/channel-manager/) | XML a iCal sú prezentované bez jasného rozlíšenia možností. | P2 |
| Ellipse revPRO | [Pôvodná stránka](https://www.horecagroup.sk/sofistikovany-revenue-modul-ellipse-revpro/) | Preťažený úvod a percentuálne prísľuby výnosov bez metodiky. | P1 |
| Ella AI | [Pôvodná stránka](https://www.horecagroup.sk/virtualna-recepcna-ella/) | Technológie prevažujú nad prínosom. Formulár hovorí o predbežnom záujme. | P2 |
| Marketingová analytika | [Pôvodná stránka](https://www.horecagroup.sk/marketingovy-modul-priamo-v-hotelovom-systeme-ellipse-prinasa-unikatnu-vizualizaciu-vasich-dat-z-online-kampani/) | Produkt zastupuje blogový článok s budúcimi prísľubmi. | P2 |
| Rezervácie služieb | [Pôvodná stránka](https://www.horecagroup.sk/casove-rezervacie-sluzieb/) | Časť textu kopíruje všeobecný booking, nevysvetľuje prácu obsluhy. | P2 |
| Kurzy a skupinové podujatia | [Pôvodná stránka](https://www.horecagroup.sk/rezervacie-kurzov-jogy-podujati-a-skupinovych-cviceni/) | Opakovaný text z booking enginu zatieňuje špecifiká kurzov. | P2 |
| Pickup a reporting | [Pôvodná stránka](https://www.horecagroup.sk/pickup-dashboard-a-vynosovy-manazment/) | Prekrýva sa s revPRO; návštevník nerozozná reporting od automatu. | P2 |
| Majiteľský modul | [Pôvodná stránka](https://www.horecagroup.sk/majitelsky-modul-a-aplikacie-na-mieru/) | Chýba ukážka pohľadu majiteľa a konkrétny príklad vyúčtovania. | P2 |
| Reštauračný systém | [Pôvodná stránka](https://www.horecagroup.sk/restauracia-gastronomia-skladove-hospodarstvo/) | Sklad a kasa sú zmiešané do jedného zoznamu, obrázky majú nepresné popisy. | P1 |
| Foodie a QR objednávky | [Pôvodná stránka](https://www.horecagroup.sk/novy-modul-foodie-room-service-qr-kody-v-restauracii/) | Produkt je iba v blogovej novinke; chýba samostatný predajný vstup. | P2 |
| Kongresový a eventový modul | [Pôvodná stránka](https://www.horecagroup.sk/eventovy-modul-planovanie-skoleni-a-cenove-ponuky/) | Chýba súvislý príbeh obchodník – recepcia – kuchyňa. | P2 |
| CRM a vernostný systém | [Pôvodná stránka](https://www.horecagroup.sk/vernostny-system-a-kreditne-cerpanie-sluzieb/) | Silná téma bez zrozumiteľnej ukážky účtu a priebehu čerpania. | P1 |
| Webové stránky pre hotely | [Pôvodná stránka](https://www.horecagroup.sk/moderne-webove-stranky/) | Absolútne tvrdenia o technológiách a konverzii nahradiť konkrétnymi ukážkami. | P2 |
| PIN a prístupové systémy | [Pôvodná stránka](https://www.horecagroup.sk/inteligentne-zamkove-a-pristupove-systemy-s-moznostou-pristupu-na-pin-kod/) | Číselné tvrdenia o kompatibilite a batériách bez modelového kontextu. | P2 |
| Prepojenie účtovníctva | [Pôvodná stránka](https://www.horecagroup.sk/automaticke-uctovanie-vynosov-z-hoteloveho-systemu-ellipse-ake-mame-moznosti-co-vsetko-je-mozne-prenasat-ake-typy-prenosov-system-ponuka/) | Dobrý odborný článok potrebuje vlastnú stručnú produktovú stránku. | P2 |
| Pokladne a terminály | [Pôvodná stránka](https://www.horecagroup.sk/smart-pokladnicne-riesenia-pre-vas-biznis/) | Zamieňa softvér POS s hardvérom a platobnými službami. | P2 |
| Online check-in | [Pôvodná stránka](https://www.horecagroup.sk/online-check-in/) | Staršia prezentácia neukazuje súčasnú mobilnú cestu hosťa. | P1 |
| Hosťovská aplikácia | [Pôvodná stránka](https://www.horecagroup.sk/on-board/) | Názov On-board nie je zladený s dnešnou prezentáciou Guest Journey. | P2 |
| Housekeeping a údržba | [Pôvodná stránka](https://www.horecagroup.sk/roomie/) | Dostupná indexovaná verzia je stará; vzťah Roomie a Team nie je vysvetlený. | P2 |
| Timi – online predaj služieb | [Pôvodná stránka](https://www.horecagroup.sk/timi-booking-engine-pre-rezervacie-sluzieb/) | Má pôsobiť ako zákaznícka strana rezervácií služieb, nie druhý totožný modul. | P2 |
| Recenzie a reputácia | [Pôvodná stránka](https://www.horecagroup.sk/hodnotenia-hosti/) | Stará stránka opisuje vlastné hodnotenia; dnešný brief aj portály a AI. | P2 |
| Automatická komunikácia | [Pôvodná stránka](https://www.horecagroup.sk/automaticky-mailing/) | Tvrdenie o 80 % úspore nemá na stránke uvedenú metodiku. | P2 |
| Online platby | [Pôvodná stránka](https://www.horecagroup.sk/online-platby/) | Príliš stručný obsah a všeobecné bezpečnostné superlatívy. | P2 |
| Otvorené API | [Pôvodná stránka](https://www.horecagroup.sk/otvorene-api/) | Chýbajú konkrétne scenáre a jasný vstup do dokumentácie. | P2 |
| Ellipse Team | Nová stránka podľa zadania | Chýba samostatná stránka s reálnymi mobilnými obrazovkami. | P1 |
| Ellipse POS | Nová stránka podľa zadania | Nová aplikácia potrebuje vlastný priestor oddelený od hardvéru. | P1 |
| Ellipse MCP | [Pôvodná stránka](https://www.horecagroup.sk/napojte-si-ellipse-data-cez-mcp-konektor-do-sveta-ai-a-vytazte-maximum-z-analyz-a-brainstormingu/) | MCP je skryté v článku a odkazoch na Ellu, hoci rieši inú potrebu. | P1 |
| Centrálny hub správ | Nová stránka podľa zadania | Nová homepage tému obsahuje, ale chýba samostatná produktová stránka. | P2 |
| Sklady a kalkulácie | Nová stránka podľa zadania | Významný modul je schovaný pod reštauračným systémom. | P2 |
| Darčekové poukazy | Nová stránka podľa zadania | Poukazy sú roztrúsené medzi bookingom a referenciami. | P2 |
| Vstupy a aquaparky | Nová stránka podľa zadania | Nový web odkazuje na tému bez overenej produktovej adresy v pôvodnom menu. | P2 |

## Otvorené produktové fakty

- **Hotelový PMS:** Potvrdiť aktuálne role a rozsah reportov.
- **Booking engine:** Spresniť rozsah nulovej provízie a samostatné platobné poplatky.
- **Channel manager:** Overiť zoznam kanálov, frekvenciu prenosu a metodiku 99,99 %.
- **Ellipse revPRO:** Potvrdiť frekvenciu prepočtov a aktuálny rozsah AI analýzy.
- **Ella AI:** Potvrdiť ceny, viazanosť, províziu a dostupnosť jednotlivých úkonov.
- **Marketingová analytika:** Overiť meranie konverzií a či už možno meniť kampane priamo v Ellipse.
- **Rezervácie služieb:** Upresniť konflikty zdrojov, personálu a miestností.
- **Kurzy a skupinové podujatia:** Overiť pravidlá náhradných termínov a permanentiek.
- **Pickup a reporting:** Potvrdiť rozdiel medzi základným reportingom a plateným revPRO.
- **Majiteľský modul:** Oddeliť štandardné možnosti od vývoja na mieru.
- **Reštauračný systém:** Overiť hardvér, tlačiarne a správanie pri výpadku spojenia.
- **Foodie a QR objednávky:** Potvrdiť platobné možnosti a overovanie hosťa pri platbe na izbu.
- **Kongresový a eventový modul:** Overiť prácu s opciami, zálohami a verziami ponuky.
- **CRM a vernostný systém:** Potvrdiť aktuálne typy odmien a pravidlá ich kombinovania.
- **Webové stránky pre hotely:** Overiť aktuálne šablóny, rozsah balíkov a podmienky údržby.
- **PIN a prístupové systémy:** Potvrdiť podporované zámky, núdzový postup a montážne podmienky.
- **Prepojenie účtovníctva:** Overiť konektory, náklady implementácie a kontrolu chýb.
- **Pokladne a terminály:** Potvrdiť aktuálne zariadenia a dostupnosť partnerských integrácií.
- **Online check-in:** Aktualizovať rozsah overenia identity; nepoužiť všeobecný prísľub právneho súladu.
- **Hosťovská aplikácia:** Potvrdiť produktový názov a podmienky zmien či storna pobytu.
- **Housekeeping a údržba:** Potvrdiť súčasný názov, dostupnosť Roomie a rozdelenie funkcií s Team.
- **Timi – online predaj služieb:** Potvrdiť používanie názvu Timi v aktuálnom produkte.
- **Recenzie a reputácia:** Overiť portály, podporu odpovedí a spôsob schvaľovania AI návrhov.
- **Automatická komunikácia:** Overiť kanály doručovania, jazykové šablóny a oddelenie marketingových súhlasov.
- **Online platby:** Potvrdiť brány, meny, refundácie a poplatky podľa partnera.
- **Otvorené API:** Overiť aktuálnu autentifikáciu a limity podľa API, nie zo starého textu.
- **Ellipse Team:** Potvrdiť funkcie podľa rolí, odkazy obchodov a rozdiely iOS/Android.
- **Ellipse POS:** Potvrdiť distribúciu aplikácie, zariadenia a platobné integrácie.
- **Ellipse MCP:** Potvrdiť podporovaných klientov a podmienky zápisu cien.
- **Centrálny hub správ:** Potvrdiť Booking.com, Expedia, Airbnb, Vrbo a obmedzenia ich správ.
- **Sklady a kalkulácie:** Potvrdiť aktuálne mobilné postupy a importné formáty.
- **Darčekové poukazy:** Potvrdiť typy poukazov, čiastočné čerpanie a spôsob účtovania.
- **Vstupy a aquaparky:** Potvrdiť turnikety, RFID/QR, permanentky a kapacitné obmedzenia.
