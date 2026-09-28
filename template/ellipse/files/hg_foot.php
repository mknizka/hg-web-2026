<?php
require_once __DIR__ . '/hg_site.php';
$nap = hg_nap();
$logoSrc = hg_asset('ellipse-logo.svg');
?>
<?php include __DIR__.'/hg_quotes.php'; ?>
<?php if (empty($_GET['pa']) || $_GET['pa'] !== 'homepage') include __DIR__.'/hg-solutions-carousel.php'; ?>
<?php include __DIR__.'/hg-final-cta.php'; ?>
<?php include __DIR__ . '/hg-footer.php'; ?>
