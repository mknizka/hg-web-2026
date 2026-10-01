<?php $platformMap=json_decode(file_get_contents(__DIR__.'/hg-platform-map.json'),true); ?>
<div class="os-hero-visual ep-map" aria-label="Platforma Ellipse a jej moduly">
  <div class="ep-network">
    <svg class="ep-lines" aria-hidden="true" focusable="false"></svg>
    <div class="ep-core"><img src="<?php echo hg_esc(hg_asset('ellipse-logo.svg')); ?>" width="180" height="63" alt="Ellipse"><p>Všetko v jednej platforme<br>bez prepájania systémov.</p></div>
    <?php foreach($platformMap as $i=>$m): ?><button class="ep-tile" type="button" data-module="<?php echo hg_esc($m[0]); ?>" data-description="<?php echo hg_esc($m[2]); ?>" data-link="<?php echo hg_esc($m[3]); ?>" aria-expanded="false" aria-controls="ep-description"<?php if($m[0]==='tables') echo ' hidden'; ?>><?php echo hg_esc($m[1]); ?></button><?php endforeach; ?>
  </div>
  <div class="ep-description" id="ep-description" aria-live="polite" aria-atomic="true"><strong></strong><p></p><a href="#platforma" hidden>Viac o module <span aria-hidden="true">↗</span></a></div>
</div>
