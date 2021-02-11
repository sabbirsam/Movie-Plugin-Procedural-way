<?php
/**
 * Init Styles & scripts
 *
 * @return void
 */
function saplugin_public_styles_scripts() {

    wp_enqueue_style( 'saplugin-public-style', MYPLUGIN_URL . 'assets/public/css/public.css', '', rand());

    wp_enqueue_script( 'saplugin-public-script', MYPLUGIN_URL . 'assets/public/js/public.js', array('jquery'), rand(), true );
}
add_action( 'wp_enqueue_scripts', 'saplugin_public_styles_scripts' );