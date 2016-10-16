<?php
$config = get_config();
?>

<!DOCTYPE html>
<html <?php language_attributes(); ?>>

<head>
<title><?php wp_title( '|', true, 'right' ); ?></title>
<meta http-equiv="Content-Type" content="text/html; charset=<?php bloginfo('charset'); ?>" />
<meta name="viewport" content="initial-scale=1.0, maximum-scale=1.0, user-scalable=0" />
<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>

<div id="m5s-modal" class="modal fade">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="<?php echo __('Chiudi', 'm5s'); ?>"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title"></h4>
            </div>
            <div class="modal-body">
                <p></p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal"><?php echo __('Chiudi', 'm5s'); ?></button>
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->

<div id="super_top_menu_container">
    <nav class="navbar navbar-default" role="navigation">
        <div class="row">
            <div class="pull-left">
                <!-- Micro-menu -->
                <div id="top_micro_menu">
                    <?php
                    //menu
                    $params = array(
                        'theme_location'	=> 'header_micro_menu',
                        'menu'				=> 'Header micro-menu',
                        'container'			=> false,
                        'menu_class'		=> 'header-menu',
                        'menu_id'			=> 'header_micro_menu',
                        'walker'			=> new cleaner_walker_nav_menu
                    );
                    wp_nav_menu( $params );
                    ?>
                </div>
            </div>
			<div class="pull-right">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#top_menu">
                        <span class="sr-only"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                </div>
            </div>
			<div class="pull-right">
                <nav class="navbar navbar-default" role="navigation">
                    <div class="pull-right" id="super_top_menu">
                        <?php
                        //menu
                        $params = array(
                            'theme_location'	=> 'header-menu',
                            'menu'				=> 'Super top menu',
                            'container'			=> false,
                            'menu_class'		=> 'header-menu',
                            'menu_id'			=> 'super_top_menu',
                            'walker'			=> new cleaner_walker_nav_menu
                        );
                        wp_nav_menu( $params );
                        ?>
                    </div>
                </nav>
            </div>
        </div>
    </nav>
</div>
<header class="container-fluid" id="header_main">
	<div class="row">
		<div id="logo" class="col-lg-2 col-md-5 col-sm-4 col-xs-12">
            <div class="container" id="header_container">
                <a href="<?php print get_home_url(); ?>">
                    <img class="img-responsive" src="<?php print get_home_url(); ?>/wp-content/themes/M5S/images/logo_m5s.png" alt="<?php print __('Logo', 'm5s'); ?>" />
                    <p>
                        <span><?php print $config->site_title ?></span>
                        <span class="location"><?php print $config->location; ?></span>
                    </p>
                </a>
		    </div>
		</div>
		<div class="col-lg-10 col-md-7 col-sm-8 col-xs-12">
			<nav class="navbar navbar-default" role="navigation">
				<div class="collapse navbar-collapse" id="top_menu">
					<?php
					//menu
					$params = array(
                        'before'            => '<span class="{class}"></span>',
						'theme_location'	=> 'header-menu',
						'menu'				=> 'Header Menu',
						'container'			=> false,
						'menu_class'		=> 'header-menu pull-right',
						'menu_id'			=> 'header_menu',
						'walker'			=> new cleaner_walker_nav_menu
					);
					wp_nav_menu( $params );
					?>
				</div>
			</nav>
		</div>
	</div>
</header>
<div id="search_bar">
    <div class="container">
        <div class="row">
            <div class="col-lg-5 col-md-6 col-sm-6 col-xs-12">
                <form role="search" method="get" id="search_form" action="<?php echo home_url( '/' ); ?>">
                    <div class="form-group has-feedback">
                        <input type="text" value="" name="s" id="search_input" class="form-control input-lg" placeholder="<?php print __("Cerca", "m5s"); ?>" />
                        <i class="form-control-feedback fa fa-search"></i>
                    </div>
                </form>
            </div>
            <div class="col-lg-offset-4 col-lg-3 col-md-offset-1 col-md-5 col-sm-6 col-xs-12">
                <a href="javascript:;" class="btn big-red-button"><?php print __("Attivati", "m5s"); ?></a>
            </div>
        </div>
    </div>
</div>
<div id="slider">
    <div class="container">
        <div class="owl-carousel">
            <div class="item">
                <div class="content">
                    <h1>Slider 1</h1>
                    <p class="lead">Content 1...</p>
                </div>
                <img src="<?php print get_home_url(); ?>/wp-content/themes/M5S/images/slider/home/palestrina.jpg" class="img-responsive" />
            </div>
            <div class="item">
                <div class="content">
                    <h1>Slider 2</h1>
                    <p class="lead">Content 2...</p>
                </div>
                <img src="<?php print get_home_url(); ?>/wp-content/themes/M5S/images/slider/home/palestrina.jpg" class="img-responsive" />
            </div>
            <div class="item">
                <div class="content">
                    <h1>Slider 3</h1>
                    <p class="lead">Content 3...</p>
                </div>
                <img src="<?php print get_home_url(); ?>/wp-content/themes/M5S/images/slider/home/palestrina.jpg" class="img-responsive" />
            </div>
        </div>
    </div>
</div>
