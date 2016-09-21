<?php
/*
Plugin Name: "Album" Custom Post Type & Supporting Taxonomies
Description: Register an API-enabled post type & related taxonomies for music albums
Version:     1.0
Author:      K. Adam White
Author URI:  https://wordpress.org/support/profile/kadamwhite
*/

// CUSTOM POST TYPES
// =================

// "albums" is the core post type provided by this plugin
function wvv_register_albums_cpt() {
	$labels = array(
		'name'               => _x( 'Albums', 'post type general name', 'wpapivv' ),
		'singular_name'      => _x( 'Album', 'post type singular name', 'wpapivv' ),
		'menu_name'          => _x( 'Albums', 'admin menu', 'wpapivv' ),
		'name_admin_bar'     => _x( 'Album', 'add new on admin bar', 'wpapivv' ),
		'add_new'            => _x( 'Add New', 'album', 'wpapivv' ),
		'add_new_item'       => __( 'Add New Album', 'wpapivv' ),
		'new_item'           => __( 'New Album', 'wpapivv' ),
		'edit_item'          => __( 'Edit Album', 'wpapivv' ),
		'view_item'          => __( 'View Album', 'wpapivv' ),
		'all_items'          => __( 'All Albums', 'wpapivv' ),
		'search_items'       => __( 'Search Albums', 'wpapivv' ),
		'parent_item_colon'  => __( 'Parent Albums:', 'wpapivv' ),
		'not_found'          => __( 'No albums found.', 'wpapivv' ),
		'not_found_in_trash' => __( 'No albums found in Trash.', 'wpapivv' )
	);

	$args = array(
		'labels'             => $labels,
		'description'        => __( 'A custom post type for music albums.', 'wpapivv' ),
		'public'             => true,
		'publicly_queryable' => true,
		'show_ui'            => true,
		'show_in_menu'       => true,
		'query_var'          => true,
		'rewrite'            => array( 'slug' => 'album' ),
		'capability_type'    => 'post',
		'has_archive'        => true,
		'hierarchical'       => false,
		'menu_position'      => null,
		'show_in_rest'       => true,
		'rest_base'          => 'albums',
		'rest_controller_class' => 'WP_REST_Posts_Controller',
		'supports'           => array( 'title', 'editor', 'thumbnail', 'excerpt', 'comments' )
	);

	register_post_type( 'album', $args );
}

// CUSTOM TAXONOMIES
// =================

// "band" is a non-hierarchical taxonomy
function wvv_register_band_taxonomy() {
	$labels = array(
		'name'              => _x( 'Bands', 'taxonomy general name', 'wpapivv' ),
		'singular_name'     => _x( 'Band', 'taxonomy singular name', 'wpapivv' ),
		'search_items'      => __( 'Search Bands', 'wpapivv' ),
		'all_items'         => __( 'All Bands', 'wpapivv' ),
		'parent_item'       => __( 'Parent Band', 'wpapivv' ),
		'parent_item_colon' => __( 'Parent Band:', 'wpapivv' ),
		'edit_item'         => __( 'Edit Band', 'wpapivv' ),
		'update_item'       => __( 'Update Band', 'wpapivv' ),
		'add_new_item'      => __( 'Add New Band', 'wpapivv' ),
		'new_item_name'     => __( 'New Band Name', 'wpapivv' ),
		'menu_name'         => __( 'Band', 'wpapivv' ),
	);

	$args = array(
		'hierarchical'      => false,
		'labels'            => $labels,
		'show_ui'           => true,
		'show_admin_column' => true,
		'query_var'         => true,
		'rewrite'           => array( 'slug' => 'band' ),
		'show_in_rest'      => true,
		'rest_base'         => 'bands',
		'rest_controller_class' => 'WP_REST_Terms_Controller',
	);

	register_taxonomy( 'band', array( 'album' ), $args );
}

// "genre" is a hierarchical taxonomy (to support sub-genres)
function wvv_register_genre_taxonomy() {
	$labels = array(
		'name'              => _x( 'Genres', 'taxonomy general name', 'wpapivv' ),
		'singular_name'     => _x( 'Genre', 'taxonomy singular name', 'wpapivv' ),
		'search_items'      => __( 'Search Genres', 'wpapivv' ),
		'all_items'         => __( 'All Genres', 'wpapivv' ),
		'parent_item'       => __( 'Parent Genre', 'wpapivv' ),
		'parent_item_colon' => __( 'Parent Genre:', 'wpapivv' ),
		'edit_item'         => __( 'Edit Genre', 'wpapivv' ),
		'update_item'       => __( 'Update Genre', 'wpapivv' ),
		'add_new_item'      => __( 'Add New Genre', 'wpapivv' ),
		'new_item_name'     => __( 'New Genre Name', 'wpapivv' ),
		'menu_name'         => __( 'Genre', 'wpapivv' ),
	);

	$args = array(
		'hierarchical'      => true,
		'labels'            => $labels,
		'show_ui'           => true,
		'show_admin_column' => true,
		'query_var'         => true,
		'rewrite'           => array( 'slug' => 'genre' ),
		'show_in_rest'      => true,
		'rest_base'         => 'genres',
		'rest_controller_class' => 'WP_REST_Terms_Controller',
	);

	register_taxonomy( 'genre', array( 'album' ), $args );
}

// INITIALIZATION
// ==============

add_action( 'init', function() {
	wvv_register_albums_cpt();
	wvv_register_band_taxonomy();
	wvv_register_genre_taxonomy();
});
