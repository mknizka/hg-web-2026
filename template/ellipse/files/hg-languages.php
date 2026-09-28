<?php $hgLanguages = array('sk'=>'Slovenčina', 'en'=>'English', 'pl'=>'Polski', 'cz'=>'Čeština', 'hu'=>'Magyar'); ?>
<div class="nav-languages" role="group" aria-label="Jazyk / Language">
<?php foreach ($hgLanguages as $code=>$label): ?>
<a href="/lang/<?php echo $code; ?>/" class="nav-language" lang="<?php echo $code === 'cz' ? 'cs' : $code; ?>" title="<?php echo hg_esc($label); ?>" aria-label="<?php echo hg_esc($label); ?>"<?php echo ($hgLang === $code || ($code === 'cz' && $hgLang === 'cs')) ? ' aria-current="true"' : ''; ?>><img src="<?php echo hg_esc('/template/ellipse/img/flag-'.$code.'.svg'); ?>" width="24" height="16" alt="<?php echo strtoupper($code); ?>"></a>
<?php endforeach; ?>
</div>
