<?php

namespace cmb2_tabs\inc;

class Assets {

	public function __construct() {
		add_action( 'admin_enqueue_scripts', array( $this, 'admin_assets' ) );
	}


	public function admin_assets() {
		// Css
		wp_enqueue_style( 'dtheme-cmb2-tabs', plugin_dir_url( __DIR__ ) . '/assets/css/cmb2-tabs.css', array(), '1.0.1' );

		// Js
		wp_enqueue_script( 'jquery-ui' );
		wp_enqueue_script( 'dtheme-cmb2-tabs', plugin_dir_url( __DIR__ ) . '/assets/js/cmb2-tabs.js', array( 'jquery-ui-tabs' ) );
	}

}