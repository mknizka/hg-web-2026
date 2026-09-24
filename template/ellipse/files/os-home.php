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

// Exact, responsive viewports into original Ellipse screenshots. No reconstructed data.
$fragment = function ($file, $sw, $sh, $x, $y, $w, $h, $alt, $eager = false) {
  echo '<div class="ef-viewport" style="aspect-ratio:'.$w.' / '.$h.'">';
  echo '<img src="'.hg_esc(hg_asset('fragments/'.$file)).'" alt="'.hg_esc($alt).'" width="'.$sw.'" height="'.$sh.'" loading="'.($eager ? 'eager' : 'lazy').'" decoding="async"'.($eager ? ' fetchpriority="high"' : '').' style="width:'.round($sw / $w * 100, 5).'%;left:'.round(-$x / $w * 100, 5).'%;top:'.round(-$y / $h * 100, 5).'%;">';
  echo '</div>';
};
?>

<main id="top" class="os-home">
  <?php include __DIR__.'/hg-audience.php'; ?>

  <section class="os-hero" aria-label="<?php echo hg_lang('Úvod', 'Intro'); ?>">
    <div class="os-hero-copy">
      <p class="os-kicker"><?php echo hg_lang('Ellipse Hospitality OS', 'Ellipse Hospitality OS'); ?></p>
      <h1><?php echo hg_lang('Celá prevádzka. Jeden systém.', 'Your whole operation. One system.'); ?></h1>
      <p class="os-lead"><?php echo hg_lang('Rezervácie, predaj, prevádzka, tím, platby aj komunikácia s hosťami v jednej cloudovej platforme.', 'Reservations, sales, operations, the team, payments and guest messaging in one cloud platform.'); ?></p>
      <div class="os-actions">
        <a class="button" href="<?php echo hg_esc($nap['demo']); ?>"><?php echo hg_lang('Pozrieť Ellipse v akcii', 'See Ellipse in action'); ?></a>
        <a class="button ghost" href="#platforma"><?php echo hg_lang('Objaviť platformu', 'Discover the platform'); ?></a>
      </div>
    </div>
    <div class="os-hero-visual ef-hero" aria-label="<?php echo hg_lang('Detaily z Ellipse', 'Details from Ellipse'); ?>">
      <figure class="ef-card ef-hero-chart">
        <figcaption><span class="ef-dot"></span><?php echo hg_lang('Vývoj obsadenosti', 'Occupancy trend'); ?><small>2025 / 2026</small></figcaption>
        <?php $fragment('occupancy.webp',4392,938,0,190,2240,700,hg_lang('Krivkový graf obsadenosti, január až jún', 'Occupancy curves, January to June'),true); ?>
      </figure>
      <figure class="ef-card ef-hero-calendar">
        <?php $fragment('pace-calendar.webp',1830,642,30,60,650,530,hg_lang('Kalendár tempa predaja na september', 'September sales pace calendar')); ?>
        <figcaption><?php echo hg_lang('Tempo predaja', 'Sales pace'); ?></figcaption>
      </figure>
      <figure class="ef-card ef-dark ef-hero-target">
        <?php $fragment('mobile-target.webp',1179,1189,64,441,1050,725,hg_lang('Ellipse Team: výsledky oproti ročnému cieľu', 'Ellipse Team: performance against the annual target')); ?>
        <figcaption>Ellipse Team</figcaption>
      </figure>
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
          <img class="ef-core-logo" src="<?php echo hg_esc(hg_asset('fragments/ellipse-original.svg')); ?>" alt="Ellipse" width="210" height="64" loading="lazy" decoding="async">
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
          <b>Ellipse Loyalty + CRM</b>
          <span><?php echo hg_lang('Vernosť, digitálne karty a personalizovaná komunikácia.', 'Loyalty, digital cards and personalised communication.'); ?></span>
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
    <p class="os-kicker"><?php echo hg_lang('Ellipse zblízka', 'Ellipse up close'); ?></p>
    <h2><?php echo hg_lang('Malé detaily. Veľký prehľad.', 'Small details. The whole picture.'); ?></h2>
    <p class="os-lead"><?php echo hg_lang('Rezervácie, obsadenosť a tempo predaja. To podstatné máte vždy pred očami.', 'Reservations, occupancy and sales pace. Keep what matters in view.'); ?></p>
    <div class="ef-scenes">
      <article class="ef-scene">
        <div class="ef-scene-copy"><span class="ef-index">01 / PMS</span><h3><?php echo hg_lang('Každá izba. Každý pobyt.', 'Every room. Every stay.'); ?></h3><p><?php echo hg_lang('Voľné kapacity aj detail rezervácie v jednom pohľade. Recepcia vie, čo sa deje dnes a čo ju čaká zajtra.', 'Availability and reservation details in one view. Your front desk knows what is happening today and what comes next.'); ?></p><a href="/hotelovy-system/" class="ef-text-link"><?php echo hg_lang('Objaviť hotelový systém', 'Explore the hotel system'); ?></a></div>
        <div class="ef-scene-art ef-tape-scene">
          <figure class="ef-card ef-tape-grid"><figcaption><?php echo hg_lang('Hotelová plachta', 'Reservation timeline'); ?><small>Ellipse PMS</small></figcaption><?php $fragment('reservation-tape.webp',4438,2292,30,521,1850,665,hg_lang('Priblížená plachta: dátumy a prvé izby', 'Zoomed timeline: dates and the first rooms')); ?></figure>
          <figure class="ef-card ef-dark ef-tape-detail"><?php $fragment('reservation-tape.webp',4438,2292,1895,1687,670,600,hg_lang('Detail testovacej rezervácie v izbe 203', 'Test reservation detail for room 203')); ?></figure>
        </div>
      </article>
      <article class="ef-scene ef-scene-reverse">
        <div class="ef-scene-copy"><span class="ef-index">02 / REVENUE</span><h3><?php echo hg_lang('Viete, ako sa predáva zajtrajšok.', 'Know how tomorrow is selling.'); ?></h3><p><?php echo hg_lang('Kalendár odhalí silné dni. Medziročné porovnanie ukáže tempo rezervácií a výnosov. Rozhodujete sa s kontextom.', 'The calendar highlights strong days. Year-on-year comparisons show booking and revenue pace. Make decisions in context.'); ?></p><a href="/vynosovy-modul-revpro/" class="ef-text-link"><?php echo hg_lang('Spoznajte revPRO', 'Discover revPRO'); ?></a></div>
        <div class="ef-scene-art ef-pace-scene">
          <figure class="ef-card ef-pace-calendar"><?php $fragment('pace-calendar.webp',1830,642,30,60,650,530,hg_lang('Farebný kalendár tempa predaja', 'Colour-coded sales pace calendar')); ?></figure>
          <figure class="ef-card ef-pace-metrics"><figcaption><?php echo hg_lang('Medziročné porovnanie', 'Year-on-year comparison'); ?></figcaption><?php $fragment('pace-calendar.webp',1830,642,750,302,675,250,hg_lang('Tempo izbonocí a revenue v porovnaní s minulým rokom', 'Room-night and revenue pace compared with last year')); ?></figure>
        </div>
      </article>
    </div>
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
        <div class="os-booking-preview"><?php $fragment('reservation-tape.webp',4438,2292,1895,1687,670,600,hg_lang('Detail rezervácie v Ellipse PMS', 'Reservation detail in Ellipse PMS')); ?></div>
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
    </div>
  </section>

  <section class="os-journey" id="selfcheckin" aria-label="<?php echo hg_lang('Guest Journey', 'Guest Journey'); ?>">
    <p class="os-kicker"><?php echo hg_lang('Self Check-in / Guest Journey', 'Self Check-in / Guest Journey'); ?></p>
    <h2><?php echo hg_lang('Hosť vybaví rutinu. Vy sa môžete venovať hosťovi.', 'The guest handles the routine. You can stay with the guest.'); ?></h2>
    <p class="os-lead"><?php echo hg_lang('Predpríchodová komunikácia · online check-in · údaje a dokumenty · doplnkové služby · platba · príchod · pobyt · checkout.', 'Pre-arrival messages · online check-in · details and documents · extras · payment · arrival · stay · checkout.'); ?></p>
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

  <section class="os-pay os-payments" id="platby" aria-label="<?php echo hg_lang('Bezpečné online aj POS platby', 'Secure online and POS payments'); ?>">
    <p class="os-kicker"><?php echo hg_lang('Ellipse Payments', 'Ellipse Payments'); ?></p>
    <h2><?php echo hg_lang('Bezpečné online aj POS platby.', 'Secure online and POS payments.'); ?></h2>
    <p class="os-lead"><?php echo hg_lang('Na webe, na recepcii aj v reštaurácii. Platby prepojené s Ellipse, s kontrolou v reálnom čase a jasným prehľadom o každej transakcii.', 'On your website, at reception and in the restaurant. Payments connected to Ellipse, with real-time monitoring and a clear view of every transaction.'); ?></p>
    <div class="ep-showcase">
      <div class="ep-device">
        <span class="ep-device-label">Ellipse POS <span>× SUNMI</span></span>
        <img src="<?php echo hg_esc(hg_asset('sunmi-v3-ellipse-pos.webp')); ?>" alt="<?php echo hg_lang('Terminál SUNMI V3 v ruke s aplikáciou Ellipse POS', 'Handheld SUNMI V3 terminal running Ellipse POS'); ?>" width="1185" height="349" loading="lazy" decoding="async">
        <p><?php echo hg_lang('Vaša POS aplikácia. Priamo v termináli.', 'Your POS application. Right on the terminal.'); ?></p>
      </div>
    </div>
    <article class="ep-tap">
      <p class="os-kicker">Tap to Pay</p>
      <h3><?php echo hg_lang('Platba kartou, eKasa a Ellipse POS. Priamo v mobile.', 'Card payments, eKasa and Ellipse POS. Right on your phone.'); ?></h3>
      <p><?php echo hg_lang('Prijímajte bezkontaktné platby kartou alebo digitálnou peňaženkou cez Tap to Pay. Ellipse POS, eKasa a platby v jednom mobilnom pracovnom nástroji — pri stole, na recepcii aj v teréne.', 'Accept contactless card or digital wallet payments with Tap to Pay. Ellipse POS, eKasa and payments in one mobile workspace — at the table, at reception or on the go.'); ?></p>
      <small><?php echo hg_lang('Dostupnosť Tap to Pay a eKasy závisí od kompatibility zariadenia a aktivovaných služieb.', 'Tap to Pay and eKasa availability depends on device compatibility and enabled services.'); ?></small>
    </article>
    <div class="ep-features">
      <article><span class="ep-number">01</span><h3><?php echo hg_lang('Online aj pri pulte', 'Online and at the counter'); ?></h3><p><?php echo hg_lang('Platby na webe aj cez POS terminály v jednom prepojenom prostredí. Pre hotel, recepciu aj gastro.', 'Website and POS terminal payments in one connected environment. For the hotel, front desk and restaurant.'); ?></p></article>
      <article><span class="ep-number">02</span><h3><?php echo hg_lang('Kontrola v reálnom čase', 'Real-time control'); ?></h3><p><?php echo hg_lang('API prepojenie priebežne overuje stav platieb. Detail transakcie aj jej aktuálny stav máte priamo v Ellipse.', 'The API connection checks payment status as it changes. See transaction details and current status directly in Ellipse.'); ?></p></article>
      <article><span class="ep-number">03</span><h3><?php echo hg_lang('Opakované platby', 'Recurring payments'); ?></h3><p><?php echo hg_lang('Spracovanie opakovaných platieb podľa dohodnutých podmienok a súhlasu klienta. Menej manuálnych krokov pre váš tím.', 'Process recurring payments under agreed terms and with customer consent. Fewer manual steps for your team.'); ?></p></article>
      <article><span class="ep-number">04</span><h3><?php echo hg_lang('Tokenizácia kariet', 'Card tokenization'); ?></h3><p><?php echo hg_lang('Citlivé údaje karty pri ďalších platbách zastupuje bezpečný token. Ochrana údajov je súčasťou celého platobného procesu.', 'A secure token represents sensitive card details for subsequent payments. Data protection is part of the entire payment process.'); ?></p></article>
    </div>
    <div class="os-actions"><a class="button" href="<?php echo hg_esc($nap['demo']); ?>"><?php echo hg_lang('Ukázať platby v Ellipse', 'See payments in Ellipse'); ?></a><a class="button ghost" href="/pos-systemy/"><?php echo hg_lang('Spoznajte Ellipse POS', 'Explore Ellipse POS'); ?></a></div>
  </section>

  <section class="os-loyalty" id="loyalty" aria-labelledby="loyalty-title">
    <p class="os-kicker">Ellipse Loyalty &amp; CRM</p>
    <h2 id="loyalty-title"><?php echo hg_lang('Z návštevy vzťah. Z hosťa stály klient.', 'Turn a visit into a relationship. A guest into a regular.'); ?></h2>
    <p class="os-lead"><?php echo hg_lang('Vernosť nevzniká náhodou. Budujte ju naprieč celou prevádzkou — od malého bistra po hotelový rezort. Jeden vernostný ekosystém pre všetky moduly Ellipse, online aj osobne.', 'Loyalty does not happen by chance. Build it across your business, from a small bistro to a hotel resort. One loyalty ecosystem for every Ellipse module, online and in person.'); ?></p>
    <div class="loyalty-core">
      <div class="loyalty-pass">
        <img src="<?php echo hg_esc(hg_asset('fragments/ellipse-original.svg')); ?>" alt="Ellipse" width="140" height="43" loading="lazy">
        <p><?php echo hg_lang('Jedna karta. Všetky výhody.', 'One card. Every benefit.'); ?></p>
        <span>Ellipse Loyalty</span>
        <small>Apple Wallet · Google Wallet</small>
      </div>
      <div class="loyalty-copy">
        <h3><?php echo hg_lang('V mobile hosťa. V srdci vašej prevádzky.', 'In your guest’s phone. At the heart of your business.'); ?></h3>
        <p><?php echo hg_lang('Digitálna vernostná karta je vždy poruke. Jednoduchý scan QR kódu identifikuje zákazníka na kase aj v mobilnom čašníkovi. Bez plastovej či RFID karty.', 'A digital loyalty card is always at hand. A quick QR scan identifies the customer at the till or in the mobile waiter. No plastic or RFID card needed.'); ?></p>
        <p><?php echo hg_lang('Pobyty, služby, jedlo aj darčekové poukazy. Online rezervácie a nákupy sa prepájajú s platbami na prevádzke do jedného zákazníckeho prehľadu.', 'Stays, services, food and gift vouchers. Online bookings and purchases connect with on-site payments in one customer overview.'); ?></p>
      </div>
    </div>
    <div class="loyalty-benefits">
      <article><h3><?php echo hg_lang('Odmeny, ktoré vracajú hostí', 'Rewards that bring guests back'); ?></h3><p><?php echo hg_lang('Cashback, vernostné body a zvýhodnenia podľa pravidiel vášho podniku. Dôvod na ďalší pobyt, obed či masáž.', 'Cashback, loyalty points and benefits based on your business rules. A reason for another stay, lunch or massage.'); ?></p></article>
      <article><h3><?php echo hg_lang('Ponuka pre konkrétneho človeka', 'An offer for the individual'); ?></h3><p><?php echo hg_lang('Personalizované ponuky a priama komunikácia vrátane Wallet notifikácií. Relevantne, podľa nastavení a súhlasov zákazníka.', 'Personalised offers and direct communication, including Wallet notifications. Relevant to the customer and respecting their settings and consent.'); ?></p></article>
      <article><h3><?php echo hg_lang('Celý vzťah v jednom CRM', 'The whole relationship in one CRM'); ?></h3><p><?php echo hg_lang('Nákupy, využitie výhod aj vyhodnocovanie vernostného programu naprieč modulmi. Prehľad, s ktorým viete ďalej pracovať.', 'Purchases, benefit usage and loyalty programme evaluation across modules. An overview you can put to work.'); ?></p></article>
    </div>
    <div class="loyalty-return">
      <div><p class="os-kicker"><?php echo hg_lang('Dajte hosťom dôvod vrátiť sa', 'Give guests a reason to return'); ?></p><h3><?php echo hg_lang('Vernosť potrebuje ďalší krok.', 'Loyalty needs a next step.'); ?></h3></div>
      <p><?php echo hg_lang('Nastavte napríklad prepad bodov po 180 dňoch neaktivity. Pred vypršaním pripomeňte hosťovi jeho výhody a pozvite ho späť — na pobyt, večeru, wellness alebo nákup darčekového poukazu. Pravidlá aj motivácia zostávajú vo vašich rukách.', 'Set points to expire after 180 days of inactivity, for example. Before expiry, remind guests of their benefits and invite them back for a stay, dinner, wellness visit or gift voucher purchase. You control the rules and the incentive.'); ?></p>
    </div>
    <p class="loyalty-note"><?php echo hg_lang('Dostupnosť notifikácií závisí od platformy a nastavení zariadenia. Pridanie karty do Wallet samo osebe nenahrádza súhlas s marketingovou komunikáciou.', 'Notification availability depends on the platform and device settings. Adding a Wallet card does not itself replace consent to marketing communications.'); ?></p>
    <div class="os-actions"><a class="button" href="/kontakt/"><?php echo hg_lang('Ukážte mi Ellipse Loyalty', 'Show me Ellipse Loyalty'); ?></a></div>
  </section>

  <section class="os-team" id="team" aria-label="Ellipse Team">
    <p class="os-kicker">Ellipse Team</p>
    <h2><?php echo hg_lang('Vaša prevádzka sa presúva do mobilu.', 'Your operation moves into the phone.'); ?></h2>
    <p class="os-lead"><?php echo hg_lang('Na stretnutí, počas behania aj večer na gauči máte hotel alebo gastro prevádzku pod kontrolou.', 'In a meeting, while running around or on the sofa at night, the hotel or F&B operation stays under control.'); ?></p>
    <div class="ef-mobile-widgets">
      <figure class="ef-card ef-dark ef-mobile-occupancy">
        <div class="ef-viewport" style="aspect-ratio:382 / 295"><img src="<?php echo hg_esc(hg_asset('team-2.webp')); ?>" alt="<?php echo hg_lang('Mobilný widget obsadenosti', 'Mobile occupancy widget'); ?>" loading="lazy" decoding="async" style="width:120.42%;left:-6.28%;top:-43.73%;"></div>
        <figcaption><?php echo hg_lang('Obsadenosť na dosah', 'Occupancy at a glance'); ?></figcaption>
      </figure>
      <figure class="ef-card ef-dark ef-mobile-target"><?php $fragment('mobile-target.webp',1179,1189,64,441,1050,725,hg_lang('Výsledky oproti ročnému cieľu v Ellipse Team', 'Performance against the annual target in Ellipse Team')); ?><figcaption><?php echo hg_lang('Výsledky oproti cieľu', 'Performance against target'); ?></figcaption></figure>
      <figure class="ef-card ef-dark ef-mobile-forecast"><?php $fragment('mobile-forecast.webp',1179,2556,64,1182,1050,728,hg_lang('Revenue forecast v mobilnej aplikácii', 'Revenue forecast in the mobile app')); ?><figcaption><?php echo hg_lang('Výhľad výnosov', 'Revenue forecast'); ?></figcaption></figure>
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
      <a class="button" href="/virtualna-recepcia-ella-ai/"><?php echo hg_lang('Pozrieť Ellu AI', 'See Ella AI'); ?></a>
    </div>
  </section>

  <section class="os-mcp" id="mcp" aria-label="<?php echo hg_lang('MCP', 'MCP'); ?>">
    <p class="os-kicker"><?php echo hg_lang('MCP — AI-ready platforma', 'MCP — AI-ready platform'); ?></p>
    <h2><?php echo hg_lang('Vaše hotelové dáta pripravené pre svet AI.', 'Your hotel data ready for the world of AI.'); ?></h2>
    <p class="os-lead"><?php echo hg_lang('Cez MCP môže oprávnený AI nástroj bezpečne pracovať s funkciami a dátami Ellipse bez komplikovaných ručných exportov.', 'Through MCP, an authorised AI tool can work safely with Ellipse functions and data — without awkward manual exports.'); ?></p>
    <div class="os-mcp-flow" aria-hidden="false">
      <span>Ellipse</span>

      <span>MCP</span>

      <span><?php echo hg_lang('AI agent / analytika', 'AI agent / analytics'); ?></span>
    </div>
    <?php if ($claudeScene): ?>
    <article class="os-ai-task">
      <p><?php echo hg_lang('Príklad: spýtate sa Claude na dochádzku housekeepingu. Model načíta príchody a odchody z Ellipse a pripraví rozpis síl po dňoch — na schválenie, nie tichý zápis.', 'Example: you ask Claude for a housekeeping rota. The model loads arrivals and departures from Ellipse and drafts staffing by day — for approval, not a silent write.'); ?></p>
    </article>
    <?php endif; ?>
    <p class="os-mcp-note"><?php echo hg_lang('Údaje odchádzajú anonymizované, bez mien hostí. Výstup je odporúčanie. Rozhodnutie ostáva na vás.', 'Data leaves anonymised, without guest names. The output is advice. The decision stays with you.'); ?></p>
    <div class="os-actions">
      <a class="button" href="/virtualna-recepcia-ella-ai/"><?php echo hg_lang('Pozrieť MCP a Ellu', 'See MCP and Ella'); ?></a>
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
      </div>
    </div>
    <blockquote>
      <p><?php echo hg_esc($trust['quote']); ?></p>
      <cite class="os-quote-attribution"><b><?php echo hg_esc($trust['author']); ?></b><?php if (!empty($trust['place'])): ?> · <span><?php echo hg_esc($trust['place']); ?></span><?php endif; ?></cite>
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
      <button type="button" role="tab" id="<?php echo hg_esc($tabId.'-tab'); ?>" aria-controls="<?php echo hg_esc($tabId.'-panel'); ?>" data-os-tab="<?php echo hg_esc($tabId); ?>" aria-selected="<?php echo $i === 0 ? 'true' : 'false'; ?>" tabindex="<?php echo $i === 0 ? '0' : '-1'; ?>"<?php echo $i === 0 ? ' class="is-on"' : ''; ?>><?php echo hg_esc($seg['tab']); ?></button>
      <?php endforeach; ?>
    </div>
    <?php foreach ($segmentUi as $i => $seg):
      $tabId = 'seg-'.$i;
    ?>
    <div class="os-segment-panel<?php echo $i === 0 ? ' is-on' : ''; ?>" id="<?php echo hg_esc($tabId.'-panel'); ?>" data-os-panel="<?php echo hg_esc($tabId); ?>" role="tabpanel" aria-labelledby="<?php echo hg_esc($tabId.'-tab'); ?>">
      <p class="os-kicker"><?php echo hg_esc($seg['kicker']); ?></p>
      <h3><?php echo nl2br(hg_esc($seg['title'])); ?></h3>
      <p class="os-lead"><?php echo hg_esc($seg['lead']); ?></p>
      <?php if (!empty($seg['points'])): ?>
      <ul>
        <?php foreach ($seg['points'] as $point): ?><li><?php echo hg_esc($point); ?></li><?php endforeach; ?>
      </ul>
      <?php endif; ?>
      <div class="os-actions">
        <a class="button" href="<?php echo hg_esc($seg['href']); ?>"><?php echo hg_esc($seg['cta']); ?></a>
      </div>
    </div>
    <?php endforeach; ?>
  </section>

  <section class="os-integrations" id="integracie" aria-label="<?php echo hg_lang('Integrácie', 'Integrations'); ?>">
    <p class="os-kicker"><?php echo hg_lang('Integrácie', 'Integrations'); ?></p>
    <h2><?php echo hg_lang('Ellipse zapadne do vášho sveta. Nemusí ho uzamknúť.', 'Ellipse fits into your world. It does not have to lock it.'); ?></h2>
    <p class="os-lead"><?php echo hg_lang('Prepojte predajné kanály, platby, zámky aj účtovníctvo. Ellipse prepája nástroje, ktoré vaša prevádzka používa každý deň.', 'Connect sales channels, payments, locks and accounting. Ellipse brings together the tools your operation uses every day.'); ?></p>
    <ul class="os-int-cats">
      <li><?php echo hg_lang('OTA a channel manager', 'OTAs and channel manager'); ?></li>
      <li><?php echo hg_lang('Online platby a terminály', 'Online payments and terminals'); ?></li>
      <li><?php echo hg_lang('Zámkové a prístupové systémy', 'Lock and access systems'); ?></li>
      <li><?php echo hg_lang('Účtovníctvo a ERP', 'Accounting and ERP'); ?></li>
      <li><?php echo hg_lang('Google Hotels a marketing', 'Google Hotels and marketing'); ?></li>
    </ul>
    <div class="os-actions"><a class="button ghost" href="/kontakt/"><?php echo hg_lang('Overiť konkrétnu integráciu', 'Check a specific integration'); ?></a></div>
  </section>

  <section class="os-security" id="dovera" aria-label="<?php echo hg_lang('Bezpečnosť a dôvera', 'Security and trust'); ?>">
    <p class="os-kicker"><?php echo hg_lang('Dôvera a infraštruktúra', 'Trust and infrastructure'); ?></p>
    <h2><?php echo hg_lang('Spoľahlivé zázemie pre vašu prevádzku.', 'A reliable foundation for your operation.'); ?></h2>
    <ul class="os-security-facts">
      <li><b><?php echo hg_lang('Cloudová platforma', 'Cloud platform'); ?></b><span><?php echo hg_lang('Ellipse beží v prehliadači; tím má aj natívnu mobilnú aplikáciu.', 'Ellipse runs in the browser; the team also has a native mobile app.'); ?></span></li>
      <li><b><?php echo hg_lang('Jedny dáta', 'One data set'); ?></b><span><?php echo hg_lang('Rezervácia, platba, správa aj účet hosťa zostávajú v jednom systéme.', 'The reservation, payment, message and guest folio stay in one system.'); ?></span></li>
      <li><b>350+</b><span><?php echo hg_lang('integrácií s predajnými a prevádzkovými partnermi', 'integrations with sales and operations partners'); ?></span></li>
      <li><b><?php echo hg_lang('MCP s kontrolou', 'MCP with control'); ?></b><span><?php echo hg_lang('AI dostáva anonymizované prevádzkové dáta; rozhodnutie ostáva na vás.', 'AI receives anonymised operational data; the decision stays with you.'); ?></span></li>
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

  <?php if (count($posts)): ?>
  <section class="os-journal" id="blog">
    <p class="os-kicker"><?php echo hg_lang('Novinky a blog', 'News and blog'); ?></p>
    <h2><?php echo hg_lang('Nové nápady pre vašu prevádzku.', 'Fresh ideas for your operation.'); ?></h2>
    <div class="aud-posts">
      <?php foreach (array_slice($posts, 0, 3) as $post): ?>
      <article><a href="/<?php echo hg_esc(trim($post['sef'], '/')); ?>/">
        <?php if (!empty($post['file_type'])): ?><img src="/img/rs/<?php echo (int)$post['id']; ?>.<?php echo hg_esc($post['file_type']); ?>" alt="" width="640" height="400" loading="lazy"><?php endif; ?>
        <h3><?php echo hg_esc(hg_plain($post['name'])); ?></h3>
        <p><?php echo hg_esc(hg_plain(isset($post['parex_text']) ? $post['parex_text'] : '', 150)); ?></p>
        <span><?php echo hg_lang('Čítať článok', 'Read article'); ?></span>
      </a></article>
      <?php endforeach; ?>
    </div>
    <div class="os-actions"><a class="button ghost" href="/blog/"><?php echo hg_lang('Všetky články', 'All articles'); ?></a></div>
  </section>
  <?php endif; ?>

  <section class="os-final" id="demo" aria-label="<?php echo hg_lang('Demo', 'Demo'); ?>">
    <p class="os-kicker"><?php echo hg_lang('Ďalší krok', 'Next step'); ?></p>
    <h2><?php echo hg_lang('Nebrzdite svoj biznis starým systémom.', 'Do not let an old system hold your business back.'); ?></h2>
    <p class="os-lead"><?php echo hg_lang('Ukážeme vám Ellipse na vašich reálnych procesoch. Bez záväzkov, zrozumiteľne a prakticky.', 'We will show Ellipse on your real processes. No commitment, in plain language, hands on.'); ?></p>
    <div class="os-actions">
      <a class="button" href="<?php echo hg_esc($nap['demo']); ?>"><?php echo hg_lang('Dohodnúť ukážku Ellipse', 'Book an Ellipse demo'); ?></a>
      <a class="button ghost" href="/kontakt/"><?php echo hg_lang('Kontaktovať nás', 'Contact us'); ?></a>
    </div>
    <p class="os-final-meta"><small><?php echo hg_lang('Odpovieme spravidla do jedného pracovného dňa.', 'We usually reply within one working day.'); ?> · <?php echo hg_esc($nap['street'].', '.$nap['zip'].' '.$nap['city']); ?></small></p>
  </section>

</main>
