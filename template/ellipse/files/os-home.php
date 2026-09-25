<?php
require_once __DIR__.'/hg-client-logos.php';
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
    <div class="os-hero-visual eh-stage" aria-label="Ellipse PMS a mobilná aplikácia Ellipse Team">
      <div class="eh-orbit" aria-hidden="true"></div>
      <figure class="eh-desktop"><figcaption><span class="eh-live"></span> Ellipse PMS <small><?php echo hg_lang('Všetko spolu. V reálnom čase.', 'Connected. In real time.'); ?></small></figcaption><img src="<?php echo hg_esc(hg_asset('hero-pms.webp')); ?>" width="1920" height="1080" alt="<?php echo hg_lang('Skutočná hotelová plachta v Ellipse PMS', 'The real Ellipse PMS reservation timeline'); ?>" fetchpriority="high" decoding="async"></figure>
      <figure class="eh-phone"><button type="button" data-screen-open aria-label="<?php echo hg_lang('Zväčšiť ukážku Ellipse Team', 'Enlarge Ellipse Team'); ?>"><img src="<?php echo hg_esc(hg_asset('mobile/screen-00.webp')); ?>" width="885" height="1920" alt="Ellipse Team — analýza dochádzky a prehľad tímu" decoding="async"></button><figcaption>Ellipse Team <span>iOS + Android</span></figcaption></figure>
      <a class="eh-note" href="#team"><span class="eh-note-icon" aria-hidden="true"><svg class="hg-icon" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="20" height="20" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true" focusable="false"><path d="M7 17 17 7M7 7h10v10"/></svg></span><span><?php echo hg_lang('Celá prevádzka. Aj vo vrecku.', 'Your whole operation. In your pocket.'); ?><small><?php echo hg_lang('Objavte mobilnú aplikáciu', 'Explore the mobile app'); ?></small></span></a>
      <div class="eh-pill"><span class="eh-live"></span><?php echo hg_lang('Recepcia · tím · gastro · dáta', 'Front desk · team · dining · data'); ?></div>
    </div>
  </section>

  <section class="eh-problems eh-problems-carousel" id="problemy">
<p class="os-kicker"><?php echo hg_lang('Riešenia z praxe','Practical solutions'); ?></p><h2><?php echo hg_lang('Čo dnes brzdí vašu prevádzku?','What is holding your business back?'); ?></h2>
<div class="eh-problem-controls"><p><?php echo hg_lang('Vyberte si tému. Ukážeme vám cestu k riešeniu.','Choose a topic. Discover a way forward.'); ?></p><div><button type="button" data-problem-prev aria-label="<?php echo hg_lang('Predchádzajúce témy','Previous topics'); ?>"><svg viewBox="0 0 24 24" aria-hidden="true"><path d="m14 6-6 6 6 6"/></svg></button><span data-problem-page aria-live="polite">1 / 6</span><button type="button" data-problem-next aria-label="<?php echo hg_lang('Ďalšie témy','Next topics'); ?>"><svg viewBox="0 0 24 24" aria-hidden="true"><path d="m10 6 6 6-6 6"/></svg></button></div></div>
<?php require_once __DIR__.'/hg-solutions-data.php'; $homeTopics=array();
foreach(hg_solutions() as $solution) $homeTopics[$solution['slug']]=array('eyebrow'=>implode(' · ',array_slice($solution['roles'],0,2)),'title'=>$solution['title'],'lead'=>$solution['description'],'href'=>'/blog/?riesenie='.rawurlencode($solution['slug']));
foreach(array_chunk($homeTopics,6,true) as $pageIndex=>$topicPage): ?>
<div class="eh-problem-grid" data-problem-panel<?php echo $pageIndex?' hidden':''; ?>><?php foreach($topicPage as $key=>$topic): ?><a href="<?php echo hg_esc($topic['href'] ?? '/blog/?tema=problemy&problem='.$key); ?>"><span><?php echo hg_esc($topic['eyebrow']); ?></span><h3><?php echo hg_esc($topic['title']); ?></h3><p><?php echo hg_esc($topic['lead']); ?></p><b><?php echo hg_lang('Pozrieť riešenie','Explore solution'); ?> <span aria-hidden="true">→</span></b></a><?php endforeach; ?></div><?php endforeach; ?>
</section>
<section class="os-trust" id="referencie" aria-label="<?php echo hg_lang('Dôvera', 'Trust'); ?>">
    <p class="eh-trust-label"><?php echo hg_lang('V dobrej spoločnosti. Prevádzky, ktoré používajú Ellipse.', 'In good company. Businesses powered by Ellipse.'); ?></p>
    <div class="eh-logo-window" data-logo-marquee><div class="eh-logo-track">
      <?php for ($copy=0; $copy<2; $copy++): ?><div class="eh-logo-set"<?php if ($copy) echo ' aria-hidden="true"'; ?>>
      <?php foreach ($ellipseClientLogos as $logo): ?><img src="<?php echo hg_esc(hg_asset('logos/'.$logo[0])); ?>" alt="<?php echo $copy ? '' : hg_esc($logo[1]); ?>" width="400" height="200" loading="lazy" decoding="async"><?php endforeach; ?>
      </div><?php endfor; ?>
    </div></div>
    <button class="eh-motion" type="button" data-logo-pause aria-pressed="false"><?php echo hg_lang('Pozastaviť pohyb', 'Pause motion'); ?></button>
    <ul class="os-trust-stats">
      <?php foreach (array_slice($trust['stats'], 0, 3) as $stat): ?>
      <li><b><?php echo hg_esc($stat['name']); ?></b> <?php echo hg_esc(hg_plain($stat['text'])); ?></li>
      <?php endforeach; ?>
    </ul>
  </section>

  

<?php include __DIR__.'/hg-module-tour.php'; ?>
<details class="eh-original-screens"><summary>Pozrieť všetky produktové ukážky</summary><section class="os-product" id="showcase" aria-label="<?php echo hg_lang('Produkt Ellipse', 'Ellipse product'); ?>">
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

  

  <section class="os-booking" id="booking" aria-label="<?php echo hg_lang('Predaj a distribúcia', 'Sales and distribution'); ?>">
    <p class="os-kicker"><?php echo hg_lang('Predaj a distribúcia', 'Sales and distribution'); ?></p>
    <h2><?php echo hg_lang('Predávajte izby všade. Riaďte ich na jednom mieste.', 'Sell rooms everywhere. Manage them in one place.'); ?></h2>
    <p class="os-lead"><?php echo hg_lang('Booking engine, channel manager, cenotvorba, dostupnosť a priame rezervácie ako jeden tok — nie samostatné produkty pospájané logami.', 'Booking engine, channel manager, rates, availability and direct bookings as one flow — not separate products glued together by logos.'); ?></p>
    <figure class="er-booking er-original"><button type="button" data-screen-open aria-label="<?php echo hg_lang('Zväčšiť ukážku web bookingu', 'Enlarge web booking'); ?>"><img src="<?php echo hg_esc(hg_asset('product-originals/web-booking.png')); ?>" width="1900" height="1520" alt="<?php echo hg_lang('Reálny Ellipse web booking: výber izby, pobytové ponuky a rekapitulácia rezervácie v mobile', 'Real Ellipse web booking: mobile room selection, stay offers and booking summary'); ?>" loading="lazy" decoding="async"></button><figcaption><span><?php echo hg_lang('Takto rezervujú vaši hostia.', 'How your guests book.'); ?></span><span><?php echo hg_lang('Kliknite a pozrite si detail', 'Click to explore the details'); ?></span></figcaption></figure>
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
<div class="em-showcase"><div class="em-controls"><span><?php echo hg_lang('Skutočné obrazovky. Každý detail.', 'Real screens. Every detail.'); ?></span><button type="button" data-mobile-prev aria-label="<?php echo hg_lang('Predchádzajúce obrazovky', 'Previous screens'); ?>"><svg class="hg-icon" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="20" height="20" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true" focusable="false"><path d="M19 12H5m6-6-6 6 6 6"/></svg></button><button type="button" data-mobile-next aria-label="<?php echo hg_lang('Ďalšie obrazovky', 'Next screens'); ?>"><svg class="hg-icon" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="20" height="20" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true" focusable="false"><path d="M5 12h14m-6-6 6 6-6 6"/></svg></button></div><div class="em-rail" tabindex="0" aria-label="Ellipse Self Check-in"><figure class="em-shot"><button class="em-phone" type="button" data-screen-open aria-label="<?php echo hg_lang('Zväčšiť: Váš pobyt na dosah', 'Enlarge: Your stay at a glance'); ?>"><img src="<?php echo hg_esc(hg_asset('mobile/self-1.webp')); ?>" width="885" height="1920" alt="Ellipse Self Check-in — <?php echo hg_lang('Váš pobyt na dosah', 'Your stay at a glance'); ?>" loading="lazy" decoding="async"></button><figcaption><?php echo hg_lang('Váš pobyt na dosah', 'Your stay at a glance'); ?></figcaption></figure><figure class="em-shot"><button class="em-phone" type="button" data-screen-open aria-label="<?php echo hg_lang('Zväčšiť: Online check-in a vstup do izby', 'Enlarge: Online check-in and room access'); ?>"><img src="<?php echo hg_esc(hg_asset('mobile/self-3.webp')); ?>" width="885" height="1920" alt="Ellipse Self Check-in — <?php echo hg_lang('Online check-in a vstup do izby', 'Online check-in and room access'); ?>" loading="lazy" decoding="async"></button><figcaption><?php echo hg_lang('Online check-in a vstup do izby', 'Online check-in and room access'); ?></figcaption></figure><figure class="em-shot"><button class="em-phone" type="button" data-screen-open aria-label="<?php echo hg_lang('Zväčšiť: Hotelový účet a platba', 'Enlarge: Hotel bill and payment'); ?>"><img src="<?php echo hg_esc(hg_asset('mobile/self-2.webp')); ?>" width="885" height="1920" alt="Ellipse Self Check-in — <?php echo hg_lang('Hotelový účet a platba', 'Hotel bill and payment'); ?>" loading="lazy" decoding="async"></button><figcaption><?php echo hg_lang('Hotelový účet a platba', 'Hotel bill and payment'); ?></figcaption></figure><figure class="em-shot"><button class="em-phone" type="button" data-screen-open aria-label="<?php echo hg_lang('Zväčšiť: Služby a zážitky', 'Enlarge: Services and experiences'); ?>"><img src="<?php echo hg_esc(hg_asset('mobile/self-4.webp')); ?>" width="885" height="1920" alt="Ellipse Self Check-in — <?php echo hg_lang('Služby a zážitky', 'Services and experiences'); ?>" loading="lazy" decoding="async"></button><figcaption><?php echo hg_lang('Služby a zážitky', 'Services and experiences'); ?></figcaption></figure><figure class="em-shot"><button class="em-phone" type="button" data-screen-open aria-label="<?php echo hg_lang('Zväčšiť: Jednoduché overenie hosťa', 'Enlarge: Simple guest verification'); ?>"><img src="<?php echo hg_esc(hg_asset('mobile/self-0.webp')); ?>" width="885" height="1920" alt="Ellipse Self Check-in — <?php echo hg_lang('Jednoduché overenie hosťa', 'Simple guest verification'); ?>" loading="lazy" decoding="async"></button><figcaption><?php echo hg_lang('Jednoduché overenie hosťa', 'Simple guest verification'); ?></figcaption></figure></div></div>
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
      <figure class="er-crm er-original"><button type="button" class="er-crm-viewport" data-screen-open aria-label="<?php echo hg_lang('Zväčšiť klientsky CRM účet', 'Enlarge the customer CRM account'); ?>"><img src="<?php echo hg_esc(hg_asset('product-originals/crm-account.png')); ?>" width="2000" height="1500" alt="<?php echo hg_lang('Klientsky účet Ellipse: kredit, QR kód, správy a e-mailové preferencie hosťa', 'Ellipse customer account: credit, QR code, messages and email preferences'); ?>" loading="lazy" decoding="async"></button><figcaption><?php echo hg_lang('Skutočný klientsky účet. V mobile hosťa.', 'The real customer account. In your guest’s phone.'); ?></figcaption></figure>
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
<div class="em-showcase"><div class="em-controls"><span><?php echo hg_lang('Skutočné obrazovky. Každý detail.', 'Real screens. Every detail.'); ?></span><button type="button" data-mobile-prev aria-label="<?php echo hg_lang('Predchádzajúce obrazovky', 'Previous screens'); ?>"><svg class="hg-icon" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="20" height="20" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true" focusable="false"><path d="M19 12H5m6-6-6 6 6 6"/></svg></button><button type="button" data-mobile-next aria-label="<?php echo hg_lang('Ďalšie obrazovky', 'Next screens'); ?>"><svg class="hg-icon" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="20" height="20" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true" focusable="false"><path d="M5 12h14m-6-6 6 6-6 6"/></svg></button></div><div class="em-rail" tabindex="0" aria-label="Ellipse Team"><figure class="em-shot"><button class="em-phone" type="button" data-screen-open aria-label="<?php echo hg_lang('Zväčšiť: Hotelová plachta', 'Enlarge: Room calendar'); ?>"><img src="<?php echo hg_esc(hg_asset('mobile/screen-08.webp')); ?>" width="885" height="1920" alt="Ellipse Team — <?php echo hg_lang('Hotelová plachta', 'Room calendar'); ?>" loading="lazy" decoding="async"></button><figcaption><?php echo hg_lang('Hotelová plachta', 'Room calendar'); ?></figcaption></figure><figure class="em-shot"><button class="em-phone" type="button" data-screen-open aria-label="<?php echo hg_lang('Zväčšiť: Obsadenosť a výnosy', 'Enlarge: Occupancy and revenue'); ?>"><img src="<?php echo hg_esc(hg_asset('mobile/screen-07.webp')); ?>" width="885" height="1920" alt="Ellipse Team — <?php echo hg_lang('Obsadenosť a výnosy', 'Occupancy and revenue'); ?>" loading="lazy" decoding="async"></button><figcaption><?php echo hg_lang('Obsadenosť a výnosy', 'Occupancy and revenue'); ?></figcaption></figure><figure class="em-shot"><button class="em-phone" type="button" data-screen-open aria-label="<?php echo hg_lang('Zväčšiť: Analýza dochádzky', 'Enlarge: Attendance analytics'); ?>"><img src="<?php echo hg_esc(hg_asset('mobile/screen-00.webp')); ?>" width="885" height="1920" alt="Ellipse Team — <?php echo hg_lang('Analýza dochádzky', 'Attendance analytics'); ?>" loading="lazy" decoding="async"></button><figcaption><?php echo hg_lang('Analýza dochádzky', 'Attendance analytics'); ?></figcaption></figure><figure class="em-shot"><button class="em-phone" type="button" data-screen-open aria-label="<?php echo hg_lang('Zväčšiť: Prehľad tímu', 'Enlarge: Team overview'); ?>"><img src="<?php echo hg_esc(hg_asset('mobile/screen-01.webp')); ?>" width="885" height="1920" alt="Ellipse Team — <?php echo hg_lang('Prehľad tímu', 'Team overview'); ?>" loading="lazy" decoding="async"></button><figcaption><?php echo hg_lang('Prehľad tímu', 'Team overview'); ?></figcaption></figure><figure class="em-shot"><button class="em-phone" type="button" data-screen-open aria-label="<?php echo hg_lang('Zväčšiť: Housekeeping v praxi', 'Enlarge: Housekeeping in action'); ?>"><img src="<?php echo hg_esc(hg_asset('mobile/screen-02.webp')); ?>" width="885" height="1920" alt="Ellipse Team — <?php echo hg_lang('Housekeeping v praxi', 'Housekeeping in action'); ?>" loading="lazy" decoding="async"></button><figcaption><?php echo hg_lang('Housekeeping v praxi', 'Housekeeping in action'); ?></figcaption></figure><figure class="em-shot"><button class="em-phone" type="button" data-screen-open aria-label="<?php echo hg_lang('Zväčšiť: CRM a hostia', 'Enlarge: CRM and guests'); ?>"><img src="<?php echo hg_esc(hg_asset('mobile/screen-06.webp')); ?>" width="885" height="1920" alt="Ellipse Team — <?php echo hg_lang('CRM a hostia', 'CRM and guests'); ?>" loading="lazy" decoding="async"></button><figcaption><?php echo hg_lang('CRM a hostia', 'CRM and guests'); ?></figcaption></figure><figure class="em-shot"><button class="em-phone" type="button" data-screen-open aria-label="<?php echo hg_lang('Zväčšiť: Inventúra', 'Enlarge: Inventory'); ?>"><img src="<?php echo hg_esc(hg_asset('mobile/screen-05.webp')); ?>" width="885" height="1920" alt="Ellipse Team — <?php echo hg_lang('Inventúra', 'Inventory'); ?>" loading="lazy" decoding="async"></button><figcaption><?php echo hg_lang('Inventúra', 'Inventory'); ?></figcaption></figure><figure class="em-shot"><button class="em-phone" type="button" data-screen-open aria-label="<?php echo hg_lang('Zväčšiť: Stravovanie', 'Enlarge: Meal service'); ?>"><img src="<?php echo hg_esc(hg_asset('mobile/screen-04.webp')); ?>" width="885" height="1920" alt="Ellipse Team — <?php echo hg_lang('Stravovanie', 'Meal service'); ?>" loading="lazy" decoding="async"></button><figcaption><?php echo hg_lang('Stravovanie', 'Meal service'); ?></figcaption></figure><figure class="em-shot"><button class="em-phone" type="button" data-screen-open aria-label="<?php echo hg_lang('Zväčšiť: Príjemky', 'Enlarge: Stock receipts'); ?>"><img src="<?php echo hg_esc(hg_asset('mobile/screen-03.webp')); ?>" width="885" height="1920" alt="Ellipse Team — <?php echo hg_lang('Príjemky', 'Stock receipts'); ?>" loading="lazy" decoding="async"></button><figcaption><?php echo hg_lang('Príjemky', 'Stock receipts'); ?></figcaption></figure></div></div>
    <div class="os-actions">
      <a class="button ghost" href="https://apps.apple.com/sk/app/ellipse-team/id6806602365?l=sk" target="_blank" rel="noopener">App Store</a>
      <a class="button ghost" href="https://play.google.com/store/apps/details?id=com.ellipsecloud.team&amp;hl=sk" target="_blank" rel="noopener">Google Play</a>
    </div>
  </section>

<section class="em-pos" id="pos" aria-label="Ellipse POS"><p class="os-kicker">Ellipse POS</p><h2><?php echo hg_lang('Od objednávky po zaplatený účet.', 'From the first order to the final payment.'); ?></h2><p class="os-lead"><?php echo hg_lang('Stoly, objednávky aj uzávierky priamo v ruke. Pozrite si skutočné prostredie Ellipse POS — prehľadne a do detailu.', 'Tables, orders and closing reports in your hand. Explore the real Ellipse POS interface in detail.'); ?></p><div class="em-showcase"><div class="em-controls"><span><?php echo hg_lang('Skutočné obrazovky. Každý detail.', 'Real screens. Every detail.'); ?></span><button type="button" data-mobile-prev aria-label="<?php echo hg_lang('Predchádzajúce obrazovky', 'Previous screens'); ?>"><svg class="hg-icon" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="20" height="20" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true" focusable="false"><path d="M19 12H5m6-6-6 6 6 6"/></svg></button><button type="button" data-mobile-next aria-label="<?php echo hg_lang('Ďalšie obrazovky', 'Next screens'); ?>"><svg class="hg-icon" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="20" height="20" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true" focusable="false"><path d="M5 12h14m-6-6 6 6-6 6"/></svg></button></div><div class="em-rail" tabindex="0" aria-label="Ellipse POS"><figure class="em-shot"><button class="em-phone" type="button" data-screen-open aria-label="<?php echo hg_lang('Zväčšiť: Prehľad stolov', 'Enlarge: Table overview'); ?>"><img src="<?php echo hg_esc(hg_asset('pos/pos2.webp')); ?>" width="460" height="996" alt="Ellipse POS — <?php echo hg_lang('Prehľad stolov', 'Table overview'); ?>" loading="lazy" decoding="async"></button><figcaption><?php echo hg_lang('Prehľad stolov', 'Table overview'); ?></figcaption></figure><figure class="em-shot"><button class="em-phone" type="button" data-screen-open aria-label="<?php echo hg_lang('Zväčšiť: Objednávka pri stole', 'Enlarge: Table ordering'); ?>"><img src="<?php echo hg_esc(hg_asset('pos/pos.webp')); ?>" width="460" height="996" alt="Ellipse POS — <?php echo hg_lang('Objednávka pri stole', 'Table ordering'); ?>" loading="lazy" decoding="async"></button><figcaption><?php echo hg_lang('Objednávka pri stole', 'Table ordering'); ?></figcaption></figure><figure class="em-shot"><button class="em-phone" type="button" data-screen-open aria-label="<?php echo hg_lang('Zväčšiť: Správa a rozdelenie účtu', 'Enlarge: Manage and split bills'); ?>"><img src="<?php echo hg_esc(hg_asset('pos/pos14.webp')); ?>" width="885" height="1920" alt="Ellipse POS — <?php echo hg_lang('Správa a rozdelenie účtu', 'Manage and split bills'); ?>" loading="lazy" decoding="async"></button><figcaption><?php echo hg_lang('Správa a rozdelenie účtu', 'Manage and split bills'); ?></figcaption></figure><figure class="em-shot"><button class="em-phone" type="button" data-screen-open aria-label="<?php echo hg_lang('Zväčšiť: Platba na izbu a ďalšie možnosti', 'Enlarge: Room charges and payment options'); ?>"><img src="<?php echo hg_esc(hg_asset('pos/pos13.webp')); ?>" width="885" height="1920" alt="Ellipse POS — <?php echo hg_lang('Platba na izbu a ďalšie možnosti', 'Room charges and payment options'); ?>" loading="lazy" decoding="async"></button><figcaption><?php echo hg_lang('Platba na izbu a ďalšie možnosti', 'Room charges and payment options'); ?></figcaption></figure><figure class="em-shot"><button class="em-phone" type="button" data-screen-open aria-label="<?php echo hg_lang('Zväčšiť: Detail dokladu', 'Enlarge: Receipt detail'); ?>"><img src="<?php echo hg_esc(hg_asset('pos/pos10.webp')); ?>" width="885" height="1920" alt="Ellipse POS — <?php echo hg_lang('Detail dokladu', 'Receipt detail'); ?>" loading="lazy" decoding="async"></button><figcaption><?php echo hg_lang('Detail dokladu', 'Receipt detail'); ?></figcaption></figure><figure class="em-shot"><button class="em-phone" type="button" data-screen-open aria-label="<?php echo hg_lang('Zväčšiť: Úhrada faktúry', 'Enlarge: Invoice payment'); ?>"><img src="<?php echo hg_esc(hg_asset('pos/pos11.webp')); ?>" width="885" height="1920" alt="Ellipse POS — <?php echo hg_lang('Úhrada faktúry', 'Invoice payment'); ?>" loading="lazy" decoding="async"></button><figcaption><?php echo hg_lang('Úhrada faktúry', 'Invoice payment'); ?></figcaption></figure><figure class="em-shot"><button class="em-phone" type="button" data-screen-open aria-label="<?php echo hg_lang('Zväčšiť: Vklad a výber hotovosti', 'Enlarge: Cash deposits and withdrawals'); ?>"><img src="<?php echo hg_esc(hg_asset('pos/pos12.webp')); ?>" width="885" height="1920" alt="Ellipse POS — <?php echo hg_lang('Vklad a výber hotovosti', 'Cash deposits and withdrawals'); ?>" loading="lazy" decoding="async"></button><figcaption><?php echo hg_lang('Vklad a výber hotovosti', 'Cash deposits and withdrawals'); ?></figcaption></figure><figure class="em-shot"><button class="em-phone" type="button" data-screen-open aria-label="<?php echo hg_lang('Zväčšiť: Tržby a uzávierky', 'Enlarge: Sales and closing reports'); ?>"><img src="<?php echo hg_esc(hg_asset('pos/pos3.webp')); ?>" width="460" height="996" alt="Ellipse POS — <?php echo hg_lang('Tržby a uzávierky', 'Sales and closing reports'); ?>" loading="lazy" decoding="async"></button><figcaption><?php echo hg_lang('Tržby a uzávierky', 'Sales and closing reports'); ?></figcaption></figure><figure class="em-shot"><button class="em-phone" type="button" data-screen-open aria-label="<?php echo hg_lang('Zväčšiť: Prihlásenie do Ellipse POS', 'Enlarge: Sign in to Ellipse POS'); ?>"><img src="<?php echo hg_esc(hg_asset('pos/pos-login.png')); ?>" width="1179" height="2556" alt="Ellipse POS — <?php echo hg_lang('Prihlásenie do Ellipse POS', 'Sign in to Ellipse POS'); ?>" loading="lazy" decoding="async"></button><figcaption><?php echo hg_lang('Prihlásenie do Ellipse POS', 'Sign in to Ellipse POS'); ?></figcaption></figure></div></div><div class="os-actions"><a class="button ghost" href="/pos-systemy/"><?php echo hg_lang('Objavte Ellipse POS', 'Discover Ellipse POS'); ?></a></div></section>
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

  </details>


  <section class="os-mcp eh-ai-compact" id="mcp" aria-label="<?php echo hg_lang('MCP', 'MCP'); ?>">
    <span id="ella"></span><p class="os-kicker">ELLA AI + MCP</p>
    <h2><?php echo hg_lang('Opýtajte sa svojich dát.', 'Ask your data.'); ?></h2>
    <p class="os-lead"><?php echo hg_lang('Cez MCP môže oprávnený AI nástroj bezpečne pracovať s funkciami a dátami Ellipse bez komplikovaných ručných exportov.', 'Through MCP, an authorised AI tool can work safely with Ellipse functions and data — without awkward manual exports.'); ?></p>


    <div class="er-mcp-switch" role="group" aria-label="<?php echo hg_lang('Ukážky MCP', 'MCP examples'); ?>">
<button type="button" data-mcp-slide="0" aria-pressed="true" aria-controls="mcp-example-0"><?php echo hg_lang('Analýza obsadenosti', 'Occupancy analysis'); ?></button>
<button type="button" data-mcp-slide="1" aria-pressed="false" aria-controls="mcp-example-1"><?php echo hg_lang('Plánovanie tímu', 'Team planning'); ?></button>
</div><div class="er-mcp-gallery">
      <figure class="er-mcp er-original" id="mcp-example-0"><figcaption><span>Ellipse × Claude</span><strong><?php echo hg_lang('Od otázky k analýze obsadenosti a predaja.', 'From a question to occupancy and sales analysis.'); ?></strong></figcaption><button type="button" data-screen-open aria-label="<?php echo hg_lang('Zväčšiť ukážku MCP v Claude', 'Enlarge the MCP example in Claude'); ?>"><img src="<?php echo hg_esc(hg_asset('product-originals/claude-analysis.webp')); ?>" width="1920" height="979" alt="<?php echo hg_lang('Od otázky k analýze obsadenosti a predaja.', 'From a question to occupancy and sales analysis.'); ?>" loading="lazy" decoding="async"></button><a href="<?php echo hg_esc(hg_asset('product-originals/claude-analysis.webp')); ?>" target="_blank" rel="noopener"><?php echo hg_lang('Otvoriť originálny screenshot', 'Open the original screenshot'); ?> <svg class="hg-icon" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="20" height="20" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true" focusable="false"><path d="M7 17 17 7M7 7h10v10"/></svg></a></figure>
      <figure class="er-mcp er-original" id="mcp-example-1" hidden><figcaption><span>Ellipse × Claude</span><strong><?php echo hg_lang('Od analýzy dát k návrhu rozpisu tímu.', 'From data analysis to a proposed team rota.'); ?></strong></figcaption><button type="button" data-screen-open aria-label="<?php echo hg_lang('Zväčšiť ukážku MCP v Claude', 'Enlarge the MCP example in Claude'); ?>"><img src="<?php echo hg_esc(hg_asset('product-originals/claude-workflow.webp')); ?>" width="1920" height="981" alt="<?php echo hg_lang('Od analýzy dát k návrhu rozpisu tímu.', 'From data analysis to a proposed team rota.'); ?>" loading="lazy" decoding="async"></button><a href="<?php echo hg_esc(hg_asset('product-originals/claude-workflow.webp')); ?>" target="_blank" rel="noopener"><?php echo hg_lang('Otvoriť originálny screenshot', 'Open the original screenshot'); ?> <svg class="hg-icon" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="20" height="20" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true" focusable="false"><path d="M7 17 17 7M7 7h10v10"/></svg></a></figure>
    </div>
    <p class="os-mcp-note"><?php echo hg_lang('Údaje odchádzajú anonymizované, bez mien hostí. Výstup je odporúčanie. Rozhodnutie ostáva na vás.', 'Data leaves anonymised, without guest names. The output is advice. The decision stays with you.'); ?></p>
    <div class="os-actions"><a class="button ghost" href="/virtualna-recepcia-ella-ai/">Ella AI</a>
      <a class="button" href="/virtualna-recepcia-ella-ai/"><?php echo hg_lang('Pozrieť MCP a Ellu', 'See MCP and Ella'); ?></a>
      <a class="button ghost" href="<?php echo hg_esc($mcpArticle); ?>"><?php echo hg_lang('Návod v článku', 'Guide in the article'); ?></a>
    </div>
  </section>

  

  

<?php include __DIR__.'/hg-integrations.php'; ?>

  

  

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

