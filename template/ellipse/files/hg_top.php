<?php
require_once __DIR__ . '/hg_site.php';
$nap = hg_nap();
$hgLang = function_exists('sess') && sess('lang') ? sess('lang') : 'sk';
$logoSrc = hg_asset('ellipse-logo.svg');
$hgNavHome = false;
include __DIR__ . '/hg-announcement.php';
include __DIR__ . '/hg_nav.php';
