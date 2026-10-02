<?php
/** RS template: Problémy a riešenia. Register ID 14 before deployment. */
require_once __DIR__.'/hg-content.php';
$hgRow = $content;
$hgRow['meta'] = hg_article_meta($content);
$hgRow['text'] = is_array($content['text'] ?? null) ? ($content['text'][0] ?? '') : ($content['text'] ?? '');
$hgRow += array('description'=>'', 'keywords'=>'', 'parex_text'=>'', 'file_type'=>'', 'order'=>0);
$hgSelectedSolution = hg_solution_from_row($hgRow);
require __DIR__.'/hg-solutions-view.php';
