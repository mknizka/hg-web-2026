<?php
$integrationData=json_decode(file_get_contents(__DIR__.'/hg-integrations.json'),true);
$integrationGroups=array(); foreach($integrationData['integracie'] as $item) $integrationGroups[$item['oblast']][]=$item;
$integrationLogos=hg_rows_or(8,array());
?>
<section class="os-integrations eh-integrations" id="integracie">
<p class="os-kicker">Integrácie a API</p><h2>Ellipse je otvorený.</h2>
<p class="os-lead">Ponúka široké API pre akékoľvek integrácie. Prepojte rezervačné kanály, platby, účtovníctvo aj technológie vo vašej prevádzke.</p>
<div class="os-actions"><a class="button" href="/otvorene-api/">Objaviť otvorené API</a><a class="button ghost" href="/kontakt/">Prebrať konkrétnu integráciu</a></div>
<div class="eh-integration-grid"><?php foreach($integrationGroups as $group=>$items): ?><details><summary><?php echo hg_esc($group); ?><small><?php echo hg_esc(implode(' · ', array_column(array_slice($items,0,3), 'nazov_integracie'))); ?><?php if(count($items)>3) echo ' +'.(count($items)-3); ?></small></summary><ul><?php foreach($items as $item): ?><li><strong><?php echo hg_esc($item['nazov_integracie']); ?></strong><p><?php echo hg_esc($item['popis']); ?></p></li><?php endforeach; ?></ul></details><?php endforeach; ?></div>
<?php if(count($integrationLogos)): ?><div class="eh-partners"><h3>Vybraní integrátori a partneri</h3><div class="eh-logo-window" data-logo-marquee><div class="eh-logo-track"><?php for($copy=0;$copy<2;$copy++): ?><div class="eh-logo-set"<?php if($copy) echo ' aria-hidden="true"'; ?>><?php foreach($integrationLogos as $logo): if(empty($logo['img']) || !preg_match('~^(?:/(?!/)|https?://)~i',$logo['img'])) continue; ?><img src="<?php echo hg_esc($logo['img']); ?>" alt="<?php echo $copy?'':hg_esc(hg_plain($logo['name'])); ?>" width="400" height="200" loading="eager" decoding="async"><?php endforeach; ?></div><?php endfor; ?></div></div><button type="button" class="eh-motion" data-logo-pause aria-pressed="false">Pozastaviť pohyb</button></div><?php endif; ?>
</section>
