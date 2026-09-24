<?php
require_once __DIR__ . '/hg_site.php';
$nap = hg_nap();
$logoSrc = hg_asset('ellipse-logo.svg');
?>
<section class="cta hg-sub-cta" id="demo">
  <span class="kicker light"><?php echo hg_lang('Pozrite sa, ako funguje Ellipse', 'See how Ellipse works'); ?></span>
  <h2><?php echo hg_lang('Nebrzdite svoj biznis starým systémom.', 'Do not let an old system hold your business back.'); ?></h2>
  <p><?php echo hg_lang('Ukážeme vám Ellipse na vašich reálnych procesoch. Bez záväzkov, zrozumiteľne a prakticky.', 'We will show Ellipse on your real processes. No commitment, in plain language, hands on.'); ?></p>
  <a class="button white" href="<?php echo hg_esc($nap['demo']); ?>"><?php echo hg_lang('Dohodnúť demo', 'Book a demo'); ?></a>
  <small><?php echo hg_lang('Odpovieme spravidla do jedného pracovného dňa.', 'We usually reply within one working day.'); ?></small>
</section>
<footer class="hg-site-footer">
  <div class="footer-brand">
    <a class="brand inverse" href="/"><img src="<?php echo hg_esc($logoSrc); ?>" alt="Ellipse" width="158" height="55"></a>
    <p><?php echo hg_lang('All-in-one cloudová platforma<br>pre modernú HORECA prevádzku.', 'An all-in-one cloud platform<br>for a modern HORECA operation.'); ?></p>
  </div>
  <div>
    <b><?php echo hg_lang('Platforma', 'Platform'); ?></b>
    <a href="/hotelovy-system/"><?php echo hg_lang('Hotelový PMS', 'Hotel PMS'); ?></a>
    <a href="/web-booking/"><?php echo hg_lang('Booking engine', 'Booking engine'); ?></a>
    <a href="/pos-systemy/"><?php echo hg_lang('Gastro a POS', 'F&amp;B and POS'); ?></a>
    <a href="/virtualna-recepcia-ella-ai/">Ella AI</a>
    <a href="/#mcp"><?php echo hg_lang('MCP konektor', 'MCP connector'); ?></a>
    <a href="/vstupy-a-akvaparky/"><?php echo hg_lang('Aquapark', 'Waterpark'); ?></a>
  </div>
  <div>
    <b><?php echo hg_lang('Spoločnosť', 'Company'); ?></b>
    <a href="/#referencie"><?php echo hg_lang('Referencie', 'References'); ?></a>
    <a href="/blog/">Blog</a>
    <a href="/kontakt/"><?php echo hg_lang('Kontakt', 'Contact'); ?></a>
    <a href="/cennik/"><?php echo hg_lang('Cenník', 'Pricing'); ?></a>
  </div>
  <div>
    <b><?php echo hg_lang('Kontakt', 'Contact'); ?></b>
    <a href="mailto:<?php echo hg_esc($nap['email']); ?>"><?php echo hg_esc($nap['email']); ?></a>
    <a href="tel:<?php echo hg_esc($nap['phone']); ?>"><?php echo hg_esc($nap['phone_display']); ?></a>
    <span><?php echo hg_esc($nap['street'].', '.$nap['city']); ?></span>
    <span>Slovensko</span>
  </div>
  <div class="copyright">© <?php echo date('Y'); ?> <?php echo hg_esc($nap['name']); ?> <span><a href="/gdpr/"><?php echo hg_lang('Ochrana súkromia', 'Privacy'); ?></a> · <a href="/vop/">VOP</a></span></div>
</footer>
