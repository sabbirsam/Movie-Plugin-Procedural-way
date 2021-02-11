<?php
function saplugin_movie_texonomy(){
    $labels = array(
        'name'              => _x( 'Categories', 'taxonomy general name', 'saplugin' ),
        'singular_name'     => _x( 'Category', 'taxonomy singular name', 'saplugin' ),
        'search_items'      => __( 'Search Categories', 'saplugin' ),
        'all_items'         => __( 'All Categories', 'saplugin' ),
        'parent_item'       => __( 'Parent Category', 'saplugin' ),
        'parent_item_colon' => __( 'Parent Category:', 'saplugin' ),
        'edit_item'         => __( 'Edit Category', 'saplugin' ),
        'update_item'       => __( 'Update Category', 'saplugin' ),
        'add_new_item'      => __( 'Add New Category', 'saplugin' ),
        'new_item_name'     => __( 'New Category Name', 'saplugin' ),
        'menu_name'         => __( 'Category', 'saplugin' ),
    );
    $args = array(
        'hierarchical'      => true,
        'labels'            => $labels,
        'show_ui'           => true,
        'show_admin_column' => true,
        'query_var'         => true,
        'rewrite'           => array( 'slug' => 'movie_cat' ),
    );
    register_taxonomy('movie_cat', array('movie'),$args);
}

add_action('init', 'saplugin_movie_texonomy');