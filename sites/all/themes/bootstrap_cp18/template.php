<?php

/**
 * @file
 * template.php
 */

function bootstrap_cp18_preprocess_menu_link(&$variables) {
/* <span class="glyphicon glyphicon-class-name"></span> */
  // the class array is here
	if ($variables['element']['#original_link']['mlid']==218) {

		$variables['element']['#original_link']['link_title'] = 
		$variables['element']['#title'] = 
			'<span class="glyphicon glyphicon-home"></span>';
			//'<i class="icon-home icon-white"></i>'; 
		$variables['#attributes']['class'][] = 'glyphicon';
		$variables['#attributes']['class'][] = 'glyphicon-home';
		$variables['element']['#localized_options']['html'] = TRUE;
/*
    $variables['element']['#attributes']['class'][] = 'shopping-cart-link';
    // Classes on link <a>.
    $variables['element']['#localized_options']['attributes']['class'][] = 'icon';
    $variables['element']['#localized_options']['attributes']['class'][] = 'icon-home';
    // Invisible span (element-invisible) around link text <a>.
    $variables['element']['#localized_options']['html'] = TRUE;
    $variables['element']['#title'] = "<span class='element-invisible'>" . $variables['element']['#title'] . "</span>";
*/



    kpr($variables);
	}
  //$variables['element']['#attributes']['class'];
}
