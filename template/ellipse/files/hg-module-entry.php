<?php
require_once __DIR__.'/hg_site.php';
require_once __DIR__.'/hg-content.php';
$epFound = hg_module_from_row(array(
  'id' => $content['id'],
  'sef' => $content['sef'],
  'name' => $content['name'],
  'parex_text' => $content['parex_text'] ?? '',
  'text' => is_array($content['text'] ?? null) ? ($content['text'][0] ?? '') : ($content['text'] ?? ''),
  'title' => $content['title'] ?? '',
  'file_type' => $content['file_type'] ?? '',
  'order' => $content['order'] ?? 0,
  'ellipse_meta' => $content['ellipse_meta'] ?? '',
  'meta' => hg_article_meta($content),
));
if (empty($epFound['detail'])) {
  header('Location: '.$epFound['href'], true, 302);
  exit;
}
$epModule = $epFound;
$epRequested = $epFound['key'];
require __DIR__.'/hg-module-page.php';
