# Produktové a blogové podstránky

## Produkt: page_13.php

Spoločná šablóna `template/ellipse/files/hg-product-page.php`; vstupný súbor `page_13.php`.
PMS (ID 44, existujúca šablóna 4) ju používa priamo. Ostatné existujúce stránky v šablóne 4 ostávajú bez zmeny.

### Layout
1. Breadcrumb, produktový názov, perex, demo a odkaz na funkcie.
2. Veľký hlavný obrázok z RS.
3. Navigácia: funkcie, prepojené moduly, demo.
4. Celý formátovaný obsah z editora: H2/H3, odseky, zoznamy, ukážky, video, tabuľky.
5. Súvisiace moduly (aktuálna stránka sa vynechá podľa SEF).
6. Záverečná výzva na demo.

### Existujúce polia RS
| Pole | Použitie |
|---|---|
| `name` | H1, breadcrumb, alt hlavného obrázka |
| `parex_text` | Perex; pri prázdnom poli sa použije description |
| `description` | Existujúci meta popis a záložný perex |
| `id`, `file_type` | Hlavný obrázok `/img/rs/{id}.{file_type}` |
| `text[0]` | Kompletný HTML obsah editora bez jeho prepisovania |
| `sef` | Existujúca URL; vyradenie aktuálneho produktu zo súvisiacich |
| `rs_template` | Produktová šablóna 13 |

Pre reštauračný systém, CRM/vernosť a ďalšie moduly vyplniť tieto polia a priradiť šablónu 13. Ak správca RS šablónu 13 ešte neponúka, treba ju zaregistrovať v jeho zozname šablón. Backend a administrácia nie sú súčasťou tohto repozitára; ich registrácia nebola vykonaná ani overená. Nevyžaduje sa nová DB tabuľka ani migrácia obsahu.

Odporúčaná osnova textu pre každý modul: úvodný problém → 3 hlavné prínosy → detailné funkcie s reálnymi screenshotmi → bežný pracovný postup → napojenia → FAQ. Prázdny obsah sa nevypĺňa vymyslenými funkciami. PMS má základný fallback pre ID 44.

## Blog: page.php

Zostáva existujúca šablóna s pôvodnými funkciami reakcií, zdieľania, audio prehrávania, obsahu článku a priebehu čítania. Existujúce výnimky pre Ella AI (180), galériu (68) a formuláre (84, 88) sú zachované.

Nové časti: perex z parex_text, hlavný obrázok, orientačný čas čítania (200 slov/min), čitateľný hlavný stĺpec a bočný panel. Dve odlišné CTA sa vyberú náhodne pri serverovom renderovaní zo schváleného interného zoznamu v `hg-editorial.php`. Cache môže výber podržať. Prvá CTA sa pri aspoň šiestich dlhších odsekoch presunie približne do stredu medzi priame odseky; inak zostane pod textom. Druhá je na konci. JS nemení uložený obsah RS.

Reakcie naďalej zapisuje pôvodný backend; tento update nemení jeho endpointy ani počítadlá. Ich zápis sa netestuje kliknutím na živom článku, aby nevznikali falošné reakcie.

## Súbory a nastavenia
- `hg-editorial.css`: produkt a blog, izolované selektory.
- `hg-editorial.js`: umiestnenie CTA a lazy loading obrázkov v obsahu.
- `hg-typography.css`: veľké nadpisy 650, malé kicker nadpisy 600.
- Header načítava variabilný Montserrat 300–800; šablóna 13 a PMS nie sú označované ako blogový Article v pôvodnej schéme.
- Verejné URL existujúcich stránok sa nemenia.
