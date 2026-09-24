<?php
require_once __DIR__.'/hg_site.php';
// Optional existing RS category ID. Zero keeps a curated view of existing posts.
// Assign the ID after the category is created in the existing RS, never invent it.
require_once __DIR__.'/hg-blog-config.php';
function hg_problem_topics() {
  return array(
    'recepcia' => array('eyebrow'=>hg_lang('Čas a automatizácia','Time and automation'),'title'=>hg_lang('Recepcia nestíha príchody?','Too many arrivals at once?'),'lead'=>hg_lang('Doklady, podpisy a opakované otázky nemusia zabrať celý deň.','Documents, signatures and recurring questions need not take all day.'),'slugs'=>array('online-check-in-hotel-a-jeho-realny-prinos','online-checkin-nie-je-len-o-zjednoduseni-prichodu-je-to-aj-prakticky-obchodnik-s-funkcionalitami-ktore-hostia-miluju')),
    'predaj' => array('eyebrow'=>hg_lang('Priame rezervácie','Direct bookings'),'title'=>hg_lang('Priveľa rezervácií cez portály?','Too dependent on booking portals?'),'lead'=>hg_lang('Prepojte vlastný web, ponuky a cestu hosťa do priameho predaja.','Connect your website, offers and guest journey to direct sales.'),'slugs'=>array('ako-zvysit-priame-rezervacie-bez-chaosu-a-strategicky','ako-zvysit-priame-rezevacie-bez-chaosu')),
    'vynosy' => array('eyebrow'=>hg_lang('Ceny a výnosy','Rates and revenue'),'title'=>hg_lang('Predávate izby za správnu cenu?','Are your room rates right?'),'lead'=>hg_lang('Dajte obsadenosť, dopyt a tempo predaja do súvislostí.','Connect occupancy, demand and booking pace.'),'slugs'=>array('prve-vysledky-z-praxe-potvrdzuju-predpoklady-s-revpro-modulom-zarabate-viac-bez-ohladu-na-velkost-ubytovania')),
    'vernost' => array('eyebrow'=>hg_lang('CRM a marketing','CRM and marketing'),'title'=>hg_lang('Hostia odídu. A už sa nevrátia?','Guests leave. Do they return?'),'lead'=>hg_lang('Pracujte so vzťahom k hosťovi aj po odchode z hotela.','Keep building the guest relationship after checkout.'),'slugs'=>array('budujeme-silny-vernostny-crm-system-na-co-nezabudnut-a-ako-sa-inspirovat-od-uspesnych-prikladov-vernostnych-systemov-vo-svete','10-moznosti-ako-na-marketing-cez-ellipse')),
    'prehlad' => array('eyebrow'=>hg_lang('Riadenie a dáta','Management and data'),'title'=>hg_lang('Na rozhodnutie potrebujete päť reportov?','Five reports for one decision?'),'lead'=>hg_lang('Dostaňte prevádzkové dáta a odpovede bližšie k manažmentu.','Bring operational data and answers closer to management.'),'slugs'=>array('datalayer-v-systeme-ellipse','inteligentne-upozornenie-na-duplicitnu-rezervaciu-v-systeme-ellipse','napojte-si-ellipse-data-cez-mcp-konektor-do-sveta-ai-a-vytazte-maximum-z-analyz-a-brainstormingu','meni-sa-sposob-riadenia-hotela-aj-praca-s-pms-riadte-svoj-hotel-jednoduchou-spravou-vo-whatsupe-alebo-v-slacku-spravou-alebo-hlasom')),
    'gastro' => array('eyebrow'=>hg_lang('Gastro a obsluha','Dining and service'),'title'=>hg_lang('Čašníci nestíhajú a hostia čakajú?','Busy waiters and waiting guests?'),'lead'=>hg_lang('Od objednávky po zaplatenie. Menej čakania, viac času na obsluhu.','From order to payment. Less waiting, more time for service.'),'slugs'=>array('qr-kodove-objednavanie-od-stola-s-rychlym-uzatvaranim-dokladov-google-pay-apple-pay-fiskalny-doklad-tringelty-aj-pri-platbe-od-stola','niektore-horeca-systemy-vam-umoznia-vytvorit-receptury-v-ellipse-vam-optimalizujeme-receptury-s-umelou-inteligenciou-aby-ste-optimalizovali-zisk-a-setrili-drahocenny-cas')),
    'apartmany' => array('eyebrow'=>hg_lang('Viac prevádzok','Multiple properties'),'title'=>hg_lang('Apartmány riadite v tabuľkách?','Managing apartments in spreadsheets?'),'lead'=>hg_lang('Rezervácie, check-in aj platby môžu fungovať v jednom celku.','Reservations, check-in and payments can work together.'),'slugs'=>array('softver-na-spravu-apartmanov-bez-chaosu'))
  );
}
function hg_post_topic($post) {
  $slug=trim((string)($post['sef'] ?? ''),'/');
  foreach(hg_problem_topics() as $key=>$topic) if(in_array($slug,$topic['slugs'],true)) return $key;
  return '';
}
function hg_post_image($post) {
  $ext=(string)($post['file_type'] ?? '');
  return !empty($post['id']) && preg_match('/^(jpe?g|png|webp|avif|gif)$/i',$ext) ? '/img/rs/'.(int)$post['id'].'.'.$ext : '';
}
function hg_blog_card($post,$featured=false) {
  $url='/'.trim((string)$post['sef'],'/').'/'; $image=hg_post_image($post); $key=hg_post_topic($post); $topics=hg_problem_topics();
  ?>
  <article class="eb-card<?php echo $featured?' eb-featured':''; ?>"><a href="<?php echo hg_esc($url); ?>">
    <div class="eb-card-media"><?php if($image): ?><img src="<?php echo hg_esc($image); ?>" data-rs-fallback="<?php echo hg_esc(preg_replace('/\.(\w+)$/','-01.$1',$image)); ?>" alt="" width="960" height="600" loading="<?php echo $featured?'eager':'lazy'; ?>" decoding="async"><?php else: ?><span class="eb-placeholder" aria-hidden="true">e<span>ellipse</span></span><?php endif; ?></div>
    <div class="eb-card-copy"><span class="eb-label"><?php echo $key?hg_esc($topics[$key]['eyebrow']):hg_lang('Zo sveta Ellipse','From Ellipse'); ?></span><h2><?php echo hg_esc(hg_plain($post['name'] ?? '')); ?></h2><p><?php echo hg_esc(hg_plain($post['parex_text'] ?? $post['description'] ?? '',$featured?240:160)); ?></p><span class="eb-read"><?php echo hg_lang('Prečítať článok','Read article'); ?> <span aria-hidden="true">↗</span></span></div>
  </a></article>
  <?php
}
