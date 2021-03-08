<?php

/**
 * Add column to Movie data table
 */


function saplugin_movie_add_columns($columns){

    unset($columns['date']);
//    unset($columns['taxonomy-movie_cat']);
    unset($columns['comments']);
    $columns['image']=__('Poster','saplugin');
    $columns['release_year']=__('Release Year','saplugin');
    $columns['video_type']=__('Video Type','saplugin');
    $columns['date'] = __('Published On','saplugin');

    return $columns;
}
add_action('manage_movie_posts_columns','saplugin_movie_add_columns');


//output the value from database
function saplugin_output_column_content($column, $post_id){

    switch ($column){
        case 'image':
            echo get_the_post_thumbnail($post_id, 'poster-thumbnail');
            break;
        case 'release_year':
            echo get_post_meta($post_id, '_saplugin_movie_release_year' , true);
            break;
        case 'video_type':
            echo get_post_meta($post_id, '_saplugin_movie_video_type', true);
            break;

        default:
            break;
    }
}
add_action('manage_movie_posts_custom_column','saplugin_output_column_content', 10,2);


//define image size for poster image
add_image_size('poster-thumbnail', 100);


//sorting function by release and date----------------

function saplugin_make_movie_column_sortable( $columns ){
    $columns['release_year'] = 'release_year';
    $columns['video_type'] = 'video_type';

    return $columns;

}
add_filter('manage_edit-movie_sortable_columns','saplugin_make_movie_column_sortable');

//Custom sorting logic
function saplugin_movie_column_sorting_logic( $query ){
    if(! is_admin() || $query-> is_main_query() ){
        return;
    }

    if('release_year' === $query->get('orderby')){
        $query->set('orderby','meta_value');
        $query->set('meta_key','_saplugin_movie_release_year');
    }

    if('video_type' === $query->get('orderby')){
        $query->set('orderby','meta_value');
        $query->set('meta_key','_saplugin_movie_video_type');
    }

}
add_action('pre_get_posts','saplugin_movie_column_sorting_logic');



