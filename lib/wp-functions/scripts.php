<?php
//aggiungo scripts
function theme_head_scripts() {
	//css packs
	wp_enqueue_style( 'jquery-ui-1.11.4', get_template_directory_uri_packs().'/jquery-ui-1.11.4/jquery-ui.css', array(), null ); //jquery ui
	wp_enqueue_style( 'bootstrap', get_template_directory_uri_packs().'/bootstrap-3.3.4/css/bootstrap.min.css', array(), null ); //bootstrap
	wp_enqueue_style( 'bootstrap-min', get_template_directory_uri_packs().'/bootstrap-3.3.4/css/bootstrap-theme.min.css', array(), null ); //bootstrap
	wp_enqueue_style( 'owl-carousel', get_template_directory_uri_packs().'/owl-carousel-1.3.2/owl.carousel.css', array(), null ); //owl carousel
	wp_enqueue_style( 'owl-carousel-theme', get_template_directory_uri_packs().'/owl-carousel-1.3.2/owl.theme.css', array(), null ); //owl carousel
	wp_enqueue_style( 'font-awesome', get_template_directory_uri_packs().'/font-awesome-4.3.0/css/font-awesome.min.css', array(), null ); //font awesome
	wp_enqueue_style( 'fancybox', get_template_directory_uri_packs().'/fancybox-2.1.5/jquery.fancybox.css', array(), null ); //fancybox

	//google fonts
	$query_args = array(
		'family' => 'Oswald:300,400,700'
	);
	wp_enqueue_style( 'google-fonts', add_query_arg( $query_args, '//fonts.googleapis.com/css' ), array(), null );

	//css custom
	wp_enqueue_style( 'default', get_bloginfo('stylesheet_url'), array(), null );
	wp_enqueue_style( 'responsiveness', get_template_directory_uri_css().'/responsiveness.css', array(), null );

	//js packs
	wp_enqueue_script( 'jquery-ui-1.11.4-jquery', get_template_directory_uri_packs().'/jquery-ui-1.11.4/external/jquery/jquery.js', array(), '1.11.4', false ); //jquery ui
	wp_enqueue_script( 'jquery-ui-1.11.4-jquery-ui', get_template_directory_uri_packs().'/jquery-ui-1.11.4/jquery-ui.js', array(), '1.11.4', false ); //jquery ui
	wp_enqueue_script( 'datepicker-it', get_template_directory_uri_packs().'/jquery-ui-1.11.4/datepicker-it.js', array(), '1.11.4', false ); //datepicker
	wp_enqueue_script( 'bootstrap', get_template_directory_uri_packs().'/bootstrap-3.3.4/js/bootstrap.min.js', array(), '3.3.4', false ); //bootstrap
	wp_enqueue_script( 'owl-carousel', get_template_directory_uri_packs().'/owl-carousel-1.3.2/owl.carousel.js', array(), '1.3.2', false ); //owl carousel
	wp_enqueue_script( 'fancybox', get_template_directory_uri_packs().'/fancybox-2.1.5/jquery.fancybox.js', array(), '2.1.5', false ); //fancybox
    //wp_enqueue_script( 'google-maps', '//maps.googleapis.com/maps/api/js?v=3.exp', array(), '1.1', false ); //google maps
    //wp_enqueue_script( 'google-maps-js-1', get_template_directory_uri_packs().'/google-maps/gmaps.js', array(), '1.1', false ); //google maps js 1
    //wp_enqueue_script( 'google-maps-js-2', get_template_directory_uri_packs().'/google-maps/gmaps.styles.js', array(), '1.1', false ); //google maps js 2
    //wp_enqueue_script( 'google-charts', '//www.google.com/jsapi', array(), '1.1', false ); //google chart

	//js custom
	wp_enqueue_script( 'default', get_template_directory_uri_js().'/scripts.js', array(), '1.0.0', true ); //nel footer
}
add_action( 'wp_enqueue_scripts', 'theme_head_scripts' );

//script nell'admin
/*
function theme_admin_head_scripts() {
	wp_register_style( 'datepicker-jquery-ui', '//code.jquery.com/ui/1.11.4/themes/smoothness/jquery-ui.css', false, '1.0.0' );
	wp_enqueue_style( 'datepicker-jquery-ui' );
	wp_register_style( 'datepicker-jquery-style', '//jqueryui.com/resources/demos/style.css', false, '1.0.0' );
	wp_enqueue_style( 'datepicker-jquery-style' );
	wp_enqueue_script( 'jquery-ui-1.11.4', '//code.jquery.com/ui/1.11.4/jquery-ui.js', array(), '1.11.4', false );
}
add_action( 'admin_enqueue_scripts', 'theme_admin_head_scripts' );
*/

//meta
function add_meta_head() {
	global $post;
	$current_url = home_url($_SERVER['REQUEST_URI']);

	//thumb
	if( is_singular() && (isset($post) && has_post_thumbnail($post->ID)) ) { //pagina singola
		$thumbnail_src = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'full' );
		$thumbnail_src = esc_attr( $thumbnail_src[0] ); //thumb
	} else {
		if(file_exists(get_template_directory().'/images/logo-top.png')) { //se esiste il logo top
			$thumbnail_src = get_template_directory_uri_images().'/logo-top.png'; //logo
		} else {
			$thumbnail_src = get_template_directory_uri_images().'/default-share-icon.png'; //default
		}
	}

	//facebook
	if(strstr(get_user_info('user_agent'), 'facebook')) {
		?>
		<meta property="fb:admins" content="" />
		<?php
	}

	//twitter
	if(strstr(get_user_info('user_agent'), 'Twitterbot')) {
		?>
		<meta name="twitter:title" content="<?php wp_title( '|', true, 'right' ); ?>" />
		<meta name="twitter:image" content="<?php echo $thumbnail_src; ?>" />
		<meta name="twitter:domain" content="<?php echo home_url(); ?>" />
		<meta name="twitter:site" content="@m5s" />
		<meta name="twitter:creator" content="@m5s" />
		<meta name="twitter:card" content="summary">
		<?php
	}

	//meta generali
	?>
	<meta property="og:title" content="<?php wp_title( '|', true, 'right' ); ?>" />
	<meta property="og:image" content="<?php echo $thumbnail_src; ?>" />
	<meta property="og:url" content="<?php echo $current_url; ?>" />
	<meta property="og:site_name" content="<?php echo get_bloginfo('name'); ?>" />
	<meta property="og:type" content="article" />
	<meta itemprop="name" content="<?php wp_title( '|', true, 'right' ); ?>" />
	<meta itemprop="image" content="<?php echo $thumbnail_src; ?>" />
	<meta itemprop="datePublished" content="<?php echo current_time('Y-m-d'); ?>" />
	<link rel="image_src" href="<?php echo $thumbnail_src; ?>" />
	<?php
}
add_action( 'wp_head', 'add_meta_head', 10, 2 );
