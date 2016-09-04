<?php
/**
 * The archive template file.
 * @package MidnightCity
 * @since MidnightCity 1.0.0
*/
get_header(); ?>
<?php if ( have_posts() ) : ?>
    <h1 class="content-headline"><?php
					if ( is_day() ) :
						printf( __( 'Daily Archive: %s', 'midnightcity' ), '<span>' . get_the_date() . '</span>' );
					elseif ( is_month() ) :
						printf( __( 'Monthly Archive: %s', 'midnightcity' ), '<span>' . get_the_date( _x( 'F Y', 'monthly archives date format', 'midnightcity' ) ) . '</span>' );
					elseif ( is_year() ) :
						printf( __( 'Yearly Archive: %s', 'midnightcity' ), '<span>' . get_the_date( _x( 'Y', 'yearly archives date format', 'midnightcity' ) ) . '</span>' );
					else :
						_e( 'Archive', 'midnightcity' );
					endif;
				?></h1>    
<?php while (have_posts()) : the_post(); ?>      
<?php get_template_part( 'content', 'archives' ); ?>
<?php endwhile; endif; ?>
<?php midnightcity_content_nav( 'nav-below' ); ?>
  </div> <!-- end of content -->
<?php get_sidebar(); ?>
  </div> <!-- end of main-content -->
</div> <!-- end of container -->
<?php get_footer(); ?>