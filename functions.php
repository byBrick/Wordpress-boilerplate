<?php

/*-----------------------------------------------------------------------------------*/
/*	Registera WP3.0+ Menyer
/*-----------------------------------------------------------------------------------*/

function bb_register_menu() {
	register_nav_menu('huvudymeny', __('Huvudmeny'));
}
add_action('init', 'bb_register_menu');


//---------------------------------------------------------------------------------
//	Aktivera widgets
//---------------------------------------------------------------------------------

if ( function_exists('register_sidebar') )
	register_sidebar(array(
	'before_widget' => '<div class="widget">',
	'after_widget' => '</div>',
	'before_title' => '<h1>',
	'after_title' => '</h1>',
));


/*-----------------------------------------------------------------------------------*/
/*	Ladda script
/*-----------------------------------------------------------------------------------*/

function bb_ladda_saker() {
	if (!is_admin()) {
		// Avregistrera olika scripts. Som standard tar vi bort l10n.js och den lokala jQuery.
	    wp_deregister_script('jquery');
	    wp_deregister_script('l10n');
	    
	    // Lägg till skripts enligt wp_register_script( $handle, $src, $deps, $ver, $in_footer );
	    wp_register_script('jquery', 'http://ajax.googleapis.com/ajax/libs/jquery/1.6/jquery.min.js');
	    wp_register_script('html5shiv', 'http://html5shiv.googlecode.com/svn/trunk/html5.js');			
	    wp_register_script('selectivizr', 'http://cdnjs.cloudflare.com/ajax/libs/selectivizr/1.0.2/selectivizr-min.js');			
	    wp_register_script('custom', get_template_directory_uri() . '/js/custom.js', 'jquery', '1.0', TRUE);
	    	    
	    // Laddar skripten vi registrerat ovan.
	    wp_enqueue_script('jquery');
	    wp_enqueue_script('custom');
	}
}    
add_action('init', 'bb_ladda_saker');

// Ladda IE scripts bara för IE
function bb_ie_scripts() {
	global $is_IE;
	if($is_IE) wp_enqueue_script('html5shiv');
	if($is_IE) wp_enqueue_script('selectivizr');
}
add_action('wp_print_scripts', 'bb_ie_scripts');


/*-----------------------------------------------------------------------------------*/
/*	Kolla vilken browser besökaren har och stoppa in det i body-klassen
/*-----------------------------------------------------------------------------------*/

add_filter('body_class','bb_browser_body_class');
function bb_browser_body_class($classes) {
	global $is_lynx, $is_gecko, $is_IE, $is_opera, $is_NS4, $is_safari, $is_chrome, $is_iphone;

	if($is_lynx) $classes[] = 'lynx';
	elseif($is_gecko) $classes[] = 'gecko';
	elseif($is_opera) $classes[] = 'opera';
	elseif($is_NS4) $classes[] = 'ns4';
	elseif($is_safari) $classes[] = 'safari';
	elseif($is_chrome) $classes[] = 'chrome';
	elseif($is_IE) $classes[] = 'ie';
	else $classes[] = 'unknown';

	if($is_iphone) $classes[] = 'iphone';
	return $classes;
}


/*-----------------------------------------------------------------------------------*/
/*	Egen logo på login-sidan
/*-----------------------------------------------------------------------------------*/

function bb_custom_login_logo() {
    echo '<style type="text/css">
        h1 a { background-image:url('.get_template_directory_uri().'/images/custom-login-logo.png) !important; }
    </style>';
}

function bb_wp_login_url() {
	echo home_url();
}

function bb_wp_login_title() {
	echo get_option('blogname');
}

add_action('login_head', 'bb_custom_login_logo');
add_filter('login_headerurl', 'bb_wp_login_url');
add_filter('login_headertitle', 'bb_wp_login_title');


//---------------------------------------------------------------------------------
//	Ta bort blandat skräp från head
//---------------------------------------------------------------------------------

remove_action('wp_head', 'rsd_link');
remove_action('wp_head', 'wp_generator');
remove_action('wp_head', 'feed_links', 2);
remove_action('wp_head', 'index_rel_link');
remove_action('wp_head', 'wlwmanifest_link');
remove_action('wp_head', 'feed_links_extra', 3);
remove_action('wp_head', 'start_post_rel_link', 10, 0);
remove_action('wp_head', 'parent_post_rel_link', 10, 0);
remove_action('wp_head', 'adjacent_posts_rel_link', 10, 0);


//---------------------------------------------------------------------------------
//	Lägg till Google Analytics i footern, ändra UA-XXXXX-X till din egen tracking-kod
//---------------------------------------------------------------------------------

function bb_google_analytics() {
	echo '<script src="http://www.google-analytics.com/ga.js" type="text/javascript"></script>';
	echo '<script type="text/javascript">';
	echo 'var pageTracker = _gat._getTracker("UA-XXXXX-X");';
	echo 'pageTracker._trackPageview();';
	echo '</script>';
}
add_action('wp_footer', 'bb_google_analytics');


/*-----------------------------------------------------------------------------------*/
/*	Ändra längden på the_excerpt
/*-----------------------------------------------------------------------------------*/

function bb_excerpt_length($length) {
	return 30; 
}
add_filter('excerpt_length', 'bb_excerpt_length');


//---------------------------------------------------------------------------------
//	Tumnaglar | Visa nya storlekar i ditt tema enligt if ( has_post_thumbnail() ) { the_post_thumbnail( 'medium' ); }
//---------------------------------------------------------------------------------

if ( function_exists( 'add_theme_support' ) ) { 
	add_theme_support( 'post-thumbnails' );
	set_post_thumbnail_size( 35, 35, true );
	add_image_size( 'large', 680, '', true ); // Large thumbnails
	add_image_size( 'medium', 250, '', true ); // Medium thumbnails
	add_image_size( 'small', 125, '', true ); // Small thumbnails
}


//-----------------------------------------------------------------------------------*/
//	Max bildbredd (använd tillsammans med ".entry-content img" i css)
//-----------------------------------------------------------------------------------*/

if ( ! isset( $content_width ) ) $content_width = 680;


//---------------------------------------------------------------------------------
//	Lite byBrick credit ;)
//---------------------------------------------------------------------------------

function bb_footer_credit () {
  echo 'Created by <a href="http://bybrick.se/" target="_blank">byBrick</a>. ';
  echo 'Powered by <a href="http://WordPress.org/" target="_blank">WordPress</a>.';
}

add_filter('admin_footer_text', 'bb_footer_credit');


?>