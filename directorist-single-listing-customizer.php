<?php
/**
 * Plugin Name: Directorist Single Listing Customizer
 * Description: Directorist Single Listing Page According to Figma Design
 * Version: 1.0.0
 * Author: Jahiruddin Rana
 * Author-URI: #
 * Tags: directorist, listing, customizer, single page, figma
 * Text Domain: directorist-single-listing-customizer
 * Requires PHP: 7.2
 * Tested up to: 6.9.4
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

function dslc_custom_single_listing_template( $template ) {
    
    if ( is_singular( 'at_biz_dir' ) ) {
        
        $custom_template = plugin_dir_path( __FILE__ ) . 'templates/single.php';
        
        if ( file_exists( $custom_template ) ) {
            return $custom_template;
        }
    }
    
    return $template;
}
add_filter( 'template_include', 'dslc_custom_single_listing_template', 99999999999999999999 );
