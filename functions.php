<?php
/** Start the engine */
require_once( get_template_directory() . '/lib/init.php' );

/** Child theme (do not remove) */
define( 'CHILD_THEME_NAME', 'Structure Child Theme' );
define( 'CHILD_THEME_URL', 'http://www.aaronhartland.com/themes/structure' );

/** Add Viewport meta tag for mobile browsers */
add_action( 'genesis_meta', 'add_viewport_meta_tag' );
function add_viewport_meta_tag() {
    echo '<meta name="viewport" content="width=device-width, initial-scale=1.0"/>';
}

/** Add support for 3-column footer widgets */
add_theme_support( 'genesis-footer-widgets', 3 );

/** Unregister secondary sidebar */
unregister_sidebar( 'sidebar-alt' );

/** Unregister all 3 column layout options */
genesis_unregister_layout( 'content-sidebar-sidebar' );
genesis_unregister_layout( 'sidebar-sidebar-content' );
genesis_unregister_layout( 'sidebar-content-sidebar' );

/** Reposition the primary navigation above header */
remove_action( 'genesis_after_header', 'genesis_do_nav' );
add_action( 'genesis_before_header', 'genesis_do_nav' );

/** Unregister secondary navigation menu */
add_theme_support( 'genesis-menus', array( 'primary' => __( 'Primary Navigation Menu', 'genesis' ) ) );

/** Add support for structural wraps */
add_theme_support( 'genesis-structural-wraps', array( 'header', 'nav', 'subnav', 'inner', 'footer-widgets', 'footer' ) );

/** Add the page title section */
add_action( 'genesis_before_content_sidebar_wrap', 'structure_page_title' );
function structure_page_title() {
   genesis_widget_area( 'page-title', array(
       'before' => '<div class="page-title widget-area">',
   ) );
}

/** Register widget areas */
genesis_register_sidebar( array(
	'id'			=> 'page-title',
	'name'			=> __( 'Page Title', 'structure' ),
	'description'	=> __( 'This is the page title section.', 'structure' ),
) );


