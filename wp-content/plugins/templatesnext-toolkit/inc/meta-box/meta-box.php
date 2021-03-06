<?php
/*
Plugin Name: Meta Box
Plugin URI: http://www.deluxeblogtips.com/meta-box
Description: Create meta box for editing pages in WordPress. Compatible with custom post types since WP 3.0
Version: 4.3.11
Author: Rilwis
Author URI: http://www.deluxeblogtips.com
License: GPL2+
*/

if ( !class_exists( 'RW_Meta_Box' ) ) {

// Prevent loading this file directly
defined( 'ABSPATH' ) || exit;

// Script version, used to add version for scripts and styles
define( 'TX_RWMB_VER', '4.3.11' );

// Define plugin URLs, for fast enqueuing scripts and styles
if ( ! defined( 'RWMB_URL' ) )
	define( 'RWMB_URL', plugin_dir_url( __FILE__ ) );
define( 'TX_RWMB_JS_URL', trailingslashit( RWMB_URL . 'js' ) );
define( 'TX_RWMB_CSS_URL', trailingslashit( RWMB_URL . 'css' ) );
// Plugin paths, for including files
if ( ! defined( 'RWMB_DIR' ) )
	define( 'RWMB_DIR', plugin_dir_path( __FILE__ ) );
define( 'TX_RWMB_INC_DIR', trailingslashit( RWMB_DIR . 'inc' ) );
define( 'TX_RWMB_FIELDS_DIR', trailingslashit( TX_RWMB_INC_DIR . 'fields' ) );

// Optimize code for loading plugin files ONLY on admin side
// @see http://www.deluxeblogtips.com/?p=345

// Helper function to retrieve meta value
require_once TX_RWMB_INC_DIR . 'helpers.php';

if ( is_admin() )
{
	require_once TX_RWMB_INC_DIR . 'common.php';
	require_once TX_RWMB_INC_DIR . 'field.php';

	// Field classes
	foreach ( glob( TX_RWMB_FIELDS_DIR . '*.php' ) as $file )
	{
		require_once $file;
	}

	// Main file
	require_once TX_RWMB_INC_DIR . 'meta-box.php';
	require_once TX_RWMB_INC_DIR . 'init.php';
}

}