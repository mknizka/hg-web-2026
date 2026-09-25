<?php
require_once __DIR__.'/hg-solutions-data.php';
$carouselSolutions=hg_solutions();
$currentSolution=isset($_GET['riesenie']) && is_string($_GET['riesenie']) ? $_GET['riesenie'] : '';
$carouselSolutions=array_values(array_filter($carouselSolutions,function($item)use($currentSolution){return $item['slug']!==$currentSolution;}));
?>
<section class="es-footer-carousel" aria-label="Riešenia pre vašu prevádzku" data-solution-carousel>
<div class="es-footer-heading"><div><p class="kicker">ČO ELLIPSE RIEŠI</p><h2>Nájdite riešenie pre svoju prevádzku.</h2></div><div class="es-carousel-controls"><button type="button" data-solution-prev aria-label="Predchádzajúce riešenia" aria-controls="footer-solutions-track"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" aria-hidden="true"><path d="m14 6-6 6 6 6"/></svg></button><button type="button" data-solution-next aria-label="Ďalšie riešenia" aria-controls="footer-solutions-track"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" aria-hidden="true"><path d="m10 6 6 6-6 6"/></svg></button></div></div>
<div class="es-footer-track" id="footer-solutions-track" tabindex="0" aria-label="Posúvateľný zoznam riešení">
<?php foreach($carouselSolutions as $item): $cover=hg_solution_cover($item); ?><a class="es-footer-card" href="/blog/?riesenie=<?php echo hg_esc($item['slug']); ?>"><div><h3><?php echo hg_esc($item['title']); ?></h3><b>Pozrieť riešenie →</b></div><?php if($cover): ?><img src="<?php echo hg_esc($cover); ?>" width="160" height="120" alt="" loading="lazy" decoding="async"><?php else: ?><span class="es-cover-placeholder" aria-hidden="true"><?php echo sprintf('%02d',$item['id']); ?></span><?php endif; ?></a><?php endforeach; ?>
</div><a class="es-all-solutions" href="/blog/?tema=problemy">Všetky riešenia z praxe →</a>
</section>
