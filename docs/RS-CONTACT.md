# Kontakt – banner 28

Každý záznam je jedna osoba. `name` je meno. Obrázok je voliteľný portrét.
Pole `text` obsahuje zoznam v tomto poradí:

```html
<ul>
<li>Pozícia</li>
<li>meno@horecagroup.sk</li>
<li>+421 52 787 1911</li>
</ul>
```

E-mail a telefón sa prevedú na aktívne odkazy; fungujú aj hodnoty vložené v odkaze vnútri `li`. HTML sa nevykresľuje priamo, text sa escapuje. Bez záznamov zostávajú pôvodné tri kontakty.

## Cloudflare – zatiaľ neaktivované

Repozitár obsahuje šablónu, nie implementáciu `contacForm` a odosielací endpoint. Ochrana vyžaduje prístup k serverovej implementácii a Cloudflare konfigurácii.

- Zapnúť Email Address Obfuscation pre proxovanú doménu; overiť výsledné HTML kontaktu vrátane spoločného headera/footeru.
- Vytvoriť Turnstile widget pre produkčnú a staging doménu. Site key patrí do verejnej konfigurácie, secret iba do serverového prostredia.
- Pridať token do existujúcej AJAX požiadavky a povinne overiť Siteverify na existujúcom odosielacom endpointe pred poslaním e-mailu; kontrolovať success, hostname a action. Chýbajúci, neplatný, expirovaný alebo opakovane použitý token odmietnuť.
- Po spracovaní obnoviť token; zachovať údaje pri chybe. Serverovo obmedziť frekvenciu odosielania.
- Overiť odmietnutie priamych POST požiadaviek bez tokenu a úspešné doručenie legitímneho formulára.

Samotný klientsky widget nie je antispam. Obfuskácia znižuje jednoduché zbieranie adries, nezaručuje ochranu pred všetkými scrapermi.
