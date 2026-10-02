<?php require_once __DIR__.'/hg_site.php'; $nap=hg_nap(); ?>
<main class="ec-contact">
<section class="ec-sales" id="contact-form">
<div class="ec-sales-copy"><p class="kicker">KONTAKTUJTE NÁŠ TÍM</p><h1>Poďme posunúť<br>vašu prevádzku.</h1><p class="ec-lead">Povedzte nám, čo potrebujete zjednodušiť. Spoločne nájdeme správne riešenie pre váš hotel, gastro či wellness.</p>
<ul class="ec-sales-benefits"><li>Ukážka systému podľa vašich procesov</li><li>Výber modulov a ponuka pre vašu prevádzku</li><li>Plán prechodu a prepojenia na existujúce nástroje</li></ul>
<div class="ec-sales-proof"><strong>780+</strong><span>klientov používa Ellipse</span><strong>20 000+</strong><span>ubytovacích jednotiek</span></div>
<div class="ec-sales-help"><b>Už používate Ellipse?</b><p>Náš tím vám pomôže s podporou.</p><a href="tel:<?php echo hg_esc($nap['phone']); ?>"><?php echo hg_esc($nap['phone_display']); ?></a><a href="mailto:<?php echo hg_esc($nap['email']); ?>"><?php echo hg_esc($nap['email']); ?></a></div></div>
<?php include __DIR__.'/hg-sales-form.php'; ?></section>
<section class="ec-people" id="persons"><p class="kicker">ĽUDIA ZA ELLIPSE</p><h2>Sme tu pre vás.</h2><div class="ec-team-contact" aria-label="Všeobecný kontakt"><a href="tel:+421527871911"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.6" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="M7 3H4a1 1 0 0 0-1 1c0 9.4 7.6 17 17 17a1 1 0 0 0 1-1v-3l-5-2-2 2a14 14 0 0 1-7-7l2-2-2-5Z"/></svg><span><small>Pevná linka</small>+421 52 787 1911</span></a><a href="mailto:office@horecagroup.sk"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.6" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><rect x="3" y="5" width="18" height="14" rx="3"/><path d="m4 7 8 6 8-6"/></svg><span><small>Všeobecný kontakt</small>office@horecagroup.sk</span></a></div><div class="ec-people-grid">
<?php
$peopleFallback=array(
 array('name'=>'Petra Štefany','text'=>'<ul><li>Office manager and support</li><li>petra.stefany@horecagroup.sk</li><li>+421 52 787 1911</li></ul>'),
 array('name'=>'Lenka Bolcárová','text'=>'<ul><li>Office manager and relations</li><li>lenka.bolcarova@horecagroup.sk</li><li>+421 52 787 1911</li></ul>'),
 array('name'=>'Patrícia Chovancová','text'=>'<ul><li>Office manager and websites</li><li>patricia.chovancova@horecagroup.sk</li><li>+421 52 787 1911</li></ul>')
);
foreach(hg_rows_or(28,$peopleFallback) as $person):
 preg_match_all('~<li\b[^>]*>(.*?)</li>~is',$person['text'] ?? '',$items);
 $details=array_map(function($value){return trim(html_entity_decode(strip_tags($value),ENT_QUOTES,'UTF-8'));},$items[1]);
 $position=$details[0] ?? ''; $email=''; $phone='';
 foreach(array_slice($details,1) as $detail){
  if(preg_match('/[a-z0-9._%+\-]+@[a-z0-9.\-]+\.[a-z]{2,}/i',$detail,$match))$email=$match[0];
  elseif(preg_match('/\+?[0-9][0-9 ()\-]{6,}/',$detail,$match))$phone=trim($match[0]);
 }
?><article class="ec-person">
<?php if(!empty($person['img'])): ?><img class="ec-person-photo" src="<?php echo hg_esc($person['img']); ?>" alt="" loading="lazy" width="80" height="80"><?php else: ?><span class="ec-person-mark" aria-hidden="true"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.4"><circle cx="12" cy="8" r="3.5"/><path d="M5 21v-3a7 7 0 0 1 14 0v3"/></svg></span><?php endif; ?>
<h3><?php echo hg_esc($person['name']); ?></h3><p class="ec-person-role"><?php echo hg_esc($position); ?></p>
<div class="ec-person-links">
<?php if($email): ?><a href="mailto:<?php echo hg_esc($email); ?>"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.6" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><rect x="3" y="5" width="18" height="14" rx="3"/><path d="m4 7 8 6 8-6"/></svg><span><?php echo hg_esc($email); ?></span></a><?php endif; ?>
<?php if($phone): ?><a href="tel:<?php echo hg_esc(preg_replace('/[^+0-9]/','',$phone)); ?>"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.6" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="M7 3H4a1 1 0 0 0-1 1c0 9.4 7.6 17 17 17a1 1 0 0 0 1-1v-3l-5-2-2 2a14 14 0 0 1-7-7l2-2-2-5Z"/></svg><span><?php echo hg_esc($phone); ?></span></a><?php endif; ?>
</div></article><?php endforeach; ?></div></section>
<section class="ec-address"><div class="ec-address-intro"><p class="kicker">NÁJDETE NÁS V POPRADE</p><h2>HORECA GROUP s.r.o.</h2><p>Francisciho 20/B<br>058 01 Poprad, Slovensko</p><a href="https://www.google.com/maps/dir/?api=1&amp;destination=Francisciho+20,+058+01+Poprad" target="_blank" rel="noopener">Naplánovať cestu →</a></div><dl aria-label="Fakturačné údaje"><dt>IČO</dt><dd>47912618</dd><dt>DIČ</dt><dd>2024148357</dd><dt>IČ DPH</dt><dd>SK2024148357</dd><dt>IBAN</dt><dd>SK45 8330 0000 0025 0068 1593</dd></dl></section>
</main>
