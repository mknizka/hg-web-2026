<?php
// RS content remains editable; retain citations without allowing executable links.
if (!function_exists('hg_solution_body')) {
  function hg_solution_body($body) {
    $body = preg_replace('~<(script|style)\b[^>]*>.*?</\1>~si', '', (string) $body);
    $body = strip_tags($body, '<p><h2><h3><ul><ol><li><strong><em><b><br><code><a>');
    return preg_replace_callback('~<([a-z0-9]+)\b([^>]*)>~i', function ($match) {
      $tag = strtolower($match[1]);
      if ($tag !== 'a') return '<'.$tag.'>';
      $href = '';
      if (preg_match('~\bhref\s*=\s*([\'"])(.*?)\1~is', $match[2], $attr)) {
        $href = html_entity_decode($attr[2], ENT_QUOTES, 'UTF-8');
      }
      if (preg_match('~[\x00-\x20\\\\]~', $href) || !preg_match('~^(?:https?://[^/]+|/(?!/)|\#)~i', $href)) return '<a>';
      return '<a href="'.htmlspecialchars($href, ENT_QUOTES, 'UTF-8').'">';
    }, $body);
  }
}
