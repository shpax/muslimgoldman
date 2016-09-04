<?php
/**
 * The template for displaying content of search/archives.
 * @package MidnightCity
 * @since MidnightCity 1.0.0
*/
?>
<?php global $midnightcity_options_db; ?>
    <article <?php post_class('post-entry'); ?>>
      <h2 class="post-entry-headline"><a href="<?php echo get_permalink(); ?>"><?php the_title(); ?></a></h2>
<?php if ( $midnightcity_options_db['midnightcity_display_meta_post'] != 'Hide' ) { ?>
      <p class="post-info">
        <span class="post-info-author"><?php the_author_posts_link(); ?></span>
        <span class="post-info-date"><a href="<?php echo get_permalink(); ?>"><?php echo get_the_date(); ?></a></span>
<?php if ( has_category() )  { ?>
        <span class="post-info-category"><?php the_category(', '); ?></span><?php the_tags( '<span class="post-info-tags">', ', ', '</span>' ); ?>
<?php } ?>
<?php if ( comments_open() ) { ?>
        <span class="post-info-comments"><a href="<?php comments_link(); ?>"><?php comments_number( '0', '1', '%' ); ?></a></span>
<?php } ?>
      </p>
<?php } ?>
<?php if ( has_post_thumbnail() ) { ?>
      <a href="<?php echo get_permalink(); ?>"><?php the_post_thumbnail(); ?></a>
<?php } ?>
      <div class="post-entry-content">
<?php if ( $midnightcity_options_db['midnightcity_content_archives'] != 'Content' ) { ?>
<?php the_excerpt(); ?>
<?php } else { ?>
<?php global $more; $more = 0; ?><?php the_content(); ?>
<?php } ?>
      </div>
    </article>