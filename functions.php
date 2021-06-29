<?php
/**
 * soapatrickthree functions and definitions.
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package soapatrickthree
 */

if ( ! function_exists( 'soapatrickthree_setup' ) ) :
/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function soapatrickthree_setup() {
	/*
	 * Make theme available for translation.
	 * Translations can be filed in the /languages/ directory.
	 * If you're building a theme based on soapatrickthree, use a find and replace
	 * to change 'soapatrickthree' to the name of your theme in all the template files.
	 */
	load_theme_textdomain( 'soapatrickthree', get_template_directory() . '/languages' );

	// Add default posts and comments RSS feed links to head.
	add_theme_support( 'automatic-feed-links' );

	/*
	 * Let WordPress manage the document title.
	 * By adding theme support, we declare that this theme does not use a
	 * hard-coded <title> tag in the document head, and expect WordPress to
	 * provide it for us.
	 */
	add_theme_support( 'title-tag' );

	/*
	 * Enable support for Post Thumbnails on posts and pages.
	 *
	 * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
	 */
	add_theme_support( 'post-thumbnails' );

	// This theme uses wp_nav_menu() in one location.
	register_nav_menus( array(
		'primary' => esc_html__( 'Primary', 'soapatrickthree' ),
	) );

	/*
	 * Switch default core markup for search form, comment form, and comments
	 * to output valid HTML5.
	 */
	add_theme_support( 'html5', array(
		'search-form',
		'comment-form',
		'comment-list',
		'gallery',
		'caption',
	) );

	/*
	 * Enable support for Post Formats.
	 * See https://developer.wordpress.org/themes/functionality/post-formats/
	 */
	add_theme_support( 'post-formats', array(
		'gallery',
		'image',
		'video',
		'quote',
		'link',
		'status'
	) );

	// Set up the WordPress core custom background feature.
	add_theme_support( 'custom-background', apply_filters( 'soapatrickthree_custom_background_args', array(
		'default-color' => 'ffffff',
		'default-image' => '',
	) ) );
}
endif;
add_action( 'after_setup_theme', 'soapatrickthree_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function soapatrickthree_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'soapatrickthree_content_width', 640 );
}
add_action( 'after_setup_theme', 'soapatrickthree_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function soapatrickthree_widgets_init() {
	register_sidebar( array(
		'name'          => esc_html__( 'Sidebar', 'soapatrickthree' ),
		'id'            => 'sidebar-1',
		'description'   => '',
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );
}
add_action( 'widgets_init', 'soapatrickthree_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function soapatrickthree_scripts() {
	wp_enqueue_style( 'soapatrickthree-style', get_template_directory_uri() . '/css/app.css', array('font-awesome-css'));

	wp_enqueue_script( 'soapatrickthree-navigation', get_template_directory_uri() . '/js/navigation.js', array(), '20151215', true );

	wp_enqueue_script( 'soapatrickthree-skip-link-focus-fix', get_template_directory_uri() . '/js/skip-link-focus-fix.js', array(), '20151215', true );
	
	wp_register_script( 'jquery', 'http://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js', array(), null, false );
	
	wp_enqueue_script( 'masonry', get_template_directory_uri() . '/js/masonry.pkgd.min.js', array('jquery'), '', true );	
	
	wp_enqueue_script( 'scripts', get_template_directory_uri() . '/js/scripts.js', array('masonry','jquery'), '', true );
	
	wp_enqueue_script( 'bootstrap', get_template_directory_uri() . '/bootstrap/js/bootstrap.min.js', array('jquery'), '', true );			
	
	wp_enqueue_style( 'font-awesome-css', get_template_directory_uri() . '/font-awesome/css/font-awesome.min.css' );						

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'soapatrickthree_scripts' );

/**
 * Implement the Custom Header feature.
 */
require get_template_directory() . '/inc/custom-header.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Custom functions that act independently of the theme templates.
 */
require get_template_directory() . '/inc/extras.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

/**
 * Load Jetpack compatibility file.
 */
require get_template_directory() . '/inc/jetpack.php';



/**
 * custom image sizes for gallery
 */
/*
if ( has_post_thumbnail() ) { 
    the_post_thumbnail( 'posttype-gallery' );   
}
*/

// copied from the Codex
// https://codex.wordpress.org/Function_Reference/add_image_size
if ( function_exists( 'add_image_size' ) ) { 
    add_image_size( 'index-width', 450, 9999 ); //600 pixels wide (and unlimited height)
	add_image_size( 'full-width', 1140, 9999 ); //1140 pixels wide (and unlimited height)    
}


/**
 * overwrite wp_pagenavi plugin
 */

add_filter( 'wp_pagenavi', 'ik_pagination', 10, 2 );
  
function ik_pagination($html) {
    $out = '';
  
    //wrap a's and span's in li's
    $out = str_replace("<div","",$html);
    $out = str_replace("class='wp-pagenavi'>","",$out);
    $out = str_replace("<a","<li><a",$out);
    $out = str_replace("</a>","</a></li>",$out);
    $out = str_replace("<span","<li><span",$out);  
    $out = str_replace("</span>","</span></li>",$out);
    $out = str_replace("</div>","",$out);
    $out = str_replace("<span class='current'","<li class='active'><span",$out);
    $out = str_replace("class='wp-pagenavi' role='navigation'>", "class='pagination pagination-lg'>",$out);
  
    return '<nav class="col-xs-12"><div class="nav-wrapper text-center"><ul '.$out.'</ul></div></nav>';
}


/**
 * overwrite next and previous post links
 */

function posts_link_next_class($format){
     $format = str_replace('href=', 'class="btn btn-default" href=', $format);
     return $format;
}
add_filter('next_post_link', 'posts_link_next_class');

function posts_link_prev_class($format) {
     $format = str_replace('href=', 'class="btn btn-default" href=', $format);
     return $format;
}
add_filter('previous_post_link', 'posts_link_prev_class');



/**
 * add featured image and lead to RSS feed
 */


function featured_and_lead_toRSS($content) {
	global $post;
	
	$post_id = get_the_ID();
	
	$lead = get_post_meta( $post_id, 'lead', true );
	if ( ! empty( $lead ) ) {
	    $content = '<div>' . $lead . '</div>' . $content;
	}
	
	$video = get_post_meta( $post_id, '_format_video_embed', true);
	if ( ! empty( $video ) ) {
	    $content = '<div>' . $video . '</div>' . $content;
	}	
	
	if ( has_post_thumbnail( $post->ID ) ){
		$content = '<div>' . get_the_post_thumbnail( $post->ID, 'full', array( 'style' => 'margin-bottom: 15px;' ) ) . '</div>' . $content;
	}
	
	return $content;
}
 
add_filter('the_excerpt_rss', 'featured_and_lead_toRSS');
add_filter('the_content_feed', 'featured_and_lead_toRSS');