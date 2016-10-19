<?php

class Featured_Posts extends WP_Widget {
	public function __construct() {
		parent::__construct(
			'featured_posts', 
			'Featured Posts',
			array(
				'description' => 'Posts Widget',
				"classname" => "featured-posts-widget",	
			) // Args
		);
	}

	public function form( $instance ) { 
		$post_categories = get_terms('category'); ?>
		<p>
			<label for="<?= $this->get_field_id( 'title' ); ?>">Title:</label> 
			<input type="text" name="<?= $this->get_field_name( 'title' ); ?>" value="<?= esc_attr( $instance['title'] ); ?>" class="widefat">
		</p>
		
		<p>
			<label for="<?= $this->get_field_id( 'number_of_posts' ); ?>">Number Of Posts:</label> 
			<input type="number" name="<?= $this->get_field_name( 'number_of_posts' ); ?>" value="<?= esc_attr( $instance['number_of_posts'] ); ?>" class="widefat">
		</p>
	
		<p>
			<label for="<?= $this->get_field_id( 'post_date' ); ?>">Post Published Date</label> 
			<select name="<?= $this->get_field_name( 'post_date' ); ?>" class="widefat">
				<?php 
					foreach (array(
						'Show' => 'true',
						'Hide' => 'False',
					) as $label => $value) {
						echo '<option value="'. $value .'"'. selected($value, $instance['post_date']) .'>'. $label .'</option>';
					}
				?>
			</select>
		</p>
	
		<p>
			<label for="<?= $this->get_field_id( 'category' ); ?>">Category:</label> 
			<select name="<?= $this->get_field_name( 'category' ); ?>" class="widefat">
				<?php foreach ($post_categories as $p_cat) { ?>
					<option value="<?= $p_cat->term_id ?>" <?= selected($p_cat->term_id, $instance['category']) ?>><?= $p_cat->name ?></option>
				<?php } ?>			
			</select>
		</p>
		
		<?php
	}
	
	public function widget( $args, $instance ) { 
		$posts_agr=array(
			'post_type' => 'post',
			'posts_per_page' => $instance['number_of_posts'],
			'category' => $instance['category'],
		);
		
		$get_posts=get_posts($posts_agr);
	
		echo $args['before_widget']; 
				
		if ( ! ($instance['title'] == '') ) {
			echo $args['before_title'] . apply_filters( 'widget_title', $instance['title'] ). $args['after_title'];
		} 
		ob_start();
		?>
			<ul>
				<?php foreach ($get_posts as $g_post) { 
					if (! (get_post_field('post_excerpt', $g_post->ID) == '')) {
						$description=get_post_field('post_excerpt', $g_post->ID);
					}
					elseif (! ($g_post->post_content == '')) {
						$array_post_content=explode(". ", sanitize_text_field(strip_shortcodes($g_post->post_content)));
						$description=$array_post_content[0];
					} ?> 
					<li>
						<h5><?= $g_post->post_title ?></h5>
						<?php if ($instance['post_date'] == 'true') { ?><small class="post-date"><?= get_the_date('F j, Y', $g_post->ID); ?></small><?php } ?>
						
						<p><?= $description ?> <a href="<?= get_permalink($g_post->ID) ?>" class="read-more-link">Read More</a></p>
					</li>
				<?php } ?>
			</ul><?php
		echo ob_get_clean();	
			
		echo $args['after_widget'];
	}

	public function update( $new, $old ) {
		$input = $old;
		
		foreach ($new as $name => $value) {$input[$name] = $value;}
	
		return $input;
	}
}


add_action("widgets_init", create_function("", 'return register_widget("Featured_Posts");'));

