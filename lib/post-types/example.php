<?php
/*
	cambiare sempre i nomi delle DUE funzioni per ogni post_type
	chiamare il file del post_type sempre al SINGOLARE
*/

/*
//settings
$settings[basename(__FILE__, '.php')] = array(
	'singular'			=> __( 'Thread', 'm5s' ),
	'plural'			=> __( 'Threads', 'm5s' ),
	'menu_name'			=> __( 'Forum', 'm5s' ),
	'slug'				=> 'forum', //url
	'have_taxonomies'	=> true,
	'tax_singular'		=> __( 'Category', 'm5s' ),
	'tax_plural'		=> __( 'Categories', 'm5s' ),
	'tax_slug'			=> 'forum-categories' //url
);

//post_type
if(!function_exists(basename(__FILE__, '.php').'_init')) {
	function forum_init() { //****************************************************************** da cambiare
		global $settings;
		$labels = array(
			'name'					=> $settings[basename(__FILE__, '.php')]['plural'],
			'singular_name'			=> $settings[basename(__FILE__, '.php')]['singular'],
			'menu_name'				=> $settings[basename(__FILE__, '.php')]['menu_name'],
			'name_admin_bar'		=> $settings[basename(__FILE__, '.php')]['singular'],
			'add_new'				=> __( 'Add New', 'm5s' ),
			'add_new_item'			=> __( 'Add New '.$settings[basename(__FILE__, '.php')]['singular'], 'm5s' ),
			'new_item'				=> __( 'New '.$settings[basename(__FILE__, '.php')]['singular'], 'm5s' ),
			'edit_item'				=> __( 'Edit '.$settings[basename(__FILE__, '.php')]['singular'], 'm5s' ),
			'view_item'				=> __( 'View '.$settings[basename(__FILE__, '.php')]['singular'], 'm5s' ),
			'all_items'				=> __( 'All '.$settings[basename(__FILE__, '.php')]['plural'], 'm5s' ),
			'search_items'			=> __( 'Search '.$settings[basename(__FILE__, '.php')]['plural'], 'm5s' ),
			'parent_item_colon'		=> __( 'Parent '.$settings[basename(__FILE__, '.php')]['plural'].':', 'm5s' ),
			'not_found'				=> __( 'No '.strtolower($settings[basename(__FILE__, '.php')]['plural']).' found.', 'm5s' ),
			'not_found_in_trash'	=> __( 'No '.strtolower($settings[basename(__FILE__, '.php')]['plural']).' found in Trash.', 'm5s' )
		);
	
		$args = array(
			'labels'				=> $labels,
			'public'				=> true,
			'publicly_queryable'	=> true,
			'show_ui'				=> true,
			'show_in_menu'			=> true,
			'query_var'				=> true,
			'rewrite'				=> array( 'slug' => $settings[basename(__FILE__, '.php')]['slug'] ),
			'capability_type'		=> 'post',
			'has_archive'			=> true,
			'hierarchical'			=> false,
			'menu_position'			=> 4,
			'supports'				=> array( 'title', 'editor', 'author', 'thumbnail', 'excerpt', 'comments' ),
			'menu_icon'				=> 'dashicons-format-status' //https://developer.wordpress.org/resource/dashicons/
		);
	
		register_post_type( basename(__FILE__, '.php'), $args );
	}
	add_action( 'init', basename(__FILE__, '.php').'_init' );
}

//taxonomies
if($settings[basename(__FILE__, '.php')]['have_taxonomies']) { //sono presenti?
	if(!function_exists(basename(__FILE__, '.php').'_taxonomies_init')) {
		function forum_taxonomies_init() { //****************************************************************** da cambiare
			global $settings;
			$labels = array(
				'name'					=> $settings[basename(__FILE__, '.php')]['tax_plural'],
				'singular_name'			=> $settings[basename(__FILE__, '.php')]['tax_singular'],
				'search_items'			=> $settings[basename(__FILE__, '.php')]['tax_plural'],
				'all_items'				=> __( 'All '.$settings[basename(__FILE__, '.php')]['tax_plural'], 'm5s' ),
				'parent_item'			=> __( 'Parent '.$settings[basename(__FILE__, '.php')]['tax_singular'], 'm5s' ),
				'parent_item_colon'		=> __( 'Parent '.$settings[basename(__FILE__, '.php')]['tax_singular'].':', 'm5s' ),
				'edit_item'				=> __( 'Edit '.$settings[basename(__FILE__, '.php')]['tax_singular'], 'm5s' ),
				'update_item'			=> __( 'Update '.$settings[basename(__FILE__, '.php')]['tax_singular'], 'm5s' ),
				'add_new_item'			=> __( 'Add New '.$settings[basename(__FILE__, '.php')]['tax_singular'], 'm5s' ),
				'new_item_name'			=> __( 'New '.$settings[basename(__FILE__, '.php')]['tax_singular'].' Name', 'm5s' ),
				'menu_name'				=> $settings[basename(__FILE__, '.php')]['tax_plural']
			);
		
			$args = array(
				'hierarchical'			=> true,
				'labels'				=> $labels,
				'show_ui'				=> true,
				'show_admin_column'		=> true,
				'query_var'				=> true,
				'rewrite'				=> array( 'slug' => $settings[basename(__FILE__, '.php')]['tax_slug'] )
			);
		
			register_taxonomy( strtolower($settings[basename(__FILE__, '.php')]['tax_slug']), array( basename(__FILE__, '.php') ), $args );
		}
		add_action( 'init', basename(__FILE__, '.php').'_taxonomies_init', 0 );
	}
}
*/