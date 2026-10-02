  <main>
    <section class="ep-module-hero">
      <nav aria-label="Navigácia stránky"><a href="/">Ellipse</a><span aria-hidden="true"> / </span><span><?php echo hg_esc($epModule['name']); ?></span></nav>
      <div class="ep-module-intro">
        <div><p class="ep-module-kicker">Súčasť platformy Ellipse</p><h1><?php echo hg_esc($epHeading); ?></h1><p class="ep-module-lead"><?php echo hg_esc($epModule['summary']); ?></p><a class="ep-module-cta" href="/kontakt/">Pozrieť modul v praxi <svg class="hg-arrow" viewBox="0 0 24 24" width="18" height="18" aria-hidden="true" focusable="false"><path d="M6 18 18 6M6 6h12v12"/></svg></a></div>
        <figure><img src="<?php echo hg_esc($epModule['image']); ?>" alt="<?php echo hg_esc($epModule['caption']); ?>" fetchpriority="high"><figcaption><?php echo hg_esc($epModule['caption']); ?></figcaption></figure>
      </div>
    </section>
    <section class="ep-module-body"><h2><?php echo hg_esc($epModule['title']); ?></h2><?php if(!empty($epModule['text'])): ?><div class="ep-module-copy"><?php echo strip_tags($epModule['text'], '<p><ul><ol><li><strong><em><b><br>'); ?></div><?php else: ?><p><?php echo hg_esc($epModule['body']); ?></p><ul><?php foreach($epModule['points'] as $point): ?><li><?php echo hg_esc($point); ?></li><?php endforeach; ?></ul><?php endif; ?></section>
    <?php include __DIR__.'/hg-module-related.php'; ?>
    <?php include __DIR__.'/hg-platform-explore.php'; ?>
    <?php include __DIR__.'/hg-solutions-carousel.php'; ?>
    <?php include __DIR__.'/hg-final-cta.php'; ?>
  </main>
