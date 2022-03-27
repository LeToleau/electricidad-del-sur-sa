<?php 

function ll_create_custom_post_types() {

    // Messages
    register_post_type('message',
        [
            'labels' => [
                'name' => 'Messages',
                'singular_name' => 'Message'
            ],
            'public' => true,
            'show_in_rest' => true,
            'show_in_graphql' => true,
            'hierarchical' => true,
            'graphql_single_name' => 'message',
            'graphql_plural_name' => 'messages',
            'supports' => ['title', 'editor', 'author'],
            'menu_icon' => 'dashicons-email-alt',
            'capability_type' => ['message','messages'],
        ]
	);

    // Events
    register_post_type('events',
        [
            'labels' => [
                'name' => __( 'Events' ),
                'singular_name' => __( 'Event' )
            ],
            'public' => true,
            'show_in_rest' => true,
            'show_in_graphql' => true,
            'graphql_single_name' => 'Event',
            'graphql_plural_name' => 'Events',
            'supports' => [ 'thumbnail', 'title', 'editor', 'excerpt'],
            'menu_icon' => 'dashicons-calendar-alt',
            'taxonomies' => [ 'tracks', 'dificulty', 'resource-type' ],
            'template' => [
                [
                    'core/paragraph', 
                    [
                        'content' => 'Event description goes here.'
                    ], 
                    []
                ],
                [
                    'acf/event-info', 
                    [],
                    []
                ]
            ]
        ]
    );
}

add_action('init', 'll_create_custom_post_types');