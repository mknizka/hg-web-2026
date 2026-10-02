<?php
require_once __DIR__.'/hg-content.php';
$modules = hg_catalog_modules();
foreach ($modules as $i => &$module) {
  foreach (array('link','img') as $field) if ($module[$field] && !preg_match('~^(?:/(?!/)|https?://)~i', $module[$field])) $module[$field] = '';
}
unset($module);

?>
<section class="eh-tour eh-module-tour" id="platforma">
<p class="os-kicker">Moduly Ellipse</p><h2>Celá prevádzka. Jeden prepojený systém.</h2>
<p class="os-lead">Vyberte si modul a objavte, ako pomôže vašej prevádzke.</p>
<div class="eh-module-controls"><span data-module-count aria-live="polite">01 / <?php echo count($modules); ?></span><button type="button" data-module-prev aria-label="Predchádzajúci modul" aria-controls="module-cards"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" aria-hidden="true"><path d="m14 6-6 6 6 6"/></svg></button><button type="button" data-module-next aria-label="Ďalší modul" aria-controls="module-cards"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" aria-hidden="true"><path d="m10 6 6 6-6 6"/></svg></button></div>
<div class="eh-module-track" id="module-cards" tabindex="0" aria-label="Moduly Ellipse – posúvateľné karty">
<?php foreach ($modules as $i => $module): $id='module-'.$module['key']; ?>
<article class="eh-module-panel" id="<?php echo $id; ?>" aria-labelledby="title-<?php echo $id; ?>">
<div class="eh-module-layout"><div class="eh-module-copy"><p class="os-kicker">Ellipse / <?php echo sprintf('%02d',$i+1); ?></p><h3 id="title-<?php echo $id; ?>"><?php echo hg_esc(hg_plain($module['name'])); ?></h3><p><?php echo hg_esc(hg_plain($module['text'])); ?></p><a class="button" href="<?php echo hg_esc($module['link']); ?>">Objaviť modul <span aria-hidden="true">→</span></a></div>
<div class="eh-module-media"><?php if(in_array($module['key'],array('self','selfcheckin','team','pos'),true)): ?>
<div class="eh-phone-carousel" data-phone-carousel aria-label="<?php echo hg_esc($module['name']); ?> – mobilné ukážky"><div class="eh-phone-track" tabindex="0" aria-label="Posúvať mobilné ukážky"><?php include __DIR__.'/hg-module-screens.php'; ?></div><div class="eh-phone-controls"><button type="button" data-phone-prev aria-label="Predchádzajúca ukážka"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8"><path d="m14 6-6 6 6 6"/></svg></button><button type="button" data-phone-next aria-label="Ďalšia ukážka"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8"><path d="m10 6 6 6-6 6"/></svg></button></div></div>
<?php elseif($module['img']): ?><button type="button" data-screen-open aria-label="Zväčšiť ukážku"><img src="<?php echo hg_esc($module['img']); ?>" alt="<?php echo hg_esc(hg_plain($module['name'])); ?>" loading="lazy" decoding="async"></button><?php else: ?><div class="eh-module-wordmark"><svg viewBox="0 0 120 80" width="120" height="80" fill="none" stroke="currentColor" stroke-width="2" aria-hidden="true"><ellipse cx="60" cy="40" rx="50" ry="24" transform="rotate(-25 60 40)"/><path d="M38 40h44M60 18v44"/></svg><strong><?php echo hg_esc(hg_plain($module['name'])); ?></strong><span>Súčasť platformy Ellipse</span></div><?php endif; ?></div></div></article>
<?php endforeach; ?></div></section>
