# Riešenia z praxe

Zdroj: `template/ellipse/files/hg-solutions.json`, 34 článkov z používateľom
schváleného gemini-code-1790319295733.json. Opravené neescapované úvodzovky
v HTML reťazci, texty zachované. ID 1–34 sú lokálne ID zdroja, NIE ID RS.

Homepage zobrazuje všetky témy po šiestich v gride 3×2.
`/blog/?tema=problemy` je zoznam; `/blog/?riesenie=SLUG` detail.
Bežný blog zostáva napojený na pôvodnú DB. Toto nasadenie nemení DB.
Pri budúcom API importe vytvárajte/matchujte podľa slug; nikdy neprepisujte
existujúce články podľa lokálnych čísel ID.

Pole `cover` prijíma relatívnu URL od koreňa alebo HTTPS URL.
Obrázok používa footer carousel aj detail. Bez obrázka footer zobrazuje číslo.
Odporúčaný cover 1200×675; v kompaktnej karte sa oreže na štvorec.
Všetky podstránky so spoločným hg_foot.php zobrazujú carousel pred demo CTA.
Homepage používa priamo hg-footer.php, preto carousel nemá duplicitne.

Kontaktná stránka používa pôvodný contacForm aj pôvodný serverový endpoint.
Doplnené labely, autocomplete, typy email/tel, native button a aria-live status.
Povinné polia sú pôvodné: e-mail a text. Ostatné sú označené ako nepovinné.
