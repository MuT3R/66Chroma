<?php

/**
 * Removes the "Trash" link on the individual post's "actions" row on the posts
 * edit page.
 */
add_filter( 'post_row_actions', 'remove_row_actions_post', 10, 2 );
function remove_row_actions_post( $actions, $post ) {
    if( $post->post_type === 'portfolio' ) {
        unset( $actions['clone'] );
        unset( $actions['trash'] );
    }
    return $actions;
}

add_action('wp_trash_post', 'restrict_post_deletion');
function restrict_post_deletion($post_id) {
    if( get_post_type($post_id) === 'portfolio' ) {
      wp_die('The post you were trying to delete is protected.');
    }
}

