<!doctype html>
<html <?php language_attributes(); ?>>
<head>

	<!-- 

		Site Name by byBrick (http://bybrick.se/).

	-->

	<meta charset="<?php bloginfo( 'charset' ); ?>" />
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">

	<title><?php
	/*
	* Print the <title> tag based on what is being viewed.
	*/
	global $page, $paged;

	wp_title( '|', true, 'right' );

	// Add the blog name.
	bloginfo( 'name' );

	// Add the blog description for the home/front page.
	$site_description = get_bloginfo( 'description', 'display' );
	if ( $site_description && ( is_home() || is_front_page() ) )
	echo " | $site_description";

	// Add a page number if necessary:
	if ( $paged >= 2 || $page >= 2 )
	echo ' | ' . sprintf( __( 'Page %s', '_s' ), max( $paged, $page ) );

	?></title>
	
	<link rel="profile" href="http://gmpg.org/xfn/11" />
	<link rel="pingback" href="<?php bloginfo('pingback_url'); ?>" />

	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta name="application-name" content="<?php bloginfo( 'name' ); ?>">
	<meta name="msapplication-tooltip" content="<?php bloginfo( 'description' ); ?>">
	<meta name="author" content="byBrick">
	<meta name="copyright" content="Copyright byBrick 2012. All Rights Reserved.">	

	<link rel="shortcut icon" href="<?php bloginfo('template_url'); ?>/images/favicon.ico">
	<link rel="apple-touch-icon" href="<?php bloginfo('template_url'); ?>/images/apple-touch-icon.png">
	
	<!--[if lt IE 9]>
	<script src="<?php echo get_template_directory_uri(); ?>/js/html5.js" type="text/javascript"></script>
	<![endif]-->

	<?php wp_head(); ?>
	
	</head>

<body <?php body_class(); ?>>
	<header role="banner">
		<hgroup>
			<h1 class="site-title"><a href="<?php echo home_url( '/' ); ?>" title="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h1>
			<h2 class="site-description"><?php bloginfo( 'description' ); ?></h2>
		</hgroup>

		<nav role="navigation">
			<?php wp_nav_menu( array( 'theme_location' => 'huvudymeny' ) ); ?>
		</nav>
	</header>

	<div id="main" role="main">