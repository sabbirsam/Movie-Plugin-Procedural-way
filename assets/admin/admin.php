<?php
/**
 * Init Styles & scripts
 *
 * @return void
 */
function saplugin_admin_styles_scripts() {

    wp_enqueue_style( 'saplugin-admin-style', MYPLUGIN_URL . 'assets/admin/css/admin.css', '', rand());

    wp_enqueue_script( 'saplugin-admin-script', MYPLUGIN_URL . 'assets/admin/js/admin.js', array('jquery'), rand(), true );
}
add_action( 'admin_enqueue_scripts', 'saplugin_admin_styles_scripts' );