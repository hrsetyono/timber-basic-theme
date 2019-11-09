<?php

// Check if Timber is installed
if( class_exists( 'Timber' ) && !class_exists( 'MyTimber' ) ):

/**
 * TIMBER Global setting
 */
class MyTimber extends TimberSite {

  function __construct() {
    add_filter( 'timber_context', [$this, 'add_to_context'] );
    add_filter( 'get_twig', [$this, 'add_to_twig'] );
    parent::__construct();
  }

  /**
   * GLOBAL context. The values here are accessible in all rendered template
   * @filter timber_context
   */
  function add_to_context( array $context ) : array {
    $context['nav'] = new TimberMenu( 'main-nav' );
    $context['site'] = $this;
    $context['home_url'] = home_url();

    $root = get_template_directory_uri();
    $context['images'] = $root.'/images';

    return $context;
  }

  /**
   * Add custom filter for Twig
   * @filter get_twig
   */
  function add_to_twig( $twig ) {
    $twig->addExtension( new Twig_Extension_StringLoader() );
    $twig->addFilter( new Twig_SimpleFilter( 'example', [$this, 'filter_example'] ) );

    return $twig;
  }

  /**
   * Example of custom filter
   *  {{ post.content | example( $name ) }}
   */
  function filter_example( string $post_content, string $name ) : string {
    return "<h1>$name</h1> $post_content";
  }
}


new MyTimber();

endif;