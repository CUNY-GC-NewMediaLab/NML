<?php

function projects_custom_init() {
  $labels = array(
    'name' => 'Projects',
    'singular_name' => 'Project',
    'add_new' => 'Add New',
    'add_new_item' => 'Add New Project',
    'edit_item' => 'Edit Project',
    'new_item' => 'New Project',
    'all_items' => 'All Projects',
    'view_item' => 'View Project',
    'search_items' => 'Search Projects',
    'not_found' =>  'No Projects found',
    'not_found_in_trash' => 'No Projects found in Trash', 
    'parent_item_colon' => '',
    'menu_name' => 'Projects'
  );

  $args = array(
    'labels' => $labels,
    'public' => true,
    'publicly_queryable' => true,
    'show_ui' => true, 
    'show_in_menu' => true, 
    'query_var' => true,
    'rewrite' => array( 'slug' => 'allproject' ),
    'capability_type' => 'page',
    'has_archive' => true, 
    'hierarchical' => true,
    'menu_position' => 5,
    'supports' => array( 'title', 'editor', 'author', 'thumbnail', 'revisions', 'page-attributes'),
     'taxonomies' => array( 'Department', 'post_tag' )
  ); 

  register_post_type( 'projects', $args );
}
add_action( 'init', 'projects_custom_init' );

function people_custom_init() {
  $labels = array(
    'name' => 'People',
    'singular_name' => 'Person',
    'add_new' => 'Add New',
    'add_new_item' => 'Add New Person',
    'edit_item' => 'Edit Person',
    'new_item' => 'New Person',
    'all_items' => 'All People',
    'view_item' => 'View Person',
    'search_items' => 'Search Projects',
    'not_found' =>  'No People found',
    'not_found_in_trash' => 'No People found in Trash', 
    'parent_item_colon' => '',
    'menu_name' => 'People'
  );

  $args = array(
    'labels' => $labels,
    'public' => true,
    'publicly_queryable' => true,
    'show_ui' => true, 
    'show_in_menu' => true, 
    'query_var' => true,
    'rewrite' => array( 'slug' => 'nml-people' ),
    'capability_type' => 'page',
    'has_archive' => true, 
    'hierarchical' => false,
    'menu_position' => 5,
    'supports' => array( 'title', 'editor', 'author', 'thumbnail', 'revisions'),
     'taxonomies' => array( 'Department' )
  ); 

  register_post_type( 'people', $args );
}
add_action( 'init', 'people_custom_init' );




?>