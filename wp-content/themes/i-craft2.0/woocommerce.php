<?php
/**
 * The template for displaying all pages
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages and that other
 * 'pages' on your WordPress site will use a different template.
 *
 * @package i-craft
 * @since i-craft 1.0
 */

get_header(); ?>
	<div class="form_cont">
				<?php echo do_shortcode( '[contact-form-7 id="759" title="Contact form 1"]' ) ?>
			</div> 
	<?php echo do_shortcode('[rev_slider alias="slide1"]');?>
	<div id="primary" class="content-area">
		<?php get_sidebar(); ?>
		<div id="content" class="site-content" role="main">

			<?php /* The loop */ ?>
			<?php woocommerce_content(); ?>

		</div><!-- #content -->
	</div><!-- #primary -->


<?php get_footer(); ?>