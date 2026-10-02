"""Reviewed expansion from nine owner-supplied voice-note transcripts, 2026-10-02."""
import copy, html, json, pathlib, re

ROOT = pathlib.Path(__file__).resolve().parents[2]
entries = {}
def case(ordinal, source, opening, sections):
    entries[ordinal] = dict(source=source, opening=opening, sections=sections)

case(1, 'Bezobslužný príchod a self check-in',
 'Pri rozhovoroch s ubytovateľmi riešime čoraz častejšie skrátenú recepčnú službu aj ubytovanie bez stálej fyzickej recepcie. Nie každý hotel chce rovnaký režim: niekde recepcia funguje iba počas časti dňa, inde má byť bežný príchod úplne samoobslužný. V oboch prípadoch potrebujeme spojiť tri veci: údaje a overenie hosťa, požadovanú úhradu a prístup do izby. Ak jedna časť zostane mimo rezervácie, problém sa iba presunie na človeka, ktorý v noci zdvihne telefón.',
 [
 ('Tri úkony recepcie, jedna rezervácia', [
 'V Ellipse preto neriešime online check-in ako samostatný formulár. Údaje možno predvyplniť pomocou OCR z dokladu a pri zodpovedajúcom nastavení doplniť overovací krok s porovnaním fotografie. Stav procesu sa prenáša k pobytu v PMS, aby recepcia alebo manažér videli, čo hosť dokončil a čo ešte chýba. OCR znižuje prepisovanie; samo osebe nie je zárukou pravosti dokladu ani totožnosti človeka.',
 'Druhým krokom je Ellipse Pay. Hosť môže zaplatiť pred cestou alebo pri príchode cez podporované samoobslužné zariadenie. Kiosk s platobnou funkcionalitou má vychádzať zo zostatku konkrétneho pobytu, nie pýtať vopred nastavenú všeobecnú sumu. Platba kartou, mobilom či hodinkami potom nadväzuje na ten istý hotelový účet.'
 ]),
 ('PIN môže byť pripravený vopred, doručený až po splnení pravidiel', [
 'Pri podporovaných online kľučkách vieme pripraviť PIN platný na obdobie pobytu a jeho doručenie oddeliť od samotného vytvorenia. Podmienky si určí ubytovateľ: niekde vyžaduje dohodnutú zálohu a dokončenie check-inu jednej osoby, inde úhradu celého zostatku vrátane príslušných poplatkov a spracovanie všetkých ubytovaných osôb. Tieto nastavenia treba zosúladiť s povinnosťami konkrétnej prevádzky.',
 'Práve toto rozlíšenie je podstatné. Automatizácia nemá rozhodovať podľa toho, či hosť otvoril e-mail, ale podľa splnených podmienok na rezervácii. Pri zmene izby alebo termínu sa musí upraviť aj príslušný prístup.'
 ]),
 ('Bez stáleho pultu neznamená bez komunikácie', [
 'V praxi hosť aj po samoobslužnom príchode potrebuje upraviť fakturačné údaje alebo sa na niečo opýtať. V Ellipse Team sústredíme aj komunikáciu z podporovaných portálov, ktoré sprístupňujú Messaging API. Manažér dostáva notifikácie do mobilu a nemusí kvôli každej správe otvárať samostatný extranet. Automatika vybaví štandardný priebeh; človek zostáva dostupný tam, kde je potrebné rozhodnutie.'
 ])])

case(2, 'Flow aquaparkového rezortu',
 'Pri prvých návštevách aquaparkových rezortov sa stretávame s paradoxom: čím bohatšia ponuka pre hosťa, tým viac systémov musí obsluhovať recepcia. Izba, wellness, bazén a reštaurácia môžu znamenať tri či štyri rôzne nosiče alebo evidencie. Hosť pritom nekupuje jednotlivé systémy, ale jeden pobyt. Naším cieľom je spojiť tieto procesy pod jeden náramok a spoločnú evidenciu, pokiaľ to podporuje použité prístupové vybavenie.',
 [
 ('Rodinná QR vstupenka sa na mieste zmení na náramky', [
 'Proces môže začať pri pokladni, ale aj online. Rodina si na webe kúpi vstup a dostane QR kód. Obsluha ho pri príchode overí a vydá príslušný počet RFID náramkov. Rovnaká evidencia tak spája online objednávku, platbu a fyzický vstup do areálu; rezervácia sa na pokladni nevytvára odznova.',
 'Vstupné čítačky môžu podľa vybavenia pracovať s QR aj RFID. Náramok následne sprístupní zakúpené zóny. Pri doplnkovej zóne, napríklad wellness, možno nastaviť doúčtovanie podľa pravidiel areálu. Hosť musí vedieť ešte pred vstupom, čo má v cene a čo vytvorí ďalšiu spotrebu.'
 ]),
 ('Ten istý nosič pre izbu aj konzum', [
 'Ak je súčasťou areálu hotel, náramok môže pri kompatibilných zámkoch slúžiť aj na hotelovú izbu a prechodové dvere. Na odbytových miestach sa priložením k čítačke priradí spotreba k správnemu účtu. Prevádzka si určuje limity čerpania; osobitne treba premyslieť náramky detí a spoločné rodinné vyúčtovanie.',
 'Pre recepciu je dôležitá zmena v práci: namiesto zadávania jedného hosťa do viacerých oddelených aplikácií pripraví jednu previazanú návštevu. Pri návrhu preto prechádzame aj stratu náramku, predĺženie pobytu a zmenu oprávnenia, nielen prvý úspešný vstup.'
 ]),
 ('Odchod patrí do návrhu už od začiatku', [
 'V sezóne býva kritickým miestom vyplatenie konzumu. Samoobslužný kiosk s RFID čítačkou môže zobraziť čas návštevy aj spotrebu a spojiť viac rodinných náramkov do vyúčtovania. Pri podporovanom CRM účte vie hosť riešiť platbu aj z mobilu. Detail tejto cesty rozoberáme v samostatnom článku o samoobslužnom vyúčtovaní: posledným krokom pobytu nemá byť zbytočná fronta.'
 ])])

case(5, 'Evidencia darčekových poukazov',
 'Riešenie poukazov sme skladali postupne zo spôsobov práce hotelov a rezortov. Najväčšiu neprehľadnosť často nevytvára samotný e-shop, ale súbeh webového predaja s internými a partnerskými poukazmi. Jedny majú potvrdenú platbu a kód, ďalšie vzniknú na recepcii alebo pre konkrétnu akciu. Potrebujeme ich dostať do spoločnej evidencie bez toho, aby sme každej prevádzke vnucovali rovnaký obchodný model.',
 [
 ('Jedna evidencia aj pre poukazy, ktoré nevznikli na webe', [
 'Online nákup spájame s úhradou a vystavením príslušného dokladu. Hosť dostane grafický poukaz, ktorý môže obsahovať venovanie, platnosť a overovací kód. Do rovnakej evidencie však patria aj interne vydané kusy. Pri každom má byť zrejmé, kto a z akého dôvodu ho vydal, či bol zaplatený a aký nárok predstavuje.',
 'Pri návrhu rozlišujeme poukazy na službu, hodnotové poukazy a balíky viacerých služieb. Obchodný názov ešte sám neurčuje daňové zaradenie. Finančná správa pri rozlíšení jednoúčelového a viacúčelového poukazu vychádza z toho, či sú pri vystavení známe miesto dodania a splatná DPH. Označenie „hodnotový“ preto automaticky neznamená sadzbu 0 %. Konkrétne nastavenie potvrdí účtovník.'
 ]),
 ('Večera navyše nemá znamenať druhý ručne skladaný účet', [
 'Praktická situácia z prevádzky: hosť čerpá wellness s romantickou večerou a objedná si navyše fľašu vína. Obsluha potrebuje poukaz uplatniť, vidieť jeho rozsah a vybrať doplatok bez čakania na vedúceho. Preto prepájame poukaz s POS a hotelovým účtom tak, aby sa jeho čerpanie a spotreba nad rámec nároku spracovali v jednom zrozumiteľnom postupe.',
 'Nejde o zrušenie kontrol, ale o ich prenesenie do nastavených pravidiel a oprávnení. Oprávnený čašník, barista či recepčný môže pracovať s kódom priamo pri hosťovi. Podporované uplatnenie v bookingu a časových rezerváciách navyše umožní použiť poukaz už pri objednaní služby, nielen pri jej vyúčtovaní na mieste.'
 ]),
 ('Účtovník potrebuje väzby, nie iba súčet', [
 'Pri nastavovaní účtovníctva riešime oddelenú analytickú evidenciu poukazov a bežných záloh za pobyty; konkrétne účty a predkontácie schvaľuje účtovníctvo. Report má ukázať vydanie, predaj, čerpanie, zostatok a súvisiace doklady naprieč gastrom aj ubytovaním. Až tak sa dá priebežne skontrolovať, čo má prevádzka ešte poskytnúť.',
 'Metodický kontext: https://www.financnasprava.sk/_img/pfsedit/Dokumenty_PFS/Zverejnovanie_dok/Dane/Metodicke_pokyny/Nepriame_dane/2019/2019.09.27_16_DPH_2019_MP.pdf — pokyn k poukazom; historické sadzby z jeho príkladov nepoužívajte ako aktuálny cenník.'
 ])])

case(6, 'Evidencia darčekových poukazov — expirácie',
 'Pri väčšom predaji poukazov sa na konci roka môže nahromadiť veľké množstvo nevyčerpaných záznamov po platnosti. Z našich rozhovorov s prevádzkami vyplýva, že ručné spracovanie po jednom kóde je samostatná administratívna záťaž. Preto sme do evidencie zahrnuli aj hromadné spracovanie expirovaných poukazov: životný cyklus sa nekončí predajom ani posledným čerpaním.',
 [
 ('Hromadné spracovanie musí zostať kontrolovateľné', [
 'Zmyslom nástroja je vybrať záznamy, ktoré spĺňajú schválené podmienky, skontrolovať ich zostatky a spracovať ich spoločne. Pred potvrdením treba oddeliť predĺžené poukazy, otvorené reklamácie a rozpracované čerpania. Výsledok musí zostať dohľadateľný po jednotlivých kódoch, nie iba ako jedna ročná suma.',
 'Prevádzka tým získava priebežný prehľad o tom, čo je aktívne, vyčerpané a uzatvorené. Účtovníctvo dostane podklad na zosúladenie evidencie. To je konkrétny prínos automatizácie; samotný softvér však neurčuje, do akého obdobia či daňového režimu patrí daný prípad.'
 ]),
 ('Expirácia nie je obchodný cieľ', [
 'Poukaz má v prvom rade priviesť hosťa a vytvoriť dobrú skúsenosť. Pripomienka platnosti alebo jasná možnosť rezervácie preto patrí k predaju rovnako ako kontrola zostatku. Neuplatnenú hodnotu neprezentujeme ako automatický výnos bez DPH: obchodné podmienky, druh poukazu a konkrétne účtovné vysporiadanie treba posúdiť osobitne.',
 'Odporúčame priebežnú inventarizáciu, pri ktorej sa evidencia poukazov porovná s účtovníctvom ešte pred ročnou uzávierkou. V decembri sa potom riešia zostávajúce výnimky, nie rekonštrukcia celého predaja.'
 ])])

case(8, 'Bezobslužný príchod — OCR a voliteľná biometria',
 'Pri príprave samoobslužného ubytovania sa stretávame so zámenou online check-inu za formulár, ktorý hosť sám vyplní. Z pohľadu prevádzky však potrebujeme vedieť aj pôvod údajov, výsledok ich kontroly a väzbu na osobu v rezervácii. Ellipse preto spája spracovanie dokladu, voliteľné overovacie kroky a zápis stavu do PMS. Každý z týchto krokov rieši inú časť procesu.',
 [
 ('Čo prinesie OCR a čo už musí riešiť overenie', [
 'Hosť môže odfotiť doklad a OCR pripraví príslušné údaje do formulára namiesto ručného vypisovania. Tým sa znižuje prepisovanie, ale treba počítať s nečitateľnou fotografiou, nesprávne rozpoznaným znakom alebo chýbajúcim poľom. Výsledok má prejsť kontrolou a musí byť možné ho opraviť.',
 'Pri zapnutom podporovanom overovacom procese možno porovnať fotografiu z dokladu so záberom osoby z mobilného zariadenia. Je to ďalší kontrolný krok, nie absolútna garancia identity, pravosti dokladu ani právneho súladu. Rozhodnutie o spracovaní biometrie musí predchádzať jej používaniu: rozsah, právny základ, ochrana údajov a alternatíva pre hosťa sa posudzujú pre konkrétnu prevádzku.'
 ]),
 ('Výsledok musí zostať pri konkrétnom pobyte', [
 'Recepcia nemá ráno prepisovať hotový check-in z ďalšej tabuľky. V PMS potrebuje vidieť stav jednotlivých ubytovaných osôb a prípadnú požiadavku na doplnenie. Tento stav možno následne použiť v pravidlách sprístupnenia izby spolu s úhradou a pripravenosťou izby.',
 'Výnimku má prevziať určený človek cez zrozumiteľný postup. Hosťovi nepomôže, ak aplikácia opakovane odmieta fotografiu bez vysvetlenia a neponúkne iný spôsob dokončenia. Samoobsluha má uľahčiť bežný príchod, nie uzavrieť cestu k pomoci.'
 ])])

case(10, 'Priame rezervácie na vlastnom webe',
 'Pri prechádzaní webov s hoteliermi stále nachádzame ponuku izieb, za ktorou nasleduje iba formulár na termín, počet hostí a vetu „ozveme sa vám“. Na portáli pritom hosť môže vybrať dostupný pobyt, zaplatiť a dostať potvrdenie. Hotel tak potrebuje vyriešiť nielen návštevnosť webu, ale aj schopnosť dokončiť predaj v okamihu, keď je hosť pripravený rezervovať.',
 [
 ('Booking nemusí znamenať výmenu celého webu', [
 'Ellipse Booking engine možno osadiť aj na web spravovaný iným dodávateľom cez príslušnú integráciu. Pri nasadení riešime s tvorcom webu umiestnenie a funkčnosť rezervačnej cesty, nie iba vzhľad tlačidla. Hosť potrebuje aktuálnu dostupnosť a ponuku, ktorá vychádza z PMS.',
 'S hotelom potom nastavujeme sezónnosť, pobytové balíky a predajné podmienky. Silný termín si môže vyžadovať inú cenovú stratégiu než mimosezónna ponuka podporená kampaňou. Pri potrebe pokročilej automatizácie cien nadväzuje revPRO; nejde o povinnú súčasť každého nasadenia bookingu.'
 ]),
 ('Po rezervácii má nasledovať ďalší užitočný krok', [
 'Po dokončení dostane hosť podľa nastavenia e-mail alebo SMS s prístupom do hosťovskej aplikácie. Tam môže spravovať pobyt v rozsahu povolenom prevádzkou: požiadať o zmenu, využiť dostupné predĺženie alebo dokúpiť vhodnú službu. Pri dostupnej izbe vyššej kategórie možno ponúknuť aj platený upgrade. Ponuka má zodpovedať pobytu, nie byť rovnakým zoznamom pre každého.',
 'Dôležité je, aby sa potvrdená zmena prejavila v PMS aj v nadväzujúcich úlohách. Dodatočná noc, presun izby či zmenený balík sa nesmú skončiť iba správou, ktorú recepcia neskôr ručne prepíše.'
 ]),
 ('Platba, doklady a odchod sú pokračovaním toho istého predaja', [
 'Ellipse Pay pripája platbu ku konkrétnej rezervácii. Pri podporovanom overení 3-D Secure môže banka vyžiadať ďalšie potvrdenie; spôsob závisí od banky a platobného procesu. Po úspešnej úhrade môže nastavený tok pripraviť príslušný doklad s členením položiek a sprístupniť ho hosťovi aj účtovníctvu.',
 'V hosťovskom rozhraní má návštevník prehľad o dokladoch a hotelovom účte. Ak prevádzka používa samoobslužný check-out, na konci pobytu nadviaže kontrola účtu, prípadný doplatok a vyúčtovanie. Práve tým sa vlastný booking stáva začiatkom celého pobytového procesu, nie iba ďalším predajným oknom.'
 ])])

case(14, 'Sprepitné a tipsy pri platbe kartou',
 'Stále sa stretávame s gastroprevádzkami, ktoré sprepitné kartou obmedzili alebo úplne zakázali. Dôvodom nebýva nezáujem hostí, ale neistota, ako sumu zaevidovať a dostať k tímu. Keď hosť nemá hotovosť, takáto bariéra môže odstrániť príležitosť odmeniť dobrý servis. Riešenie preto začína prepojením pokladne, platby a dohodnutého vysporiadania.',
 [
 ('Obrazovka, ktorá dá hosťovi voľbu', [
 'Ellipse POS vie podľa nastavenia pred platbou ponúknuť percentuálne možnosti, vlastnú sumu alebo zaokrúhlenie. Rozhranie možno prispôsobiť prevádzke. Rovnako zrozumiteľná má zostať aj možnosť nepridať sprepitné: ide o dobrovoľné rozhodnutie hosťa, nie o skrytú podmienku dokončenia platby.',
 'Na prevádzkach vidíme, že dostupnosť tejto voľby mení situáciu pri platení bez hotovosti. Rozsah prínosu však treba odmerať v konkrétnom podniku. Bez spoločnej metodiky neprezentujeme tvrdenie o väčšine hostí ani o prevahe kartového sprepitného ako všeobecnú štatistiku trhu.'
 ]),
 ('Jedna platba, oddelený prehľad o sprepitnom', [
 'V používanom postupe POS zaeviduje zvolené sprepitné a odošle na terminál celkovú sumu. Back office potom poskytne rozlíšenie predaja a sprepitného vrátane prehľadu podľa pracovníkov. Obsluha nemusí zadávať navýšenú sumu iba do terminálu a večer vysvetľovať rozdiel oproti pokladni.',
 'Rovnakú pozornosť venujeme stornu, vráteniu platby a delenému účtu. Účtovníctvo potrebuje zistiť, k akému predaju a transakcii sprepitné patrí a ako sa prípadná oprava premietla do vysporiadania.'
 ]),
 ('Účet uzavrie jednotlivec, servis vytvorí tím', [
 'Hoteliéri správne upozorňujú, že na službe sa podieľa aj kuchyňa a ďalší kolegovia. Evidencia podľa obsluhy preto nemusí znamenať, že celá suma patrí človeku, ktorý účet uzavrel. Vopred sa dohodne transparentný kľúč a spôsob vyplatenia, ktorý overí účtovníctvo a zodpovedná personálna rola.',
 'Pravidlá nemajú stáť na neformálnej obálke ani automatickom odpočítavaní nákladov na rozbitý inventár. Prípadné zrážky či iné použitie peňazí nemožno odporúčať ako univerzálny štandard. Systém poskytuje podklad; oprávnený spôsob rozdelenia musí mať prevádzka vyriešený samostatne.'
 ])])

case(18, 'Sklady a uzávierka pred termínom DPH',
 'Pri stretnutiach so skladom a účtovníctvom riešime aj situácie, keď evidencia zahlcuje prevádzku: príjem mešká, výdaje raňajok a večerí zostávajú na papieri a inventúra sa dokončuje až pod tlakom uzávierky. Nejde len o termín pre účtovníctvo. Manažér medzitým nemá včasné údaje na nákup, kontrolu spotreby ani rozhodnutie o ponuke.',
 [
 ('Od elektronického dodacieho listu po fotografiu bločku', [
 'Pri príjme využívame import podporovaných elektronických dodacích listov a faktúr. Dodávateľské položky sa postupne mapujú na skladové karty, aby sa opakovaný nákup nemusel znovu ručne skladať. Kontrola zostáva potrebná pri novom výrobku, zmene jednotky alebo balenia.',
 'Ďalšou cestou je fotografia nákupného dokladu v Ellipse Team. OCR pripraví údaje o dodávateľovi, položkách, cenách a množstvách. AI následne pomáha priradiť riadky ku skladovým položkám. Výsledkom je návrh príjemky na kontrolu a potvrdenie, nie nekontrolovaný zápis. Človek sa sústredí na správnosť priradenia a údajov namiesto ich celého prepisovania.'
 ]),
 ('Bufetové výdaje nemusia cestovať cez papierový hárok', [
 'Raňajky, večere či iný výdaj možno podľa nastaveného procesu evidovať cez pokladňu alebo mobilné zariadenie priamo na prevádzke. Návrh odpisu je pripravený a pred potvrdením sa upraví podľa skutočnosti. Odpad, nevydaná časť a ďalšie osobitné pohyby musia zostať rozlíšené, aby evidencia nepredstierala, že všetko vydané bolo predané.',
 'Výhodou je skorší a zrozumiteľnejší záznam tam, kde pohyb vznikol. Ak sa aj digitálny výdaj zadáva až po niekoľkých dňoch, samotná výmena papiera za tablet problém aktuálnosti nevyrieši.'
 ]),
 ('Inventúra v mobile skráti prepisovanie, nie fyzické počítanie', [
 'Pracovníci jednotlivých stredísk zapisujú skutočný stav k existujúcim položkám priamo v mobile. Záznam sa ukladá po položkách a skladník následne spracuje výsledok bez ručného prepisu hárkov. Rozhodný čas a pohyby počas inventúry však treba dohodnúť rovnako ako pri papierovom postupe.',
 'V našej praxi môže uzávierka čakať na posledné doklady či zberné faktúry, aj keď je samotný súpis hotový. Termín okolo desiateho dňa ďalšieho mesiaca môže byť prevádzkovým cieľom, nie garanciou systému ani zákonnou lehotou. S tímom preto nastavujeme realistický kalendár, vlastníkov krokov a zoznam vecí, ktoré uzavretiu ešte bránia.'
 ])])

case(21, 'Flow aquaparkového rezortu — vyúčtovanie z lehátka',
 'Pri automatizácii aquaparku riešime aj moment, keď väčší počet návštevníkov odchádza naraz. Spotreba na rodinných náramkoch, časové doplatky a platba sa vtedy stretnú pri jednom mieste. Z našej praxe vychádza požiadavka nespoliehať sa iba na rýchlejšiu pokladňu: hosť má dostať možnosť skontrolovať a vyrovnať účet ešte pred výstupom.',
 [
 ('Rodinné vyúčtovanie pri samoobslužnom kiosku', [
 'Kiosk s RFID čítačkou môže byť kompaktné zariadenie umiestnené v areáli s potrebným napájaním a sieťovým pripojením. Po načítaní náramku hosť vidí čas návštevy a evidovanú spotrebu. Postupným priložením rodinných náramkov sa pripraví spoločné vyúčtovanie podľa pravidiel nasadenia.',
 'Platba cez podporované riešenie Ellipse Pay môže prebehnúť kartou, telefónom alebo hodinkami. Po potvrdenej úhrade sa zmení stav účtov a hosť dostane doklad. Výstupný systém musí čítať práve tento stav; inak by samoobsluha skončila ďalším vysvetľovaním pri turnikete.'
 ]),
 ('Keď hosť už má svoj účet v mobile', [
 'Pri prepojenom CRM konte a nákupe cez vlastný profil vieme v podporovanom nasadení posunúť proces ďalej. Hosť vidí spotrebu spojenú s náramkom v svojom účte a môže ju vyrovnať priamo z mobilu, napríklad ešte z lehátka. Nemusí sa kvôli samotnej platbe presúvať ku kiosku.',
 'Dôležitý nie je názov digitálnej peňaženky, ale celý dokončený tok: správne náramky, aktuálna spotreba, potvrdená úhrada, dostupný doklad a aktualizovaný stav výstupu. Aj po platbe treba riešiť prípadnú novú spotrebu alebo ďalší časový doplatok. Pohodlie hosťa nesmie závisieť od ručného prepísania údajov medzi CRM, POS a aquaparkom.'
 ])])

case(24, 'Chyžné, vysielačky a evidencia porúch',
 'Na hoteloch sa aj jednoduchá otázka „je izba pripravená?“ môže zmeniť na sériu telefonátov medzi recepciou, chyžnou a supervízorom. Podobne sa ústne odovzdáva porucha a neskôr sa dohľadáva, kto ju vlastne prevzal. Ellipse Team sme navrhli tak, aby pracovný stav a ďalší krok boli viditeľné priamo v mobile tímu aj pri rozhodovaní recepcie.',
 [
 ('Dva kroky: upratať a potvrdiť pripravenosť', [
 'V prevádzkach, ktoré používajú kontrolu supervízorom, sa upratanie a výsledná kontrola evidujú oddelene. Chyžná dokončí svoju časť, supervízor prejde izbu a až následne vznikne potvrdenie pripravenosti podľa pravidiel hotela. Recepcia tak nemusí hádať, čo kolega slovom „hotovo“ myslel.',
 'Postup zároveň rozlišuje príchodové, odchodové a priebežné upratovanie. Pri konkrétnej izbe možno doplniť jej zvláštnosti — napríklad kontrolu strešného okna v podkroví. Nový pracovník sa neopiera iba o pamäť skúsenejšieho kolegu; v mobile má zrozumiteľné kroky pre danú úlohu.'
 ]),
 ('Meranie času má vysvetliť náklady a plán práce', [
 'Evidencia úloh a ich trvania dáva podklad na odhad kapacity tímu a nákladov jednotlivých typov upratovania. Na zavádzaní zdôrazňujeme kontext: čas sa nemá zmeniť na jednoduchú súťaž, kto bol najrýchlejší. Pobytové upratovanie, odchod rodiny a mimoriadne znečistenie nie sú porovnateľné výkony.',
 'Výnimočnú situáciu môže pracovník doplniť poznámkou. Manažér potom pri plánovaní vidí, prečo bol prípad náročnejší, namiesto toho, aby z neho vznikla nesprávna norma pre všetky izby.'
 ]),
 ('Fotografia závady namiesto ďalšieho telefonátu', [
 'Ak chyžná počas práce zistí poškodenie alebo problém v spoločnom priestore, môže založiť poruchu s fotografiou a presným miestom. Úloha sa nasmeruje na údržbu; manažér ju pridelí konkrétnemu pracovníkovi a sleduje jej stav. Recepcia vidí informáciu bez toho, aby sama prenášala každú správu medzi poschodím a dielňou.',
 'Prehľad otvorených, vyriešených a čakajúcich úloh pomáha odlíšiť drobný nedostatok od poruchy, ktorá bráni odovzdaniu izby. Väzba na PMS je pritom zásadná: plánovaný príchod a pripravenosť izby sa musia stretnúť v jednom rozhodnutí.'
 ])])

case(31, 'Účtovníctvo, tok dokladov a Morning Coffee',
 'Pri spúšťaní Ellipse často stretávame ekonomické oddelenie, ktoré nestíha rastúci objem dokladov z hotela, reštaurácie a ďalších stredísk. Problém nehodnotíme ako neschopnosť účtovníkov. Pýtame sa, prečo sa údaje, ktoré už vznikli v prevádzke, znovu ručne prenášajú a prečo manažér čaká na výsledok až do mesačnej uzávierky. Automatizáciu preto plánujeme spolu s účtovníctvom už pred ostrým štartom.',
 [
 ('Predkontácie začínajú pri stredisku a končia pri položke', [
 'Výnosy potrebujeme členiť od stredísk, ako sú ubytovanie, gastro a wellness, cez kategórie až po konkrétnu položku. Ubytovanie a miestny poplatok nemajú skončiť v jednom nerozlíšenom súčte. S účtovným tímom preto nastavujeme predkontácie výnosov aj súvisiacich skladových nákladov.',
 'Takto možno pripraviť prenos pre malý predaj na pokladni aj faktúru po veľkom podujatí. Cieľom je dostať správne údaje do účtovníctva priebežne, pri vhodnom prepojení už na nasledujúci deň. Rýchlosť však závisí aj od uzatvorenia dokladov, správnosti mapovania a spracovania výnimiek.'
 ]),
 ('Účtovník potrebuje aj druhú stranu: ako bolo zaplatené', [
 'Samotný výnosový doklad ešte nevysvetľuje prijaté peniaze. Prichádzajú bankové výpisy, terminálové platby a vysporiadanie platobnej brány. Ellipse Pay prináša väzbu úspešnej platby na konkrétny účet alebo doklad, aby sa dalo dohľadať, čím bola suma krytá.',
 'Pri nastavovaní preto prechádzame nielen účtovanie predaja, ale aj zálohu, doplatok, vrátenie platby a poplatky poskytovateľa. Jeden denný súčet bez podrobností nedáva rovnakú kontrolu ako dohľadateľný vzťah medzi položkou, dokladom a úhradou.'
 ]),
 ('Morning Coffee: ranný prehľad, z ktorého vznikne rozhodnutie', [
 'Morning Coffee je náš ranný manažérsky report. Podľa nastavenia prináša výnosy za predchádzajúci deň a obdobie, členenie po skupinách, porovnanie s plánom a minulým rokom. Môže obsahovať aj dopytované obdobia, ceny, podujatia a výhľad obsadenosti či výnosov porovnaný s tempom predaja.',
 'Zmyslom nie je ďalší e-mail do schránky. Ak slabne predaj určitého obdobia, manažér má podklad na včasný obchodný zásah. Ak prevádzka používa úlohy v Team, k číslam sa pridáva aj prehľad dnešnej práce, nových úloh a oneskorených bodov. Ekonomika, obchod a operatíva sa tak stretávajú v jednom rannom rozhovore.',
 'Aj pri rýchlom reporte treba rozlíšiť predbežný prevádzkový výsledok od uzavretého účtovného obdobia. Napríklad náklad raňajok vieme vyhodnocovať priebežne podľa zaevidovanej spotreby; neúplné príjemky alebo odpisy musia zostať viditeľnou výhradou k číslu.'
 ])])

case(32, 'Booking.com a budovanie stálych hostí',
 'Pri menších ubytovacích zariadeniach sa stretávame aj s veľmi vysokou závislosťou od jedného portálu. Majiteľ vie, že platí za distribúciu, ale nemá pripravený postup, ako spokojného hosťa priviesť nabudúce napriamo. Nejde o odmietnutie portálov: prinášajú dopyt. Úlohou hotela je popri nich budovať vlastnú predajnú cestu a vzťah s hosťom, ktorý už jeho službu pozná.',
 [
 ('Priama ponuka musí byť jasná ešte pred nákupom', [
 'Začíname prakticky: má web funkčný booking, zrozumiteľnú cenu a viditeľné storno podmienky? Hosť potrebuje vedieť, dokedy a ako môže rezerváciu zrušiť. Flexibilita nie je sľubom bezplatného storna v každej situácii, ale jasnou dohodou, ktorú vie hosť pochopiť pred potvrdením.',
 'V režime DMA sa na Booking.com vzťahuje zákaz paritných požiadaviek; Európska komisia vysvetľuje možnosť ponúknuť na vlastnom webe odlišné, aj výhodnejšie ceny a podmienky. To však neznamená, že jedinou vhodnou stratégiou je zľava. Parkovanie, dostupný skorší príchod alebo relevantná služba môžu vytvoriť hodnotu, ak ich hotel dokáže splniť a pozná ich náklad.'
 ]),
 ('Online check-in je príležitosť predstaviť vernosť', [
 'Na prevádzkach sa osvedčuje premýšľať o registrácii tam, kde už hosť prirodzene komunikuje s hotelom. Pri online check-ine mu možno ponúknuť dobrovoľné členstvo, uvítací kredit alebo výhodu v reštaurácii. Týmto miestom prechádza aj hosť získaný cez portál; program mu môže priniesť úžitok už počas aktuálneho pobytu.',
 'Registráciu treba zreteľne oddeliť od povinných krokov ubytovania a od pravidiel marketingového oslovenia. Členstvo je ponuka, nie podmienka odovzdania zaplatenej izby. CRM má následne spojiť dohodnuté výhody s konkrétnym klientskym účtom a podporovaným spôsobom čerpania.'
 ]),
 ('Digitálna karta a pripomienka majú viesť k použiteľnej výhode', [
 'Pri podporovanom nastavení sa vernostná karta dostane do Apple Wallet alebo Google Wallet. Možnosti aktualizácií a upozornení sa riadia príslušnou platformou a nastavením zariadenia. Podstatný je dôvod kontaktu: napríklad informácia o zostávajúcom kredite a jeho platnosti, nie ďalšia plošná reklamná správa.',
 'Ilustračný príklad: hosťovi zostáva kredit 15 eur platný ešte 30 dní. Ak pravidlá programu umožňujú použiť ho na darčekový poukaz, môže sa rozhodnúť kúpiť darček pre blízkeho. CRM, poukazy a predaj preto potrebujú spoločné pravidlá; upozornenie nemá sľubovať čerpanie, ktoré pokladňa nevie prijať.',
 'Členská ponuka na webe môže sprístupniť výhodu po prihlásení. Jej prínos však vyhodnocujeme podľa skutočných návratov a ekonomiky, nie podľa počtu vydaných kariet. Percentá návštevníkov portálov, ktorí si pozrú web hotela, bez overiteľného podkladu nepoužívame ako argument.'
 ]),
 ('Oficiálny kontext priameho predaja', [
 'Európska komisia, Booking must now comply with the Digital Markets Act, 14. 11. 2024: https://digital-strategy.ec.europa.eu/en/news/booking-must-now-comply-digital-markets-act'
 ])])

case(34, 'Chyžné a údržba; účtovníctvo a Morning Coffee',
 'Pri návrhu práce v Ellipse Team vychádzame zo situácií, ktoré sa odohrávajú mimo kancelárie: chyžná objaví závadu, údržbár potrebuje ďalšiu úlohu a manažér chce vidieť, na čo sa čaká. Rozhodujúce nie je dostať celé desktopové rozhranie na malú obrazovku. Potrebujeme, aby konkrétny človek dostal zrozumiteľný krok a ostatní videli výsledok bez ďalšieho telefonátu.',
 [
 ('Od fotografie závady po prevzatie údržbou', [
 'Pracovník môže založiť závadu priamo pri izbe alebo spoločnom priestore a doplniť fotografiu. Úloha sa nasmeruje na príslušný úsek, manažér ju priradí a sleduje otvorené aj dokončené prípady. Pri poruche, ktorá blokuje pripravenosť izby, musí nadväzovať aj informácia pre recepciu.',
 'Rovnaká aplikácia môže podľa nasadených funkcií pomáhať pri inventúrnom súpise alebo príprave príjmu z fotografie dokladu. Tieto procesy majú spoločný princíp: záznam vzniká pri práci, nie neskôr po návrate k počítaču. Odborná kontrola a potvrdenie pritom zostávajú súčasťou postupu.'
 ]),
 ('Ranný prehľad má oddeliť naliehavé od bežného', [
 'S ranným manažérskym prehľadom a evidenciou úloh vie vedenie spojiť to, čo sa stalo včera, s tým, čo je potrebné urobiť dnes. Otvorené a oneskorené úlohy treba odlíšiť od bežných notifikácií. Ak všetko signalizuje rovnakú prioritu, tím prestane upozornenia rozlišovať.',
 'Pri zavádzaní preto nastavujeme zodpovednosti, spôsob odovzdania medzi zmenami a význam dokončenia. Fotografia vykonanej práce môže byť užitočná, ale sama nenahrádza potvrdenie prevádzkovej použiteľnosti — napríklad rozhodnutie, že opravenú izbu možno opäť odovzdať hosťovi.'
 ])])

def paragraph(text):
    escaped = html.escape(text)
    return '<p>' + re.sub(r'https://[^\s<]+', lambda m: '<a href="'+m[0]+'">'+m[0]+'</a>', escaped) + '</p>'

def build():
    old = json.loads((ROOT/'docs/editorial/payload.json').read_text())
    out = []
    for ordinal, revision in sorted(entries.items()):
        record = old[ordinal-1]
        expected = copy.deepcopy(record['update'])
        expected['categories'] = record['expected']['categories']
        update = copy.deepcopy(record['update'])
        body = update['text']
        body = re.sub(r'^<p><em>.*?</em></p>\s*', '', body, count=1, flags=re.S)
        body = re.sub(r'<h2>Situácia na prevádzke</h2><p>.*?</p>', '<h2>Čo riešime na prevádzkach</h2>'+paragraph(revision['opening']), body, count=1, flags=re.S)
        expansion = '\n'.join('<h2>'+html.escape(title)+'</h2>\n'+'\n'.join(paragraph(p) for p in paras) for title,paras in revision['sections'])
        body = body.replace('<h2>Odporúčaný postup s Ellipse</h2>', expansion+'\n<h2>Postup zavedenia v konkrétnej prevádzke</h2>', 1)
        update['text'] = body
        out.append(dict(expected=expected,update=update,modules=record['modules']))
    dest=ROOT/'docs/editorial/voice-payload.json'
    dest.write_text(json.dumps(out,ensure_ascii=False,indent=2)+'\n')
    report=['# Zapracovanie deviatich hlasových prepisov — 2. 10. 2026\n', 'Zdrojom skúseností sú prepisy dodané používateľom. Nemeníme ich na nezávisle overené výsledky konkrétnych klientov. Surové prepisy sa do verejného repozitára neukladajú.\n', '| Článok | Podklad | Rozšírený rozsah |', '|---|---|---|']
    for r in out:
        ordinal=next(n for n in entries if old[n-1]['update']['id']==r['update']['id'])
        words=len(re.sub('<[^>]*>', ' ', r['update']['text']).split())
        report.append('| '+r['update']['name']+' | '+entries[ordinal]['source']+' | '+str(words)+' slov |')
    report += ['\n## Redakčné rozhodnutia\n', '- Alis/eli/es → Ellipse; RD → RFID; MFC → NFC; „dvojdňové upratanie“ → dvojstupňové upratanie s kontrolou; nejasné diktované slovné spojenia boli interpretované podľa celého procesu.', '- Ponechané: OCR + AI návrh príjemky s potvrdením, mobilná inventúra, Morning Coffee, predkontácie a platobné väzby, podmienky PIN-u, portálové správy, rodinné QR/RFID, mobilné vyúčtovanie, poukazy s doplatkom, interná evidencia, CRM a nadväzujúci predaj.', '- Bez zovšeobecnenia percent OTA, kartového sprepitného a pomeru návštev webu. Bez vymysleného mena hotela, citátu alebo meraného výsledku.', '- OCR a biometria nie sú označené ako 100 % garancia. DPH poukazov nie je zjednodušená na univerzálnu nulovú sadzbu; expirácia nie je automaticky penále bez DPH. Rozdelenie sprepitného a prípadné zrážky nie sú univerzálny právny návod.', '- Parita Booking.com má oficiálny kontext DMA od Európskej komisie. Odkaz na metodiku poukazov upozorňuje, že historické sadzby z príkladov nie sú aktuálnym cenníkom.', '- Existujúce odborné zdroje, implementačné kontroly, výnimky a metriky zostali zachované.']
    (ROOT/'docs/editorial/voice-review.md').write_text('\n'.join(report)+'\n')
    print('Built',len(out),'expanded articles from all 9 transcripts')

if __name__=='__main__': build()
