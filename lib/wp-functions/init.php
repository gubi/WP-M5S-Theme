<?php
//jetpack vedo i social
function jetpack_the_social() {
    echo apply_filters( 'the_social', false );
}
add_filter( 'the_social', 'sharing_display', 19 );

//jetpack blocco vedo i social
function jetpack_no_default_social() {
    remove_filter( 'the_content', 'sharing_display', 19 );
    remove_filter( 'the_excerpt', 'sharing_display', 19 );
}

//miglioro la ricerca per email
function user_search_by_email($wp_user_query) {
	if( isset($_GET['s']) && !empty($_GET['s']) ) {
		$wp_user_query->query_where = substr(trim($wp_user_query->query_where), 0, -1 )." OR user_email LIKE '%".mysql_real_escape_string($_GET["s"])."%')";
		return $wp_user_query;
	}
}
add_action( 'pre_user_query', 'user_search_by_email' );

// custom admin login logo
function custom_wp_login_logo() {
	?>
	<style type="text/css">
	h1 a {
		background-image: url('<?php echo get_template_directory_uri_images(); ?>/logo.svg') !important;
		background-size: cover !important;
		width: 150px !important;
		height: 150px !important;
		margin: 0 auto !important;
	}
	#loginform {
		margin: 0;
	}
	</style>
	<?php
}
add_action( 'login_head', 'custom_wp_login_logo' );

//login url
function custom_wp_login_url() {
	return get_bloginfo('wpurl');
}
add_filter( 'login_headerurl', 'custom_wp_login_url' );

//login title
function custom_wp_login_title() {
	return get_bloginfo('name');
}
add_filter( 'login_headertitle', 'custom_wp_login_title' );

//title
function custom_wp_title( $title, $sep ) {
	if ( is_feed() ) return $title;
	global $page, $paged;
	$title .= get_bloginfo( 'name', 'display' ); // add the blog name
	$site_description = get_bloginfo( 'description', 'display' ); // add the blog description for the home/front page
	if ( $site_description && ( is_home() || is_front_page() ) ) $title .= ' '.$sep.' '.$site_description;
	if ( $paged >= 2 || $page >= 2 ) $title .= " $sep " . sprintf( __( 'Page %s', 'm5s' ), max( $paged, $page ) ); // add a page number if necessary
	return $title;
}
add_filter( 'wp_title', 'custom_wp_title', 10, 2 );

//il riassunto alle pagine
function add_excerpts_to_pages() {
	add_post_type_support( 'page', 'excerpt' );
}
add_action( 'init', 'add_excerpts_to_pages' );

//setup del immagini
function theme_setup() {
	add_theme_support('post-thumbnails');
	add_image_size('thumb-300', 300, 200, true);
	add_image_size('thumb-640', 640, 640, true);
	add_image_size('thumb-1280', 1280, 1280, true);
}
add_action( 'after_setup_theme', 'theme_setup' );