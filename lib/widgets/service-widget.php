<?php

class Service_Widget extends WP_Widget {
	public function __construct() {
		parent::__construct(
			'a_service', 
			'A Service',
			array(
				'description' => 'A service you provide',
				"classname" => "a-service-widget",	
			) // Args
		);
	}

	public function form( $instance ) { ?>
		<p>
			<label for="<?= $this->get_field_id( 'icon' ); ?>">Icon:</label> 
			<select name="<?= $this->get_field_name( 'icon' ); ?>" class="widefat">
				<option>icon-wordpress</option>
				<option>icon-doc-text</option>
				<option>icon-mobile</option>
				<option>icon-chart-pie-1</option>
			</select>
			
			<script>jQuery('select[name="<?= $this->get_field_name( 'icon' ); ?>"]').val('<?= $instance['icon'] ?>');</script>
		</p>
		
		<p>
			<label for="<?= $this->get_field_id( 'title' ); ?>">Title:</label> 
			<input type="text" name="<?= $this->get_field_name( 'title' ); ?>" value="<?= esc_attr( $instance['title'] ); ?>" class="widefat">
		</p>
		
		<p>
			<label for="<?= $this->get_field_id( 'paragraph' ); ?>">Paragraph:</label> 
			<textarea name="<?= $this->get_field_name( 'paragraph' ); ?>" class="widefat"><?=  $instance['paragraph'] ?></textarea>
		</p><?php
	}
	
	public function widget( $args, $instance ) { 
		echo $args['before_widget'];
		
			echo '<span class="'. $instance['icon'] .'"></span>';
					
			if ( ! ($instance['title'] == '') ) {
				echo $args['before_title'] . apply_filters( 'widget_title', $instance['title'] ). $args['after_title'];
			}
			
			echo $instance['paragraph'];
		
		echo $args['after_widget'];
	}

	public function update( $new, $old ) {
		$input = $old;
		
		foreach ($new as $name => $value) {$input[$name] = $value;}
	
		return $input;
	}
}


add_action("widgets_init", create_function("", 'return register_widget("Service_Widget");'));

