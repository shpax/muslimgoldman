<?php
/**
 * The main template file.
 * @package MidnightCity
 * @since MidnightCity 1.0.0
*/
get_header(); ?>
<?php if ($midnightcity_options_db['midnightcity_display_latest_posts'] != 'Hide') { ?>    
    <section class="home-latest-posts">
      <h2 class="entry-headline"><?php if($midnightcity_options_db['midnightcity_latest_posts_headline'] == '') { ?><?php _e( 'Latest Posts' , 'midnightcity' ); ?><?php } else { echo esc_attr($midnightcity_options_db['midnightcity_latest_posts_headline']); } ?></h2>
<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
<?php get_template_part( 'content', 'archives' ); ?>
<?php endwhile; endif; ?>
<?php midnightcity_content_nav( 'nav-below' ); ?>
    </section>
<?php } ?>
<?php if ( dynamic_sidebar( 'sidebar-6' ) ) : else : ?>
<?php endif; ?>
  </div> <!-- end of content -->
<?php get_sidebar(); ?>
  </div> <!-- end of main-content -->
</div> <!-- end of container -->
<?php get_footer(); ?>