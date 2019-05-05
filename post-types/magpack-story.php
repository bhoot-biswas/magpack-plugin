<?php

/**
 * Registers the `magpack_story` post type.
 */
function magpack_story_init() {
	register_post_type( 'magpack_story', array(
		'labels'                => array(
			'name'                  => __( 'Stories', 'magpack' ),
			'singular_name'         => __( 'Story', 'magpack' ),
			'all_items'             => __( 'All Stories', 'magpack' ),
			'archives'              => __( 'Story Archives', 'magpack' ),
			'attributes'            => __( 'Story Attributes', 'magpack' ),
			'insert_into_item'      => __( 'Insert into Story', 'magpack' ),
			'uploaded_to_this_item' => __( 'Uploaded to this Story', 'magpack' ),
			'featured_image'        => _x( 'Featured Image', 'magpack_story', 'magpack' ),
			'set_featured_image'    => _x( 'Set featured image', 'magpack_story', 'magpack' ),
			'remove_featured_image' => _x( 'Remove featured image', 'magpack_story', 'magpack' ),
			'use_featured_image'    => _x( 'Use as featured image', 'magpack_story', 'magpack' ),
			'filter_items_list'     => __( 'Filter Stories list', 'magpack' ),
			'items_list_navigation' => __( 'Stories list navigation', 'magpack' ),
			'items_list'            => __( 'Stories list', 'magpack' ),
			'new_item'              => __( 'New Story', 'magpack' ),
			'add_new'               => __( 'Add New', 'magpack' ),
			'add_new_item'          => __( 'Add New Story', 'magpack' ),
			'edit_item'             => __( 'Edit Story', 'magpack' ),
			'view_item'             => __( 'View Story', 'magpack' ),
			'view_items'            => __( 'View Stories', 'magpack' ),
			'search_items'          => __( 'Search Stories', 'magpack' ),
			'not_found'             => __( 'No Stories found', 'magpack' ),
			'not_found_in_trash'    => __( 'No Stories found in trash', 'magpack' ),
			'parent_item_colon'     => __( 'Parent Story:', 'magpack' ),
			'menu_name'             => __( 'Stories', 'magpack' ),
		),
		'public'                => true,
		'hierarchical'          => false,
		'show_ui'               => true,
		'show_in_nav_menus'     => true,
		'supports'              => array( 'title', 'editor' ),
		'has_archive'           => true,
		'rewrite'               => true,
		'query_var'             => true,
		'menu_position'         => null,
		'menu_icon'             => 'dashicons-index-card',
		'show_in_rest'          => true,
		'rest_base'             => 'magpack_story',
		'rest_controller_class' => 'WP_REST_Posts_Controller',
	) );

}
add_action( 'init', 'magpack_story_init' );

/**
 * Sets the post updated messages for the `magpack_story` post type.
 *
 * @param  array $messages Post updated messages.
 * @return array Messages for the `magpack_story` post type.
 */
function magpack_story_updated_messages( $messages ) {
	global $post;

	$permalink = get_permalink( $post );

	$messages['magpack_story'] = array(
		0  => '', // Unused. Messages start at index 1.
		/* translators: %s: post permalink */
		1  => sprintf( __( 'Story updated. <a target="_blank" href="%s">View Story</a>', 'magpack' ), esc_url( $permalink ) ),
		2  => __( 'Custom field updated.', 'magpack' ),
		3  => __( 'Custom field deleted.', 'magpack' ),
		4  => __( 'Story updated.', 'magpack' ),
		/* translators: %s: date and time of the revision */
		5  => isset( $_GET['revision'] ) ? sprintf( __( 'Story restored to revision from %s', 'magpack' ), wp_post_revision_title( (int) $_GET['revision'], false ) ) : false,
		/* translators: %s: post permalink */
		6  => sprintf( __( 'Story published. <a href="%s">View Story</a>', 'magpack' ), esc_url( $permalink ) ),
		7  => __( 'Story saved.', 'magpack' ),
		/* translators: %s: post permalink */
		8  => sprintf( __( 'Story submitted. <a target="_blank" href="%s">Preview Story</a>', 'magpack' ), esc_url( add_query_arg( 'preview', 'true', $permalink ) ) ),
		/* translators: 1: Publish box date format, see https://secure.php.net/date 2: Post permalink */
		9  => sprintf( __( 'Story scheduled for: <strong>%1$s</strong>. <a target="_blank" href="%2$s">Preview Story</a>', 'magpack' ),
		date_i18n( __( 'M j, Y @ G:i', 'magpack' ), strtotime( $post->post_date ) ), esc_url( $permalink ) ),
		/* translators: %s: post permalink */
		10 => sprintf( __( 'Story draft updated. <a target="_blank" href="%s">Preview Story</a>', 'magpack' ), esc_url( add_query_arg( 'preview', 'true', $permalink ) ) ),
	);

	return $messages;
}
add_filter( 'post_updated_messages', 'magpack_story_updated_messages' );
