<?php

/**
     * Plugin Name: saplugin
     * Plugin URI: http://techsambd.com
     * Author: Md Sabbir Ahmed
     * Author URI: http://techsambd.com
     * Description: This Plugin is for self learning
     * License: GPL2 or later
     * Version: 1.00
     * Text-domain: saplugin
     *
     *
     */

if( !defined('ABSPATH') ) : exit(); endif;

/**
 * Define plugin constants
 */
define( 'MYPLUGIN_PATH', trailingslashit( plugin_dir_path(__FILE__) ) );
define( 'MYPLUGIN_URL', trailingslashit( plugins_url('/', __FILE__) ) );


/**
 * Include admin.php
 */
if( is_admin() ) {
    require_once MYPLUGIN_PATH . '/assets/admin/admin.php';
}


/**
 * Include public.php
 */
if( !is_admin() ) {
    require_once MYPLUGIN_PATH . '/assets/public/public.php';
}

/**
 * Include movie.php post type
 */
    require_once MYPLUGIN_PATH. '/inc/post-types/movie.php';


/**
 * Include movie-taxonomy
 */
require_once MYPLUGIN_PATH. '/inc/taxonomies/movie-taxonomy.php';


/**
 * Include Metaboxes
 */
require_once MYPLUGIN_PATH . '/inc/metaboxes/movie-metaboxes.php';