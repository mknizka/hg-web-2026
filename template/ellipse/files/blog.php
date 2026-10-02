<?php
require_once __DIR__.'/hg-blog-data.php';
$archivePosts=isset($content['blog']) && is_array($content['blog'])?array_values($content['blog']):array();
?>
<main class="eb-blog">
  <section class="eb-intro">
    <p class="hg-kicker">Ellipse Journal</p>
    <h1><?php echo hg_lang('Lepšia prevádzka<br>začína dobrým nápadom.','Better operations<br>start with a good idea.'); ?></h1>
    <p class="eb-lead"><?php echo hg_lang('Skúsenosti z hotelov, návody a novinky pre ľudí, ktorí posúvajú svoju prevádzku dopredu.','Hotel experience, guides and product news for people moving their business forward.'); ?></p>
    <nav class="eb-tabs" aria-label="Sekcie blogu"><a href="/blog/" aria-current="page"><?php echo hg_lang('Všetky články','All articles'); ?></a><a href="/problemy-a-riesenia/"><?php echo hg_lang('Problémy a riešenia','Challenges and solutions'); ?></a></nav>
  </section>
  <section class="eb-list" aria-label="Články">
    <?php if($archivePosts): ?>
      <?php hg_blog_card(array_shift($archivePosts),true); ?>
      <div class="eb-grid"><?php foreach($archivePosts as $post): hg_blog_card($post); endforeach; ?></div>
    <?php else: ?><div class="eb-empty"><h2><?php echo hg_lang('Ďalšie skúsenosti už pripravujeme.','More insights are on the way.'); ?></h2></div><?php endif; ?>
    <?php if(!empty($content['pagination'])): ?><nav class="eb-pagination" aria-label="Stránkovanie"><?php echo $content['pagination']; ?></nav><?php endif; ?>
  </section>
  <aside class="eb-problem-callout"><span class="hg-kicker"><?php echo hg_lang('Začnite tým, čo vás trápi','Start with your challenge'); ?></span><h2><?php echo hg_lang('Menej chaosu. Viac priestoru pre podnikanie.','Less chaos. More room for your business.'); ?></h2><p><?php echo hg_lang('Nájdite konkrétne postupy zo života hotelov, reštaurácií a wellness prevádzok.','Explore practical workflows from hotels, restaurants and wellness operations.'); ?></p><a class="ed-button" href="/problemy-a-riesenia/"><?php echo hg_lang('Nájsť riešenie môjho problému','Find a solution to my challenge'); ?></a></aside>
</main>
