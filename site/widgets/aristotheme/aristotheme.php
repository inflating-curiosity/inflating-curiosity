<?php
/**
 * Aristotheme Support Widget
 * Displays a widget in the kirby panel's dashboard showing support options.
 *
 * @author Aristotheme <support@aristotheme.com>
 * @version 1.1.0
 */

if (c::get('aristotheme.widget')) {
  return array(
    'title' => ($title = c::get('aristotheme.widget.title'))? $title : 'Aristotheme Support',
    'html'  => function() {
      $defaults = array(
        array(
          "label" => "Email",
          "text" => "support@aristotheme.com",
          "href" => "mailto:support@aristotheme.com"
        ),
        array(
          "label" => "Twitter",
          "text" => "@aristotheme",
          "href" => "http://twitter.com/aristotheme"
        ),
        array(
          "label" => "Website",
          "text" => "aristotheme.com",
          "href" => "http://aristotheme.com"
        )
      );
      $links = c::get('aristotheme.widget.links', $defaults);
      return tpl::load(__DIR__ . DS . 'template.php', array('links' => $links));
    }
  );
}
return false;
