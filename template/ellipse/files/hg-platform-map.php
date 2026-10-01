<?php
$platformMap=json_decode(file_get_contents(__DIR__.'/hg-platform-map.json'),true);
$epInstance=isset($epInstance)?$epInstance+1:1;
$epId='ep-module-'.$epInstance;
?>
<div class="os-hero-visual ep-map" aria-label="Platforma Ellipse a jej moduly">
  <div class="ep-network">
    <svg class="ep-lines" aria-hidden="true" focusable="false"></svg>
    <div class="ep-core"><img src="/template/ellipse/img/favicon.svg" width="88" height="77" alt="Ellipse"></div>
    <?php foreach($platformMap as $m): ?><button class="ep-tile" type="button" data-module="<?php echo hg_esc($m[0]); ?>" data-description="<?php echo hg_esc($m[2]); ?>" data-link="/?modul=<?php echo rawurlencode($m[0]); ?>" aria-haspopup="dialog" aria-expanded="false" aria-controls="<?php echo $epId; ?>"<?php if($m[0]==='tables') echo ' hidden'; ?>><?php echo hg_esc($m[1]); ?></button><?php endforeach; ?>
  </div>
  <div class="ep-description"><img class="ep-detail-logo" src="<?php echo hg_esc(hg_asset('ellipse-logo.svg')); ?>" width="150" height="49" alt="Ellipse"><p>Všetko v jednej platforme bez prepájania systémov.</p></div>
  <dialog class="ep-dialog" id="<?php echo $epId; ?>" aria-labelledby="<?php echo $epId; ?>-title" aria-describedby="<?php echo $epId; ?>-copy">
    <form method="dialog"><button class="ep-close" aria-label="Zavrieť detail modulu" autofocus>×</button></form>
    <p class="ep-eyebrow">Súčasť platformy Ellipse</p>
    <h2 id="<?php echo $epId; ?>-title"></h2>
    <p class="ep-dialog-copy" id="<?php echo $epId; ?>-copy"></p>
    <a class="ep-cta" href="/#platforma">Preskúmať modul <span aria-hidden="true">↗</span></a>
  </dialog>
</div>
