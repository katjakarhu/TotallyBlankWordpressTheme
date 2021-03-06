<?php

//
// Stuff that affects layouts and can be customized:
//

// Custom header presets
define('HEADER_TEXTCOLOR', 'ffffff');
define('HEADER_IMAGE', '%s/images/default_header.jpg'); // %s is the template dir uri
define('HEADER_IMAGE_WIDTH', 775); // use width and height appropriate for your theme
define('HEADER_IMAGE_HEIGHT', 200);

// Content width
if ( ! isset( $content_width ) ) 
    $content_width = 900;

// Post thumbnail size
set_post_thumbnail_size( 250, 250);


//
// Removing extra stuff from headers, see: http://wpengineer.com/1438/wordpress-header/
//

//remove_action( 'wp_head', 'feed_links_extra', 3 ); // Display the links to the extra feeds such as category feeds
remove_action( 'wp_head', 'feed_links', 2 ); // Display the links to the general feeds: Post and Comment Feed
remove_action( 'wp_head', 'rsd_link' ); // Display the link to the Really Simple Discovery service endpoint, EditURI link
remove_action( 'wp_head', 'wlwmanifest_link' ); // Display the link to the Windows Live Writer manifest file.
remove_action( 'wp_head', 'index_rel_link' ); // index link
remove_action( 'wp_head', 'parent_post_rel_link', 10, 0 ); // prev link
remove_action( 'wp_head', 'start_post_rel_link', 10, 0 ); // start link
remove_action( 'wp_head', 'adjacent_posts_rel_link', 10, 0 ); // Display relational links for the posts adjacent to the current post.
remove_action( 'wp_head', 'wp_generator' ); // Display the XHTML generator that is generated on the wp_head hook, WP version


//
//Enable sidebar for widgets
//

if ( function_exists('register_sidebar'))
   register_sidebar(array(
  'before_widget' => '',
  'after_widget' => ''
));


//
//Enable changing background
//

if ( function_exists('add_custom_background'))
	add_custom_background();


//
//Enable custom menu(s)
//

function register_my_menus() {
  register_nav_menus(
    array('header-menu' => __( 'Header Menu' ) )
  );
}

add_action( 'init', 'register_my_menus' );


//
//Enable custom headers
//

// gets included in the site header
function header_style() {
    ?><style type="text/css">
        #header {
            background: url(<?php header_image(); ?>);
        }
    </style><?php
}

// gets included in the admin header
function admin_header_style() {
    ?><style type="text/css">
        #heading {
            width: <?php echo HEADER_IMAGE_WIDTH; ?>px;
            height: <?php echo HEADER_IMAGE_HEIGHT; ?>px;
        }
    </style><?php
}

if ( function_exists('add_custom_image_header'))
	add_custom_image_header('header_style', 'admin_header_style');


//
//Custom stylesheets
//

if ( function_exists('add_editor_style'))
	add_editor_style();


//
// Core functionality stuff & Post thumbnails
//

if ( function_exists( 'add_theme_support' ) ) { 
	add_theme_support('automatic-feed-links');
	add_theme_support( 'post-thumbnails' );

	// additional image sizes
	// delete the next line if you do not need additional image sizes
	//add_image_size( 'category-thumb', 300, 9999 ); //300 pixels wide (and unlimited height)
} 


?>