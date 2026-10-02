<?php
require_once __DIR__.'/hg-editorial.php';
// Explicit RS choice wins over legacy ID/SEF detection during migration.
$hgTemplate=(int)($content['rs_template'] ?? 0);
if (in_array($hgTemplate,array(14,15,16,17),true)) {
  require __DIR__.'/page_'.$hgTemplate.'.php';
  return;
}
if (hg_is_product_content($content)) { require __DIR__.'/hg-product-page.php'; return; }
require_once __DIR__.'/hg-content.php';
$hgArticleMeta=hg_article_meta($content);
$hgSelectedSolution=hg_solution_by_slug($hgArticleMeta['source_key'] ?? ($content['sef'] ?? ''));
if ($hgSelectedSolution) { require __DIR__.'/hg-solutions-view.php'; return; }
require __DIR__.'/hg-blog-article.php';
