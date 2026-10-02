<?php
$nap=hg_nap();
$hgLang=function_exists('sess') && sess('lang') ? sess('lang') : 'sk';
$epCanonical=rtrim(DOMENA_WEBU,'/').(isset($epModule['href']) ? $epModule['href'] : '/'.trim((string)$epModule['sef'],'/').'/');
$epSeoTitle=trim($epModule['seo_title'] ?? '') ?: $epModule['name'].' | Ellipse';
$epHeading=preg_replace('/\s*\|\s*Ellipse(?:\s.*)?$/u','',$epSeoTitle);
?>
<!DOCTYPE html>
<html lang="<?php echo hg_esc($hgLang); ?>">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title><?php echo hg_esc($epSeoTitle); ?></title>
  <meta name="description" content="<?php echo hg_esc($epModule['summary']); ?>">
  <meta name="robots" content="<?php echo hg_is_staging_marketing()?'noindex,nofollow':'index,follow'; ?>">
  <link rel="canonical" href="<?php echo hg_esc($epCanonical); ?>">
  <meta property="og:title" content="<?php echo hg_esc($epSeoTitle); ?>">
  <meta property="og:description" content="<?php echo hg_esc($epModule['summary']); ?>">
  <meta property="og:image" content="<?php echo hg_esc(rtrim(DOMENA_WEBU,'/').$epModule['image']); ?>">
  <meta property="og:url" content="<?php echo hg_esc($epCanonical); ?>">
  <link rel="icon" href="/template/ellipse/img/favicon.svg">
  <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@300..800&display=swap">
  <link rel="stylesheet" href="/template/ellipse/css/hg-ref.css?v=20260923g">
  <link rel="stylesheet" href="/template/ellipse/css/hg-icons.css?v=2">
  <link rel="stylesheet" href="/template/ellipse/css/hg-shell.css?v=28">
  <link rel="stylesheet" href="/template/ellipse/css/hg-module-page.css?v=1">
  <link rel="stylesheet" href="/template/ellipse/css/hg-typography.css?v=6">
  <link rel="stylesheet" href="/template/ellipse/css/hg-platform-map.css?v=8">
  <?php hg_schema(array(
    array('@type'=>'Organization','@id'=>rtrim(DOMENA_WEBU,'/').'/#org','name'=>'HORECA GROUP s.r.o.','url'=>rtrim(DOMENA_WEBU,'/').'/'),
    array('@type'=>'WebPage','@id'=>$epCanonical.'#page','url'=>$epCanonical,'name'=>$epHeading,'description'=>$epModule['summary'],'inLanguage'=>$hgLang,'publisher'=>array('@id'=>rtrim(DOMENA_WEBU,'/').'/#org')),
    array('@type'=>'BreadcrumbList','itemListElement'=>array(
      array('@type'=>'ListItem','position'=>1,'name'=>'Ellipse','item'=>rtrim(DOMENA_WEBU,'/').'/'),
      array('@type'=>'ListItem','position'=>2,'name'=>$epHeading,'item'=>$epCanonical)
    ))
  )); ?>
</head>
<body class="hg-mkt ep-module-page">
  <?php include __DIR__.'/hg-announcement.php'; ?>
  <?php $hgNavHome=false; include __DIR__.'/hg_nav.php'; ?>
  <?php require __DIR__.'/hg-module-body.php'; ?>
  <?php include __DIR__.'/hg-footer.php'; ?>
  <script src="/template/ellipse/js/hg-ref.js?v=20260924shell1" defer></script>
  <script src="/template/ellipse/js/hg-navigation.js?v=2" defer></script>
  <script src="/template/ellipse/js/hg-platform-map.js?v=8" defer></script>
  <script src="/template/ellipse/js/hg-solutions.js?v=12" defer></script>
</body>
</html>
