<?php
/**
 * Ellipse Hospitality OS — obsah homepage (partial).
 * Predpokladá premenné a funkcie pripravené v homepage.php.
 */
if (!isset($nap) || !is_array($nap)) {
  $nap = hg_nap();
}
if (!isset($logoSrc)) {
  $logoSrc = hg_asset('ellipse-logo.svg');
}
if (!isset($logos) || !is_array($logos)) {
  $logos = hg_logo_fallback();
}
if (!isset($team) || !is_array($team)) {
  $team = hg_team_fallback();
}
if (!isset($faq) || !is_array($faq)) {
  $faq = hg_faq_fallback();
}
if (!isset($trust) || !is_array($trust)) {
  $trust = hg_trust_fallback();
}
if (!isset($checkinPoints) || !is_array($checkinPoints) || count($checkinPoints) === 0) {
  $checkinPoints = array();
  foreach (hg_checkin_fallback() as $point) {
    $checkinPoints[] = array('name' => $point);
  }
}
if (!isset($segmentUi) || !is_array($segmentUi) || count($segmentUi) === 0) {
  $segmentUi = array(
    array(
      'tab' => hg_lang('Hotely a rezorty', 'Hotels and resorts'),
      'kicker' => hg_lang('01 — HOTELY A REZORTY', '01 — HOTELS AND RESORTS'),
      'title' => hg_lang("Od prvej rezervácie\npo poslednú faktúru.", "From the first booking\nto the last invoice."),
      'lead' => hg_lang('Všetko, čo váš tím potrebuje na rýchlejšiu prevádzku a hosť na výnimočný pobyt.', 'Everything your team needs for a faster operation and the guest for a stay worth remembering.'),
      'points' => array(
        hg_lang('Cloudový PMS a channel manager', 'Cloud PMS and channel manager'),
        hg_lang('Online check-in a automatická komunikácia', 'Online check-in and automatic messages'),
        hg_lang('Housekeeping, údržba a úlohy pre tím', 'Housekeeping, maintenance and team tasks'),
        hg_lang('Revenue management a live reporty', 'Revenue management and live reports'),
      ),
      'href' => '/hotelovy-system/',
      'cta' => hg_lang('Riešenie pre hotely', 'Hotel solution'),
    ),
  );
}
if (!isset($posts) || !is_array($posts)) {
  $posts = array();
}

$heroImg = isset($shots[0]['img']) && $shots[0]['img'] !== '' ? $shots[0]['img'] : hg_asset('hero-pms.webp');
$dayImg = isset($shots[1]['img']) && $shots[1]['img'] !== '' ? $shots[1]['img'] : hg_asset('hero-day.webp');
$revImg = isset($shots[2]['img']) && $shots[2]['img'] !== '' ? $shots[2]['img'] : hg_asset('hero-rev.webp');
$mcpArticle = 'https://www.horecagroup.sk/napojte-si-ellipse-data-cez-mcp-konektor-do-sveta-ai-a-vytazte-maximum-z-analyz-a-brainstormingu/';
$revproCase = 'https://www.horecagroup.sk/prve-vysledky-z-praxe-potvrdzuju-predpoklady-s-revpro-modulom-zarabate-viac-bez-ohladu-na-velkost-ubytovania/';
$claudeScene = function_exists('hg_claude_scenes') ? hg_claude_scenes()[0] : null;
$teamPhones = array_values(array_filter($team, function ($s) {
  return !empty($s['img']);
}));
$teamPhones = array_slice($teamPhones, 0, 5);
?>

<main id="top" class="os-home">

  <section class="os-hero" aria-label="<?php echo hg_lang('Úvod', 'Intro'); ?>">
    <div class="os-hero-copy">
      <p class="os-kicker"><?php echo hg_lang('Ellipse Hospitality OS', 'Ellipse Hospitality OS'); ?></p>
      <h1><?php echo hg_lang('Jeden systém pre celý hotel.', 'One system for the whole hotel.'); ?></h1>
      <p class="os-lead"><?php echo hg_lang('Rezervácie, predaj, prevádzka, tím, platby aj komunikácia s hosťami v jednej cloudovej platforme.', 'Reservations, sales, operations, the team, payments and guest messaging in one cloud platform.'); ?></p>
      <div class="os-actions">
        <a class="button" href="<?php echo hg_esc($nap['demo']); ?>"><?php echo hg_lang('Pozrieť Ellipse v akcii', 'See Ellipse in action'); ?> <span>↗</span></a>
        <a class="button ghost" href="#platforma"><?php echo hg_lang('Objaviť platformu', 'Discover the platform'); ?></a>
      </div>
    </div>
    <div class="os-hero-visual">
      <figure class="os-ui os-ui-hero">
        <img src="<?php echo hg_esc($heroImg); ?>" alt="<?php echo hg_lang('Hotelová plachta rezervácií Ellipse PMS', 'Ellipse PMS reservation tape chart'); ?>" width="1200" height="675" loading="eager" decoding="async" fetchpriority="high">
      </figure>
      <figure class="os-ui os-ui-layer">
        <img src="<?php echo hg_esc($dayImg); ?>" alt="<?php echo hg_lang('Denný dashboard Ellipse PMS', 'Ellipse PMS daily dashboard'); ?>" width="1200" height="675" loading="lazy" decoding="async">
      </figure>
      <?php if (isset($teamPhones[0])): ?>
      <figure class="os-phone os-phone-hero">
        <img src="<?php echo hg_esc($teamPhones[0]['img']); ?>" alt="<?php echo hg_esc($teamPhones[0]['name']); ?>" loading="lazy" decoding="async">
      </figure>
      <?php endif; ?>
    </div>
  </section>

  <section class="os-trust" aria-label="<?php echo hg_lang('Dôvera', 'Trust'); ?>">
    <div class="os-trust-logos">
      <?php foreach ($logos as $logo): if (empty($logo['img'])) continue; ?>
      <img src="<?php echo hg_esc($logo['img']); ?>" alt="<?php echo hg_esc($logo['name']); ?>" loading="lazy" decoding="async">
      <?php endforeach; ?>
    </div>
    <ul class="os-trust-stats">
      <?php foreach (array_slice($trust['stats'], 0, 3) as $stat): ?>
      <li><b><?php echo hg_esc($stat['name']); ?></b> <?php echo hg_esc(hg_plain($stat['text'])); ?></li>
      <?php endforeach; ?>
    </ul>
  </section>

  <section class="os-canvas" id="platforma" data-os-canvas data-os-step="0" aria-label="<?php echo hg_lang('Ellipse ekosystém', 'Ellipse ecosystem'); ?>">
    <div class="os-stage">
      <div class="os-canvas-copy">
        <p class="os-kicker"><?php echo hg_lang('Ellipse Hospitality OS', 'Ellipse Hospitality OS'); ?></p>
        <h2><?php echo hg_lang('Jeden systém. Všetko prepojené.', 'One system. Everything connected.'); ?></h2>
        <p class="os-lead"><?php echo hg_lang('Od prvej rezervácie až po poslednú platbu. Ellipse prepája celý chod prevádzky do jedného ekosystému.', 'From the first booking to the last payment. Ellipse connects the whole operation into one ecosystem.'); ?></p>
      </div>
      <div class="os-eco" aria-hidden="false">
        <div class="os-node os-core" data-step="1">
          <b>ellipse<span aria-hidden="true"></span></b>
          <span><?php echo hg_lang('Jadro platformy · jeden zdroj pravdy', 'Core platform · one source of truth'); ?></span>
        </div>
        <div class="os-node" data-step="2">
          <b><?php echo hg_lang('PMS + rezervácie', 'PMS + reservations'); ?></b>
          <span><?php echo hg_lang('Izby, pobyty, ceny, hostia a hotelová operatíva.', 'Rooms, stays, rates, guests and hotel operations.'); ?></span>
        </div>
        <div class="os-node" data-step="3">
          <b><?php echo hg_lang('Booking + Channel Manager', 'Booking + Channel Manager'); ?></b>
          <span><?php echo hg_lang('Booking engine, distribúcia a priame rezervácie.', 'Booking engine, distribution and direct bookings.'); ?></span>
        </div>
        <div class="os-node" data-step="4">
          <b><?php echo hg_lang('Platby + POS', 'Payments + POS'); ?></b>
          <span><?php echo hg_lang('Účty, gastro, terminály a finančné toky.', 'Folios, F&B, terminals and money flows.'); ?></span>
        </div>
        <div class="os-node" data-step="5">
          <b><?php echo hg_lang('Guest Journey', 'Guest Journey'); ?></b>
          <span><?php echo hg_lang('Self check-in, messaging a komunikácia s hosťom.', 'Self check-in, messaging and guest communication.'); ?></span>
        </div>
        <div class="os-node" data-step="6">
          <b>Ellipse Team</b>
          <span><?php echo hg_lang('Mobilné riadenie tímu, úloh a prevádzky.', 'Mobile control of the team, tasks and operations.'); ?></span>
        </div>
        <div class="os-node" data-step="7">
          <b><?php echo hg_lang('AI + MCP', 'AI + MCP'); ?></b>
          <span><?php echo hg_lang('Ella AI, automatizácia, analytika a agent-ready dáta.', 'Ella AI, automation, analytics and agent-ready data.'); ?></span>
        </div>
      </div>
    </div>
  </section>

  <section class="os-product" id="showcase" aria-label="<?php echo hg_lang('Produkt Ellipse', 'Ellipse product'); ?>">
    <p class="os-kicker"><?php echo hg_lang('Skutočný Ellipse', 'Real Ellipse'); ?></p>
    <h2><?php echo hg_lang('Toto nie je koncept. Toto je Ellipse.', 'This is not a concept. This is Ellipse.'); ?></h2>
    <p class="os-lead"><?php echo hg_lang('Reálne obrazovky z prevádzky rozkladáme na to podstatné — čísla, rezervácie a odporúčania, ktoré tím potrebuje práve teraz.', 'Real operational screens are reduced to what matters — numbers, reservations and recommendations the team needs right now.'); ?></p>
    <div class="os-live-kpi-strip" aria-label="<?php echo hg_lang('Ukážka reálneho denného prehľadu Ellipse', 'Example from a real Ellipse daily overview'); ?>">
      <article><small><?php echo hg_lang('Úlohy · to do', 'Tasks · to do'); ?></small><b>9</b><span>23</span></article>
      <article><small>Check-out</small><b>5</b><span>5</span></article>
      <article><small>Check-in</small><b>3</b><span>3</span></article>
      <article><small><?php echo hg_lang('Hostia', 'Guests'); ?></small><b>0</b><span>6</span></article>
      <article><small><?php echo hg_lang('Neuprataných', 'Unclean rooms'); ?></small><b>34</b><span>1</span></article>
    </div>
    <div class="os-fragment-stage" data-fragment-stage>
      <figure class="os-fragment os-fragment-kpis" data-parallax-depth="0.06">
        <div class="os-fragment-viewport">
          <img src="<?php echo hg_esc(hg_asset('hero-day.webp')); ?>" alt="<?php echo hg_lang('KPI prehľad z reálneho dashboardu Ellipse PMS', 'KPI overview from the live Ellipse PMS dashboard'); ?>" width="1400" height="788" loading="lazy" decoding="async">
        </div>
        <figcaption><span><?php echo hg_lang('Dnes v prevádzke', 'Today in operations'); ?></span><b><?php echo hg_lang('Úlohy, check-out, check-in a stav izieb', 'Tasks, check-out, check-in and room status'); ?></b></figcaption>
      </figure>
      <figure class="os-fragment os-fragment-tape" data-parallax-depth="0.10">
        <div class="os-fragment-viewport">
          <img src="<?php echo hg_esc(hg_asset('hero-pms.webp')); ?>" alt="<?php echo hg_lang('Detail hotelovej plachty rezervácií Ellipse PMS', 'Detail of the Ellipse PMS reservation tape chart'); ?>" width="1400" height="788" loading="lazy" decoding="async">
        </div>
        <figcaption><span><?php echo hg_lang('Rezervácie', 'Reservations'); ?></span><b><?php echo hg_lang('Plachta, dostupnosť a pobyt v jednom pohľade', 'Tape chart, availability and stay in one view'); ?></b></figcaption>
      </figure>
      <figure class="os-fragment os-fragment-revenue" data-parallax-depth="0.14">
        <div class="os-fragment-viewport">
          <img src="<?php echo hg_esc($revImg); ?>" alt="<?php echo hg_lang('Detail revenue analýzy Ellipse revPRO', 'Detail of Ellipse revPRO revenue analysis'); ?>" width="1400" height="788" loading="lazy" decoding="async">
        </div>
        <figcaption><span>revPRO</span><b><?php echo hg_lang('Dáta premenené na konkrétne odporúčanie', 'Data turned into a concrete recommendation'); ?></b></figcaption>
      </figure>
      <article class="os-reservation-card" data-parallax-depth="0.18" aria-label="<?php echo hg_lang('Ukážka detailu reálnej rezervácie', 'Example of a real reservation detail'); ?>">
        <header><small>#9972998</small><b>TestParking Jaro</b></header>
        <dl>
          <div><dt><?php echo hg_lang('Pobyt', 'Stay'); ?></dt><dd>17.09.2026 → 25.09.2026 · 8 <?php echo hg_lang('nocí', 'nights'); ?></dd></div>
          <div><dt><?php echo hg_lang('Osoby', 'Guests'); ?></dt><dd>2</dd></div>
          <div><dt><?php echo hg_lang('Izba', 'Room'); ?></dt><dd>203</dd></div>
          <div><dt><?php echo hg_lang('Kanál', 'Channel'); ?></dt><dd><?php echo hg_lang('Priamy predaj · Web booking', 'Direct sale · Web booking'); ?></dd></div>
          <div><dt><?php echo hg_lang('Účet', 'Account'); ?></dt><dd class="is-good"><?php echo hg_lang('Vyrovnaný', 'Balanced'); ?></dd></div>
        </dl>
        <footer><span><?php echo hg_lang('Hodnota pobytu', 'Stay value'); ?></span><strong>678,40 €</strong></footer>
      </article>
    </div>
    <ul class="os-callouts">
      <li><small><?php echo hg_lang('Prevádzka', 'Operations'); ?></small><b><?php echo hg_lang('Príchody, odchody a stav izieb', 'Arrivals, departures and room status'); ?></b></li>
      <li><small><?php echo hg_lang('Rezervácie', 'Reservations'); ?></small><b><?php echo hg_lang('Hotelová plachta v reálnom čase', 'Live hotel tape chart'); ?></b></li>
      <li><small>revPRO</small><b><?php echo hg_lang('Revenue odporúčania z dát', 'Revenue recommendations from data'); ?></b></li>
    </ul>
  </section>

  <section class="os-value" aria-label="<?php echo hg_lang('Biznis hodnota', 'Business value'); ?>">
    <p class="os-kicker"><?php echo hg_lang('Menej systémov. Viac kontroly.', 'Fewer systems. More control.'); ?></p>
    <div class="os-statement">
      <h2><?php echo hg_lang('Jedny dáta.', 'One data set.'); ?></h2>
      <p><?php echo hg_lang('Žiadne prepisovanie medzi izolovanými systémami.', 'No retyping between isolated systems.'); ?></p>
    </div>
    <div class="os-statement">
      <h2><?php echo hg_lang('Jedna prevádzka.', 'One operation.'); ?></h2>
      <p><?php echo hg_lang('Recepcia, manažment, gastro aj tím pracujú nad spoločným systémom.', 'Reception, management, F&B and the team work on one shared system.'); ?></p>
    </div>
    <div class="os-statement">
      <h2><?php echo hg_lang('Jeden hosť.', 'One guest.'); ?></h2>
      <p><?php echo hg_lang('Ellipse pozná cestu hosťa od rezervácie cez pobyt až po ďalšiu návštevu.', 'Ellipse knows the guest journey from booking through the stay to the next visit.'); ?></p>
    </div>
  </section>

  <section class="os-booking" id="booking" aria-label="<?php echo hg_lang('Predaj a distribúcia', 'Sales and distribution'); ?>">
    <p class="os-kicker"><?php echo hg_lang('Predaj a distribúcia', 'Sales and distribution'); ?></p>
    <h2><?php echo hg_lang('Predávajte izby všade. Riaďte ich na jednom mieste.', 'Sell rooms everywhere. Manage them in one place.'); ?></h2>
    <p class="os-lead"><?php echo hg_lang('Booking engine, channel manager, cenotvorba, dostupnosť a priame rezervácie ako jeden tok — nie samostatné produkty pospájané logami.', 'Booking engine, channel manager, rates, availability and direct bookings as one flow — not separate products glued together by logos.'); ?></p>
    <div class="os-booking-flow os-booking-fragments" data-fragment-stage>
      <figure class="os-ui os-crop-card os-booking-date" data-parallax-depth="0.04">
        <div class="os-fragment-viewport"><img src="<?php echo hg_esc(hg_asset('booking-1.webp')); ?>" alt="<?php echo hg_lang('Web booking, kalendár s cenou za noc', 'Web booking calendar with a nightly rate'); ?>" width="1400" height="709" loading="lazy" decoding="async"></div>
        <figcaption><small>01</small><b><?php echo hg_lang('Termín a cena', 'Dates and rate'); ?></b><span><?php echo hg_lang('Hosť vidí dostupnosť a cenu bez zbytočného kroku navyše.', 'The guest sees availability and price without an unnecessary extra step.'); ?></span></figcaption>
      </figure>
      <figure class="os-ui os-crop-card os-booking-room" data-parallax-depth="0.08">
        <div class="os-fragment-viewport"><img src="<?php echo hg_esc(hg_asset('booking-2.webp')); ?>" alt="<?php echo hg_lang('Výber izby a ponuky vo web bookingu', 'Room and offer selection in the web booking'); ?>" width="1400" height="708" loading="lazy" decoding="async"></div>
        <figcaption><small>02</small><b><?php echo hg_lang('Izba a balíček', 'Room and package'); ?></b><span><?php echo hg_lang('Cena, fotografia a podmienky zostávajú čitateľné v jednom bloku.', 'Price, photo and conditions stay readable in one block.'); ?></span></figcaption>
      </figure>
      <figure class="os-ui os-crop-card os-booking-pms" data-parallax-depth="0.12">
        <div class="os-fragment-viewport"><img src="<?php echo hg_esc(hg_asset('hero-pms.webp')); ?>" alt="<?php echo hg_lang('Rezervácia po zápise do Ellipse PMS', 'Reservation after being written into Ellipse PMS'); ?>" width="1200" height="675" loading="lazy" decoding="async"></div>
        <figcaption><small>03</small><b><?php echo hg_lang('Automaticky v PMS', 'Automatically in PMS'); ?></b><span><?php echo hg_lang('Tá istá rezervácia pokračuje do prevádzky bez ručného prepisovania.', 'The same reservation continues into operations without manual retyping.'); ?></span></figcaption>
      </figure>
    </div>
    <div class="os-actions">
      <a class="button ghost" href="/web-booking/"><?php echo hg_lang('Viac o web bookingu', 'More about web booking'); ?></a>
      <a class="button ghost" href="/channel-manager/"><?php echo hg_lang('Channel manager', 'Channel manager'); ?></a>
    </div>
  </section>

  <section class="os-inbox" id="komunikacia" aria-label="<?php echo hg_lang('Centrálny hub správ', 'Central message hub'); ?>">
    <p class="os-kicker"><?php echo hg_lang('Centrálny hub správ', 'Central message hub'); ?></p>
    <h2><?php echo hg_lang('Každá správa hosťa. Jedno miesto.', 'Every guest message. One place.'); ?></h2>
    <p class="os-lead"><?php echo hg_lang('Komunikácia z Booking.com, Expedia, Airbnb, Vrbo a priamych rezervácií sa zbieha do jedného komunikačného centra.', 'Messages from Booking.com, Expedia, Airbnb, Vrbo and direct bookings gather in one inbox.'); ?></p>
    <div class="os-inbox-grid">
      <article class="os-ui os-inbox-desk">
        <div class="os-inbox-bar"><span><?php echo hg_lang('Všetky správy', 'All messages'); ?></span><b>Booking.com · Expedia · Airbnb · Vrbo</b></div>
        <div class="os-inbox-thread">
          <p class="os-inbox-guest"><small><?php echo hg_lang('Hosť · Booking.com', 'Guest · Booking.com'); ?></small><?php echo hg_lang('Dobrý deň, môžeme prísť na check-in o niečo skôr?', 'Hello, could we check in a little earlier?'); ?></p>
          <p class="os-inbox-reply"><small><?php echo hg_lang('AI návrh odpovede', 'AI reply draft'); ?></small><?php echo hg_lang('Dobrý deň, skorší príchod radi preveríme. Hneď ako bude izba pripravená, dáme vám vedieť v tejto konverzácii.', 'Hello, we will gladly check the earlier arrival. As soon as the room is ready, we will tell you in this conversation.'); ?></p>
        </div>
      </article>
      <?php if (isset($teamPhones[2])): ?>
      <figure class="os-phone">
        <img src="<?php echo hg_esc($teamPhones[2]['img']); ?>" alt="<?php echo hg_lang('Správy v Ellipse Team', 'Messages in Ellipse Team'); ?>" loading="lazy" decoding="async">
        <figcaption><?php echo hg_lang('Rovnaká konverzácia v Ellipse Team', 'The same thread in Ellipse Team'); ?></figcaption>
      </figure>
      <?php elseif (isset($teamPhones[0])): ?>
      <figure class="os-phone">
        <img src="<?php echo hg_esc($teamPhones[0]['img']); ?>" alt="<?php echo hg_lang('Ellipse Team na mobile', 'Ellipse Team on mobile'); ?>" loading="lazy" decoding="async">
      </figure>
      <?php endif; ?>
    </div>
  </section>

  <section class="os-journey" id="selfcheckin" aria-label="<?php echo hg_lang('Guest Journey', 'Guest Journey'); ?>">
    <p class="os-kicker"><?php echo hg_lang('Self Check-in / Guest Journey', 'Self Check-in / Guest Journey'); ?></p>
    <h2><?php echo hg_lang('Hosť vybaví rutinu. Vy sa môžete venovať hosťovi.', 'The guest handles the routine. You can stay with the guest.'); ?></h2>
    <p class="os-lead"><?php echo hg_lang('Predpríchodová komunikácia → online check-in → údaje a dokumenty → doplnkové služby → platba → príchod → pobyt → checkout.', 'Pre-arrival messages → online check-in → details and documents → extras → payment → arrival → stay → checkout.'); ?></p>
    <figure class="os-ui">
      <img src="<?php echo hg_esc(hg_asset('selfcheckin.webp')); ?>" alt="<?php echo hg_lang('Ellipse Self Check-in na notebooku a mobile', 'Ellipse Self Check-in on a laptop and a phone'); ?>" width="1200" height="800" loading="lazy" decoding="async">
    </figure>
    <ol class="os-journey-steps">
      <?php foreach (array_slice($checkinPoints, 0, 6) as $i => $point): ?>
      <li><span><?php echo sprintf('%02d', $i + 1); ?></span><?php echo hg_esc(is_array($point) ? $point['name'] : $point); ?></li>
      <?php endforeach; ?>
    </ol>
    <div class="os-actions">
      <a class="button ghost" href="/online-check-in/"><?php echo hg_lang('Pozrieť Self Check-in', 'See Self Check-in'); ?></a>
    </div>
  </section>

  <section class="os-pay" id="platby" aria-label="<?php echo hg_lang('Platby a POS', 'Payments and POS'); ?>">
    <p class="os-kicker"><?php echo hg_lang('Payments + POS', 'Payments + POS'); ?></p>
    <h2><?php echo hg_lang('Platba nie je doplnok. Je súčasť pobytu.', 'Payment is not an add-on. It is part of the stay.'); ?></h2>
    <p class="os-lead"><?php echo hg_lang('Hotelové účty, online platby, terminály, gastro POS a finančné dáta zostávajú v tom istom systéme ako rezervácia.', 'Hotel folios, online payments, terminals, F&B POS and financial data stay in the same system as the reservation.'); ?></p>
    <div class="os-pay-grid">
      <figure class="os-ui">
        <img src="<?php echo hg_esc(hg_asset('booking-3.webp')); ?>" alt="<?php echo hg_lang('Platba vo web bookingu', 'Payment in the web booking'); ?>" width="1400" height="721" loading="lazy" decoding="async">
        <figcaption><?php echo hg_lang('Online platba pri rezervácii', 'Online payment with the booking'); ?></figcaption>
      </figure>
      <figure class="os-ui">
        <img src="<?php echo hg_esc(hg_asset('team-pos.webp')); ?>" alt="<?php echo hg_lang('Gastro POS v Ellipse Team', 'F&B POS in Ellipse Team'); ?>" width="800" height="1600" loading="lazy" decoding="async">
        <figcaption><?php echo hg_lang('Gastro POS a hotelový účet', 'F&B POS and the hotel folio'); ?></figcaption>
      </figure>
    </div>
    <div class="os-actions">
      <a class="button ghost" href="/pos-systemy/"><?php echo hg_lang('Gastro a POS', 'F&B and POS'); ?></a>
    </div>
  </section>

  <section class="os-team" id="team" aria-label="Ellipse Team">
    <p class="os-kicker">Ellipse Team</p>
    <h2><?php echo hg_lang('Vaša prevádzka sa presúva do mobilu.', 'Your operation moves into the phone.'); ?></h2>
    <p class="os-lead"><?php echo hg_lang('Na stretnutí, počas behania aj večer na gauči máte hotel alebo gastro prevádzku pod kontrolou.', 'In a meeting, while running around or on the sofa at night, the hotel or F&B operation stays under control.'); ?></p>
    <div class="os-team-widgets" aria-label="<?php echo hg_lang('Ukážky živých prevádzkových widgetov', 'Examples of live operational widgets'); ?>" data-fragment-stage>
      <article class="os-team-widget" data-parallax-depth="0.05">
        <small><?php echo hg_lang('Najbližšie dni', 'Next days'); ?></small>
        <div><strong>31</strong><span><?php echo hg_lang('izbonocí', 'room nights'); ?></span></div>
        <div class="os-mini-bars" aria-hidden="true"><i style="--v:.34"></i><i style="--v:.74"></i><i style="--v:.20"></i><i style="--v:.08"></i><i style="--v:.10"></i></div>
        <p>17.9&nbsp;&nbsp;18.9&nbsp;&nbsp;19.9&nbsp;&nbsp;20.9&nbsp;&nbsp;21.9</p>
      </article>
      <article class="os-team-widget" data-parallax-depth="0.10">
        <small><?php echo hg_lang('Tím dnes', 'Team today'); ?></small>
        <div><strong>4</strong><span><?php echo hg_lang('v práci', 'at work'); ?></span></div>
        <p><?php echo hg_lang('Termín dnes 0 · 0 nových úloh', 'Due today 0 · 0 new tasks'); ?><br><?php echo hg_lang('5 dní bez nových úloh', '5 days without new tasks'); ?></p>
      </article>
    </div>
    <div class="os-team-phones">
      <?php foreach ($teamPhones as $i => $screen): ?>
      <figure class="os-phone<?php echo $i === 2 || ($i === 0 && count($teamPhones) < 3) ? ' is-featured' : ''; ?>">
        <img src="<?php echo hg_esc($screen['img']); ?>" alt="<?php echo hg_esc($screen['name']); ?>" loading="lazy" decoding="async">
        <figcaption><?php echo hg_esc($screen['name']); ?></figcaption>
      </figure>
      <?php endforeach; ?>
    </div>
    <div class="os-actions">
      <a class="button ghost" href="https://apps.apple.com/sk/app/ellipse-team/id6806602365?l=sk" target="_blank" rel="noopener">App Store</a>
      <a class="button ghost" href="https://play.google.com/store/apps/details?id=com.ellipsecloud.team&amp;hl=sk" target="_blank" rel="noopener">Google Play</a>
    </div>
  </section>

  <section class="os-reviews" id="recenzie" aria-label="<?php echo hg_lang('Recenzie', 'Reviews'); ?>">
    <p class="os-kicker"><?php echo hg_lang('Online reputácia', 'Online reputation'); ?></p>
    <h2><?php echo hg_lang('Recenzie pod kontrolou z jedného miesta.', 'Reviews under control from one place.'); ?></h2>
    <p class="os-lead"><?php echo hg_lang('Centralizovaná správa online recenzií, AI návrhy odpovedí a odoslanie odpovedí späť na portály.', 'Centralised online review management, AI reply drafts and sending replies back to the portals.'); ?></p>
    <ol class="os-review-flow">
      <li>
        <small>01</small>
        <b><?php echo hg_lang('Recenzia príde z portálu', 'A review arrives from the portal'); ?></b>
        <p><?php echo hg_lang('„Izba bola čistá, raňajky výborné. Check-in trval dlhšie, než sme čakali.“', '“The room was clean, breakfast excellent. Check-in took longer than expected.”'); ?></p>
      </li>
      <li>
        <small>02</small>
        <b><?php echo hg_lang('AI pripraví návrh', 'AI drafts a reply'); ?></b>
        <p><?php echo hg_lang('Ďakujeme za spätnú väzbu. Teší nás čistota a raňajky. Check-in skracujeme online registráciou pred príchodom.', 'Thank you for the feedback. We are glad about the cleanliness and breakfast. We are shortening check-in with online registration before arrival.'); ?></p>
      </li>
      <li>
        <small>03</small>
        <b><?php echo hg_lang('Upravíte a odošlete', 'You edit and send'); ?></b>
        <p><?php echo hg_lang('Odpoveď odíde späť na portál z toho istého miesta, kde vidíte rezerváciu.', 'The reply goes back to the portal from the same place where you see the reservation.'); ?></p>
      </li>
    </ol>
  </section>

  <section class="os-ai" id="ella" aria-label="<?php echo hg_lang('Ellipse Intelligence', 'Ellipse Intelligence'); ?>">
    <p class="os-kicker"><?php echo hg_lang('Ellipse Intelligence', 'Ellipse Intelligence'); ?></p>
    <h2><?php echo hg_lang('Dáta, ktoré už iba neležia v systéme. Pracujú pre vás.', 'Data that no longer just sits in the system. It works for you.'); ?></h2>
    <p class="os-lead"><?php echo hg_lang('Ella AI, AI komunikácia, návrhy odpovedí na recenzie, analytika a automatizácie — vždy s konkrétnou úlohou a výsledkom.', 'Ella AI, AI messaging, review reply drafts, analytics and automations — always with a concrete task and outcome.'); ?></p>
    <div class="os-revpro-insights" aria-label="<?php echo hg_lang('Ukážka reálnej revenue analýzy', 'Example from a real revenue analysis'); ?>">
      <div class="os-revpro-metrics">
        <article><small><?php echo hg_lang('Medzitýždenne', 'Week over week'); ?></small><b>+202</b><span><?php echo hg_lang('izbonocí', 'room nights'); ?></span></article>
        <article><small><?php echo hg_lang('Výnos', 'Revenue'); ?></small><b>+18 234 €</b><span><?php echo hg_lang('v 18-mesačnom horizonte', 'over an 18-month horizon'); ?></span></article>
        <article><small><?php echo hg_lang('Posledných 7 dní', 'Last 7 days'); ?></small><b>17</b><span><?php echo hg_lang('rezervácií · priemer 3,2 noci', 'reservations · 3.2 nights average'); ?></span></article>
      </div>
      <article class="os-revpro-recommendation">
        <small><?php echo hg_lang('Konkrétne odporúčanie z analýzy', 'Concrete recommendation from the analysis'); ?></small>
        <h3><?php echo hg_lang('Zaviesť cielený upsell wellness balíkov pri check-ine a cez SMS', 'Introduce targeted wellness package upsell at check-in and via SMS'); ?></h3>
        <p><?php echo hg_lang('Ukážka z reálnej revPRO analýzy vytvorenej 21.09.2026. Ellipse nevypisuje iba grafy — formuluje aj konkrétne ďalšie kroky.', 'Example from a real revPRO analysis created on 21 Sep 2026. Ellipse does not only show charts — it also formulates concrete next actions.'); ?></p>
      </article>
    </div>
    <?php if ($claudeScene): ?>
    <article class="os-ai-task">
      <p class="os-kicker"><?php echo hg_esc($claudeScene['kicker']); ?></p>
      <h3><?php echo hg_lang('Úloha', 'Task'); ?></h3>
      <p><?php echo hg_esc($claudeScene['prompt']); ?></p>
      <h3><?php echo hg_lang('Výsledok', 'Outcome'); ?></h3>
      <p><?php echo hg_esc($claudeScene['answer']); ?></p>
    </article>
    <?php endif; ?>
    <div class="os-actions">
      <a class="button" href="/virtualna-recepcia-ella-ai/"><?php echo hg_lang('Pozrieť Ellu AI', 'See Ella AI'); ?> <span>↗</span></a>
    </div>
  </section>

  <section class="os-mcp" id="mcp" aria-label="<?php echo hg_lang('MCP', 'MCP'); ?>">
    <p class="os-kicker"><?php echo hg_lang('MCP — AI-ready platforma', 'MCP — AI-ready platform'); ?></p>
    <h2><?php echo hg_lang('Vaše hotelové dáta pripravené pre svet AI.', 'Your hotel data ready for the world of AI.'); ?></h2>
    <p class="os-lead"><?php echo hg_lang('Cez MCP môže oprávnený AI nástroj bezpečne pracovať s funkciami a dátami Ellipse bez komplikovaných ručných exportov.', 'Through MCP, an authorised AI tool can work safely with Ellipse functions and data — without awkward manual exports.'); ?></p>
    <div class="os-mcp-flow" aria-hidden="false">
      <span>Ellipse</span>
      <span aria-hidden="true">→</span>
      <span>MCP</span>
      <span aria-hidden="true">→</span>
      <span><?php echo hg_lang('AI agent / analytika', 'AI agent / analytics'); ?></span>
    </div>
    <?php if ($claudeScene): ?>
    <article class="os-ai-task">
      <p><?php echo hg_lang('Príklad: spýtate sa Claude na dochádzku housekeepingu. Model načíta príchody a odchody z Ellipse a pripraví rozpis síl po dňoch — na schválenie, nie tichý zápis.', 'Example: you ask Claude for a housekeeping rota. The model loads arrivals and departures from Ellipse and drafts staffing by day — for approval, not a silent write.'); ?></p>
    </article>
    <?php endif; ?>
    <p class="os-mcp-note"><?php echo hg_lang('Údaje odchádzajú anonymizované, bez mien hostí. Výstup je odporúčanie. Rozhodnutie ostáva na vás.', 'Data leaves anonymised, without guest names. The output is advice. The decision stays with you.'); ?></p>
    <div class="os-actions">
      <a class="button" href="/virtualna-recepcia-ella-ai/"><?php echo hg_lang('Pozrieť MCP a Ellu', 'See MCP and Ella'); ?> <span>↗</span></a>
      <a class="button ghost" href="<?php echo hg_esc($mcpArticle); ?>"><?php echo hg_lang('Návod v článku', 'Guide in the article'); ?></a>
    </div>
  </section>

  <section class="os-case" id="referencie" aria-label="<?php echo hg_lang('Príbeh z praxe', 'Story from the field'); ?>">
    <p class="os-kicker"><?php echo hg_lang('Príbeh klienta · revPRO', 'Client story · revPRO'); ?></p>
    <h2><?php echo hg_lang('Dva rovnaké apartmány. Jeden s revPRO. +600 € za dva týždne.', 'Two identical apartments. One with revPRO. +€600 in two weeks.'); ?></h2>
    <p class="os-lead"><?php echo hg_lang('Jeden klient otestoval revPRO na jednom z dvoch identických apartmánov. Východiskové podmienky boli rovnaké — výsledok nie.', 'One client tested revPRO on one of two identical apartments. Starting conditions were the same — the outcome was not.'); ?></p>
    <div class="os-case-grid">
      <div>
        <h3><?php echo hg_lang('Prevádzka', 'Property'); ?></h3>
        <p><?php echo hg_lang('Apartmánový ubytovateľ, dva identické apartmány, test od konca júla.', 'Apartment operator, two identical apartments, test from late July.'); ?></p>
        <h3><?php echo hg_lang('Problém', 'Problem'); ?></h3>
        <p><?php echo hg_lang('Predaj cez externý kanál so zľavami plnil kapacitu, ale izby išli často lacnejšie, než trh dovolil.', 'Sales through an external discount channel filled capacity, but rooms often sold cheaper than the market allowed.'); ?></p>
        <h3><?php echo hg_lang('Nový workflow', 'New workflow'); ?></h3>
        <p><?php echo hg_lang('Zľavy vypol, nastavil pravidlá v revPRO a denne kontroloval navrhované ceny podľa obsadenosti, sentimentu a sezóny.', 'He turned discounts off, set rules in revPRO and checked proposed rates daily against occupancy, sentiment and season.'); ?></p>
      </div>
      <div>
        <ul class="os-case-results">
          <li><b>2 000 €</b> <span><?php echo hg_lang('vypredaná kapacita na oboch apartmánoch na začiatku', 'sold capacity on both apartments at the start'); ?></span></li>
          <li><b>+600 €</b> <span><?php echo hg_lang('vyššie tržby na apartmáne s revPRO po dvoch týždňoch', 'higher revenue on the revPRO apartment after two weeks'); ?></span></li>
          <li><b>6</b> <span><?php echo hg_lang('rovnakých voľných izbonocí zostalo na oboch — rozdiel bol v cene, nie v obsadenosti', 'identical free room-nights left on both — the gap was price, not occupancy'); ?></span></li>
        </ul>
        <p class="os-case-note"><?php echo hg_lang('Výsledok konkrétneho klienta z článku, nie prísľub pre každú prevádzku.', 'A specific client result from the article, not a promise for every property.'); ?></p>
        <div class="os-case-fragments" data-fragment-stage>
          <figure class="os-fragment os-rev-summary" data-parallax-depth="0.05">
            <div class="os-fragment-viewport"><img src="<?php echo hg_esc($revImg); ?>" alt="<?php echo hg_lang('Zhrnutie revenue analýzy Ellipse revPRO', 'Summary from Ellipse revPRO revenue analysis'); ?>" width="1200" height="675" loading="lazy" decoding="async"></div>
            <figcaption><?php echo hg_lang('AI zhrnutie', 'AI summary'); ?></figcaption>
          </figure>
          <figure class="os-fragment os-rev-actions" data-parallax-depth="0.11">
            <div class="os-fragment-viewport"><img src="<?php echo hg_esc($revImg); ?>" alt="<?php echo hg_lang('Odporúčania z revenue analýzy Ellipse revPRO', 'Recommendations from Ellipse revPRO revenue analysis'); ?>" width="1200" height="675" loading="lazy" decoding="async"></div>
            <figcaption><?php echo hg_lang('Konkrétne odporúčania', 'Concrete recommendations'); ?></figcaption>
          </figure>
        </div>
      </div>
    </div>
    <blockquote>
      <p><?php echo hg_esc($trust['quote']); ?></p>
      <footer><b><?php echo hg_esc($trust['author']); ?></b><?php if (!empty($trust['place'])): ?> · <span><?php echo hg_esc($trust['place']); ?></span><?php endif; ?></footer>
    </blockquote>
    <div class="os-actions">
      <a class="button ghost" href="<?php echo hg_esc($revproCase); ?>"><?php echo hg_lang('Prečítať celý príbeh', 'Read the full story'); ?></a>
      <a class="button ghost" href="/vynosovy-modul-revpro/">revPRO</a>
    </div>
  </section>

  <section class="os-segments" id="segmenty" aria-label="<?php echo hg_lang('Pre koho je Ellipse', 'Who Ellipse is for'); ?>">
    <p class="os-kicker"><?php echo hg_lang('Pre koho je Ellipse', 'Who Ellipse is for'); ?></p>
    <h2><?php echo hg_lang('Ellipse sa prispôsobí. Nie naopak.', 'Ellipse adapts. Not the other way around.'); ?></h2>
    <div class="os-segment-tabs" role="tablist">
      <?php foreach ($segmentUi as $i => $seg):
        $tabId = 'seg-'.$i;
      ?>
      <button type="button" role="tab" data-os-tab="<?php echo hg_esc($tabId); ?>" aria-selected="<?php echo $i === 0 ? 'true' : 'false'; ?>"<?php echo $i === 0 ? ' class="is-on"' : ''; ?>><?php echo hg_esc($seg['tab']); ?></button>
      <?php endforeach; ?>
    </div>
    <?php foreach ($segmentUi as $i => $seg):
      $tabId = 'seg-'.$i;
    ?>
    <div class="os-segment-panel<?php echo $i === 0 ? ' is-on' : ''; ?>" data-os-panel="<?php echo hg_esc($tabId); ?>" role="tabpanel">
      <p class="os-kicker"><?php echo hg_esc($seg['kicker']); ?></p>
      <h3><?php echo nl2br(hg_esc($seg['title'])); ?></h3>
      <p class="os-lead"><?php echo hg_esc($seg['lead']); ?></p>
      <?php if (!empty($seg['points'])): ?>
      <ul>
        <?php foreach ($seg['points'] as $point): ?><li><?php echo hg_esc($point); ?></li><?php endforeach; ?>
      </ul>
      <?php endif; ?>
      <div class="os-actions">
        <a class="button" href="<?php echo hg_esc($seg['href']); ?>"><?php echo hg_esc($seg['cta']); ?> <span>↗</span></a>
      </div>
    </div>
    <?php endforeach; ?>
  </section>

  <section class="os-integrations" id="integracie" aria-label="<?php echo hg_lang('Integrácie', 'Integrations'); ?>">
    <p class="os-kicker"><?php echo hg_lang('Integrácie', 'Integrations'); ?></p>
    <h2><?php echo hg_lang('Ellipse zapadne do vášho sveta. Nemusí ho uzamknúť.', 'Ellipse fits into your world. It does not have to lock it.'); ?></h2>
    <p class="os-lead"><?php echo hg_lang('350+ integrácií — predajné kanály, platby, zámky, účtovníctvo a partneri. Logá sú sekundárne; pointou je otvorenosť platformy.', '350+ integrations — sales channels, payments, locks, accounting and partners. Logos stay secondary; openness is the point.'); ?></p>
    <ul class="os-int-cats">
      <li><?php echo hg_lang('OTA a channel manager', 'OTAs and channel manager'); ?></li>
      <li><?php echo hg_lang('Online platby a terminály', 'Online payments and terminals'); ?></li>
      <li><?php echo hg_lang('Zámkové a prístupové systémy', 'Lock and access systems'); ?></li>
      <li><?php echo hg_lang('Účtovníctvo a ERP', 'Accounting and ERP'); ?></li>
      <li><?php echo hg_lang('Google Hotels a marketing', 'Google Hotels and marketing'); ?></li>
    </ul>
    <div class="os-trust-logos">
      <?php foreach (array_slice($logos, 0, 6) as $logo): if (empty($logo['img'])) continue; ?>
      <img src="<?php echo hg_esc($logo['img']); ?>" alt="<?php echo hg_esc($logo['name']); ?>" loading="lazy" decoding="async">
      <?php endforeach; ?>
    </div>
  </section>

  <section class="os-security" id="dovera" aria-label="<?php echo hg_lang('Bezpečnosť a dôvera', 'Security and trust'); ?>">
    <p class="os-kicker"><?php echo hg_lang('Dôvera a infraštruktúra', 'Trust and infrastructure'); ?></p>
    <h2><?php echo hg_lang('Cloud, ktorý drží prevádzku — nie iba prezentáciu.', 'A cloud that carries the operation — not just the pitch.'); ?></h2>
    <ul class="os-security-facts">
      <li><b><?php echo hg_lang('Cloudová platforma', 'Cloud platform'); ?></b><span><?php echo hg_lang('Ellipse beží v prehliadači; tím má aj natívnu mobilnú aplikáciu.', 'Ellipse runs in the browser; the team also has a native mobile app.'); ?></span></li>
      <li><b><?php echo hg_lang('Jedny dáta', 'One data set'); ?></b><span><?php echo hg_lang('Rezervácia, platba, správa aj účet hosťa zostávajú v jednom systéme.', 'The reservation, payment, message and guest folio stay in one system.'); ?></span></li>
      <li><b>350+</b><span><?php echo hg_lang('integrácií s predajnými a prevádzkovými partnermi', 'integrations with sales and operations partners'); ?></span></li>
      <li><b><?php echo hg_lang('MCP s kontrolou', 'MCP with control'); ?></b><span><?php echo hg_lang('AI dostáva anonymizované prevádzkové dáta; rozhodnutie ostáva na vás.', 'AI receives anonymised operational data; the decision stays with you.'); ?></span></li>
      <li><b>HORECA GROUP</b><span><?php echo hg_esc($nap['street'].', '.$nap['zip'].' '.$nap['city']); ?></span></li>
    </ul>
  </section>

  <section class="os-faq" id="faq" aria-label="<?php echo hg_lang('Časté otázky', 'FAQ'); ?>">
    <p class="os-kicker"><?php echo hg_lang('Časté otázky', 'Common questions'); ?></p>
    <h2><?php echo hg_lang('Všetko podstatné pred rozhodnutím.', 'What matters before you decide.'); ?></h2>
    <div class="os-faq-list">
      <?php foreach ($faq as $i => $item): ?>
      <details<?php echo $i === 0 ? ' open' : ''; ?>>
        <summary><?php echo hg_esc($item['name']); ?></summary>
        <p><?php echo hg_esc(hg_plain(isset($item['text']) ? $item['text'] : '')); ?></p>
      </details>
      <?php endforeach; ?>
    </div>
  </section>

  <section class="os-final" id="demo" aria-label="<?php echo hg_lang('Demo', 'Demo'); ?>">
    <p class="os-kicker"><?php echo hg_lang('Ďalší krok', 'Next step'); ?></p>
    <h2><?php echo hg_lang('Pozrite sa, ako môže Ellipse fungovať vo vašej prevádzke.', 'See how Ellipse can work in your operation.'); ?></h2>
    <p class="os-lead"><?php echo hg_lang('Ukážeme vám Ellipse na vašich reálnych procesoch. Bez záväzkov, zrozumiteľne a prakticky.', 'We will show Ellipse on your real processes. No commitment, in plain language, hands on.'); ?></p>
    <div class="os-actions">
      <a class="button" href="<?php echo hg_esc($nap['demo']); ?>"><?php echo hg_lang('Dohodnúť ukážku Ellipse', 'Book an Ellipse demo'); ?> <span>↗</span></a>
      <a class="button ghost" href="/kontakt/"><?php echo hg_lang('Kontaktovať nás', 'Contact us'); ?></a>
    </div>
    <p class="os-final-meta"><small><?php echo hg_lang('Odpovieme spravidla do jedného pracovného dňa.', 'We usually reply within one working day.'); ?> · <?php echo hg_esc($nap['street'].', '.$nap['zip'].' '.$nap['city']); ?></small></p>
  </section>

</main>
