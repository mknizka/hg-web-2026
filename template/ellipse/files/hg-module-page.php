<?php
$nap=hg_nap();
$hgLang=function_exists('sess') && sess('lang') ? sess('lang') : 'sk';
$epCanonical=rtrim(DOMENA_WEBU,'/').(isset($epModule['href']) ? $epModule['href'] : '/?modul='.rawurlencode($epRequested));
?>
<!DOCTYPE html>
<html lang="<?php echo hg_esc($hgLang); ?>">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title><?php echo hg_esc($epModule['name']); ?> — Ellipse</title>
  <meta name="description" content="<?php echo hg_esc($epModule['summary']); ?>">
  <meta name="robots" content="<?php echo hg_is_staging_marketing()?'noindex,nofollow':'index,follow'; ?>">
  <link rel="canonical" href="<?php echo hg_esc($epCanonical); ?>">
  <meta property="og:title" content="<?php echo hg_esc($epModule['name']); ?> — Ellipse">
  <meta property="og:description" content="<?php echo hg_esc($epModule['summary']); ?>">
  <meta property="og:image" content="<?php echo hg_esc(rtrim(DOMENA_WEBU,'/').$epModule['image']); ?>">
  <meta property="og:url" content="<?php echo hg_esc($epCanonical); ?>">
  <link rel="icon" href="/template/ellipse/img/favicon.svg">
  <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@300..800&display=swap">
  <link rel="stylesheet" href="/template/ellipse/css/hg-ref.css?v=20260923g">
  <link rel="stylesheet" href="/template/ellipse/css/hg-icons.css?v=2">
  <link rel="stylesheet" href="/template/ellipse/css/hg-shell.css?v=28">
  <link rel="stylesheet" href="/template/ellipse/css/hg-module-page.css?v=1">
  <link rel="stylesheet" href="/template/ellipse/css/hg-platform-map.css?v=6">
</head>
<body class="hg-mkt ep-module-page">
  <?php include __DIR__.'/hg-announcement.php'; ?>
  <?php $hgNavHome=false; include __DIR__.'/hg_nav.php'; ?>
  <main>
    <section class="ep-module-hero">
      <nav aria-label="Navigácia stránky"><a href="/">Ellipse</a><span aria-hidden="true"> / </span><span><?php echo hg_esc($epModule['name']); ?></span></nav>
      <div class="ep-module-intro">
        <div><p class="ep-module-kicker">Súčasť platformy Ellipse</p><h1><?php echo hg_esc($epModule['name']); ?></h1><p class="ep-module-lead"><?php echo hg_esc($epModule['summary']); ?></p><a class="ep-module-cta" href="/kontakt/">Pozrieť modul v praxi <svg class="hg-arrow" viewBox="0 0 24 24" width="18" height="18" aria-hidden="true" focusable="false"><path d="M6 18 18 6M6 6h12v12"/></svg></a></div>
        <figure><img src="<?php echo hg_esc($epModule['image']); ?>" alt="<?php echo hg_esc($epModule['caption']); ?>" fetchpriority="high"><figcaption><?php echo hg_esc($epModule['caption']); ?></figcaption></figure>
      </div>
    </section>
    <section class="ep-module-body"><h2><?php echo hg_esc($epModule['title']); ?></h2><?php if(!empty($epModule['text'])): ?><div class="ep-module-copy"><?php echo strip_tags($epModule['text'], '<p><ul><ol><li><strong><em><b><br>'); ?></div><?php else: ?><p><?php echo hg_esc($epModule['body']); ?></p><ul><?php foreach($epModule['points'] as $point): ?><li><?php echo hg_esc($point); ?></li><?php endforeach; ?></ul><?php endif; ?></section>
    <?php include __DIR__.'/hg-platform-explore.php'; ?>
    <?php include __DIR__.'/hg-solutions-carousel.php'; ?>
    <?php include __DIR__.'/hg-final-cta.php'; ?>
  </main>
  <?php include __DIR__.'/hg-footer.php'; ?>
  <script src="/template/ellipse/js/hg-ref.js?v=20260924shell1" defer></script>
  <script src="/template/ellipse/js/hg-navigation.js?v=2" defer></script>
  <script src="/template/ellipse/js/hg-platform-map.js?v=6" defer></script>
  <script src="/template/ellipse/js/hg-solutions.js?v=12" defer></script>
</body>
</html>
