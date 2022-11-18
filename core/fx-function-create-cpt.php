<?php 
if ( !defined('ABSPATH')) exit;

/************************************/
// CREATE CPT PROJECTS / START
/************************************/

function my_custom_post_projects() {
	$labels = array(
		'name'               => _x( 'Projects', 'post type general name' ),
		'singular_name'      => _x( 'Projects', 'post type singular name' ),
		'add_new'            => _x( 'Add New', 'Project' ),
		'add_new_item'       => __( 'Add New Projects' ),
		'edit_item'          => __( 'Edit Project' ),
		'new_item'           => __( 'New Project' ),
		'all_items'          => __( 'All Projects' ),
		'view_item'          => __( 'View Projects' ),
		'search_items'       => __( 'Search Projects' ),
		'not_found'          => __( 'No Projects found' ),
		'not_found_in_trash' => __( 'No Projects found in the Trash' ), 
		'parent_item_colon'  => '',
		'menu_name'          => 'Project'
	);
	$args = array(
		'labels'        => $labels,
		'description'   => 'For Projects only',
		'public'        => true, // make it false if you would like to unaccessible outside...

		"publicly_queryable" => false,
//		"show_ui" => true,
//		"rest_base" => "",
		'menu_position' => 5,
		'supports'      => array( 'title', 'editor', 'thumbnail', 'excerpt' ),
		'has_archive'   => true,
		'menu_icon'     => 'dashicons-color-picker',
		'rewrite' => array( 'slug' => 'projects' ),
		"show_in_rest" => true,
		'hierarchical' => false
	);
	register_post_type( 'projects', $args );		
}
add_action( 'init', 'my_custom_post_projects' );



function create_my_taxonomies_for_projects() {
		register_taxonomy('projects_category', 'projects', array(
		'hierarchical' => true, 'label' => 'Project Category',
		'query_var' => true, 'rewrite' => true));
        
}
add_action('init', 'create_my_taxonomies_for_projects', 0);

function show_projects_tax() { 
	$mytax = get_taxonomy( 'projects_category' ); 
	$mytax->show_in_rest = true; 
} 
add_action( 'init', 'show_projects_tax', 30 );


function add_author_support_to_projects() {
    add_post_type_support( 'projects', 'author' ); 
}
add_action( 'init', 'add_author_support_to_projects' );

function projects_tag() {
    register_taxonomy_for_object_type('post_tag', 'projects');
}
add_action('init', 'projects_tag');

/************************************/
// CREATE CPT PROJECTS / START
/************************************/