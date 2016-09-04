<?php
/**
 * Template Name: Page without Title
 * The template file for pages without the page title.
 * @package MidnightCity
 * @since MidnightCity 1.1.3
*/
get_header(); ?>
<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
<?php midnightcity_get_display_image_page(); ?>    
    <div class="entry-content">
<?php the_content(); ?>
<?php edit_post_link( __( '(Edit)', 'midnightcity' ), '<p>', '</p>' ); ?>
    </div>
<?php endwhile; endif; ?>
<?php comments_template( '', true ); ?>
  </div> <!-- end of content -->
<?php get_sidebar(); ?>
  </div> <!-- end of main-content -->
</div> <!-- end of container -->
<?php get_footer(); ?>