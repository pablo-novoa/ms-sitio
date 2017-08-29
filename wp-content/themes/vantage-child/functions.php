<?php
/**
 * AUTOLOADER
 */
spl_autoload_register(function ($className) {
    $fullpath = dirname(__file__).'/'.str_replace('\\', '/', $className).'.php';
    if(file_exists($fullpath)) require_once($fullpath);
});


// init widgets
$widgetsMS = new Widgets\Init();
$widgetsMS->register();

// enqueues
add_action( 'wp_enqueue_scripts', 'ms_enqueue_styles' );
function ms_enqueue_styles() {
    wp_enqueue_style( 'parent-style', get_template_directory_uri() . '/style.css' );
}

//svg format to media library
add_filter('upload_mimes', 'cc_mime_types');
if (!function_exists('cc_mime_types')) {
function cc_mime_types($mimes) {
  $mimes['svg'] = 'image/svg+xml';
  return $mimes;
}}

// Theme custom settings
add_action('customize_register', 'ms_theme_settings');
function ms_theme_settings($wp_customize){
   //Redes
  $wp_customize->add_section('ms_social_settings', array(
    'title'          => 'MS - Redes Sociales'
   ));
  $wp_customize->add_setting('facebook_setting', array(
   'default'        => '',
   ));
  $wp_customize->add_control('facebook_setting', array(
   'label'   => 'Facebook',
   'section' => 'ms_social_settings',
   'type'    => 'url',
  ));
  $wp_customize->add_setting('instagram_setting', array(
   'default'        => '',
   ));
  

}