<?php
/*
Plugin Name: Sharing WhatsApp 
Plugin URI: http://stores.dotsquares.com/
Version: 1.0
Author: Dotsquares
Author URI: http://dotsquares.com
Description: To Display use shortcode  [whatsapp_sharing] in post and page. 
*/
?>
<?php 
/*
Copyright 2018 Dotsquares, Inc.
*/
/** whatsapp_sharing for admin */
add_action( 'init', 'sharings_whatsapp' );
function sharings_whatsapp() {
  register_post_type( 'sharings_whatsapp',
    array(
	
      'labels' => array(
        'name' => 'whatsapp sharing',
            'add_new' => 'Add Posts',
            'add_new_item' => 'Add Posts',
            'search_items' => 'Search posts'
		
      ),
      'public' => true,
      'has_archive' => true,
	 'rewrite' => array('slug' => 'sharings_whatsapp'),
	 'supports' => array( 'title', 'editor',  'excerpt', 'thumbnail' )
    )
  );
}
include_once(plugin_dir_path( __FILE__ ) . "/sharing-whatsapp-shortcode.php");
?>