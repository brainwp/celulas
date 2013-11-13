<?php
/**
 * The Header for our theme.
 *
 * Displays all of the <head> section and everything up till <div id="content">
 *
 * @package Celulas Theme
 */
?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title><?php wp_title( '|', true, 'right' ); ?></title>
<link rel="profile" href="http://gmpg.org/xfn/11">
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
<link rel="stylesheet" type="text/css" href="<?php echo bloginfo('stylesheet_directory') ?>/twentyeleven.css" />
<!-- Google Web Font -->
<link href='http://fonts.googleapis.com/css?family=Source+Sans+Pro:300,700,300italic,700italic|Oswald:400' rel='stylesheet' type='text/css'>
<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<div id="page" class="hfeed site">
	<?php do_action( 'before' ); ?>
	<header id="masthead" role="banner">
		<div class="imagem-header">		
			<a class="logo-header" href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a>
			
			<?php
				// Check to see if the header image has been removed
				$header_image = get_header_image();
				if ( $header_image ) :
					// Compatibility with versions of WordPress prior to 3.4.
					if ( function_exists( 'get_custom_header' ) ) {
						/*
						 * We need to figure out what the minimum width should be for our featured image.
						 * This result would be the suggested width if the theme were to implement flexible widths.
						 */
						$header_image_width = get_theme_support( 'custom-header', 'width' );
					} else {
						$header_image_width = HEADER_IMAGE_WIDTH;
					}
					?>

				<?php
						// Compatibility with versions of WordPress prior to 3.4.
						if ( function_exists( 'get_custom_header' ) ) {
							$header_image_width  = get_custom_header()->width;
							$header_image_height = get_custom_header()->height;
						} else {
							$header_image_width  = HEADER_IMAGE_WIDTH;
							$header_image_height = HEADER_IMAGE_HEIGHT;
						}
						?>
					<img src="<?php header_image(); ?>" width="<?php echo $header_image_width; ?>" height="<?php echo $header_image_height; ?>" alt="" />
				<?php endif; // end check for featured image or standard header ?>
			
		</div><!--  .imagem-header -->

		<nav id="access" class="main-navigation" role="navigation">
			<h1 class="menu-toggle"><?php _e( 'Menu', 'celulas-theme' ); ?></h1>
			<a class="skip-link screen-reader-text" href="#content"><?php _e( 'Skip to content', 'celulas-theme' ); ?></a>
			<?php wp_nav_menu( array( 'theme_location' => 'primary' ) ); ?>
		
					<div id="midias-sociais">
					<a href="<?php echo stripslashes (get_option('mo_url_twitter')); ?>" class="link_twitter" target="_blank"></a>
					<a href="<?php echo stripslashes (get_option('mo_url_face')); ?>" class="link_facebook" target="_blank"></a>
					<a href="<?php echo stripslashes (get_option('mo_url_youtube')); ?>" class="link_youtube" target="_blank"></a>
					</div>
		
		</nav><!-- #access -->
	</header><!-- #masthead -->

	<div id="content" class="site-content">
