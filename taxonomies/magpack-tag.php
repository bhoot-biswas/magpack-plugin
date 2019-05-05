<?php

/**
 * Registers the `magpack_tag` taxonomy,
 * for use with 'magpack_story'.
 */
function magpack_tag_init() {
	register_taxonomy( 'magpack_tag', array( 'magpack_story' ), array(
		'hierarchical'      => false,
		'public'            => true,
		'show_in_nav_menus' => true,
		'show_ui'           => true,
		'show_admin_column' => false,
		'query_var'         => true,
		'rewrite'           => true,
		'capabilities'      => array(
			'manage_terms'  => 'edit_posts',
			'edit_terms'    => 'edit_posts',
			'delete_terms'  => 'edit_posts',
			'assign_terms'  => 'edit_posts',
		),
		'labels'            => array(
			'name'                       => __( 'Tags', 'magpack' ),
			'singular_name'              => _x( 'Tag', 'taxonomy general name', 'magpack' ),
			'search_items'               => __( 'Search Tags', 'magpack' ),
			'popular_items'              => __( 'Popular Tags', 'magpack' ),
			'all_items'                  => __( 'All Tags', 'magpack' ),
			'parent_item'                => __( 'Parent Tag', 'magpack' ),
			'parent_item_colon'          => __( 'Parent Tag:', 'magpack' ),
			'edit_item'                  => __( 'Edit Tag', 'magpack' ),
			'update_item'                => __( 'Update Tag', 'magpack' ),
			'view_item'                  => __( 'View Tag', 'magpack' ),
			'add_new_item'               => __( 'Add New Tag', 'magpack' ),
			'new_item_name'              => __( 'New Tag', 'magpack' ),
			'separate_items_with_commas' => __( 'Separate Tags with commas', 'magpack' ),
			'add_or_remove_items'        => __( 'Add or remove Tags', 'magpack' ),
			'choose_from_most_used'      => __( 'Choose from the most used Tags', 'magpack' ),
			'not_found'                  => __( 'No Tags found.', 'magpack' ),
			'no_terms'                   => __( 'No Tags', 'magpack' ),
			'menu_name'                  => __( 'Tags', 'magpack' ),
			'items_list_navigation'      => __( 'Tags list navigation', 'magpack' ),
			'items_list'                 => __( 'Tags list', 'magpack' ),
			'most_used'                  => _x( 'Most Used', 'magpack_tag', 'magpack' ),
			'back_to_items'              => __( '&larr; Back to Tags', 'magpack' ),
		),
		'show_in_rest'      => true,
		'rest_base'         => 'magpack_tag',
		'rest_controller_class' => 'WP_REST_Terms_Controller',
	) );

}
add_action( 'init', 'magpack_tag_init' );

/**
 * Sets the post updated messages for the `magpack_tag` taxonomy.
 *
 * @param  array $messages Post updated messages.
 * @return array Messages for the `magpack_tag` taxonomy.
 */
function magpack_tag_updated_messages( $messages ) {

	$messages['magpack_tag'] = array(
		0 => '', // Unused. Messages start at index 1.
		1 => __( 'Tag added.', 'magpack' ),
		2 => __( 'Tag deleted.', 'magpack' ),
		3 => __( 'Tag updated.', 'magpack' ),
		4 => __( 'Tag not added.', 'magpack' ),
		5 => __( 'Tag not updated.', 'magpack' ),
		6 => __( 'Tags deleted.', 'magpack' ),
	);

	return $messages;
}
add_filter( 'term_updated_messages', 'magpack_tag_updated_messages' );
