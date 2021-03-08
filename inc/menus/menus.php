<?php


/**
 * Custom Admin menu
*/

function saplugin_custom_admin_menu(){
    add_menu_page(
        __( 'Custom Menu SAM', 'saplugin' ),
        __('Custom Menu', 'saplugin'),
        'manage_options',
        'custom-menus-sam',
        'saplugin_custom_menu_template_callback',
        MYPLUGIN_URL.'assets/admin/img/s.png',
        6
    );
}

add_action('admin_menu','saplugin_custom_admin_menu');


/**
 * Create Custom Submenu
 */
function saplugin_custom_sub_menu(){
    add_submenu_page(
        'edit.php?post_type=book',
        __( 'Books Shortcode Reference', 'saplugin' ),
        __( 'Shortcode Reference', 'saplugin' ),
        'manage_options',
        'books-shortcode-ref',
        'books_ref_page_callback'
    );
}

add_action('add_submenu_page','saplugin_custom_sub_menu');





/**
 * saplugin_custom_menu_template_callback call back function
 * Custom menu callback function
 */

function saplugin_custom_menu_template_callback(){

    ?>
    <h1>ok this is template</h1>

<?php

}