<?php $audLabels = array('hotel' => hg_lang('Hotel a rezort', 'Hotel and resort'), 'gastro' => hg_lang('Reštaurácia a bar', 'Restaurant and bar'), 'wellness' => hg_lang('Wellness a aquapark', 'Wellness and aquapark'), 'komplex' => hg_lang('Komplexná prevádzka', 'Mixed operation')); ?>
<div class="aud-bar" data-audience-lang="<?php echo hg_lang('sk', 'en'); ?>" hidden>
  <span><?php echo hg_lang('Ellipse pre vašu prevádzku', 'Ellipse for your business'); ?></span>
  <div class="aud-options" role="group" aria-label="<?php echo hg_lang('Typ prevádzky', 'Business type'); ?>">
    <?php foreach ($audLabels as $key => $label): ?><button type="button" data-audience="<?php echo $key; ?>" aria-pressed="false"><?php echo $label; ?></button><?php endforeach; ?>
  </div>
  <span class="aud-status" role="status" aria-live="polite"></span>
</div>
<dialog class="aud-dialog" aria-labelledby="aud-title" aria-describedby="aud-description">
  <form method="dialog"><button class="aud-close" aria-label="<?php echo hg_lang('Zavrieť a zobraziť všetko', 'Close and show everything'); ?>"><?php echo hg_lang('Preskočiť', 'Skip'); ?></button></form>
  <p class="os-kicker">Ellipse Hospitality OS</p>
  <h2 id="aud-title"><?php echo hg_lang('Vaša prevádzka. Váš Ellipse.', 'Your business. Your Ellipse.'); ?></h2>
  <p id="aud-description"><?php echo hg_lang('Čo prevádzkujete? Ukážeme vám to, čo je pre vás podstatné.', 'What do you run? Discover what matters to your business.'); ?></p>
  <div class="aud-choices"><?php foreach ($audLabels as $key => $label): ?><button type="button" data-audience="<?php echo $key; ?>"><?php echo $label; ?></button><?php endforeach; ?></div>
  <small><?php echo hg_lang('Výber môžete kedykoľvek zmeniť.', 'You can change your selection at any time.'); ?></small>
</dialog>
