<?php
  $all = themeSetupAll();
  require_once __DIR__ . '/hg_site.php';
  require_once __DIR__ . '/hg-editorial.php';
  $hgLang = sess('lang') ? sess('lang') : 'sk';
  $hgStaging = hg_is_staging_marketing();
  $hgBase = rtrim(DOMENA_WEBU, '/');
  $hgPath = isset($curpage) ? $curpage : $hgBase.'/';
  $hgPath = preg_replace('/\?.*$/', '', (string)$hgPath);
  $hgProblemArchive = isset($content['blog']) && isset($_GET['tema']) && $_GET['tema'] === 'problemy';
  if ($hgProblemArchive) $hgPath = $hgBase.'/blog/?tema=problemy';
  $hgSolution=null;
  if (isset($content['blog']) && isset($_GET['riesenie']) && is_string($_GET['riesenie'])) {
    require_once __DIR__.'/hg-solutions-data.php';
    foreach(hg_solutions() as $item) if($item['slug']===$_GET['riesenie']) $hgSolution=$item;
    if($hgSolution) { $hgPath=$hgBase.'/blog/?riesenie='.rawurlencode($hgSolution['slug']); $content['description']=$hgSolution['description']; $content['keywords']=$hgSolution['keywords']; $content['title']=$hgSolution['title']; }
  }

?>
<!DOCTYPE html>
<html lang="<?php echo hg_esc($hgLang); ?>" dir="ltr">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title><?php echo hg_esc($hgSolution ? $hgSolution['title'] : ($hgProblemArchive ? 'Aké problémy rieši Ellipse' : ($content['name'] ?? 'Novinky a blog'))); ?> - Ellipse Cloud HORECA GROUP</title>
    <meta name="keywords" content="<?php echo hg_esc(isset($content['keywords']) ? $content['keywords'] : ''); ?>">
    <link href="/img/system/favicon.ico" rel="shortcut icon">
    <meta name="description" content="<?php echo hg_esc(isset($content['description']) ? $content['description'] : ''); ?>">
    <meta name="robots" content="<?php echo $hgStaging ? 'noindex,nofollow' : 'index,follow'; ?>">
    <link rel="canonical" href="<?php echo hg_esc($hgPath); ?>">
    <link rel="alternate" hreflang="sk" href="<?php echo hg_esc($hgPath); ?>">
    <link rel="alternate" hreflang="en" href="<?php echo hg_esc($hgBase.'/lang/en/'); ?>">
    <link rel="alternate" hreflang="x-default" href="<?php echo hg_esc($hgPath); ?>">
    <meta name="Generator" content="Ellipse CMS">
    <link type="text/css" rel="stylesheet" href="/template/<?php echo $theme; ?>/css/_theme9.css" media="screen">
    <link type="text/css" rel="stylesheet" href="/template/ellipse/css/ellipse.css?v=20260922s" media="screen">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Montserrat:wght@300..800&display=swap">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Fraunces:ital,opsz,wght@1,9..144,500;1,9..144,600&display=swap">
    <link type="text/css" rel="stylesheet" href="/template/ellipse/css/hg-ref.css?v=20260923g" media="screen">
    <link type="text/css" rel="stylesheet" href="/template/ellipse/css/hg-mono.css?v=20260923g" media="screen">
    <link type="text/css" rel="stylesheet" href="/template/ellipse/css/hg.css?v=20260923g" media="screen">
    <link rel="stylesheet" href="/template/ellipse/css/hg-brand-clean.css?v=20260924brand2">
    <?php if (!empty($content['rs_template']) && (int)$content['rs_template'] === 12): ?>
    <link rel="stylesheet" href="/template/ellipse/css/hg-product.css?v=20260923g" media="screen">
    <?php endif; ?>
    <?php if($content['extra_css']): ?>
      <link type="text/css" rel="stylesheet" href="<?php echo  $content['extra_css'];?>" media="screen">
    <?php endif; ?>
    <meta property="og:locale" content="<?php echo sess("lang"); ?>_<?php echo strtoupper(sess("lang")); ?>" />
    <meta property="og:title" content="<?php echo  $content['title'];?>" />
    <meta property="og:site_name" content="<?php echo DOMENA_WEBU; ?>" />
    <?php if($content['description'] != ''): ?><meta property="og:description" content="<?php echo  $content['description'];?>" /><?php endif; ?>
	  <?php if($content['id'] == 164): ?>
    <meta property="og:image" content="https://www.horecagroup.sk/img/rs/164.jpg" />
	  <?php else: ?>
	  <meta property="og:image" content="<?php echo ($content['ogimg'] ? $content['ogimg'] : 'https://www.ellipsecloud.com/img/system/ogimg.jpg' ); ?>" />
	  <?php endif; ?>
    <meta property="og:image:type" content="image/jpeg" />
    <meta property="og:image:width" content="1920" />
    <meta property="og:image:height" content="1100" />
    <meta property="og:url" content="<?php echo $curpage; ?>">
    <script src="/template/js/jquery-1.10.2.js"></script>
    <script src="/template/ellipse/js/ellipse.js?v=20260922s"></script>
    <?php
      if (isset($content['content_type']) && $content['content_type'] === 'rs' && !empty($content['id']) && !hg_is_product_content($content)) {
        $hgArticleUrl = $hgBase.'/'.trim((string)$content['sef'], '/').'/';
        hg_schema(array(
          array(
            '@type' => 'BreadcrumbList',
            'itemListElement' => array(
              array('@type' => 'ListItem', 'position' => 1, 'name' => 'Ellipse', 'item' => $hgBase.'/'),
              array('@type' => 'ListItem', 'position' => 2, 'name' => 'Blog', 'item' => $hgBase.'/blog/'),
              array('@type' => 'ListItem', 'position' => 3, 'name' => hg_plain($content['name']), 'item' => $hgArticleUrl),
            ),
          ),
          array(
            '@type' => 'Article',
            'headline' => hg_plain($content['name']),
            'description' => hg_plain(isset($content['description']) ? $content['description'] : ''),
            'mainEntityOfPage' => $hgArticleUrl,
            'author' => array('@type' => 'Organization', 'name' => 'HORECA GROUP'),
            'publisher' => array('@id' => $hgBase.'/#org'),
            'image' => !empty($content['file_type']) ? $hgBase.'/img/rs/'.(int)$content['id'].'.'.$content['file_type'] : $hgBase.'/img/system/ogimg.jpg',
          ),
        ));
      }
      if (isset($content['content_type']) && $content['content_type'] === 'blog') {
        hg_schema(array(
          array(
            '@type' => 'CollectionPage',
            'name' => hg_lang('Novinky a blog', 'News and blog'),
            'url' => $hgBase.'/blog/',
            'isPartOf' => array('@type' => 'WebSite', 'name' => 'Ellipse Cloud', 'url' => $hgBase.'/'),
          ),
        ));
      }
    ?>
    <base href="<?=DOMENA_WEBU?>"/>
    <?php echo themeSetup('extra_header'); ?>
    <style>
      :root {
          --title: <?php echo themeSetup('font_nadpisy'); ?>;
          --text: <?php echo themeSetup('font_text'); ?>;
          --fancy: <?php echo themeSetup('font_fancy'); ?>;
          --c1: <?php echo themeSetup('farba_tmava'); ?>;
          --c2:  <?php echo themeSetup('farba_svetla'); ?>;
          --c3: <?php echo themeSetup('color_3'); ?>;
          --w: <?php echo themeSetup('color_background'); ?>;
          --w2: <?php echo themeSetup('farba_svetle_pozadie'); ?>;
          --b: <?php echo themeSetup('farba_buttony'); ?>; 
          --bh: <?php echo themeSetup('farba_buttony_hover'); ?>; 
          --bt: <?php echo themeSetup('farba_button_text'); ?>;
          --bth: <?php echo themeSetup('farba_button_text_hover'); ?>;
          --f: <?php echo themeSetup('farba_footer_pozadie'); ?>;
      }
    </style>
  <link rel="stylesheet" href="/template/ellipse/css/hg-editorial.css?v=4">
  <link rel="stylesheet" href="/template/ellipse/css/hg-blog.css?v=1">
  <link rel="stylesheet" href="/template/ellipse/css/hg-typography.css?v=1">
  <link rel="stylesheet" href="/template/ellipse/css/hg-icons.css?v=1">
<link rel="stylesheet" href="/template/ellipse/css/hg-shell.css?v=8">
</head>
  <body class="<?php echo hg_esc(isset($content['content_type']) ? $content['content_type'] : ''); ?> hg-mkt">
    <?php echo themeSetup('extra_body'); ?>
    <?php include __DIR__ . '/hg_top.php'; ?>
