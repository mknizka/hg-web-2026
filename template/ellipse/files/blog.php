<?php
require_once __DIR__.'/hg-blog-data.php';
$problemView=isset($_GET['tema']) && is_string($_GET['tema']) && $_GET['tema']==='problemy';
$topics=hg_problem_topics();
$problemKey=isset($_GET['problem']) && is_string($_GET['problem']) && isset($topics[$_GET['problem']]) ? $_GET['problem'] : '';
$archivePosts=isset($content['blog']) && is_array($content['blog'])?array_values($content['blog']):array();
$problemPage=1; $problemPages=1;
if($problemView) {
  // Only use the existing CMS public article reader, never a direct DB query.
  $source=hg_articles(HG_PROBLEM_CATEGORY_ID>0?(string)HG_PROBLEM_CATEGORY_ID:'55,57,76',500);
  $archivePosts=array_values(array_filter($source,function($post)use($problemKey){
    $key=hg_post_topic($post);
    return $problemKey!==''?$key===$problemKey:(HG_PROBLEM_CATEGORY_ID>0 || $key!=='');
  }));
  $problemPages=max(1,(int)ceil(count($archivePosts)/12));
  $problemPage=min($problemPages,max(1,(int)(is_scalar($_GET['strana'] ?? null)?$_GET['strana']:1)));
  $archivePosts=array_slice($archivePosts,($problemPage-1)*12,12);
}
?>
<main class="eb-blog">
  <section class="eb-intro">
    <p class="hg-kicker"><?php echo hg_lang('Ellipse Journal','Ellipse Journal'); ?></p>
    <h1><?php echo $problemView?hg_lang('Skutočné problémy.<br>Praktické riešenia.','Real challenges.<br>Practical solutions.'):hg_lang('Lepšia prevádzka<br>začína dobrým nápadom.','Better operations<br>start with a good idea.'); ?></h1>
    <p class="eb-lead"><?php echo $problemView?hg_lang('Čo riešia hotelieri a HORECA podnikatelia každý deň — a ako im s tým pomáha Ellipse.','What hospitality owners face every day — and how Ellipse helps.'):hg_lang('Skúsenosti z hotelov, návody a novinky. Inšpirácia pre ľudí, ktorí chcú posúvať svoju prevádzku dopredu.','Hotel experience, guides and product news. Ideas for people moving their business forward.'); ?></p>
    <nav class="eb-tabs" aria-label="<?php echo hg_lang('Sekcie blogu','Blog sections'); ?>"><a href="/blog/"<?php if(!$problemView) echo ' aria-current="page"'; ?>><?php echo hg_lang('Všetky články','All articles'); ?></a><a href="/blog/?tema=problemy"<?php if($problemView) echo ' aria-current="page"'; ?>><?php echo hg_lang('Aké problémy riešime','Challenges we solve'); ?> <span aria-hidden="true">↗</span></a></nav>
  </section>
  <?php if($problemView): ?>
  <section class="eb-topic-section" aria-label="<?php echo hg_lang('Výber problému','Choose a challenge'); ?>"><div class="eb-topics">
    <a href="/blog/?tema=problemy"<?php if(!$problemKey) echo ' aria-current="true"'; ?>><?php echo hg_lang('Všetky riešenia','All solutions'); ?></a>
    <?php foreach($topics as $key=>$topic): ?><a href="/blog/?tema=problemy&amp;problem=<?php echo hg_esc($key); ?>"<?php if($problemKey===$key) echo ' aria-current="true"'; ?>><?php echo hg_esc($topic['eyebrow']); ?></a><?php endforeach; ?>
  </div><?php if($problemKey): ?><h2><?php echo hg_esc($topics[$problemKey]['title']); ?></h2><p><?php echo hg_esc($topics[$problemKey]['lead']); ?></p><?php endif; ?></section>
  <?php endif; ?>
  <section class="eb-list" aria-label="<?php echo hg_lang('Články','Articles'); ?>">
    <?php if($archivePosts): ?>
      <?php if(!$problemKey): hg_blog_card(array_shift($archivePosts),true); endif; ?>
      <div class="eb-grid"><?php foreach($archivePosts as $post): hg_blog_card($post); endforeach; ?></div>
    <?php else: ?><div class="eb-empty"><h2><?php echo hg_lang('Ďalšie skúsenosti už pripravujeme.','More insights are on the way.'); ?></h2><p><?php echo hg_lang('Zatiaľ si pozrite ostatné články a praktické návody.','Explore our other articles and practical guides.'); ?></p><a class="ed-button" href="/blog/"><?php echo hg_lang('Prejsť na blog','Browse the blog'); ?></a></div><?php endif; ?>
    <?php if(!$problemView && !empty($content['pagination'])): ?><nav class="eb-pagination" aria-label="<?php echo hg_lang('Stránkovanie','Pagination'); ?>"><?php echo $content['pagination']; ?></nav><?php endif; ?>
    <?php if($problemView && $problemPages>1): ?><nav class="eb-pagination" aria-label="<?php echo hg_lang('Stránkovanie','Pagination'); ?>"><?php for($i=1;$i<=$problemPages;$i++): ?><a href="/blog/?tema=problemy&amp;problem=<?php echo hg_esc($problemKey); ?>&amp;strana=<?php echo $i; ?>"<?php if($i===$problemPage) echo ' aria-current="page"'; ?>><?php echo $i; ?></a><?php endfor; ?></nav><?php endif; ?>
  </section>
  <?php if(!$problemView): ?><aside class="eb-problem-callout"><span class="hg-kicker"><?php echo hg_lang('Začnite tým, čo vás trápi','Start with your challenge'); ?></span><h2><?php echo hg_lang('Menej chaosu. Viac priestoru pre podnikanie.','Less chaos. More room for your business.'); ?></h2><p><?php echo hg_lang('Plná recepcia, závislosť od portálov či dáta bez súvislostí. Nájdite články podľa situácie vo vašej prevádzke.','Busy reception, portal dependency or disconnected data. Find articles that fit your situation.'); ?></p><a class="ed-button" href="/blog/?tema=problemy"><?php echo hg_lang('Nájsť riešenie môjho problému','Find a solution to my challenge'); ?> ↗</a></aside><?php endif; ?>
</main>
