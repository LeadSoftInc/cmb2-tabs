<?php
/*
Plugin Name: Tabs for CMB2
Plugin URI: https://github.com/LeadSoftInc/cmb2-tabs
Description: Extensions the tabs to the library CMB2
Version: 2.0.0
Author: LeadSoft Inc.
Author URI: http://leadsoft.org/
*/

// Autoload
$loader = require __DIR__ . '/vendor/autoload.php';

// Run plugin
add_action( 'plugins_loaded', function() {
	new CMB2_Tabs\CMB2_Tabs();
} );