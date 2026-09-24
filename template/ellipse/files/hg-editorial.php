<?php
require_once __DIR__.'/hg_site.php';
if (!function_exists('hg_editorial_ctas')) {
  function hg_editorial_ctas() {
    return array(
      array('/hotelovy-system/', hg_lang('Ellipse PMS', 'Ellipse PMS'), hg_lang('Dajte recepcii jeden prehľad.', 'Give your front desk one clear view.'), hg_lang('Rezervácie, pobyty a hotelová operatíva v jednom systéme.', 'Reservations, stays and hotel operations in one system.'), hg_lang('Objaviť hotelový systém', 'Explore the hotel system')),
      array('/pos-systemy/', 'Ellipse POS', hg_lang('Od objednávky po zaplatený účet.', 'From order to payment.'), hg_lang('Prepojte obsluhu, pokladňu a prehľad o predaji.', 'Connect service, your till and sales reporting.'), hg_lang('Spoznajte Ellipse POS', 'Discover Ellipse POS')),
      array('/online-check-in/', 'Guest Journey', hg_lang('Menej rutiny. Viac času pre hostí.', 'Less routine. More time for guests.'), hg_lang('Pozrite si online check-in a digitálnu cestu hosťa.', 'Explore online check-in and the digital guest journey.'), hg_lang('Pozrieť Self Check-in', 'Explore Self Check-in')),
      array('/vynosovy-modul-revpro/', 'Ellipse revPRO', hg_lang('Rozhodujte sa s dátami.', 'Make decisions with data.'), hg_lang('Obsadenosť a tempo predaja ako podklad pre cenotvorbu.', 'Use occupancy and sales pace to inform pricing.'), hg_lang('Objaviť revPRO', 'Explore revPRO'))
    );
  }
  function hg_editorial_cta($item, $inline = false) {
    echo '<aside class="ed-cta'.($inline ? ' ed-cta-inline' : '').'"'.($inline ? ' data-editorial-cta' : '').'><p class="hg-kicker">'.hg_esc($item[1]).'</p><h2>'.hg_esc($item[2]).'</h2><p>'.hg_esc($item[3]).'</p><a class="ed-button" href="'.hg_esc($item[0]).'">'.hg_esc($item[4]).' <span aria-hidden="true">↗</span></a></aside>';
  }
}
