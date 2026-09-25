<?php
function hg_solutions() {
 static $items=null;
 if($items===null) $items=json_decode(file_get_contents(__DIR__.'/hg-solutions.json'),true) ?: array();
 return $items;
}

function hg_solution_cover($item) {
 $cover=isset($item['cover']) ? (string)$item['cover'] : '';
 return preg_match('~^(?:/(?!/)|https?://)~i',$cover) ? $cover : '';
}
