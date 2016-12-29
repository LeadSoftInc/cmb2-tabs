<?php
/*
Plugin Name: CMB2 Tabs
Plugin URI: https://github.com/dThemeStudio/cmb2-tabs
Version: 1.2.2
Author: dTheme Studio
Author URI: http://dtheme.studio/
*/

namespace cmb2_tabs;

if ( is_admin() ) {
	// run autoloader
	include __DIR__ . '/autoloader.php';

	// connection css and js
	new inc\Assets();

	// run global class
	new inc\CMB2_Tabs();
}

// include __DIR__ . '/example.php';