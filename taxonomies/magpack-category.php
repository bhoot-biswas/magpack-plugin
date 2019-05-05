<?php

/**
 * Registers the `magpack_category` taxonomy,
 * for use with 'magpack_story'.
 */
function magpack_category_init() {
	register_taxonomy( 'magpack_category', array( 'magpack_story' ), array(
		'hierarchical'      => true,
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
			'name'                       => __( 'Categories', 'magpack' ),
			'singular_name'              => _x( 'Category', 'taxonomy general name', 'magpack' ),
			'search_items'               => __( 'Search Categories', 'magpack' ),
			'popular_items'              => __( 'Popular Categories', 'magpack' ),
			'all_items'                  => __( 'All Categories', 'magpack' ),
			'parent_item'                => __( 'Parent Category', 'magpack' ),
			'parent_item_colon'          => __( 'Parent Category:', 'magpack' ),
			'edit_item'                  => __( 'Edit Category', 'magpack' ),
			'update_item'                => __( 'Update Category', 'magpack' ),
			'view_item'                  => __( 'View Category', 'magpack' ),
			'add_new_item'               => __( 'Add New Category', 'magpack' ),
			'new_item_name'              => __( 'New Category', 'magpack' ),
			'separate_items_with_commas' => __( 'Separate Categories with commas', 'magpack' ),
			'add_or_remove_items'        => __( 'Add or remove Categories', 'magpack' ),
			'choose_from_most_used'      => __( 'Choose from the most used Categories', 'magpack' ),
			'not_found'                  => __( 'No Categories found.', 'magpack' ),
			'no_terms'                   => __( 'No Categories', 'magpack' ),
			'menu_name'                  => __( 'Categories', 'magpack' ),
			'items_list_navigation'      => __( 'Categories list navigation', 'magpack' ),
			'items_list'                 => __( 'Categories list', 'magpack' ),
			'most_used'                  => _x( 'Most Used', 'magpack_category', 'magpack' ),
			'back_to_items'              => __( '&larr; Back to Categories', 'magpack' ),
		),
		'show_in_rest'      => true,
		'rest_base'         => 'magpack_category',
		'rest_controller_class' => 'WP_REST_Terms_Controller',
	) );

}
add_action( 'init', 'magpack_category_init' );

/**
 * Sets the post updated messages for the `magpack_category` taxonomy.
 *
 * @param  array $messages Post updated messages.
 * @return array Messages for the `magpack_category` taxonomy.
 */
function magpack_category_updated_messages( $messages ) {

	$messages['magpack_category'] = array(
		0 => '', // Unused. Messages start at index 1.
		1 => __( 'Category added.', 'magpack' ),
		2 => __( 'Category deleted.', 'magpack' ),
		3 => __( 'Category updated.', 'magpack' ),
		4 => __( 'Category not added.', 'magpack' ),
		5 => __( 'Category not updated.', 'magpack' ),
		6 => __( 'Categories deleted.', 'magpack' ),
	);

	return $messages;
}
add_filter( 'term_updated_messages', 'magpack_category_updated_messages' );
