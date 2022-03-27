<?php 

function ll_create_taxonomies() {
	// Category
	register_taxonomy(
		'resource-type',
		'resource-type',
		[
			'labels' => [
                'name' => __( 'Resource Types' ),
                'plural' => __( 'Resource Types' ),
            ],
        	'hierarchical' => true,
            'show_in_rest' => true,
            'show_in_graphql' => true,
            'graphql_single_name' => 'resourceType',
            'graphql_plural_name' => 'resourceTypes',
        ]
	);
}

add_action( 'init', 'll_create_taxonomies' );
