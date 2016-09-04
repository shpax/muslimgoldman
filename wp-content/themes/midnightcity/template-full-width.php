<?php
/**
 * Template Name: Full Width
 * The template file for pages without right sidebar.
 * @package MidnightCity
 * @since MidnightCity 1.0.0
*/
get_header(); ?>
<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
    <h1 class="content-headline"><?php the_title(); ?></h1>
<?php midnightcity_get_display_image_page(); ?>    
    <div class="entry-content">
<?php the_content(); ?>
<?php edit_post_link( __( '(Edit)', 'midnightcity' ), '<p>', '</p>' ); ?>
    </div>
<?php endwhile; endif; ?>
<?php comments_template( '', true ); ?>
  </div> <!-- end of content -->
  </div> <!-- end of main-content -->
</div> <!-- end of container -->
<?php get_footer(); ?>