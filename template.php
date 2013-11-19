<?php

function oho_basic_preprocess_block(&$vars) {
  //If blocktheme exists and the block has the require variable
  //add it to the class array
  if (module_exists('blocktheme') && isset($vars['blocktheme'])) {
   $vars['classes_array'][] = 'blocktheme-' . $vars['blocktheme'];
  }
}



//	
//	Converts a string to a suitable html ID attribute.
//	
//	 http://www.w3.org/TR/html4/struct/global.html#h-7.5.2 specifies what makes a
//	 valid ID attribute in HTML. This function:
//	
//	- Ensure an ID starts with an alpha character by optionally adding an 'n'.
//	- Replaces any character except A-Z, numbers, and underscores with dashes.
//	- Converts entire string to lowercase.
//	
//	@param $string
//	  The string
//	@return
//	  The converted string
//	


function oho_basic_id_safe($string) {
  // Replace with dashes anything that isn't A-Z, numbers, dashes, or underscores.
  $string = strtolower(preg_replace('/[^a-zA-Z0-9_-]+/', '-', $string));
  // If the first character is not a-z, add 'n' in front.
  if (!ctype_lower($string{0})) { // Don't use ctype_alpha since its locale aware.
    $string = 'id'. $string;
  }
  return $string;
}



/**
* Implements hook_page_alter().
*/
function oho_basic_page_alter($page) {
  // Add meta tag for viewport, for easier responsive theme design.
  $viewport = array(
    '#type' => 'html_tag',
    '#tag' => 'meta',
    '#attributes' => array(
      'name' => 'viewport',
      'content' => 'width=device-width, initial-scale=1, user-scalable=yes',
    ),
  );

  $html5shiv = array(
    '#tag' => 'script',
    '#attributes' => array( // Set up an array of attributes inside the tag
      'src' => drupal_get_path('theme', 'oho_basic') . 'js/html5shiv.js', 
    ),
    '#prefix' => '<!--[if lte IE 9]>',
    '#suffix' => '</script><![endif]-->',
  );

 /* $respond = array(
    '#tag' => 'script',
    '#attributes' => array( // Set up an array of attributes inside the tag
      'src' => drupal_get_path('theme', 'oho_basic') . 'js/respond.min.js', 
    ),
    '#prefix' => '<!--[if lte IE 9]>',
    '#suffix' => '</script><![endif]-->',
  ); */

  drupal_add_html_head($viewport, 'viewport');
  drupal_add_html_head($html5shiv, 'html5shiv');
  //drupal_add_html_head($respond, 'respond');
}