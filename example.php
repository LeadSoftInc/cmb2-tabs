<?php
/*
 * Example metabox
 */
add_filter( 'cmb2_init', 'cmbt_example_metaboxes' );
function cmbt_example_metaboxes() {
	$box_options = array(
		'id'           => 'example_tabs_metaboxes',
		'title'        => __( 'Example tabs', 'cmb2' ),
		'object_types' => array( 'page' ),
		'show_names'   => true,
	);

	// Setup meta box
	$cmb = new_cmb2_box( $box_options );

	// Setting tabs
	$tabs_setting           = array(
		'config' => $box_options,
		// 'layout' => 'vertical', // Default : horizontal
		'tabs'   => array()
	);
	$tabs_setting['tabs'][] = array(
		'id'     => 'tab1',
		'title'  => __( 'Tab 1', 'cmb2' ),
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
		'id'     => 'tab2',
		'title'  => __( 'Tab 2', 'cmb2' ),
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

	// Set tabs
	$cmb->add_field( array(
		'id'   => '__tabs',
		'type' => 'tabs',
		'tabs' => $tabs_setting
	) );
}

/*
 * Example options page
 */
add_action( 'cmb2_admin_init', 'cmbt_example_options_page_metabox' );
function cmbt_example_options_page_metabox() {
	$box_options = array(
		'id'          => 'myprefix_option_metabox',
		'title'       => __( 'Example tabs', 'cmb2' ),
		'show_names'  => true,
		'object_type' => 'options-page',
		'show_on'     => array(
			// These are important, don't remove
			'key'   => 'options-page',
			'value' => array( 'myprefix_options' )
		),
	);

	// Setup meta box
	$cmb = new_cmb2_box( $box_options );

	// setting tabs
	$tabs_setting = array(
		'config' => $box_options,
		//		'layout' => 'vertical', // Default : horizontal
		'tabs'   => array()
	);

	$tabs_setting['tabs'][] = array(
		'id'     => 'tab1',
		'title'  => __( 'Tab 1', 'cmb2' ),
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
		'id'     => 'tab2',
		'title'  => __( 'Tab 2', 'cmb2' ),
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

	$cmb->add_field( array(
		'id'   => '__tabs',
		'type' => 'tabs',
		'tabs' => $tabs_setting
	) );
}