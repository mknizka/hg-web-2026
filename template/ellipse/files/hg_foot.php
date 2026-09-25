<?php
require_once __DIR__ . '/hg_site.php';
$nap = hg_nap();
$logoSrc = hg_asset('ellipse-logo.svg');
?>
<?php include __DIR__.'/hg_quotes.php'; ?>
<?php if (empty($_GET['pa']) || $_GET['pa'] !== 'homepage') include __DIR__.'/hg-solutions-carousel.php'; ?>
<section class="cta hg-sub-cta" id="demo">
  <span class="kicker light"><?php echo hg_lang('Pozrite sa, ako funguje Ellipse', 'See how Ellipse works'); ?></span>
  <h2><?php echo hg_lang('Nebrzdite svoj biznis starým systémom.', 'Do not let an old system hold your business back.'); ?></h2>
  <p><?php echo hg_lang('Ukážeme vám Ellipse na vašich reálnych procesoch. Bez záväzkov, zrozumiteľne a prakticky.', 'We will show Ellipse on your real processes. No commitment, in plain language, hands on.'); ?></p>
  <a class="button white" href="<?php echo hg_esc($nap['demo']); ?>"><?php echo hg_lang('Dohodnúť demo', 'Book a demo'); ?></a>
  <small><?php echo hg_lang('Odpovieme spravidla do jedného pracovného dňa.', 'We usually reply within one working day.'); ?></small>
</section>
<?php include __DIR__ . '/hg-footer.php'; ?>
