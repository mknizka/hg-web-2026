<?php
if (!function_exists('hg_lang')) {
  require_once __DIR__ . '/hg_site.php';
}
$nap = isset($nap) && is_array($nap) ? $nap : hg_nap();
$hgLang = isset($hgLang) ? $hgLang : (function_exists('sess') && sess('lang') ? sess('lang') : 'sk');
$logoSrc = isset($logoSrc) ? $logoSrc : hg_asset('ellipse-logo.svg');
$hgNavHome = !empty($hgNavHome);
$mcpHref = $hgNavHome ? '#mcp' : '/#mcp';
$refHref = $hgNavHome ? '#referencie' : '/#referencie';
$brandHref = $hgNavHome ? '#top' : '/';
$langHref = '/lang/' . ($hgLang === 'en' ? 'sk' : 'en') . '/';
$langLabel = $hgLang === 'en' ? 'SK' : 'EN';
$langLabelLong = $hgLang === 'en' ? 'Slovenčina' : 'English';
?>
<header class="nav">
  <a class="brand" href="<?php echo hg_esc($brandHref); ?>" aria-label="Ellipse"><img src="<?php echo hg_esc($logoSrc); ?>" alt="Ellipse" width="148" height="52"></a>
  <nav id="site-nav" aria-label="<?php echo hg_lang('Hlavné menu', 'Main menu'); ?>">
    <div class="nav-group">
      <button type="button" class="nav-parent" aria-expanded="false"><?php echo hg_lang('Platforma', 'Platform'); ?><span class="nav-caret" aria-hidden="true"></span></button>
      <div class="nav-sub">
        <a href="/hotelovy-system/"><?php echo hg_lang('Hotelový PMS', 'Hotel PMS'); ?></a>
        <a href="/web-booking/"><?php echo hg_lang('Booking engine', 'Booking engine'); ?></a>
        <a href="/virtualna-recepcia-ella-ai/">Ella AI</a>
        <a href="/vynosovy-modul-revpro/">revPRO</a>
        <a href="/pos-systemy/"><?php echo hg_lang('Gastro a POS', 'F&amp;B and POS'); ?></a>
        <a href="/online-check-in/">Self check-in</a>
        <a href="<?php echo hg_esc($mcpHref); ?>">MCP</a>
      </div>
    </div>
    <div class="nav-group">
      <button type="button" class="nav-parent" aria-expanded="false"><?php echo hg_lang('Riešenia', 'Solutions'); ?><span class="nav-caret" aria-hidden="true"></span></button>
      <div class="nav-sub">
        <a href="/hotelovy-system/"><?php echo hg_lang('Hotely', 'Hotels'); ?></a>
        <a href="/pos-systemy/"><?php echo hg_lang('Reštaurácie', 'Restaurants'); ?></a>
        <a href="/casove-rezervacie/"><?php echo hg_lang('Wellness', 'Wellness'); ?></a>
        <a href="/web-booking/"><?php echo hg_lang('Apartmány', 'Apartments'); ?></a>
        <a href="/vstupy-a-akvaparky/"><?php echo hg_lang('Aquapark', 'Waterpark'); ?></a>
      </div>
    </div>
    <div class="nav-group">
      <button type="button" class="nav-parent" aria-expanded="false"><?php echo hg_lang('Spoločnosť', 'Company'); ?><span class="nav-caret" aria-hidden="true"></span></button>
      <div class="nav-sub">
        <a href="/blog/">Blog</a>
        <a href="/cennik/"><?php echo hg_lang('Cenník', 'Pricing'); ?></a>
        <a href="/kontakt/"><?php echo hg_lang('Kontakt', 'Contact'); ?></a>
        <a href="<?php echo hg_esc($refHref); ?>"><?php echo hg_lang('Referencie', 'References'); ?></a>
      </div>
    </div>
    <div class="nav-mobile-only">
      <div class="nav-contact">
        <a href="mailto:<?php echo hg_esc($nap['email']); ?>"><?php echo hg_esc($nap['email']); ?></a>
        <a href="tel:<?php echo hg_esc($nap['phone']); ?>"><?php echo hg_esc($nap['phone_display']); ?></a>
        <span><?php echo hg_esc($nap['street']); ?>, <?php echo hg_esc($nap['zip'].' '.$nap['city']); ?></span>
      </div>
      <a class="login" href="<?php echo hg_esc($langHref); ?>"><?php echo hg_esc($langLabelLong); ?></a>
      <a class="login" href="<?php echo hg_esc($nap['login']); ?>"><?php echo hg_lang('Prihlásenie', 'Log in'); ?></a>
      <a class="button small" href="<?php echo hg_esc($nap['demo']); ?>"><?php echo hg_lang('Dohodnúť demo', 'Book a demo'); ?> <span>↗</span></a>
    </div>
  </nav>
  <div class="nav-actions">
    <a class="login" href="<?php echo hg_esc($langHref); ?>"><?php echo hg_esc($langLabel); ?></a>
    <a class="login" href="<?php echo hg_esc($nap['login']); ?>"><?php echo hg_lang('Prihlásenie', 'Log in'); ?></a>
    <a class="button small" href="<?php echo hg_esc($nap['demo']); ?>"><?php echo hg_lang('Dohodnúť demo', 'Book a demo'); ?> <span>↗</span></a>
  </div>
  <button class="menu" type="button" aria-label="<?php echo hg_lang('Otvoriť menu', 'Open menu'); ?>" aria-expanded="false" aria-controls="site-nav">
    <span></span><span></span><span></span>
  </button>
</header>
