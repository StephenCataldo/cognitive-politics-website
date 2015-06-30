<?php

/**
 * @file
 * template.php
 */

/**
 * function bootstrap_cp18_preprocess_node
 * Clean up Submitted by. Might remove myself, keep guest bloggers!
 **/
function bootstrap_cp18_preprocess_node(&$variables) {

	// Fancy date method, getting carried away
	// time() is now in seconds
	// date(format, time in seconds) formats
	if ( time() - $variables['created'] < 24*60*60 ) { // today?
		$date = format_interval((time() - $variables['created']) , 2) . t(' ago');
	  // changed or created both make some sense
  } elseif ( time() - $variables['created'] < 24*60*60*7 ) {
		$date = format_date($variables['created'], 'custom', 'l');
	} else {
		$date = format_date($variables['created'], 'custom', 'D Y-m-d'); 
	}
  $variables['submitted'] = t('by !username, !datetime', array('!username' => $variables['name'], '!datetime' => $date)); //$variables['date']));

	/** Guest Blog, Themed Blog, Nothing **/
	// uid = 4 is me again. Do something different!
	if ( $variables['uid'] == 4 ) {	
		//not yet, but intend to replace my pic. $variables['user_picture'] = "not me again";
	$variables['user_picture'] = null;
	}
}

function bootstrap_cp18_preprocess_menu_link(&$variables) {
/* <span class="glyphicon glyphicon-class-name"></span> */
  // the class array is here
	if ($variables['element']['#original_link']['mlid']==218) {

		$variables['element']['#original_link']['link_title'] = 
		$variables['element']['#title'] = 
			'<span class="glyphicon glyphicon-home"></span>&nbsp; Cognitive Politics';
			//'<i class="icon-home icon-white"></i>'; 
		$variables['#attributes']['class'][] = 'navbar-header-replace';
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



	}
  //$variables['element']['#attributes']['class'];
}
