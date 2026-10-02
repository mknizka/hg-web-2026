<?php
$hgLanguages = array('sk'=>'Slovenčina', 'en'=>'English', 'pl'=>'Polski', 'cz'=>'Čeština', 'hu'=>'Magyar');
$hgCurrentLanguage = $hgLang === 'cs' ? 'cz' : $hgLang;
if (!isset($hgLanguages[$hgCurrentLanguage])) $hgCurrentLanguage = 'sk';
?>
<details class="nav-language-picker">
<summary aria-label="<?php echo hg_esc($hgLanguages[$hgCurrentLanguage]); ?> — <?php echo hg_lang('Zmeniť jazyk', 'Change language'); ?>"><img src="/template/ellipse/img/flag-<?php echo $hgCurrentLanguage; ?>.svg" width="24" height="16" alt="<?php echo strtoupper($hgCurrentLanguage); ?>"><span class="nav-caret" aria-hidden="true"></span></summary>
<div class="nav-language-options">
<?php foreach ($hgLanguages as $code=>$label): if ($code === $hgCurrentLanguage) continue; ?>
<a href="/lang/<?php echo $code; ?>/" class="nav-language" lang="<?php echo $code === 'cz' ? 'cs' : $code; ?>" aria-label="<?php echo hg_esc($label); ?>"><img src="/template/ellipse/img/flag-<?php echo $code; ?>.svg" width="24" height="16" alt=""><span><?php echo strtoupper($code); ?></span></a>
<?php endforeach; ?>
</div>
</details>
