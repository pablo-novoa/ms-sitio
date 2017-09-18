<?php 

namespace Widgets;
use WP_Hook;


class Init
{
	
	public function __construct() {
		add_action('admin_enqueue_scripts', array($this, 'scripts'));
	}

	public function register(){
		add_action( 'widgets_init', function(){
			register_widget( 'Widgets\\CardsMS' );
		});
	}

	public function scripts()
	{
	   wp_enqueue_script( 'media-upload' );
	   wp_enqueue_media();
	   wp_enqueue_script('ms_admin', get_theme_file_uri() . '/js/ms_admin.js', array('jquery'));
	}
}