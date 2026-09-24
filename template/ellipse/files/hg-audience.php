<?php
$audLabels = array('hotel' => hg_lang('Hotely, rezorty, aquaparky', 'Hotels, resorts, waterparks'), 'gastro' => hg_lang('Reštaurácie a gastro, predaj', 'Restaurants, dining, retail'), 'wellness' => hg_lang('Wellness a služby', 'Wellness and services'), 'komplex' => hg_lang('Všetko pod jednou strechou', 'Everything under one roof'));
$audImages = array('hotel' => '/template/ellipse/img/cases/galicia.jpg', 'gastro' => hg_asset('audience/restaurant.webp'), 'wellness' => hg_asset('audience/wellness.webp'), 'komplex' => '/template/ellipse/img/cases/damian.jpg');
$audDescriptions = array('hotel' => hg_lang('Výnimočné pobyty začínajú u vás.', 'Exceptional stays start with you.'), 'gastro' => hg_lang('Skvelá obsluha. Plné stoly.', 'Great service. Full tables.'), 'wellness' => hg_lang('Hostia oddychujú. Vy máte prehľad.', 'Guests relax. You stay in control.'), 'komplex' => hg_lang('Hotel, gastro, wellness. Zvládam všetko.', 'Hotel, dining, wellness. I handle it all.'));
?>
<div class="aud-bar" data-audience-lang="<?php echo hg_lang('sk', 'en'); ?>" hidden>
  <span><?php echo hg_lang('Ellipse pre vašu prevádzku', 'Ellipse for your business'); ?></span>
  <div class="aud-options" role="group" aria-label="<?php echo hg_lang('Typ prevádzky', 'Business type'); ?>">
    <?php foreach ($audLabels as $key => $label): ?><button type="button" data-audience="<?php echo $key; ?>" aria-pressed="false"><img src="<?php echo hg_esc($audImages[$key]); ?>" width="120" height="90" alt=""><span><?php echo $label; ?><small><?php echo $audDescriptions[$key]; ?></small></span><i aria-hidden="true">↗</i></button><?php endforeach; ?>
  </div>
  <span class="aud-status" role="status" aria-live="polite"></span>
  <button type="button" class="aud-reopen"><?php echo hg_lang('Zmeniť výber', 'Change selection'); ?></button>
</div>
<dialog class="aud-dialog" aria-labelledby="aud-title" aria-describedby="aud-description">
  <div class="aud-dialog-top"><img class="aud-logo" src="<?php echo hg_esc(hg_asset('fragments/ellipse-original.svg')); ?>" alt="Ellipse" width="160" height="49"><form method="dialog"><button class="aud-close"><?php echo hg_lang('Preskočiť výber', 'Skip selection'); ?></button></form></div>
  <div class="aud-intro" tabindex="-1" autofocus>
    <p class="os-kicker"><?php echo hg_lang('Veľké zážitky. Jednoduché riadenie.', 'Great experiences. Effortless management.'); ?></p>
    <h2 id="aud-title"><?php echo hg_lang('Aký je váš svet?', 'What is your world?'); ?></h2>
    <p id="aud-description"><?php echo hg_lang('Vy tvoríte zážitky. My sa postaráme o systém za nimi.', 'You create the experiences. We take care of the system behind them.'); ?></p>
  </div>
  <div class="aud-choices"><?php foreach ($audLabels as $key => $label): ?>
    <button type="button" class="aud-choice aud-choice-<?php echo $key; ?>" data-audience="<?php echo $key; ?>">
      <img src="<?php echo hg_esc($audImages[$key]); ?>" alt="" width="480" height="640" decoding="async">
      <span class="aud-choice-top"><?php echo $key === 'komplex' ? hg_lang('Všetko pod jednou strechou', 'Everything under one roof') : '0'.(array_search($key, array_keys($audLabels)) + 1); ?></span>
      <span class="aud-choice-copy"><strong><?php echo $label; ?></strong><span><?php echo $audDescriptions[$key]; ?></span><span class="aud-choice-link"><?php echo $key === 'komplex' ? hg_lang('Ukážte mi celý Ellipse', 'Show me all of Ellipse') : hg_lang('Toto je môj svet', 'This is my world'); ?></span></span>
    </button>
  <?php endforeach; ?></div>
  <div class="aud-dialog-bottom"><small><?php echo hg_lang('Jeden Ellipse. Viac ako 780 klientov.', 'One Ellipse. More than 780 clients.'); ?></small><small><?php echo hg_lang('Výber môžete kedykoľvek zmeniť.', 'You can change your selection at any time.'); ?></small></div>
</dialog>
