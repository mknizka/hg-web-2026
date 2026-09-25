<?php
if (!isset($news)) { $rows = hg_rows_or(27, array()); $news = count($rows) ? $rows[0] : null; }
?>
  <div class="announcement">
    <?php echo hg_lang('NOVINKA', 'NEW'); ?>
    <?php if ($news): ?>
      <span><?php echo hg_esc(hg_plain($news['name'], 90)); ?></span>
      <?php if (!empty($news['link'])): ?><a href="<?php echo hg_esc($news['link']); ?>"><?php echo hg_lang('Čítať', 'Read'); ?></a><?php endif; ?>
    <?php else: ?>
      <span><?php echo hg_lang('Ellipse Team — prevádzku máte pod kontrolou aj z mobilu', 'Ellipse Team — the operation stays in your pocket'); ?></span>
      <a href="/#team"><?php echo hg_lang('Objaviť aplikáciu', 'Discover the app'); ?></a>
    <?php endif; ?>
  </div>
