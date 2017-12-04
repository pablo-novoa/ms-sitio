<?php

spl_autoload_register(function ($className) {
    $fullpath = dirname(__file__).'/'.str_replace('\\', '/', $className).'.php';
    if(file_exists($fullpath)) require_once($fullpath);
});


$widgetsMS = new Widgets\Init();
$widgetsMS->register();


add_action( 'wp_enqueue_scripts', 'ms_enqueue_styles' );
function ms_enqueue_styles() {
    wp_enqueue_style( 'parent-style', get_template_directory_uri() . '/style.css' );
}


add_filter('upload_mimes', 'cc_mime_types');
if (!function_exists('cc_mime_types')) {
function cc_mime_types($mimes) {
  $mimes['svg'] = 'image/svg+xml';
  return $mimes;
}}


add_action('customize_register', 'ms_theme_settings');
function ms_theme_settings($wp_customize){
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



function google_analytics_tracking_code(){


?>
    <script async src="https://www.googletagmanager.com/gtag/js?id=UA-107312629-1"></script>
    <script>
      window.dataLayer = window.dataLayer || [];
      function gtag(){dataLayer.push(arguments);}
      gtag('js', new Date());

      gtag('config', 'UA-107312629-1');
    </script>

<?php 
  
}

add_action('wp_footer', 'google_analytics_tracking_code');
