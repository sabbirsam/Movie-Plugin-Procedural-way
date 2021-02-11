<?php
function saplugin_add_movie_metaboxes(){

    add_meta_box(
        'saplugin_movie_metabox_id',
        'Movie Options',
        'saplugin_movie_metaboxes_template',
        'movie'
    );

}

add_action('add_meta_boxes','saplugin_add_movie_metaboxes');


/**
 * Metabox Template
 */
function saplugin_movie_metaboxes_template($post) {

    $teaser_url         = get_post_meta( $post->ID, '_saplugin_movie_teaser_url', true );
    $release_year       = get_post_meta( $post->ID, '_saplugin_movie_release_year', true );
    $actors             = get_post_meta( $post->ID, '_saplugin_movie_actors', true );
    $video_type         = get_post_meta( $post->ID, '_saplugin_movie_video_type', true );
    $is_featured        = get_post_meta( $post->ID, '_saplugin_movie_is_featured', true );

    ?>
    <table>
        <tr>
            <td>Teaser URL: </td>
            <td>
                <input type="text" class="regular-text" name="saplugin_movie_teaser_url" value="<?php echo saplugin_get_movie_metavalues($teaser_url); ?>" />
            </td>
        </tr>
        <tr>
            <td>Release Year: </td>
            <td>
                <input type="text" class="regular-text" name="saplugin_movie_release_year" value="<?php echo saplugin_get_movie_metavalues($release_year); ?>" />
            </td>
        </tr>
        <tr>
            <td>Actors: </td>
            <td>
                <textarea name="saplugin_movie_actors" class="large-text" rows="4"><?php echo saplugin_get_movie_metavalues($actors); ?></textarea>
            </td>
        </tr>
        <tr>
            <td>Video Type: </td>
            <td>
                <select name="saplugin_movie_video_type" class="regular-text">
                    <option value="">Select One</option>
                    <option value="HD" <?php selected('HD', saplugin_get_movie_metavalues($video_type) ); ?>>HD</option>
                    <option value="SD" <?php selected('SD', saplugin_get_movie_metavalues($video_type) ); ?>>SD</option>
                </select>
            </td>
        </tr>
        <tr>
            <td>Is Featured?: </td>
            <td>
                <input type="checkbox" name="saplugin_movie_is_featured" class="regular-text" value="1" <?php checked( 1, saplugin_get_movie_metavalues($is_featured) ); ?> />
            </td>
        </tr>
    </table>
    <?php
}

/**
 * Save metabox values
 */
function saplugin_save_move_metabox_values($post_id) {

    if( isset($_POST['saplugin_movie_teaser_url']) ) {
        update_post_meta( $post_id, '_saplugin_movie_teaser_url', esc_url_raw($_POST['saplugin_movie_teaser_url']) );
    }
    if( isset($_POST['saplugin_movie_release_year']) ) {
        update_post_meta( $post_id, '_saplugin_movie_release_year', sanitize_text_field($_POST['saplugin_movie_release_year']) );
    }
    if( isset($_POST['saplugin_movie_actors']) ) {
        update_post_meta( $post_id, '_saplugin_movie_actors', sanitize_textarea_field($_POST['saplugin_movie_actors']) );
    }
    if( isset($_POST['saplugin_movie_video_type']) ) {
        update_post_meta( $post_id, '_saplugin_movie_video_type', sanitize_text_field($_POST['saplugin_movie_video_type']) );
    }

    if( isset($_POST['saplugin_movie_is_featured']) ) {
        update_post_meta( $post_id, '_saplugin_movie_is_featured', true );
    }else {
        update_post_meta( $post_id, '_saplugin_movie_is_featured', false );
    }
}
add_action('save_post', 'saplugin_save_move_metabox_values');

/**
 * Get the movie metavalues
 */
function saplugin_get_movie_metavalues($value) {
    if( isset($value) && ! empty($value) ) {
        return $value;
    }else {
        return '';
    }
}
