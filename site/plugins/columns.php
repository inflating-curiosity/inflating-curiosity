<?php

/**
 * Columns Plugin
 *
 * @author Bastian Allgeier <bastian@getkirby.com>
 * @version 1.0.0
 */
kirbytext::$pre[] = function($kirbytext, $text) {

  $text = preg_replace_callback('!\(row(…|\.{3})\)(.*?)\((…|\.{3})row\)!is', function($matches) use($kirbytext) {

    $row = preg_split('!(\n|\r\n)\+{4}\s+(\n|\r\n)!', $matches[2]);
    $html    = array();

    foreach($row as $large) {
      $field = new Field($kirbytext->field->page, null, trim($large));
      $html[] = '<div class="' . c::get('row.item', 'large') . '-' . count($row) . '">' . kirbytext($field) . '</div>';
    }

    return '<div class="' . c::get('row', 'row') . '">' . implode($html) . '</div>';

  }, $text);

  return $text;

};