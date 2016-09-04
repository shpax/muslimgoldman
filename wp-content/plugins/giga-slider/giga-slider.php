<?php
/*
 * Plugin Name: GIGA Slider
 * Description: Responsive Slider for your wordpress blog
 * Author: wp-buy
 * Author URI: https://www.wp-buy.com/
 * Version: 1.0.0.8
 * License: GPL2
*/



define('RCS_DS', DIRECTORY_SEPARATOR);
define('RCS_PLUGIN_ROOT_DIR', dirname(__FILE__));
define('RCS_PLUGIN_MAIN_FILE', __FILE__);
define('RCS_PLUGIN_DIR_URL', plugin_dir_url( __FILE__));
define('RCS_INSERTJS', plugin_dir_url( __FILE__).'js');


require_once("rcs_options.php");
require_once("functions.php");
require_once("attachment.php");
require_once("widget.php");

if(isset($_GET['rcspageid']) && 'rcs_slider' == $_GET['rcspageid']){
	add_action('template_redirect', 'rcs_render_preview_slider');
}

register_activation_hook(RCS_PLUGIN_MAIN_FILE, 'rcs_set_settings');
add_action('init', 'rcs_register_rc_slider');
add_action('plugins_loaded', 'rcs_manage_enqueue');
add_action('save_post', 'rcs_save_slider');
add_shortcode('rcs_slider', 'rcs_render_by_shortcode');
add_action('widgets_init', 'rcs_register_slider_widget');
add_action('manage_rc_slider_posts_custom_column', 'rcs_set_columns_values');
add_filter('manage_edit-rc_slider_columns', 'rcs_set_columns_labels');
add_action('wp_ajax_RCS_GET_MEDIUM_IMG_I', 'rcs_get_medium_image');
add_action('wp_ajax_RCS_GET_LARGE_IMG_I', 'rcs_get_large_image');
add_action('wp_ajax_RCS_SET_VIMEO_THUMBNAILS', 'rcs_set_vimeo_thumbnails');
add_action('wp_ajax_nopriv_RCS_SET_VIMEO_THUMBNAILS', 'rcs_set_vimeo_thumbnails');
add_action('edit_form_after_title', 'rcs_remove_unwanted_meta_boxes');
$path = plugin_basename( __FILE__ );
add_action("after_plugin_row_{$path}", 'rcs_after_plugin_row', 10, 3);


?>