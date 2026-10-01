# Import 34 riešení do bežných článkov RS

Pripravené podľa RS-FEED-API.md. Zápis vyžaduje existujúci `rs_feed_token`.
Token nevkladať do repozitára, URL ani JSON. Importér ho načíta z premennej
`RS_FEED_TOKEN` alebo zo skrytého terminálového vstupu.

## Hotová príprava

- `solutions-payload.json`: 34 plných článkov, názov, perex, HTML, SEO a kategória.
- Zdrojové číselné ID sú poradové čísla JSON, **nie RS ID**; neposielajú sa.
- Názov kategórie: Aké HORECA problémy Ellipse rieši; SEF `ako-ellipse-pomaha`.
- Články sú už verejné; import zachováva publikovaný stav `status: 1`.
- Odstraňuje sa iba duplicitné H1; zvyšok textu zostáva zachovaný.
- Pred importom sa overia kolízie SEF. Existujúci odlišný obsah sa neprepíše.
- Fotobanky sa automaticky nevolajú. Aktuálnych 34 položiek nemá cover;
  obrázky možno doplniť v bežnom RS.

## Spustenie

```bash
python3 scripts/rs-import/import_solutions.py
python3 scripts/rs-import/import_solutions.py --apply
```

Druhý príkaz si vypýta token bez zobrazenia na obrazovke. Používa len
`https://n.horecagroup.sk/api/rs/`. Pri 401 sa zastaví.

Po úspešnom POST nasleduje GET kontrola všetkých článkov. Až potom vznikne
`template/ellipse/files/hg-solutions-rs.json` so skutočnými RS ID a category_id.
Pri neúplnej dávke alebo neznámom formáte odpovede sa manifest nevytvorí.
Pred opakovaním čiastočne úspešného importu overiť vytvorené záznamy v RS.

## Aktivácia webu

Nasadiť adaptér a overený manifest spolu do `qa/mobile-performance-v1`.
Bez manifestu zostáva starý obsah, aby nič nezmizlo pred dokončeným importom.
Po aktivácii zoznam aj karusely čítajú kategóriu cez `rs_last_articles`.
Názov, perex, popis a obrázok sa berú z RS; telo sa zobrazuje cez bežnú stránku
článku. Nové články pridané do kategórie sa zobrazia automaticky.
Roly pri pôvodných 34 článkoch zostávajú pomocné metadáta v JSON, pretože API
nepopisuje editor vlastných rolí. Nie sú náhradou obsahu článkov.

Staré `?riesenie=slug` odkazy presmeruje header na aktuálny natívny SEF.
Nezverejnené alebo vymazané články sa z JSON znovu neobnovujú.
Overiť: všetkých 34 článkov v RS, prvý a posledný detail, titulný obrázok,
úpravu názvu/perexu v RS, starý odkaz, homepage a footer carousel.
