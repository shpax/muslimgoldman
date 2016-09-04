<?php 
/**
 * Library of Theme options functions.
 * @package MidnightCity
 * @since MidnightCity 1.0.0
*/

// Display Breadcrumb navigation
function midnightcity_get_breadcrumb() { 
global $midnightcity_options_db;
		if ($midnightcity_options_db['midnightcity_display_breadcrumb'] != 'Hide') { ?>
		<?php if(function_exists( 'bcn_display' ) && !is_front_page()){ _e('<p class="breadcrumb-navigation">', 'midnightcity'); ?><?php bcn_display(); ?><?php _e('</p>', 'midnightcity');} ?>
<?php } 
} 

// Display featured images on single posts
function midnightcity_get_display_image_post() {
global $midnightcity_options_db; 
		if ($midnightcity_options_db['midnightcity_display_image_post'] == '' || $midnightcity_options_db['midnightcity_display_image_post'] == 'Display') { ?>
		<?php if ( has_post_thumbnail() ) : ?>
      <?php the_post_thumbnail(); ?>
    <?php endif; ?>
<?php } 
}

// Display featured images on pages
function midnightcity_get_display_image_page() { 
global $midnightcity_options_db;
		if ($midnightcity_options_db['midnightcity_display_image_page'] == '' || $midnightcity_options_db['midnightcity_display_image_page'] == 'Display') { ?>
		<?php if ( has_post_thumbnail() ) : ?>
      <?php the_post_thumbnail(); ?>
    <?php endif; ?>
<?php } 
} ?>