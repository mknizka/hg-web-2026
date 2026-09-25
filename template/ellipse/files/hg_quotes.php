<?php
require_once __DIR__.'/hg_site.php';
$hgQuoteSource=hg_articles('104',50);
$hgQuoteSource=array_values(array_filter($hgQuoteSource,function($row){return hg_plain($row['parex_text'] ?? '')!=='';}));
if(!$hgQuoteSource) return;
?>
<section class="eq-quotes" data-quotes aria-label="Citáty hotelierov">
<p class="eq-kicker">DÔVERA Z PRAXE</p>
<div class="eq-slides">
<?php foreach($hgQuoteSource as $i=>$ref): $parts=explode(',',$ref['name'],2); $quote=hg_plain($ref['parex_text']); ?>
<figure class="eq-slide<?php echo $i===0?' is-active':''; ?><?php echo strlen($quote)>650?' eq-long':''; ?>" data-quote-slide aria-hidden="<?php echo $i===0?'false':'true'; ?>">
<blockquote><span aria-hidden="true" class="eq-mark">„</span><?php echo hg_esc($quote); ?><span aria-hidden="true" class="eq-mark">“</span></blockquote>
<figcaption><strong><?php echo hg_esc(trim($parts[0])); ?></strong><?php if(!empty($parts[1])): ?><span><?php echo hg_esc(trim($parts[1])); ?></span><?php endif; ?></figcaption>
</figure><?php endforeach; ?></div>
<?php if(count($hgQuoteSource)>1): ?><div class="eq-controls"><div class="eq-dots" aria-label="Výber citátu"><?php foreach($hgQuoteSource as $i=>$ref): ?><button type="button" data-quote-index="<?php echo $i; ?>" aria-label="Citát: <?php echo hg_esc($ref['name']); ?>" aria-pressed="<?php echo $i===0?'true':'false'; ?>"></button><?php endforeach; ?></div></div><?php endif; ?>
</section>
