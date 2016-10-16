<?php
//file css
function change_stylesheet_uri() {
	$stylesheet_uri = get_template_directory_uri().'/css/style.css';
	return $stylesheet_uri;
}
add_filter( 'stylesheet_uri', 'change_stylesheet_uri' );

//cartella css
function change_stylesheet_directory_uri() {
	$stylesheet_directory = get_template_directory_uri().'/css';
	return $stylesheet_directory;
}
add_filter( 'stylesheet_directory_uri', 'change_stylesheet_directory_uri' );

//cartella images
function get_template_directory_uri_images() {
	return get_template_directory_uri().'/images';
}

//cartella css
function get_template_directory_uri_css() {
	return get_template_directory_uri().'/css';
}

//cartella js
function get_template_directory_uri_js() {
	return get_template_directory_uri().'/js';
}

//cartella packs
function get_template_directory_uri_packs() {
	return get_template_directory_uri().'/lib/packs';
}
