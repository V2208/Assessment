<?php
add_action( 'wp_enqueue_scripts', 'vanshika_enqueue_styles' );
function vanshika_enqueue_styles() {
    $parenthandle = 'parent-style'; 
    $theme = wp_get_theme();
    wp_enqueue_style( $parenthandle, get_template_directory_uri() . '/style.css', 
        array(),  
        $theme->parent()->get('Version')
    );
    wp_enqueue_style( 'child-style', get_stylesheet_uri(),
        array( $parenthandle ),
        $theme->get('Version') 
    );
}

// Register Custom Post Type
function create_news() {

	$labels = array(
		'name'                  => _x( 'News', 'Post Type General Name', 'twentytwenty-child' ),
		'singular_name'         => _x( 'News', 'Post Type Singular Name', 'twentytwenty-child' ),
		'menu_name'             => __( 'News', 'twentytwenty-child' ),
		'name_admin_bar'        => __( 'News', 'twentytwenty-child' ),
		'archives'              => __( 'Item Archives', 'twentytwenty-child' ),
		'attributes'            => __( 'Item Attributes', 'twentytwenty-child' ),
		'parent_item_colon'     => __( 'Parent Item:', 'twentytwenty-child' ),
		'all_items'             => __( 'All Items', 'twentytwenty-child' ),
		'add_new_item'          => __( 'Add News', 'twentytwenty-child' ),
		'add_new'               => __( 'Add New', 'twentytwenty-child' ),
		'new_item'              => __( 'New Item', 'twentytwenty-child' ),
		'edit_item'             => __( 'Edit Item', 'twentytwenty-child' ),
		'update_item'           => __( 'Update Item', 'twentytwenty-child' ),
		'view_item'             => __( 'View Item', 'twentytwenty-child' ),
		'view_items'            => __( 'View Items', 'twentytwenty-child' ),
		'search_items'          => __( 'Search Item', 'twentytwenty-child' ),
		'not_found'             => __( 'Not found', 'twentytwenty-child' ),
		'not_found_in_trash'    => __( 'Not found in Trash', 'twentytwenty-child' ),
		'featured_image'        => __( 'Featured Image', 'twentytwenty-child' ),
		'set_featured_image'    => __( 'Set featured image', 'twentytwenty-child' ),
		'remove_featured_image' => __( 'Remove featured image', 'twentytwenty-child' ),
		'use_featured_image'    => __( 'Use as featured image', 'twentytwenty-child' ),
		'insert_into_item'      => __( 'Insert into item', 'twentytwenty-child' ),
		'uploaded_to_this_item' => __( 'Uploaded to this item', 'twentytwenty-child' ),
		'items_list'            => __( 'Items list', 'twentytwenty-child' ),
		'items_list_navigation' => __( 'Items list navigation', 'twentytwenty-child' ),
		'filter_items_list'     => __( 'Filter items list', 'twentytwenty-child' ),
	);
	$args = array(
		'label'                 => __( 'News', 'twentytwenty-child' ),
		'description'           => __( 'My News', 'twentytwenty-child' ),
		'labels'                => $labels,
		'supports'              => array( 'title', 'editor', 'thumbnail', 'revisions'),
		'hierarchical'          => false,
		'public'                => true,
		'show_ui'               => true,
		'show_in_menu'          => true,
		'menu_position'         => 20,
		'show_in_admin_bar'     => true,
		'show_in_nav_menus'     => true,
		'can_export'            => true,
		'has_archive'           => true,
		'exclude_from_search'   => false,
		'publicly_queryable'    => true,
		'capability_type'       => 'post',
	);
	register_post_type( 'news', $args );

}
add_action( 'init', 'create_news', 0 );
?>