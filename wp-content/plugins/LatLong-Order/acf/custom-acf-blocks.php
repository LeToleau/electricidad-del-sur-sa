<?php

/** 
  *  Register ACF Gutenberg Block
	*/
if (function_exists('acf_register_block_type')) {
	add_action('acf/init', 'register_acf_block_types');
}

function register_acf_block_types() {
	acf_register_block_type(
		array(
			'name' => 'hero-primary',
			'title' => __('Hero Primary'),
			'description' => __('A Hero block with call to action button'),
			'render_template' => 'template-parts/blocks/hero-primary/hero-primary.php',
			'icon' => 'id-alt',
			'keywords' => array('hero', 'home'),
		)
	);

	acf_register_block_type(
		array(
			'name' => 'hero-secondary',
			'title' => __('Hero Secondary'),
			'description' => __('A hero block without call to action functionality'),
			'render_template' => 'template-parts/blocks/hero-secondary/hero-secondary.php',
			'icon' => 'id',
			'keywords' => array('hero', 'home'),
		)
	);

	acf_register_block_type(
		array(
			'name' => 'bordered-box',
			'title' => __('Bordered Box'),
			'description' => __('A custom bordered box block'),
			'render_template' => 'template-parts/blocks/bordered-box/bordered-box.php',
			'icon' => 'welcome-widgets-menus',
			'keywords' => array('box', 'square', 'bordered')
		)
	);

	acf_register_block_type(
		array(
			'name' => 'big-bordered-box',
			'title' => __('Big Bordered Box'),
			'description' => __('A full width bordered box'),
			'render_template' => 'template-parts/blocks/big-bordered-box/big-bordered-box.php',
			'icon' => 'welcome-widgets-menus',
			'keywords' => array('big', 'bordered', 'box')
		)
	);

	acf_register_block_type(
		array(
			'name' => 'font-awesome',
			'title' => __('Icons'),
			'description' => __('A custom icons block from Font Awesome'),
			'render_template' => 'template-parts/blocks/font-awesome/font-awesome.php',
			'icon' => 'editor-paste-text',
			'keywords' => array('icon'),
		)
	);

	acf_register_block_type(
		array(
			'name' => 'upcoming-events',
			'title' => __('Upcoming Events'),
			'description' => __('A block that displays the Upcoming Events'),
			'render_template' => 'template-parts/blocks/upcoming-event/upcoming-event.php',
			'icon' => 'calendar-alt',
			'keywords' => array('upcoming', 'event'),
			'supports' => [
				'align'			=> false,
				'anchor'		=> true,
				'customClassName'	=> true,
			]
		)
	);

	acf_register_block_type(
		array(
			'name' => 'recurring-events',
			'title' => __('Recurring Events'),
			'description' => __('A block that displays the Recurring Events'),
			'render_template' => 'template-parts/blocks/recurring-event/recurring-event.php',
			'icon' => 'calendar',
			'keywords' => array('recurring', 'event'),
			'supports' => [
				'align'			=> false,
				'anchor'		=> true,
				'customClassName'	=> true,
			]
		)
	);

	acf_register_block_type(
		array(
			'name' => 'event-info',
			'title' => __('Event Video Information'),
			'description' => __('A block that displays the Event video window and information.'),
			'render_template' => 'template-parts/blocks/event-info/event-info.php',
			'icon' => 'format-video',
			'keywords' => array('event', 'information', 'register', 'link'),
			'supports' => [
				'align'			=> false
			]
		)
	);

	acf_register_block_type(
		array(
			'name' => 'breadcrumbs',
			'title' => __('Breadcrumbs'),
			'description' => __('A block that displays a Breadcrumbs component'),
			'render_template' => 'template-parts/blocks/breadcrumbs/breadcrumbs.php',
			'icon' => 'arrow-right-alt2',
			'keywords' => array('breadcrumb'),
			'supports' => [
				'align'			=> false,
				'anchor'		=> true,
				'customClassName'	=> true,
			]
		)
	);

	acf_register_block_type(
		array(
			'name' => 'featured-resources',
			'title' => __('Featured Resources'),
			'description' => __('A block that displays the latest available Resources'),
			'render_template' => 'template-parts/blocks/featured-resources/featured-resources.php',
			'icon' => 'list-view',
			'keywords' => array('resource', 'feature'),
			'supports' => [
				'align'			=> false,
				'anchor'		=> true,
				'customClassName'	=> true,
			]
		)
	);

	acf_register_block_type(
		array(
			'name' => 'contact-mentor',
			'title' => __('Contact Mentor'),
			'description' => __('A block that allows you to connect with your Mentor or request one.'),
			'render_template' => 'template-parts/blocks/contact-mentor/contact-mentor.php',
			'icon' => 'welcome-learn-more',
			'keywords' => array('mentor', 'contact', 'message', 'request'),
			'supports' => [
				'customClassName'	=> true,
			]
		)
	);
}
