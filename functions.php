<?php
require_once 'codes/timber.php'; // Set global variable and custom filter here

add_action( 'wp_enqueue_scripts', 'my_enqueue_assets', 100 );
add_action( 'after_setup_theme', 'my_theme_support' );


/**
 * Add theme support
 * @action after_setup_theme
 */
function my_theme_support() {
  add_theme_support( 'post-thumbnails' );
  add_theme_support( 'menus' );
  add_theme_support( 'custom-logo' );
  add_theme_support( 'title_tag' );
  add_theme_support( 'html5', ['search-form', 'comment-form', 'gallery', 'caption'] );
  add_theme_support( 'automatic-feed-links' );
  add_post_type_support( 'page', 'excerpt' ); // allow page to have excerpt
  
  // Gutenberg support
  add_theme_support( 'align-wide' );
  add_theme_support( 'responsive-embeds' );

  // Create Nav assignment
  register_nav_menu( 'main-nav', 'Main Nav' );
}


/**
 * Enqueue front-end CSS and JS
 * @action wp_enqueue_scripts 100
 */
function my_enqueue_assets() {
  $js_dir = get_stylesheet_directory_uri() . '/js';

  // Stylesheet
  wp_enqueue_style( 'my-style', get_stylesheet_uri() );

  // Javascript
  wp_enqueue_script( 'my-script', $js_dir . '/my-script.js', ['jquery'], null, true );
}
