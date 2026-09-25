<?php
$modules = json_decode(file_get_contents(__DIR__.'/hg-modules.json'), true);
$moduleBanners = array_values(hg_rows_or(20, array()));
foreach ($modules as $i => &$module) {
  $module['img'] = $module['img'] ? hg_asset($module['img']) : '';
  if (isset($moduleBanners[$i])) foreach (array('name','text','link','img') as $field) {
    if (trim($moduleBanners[$i][$field]) !== '') $module[$field] = $moduleBanners[$i][$field];
  }
  foreach (array('link','img') as $field) if ($module[$field] && !preg_match('~^(?:/(?!/)|https?://)~i', $module[$field])) $module[$field] = '';
}
unset($module);
?>
<section class="eh-tour eh-module-tour" id="platforma">
<p class="os-kicker">Moduly Ellipse</p><h2>Celá prevádzka. Jeden prepojený systém.</h2>
<p class="os-lead">Vyberte si modul a objavte, ako pomôže vašej prevádzke.</p>
<div class="eh-tour-tabs" role="tablist" aria-label="Moduly Ellipse">
<?php foreach ($modules as $i => $module): $id='module-'.$module['key']; ?>
<button type="button" role="tab" id="tab-<?php echo $id; ?>" data-tour-target="<?php echo $id; ?>" aria-controls="<?php echo $id; ?>" aria-selected="<?php echo $i===0?'true':'false'; ?>" tabindex="<?php echo $i===0?'0':'-1'; ?>"><?php echo hg_esc(hg_plain($module['name'])); ?></button>
<?php endforeach; ?></div>
<button type="button" class="eh-motion" data-tour-pause aria-pressed="false">Pozastaviť prehliadku</button>
<div class="eh-tour-panels">
<?php foreach ($modules as $i => $module): $id='module-'.$module['key']; ?>
<article class="eh-module-panel" id="<?php echo $id; ?>" data-tour-panel data-tour-active="<?php echo $i===0?'true':'false'; ?>" role="tabpanel" aria-labelledby="tab-<?php echo $id; ?>" tabindex="0"<?php if($i) echo ' hidden'; ?>>
<div class="eh-module-layout"><div class="eh-module-copy"><p class="os-kicker">Ellipse / <?php echo sprintf('%02d',$i+1); ?></p><h3><?php echo hg_esc(hg_plain($module['name'])); ?></h3><p><?php echo hg_esc(hg_plain($module['text'])); ?></p><a class="button" href="<?php echo hg_esc($module['link']); ?>">Objaviť modul <span aria-hidden="true">→</span></a></div>
<div class="eh-module-media"><?php if($module['img']): ?><button type="button" data-screen-open aria-label="Zväčšiť ukážku"><img src="<?php echo hg_esc($module['img']); ?>" alt="<?php echo hg_esc(hg_plain($module['name'])); ?>" loading="lazy" decoding="async"></button><?php else: ?><div class="eh-module-wordmark"><svg viewBox="0 0 120 80" width="120" height="80" fill="none" stroke="currentColor" stroke-width="2" aria-hidden="true"><ellipse cx="60" cy="40" rx="50" ry="24" transform="rotate(-25 60 40)"/><path d="M38 40h44M60 18v44"/></svg><strong><?php echo hg_esc(hg_plain($module['name'])); ?></strong><span>Súčasť platformy Ellipse</span></div><?php endif; ?></div></div></article>
<?php endforeach; ?></div></section>
