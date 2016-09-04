<?php
/**
 * The 404 page (Not Found) template file.
 * @package MidnightCity
 * @since MidnightCity 1.0.0
*/
get_header(); ?>
    <h1 class="content-headline"><?php _e( 'Nothing Found', 'midnightcity' ); ?></h1>    
    <div class="entry-content">
      <p><?php _e( 'Apologies, but no results were found for your request. Perhaps searching will help you to find a related content.', 'midnightcity' ); ?></p><?php get_search_form(); ?>
    </div>
  </div> <!-- end of content -->
<?php get_sidebar(); ?>
  </div> <!-- end of main-content -->
</div> <!-- end of container -->
<?php get_footer(); ?>