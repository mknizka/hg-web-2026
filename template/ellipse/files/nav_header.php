<?php
if (!function_exists('hg_lang')) {
  require_once __DIR__ . '/hg_site.php';
}
$hgNap = hg_nap();
?>
        <ul id="main-menu">
          <li><a href="/#platforma"><?php echo hg_lang('Platforma', 'Platform'); ?></a></li>
          <li><a href="/#riesenia"><?php echo hg_lang('Riešenia', 'Solutions'); ?></a></li>
          <li><a href="/blog/"><?php echo hg_lang('Blog', 'Blog'); ?></a></li>
          <li><a href="/kontakt/"><?php echo hg_lang('Kontakt', 'Contact'); ?></a></li>
          <li class="lang-item"><?php if (function_exists('langMenu')) { langMenu(1); } ?></li>
        </ul>
        <a class="login" href="<?php echo hg_esc($hgNap['login']); ?>"><?php echo hg_lang('Prihlásenie', 'Log in'); ?></a>
        <a class="demolink" href="<?php echo hg_esc($hgNap['demo']); ?>"><?php echo hg_lang('Dohodnúť demo', 'Book a demo'); ?></a>
