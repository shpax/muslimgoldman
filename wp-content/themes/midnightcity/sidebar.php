<?php
/**
 * The sidebar template file.
 * @package MidnightCity
 * @since MidnightCity 1.0.0
*/
?>
<?php global $midnightcity_options_db; ?>
<?php if ($midnightcity_options_db['midnightcity_display_sidebar'] != 'Hide'){ ?>
<aside id="sidebar">
<?php if ( dynamic_sidebar( 'sidebar-1' ) ) : else : ?>
<?php endif; ?>
</aside> <!-- end of sidebar -->
<?php } ?>