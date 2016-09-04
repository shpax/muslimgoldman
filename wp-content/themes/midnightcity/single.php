<?php
/**
 * The post template file.
 * @package MidnightCity
 * @since MidnightCity 1.0.0
*/
get_header(); ?>
<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
    <h1 class="content-headline"><?php the_title(); ?></h1>
<?php midnightcity_get_display_image_post(); ?>
<?php if ( $midnightcity_options_db['midnightcity_display_meta_post'] != 'Hide' ) { ?>
    <p class="post-info"><span class="post-info-author"><?php the_author_posts_link(); ?></span><span class="post-info-date"><?php echo get_the_date(); ?></span><span class="post-info-category"><?php the_category(', '); ?></span><?php the_tags( '<span class="post-info-tags">', ', ', '</span>' ); ?></p>
<?php } ?>    
    <div class="entry-content">
<?php the_content(); ?>
<?php wp_link_pages( array( 'before' => '<p class="page-link"><span>' . __( 'Pages:', 'midnightcity' ) . '</span>', 'after' => '</p>' ) ); ?>
<?php edit_post_link( __( '(Edit)', 'midnightcity' ), '<p>', '</p>' ); ?>
    </div>
<?php endwhile; endif; ?>
<?php if ( $midnightcity_options_db['midnightcity_next_preview_post'] != 'Hide' ) { ?>
<?php midnightcity_prev_next('midnightcity-post-nav'); ?>
<?php } ?>
<?php comments_template( '', true ); ?>
  </div> <!-- end of content -->
<?php get_sidebar(); ?>
  </div> <!-- end of main-content -->
</div> <!-- end of container -->
<?php get_footer(); ?>