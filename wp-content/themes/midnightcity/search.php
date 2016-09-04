<?php
/**
 * The search results template file.
 * @package MidnightCity
 * @since MidnightCity 1.0.0
*/
get_header(); ?>
<?php if ( have_posts() ) : ?>
    <h1 class="content-headline"><?php printf( __( 'Search Results for: %s', 'midnightcity' ), '<span>' . get_search_query() . '</span>' ); ?></h1>
    <div class="archive-meta"><p class="number-of-results"><?php _e( '<strong>Number of Results</strong>: ', 'midnightcity' ); ?><?php echo $wp_query->found_posts; ?></p></div>   
<?php while (have_posts()) : the_post(); ?>      
<?php get_template_part( 'content', 'archives' ); ?>
<?php endwhile; ?>

<?php if ( $wp_query->max_num_pages > 1 ) : ?>
		<div class="navigation" role="navigation">
			<h2 class="navigation-headline section-heading"><?php _e( 'Search results navigation', 'midnightcity' ); ?></h2>
      <div class="nav-wrapper">
        <p class="navigation-links">
<?php $big = 999999999;
echo paginate_links( array(
	'base' => str_replace( $big, '%#%', esc_url( get_pagenum_link( $big ) ) ),
	'format' => '?paged=%#%',
	'current' => max( 1, get_query_var('paged') ),
  'prev_text' => __( '&larr; Previous', 'midnightcity' ),
	'next_text' => __( 'Next &rarr;', 'midnightcity' ),
	'total' => $wp_query->max_num_pages,
	'add_args' => false
) );
?>
        </p>
      </div>
		</div>
<?php endif; ?>

<?php else : ?>
    <h1 class="content-headline"><?php _e( 'Nothing Found', 'midnightcity' ); ?></h1>
    <p><?php _e( 'Sorry, but nothing matched your search criteria. Please try again with some different keywords.', 'midnightcity' ); ?></p><?php get_search_form(); ?>
<?php endif; ?>
  </div> <!-- end of content -->
<?php get_sidebar(); ?>
  </div> <!-- end of main-content -->
</div> <!-- end of container -->
<?php get_footer(); ?>