<?php

// Load project files
spl_autoload_register( function( $class ) {
	$file = strtolower( str_replace( '_', '-', $class ) );
	$file = dirname( __DIR__ ) . '/' . str_replace( '\\', '/', $file ) . '.class.php';

	if ( file_exists( $file ) ) {
		include $file;
	}
} );