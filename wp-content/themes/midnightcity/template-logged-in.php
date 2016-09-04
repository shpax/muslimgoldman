<?php
/**
 * Template Name: Logged In
 * The template file for displaying the page content only for logged in users.
 * @package MidnightCity
 * @since MidnightCity 1.1.2
*/
get_header(); ?>
<?php if ( is_user_logged_in() ) { ?>
<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
    <h1 class="content-headline"><?php the_title(); ?></h1>
<?php midnightcity_get_display_image_page(); ?>    
    <div class="entry-content">
<?php the_content(); ?>
<?php edit_post_link( __( '(Edit)', 'midnightcity' ), '<p>', '</p>' ); ?>
    </div>
<?php endwhile; endif; ?>
<?php comments_template( '', true ); ?>
<?php } else { ?>
<h1 class="content-headline"><?php the_title(); ?></h1>
<p class="logged-in-message"><?php _e( 'You must be logged in to view this page.', 'midnightcity' ); ?></p>
<?php wp_login_form(); } ?>
  </div> <!-- end of content -->
<?php get_sidebar(); ?>
  </div> <!-- end of main-content -->
</div> <!-- end of container -->
<?php get_footer(); ?>