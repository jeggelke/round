<?php
/**
 * The header for our theme.
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package round
 */

?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="profile" href="http://gmpg.org/xfn/11">
<?php wp_head(); ?>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link id="bootstrap-css" rel="stylesheet" href="wp-content/themes/round/3rd-party/bootstrap/css/bootstrap.min.css">
<link id="normalize-css" rel="stylesheet" href="wp-content/themes/round/3rd-party/normalize/normalize.css">
<link id="main-style" rel="stylesheet" href="wp-content/themes/round/css/main.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
<script src="wp-content/themes/round/3rd-party/bootstrap/js/bootstrap.min.js"> </script>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.6.3/css/font-awesome.min.css">
<script>
  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
  })(window,document,'script','https://www.google-analytics.com/analytics.js','ga');

  ga('create', 'UA-85771603-1', 'auto');
  ga('send', 'pageview');

</script>
</head>

<body <?php body_class(); ?>>
<div id="page" class="site container-fluid">
	<a class="skip-link screen-reader-text" href="#content"><?php esc_html_e( 'Skip to content', 'round' ); ?></a>
	<div class="row">
		<div class="col-xs-12">
			<header id="masthead" class="site-header" role="banner">
				<div class="site-branding ">
					<div class="row header-container">
						<div class="col-xs-12 col-sm-6 col-sm-offset-3">
<!-- DONT COMMIT THIS WITHOUT adding / before wp-content-->
								<img src="wp-content/themes/round/theme-images/banner.png" class="img-responsive" alt="round designs banner">
						</div>
						<div class="col-xs-6 col-xs-offset-3">
							<?php
							/*
							if ( is_front_page() && is_home() ) : ?>
								<h1 class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h1>
							<?php else : ?>
								<p class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></p>
							<?php
							endif;
							*/

							$description = get_bloginfo( 'description', 'display' );
							if ( $description || is_customize_preview() ) : ?>
								<p class="site-description text-center"><?php echo $description; /* WPCS: xss ok. */ ?></p>
							<?php
							endif; ?>
						</div>
					</div>

				</div><!-- .site-branding -->

				<nav id="site-navigation" class="main-navigation navbar hidden" role="navigation">
					<div class="container-fluid">
						<button class="menu-toggle" aria-controls="primary-menu" aria-expanded="false"><?php esc_html_e( 'Primary Menu', 'round' ); ?></button>
						<?php wp_nav_menu( array( 'theme_location' => 'primary', 'menu_id' => 'primary-menu', 'menu_class' => 'nav navbar-nav' ) ); ?>
					</div>
				</nav><!-- #site-navigation -->
			</header><!-- #masthead -->
		</div>
	</div>
	<div id="content" class="site-content">
