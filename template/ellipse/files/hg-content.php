<?php
/**
 * Spoločné čítanie Ellipse obsahu z RS.
 * Verejné stránky nečítajú migračné JSON súbory.
 */
if (!function_exists('hg_ellipse_meta')) {
  function hg_ellipse_meta($raw) {
    if (is_array($raw)) {
      return $raw;
    }
    $meta = json_decode((string) $raw, true);
    return is_array($meta) ? $meta : array();
  }
}

if (!function_exists('hg_ellipse_category')) {
  function hg_ellipse_category($sef, $parentId) {
    global $db, $TBL;
    if (!isset($db, $TBL['rs_category'])) {
      return 0;
    }
    $row = $db->preparedQuery(
      "SELECT `id` FROM {$TBL['rs_category']} WHERE `sef` = ? AND `parent_id` = ? AND `status` = 1 LIMIT 1",
      'si',
      $sef,
      (int) $parentId
    )->fetch_assoc();
    return (int) ($row['id'] ?? 0);
  }
}

if (!function_exists('hg_ellipse_menu_id')) {
  function hg_ellipse_menu_id() {
    static $id = null;
    if ($id === null) {
      $id = hg_ellipse_category('ellipse-obsah', 0);
    }
    return $id;
  }
}

if (!function_exists('hg_ellipse_rows')) {
  function hg_ellipse_rows($categoryId, $publishedOnly = true) {
    global $db, $TBL;
    $categoryId = (int) $categoryId;
    if ($categoryId < 1 || !isset($db, $TBL['rs_articles'])) {
      return array();
    }
    $status = $publishedOnly ? ' AND a.`status` = 1' : '';
    $data = $db->runQuery(
      "SELECT a.`id`, a.`sef`, a.`name`, a.`parex_text`, a.`text`, a.`title`, a.`description`, a.`keywords`,
              a.`file_type`, a.`status`, a.`order`, a.`faq`, a.`ellipse_meta`, a.`user_name`, a.`published_from`,
              a.`views`, c.`id` AS category_id, c.`name` AS category_name, c.`sef` AS category_sef, c.`itemorder` AS category_order
       FROM {$TBL['rs_articles']} a
       INNER JOIN {$TBL['rs_add']} ad ON ad.`id_article` = a.`id`
       INNER JOIN {$TBL['rs_category']} c ON c.`id` = ad.`id_category`
       WHERE ad.`id_category` = ".$categoryId.$status."
       GROUP BY a.`id`
       ORDER BY a.`order` ASC, a.`id` ASC"
    );
    $rows = array();
    if ($data && $data->num_rows() > 0) {
      while ($row = $data->fetch_assoc()) {
        $row['meta'] = hg_ellipse_meta($row['ellipse_meta'] ?? '');
        $rows[] = $row;
      }
    }
    return $rows;
  }
}

if (!function_exists('hg_ellipse_children')) {
  function hg_ellipse_children($parentId, $publishedOnly = true) {
    global $db, $TBL;
    $parentId = (int) $parentId;
    if ($parentId < 1 || !isset($db)) {
      return array();
    }
    $status = $publishedOnly ? ' AND a.`status` = 1' : '';
    $data = $db->runQuery(
      "SELECT a.`id`, a.`sef`, a.`name`, a.`parex_text`, a.`text`, a.`title`, a.`description`, a.`keywords`,
              a.`file_type`, a.`status`, a.`order`, a.`faq`, a.`ellipse_meta`,
              c.`id` AS category_id, c.`name` AS category_name, c.`sef` AS category_sef, c.`itemorder` AS category_order
       FROM {$TBL['rs_articles']} a
       INNER JOIN {$TBL['rs_add']} ad ON ad.`id_article` = a.`id`
       INNER JOIN {$TBL['rs_category']} c ON c.`id` = ad.`id_category`
       WHERE c.`parent_id` = ".$parentId.$status."
       GROUP BY a.`id`
       ORDER BY c.`itemorder` ASC, a.`order` ASC, a.`id` ASC"
    );
    $rows = array();
    if ($data && $data->num_rows() > 0) {
      while ($row = $data->fetch_assoc()) {
        $row['meta'] = hg_ellipse_meta($row['ellipse_meta'] ?? '');
        $rows[] = $row;
      }
    }
    return $rows;
  }
}

if (!function_exists('hg_solution_from_row')) {
  function hg_solution_from_row($row) {
    $meta = $row['meta'];
    $id = (int) $row['id'];
    $ext = (string) ($row['file_type'] ?? '');
    $cover = '';
    if ($id && preg_match('/^(jpe?g|png|webp|avif|gif)$/i', $ext)) {
      $cover = '/img/rs/'.$id.'.'.$ext;
    }
    $roles = isset($meta['roles']) && is_array($meta['roles']) ? array_values($meta['roles']) : array();
    return array(
      'id' => $id,
      'slug' => (string) ($meta['source_key'] ?? $row['sef']),
      'sef' => (string) $row['sef'],
      'href' => '/'.trim((string) $row['sef'], '/').'/',
      'title' => (string) $row['name'],
      'lead' => (string) $row['parex_text'],
      'description' => (string) ($row['description'] !== '' ? $row['description'] : $row['parex_text']),
      'keywords' => (string) $row['keywords'],
      'roles' => $roles,
      'related_modules' => isset($meta['related_modules']) && is_array($meta['related_modules']) ? $meta['related_modules'] : null,
      'cover' => $cover,
      'html' => (string) $row['text'],
      'ordinal' => (int) ($meta['ordinal'] ?? $row['order'] ?? $id),
    );
  }
}

if (!function_exists('hg_solutions')) {
  function hg_solutions() {
    static $items = null;
    if ($items !== null) {
      return $items;
    }
    $category = hg_ellipse_category('ake-horeca-problemy', hg_ellipse_menu_id());
    $items = array();
    foreach (hg_ellipse_rows($category, true) as $row) {
      $items[] = hg_solution_from_row($row);
    }
    return $items;
  }
}

if (!function_exists('hg_solution_by_slug')) {
  function hg_solution_by_slug($slug) {
    $slug = (string) $slug;
    foreach (hg_solutions() as $item) {
      if ($item['slug'] === $slug || $item['sef'] === $slug) {
        return $item;
      }
    }
    return null;
  }
}

if (!function_exists('hg_solution_url')) {
  function hg_solution_url($item) {
    return isset($item['href']) ? $item['href'] : '/'.trim((string)($item['sef'] ?? $item['slug']), '/').'/';
  }
}

if (!function_exists('hg_solution_cover')) {
  function hg_solution_cover($item) {
    $cover = isset($item['cover']) ? (string) $item['cover'] : '';
    return preg_match('~^(?:/(?!/)|https?://)~i', $cover) ? $cover : '';
  }
}

if (!function_exists('hg_module_from_row')) {
  function hg_module_from_row($row) {
    $meta = $row['meta'];
    $key = (string) ($meta['source_key'] ?? '');
    $image = (string) ($meta['image'] ?? '');
    if ($image !== '' && strpos($image, '..') !== false) {
      $path = parse_url($image, PHP_URL_PATH);
      $real = $path ? realpath('/var/www/vhosts/horecagroup.sk/n.horecagroup.sk'.$path) : false;
      $root = realpath('/var/www/vhosts/horecagroup.sk/n.horecagroup.sk');
      $image = ($real && $root && strpos($real, $root) === 0) ? substr($real, strlen($root)) : '';
    }
    return array(
      'id' => (int) $row['id'],
      'key' => $key,
      'sef' => (string) $row['sef'],
      'href' => '/'.trim((string) $row['sef'], '/').'/',
      'name' => (string) $row['name'],
      'summary' => (string) $row['parex_text'],
      'seo_title' => (string) ($row['title'] ?? ''),
      'title' => (string) ($meta['detail_title'] ?? $row['title']),
      'body' => (string) ($meta['body'] ?? ''),
      'text' => (string) $row['text'],
      'points' => isset($meta['points']) && is_array($meta['points']) ? $meta['points'] : array(),
      'image' => $image,
      'caption' => (string) ($meta['caption'] ?? ''),
      'link' => (string) ($meta['link'] ?? ''),
      'catalog' => !isset($meta['catalog']) || (int) $meta['catalog'] === 1,
      'catalog_order' => (int) ($meta['catalog_order'] ?? $row['order']),
      'catalog_name' => (string) (($meta['catalog_name'] ?? '') !== '' ? $meta['catalog_name'] : $row['name']),
      'catalog_text' => (string) (($meta['catalog_text'] ?? '') !== '' ? $meta['catalog_text'] : $row['parex_text']),
      'map' => !isset($meta['map']) || (int) $meta['map'] === 1,
      'map_order' => (int) ($meta['map_order'] ?? $row['order']),
      'map_name' => (string) (($meta['map_name'] ?? '') !== '' ? $meta['map_name'] : $row['name']),
      'map_text' => (string) (($meta['map_text'] ?? '') !== '' ? $meta['map_text'] : $row['parex_text']),
      'detail' => !empty($meta['detail']),
      'aliases' => isset($meta['aliases']) && is_array($meta['aliases']) ? $meta['aliases'] : array(),
      'segments' => isset($meta['segments']) && is_array($meta['segments']) ? $meta['segments'] : array(),
      'schema_overrides' => isset($meta['schema_overrides']) && is_array($meta['schema_overrides']) ? $meta['schema_overrides'] : array(),
      'screen_key' => (string) ($meta['screen_key'] ?? $key),
    );
  }
}

if (!function_exists('hg_modules')) {
  function hg_modules() {
    static $items = null;
    if ($items !== null) {
      return $items;
    }
    $category = hg_ellipse_category('moduly-ellipse', hg_ellipse_menu_id());
    $items = array();
    foreach (hg_ellipse_rows($category, true) as $row) {
      $module = hg_module_from_row($row);
      if ($module['key'] === '') {
        $module['key'] = (string) $row['sef'];
      }
      $items[$module['key']] = $module;
    }
    return $items;
  }
}

if (!function_exists('hg_module')) {
  function hg_module($key) {
    $key = (string) $key;
    $modules = hg_modules();
    if (isset($modules[$key])) {
      return $modules[$key];
    }
    foreach ($modules as $module) {
      if (in_array($key, $module['aliases'], true)) {
        return $module;
      }
    }
    return null;
  }
}

if (!function_exists('hg_catalog_modules')) {
  function hg_catalog_modules() {
    $items = array();
    foreach (hg_modules() as $module) {
      if (!$module['catalog']) {
        continue;
      }
      $items[] = array(
        'key' => $module['screen_key'] !== '' ? $module['screen_key'] : $module['key'],
        'name' => $module['catalog_name'],
        'text' => $module['catalog_text'],
        'link' => $module['link'] !== '' ? $module['link'] : $module['href'],
        'img' => $module['image'],
        'order' => $module['catalog_order'],
      );
    }
    usort($items, function ($a, $b) {
      return $a['order'] <=> $b['order'];
    });
    return $items;
  }
}

if (!function_exists('hg_map_modules')) {
  function hg_map_modules() {
    $items = array();
    foreach (hg_modules() as $module) {
      if (!$module['map']) {
        continue;
      }
      $items[] = $module;
    }
    usort($items, function ($a, $b) {
      return $a['map_order'] <=> $b['map_order'];
    });
    return $items;
  }
}

if (!function_exists('hg_segment_sets')) {
  function hg_segment_sets() {
    static $sets = null;
    if ($sets !== null) {
      return $sets;
    }
    $category = hg_ellipse_category('segmenty-modulov', hg_ellipse_menu_id());
    $sets = array();
    foreach (hg_ellipse_rows($category, false) as $row) {
      $meta = $row['meta'];
      if (($meta['type'] ?? '') !== 'segment') {
        continue;
      }
      $key = (string) ($meta['source_key'] ?? '');
      $modules = isset($meta['modules']) && is_array($meta['modules']) ? array_values($meta['modules']) : array();
      if ($key !== '' && $modules) {
        $sets[$key] = $modules;
      }
    }
    return $sets;
  }
}

if (!function_exists('hg_integration_groups')) {
  function hg_integration_groups() {
    static $groups = null;
    if ($groups !== null) {
      return $groups;
    }
    $parent = hg_ellipse_category('integracie', hg_ellipse_menu_id());
    $groups = array();
    foreach (hg_ellipse_children($parent, true) as $row) {
      $area = (string) $row['category_name'];
      $groups[$area][] = array(
        'id' => (int) $row['id'],
        'name' => (string) $row['name'],
        'text' => (string) $row['parex_text'],
        'href' => '/'.trim((string) $row['sef'], '/').'/',
        'logo' => (string) ($row['meta']['logo'] ?? ''),
      );
    }
    return $groups;
  }
}

if (!function_exists('hg_article_meta')) {
  function hg_article_meta($content) {
    if (!is_array($content)) {
      return array();
    }
    return hg_ellipse_meta($content['ellipse_meta'] ?? '');
  }
}
