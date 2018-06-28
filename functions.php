<?php
require_once('class_wp_bootstrap_navwalker.php');
function enqueue_styles() {

    wp_enqueue_style( 'bootstrap', get_template_directory_uri() . '/css/bootstrap.min.css' );
    wp_enqueue_style( 'core', get_template_directory_uri() . '/style.css' );

}
add_action( 'wp_enqueue_scripts', 'enqueue_styles');
function theme_js () {
    wp_deregister_script('jquery');
    wp_register_script('jquery', 'https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js', false, '3.1.1');
    wp_enqueue_script('jquery');
 
    wp_enqueue_script( 'bootstrapJS', get_template_directory_uri() . '/js/bootstrap.js', array(), '1.0.0', true );
    wp_enqueue_script( 'twitter', get_template_directory_uri() . '/js/twitter.js', array(), '1.0.0', true );
    wp_enqueue_script( 'twitter-helper', get_template_directory_uri() . '/js/twitter-helper.js', array(), '1.0.0', true );
 }
add_action( 'init', 'theme_js' );

function rachweb_register_menus() {
    register_nav_menus(
        array(
            'primary_menu' => __( 'Primary Menu', 'rachweb' ),
            'social_menu' => __( 'Social Menu', 'rachweb' ),
        )
    );
}
add_action( 'init', 'rachweb_register_menus' );

function add_classes_on_li($classes, $item, $args) {
    $classes[] = 'nav-item';
    return $classes;
} 
add_filter('nav_menu_css_class','add_classes_on_li',1,3);

  
function add_classes_on_anchor( $atts, $item, $args ) {
      $class = 'nav-link'; // or something based on $item
      $atts['class'] = $class;
      return $atts;
   }
add_filter( 'nav_menu_link_attributes', 'add_classes_on_anchor', 10, 3 );


function enqueue_load_fa() {
    wp_enqueue_style( 'load-fa', 'https://use.fontawesome.com/releases/v5.1.0/css/all.css' );
}
add_action( 'wp_enqueue_scripts', 'enqueue_load_fa' );

?>