<?php
require_once __DIR__.'/hg_site.php';
function hg_solutions_rs_manifest() {
 static $manifest=false;
 if($manifest===false) {
  $path=__DIR__.'/hg-solutions-rs.json';
  $manifest=is_file($path)?json_decode(file_get_contents($path),true):null;
  if(!is_array($manifest) || empty($manifest['category_id']) || empty($manifest['articles'])) $manifest=null;
 }
 return $manifest;
}
function hg_solutions() {
 static $items=null;
 if($items!==null) return $items;
 $source=json_decode(file_get_contents(__DIR__.'/hg-solutions.json'),true) ?: array();
 $manifest=hg_solutions_rs_manifest();
 // The old source remains live only until the authenticated import is verified.
 if(!$manifest) return $items=$source;
 $metadata=array();foreach($source as $item) $metadata[$item['slug']]=$item;
 $bindings=array();foreach($manifest['articles'] as $binding) $bindings[(int)$binding['id']]=$binding;
 $items=array();
 // Existing RS reader owns publication, language and category filtering.
 // An empty category must stay empty: never resurrect deleted/unpublished JSON articles.
 foreach(hg_articles((string)(int)$manifest['category_id'],1000) as $row) {
  if(isset($row['status']) && (int)$row['status']!==1) continue;
  $id=(int)($row['id'] ?? 0);$sef=trim((string)($row['sef'] ?? ''),'/');
  if(!$id || $sef==='') continue;
  $legacy=isset($bindings[$id])?$bindings[$id]['legacy_slug']:$sef;
  $meta=isset($metadata[$legacy])?$metadata[$legacy]:array();
  $ext=(string)($row['file_type'] ?? '');
  $items[]=array(
   'id'=>$id,'slug'=>$legacy,'sef'=>$sef,'href'=>'/'.$sef.'/',
   'title'=>hg_plain($row['name'] ?? ''),
   'lead'=>hg_plain($row['parex_text'] ?? ''),
   'description'=>hg_plain($row['description'] ?? '') ?: hg_plain($row['parex_text'] ?? ''),
   'keywords'=>(string)($row['keywords'] ?? ''),
   'roles'=>isset($meta['roles'])?$meta['roles']:array('HORECA prax'),
   'cover'=>preg_match('/^(jpe?g|png|webp|avif|gif)$/i',$ext)?'/img/rs/'.$id.'.'.$ext:'',
   'html'=>'' // Full articles render through the native RS article template.
  );
 }
 return $items;
}
function hg_solution_url($item) {
 return isset($item['href'])?$item['href']:'/blog/?riesenie='.rawurlencode($item['slug']);
}
function hg_solution_cover($item) {
 $cover=isset($item['cover']) ? (string)$item['cover'] : '';
 return preg_match('~^(?:/(?!/)|https?://)~i',$cover) ? $cover : '';
}
