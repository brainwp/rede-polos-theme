<?php
$uri= get_template_directory_uri();
/**
 * The Header for our theme.
 *
 * Displays all of the <head> section and everything up till #main div
 *
 * @package Odin
 * @since 2.2.0
 */
?><!DOCTYPE html>
<!--[if IE 7]>
<html class="no-js ie ie7 lt-ie9 lt-ie8" <?php language_attributes(); ?>>
<![endif]-->
<!--[if IE 8]>
<html class="no-js ie ie8 lt-ie9" <?php language_attributes(); ?>>
<![endif]-->
<!--[if !(IE 7) | !(IE 8) ]><!-->
<html class="no-js" <?php language_attributes(); ?>>
<!--<![endif]-->
<head>
	<link href='http://fonts.googleapis.com/css?family=Allan:400,700' rel='stylesheet' type='text/css'>
	<meta charset="<?php bloginfo( 'charset' ); ?>" />
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0" />
	<link rel="profile" href="http://gmpg.org/xfn/11" />
	<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" />
	<link href="<?php echo get_template_directory_uri(); ?>/assets/images/favicon.ico" rel="shortcut icon" />
	<!--[if lt IE 9]>
	<script src="<?php echo get_template_directory_uri(); ?>/assets/js/html5.js"></script>
	<![endif]-->
	<?php wp_head(); ?>
	<link rel="stylesheet" type="text/css" href="<?php echo get_template_directory_uri(); ?>/assets/css/customizado.css" />
	
</head>

<body <?php body_class(); ?>>
	<nav id="header-nav" class="col-md-12">
		<div class="container">
			<div class="row">
				<div class="collapse navbar-collapse navbar-main-navigation">
					<?php
					wp_nav_menu(
						array(
							'theme_location' => 'main-menu',
							'depth'          => 2,
							'container'      => false,
							'menu_class'     => 'nav navbar-nav',
							'fallback_cb'    => 'Odin_Bootstrap_Nav_Walker::fallback',
							'walker'         => new Odin_Bootstrap_Nav_Walker()	
						)
					);
					?>
				</div><!-- .navbar-collapse -->
			</div><!-- .row -->
		</div><!-- .container -->
	</nav><!-- #header-nav -->
	<div id="container">
		<header id="header" role="banner" class="bg-graffiti">
			<div id="header-interno" class="interno">
				<div class="container">
					<div class="row">
						<div class="container header-description">
							<a href="<?php echo home_url();?>">
								<img src="<?php echo get_template_directory_uri();?>/assets/images/logo.png">
							</a>
							<?php if( $text = kirki_get_option('image_text') && is_home() ): ?>
								<h2 class="image-text">
									<?php echo apply_filters('the_title', $text);?>
								</h2><!-- .image-text -->
							<?php endif;?>
						</div><!-- .col-md-12 header-description -->
						<?php if( is_home() ): ?>
							<img id="header-img" src="<?php echo get_template_directory_uri();?>/assets/images/bg-players.png">
					    <?php endif;?>
					</div><!-- .row -->
				</div><!-- .container -->
			</div><!--div header interno-->
			<div class="clearfix"></div>
		</header><!-- #header -->
		<div id="main" class="site-main row">
