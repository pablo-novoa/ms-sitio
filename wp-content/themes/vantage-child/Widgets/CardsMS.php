<?php  

namespace Widgets;

use WP_Widget;


class CardsMS extends WP_Widget {

	/**
	 * Sets up the widgets name etc
	 */
	public function __construct() {
		$widget_ops = array( 
			'classname' => 'CardsMS',
			'description' => 'Diseño de cartas, Montevideo Software',
		);
		parent::__construct( 'CardsMS', 'MS - Cards', $widget_ops );
	}

	/**
	 * Outputs the content of the widget
	 *
	 * @param array $args
	 * @param array $instance
	 */
	public function widget( $args, $instance ) {
		echo $args['before_widget'];
		// $instance['title'] $instance['desc'] $instance['image']
	?>
	<?php if(!empty($instance['image'])): ?>
		<div class="CardsMS_imgWrapp">
			<img src="<?= $instance['image'] ?>" >
		</div> 
	<?php endif; ?> 
		<div class="CardsMS_textWrapp">
			<h3><?= $instance['title'] ?></h3>
			<div><?= $instance['desc'] ?></div>
		</div>
	<?php
		echo $args['after_widget'];
	}

	/**
	 * Outputs the options form on admin
	 *
	 * @param array $instance The widget options
	 */
	public function form( $instance ) {
		$title = ! empty( $instance['title'] ) ? $instance['title'] : '';
		$desc = ! empty( $instance['desc'] ) ? $instance['desc'] : '';
		$image = ! empty( $instance['image'] ) ? $instance['image'] : '';

?>
		<p>
			<label for="<?php echo esc_attr( $this->get_field_id( 'title' ) ); ?>"><?php esc_attr_e( 'Title:', 'text_domain' ); ?></label> 
			<input class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'title' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'title' ) ); ?>" type="text" value="<?php echo esc_attr( $title ); ?>">
		</p>
		<p>
			<label for="<?php echo esc_attr( $this->get_field_id( 'desc' ) ); ?>"><?php esc_attr_e( 'Descripción:', 'text_domain' ); ?></label> 
			
			<textarea 
			  class="widefat" 
			  id="<?php echo esc_attr( $this->get_field_id( 'desc' ) ); ?>" 
			  name="<?php echo esc_attr( $this->get_field_name( 'desc' ) ); ?>"
			  		><?php echo esc_attr( $desc ); ?></textarea>
		</p>
		<p>
			<label for="<?php echo $this->get_field_id( 'image' ); ?>"><?php _e( 'imagen:' ); ?></label>
			<input class="widefat" id="<?php echo $this->get_field_id( 'image' ); ?>" name="<?php echo $this->get_field_name( 'image' ); ?>" type="text" value="<?php echo esc_url( $image ); ?>" />
			<button class="upload_image_button button button-primary">Seleccionar</button>
		</p>
<?php 
	}

	/**
	 * Processing widget options on save
	 *
	 * @param array $new_instance The new options
	 * @param array $old_instance The previous options
	 *
	 * @return array
	 */
	public function update( $new_instance, $old_instance ) {
		$instance = array();
		$instance['title'] = ( ! empty( $new_instance['title'] ) ) ? strip_tags( $new_instance['title'] ) : '';
		$instance['desc'] = ( ! empty( $new_instance['desc'] ) ) ? strip_tags( $new_instance['desc'] ) : '';
		$instance['image'] = ( ! empty( $new_instance['image'] ) ) ? $new_instance['image'] : '';

		return $instance;
	}
}