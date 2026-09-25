<?php
  require_once __DIR__ . '/hg_site.php';
  hg_ensure_banner_categories();

  $all = function_exists('themeSetupAll') ? themeSetupAll() : array('flat' => array());
  if (isset($all['flat']) && is_array($all['flat'])) {
    extract($all['flat']);
  }
  $hgLang = function_exists('sess') && sess('lang') ? sess('lang') : 'sk';
  $nap = hg_nap();
  $base = rtrim(DOMENA_WEBU, '/');
  $canonical = $base.'/';
  $staging = hg_is_staging_marketing();
  $metaDesc = isset($content['description']) ? trim((string)$content['description']) : '';
  if ($metaDesc === '') {
    $metaDesc = hg_lang(
      'Ellipse je cloudová platforma pre hotely, reštaurácie, wellness a aquaparky. Rezervácie, predaj, platby, gastro a tím v jednom systéme.',
      'Ellipse is a cloud platform for hotels, restaurants, wellness and waterparks. Reservations, sales, payments, F&B and the team in one system.'
    );
  }
  $ogTitle = isset($content['title']) ? trim((string)$content['title']) : '';
  if ($ogTitle === '') {
    $ogTitle = 'Ellipse Cloud — HORECA GROUP';
  }

  $newsRows = hg_rows_or(27, array());
  $posts = hg_articles('55,57,76', 3);
  $news = count($newsRows) ? $newsRows[0] : null;

  $shots = hg_rows_or(17, array());
  if (count($shots) === 0) {
    $shots = hg_shot_fallback();
  }
  $logos = hg_rows_or(19, array());
  if (count($logos) === 0) {
    $logos = hg_logo_fallback();
  }
  $platform = hg_rows_or(20, hg_platform_fallback());
  $segFromCms = count(hg_banner_rows(21)) > 0;
  $segments = hg_rows_or(21, hg_segment_fallback());
  $flowFromCms = count(hg_banner_rows(22)) > 0;
  $automation = hg_rows_or(22, hg_automation_fallback());
  $checkinPoints = hg_rows_or(23, array());
  if (count($checkinPoints) === 0) {
    $checkinPoints = array();
    foreach (hg_checkin_fallback() as $point) {
      $checkinPoints[] = array('name' => $point);
    }
  }
  $team = hg_rows_or(24, array());
  if (count($team) === 0) {
    $team = hg_team_fallback();
  }
  $faq = hg_rows_or(25, hg_faq_fallback());
  $trust = hg_split_trust(hg_banner_rows(26));

  $faqNodes = array();
  foreach ($faq as $item) {
    $faqNodes[] = array(
      '@type' => 'Question',
      'name' => hg_plain($item['name']),
      'acceptedAnswer' => array('@type' => 'Answer', 'text' => hg_plain(isset($item['text']) ? $item['text'] : '')),
    );
  }

  $shotAt = function ($index, $file) use ($shots) {
    if (isset($shots[$index]['img']) && $shots[$index]['img'] !== '') {
      return $shots[$index]['img'];
    }
    return hg_asset($file);
  };
  $heroShots = array(
    array('img' => $shotAt(0, 'hero-pms.webp'), 'tab' => hg_lang('Hotelová plachta', 'Tape chart'), 'badge' => hg_lang('Hotelová plachta rezervácií', 'Reservation tape chart'), 'alt' => hg_lang('Hotelová plachta Ellipse PMS s reálnymi rezerváciami', 'Ellipse PMS tape chart with live reservations')),
    array('img' => $shotAt(1, 'hero-day.webp'), 'tab' => hg_lang('Denný prehľad', 'Daily view'), 'badge' => hg_lang('Denný dashboard prevádzky', 'Daily operations dashboard'), 'alt' => hg_lang('Denný dashboard Ellipse PMS s očakávanými príchodmi a odchodmi', 'Ellipse PMS daily dashboard with expected arrivals and departures')),
    array('img' => $shotAt(2, 'hero-rev.webp'), 'tab' => hg_lang('revPRO analýza', 'revPRO analysis'), 'badge' => hg_lang('Revenue analýza revPRO', 'revPRO revenue analysis'), 'alt' => hg_lang('Revenue analýza a odporúčania v Ellipse revPRO', 'Revenue analysis and recommendations in Ellipse revPRO')),
  );
  $showcase = array(
    array('img' => hg_asset('hero-day.webp'), 'alt' => hg_lang('Reálny dashboard Ellipse PMS', 'Live Ellipse PMS dashboard')),
    array('img' => hg_asset('hero-pms.webp'), 'alt' => hg_lang('Reálna plachta rezervácií Ellipse PMS', 'Live Ellipse PMS tape chart')),
    array('img' => hg_asset('hero-revdash.webp'), 'alt' => hg_lang('Reálny dashboard revPRO', 'Live revPRO dashboard')),
    array('img' => hg_asset('hero-rev.webp'), 'alt' => hg_lang('Reálna revenue analýza Ellipse', 'Live Ellipse revenue analysis')),
  );

  if ($segFromCms) {
    $segmentUi = array();
    $n = 1;
    foreach ($segments as $seg) {
      $segmentUi[] = array(
        'tab' => $seg['name'],
        'kicker' => sprintf('%02d — %s', $n, $seg['name']),
        'title' => $seg['name'],
        'lead' => hg_plain(isset($seg['text']) ? $seg['text'] : ''),
        'points' => array(hg_plain(isset($seg['text']) ? $seg['text'] : '')),
        'href' => !empty($seg['link']) ? $seg['link'] : '/kontakt/',
        'cta' => hg_lang('Pozrieť riešenie', 'See the solution'),
      );
      $n++;
    }
  } else {
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
      array(
        'tab' => hg_lang('Reštaurácie a bary', 'Restaurants and bars'),
        'kicker' => hg_lang('02 — REŠTAURÁCIE A BARY', '02 — RESTAURANTS AND BARS'),
        'title' => hg_lang("Od objednávky\npo uzávierku.", "From the order\nto the close of day."),
        'lead' => hg_lang('Pokladňa, sklad a hotelový účet hosťa zostávajú v jednom systéme.', 'The till, stock and the guest hotel bill stay in one system.'),
        'points' => array(
          hg_lang('Pokladňa, sklad a eKasa', 'Till, stock and fiscal register'),
          hg_lang('Mobilný čašník pri stole', 'Mobile waiter at the table'),
          hg_lang('Účet hosťa prepojený s izbou', 'Guest bill tied to the room'),
          hg_lang('Uzávierka a denné reporty', 'Close of day and daily reports'),
        ),
        'href' => '/pos-systemy/',
        'cta' => hg_lang('Riešenie pre gastro', 'F&B solution'),
      ),
      array(
        'tab' => hg_lang('Wellness a fitness', 'Wellness and fitness'),
        'kicker' => hg_lang('03 — WELLNESS A FITNESS', '03 — WELLNESS AND FITNESS'),
        'title' => hg_lang("Od termínu\npo verného klienta.", "From the appointment\nto a returning client."),
        'lead' => hg_lang('Služby, vstupy a permanentky sa predávajú priamo z pobytu aj samostatne.', 'Services, entries and passes sell from the stay and on their own.'),
        'points' => array(
          hg_lang('Časové rezervácie procedúr', 'Timed treatment bookings'),
          hg_lang('Vstupy, permanentky a kapacita', 'Entries, passes and capacity'),
          hg_lang('Predaj doplnkov z pobytu', 'Extras sold from the stay'),
          hg_lang('CRM a návrat klienta', 'CRM and the return visit'),
        ),
        'href' => '/casove-rezervacie/',
        'cta' => hg_lang('Riešenie pre wellness', 'Wellness solution'),
      ),
      array(
        'tab' => hg_lang('Apartmány', 'Apartments'),
        'kicker' => hg_lang('04 — APARTMÁNY', '04 — APARTMENTS'),
        'title' => hg_lang("Od dostupnosti\npo majiteľský report.", "From availability\nto the owner report."),
        'lead' => hg_lang('Viac jednotiek, jeden kalendár a prehľad, ktorý majiteľ otvorí v mobile.', 'Several units, one calendar and a view the owner opens on a phone.'),
        'points' => array(
          hg_lang('Dostupnosť a channel manager', 'Availability and channel manager'),
          hg_lang('Priamy predaj bez provízie', 'Direct sales without commission'),
          hg_lang('Self check-in a prístup', 'Self check-in and access'),
          hg_lang('Report pre majiteľa', 'Owner report'),
        ),
        'href' => '/web-booking/',
        'cta' => hg_lang('Riešenie pre apartmány', 'Apartment solution'),
      ),
      array(
        'tab' => hg_lang('Aquapark', 'Waterpark'),
        'kicker' => hg_lang('05 — AQUAPARK', '05 — WATERPARK'),
        'title' => hg_lang("Od lístka\npo náramok na ruke.", "From the ticket\nto the wristband."),
        'lead' => hg_lang('Vstupy a predaj lístkov sú napojené na recepciu, nie na druhú pokladňu.', 'Entries and ticket sales stay tied to reception, not a second till.'),
        'points' => array(
          hg_lang('Predaj lístkov a vstupov', 'Ticket and entry sales'),
          hg_lang('Náramky a turnikety', 'Wristbands and gates'),
          hg_lang('Kapacita a denný prehľad', 'Capacity and the daily view'),
          hg_lang('Prepojenie s hotelovou recepciou', 'Tied to hotel reception'),
        ),
        'href' => '/vstupy-a-akvaparky/',
        'cta' => hg_lang('Riešenie pre aquapark', 'Waterpark solution'),
      ),
    );
  }
  $segmentFirst = $segmentUi[0];

  if ($flowFromCms) {
    $flow = $automation;
  } else {
    $flow = array(
      array('name' => hg_lang('Hosť rezervuje', 'The guest books'), 'text' => hg_lang('Booking engine / OTA', 'Booking engine / OTA')),
      array('name' => hg_lang('Platba sa spáruje', 'The payment matches'), 'text' => hg_lang('Automaticky v Ellipse', 'Automatically in Ellipse')),
      array('name' => hg_lang('Online check-in', 'Online check-in'), 'text' => hg_lang('Bez čakania na recepcii', 'No wait at reception')),
      array('name' => hg_lang('Automatizované doklady', 'Documents on their own'), 'text' => hg_lang('Vrátane vystavenia e-faktúry', 'Including the e-invoice')),
      array('name' => hg_lang('Notifikácie členom tímu', 'Alerts for the team'), 'text' => hg_lang('To-do a taskovací systém', 'To-do and task system')),
      array('name' => hg_lang('Upsell a self check-in', 'Upsell and self check-in'), 'text' => hg_lang('Doplnkové služby v aplikácii hosťa', 'Extras in the guest app')),
      array('name' => hg_lang('CRM vernostný systém', 'CRM loyalty'), 'text' => hg_lang('Cashback a odmeny pre spokojných hostí', 'Cashback and rewards for returning guests')),
    );
  }

  $platformCta = array(
    hg_lang('Objaviť PMS', 'Explore PMS'),
    hg_lang('Viac o predaji', 'More about sales'),
    hg_lang('Spoznať Ellu', 'Meet Ella'),
    hg_lang('Riadiť výnosy', 'Manage revenue'),
    hg_lang('Objaviť POS', 'Explore POS'),
  );
  $heroStat = isset($trust['stats'][1]) ? $trust['stats'][1] : $trust['stats'][0];
  $proofStat = $heroStat;
  $initials = '';
  $initialSource = trim($trust['place'] !== '' ? $trust['place'] : $trust['author']);
  foreach (array_slice(preg_split('/\s+/', $initialSource), 0, 2) as $part) {
    $initials .= mb_strtoupper(mb_substr($part, 0, 1));
  }
  if ($initials === '') {
    $initials = 'GN';
  }
  $logoSrc = hg_asset('ellipse-logo.svg');
?>
<!DOCTYPE html>
<html lang="<?php echo hg_esc($hgLang); ?>">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title><?php echo hg_esc($ogTitle); ?></title>
  <meta name="description" content="<?php echo hg_esc($metaDesc); ?>">
  <?php if (!empty($content['keywords'])): ?>
  <meta name="keywords" content="<?php echo hg_esc($content['keywords']); ?>">
  <?php endif; ?>
  <meta name="robots" content="<?php echo $staging ? 'noindex,nofollow' : 'index,follow'; ?>">
  <link rel="canonical" href="<?php echo hg_esc($canonical); ?>">
  <link rel="alternate" hreflang="sk" href="<?php echo hg_esc($canonical); ?>">
  <link rel="alternate" hreflang="en" href="<?php echo hg_esc($canonical.'lang/en/'); ?>">
  <link rel="alternate" hreflang="x-default" href="<?php echo hg_esc($canonical); ?>">
  <link rel="icon" href="/img/system/favicon.ico">
  <link rel="preload" as="image" href="<?php echo hg_esc(hg_asset('fragments/occupancy.webp')); ?>" fetchpriority="high">
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Fraunces:ital,opsz,wght@1,9..144,500;1,9..144,600&family=Montserrat:wght@300..800&display=swap">
  <link rel="stylesheet" href="/template/ellipse/css/hg-ref.css?v=20260923g">
  <link rel="stylesheet" href="/template/ellipse/css/hg-mono.css?v=20260923g">
  <link rel="stylesheet" href="/template/ellipse/css/hg-os.css?v=20260924audit2">
  <link rel="stylesheet" href="/template/ellipse/css/hg-os-premium.css?v=20260924audit2">
<link rel="stylesheet" href="/template/ellipse/css/hg-fragments.css?v=20260924audit2">
  <link rel="stylesheet" href="/template/ellipse/css/hg-home-audit.css?v=20260924audit2">
  <link rel="stylesheet" href="/template/ellipse/css/hg-brand-clean.css?v=20260924brand2">
  <link rel="stylesheet" href="/template/ellipse/css/hg-minimal.css?v=20260924labels600">
  <link rel="stylesheet" href="/template/ellipse/css/hg-audience.css?v=3">
  <meta property="og:locale" content="<?php echo $hgLang === 'en' ? 'en_US' : 'sk_SK'; ?>">
  <meta property="og:title" content="<?php echo hg_esc($ogTitle); ?>">
  <meta property="og:description" content="<?php echo hg_esc($metaDesc); ?>">
  <meta property="og:url" content="<?php echo hg_esc($canonical); ?>">
  <meta property="og:type" content="website">
  <meta property="og:image" content="<?php echo hg_esc($base.hg_asset('hero-pms.webp')); ?>">
  <?php
    hg_schema(array(
      hg_org_node($canonical),
      array(
        '@type' => 'SoftwareApplication',
        'name' => 'Ellipse Cloud',
        'applicationCategory' => 'BusinessApplication',
        'operatingSystem' => 'Web, iOS, Android',
        'url' => $canonical,
        'description' => $metaDesc,
        'provider' => array('@id' => $canonical.'#org'),
        'offers' => array('@type' => 'Offer', 'url' => $base.'/cennik/', 'priceCurrency' => 'EUR', 'availability' => 'https://schema.org/InStock'),
      ),
      array(
        '@type' => 'WebSite',
        'name' => 'Ellipse Cloud',
        'url' => $canonical,
        'inLanguage' => array('sk', 'en'),
        'publisher' => array('@id' => $canonical.'#org'),
      ),
      array(
        '@type' => 'FAQPage',
        'mainEntity' => $faqNodes,
      ),
    ));
  ?>
  <base href="<?php echo hg_esc(DOMENA_WEBU); ?>">
  <?php if (function_exists('themeSetup')) { echo themeSetup('extra_header'); } ?>
<link rel="stylesheet" href="/template/ellipse/css/hg-mobile-showcase.css?v=1">
<link rel="stylesheet" href="/template/ellipse/css/hg-home-refresh.css?v=11">
<link rel="stylesheet" href="/template/ellipse/css/hg-typography.css?v=1">
<link rel="stylesheet" href="/template/ellipse/css/hg-icons.css?v=1">
<link rel="stylesheet" href="/template/ellipse/css/hg-shell.css?v=5">
</head>
<body class="homepage">
  <?php if (function_exists('themeSetup')) { echo themeSetup('extra_body'); } ?>
  <?php include __DIR__ . '/hg-announcement.php'; ?>
  <?php $hgNavHome = true; include __DIR__ . '/hg_nav.php'; ?>
  <?php include __DIR__ . '/os-home.php'; ?>

  <?php include __DIR__ . '/hg-footer.php'; ?>
  <script src="/template/ellipse/js/hg-ref.js?v=20260924shell1" defer></script>
  <script src="/template/ellipse/js/hg-os.js?v=20260924audit2" defer></script>
  <script src="/template/ellipse/js/hg-audience.js?v=4" defer></script>
  <script src="/template/ellipse/js/hg-os-premium.js?v=20260924audit2" defer></script>
  <?php if (function_exists('themeSetup')) { echo themeSetup('extra_body_end'); } ?>
<script src="/template/ellipse/js/hg-mobile-showcase.js?v=2" defer></script>
<script src="/template/ellipse/js/hg-home-refresh.js?v=5" defer></script>
<script src="/template/ellipse/js/hg-icons.js?v=2" defer></script>
<script src="/template/ellipse/js/hg-navigation.js?v=1" defer></script>
</body>
</html>

