# Čisté URL a explicitné šablóny RS

Používateľ 2. 10. 2026 schválil určovanie typu stránky cez select `rs_template` v detaile článku, nie cez GET parametre.

| ID navrhnuté v repozitári | Názov v RS | Vstupný súbor | Účel |
|---|---|---|---|
| 14 | Problémy a riešenia | page_14.php | Jednotlivý odborný článok, súvisiace moduly a schéma |
| 15 | Modul – podstránka | page_15.php | Produktový detail, obrázok, funkcie, prípady z praxe a schéma |
| 16 | Blog – bežný | page_16.php | Bežný blogový článok s existujúcimi reakciami a funkciami |
| 17 | Prehľad problémov a riešení | page_17.php | Samostatný verejný archív /problemy-a-riesenia/ |

**Registrácia v administrácii a priradenie v DB ešte neprebehli.** V repozitári neboli súbory page_14 až page_17; obsadenosť čísel v serverovej registrácii sa musí overiť. Ak sú obsadené, vybrať voľné čísla a zosúladiť názvy súborov, explicitný dispatch v page.php, hg-editorial.php, podmienky v header.php a bežnom blogovom tele. Neupravovať existujúce nesúvisiace šablóny.

## Atómové nasadenie v Cursore

1. Zálohovať DB a existujúce serverové súbory. Overiť registráciu selectu `rs_template` a front controller. Nekonštruovať SQL podľa odhadnutých názvov tabuliek.
2. Zaregistrovať uvedené šablóny. Použiť existujúci mechanizmus RS pre header + page_ID.php + footer. Nové page_14 až page_17 obsahujú iba telo, nie druhé html/head/body. Existujúci samostatný hg-module-entry.php musí odovzdať záznamy so šablónou 15 štandardnému dispatcheru; nesmie ich predbehnúť podľa ellipse_meta.type alebo URL.
3. Priradiť 20 overeným modulom z docs/seo/payload.json (kind=module, ID 240–259) šablónu 15. Priradiť 34 riešeniam (kind=solution, explicitné ID v JSON) šablónu 14. Bežným blogovým článkom priradiť 16 až po overení obsahu a kategórie; neprepísať formuláre, galérie či iné špeciálne stránky.
4. Vytvoriť alebo overiť verejný RS záznam s SEF `problemy-a-riesenia`, šablónou 17, názvom „Problémy a riešenia z hotelovej a gastro praxe“, title „Riešenia z praxe pre hotely a gastro | Ellipse“ a description „Konkrétne situácie z hotelov, reštaurácií a wellness. Postupy z praxe a moduly Ellipse pre rezervácie, platby, sklad aj tím.“. Pred zapnutím odkazov musí URL vracať správny archív s HTTP 200.
5. Až s pripraveným routovaním nasadiť celú súvisiacu sadu šablón z vetvy. Dôležité sú nové hg-module-body.php a hg-blog-article.php; page.php a samostatná modulová stránka ich zdieľajú. Schémy, hlavičky, blog.php, menu, carousel a os-home.php sú súčasťou rovnakého nasadenia.
6. Staré /blog/?tema=problemy presmeruje header 301 na čistý archív; /blog/?riesenie=... na konkrétny SEF; /?modul=... už smeruje na RS modul. Nové interné odkazy tieto parametre negenerujú. Starý prevadzka parameter JS jednorazovo načíta do localStorage a odstráni z adresy cez history.replaceState; canonical zostáva čistý. Prepnutie typu prevádzky URL nemení.
7. Stránkovanie bežného blogu generuje backend RS ako content.pagination, ktorý nie je v repozitári. Na serveri zabezpečiť napr. /blog/strana/2/ aj jeho route, self-canonical jednotlivých strán a 301 zo starého stránkovania. Neskrývať všetky strany canonicalom na prvú stranu. Parametre formulárov, vyhľadávania a UTM nie sú šablóny článkov a netreba ich slepo odstraňovať.
8. Po priradení šablón odstrániť staré rozpoznávanie podľa SEF/ID z front controlleru. V page.php zostáva iba dočasná kompatibilita pre staré nepriradené záznamy; explicitná voľba 14–17 má vždy prednosť. Zmena šablóny v RS musí zmeniť layout bez zmeny URL.

## Kontrola

- Každý zo štyroch typov má jeden head/body/main a jeden H1; modulový detail nemá vnorenú kompletnú HTML stránku.
- Prepnutie `rs_template` v RS nemá zmeniť ID, SEF, obsah, reakcie, autora ani dátumy.
- Priame otvorenie detailu funguje bez GET parametrov aj bez localStorage; schéma potom použije predvolený segment.
- Stará URL s prevadzka si zachová výber a skončí s čistou adresou; bežné kliknutie, otvorenie odkazu do novej karty aj klávesnica fungujú.
- Noindex stagingu zostáva zapnutý. Produkčná indexácia je samostatný krok.
- Generický SSH deploy bol zablokovaný v deploy_template.py, pretože samotná výmena PHP súborov bez registrácie archívu by vytvorila nefunkčné odkazy. Použiť tento serverový postup.
