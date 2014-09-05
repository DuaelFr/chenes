<?php

/**
 * @file
 * This file is empty by default because the base theme chain (Alpha & Omega) provides
 * all the basic functionality. However, in case you wish to customize the output that Drupal
 * generates through Alpha & Omega this file is a good place to do so.
 * 
 * Alpha comes with a neat solution for keeping this file as clean as possible while the code
 * for your subtheme grows. Please read the README.txt in the /preprocess and /process subfolders
 * for more information on this topic.
 */
// Balise Link Google Plus Author
$element = array(
  '#tag' => 'link', // The #tag is the html tag - <link />
  '#attributes' => array( // Set up an array of attributes inside the tag
    'rel' => 'author',
    'href' => 'https://plus.google.com/u/0/116394167426316747480/posts',
    // 'type' => 'text/css',
  ),
);
drupal_add_html_head($element, 'google_plus_author');

// Balise Link Google Plus Publisher
$element = array(
  '#tag' => 'link', // The #tag is the html tag - <link />
  '#attributes' => array( // Set up an array of attributes inside the tag
    'rel' => 'publisher',
    'href' => 'https://plus.google.com/u/0/116394167426316747480/posts',
  ),
);
drupal_add_html_head($element, 'google_plus_publisher');

/**
 * Used to remove certain elements from the $head output within html.tpl.php
 *
 * @see http://api.drupal.org/api/drupal/modules--system--system.api.php/function/hook_html_head_alter/7
 * @param array $head_elements
 */
// remove a tag from the head for Drupal 7
function chenes_verts_html_head_alter(&$head_elements) {
  unset($head_elements['system_meta_generator']);
}