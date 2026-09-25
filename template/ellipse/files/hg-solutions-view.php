<?php
require_once __DIR__.'/hg-solutions-data.php';
$solutions=hg_solutions(); $selected=null;
$slug=isset($_GET['riesenie']) && is_string($_GET['riesenie']) ? $_GET['riesenie'] : '';
foreach($solutions as $item) if($item['slug']===$slug) $selected=$item;
?>
<main class="es-solutions">
<?php if($selected): ?>
<header class="es-intro"><a class="es-back" href="/blog/?tema=problemy">← Všetky riešenia z praxe</a><p class="kicker">ČO ELLIPSE RIEŠI</p><h1><?php echo hg_esc($selected['title']); ?></h1><p class="es-description"><?php echo hg_esc($selected['description']); ?></p><div class="es-roles"><?php foreach($selected['roles'] as $role): ?><span><?php echo hg_esc($role); ?></span><?php endforeach; ?></div></header>
<?php if(hg_solution_cover($selected)): ?><figure class="es-detail-cover"><img src="<?php echo hg_esc(hg_solution_cover($selected)); ?>" alt="" width="1200" height="675"></figure><?php endif; ?>
<div class="es-reading"><article class="es-article"><?php
// Trusted, versioned editorial source. Exclude executable and embedded markup.
$body=preg_replace('~<h1\b[^>]*>.*?</h1>~si','',$selected['html']);
echo strip_tags($body,'<p><h2><h3><ul><ol><li><strong><em><b><br><code>');
?></article><aside class="es-advice"><p class="kicker">VAŠA PREVÁDZKA</p><h2>Riešite podobnú situáciu?</h2><p>Prejdeme si váš spôsob práce a ukážeme vám možnosti Ellipse na konkrétnom príklade.</p><a class="button" href="/kontakt/">Porozprávajme sa →</a><a href="/#platforma">Preskúmať moduly</a></aside></div>
<section class="es-related"><h2>Ďalšie situácie z praxe</h2><div class="es-grid"><?php $related=array_values(array_filter($solutions,function($item)use($selected){return $item['slug']!==$selected['slug'] && count(array_intersect($item['roles'],$selected['roles']))>0;})); foreach(array_slice($related,0,3) as $item): ?><a href="/blog/?riesenie=<?php echo hg_esc($item['slug']); ?>"><h3><?php echo hg_esc($item['title']); ?></h3><p><?php echo hg_esc($item['description']); ?></p><b>Pozrieť riešenie →</b></a><?php endforeach; ?></div></section>
<?php else: ?>
<header class="es-intro"><a class="es-back" href="/blog/">← Ellipse Journal</a><p class="kicker">ČO ELLIPSE RIEŠI</p><h1>Situácie, ktoré poznáte.<br>Riešenia, ktoré prepájajú prevádzku.</h1><p class="es-description">Od nočného príchodu cez platby až po riadenie tímu. Vyberte si zo 34 tém z hotelovej a HORECA praxe.</p></header>
<section class="es-grid es-directory"><?php foreach($solutions as $item): ?><a href="/blog/?riesenie=<?php echo hg_esc($item['slug']); ?>"><span class="kicker"><?php echo hg_esc($item['roles'][0]); ?></span><h2><?php echo hg_esc($item['title']); ?></h2><p><?php echo hg_esc($item['description']); ?></p><b>Pozrieť riešenie →</b></a><?php endforeach; ?></section>
<?php endif; ?>
</main>
