<div class="ec-form-card ec-sales-form"><p class="kicker">DEMO A CENOVÁ PONUKA</p><h2><?php echo hg_esc($salesFormTitle ?? "Začnime vašou prevádzkou."); ?></h2><p class="ec-form-subtitle">Ozveme sa spravidla do jedného pracovného dňa.</p>
<?php
$fields=array('name'=>'Meno','surname'=>'Priezvisko','company'=>'Názov prevádzky alebo firmy','numbers'=>'Počet izieb / jednotiek','email'=>'Pracovný e-mail','tel'=>'Telefón','text'=>'Čo potrebujete vyriešiť?','submit'=>($salesFormSubmit ?? 'Dohodnúť konzultáciu'));
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
</div>
