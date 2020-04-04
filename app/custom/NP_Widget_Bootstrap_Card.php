<?php

class NP_Widget_Bootstrap_Card extends WP_Widget
{

	function __construct()
	{

		parent::__construct(
			'np-widget-bootstrap-card',  // Base ID
			__('Bootsrap Card', 'sage')   // Name
		);

		add_action('widgets_init', function () {
			register_widget('NP_Widget_Bootstrap_Card');
		});

		// add_action('plugins_loaded', function () {
		// 	load_plugin_textdomain('sage', false, get_template_directory() . '/lang');
		// });
	}

	public function widget($args, $instance)
	{
		$card_class = !empty($instance['card_class']) ? esc_attr($instance['card_class']) : '';
		$title = !empty($instance['title']) ? apply_filters('widget_title', $instance['title']) : '';
		$text = !empty($instance['text']) ? nl2br(esc_html__($instance['text'], 'text_domain')) : '';
		$btn_href = !empty($instance['btn_href']) ? esc_attr($instance['btn_href']) : '';
		$btn_class = !empty($instance['btn_class']) ? esc_attr($instance['btn_class']) : '';
		$btn_text = !empty($instance['btn_text']) ? esc_html__($instance['btn_text'], 'text_domain') : '';
		?>

		<?php echo $args['before_widget']; ?>
			<div class="card <?php echo $card_class; ?>">
				<div class="card-body">
					<?php if (!empty($title)) : ?>
						<?php echo $args['before_title'] . $title . $args['after_title']; ?>
					<?php endif; ?>
					<p class="card-text"><?php echo $text; ?></p>
					<a href="<?php echo $btn_href; ?>" class="btn <?php echo $btn_class; ?>">
						<?php echo $btn_text; ?> <i class="fas fa-angle-double-right"></i>
					</a>
				</div>
			</div>
		<?php echo $args['after_widget']; ?>

		<?php
	}

	public function form($instance)
	{

		$card_class = !empty($instance['card_class']) ? $instance['card_class'] : '';
		$title = !empty($instance['title']) ? $instance['title'] : '';
		$text = !empty($instance['text']) ? $instance['text'] : '';
		$btn_href = !empty($instance['btn_href']) ? $instance['btn_href'] : '';
		$btn_class = !empty($instance['btn_class']) ? $instance['btn_class'] : '';
		$btn_text = !empty($instance['btn_text']) ? $instance['btn_text'] : '';

		?>
		<p>
			<label for="<?php echo esc_attr($this->get_field_id('card_class')); ?>">
				<?php echo esc_html__('Card CSS class:', 'sage'); ?>
			</label>
			<input class="widefat" 
				id="<?php echo esc_attr($this->get_field_id('card_class')); ?>" 
				name="<?php echo esc_attr($this->get_field_name('card_class')); ?>" 
				type="text" 
				value="<?php echo esc_attr($card_class); ?>">
		</p>
		<p>
			<label for="<?php echo esc_attr($this->get_field_id('title')); ?>"><?php echo esc_html__('Title:', 'sage'); ?></label>
			<input class="widefat" id="<?php echo esc_attr($this->get_field_id('title')); ?>" name="<?php echo esc_attr($this->get_field_name('title')); ?>" type="text" value="<?php echo esc_attr($title); ?>">
		</p>
		<p>
			<label for="<?php echo esc_attr($this->get_field_id('Text')); ?>"><?php echo esc_html__('Text:', 'sage'); ?></label>
			<textarea class="widefat" id="<?php echo esc_attr($this->get_field_id('text')); ?>" name="<?php echo esc_attr($this->get_field_name('text')); ?>" type="text" cols="30" rows="10"><?php echo esc_attr($text); ?></textarea>
		</p>
		<p>
			<label for="<?php echo esc_attr($this->get_field_id('btn_href')); ?>">
				<?php echo esc_html__('Button URL:', 'sage'); ?>
			</label>
			<input class="widefat" 
				id="<?php echo esc_attr($this->get_field_id('btn_href')); ?>" 
				name="<?php echo esc_attr($this->get_field_name('btn_href')); ?>" 
				type="text" 
				value="<?php echo esc_attr($btn_href); ?>">
		</p>
		<p>
			<label for="<?php echo esc_attr($this->get_field_id('btn_class')); ?>">
				<?php echo esc_html__('Button CSS class:', 'sage'); ?>
			</label>
			<input class="widefat" 
				id="<?php echo esc_attr($this->get_field_id('btn_class')); ?>" 
				name="<?php echo esc_attr($this->get_field_name('btn_class')); ?>" 
				type="text" 
				value="<?php echo esc_attr($btn_class); ?>">
		</p>
		<p>
			<label for="<?php echo esc_attr($this->get_field_id('btn_text')); ?>">
				<?php echo esc_html__('Button text:', 'sage'); ?>
			</label>
			<input class="widefat" 
				id="<?php echo esc_attr($this->get_field_id('btn_text')); ?>" 
				name="<?php echo esc_attr($this->get_field_name('btn_text')); ?>" 
				type="text" 
				value="<?php echo esc_attr($btn_text); ?>">
		</p>
		<?php

	}

	public function update($new_instance, $old_instance)
	{

		$instance = array();

		$instance['card_class'] = (!empty($new_instance['card_class'])) ? strip_tags($new_instance['card_class']) : '';
		$instance['title'] = (!empty($new_instance['title'])) ? strip_tags($new_instance['title']) : '';
		$instance['text'] = (!empty($new_instance['text'])) ? $new_instance['text'] : '';
		$instance['btn_href'] = (!empty($new_instance['btn_href'])) ? strip_tags($new_instance['btn_href']) : '';
		$instance['btn_class'] = (!empty($new_instance['btn_class'])) ? strip_tags($new_instance['btn_class']) : '';
		$instance['btn_text'] = (!empty($new_instance['btn_text'])) ? strip_tags($new_instance['btn_text']) : '';

		return $instance;
	}
}
$np_widget_bootstrap_card = new NP_Widget_Bootstrap_Card();