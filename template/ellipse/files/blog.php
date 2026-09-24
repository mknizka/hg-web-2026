<section class="hg-section">
  <div class="hg-wrap">
    <p class="hg-kicker"><?php echo hg_lang('Novinky a blog', 'News and blog'); ?></p>
    <h1><?php echo hg_lang('Čo sa v Ellipse mení', 'What is changing in Ellipse'); ?></h1>
    <p class="hg-lead"><?php echo hg_lang('Návody, novinky a rozhodnutia z prevádzok, ktoré systém používajú.', 'Guides, product news and decisions from venues that run the system.'); ?></p>
    <div class="hg-posts">
      <?php if (isset($content['blog']) && is_array($content['blog'])): ?>
        <?php foreach ($content['blog'] as $v): ?>
          <a class="hg-post" href="/<?php echo hg_esc($v['sef']); ?>/">
            <?php if (!empty($v['file_type'])): ?>
              <img src="/img/rs/<?php echo (int)$v['id']; ?>.<?php echo hg_esc($v['file_type']); ?>" alt="" width="640" height="400" loading="lazy">
            <?php else: ?>
              <span class="ph"></span>
            <?php endif; ?>
            <div>
              <h2><?php echo hg_esc(hg_plain($v['name'], 90)); ?></h2>
              <p><?php echo hg_esc(hg_plain(isset($v['parex_text']) ? $v['parex_text'] : '', 160)); ?></p>
            </div>
          </a>
        <?php endforeach; ?>
      <?php endif; ?>
    </div>
    <?php if (!empty($content['pagination'])): ?>
      <div class="hg-actions"><?php echo $content['pagination']; ?></div>
    <?php endif; ?>
  </div>
</section>
