<!doctype html>
<html <?php language_attributes(); ?>>
<head>

	<!-- 
	
	    Site Name by byBrick (http://bybrick.se/).
	    
	-->

	<meta charset="<?php bloginfo( 'charset' ); ?>" />
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">

	<title><?php wp_title(''); ?></title>
	
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	
	<meta name="author" content="byBrick">
	<meta name="Copyright" content="Copyright byBrick 2011. All Rights Reserved.">	
	
	<link rel="pingback" href="<?php bloginfo('pingback_url'); ?>" />			
	
	<!-- Favicon and touch icon for iPhone/Android -->
	<link rel="shortcut icon" href="<?php bloginfo('template_url'); ?>/images/favicon.ico">
	<link rel="apple-touch-icon" href="<?php bloginfo('template_url'); ?>/images/apple-touch-icon.png">
	
	<!-- CCS -->
	<link rel="stylesheet" type="text/css" href="<?php bloginfo('stylesheet_url'); ?>" />
		
	<!-- Theme hook -->
	<?php wp_head(); ?>
	
	</head>

<!-- BEGIN body -->
<body <?php body_class(); ?>>

	<!-- BEGIN header -->
	<header>
	
		<!-- BEGIN nav -->
	    <nav>
	    
	    	<?php wp_nav_menu('huvudmeny'); ?>
	    
	    <!-- END nav -->
	    </nav>
	
	<!-- END header -->
	</header>