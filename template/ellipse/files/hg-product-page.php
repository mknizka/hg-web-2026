<?php
require_once __DIR__.'/hg-editorial.php';
$productName = !empty($content['name']) ? hg_plain($content['name']) : 'Ellipse';
$productLead = hg_plain(isset($content['parex_text']) ? $content['parex_text'] : '');
if ($productLead === '') $productLead = hg_plain(isset($content['description']) ? $content['description'] : '');
$productBody = isset($content['text'][0]) ? $content['text'][0] : '';
$productSlug = trim((string)($content['sef'] ?? ''), '/');
$productImage = '';
if (hg_plain($productBody) === $productLead) $productBody = '';
if (!empty($content['id']) && !empty($content['file_type']) && preg_match('/^(jpe?g|png|webp|avif|gif)$/i', $content['file_type'])) {
  $productImage = '/img/rs/'.(int)$content['id'].'.'.$content['file_type'];
}
if ((int)($content['id'] ?? 0) === 44 || $productSlug === 'hotelovy-system') {
  if (!$productImage) $productImage = hg_asset('hero-pms.webp');
  if (!$productLead) $productLead = hg_lang('Rezervácie, pobyty, hostia a účty na jednom mieste. Prehľad, ktorý potrebuje recepcia aj manažment.', 'Reservations, stays, guests and bills in one place. Clarity for your front desk and management.');
}
if (!$productImage) {
  $productMedia = array('pos-systemy'=>'team-pos.webp', 'web-booking'=>'booking-1.webp', 'online-check-in'=>'selfcheckin.webp', 'vynosovy-modul-revpro'=>'hero-rev.webp', 'channel-manager'=>'hero-pms.webp');
  if (isset($productMedia[$productSlug])) $productImage = hg_asset($productMedia[$productSlug]);
}
?>
<main class="ed-product">
  <section class="ed-product-hero">
    <nav class="ed-breadcrumb" aria-label="<?php echo hg_lang('Navigácia stránky', 'Breadcrumb'); ?>"><a href="/">Ellipse</a><span aria-hidden="true">/</span><span><?php echo hg_esc($productName); ?></span></nav>
    <p class="prod-kicker"><?php echo hg_lang('Súčasť platformy Ellipse', 'Part of the Ellipse platform'); ?></p>
    <h1><?php echo hg_esc($productName); ?></h1>
    <?php if ($productLead): ?><p class="ed-lead"><?php echo hg_esc($productLead); ?></p><?php endif; ?>
    <div class="ed-actions"><a class="ed-button" href="/kontakt/"><?php echo hg_lang('Ukážte mi to v praxi', 'Show me how it works'); ?></a><a href="#product-detail"><?php echo hg_lang('Preskúmať funkcie', 'Explore the features'); ?> <svg class="hg-icon" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="20" height="20" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true" focusable="false"><path d="M12 5v14m-6-6 6 6 6-6"/></svg></a></div>
    <?php if ($productImage): ?><figure class="ed-product-visual"><img src="<?php echo hg_esc($productImage); ?>" data-rs-fallback="<?php echo hg_esc(preg_replace('/([0-9]+)\.([a-zA-Z]+)$/', '/$1-01.$2', $productImage)); ?>" alt="<?php echo hg_esc($productName); ?>" decoding="async" fetchpriority="high"></figure><?php endif; ?>
  </section>
  <nav class="ed-product-nav" aria-label="<?php echo hg_lang('Na tejto stránke', 'On this page'); ?>"><a href="#product-detail"><?php echo hg_lang('Funkcie a možnosti', 'Features'); ?></a><a href="#product-connected"><?php echo hg_lang('Prepojené moduly', 'Connected modules'); ?></a><a href="/kontakt/"><?php echo hg_lang('Dohodnúť demo', 'Book a demo'); ?></a></nav>
  <section class="ed-product-body" id="product-detail">
    <?php if (trim(strip_tags($productBody)) !== '' || strpos($productBody, '<img') !== false): ?>
    <div class="ed-rich-content"><?php echo $productBody; /* Trusted RS rich text, preserved as authored. */ ?></div>
    <?php elseif ((int)($content['id'] ?? 0) === 44 || $productSlug === 'hotelovy-system'): ?>
    <h2><?php echo hg_lang('Každý deň prehľadnejšia prevádzka.', 'Clearer operations, every day.'); ?></h2>
    <div class="ed-benefits">
      <article><span>01</span><h3><?php echo hg_lang('Rezervácie a pobyty', 'Reservations and stays'); ?></h3><p><?php echo hg_lang('Hotelová plachta a informácie o pobyte na jednom mieste.', 'Your room calendar and stay information in one place.'); ?></p></article>
      <article><span>02</span><h3><?php echo hg_lang('Tím a operatíva', 'Team and operations'); ?></h3><p><?php echo hg_lang('Recepcia a manažment pracujú so spoločným prehľadom.', 'Front desk and management share the same overview.'); ?></p></article>
      <article><span>03</span><h3><?php echo hg_lang('Účty a kontrola', 'Billing and oversight'); ?></h3><p><?php echo hg_lang('Pobyt pokračuje do hotelového účtu a vyúčtovania.', 'The stay flows through to the guest bill and checkout.'); ?></p></article>
    </div>
    <?php endif; ?>
  </section>
  <section class="ed-connected" id="product-connected"><p class="hg-kicker"><?php echo hg_lang('Jeden ekosystém', 'One ecosystem'); ?></p><h2><?php echo hg_lang('Viac možností. Stále jeden Ellipse.', 'More possibilities. Still one Ellipse.'); ?></h2><div class="ed-related">
    <?php foreach (hg_editorial_ctas() as $item): if (trim($item[0], '/') === trim((string)($content['sef'] ?? ''), '/')) continue; ?>
    <a href="<?php echo hg_esc($item[0]); ?>"><span><?php echo hg_esc($item[1]); ?></span><h3><?php echo hg_esc($item[2]); ?></h3><p><?php echo hg_esc($item[3]); ?></p><b><?php echo hg_esc($item[4]); ?> <svg class="hg-icon" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="20" height="20" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true" focusable="false"><path d="M7 17 17 7M7 7h10v10"/></svg></b></a>
    <?php endforeach; ?>
  </div></section>

</main>
