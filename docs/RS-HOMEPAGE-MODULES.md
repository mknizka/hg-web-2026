# Homepage: moduly a integrácie

Moduly číta `hg-module-tour.php` z RS bannerov kategórie **20 – Karty platformy**.
Polia: `name` = nadpis a záložka, `text` = popis (obyčajný text), `link` = cieľ CTA,
obrázok = nahratý obrázok bannera (`/img/ilustrations/20_ID.EXT`).
CTA má jednotný text „Objaviť modul“.

Poradie bannerov z funkcie banner(20) zodpovedá týmto 14 pozíciám:
1. PMS rezervačný systém
2. Web booking
3. Channel manager 250+ OTAs + GDS
4. Pokladničné a POS systémy
5. CRM vernostný systém
6. Časové rezervácie
7. Ellipse Team
8. Ellipse POS
9. revPRO
10. Ella chatbot AI
11. Kongresový modul
12. Reviews a messages
13. Webové stránky
14. MCP konektor

Prázdne polia a chýbajúce pozície použijú fallback `hg-modules.json`.
Pre stabilné priradenie udržiavajte všetkých 14 pozícií v tomto poradí.
Tento commit neimportuje ani nemení záznamy bannerov v DB.
Team zatiaľ odkazuje na existujúci detail majiteľského modulu/aplikácií;
POS na existujúci detail POS systémov. Po publikovaní samostatných detailov
možno odkazy zmeniť v RS.

Autoplay: 6,5 sekundy; beží len vo viditeľnej sekcii a aktívnej karte prehliadača.
Hover/focus dočasne pozastaví, ručný výber záložky ho zastaví do reloadu.
Pri reduced-motion je predvolene vypnutý. Záložky podporujú šípky/Home/End.

Integrátori a partneri: **banner 8**, obrázok a názov sa načítajú z RS.
Dve identické skupiny majú pevné rozmery a rozostupy, nezávislé pozastavenie.
Prehľad 42 integrácií je v `hg-integrations.json` podľa dodaných podkladov.
Pôvodné produktové galérie zostávajú v rozbaliteľnej sekcii pod modulmi.
