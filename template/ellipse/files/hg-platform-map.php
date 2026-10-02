<?php
require_once __DIR__.'/hg-content.php';
$platformMap = hg_map_modules();
$epSets = hg_segment_sets();
$epDefault = isset($epSets['komplex']) ? $epSets['komplex'] : array();
$epInstance = isset($epInstance) ? $epInstance + 1 : 1;
$epId = 'ep-module-'.$epInstance;
?>
<div class="os-hero-visual ep-map" data-sectors="<?php echo hg_esc(json_encode($epSets, JSON_UNESCAPED_UNICODE)); ?>" aria-label="Platforma Ellipse a jej moduly">
  <div class="ep-network">
    <svg class="ep-lines" aria-hidden="true" focusable="false"></svg>
    <div class="ep-core"><img src="/template/ellipse/img/favicon.svg" width="88" height="77" alt="Ellipse"></div>
    <?php foreach ($platformMap as $m): $epHref = !empty($m['detail']) ? $m['href'] : ($m['link'] !== '' ? $m['link'] : $m['href']); ?>
    <button class="ep-tile" type="button" data-module="<?php echo hg_esc($m['key']); ?>" data-description="<?php echo hg_esc($m['map_text']); ?>"<?php if (!empty($m['schema_overrides']['wellness'])): ?> data-wellness="<?php echo hg_esc($m['schema_overrides']['wellness']); ?>"<?php endif; ?> data-link="<?php echo hg_esc($epHref); ?>" aria-haspopup="dialog" aria-expanded="false" aria-controls="<?php echo $epId; ?>"<?php if (!in_array($m['key'], $epDefault, true)) echo ' hidden'; ?>><?php echo hg_esc($m['map_name']); ?></button>
    <?php endforeach; ?>
  </div>
  <div class="ep-description"><img class="ep-detail-logo" src="<?php echo hg_esc(hg_asset('ellipse-logo.svg')); ?>" width="150" height="49" alt="Ellipse"><p>Všetko v jednej platforme bez prepájania systémov.</p></div>
  <dialog class="ep-dialog" id="<?php echo $epId; ?>" aria-labelledby="<?php echo $epId; ?>-title" aria-describedby="<?php echo $epId; ?>-copy">
    <form method="dialog"><button class="ep-close" aria-label="Zavrieť detail modulu" autofocus>×</button></form>
    <p class="ep-eyebrow">Súčasť platformy Ellipse</p>
    <h2 id="<?php echo $epId; ?>-title"></h2>
    <p class="ep-dialog-copy" id="<?php echo $epId; ?>-copy"></p>
    <a class="ep-cta" href="/#platforma">Preskúmať modul <svg class="hg-arrow" viewBox="0 0 24 24" width="18" height="18" aria-hidden="true" focusable="false"><path d="M6 18 18 6M6 6h12v12"/></svg></a>
  </dialog>
</div>
