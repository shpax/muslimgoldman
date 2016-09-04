<?php
/**
 * The WooCommerce pages template file.
 * @package MidnightCity
 * @since MidnightCity 1.2.0
*/
get_header(); ?>    
    <div class="entry-content">
<?php woocommerce_content(); ?>
    </div>
  </div> <!-- end of content -->
<?php get_sidebar(); ?>
  </div> <!-- end of main-content -->
</div> <!-- end of container -->
<?php get_footer(); ?>