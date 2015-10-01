<?php
/**
 * Custom handlers for js and css that check for minified versions of the files
 *
 * @author Thomas Lebeau <thomas@lebeau.io>
 * @version 1.0.0
 */

$kirby = kirby::instance();
$kirby->options['js.handler'] = function($src, $async = false) {

  $kirby = kirby::instance();

  if(is_array($src)) {
    $js = array();
    foreach($src as $s) $js[] = call($kirby->option('js.handler'), $s);
    return implode(PHP_EOL, $js) . PHP_EOL;
  }

// auto template js files
  if($src == '@auto') {

    $file = $kirby->site()->page()->template() . '.js';
    $fileMinified = $kirby->site()->page()->template() . '.min.js';
    $root = $kirby->roots()->autojs() . DS;
    $src  = $kirby->urls()->autojs() . '/';

    if(file_exists($root . $fileMinified)) {
      $src = $src . $fileMinified;
    } else if(file_exists($root . $file)) {
      $src = $src . $file;
    } else {
      return false;
    }

  }

  return html::tag('script', '', array(
    'src'   => url($src),
    'async' => $async
  ));

};

$kirby->options['css.handler'] = function($url, $media = null) {

  $kirby = kirby::instance();

  if(is_array($url)) {
    $css = array();
    foreach($url as $u) $css[] = call($kirby->option('css.handler'), $u);
    return implode(PHP_EOL, $css) . PHP_EOL;
  }

  // auto template css files
  if($url == '@auto') {

    $file = $kirby->site()->page()->template() . '.css';
    $fileMinified = $kirby->site()->page()->template() . '.min.css';
    $root = $kirby->roots()->autocss() . DS;
    $url  = $kirby->urls()->autocss() . '/';

    if(file_exists($root . $fileMinified)) {
      $url = $url . $fileMinified;
    } else if(file_exists($root . $file)) {
      $url = $url . $file;
    } else {
      return false;
    }

  }

  return html::tag('link', null, array(
    'rel'   => 'stylesheet',
    'href'  => url($url),
    'media' => $media
  ));

};
