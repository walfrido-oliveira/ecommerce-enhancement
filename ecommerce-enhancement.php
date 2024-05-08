<?php

/**
 * Plugin Name: Ecommerce Enhancement
 * Description: Multiplas melhorias para Woocomerce
 * Version:     1.0
 * Author:      BeeGo | Walfrido Oliveira
 * Author URI:  https://beego.dev
 * Text Domain: ecommerce-enhancement
 */


function ee_register_widget_scripts()
{
  wp_register_script('ecommerce-enhancement-script', plugins_url('assets/js/script.js?v=' . time(), __FILE__), array('jquery'), false);
  wp_enqueue_script('ecommerce-enhancement-script');
}
add_action('init', 'ee_register_widget_scripts');


function ee_remove_out_of_stock_home( $q ) 
{
  if ( is_front_page() && $q->query["post_type"] == "product") {
    $q->set( 'meta_query', array(array(
      'key'       => '_stock_status',
      'value'     => 'outofstock',
      'compare'   => 'NOT IN'
    )));

  }

  //remove_action( 'pre_get_posts', 'ee_remove_out_of_stock_home');

}
add_action( 'pre_get_posts', 'ee_remove_out_of_stock_home' );
