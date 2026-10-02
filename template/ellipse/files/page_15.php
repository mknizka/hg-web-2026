<?php
/** RS template: Modul – podstránka. Body only: RS renders header/footer. */
require_once __DIR__.'/hg-content.php';
$hgRow = $content;
$hgRow['meta'] = hg_article_meta($content);
$hgRow['text'] = is_array($content['text'] ?? null) ? ($content['text'][0] ?? '') : ($content['text'] ?? '');
$hgRow += array('title'=>'', 'parex_text'=>'', 'file_type'=>'', 'order'=>0);
$epModule = hg_module_from_row($hgRow);
$epSeoTitle = trim($epModule['seo_title']) ?: $epModule['name'].' | Ellipse';
$epHeading = preg_replace('/\s*\|\s*Ellipse(?:\s.*)?$/u', '', $epSeoTitle);
require __DIR__.'/hg-module-body.php';
?>
<script src="/template/ellipse/js/hg-platform-map.js?v=8" defer></script>
<script src="/template/ellipse/js/hg-solutions.js?v=12" defer></script>
