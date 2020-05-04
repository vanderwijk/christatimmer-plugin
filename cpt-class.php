<?php
// register class custom post type
function ct_classes() {

	$labels = array(
		'name'                => _x( 'Classes', 'Post Type General Name', 'christatimmer' ),
		'singular_name'       => _x( 'Class', 'Post Type Singular Name', 'christatimmer' ),
		'menu_name'           => __( 'Classes', 'christatimmer' ),
		'parent_item_colon'   => __( 'Parent Class:', 'christatimmer' ),
		'all_items'           => __( 'All Classes', 'christatimmer' ),
		'view_item'           => __( 'View Class', 'christatimmer' ),
		'add_new_item'        => __( 'Add New Class', 'christatimmer' ),
		'add_new'             => __( 'Add New', 'christatimmer' ),
		'edit_item'           => __( 'Edit Class', 'christatimmer' ),
		'update_item'         => __( 'Update Class', 'christatimmer' ),
		'search_items'        => __( 'Search Class', 'christatimmer' ),
		'not_found'           => __( 'Not found', 'christatimmer' ),
		'not_found_in_trash'  => __( 'Not found in Trash', 'christatimmer' ),
	);
	$args = array(
		'label'               => __( 'class', 'christatimmer' ),
		'description'         => __( 'Fitness classes', 'christatimmer' ),
		'labels'              => $labels,
		'supports'            => array( 'title', 'editor', 'thumbnail', 'revisions', 'page-attributes' ),
		'taxonomies'          => array( 'course' ),
		'hierarchical'        => true,
		'public'              => true,
		'show_ui'             => true,
		'show_in_menu'        => true,
		'show_in_nav_menus'   => true,
		'show_in_admin_bar'   => true,
		'menu_position'       => 5,
		'menu_icon'           => 'dashicons-universal-access',
		'can_export'          => true,
		'has_archive'         => true,
		'exclude_from_search' => false,
		'publicly_queryable'  => true,
		'capability_type'     => 'page',
		'rewrite'             => array( 'slug' => __('class', 'christatimmer') )
	);
	register_post_type( 'class', $args );

}

// hook into the 'init' action
add_action( 'init', 'ct_classes', 0 );


// register custom taxonomy course
function ct_courses() {

	$labels = array(
		'name'                       => _x( 'Courses', 'Taxonomy General Name', 'christatimmer' ),
		'singular_name'              => _x( 'Course', 'Taxonomy Singular Name', 'christatimmer' ),
		'menu_name'                  => __( 'Courses', 'christatimmer' ),
		'all_items'                  => __( 'All Courses', 'christatimmer' ),
		'parent_item'                => __( 'Parent Course', 'christatimmer' ),
		'parent_item_colon'          => __( 'Parent Course:', 'christatimmer' ),
		'new_item_name'              => __( 'New Course', 'christatimmer' ),
		'add_new_item'               => __( 'Add New Course', 'christatimmer' ),
		'edit_item'                  => __( 'Edit Course', 'christatimmer' ),
		'update_item'                => __( 'Update Course', 'christatimmer' ),
		'separate_items_with_commas' => __( 'Separate Courses with commas', 'christatimmer' ),
		'search_items'               => __( 'Search Courses', 'christatimmer' ),
		'add_or_remove_items'        => __( 'Add or remove Courses', 'christatimmer' ),
		'choose_from_most_used'      => __( 'Choose from the most used Courses', 'christatimmer' ),
		'not_found'                  => __( 'Not Found', 'christatimmer' ),
	);
	$rewrite = array(
		'slug'                       => __( 'course', 'christatimmer' ),
		'with_front'                 => true,
		'hierarchical'               => false,
	);
	$args = array(
		'labels'                     => $labels,
		'hierarchical'               => true,
		'public'                     => true,
		'show_ui'                    => true,
		'show_admin_column'          => true,
		'show_in_nav_menus'          => true,
		'show_tagcloud'              => true,
		'rewrite'                    => $rewrite,
	);
	register_taxonomy( 'course', 'class', $args );

}

// hook into the 'init' action
add_action( 'init', 'ct_courses', 0 );