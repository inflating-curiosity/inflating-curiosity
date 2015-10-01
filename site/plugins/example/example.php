<?php
/**
 * Columns Plugin
 *
 * @author Bastian Allgeier <bastian@getkirby.com>
 * @version 1.0.0
 */
kirbytext::$pre[] = function($kirbytext, $text) {
  $text = preg_replace_callback('!\(example(…|\.{3})\)(.*?)\((…|\.{3})example\)!is', function($matches) use($kirbytext) {
    return '<div class="example clearfix"><span class="example-title">' . l::get('example') . '</span>' . kirbytext($matches[2]) . '</div>';
  }, $text);
  return $text;
};
