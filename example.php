<?php

add_filter( 'cmb2_init', 'example_tabs_metaboxes' );

function example_tabs_metaboxes() {
	$box_options = array(
		'id'           => 'example_tabs_metaboxes',
		'title'        => __( 'Example tabs', 'cmb2' ),
		'object_types' => array( 'page' ),
		'show_names'   => true,
	);

	// Setup meta box
	$cmb = new_cmb2_box( $box_options );

	// setting tabs
	$tabs_setting           = array(
		'args' => $box_options,
		'tabs' => array()
	);
	$tabs_setting['tabs'][] = array(
		'id'     => 'header',
		'title'  => __( 'Header', 'cmb2' ),
		'fields' => array(
			array(
				'name' => __( 'Title', 'cmb2' ),
				'id'   => 'header_title',
				'type' => 'text'
			),
			array(
				'name' => __( 'Subtitle', 'cmb2' ),
				'id'   => 'header_subtitle',
				'type' => 'text'
			),
			array(
				'name'    => __( 'Background image', 'cmb2' ),
				'id'      => 'header_background',
				'type'    => 'file',
				'options' => array(
					'url' => false
				)
			)
		)
	);
	$tabs_setting['tabs'][] = array(
		'id'     => 'platforms',
		'title'  => __( 'Platforms', 'cmb2' ),
		'fields' => array(
			array(
				'name' => __( 'Title', 'cmb2' ),
				'id'   => 'platforms_title',
				'type' => 'text'
			),
			array(
				'name' => __( 'Subtitle', 'cmb2' ),
				'id'   => 'platforms_subtitle',
				'type' => 'text'
			),
			array(
				'id'      => 'platforms',
				'type'    => 'group',
				'options' => array(
					'group_title'   => __( 'Platform {#}', 'cmb2' ),
					'add_button'    => __( 'Add platform', 'cmb2' ),
					'remove_button' => __( 'Remove platform', 'cmb2' ),
					'sortable'      => false
				),
				'fields'  => array(
					array(
						'name' => __( 'Title', 'cmb2' ),
						'id'   => 'title',
						'type' => 'text'
					),
					array(
						'name' => __( 'Description', 'cmb2' ),
						'id'   => 'description',
						'type' => 'textarea'
					),
					array(
						'name'       => __( 'Link', 'cmb2' ),
						'id'         => 'link',
						'type'       => 'text_url',
						'attributes' => array(
							'placeholder' => 'http://'
						)
					),
					array(
						'name'    => __( 'Background image', 'cmb2' ),
						'id'      => 'background',
						'type'    => 'file',
						'options' => array(
							'url' => false
						)
					)
				)
			)
		)
	);
	$tabs_setting['tabs'][] = array(
		'id'     => 'reviews',
		'title'  => __( 'Reviews', 'cmb2' ),
		'fields' => array(
			array(
				'name' => __( 'Title', 'cmb2' ),
				'id'   => 'review_title',
				'type' => 'text'
			),
			array(
				'name' => __( 'Subtitle', 'cmb2' ),
				'id'   => 'review_subtitle',
				'type' => 'text'
			),
			array(
				'id'      => 'reviews',
				'type'    => 'group',
				'options' => array(
					'group_title'   => __( 'Review {#}', 'cmb2' ),
					'add_button'    => __( 'Add review', 'cmb2' ),
					'remove_button' => __( 'Remove review', 'cmb2' ),
					'sortable'      => false
				),
				'fields'  => array(
					array(
						'name' => __( 'Author name', 'cmb2' ),
						'id'   => 'name',
						'type' => 'text'
					),
					array(
						'name'    => __( 'Author avatar', 'cmb2' ),
						'id'      => 'avatar',
						'type'    => 'file',
						'options' => array(
							'url' => false
						)
					),
					array(
						'name' => __( 'Comment', 'cmb2' ),
						'id'   => 'comment',
						'type' => 'textarea'
					)
				)
			)
		)
	);

	// set tabs
	$cmb->add_field( array(
		'id'   => 'tabs__',
		'type' => 'tabs',
		'tabs' => $tabs_setting
	) );
}