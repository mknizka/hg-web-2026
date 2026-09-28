<?php require_once __DIR__.'/hg_site.php'; $nap=hg_nap(); ?>
<main class="ec-contact">
<section class="ec-sales" id="contact-form">
<div class="ec-sales-copy"><p class="kicker">KONTAKTUJTE NÁŠ TÍM</p><h1>Poďme posunúť<br>vašu prevádzku.</h1><p class="ec-lead">Povedzte nám, čo potrebujete zjednodušiť. Spoločne nájdeme správne riešenie pre váš hotel, gastro či wellness.</p>
<ul class="ec-sales-benefits"><li>Ukážka systému podľa vašich procesov</li><li>Výber modulov a ponuka pre vašu prevádzku</li><li>Plán prechodu a prepojenia na existujúce nástroje</li></ul>
<div class="ec-sales-proof"><strong>780+</strong><span>klientov používa Ellipse</span><strong>20 000+</strong><span>ubytovacích jednotiek</span></div>
<div class="ec-sales-help"><b>Už používate Ellipse?</b><p>Náš tím vám pomôže s podporou.</p><a href="tel:<?php echo hg_esc($nap['phone']); ?>"><?php echo hg_esc($nap['phone_display']); ?></a><a href="mailto:<?php echo hg_esc($nap['email']); ?>"><?php echo hg_esc($nap['email']); ?></a></div></div>
<div class="ec-form-card ec-sales-form"><p class="kicker">DEMO A CENOVÁ PONUKA</p><h2>Začnime vašou prevádzkou.</h2><p class="ec-form-subtitle">Ozveme sa spravidla do jedného pracovného dňa.</p>
<?php
$fields=array('name'=>'Meno','surname'=>'Priezvisko','company'=>'Názov prevádzky alebo firmy','numbers'=>'Počet izieb / jednotiek','email'=>'Pracovný e-mail','tel'=>'Telefón','text'=>'Čo potrebujete vyriešiť?','submit'=>'Dohodnúť konzultáciu');
ob_start(); contacForm($fields); $form=ob_get_clean();
$form=preg_replace_callback('~<(input|textarea)\b[^>]*\bid\s*=\s*[\x22\x27]?(cf_[a-z]+)[\x22\x27]?[^>]*>~i',function($m)use($fields){
$key=substr($m[2],3); if(!isset($fields[$key])) return $m[0];
$required=in_array($key,array('email','text'),true);
$tag=preg_replace('~(\w+)=\x27([^\x27]*)\x27~','$1="$2"',$m[0]);
$examples=array('email'=>'meno@vasafirma.sk','tel'=>'+421','numbers'=>'Napr. 40','text'=>'Napíšte nám o prevádzke, súčasnom systéme alebo o tom, čo chcete zlepšiť.');
$tag=preg_replace('~placeholder="[^"]*"~','placeholder="'.hg_esc($examples[$key] ?? '').'"',$tag);
if($key==='email') $tag=str_replace('type="text"','type="email" autocomplete="email"',$tag);
if($key==='tel') $tag=str_replace('type="text"','type="tel" autocomplete="tel"',$tag);
$autocomplete=array('name'=>'given-name','surname'=>'family-name','company'=>'organization');
if(isset($autocomplete[$key])) $tag=str_replace('<input','<input autocomplete="'.$autocomplete[$key].'"',$tag);
if($required) $tag=str_replace('<'.$m[1],'<'.$m[1].' required aria-required="true"',$tag);
return '<label for="'.hg_esc($m[2]).'">'.hg_esc($fields[$key]).($required?' <span aria-hidden="true">*</span>':' <small>nepovinné</small>').'</label>'.$tag;
},$form);
$form=preg_replace('~<div\b(?=[^>]*\bid\s*=\s*[\x22\x27]?submitform\b)[^>]*>(.*?)</div>~s','<button type="button" class="btn" id="submitform">$1 <span aria-hidden="true">→</span></button>',$form);
$form=preg_replace('~id\s*=\s*[\x22\x27]?formmessage[\x22\x27]?~','id="formmessage" role="status" aria-live="polite"',$form);
echo $form;
?>
<p class="ec-form-privacy">Údaje použijeme na vybavenie vašej požiadavky. <a href="/gdpr/">Ochrana osobných údajov</a></p>
</div></section>
<section class="ec-people" id="persons"><p class="kicker">ĽUDIA ZA ELLIPSE</p><h2>Sme tu pre vás.</h2><div class="ec-people-grid">
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
<?php if($email): ?><a href="mailto:<?php echo hg_esc($email); ?>"><?php echo hg_esc($email); ?></a><?php endif; ?>
<?php if($phone): ?><a href="tel:<?php echo hg_esc(preg_replace('/[^+0-9]/','',$phone)); ?>"><?php echo hg_esc($phone); ?></a><?php endif; ?>
</div></article><?php endforeach; ?></div></section>
<section class="ec-address"><div class="ec-address-intro"><p class="kicker">NÁJDETE NÁS V POPRADE</p><h2>HORECA GROUP s.r.o.</h2><p>Francisciho 20/B<br>058 01 Poprad, Slovensko</p><a href="https://www.google.com/maps/dir/?api=1&amp;destination=Francisciho+20,+058+01+Poprad" target="_blank" rel="noopener">Naplánovať cestu →</a></div><dl aria-label="Fakturačné údaje"><dt>IČO</dt><dd>47912618</dd><dt>DIČ</dt><dd>2024148357</dd><dt>IČ DPH</dt><dd>SK2024148357</dd><dt>IBAN</dt><dd>SK45 8330 0000 0025 0068 1593</dd></dl></section>
</main>
