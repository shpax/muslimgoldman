<?php
/**
 * The tag archive template file.
 * @package MidnightCity
 * @since MidnightCity 1.0.0
*/
get_header(); ?>
<?php if ( have_posts() ) : ?>
    <h1 class="content-headline"><?php printf( __( 'Tag Archive: %s', 'midnightcity' ), '<span>' . single_tag_title( '', false ) . '</span>' ); ?></h1>
<?php if ( tag_description() ) : ?><div class="archive-meta"><?php echo tag_description(); ?></div><?php endif; ?>    
<?php while (have_posts()) : the_post(); ?>      
<?php get_template_part( 'content', 'archives' ); ?>
<?php endwhile; endif; ?>
<?php midnightcity_content_nav( 'nav-below' ); ?>
  </div> <!-- end of content -->
<?php get_sidebar(); ?>
  </div> <!-- end of main-content -->
</div> <!-- end of container -->
<?php get_footer(); ?>