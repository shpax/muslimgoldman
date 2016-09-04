<?php
/**
 * The Header template for our theme
 *
 * Displays all of the <head> section and everything up till <div id="main">
 *
 * @package i-craft
 * @since i-craft 1.0
 */
?>
<?php

$hide_cart = get_theme_mod('hide_cart', of_get_option('hide_cart'));

$top_phone = '';
$top_email = '';

$top_phone = esc_attr(get_theme_mod('top_phone', of_get_option('top_bar_phone', '1-000-123-4567')));
$top_email = esc_attr(get_theme_mod('top_email', of_get_option('top_bar_email', 'email@i-create.com')));
$icraft_logo = get_theme_mod( 'logo', of_get_option('itrans_logo_image', get_template_directory_uri() . '/images/logo.png') );

global $post; 

?>

<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width">

	<?php    
    if ( ! function_exists( '_wp_render_title_tag' ) ) :
        function icraft_render_title() {
    ?>
    <title><?php wp_title( '|', true, 'right' ); ?></title>
    <?php
        }
        add_action( 'wp_head', 'icraft_render_title' );
    endif;    
    ?>    
    
	<link rel="profile" href="http://gmpg.org/xfn/11">
	<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
	
    <script src="https://code.jquery.com/jquery-1.9.1.min.js"></script>
	<?php wp_head(); ?>
	<script>
	
	$( document ).ready(function() {
    $('.menu-toggle').empty();
	setTimeout("$('.form_cont').fadeIn(10000)", 1000);
	if($(window).width()>999){
		$('.form_cont').css('display','none');
	}
	
	$("#reply-title").click(
	function(){
		$("#commentform").toggle(2000);
	})

});
    

	
	</script>
	
</head>
<body <?php body_class(); ?> style='background:none!important'>
	
	<div id="page" class="hfeed site">
    	
        
        
        <div class="headerwrapp">
			<?php if ( $top_phone || $top_email || icraft_social_icons() ) : ?>
    	<div id="utilitybar" class="utilitybar">
        	<div class="ubarinnerwrap">
                
                <?php if ( $top_phone ) : ?>
					<div class="top_mob">
                    	<div class="mob_logo"><a href="/"><img src="<?php bloginfo('template_url'); ?>/images/logo3.png" alt=""> 
						</a>
						</div>
                    	<div class="mob_phone" >
                    		<p style="font-size:15px;">8(495)989-77-12</p>
                    		<p style="font-size:15px;">8(495)989-77-12</p>
                    	</div>
                    </div>
                <div class="topphone">
                    
                    <?php if ( $top_email ) : ?>
                        <p>8(495)989-77-12 Москва</p>
						 
                    <?php endif; ?>
                </div>
                <?php endif; ?>
                
                <?php if ( $top_email ) : ?>
                <div class="topphone">
                    
                    <?php if ( $top_email ) : ?>
                        <p>8(495)989-77-12 Москва</p>
						 
                    <?php endif; ?>
                </div>
				<div class="col_back"><a href="#servis2" class="fancybox-inline">Заказать звонок</a></div>
				<div class="fancybox-hidden" style="display: none;">
					<div id="servis2">
				<?php echo do_shortcode('[contact-form-7 id="777" title="form2"]'); ?>
					</div>
				</div>
                <?php endif; ?>                
            </div> 
        </div>
        <?php endif; ?>
            <header id="masthead" class="site-header" role="bannerr">
         		<div class="headerinnerwrap">
					<?php if ($icraft_logo) : ?>
                        <a class="home-link" href="<?php echo esc_url( home_url( '/' ) ); ?>" title="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>" rel="home">
                            <span><img src="<?php bloginfo('template_url'); ?>/images/logo3.png" alt=""></span>
                        </a>
						 <span id="site-titlendesc">
                            <a class="home-link" href="<?php echo esc_url( home_url( '/' ) ); ?>" title="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>" rel="home">
                                <h1 class="site-title"><?php bloginfo( 'name' ); ?></h1>
                                <h2 class="site-description"><?php bloginfo( 'description' ); ?></h2>   
                            </a>
                        </span>
						<div class="phon-namb">
						<p>8(800)775-18-82</p>
						<p>8(495)989-77-12</p> 
					   </div>
					   <div class="city-social">
					   	<p>Москва <a href="#">(выбрать город)</a></p>
					   	<p><a href=""><img src="<?php bloginfo('template_directory'); ?>/images/v.png" alt=""></a>
					   	<a href=""><img src="<?php bloginfo('template_directory'); ?>/images/f.png" alt=""></a>
					   	<a href=""><img src="<?php bloginfo('template_directory'); ?>/images/i.png" alt=""></a></p>
					   </div>
                    <?php else : ?>
                       
                    <?php endif; ?>	
						<div class="topsearch">
                            <?php get_search_form(); ?>
                        </div>
						 <div class="header-iconwrap">
                        <?php
                        global $woocommerce;
                        if ( in_array( 'woocommerce/woocommerce.php', apply_filters( 'active_plugins', get_option( 'active_plugins' ) ) ) && empty($hide_cart) ) {
                        ?>
                            <div class="header-icons woocart">
                                <a href="<?php echo $woocommerce->cart->get_cart_url() ?>" >
                                    <span class="show-sidr"><?php _e('Cart','i-craft'); ?></span>
                                    <span class="genericon genericon-cart"></span>
                                    <span class="cart-counts"><?php echo sprintf($woocommerce->cart->cart_contents_count); ?></span>
                                </a>
                                <?php echo icraft_top_cart(); ?>
                             </div>
                        <?php	
                        }
                        ?>
                        </div>
                                    
                        
                    <div id="navbar" class="navbar">
                        <nav id="site-navigation" class="navigation main-navigation" role="navigation">
                            <h3 class="menu-toggle"><?php _e( 'Menu', 'i-craft' ); ?></h3>
                            <a class="screen-reader-text skip-link" href="#content" title="<?php esc_attr_e( 'Skip to content', 'i-craft' ); ?>"><?php _e( 'Skip to content', 'i-craft' ); ?></a>
                            <?php 
								if ( has_nav_menu(  'primary' ) ) {
										wp_nav_menu( array( 'theme_location' => 'primary', 'menu_class' => 'nav-menu', 'container_class' => 'nav-container', 'container' => 'div' ) );
									}
									else
									{
										wp_nav_menu( array( 'theme_location' => 'primary', 'menu_class' => 'nav-container' ) ); 
									}
								?>
							
                        </nav><!-- #site-navigation -->

                       
                    </div><!-- #navbar -->
                    <div class="clear"></div>
                </div>
            </header><!-- #masthead -->
        </div>
			
        <!-- #Banner -->
        <?php
		
		$hide_title = rwmb_meta('icraft_hidetitle');
		$show_slider = rwmb_meta('icraft_show_slider');
		$other_slider = rwmb_meta('icraft_other_slider');
		$custom_title = rwmb_meta('icraft_customtitle');
		
		$hide_front_slider = get_theme_mod('slider_stat', of_get_option('hide_front_slider', ''));
		$other_front_slider = htmlspecialchars_decode(get_theme_mod('other_front_slider', of_get_option('other_front_slider')));
		$itrans_slogan = get_theme_mod('banner_text', of_get_option('itrans_slogan', ''));

		
		if($other_slider) :
		?>
			
        <div class="other-slider" style="">
			 <?php echo do_shortcode( '[rev_slider alias="slide3"]' ) ?>	
			<!--<?php echo do_shortcode( $other_slider ) ?>-->
        </div>
		
      	<?php elseif ($show_slider) : ?>
        <?php icraft_ibanner_slider(); ?>
		<?php	 
		elseif ( is_home() || (in_array( 'woocommerce/woocommerce.php', apply_filters( 'active_plugins', get_option( 'active_plugins' ) ) ) && is_shop() && is_front_page()) ) : 
		?>
            <?php if (!empty($other_front_slider)) : ?>
            <?php echo do_shortcode( $other_front_slider ) ?>
        	<?php elseif (!$hide_front_slider) : ?>
            <?php icraft_ibanner_slider(); ?>
        	<?php else : ?>
                <div class="iheader" style="">
                    <div class="titlebar">
                        <h1 class="entry-title">
                            <?php
                                if ($itrans_slogan) {
                                                //bloginfo( 'name' );
                                    echo esc_attr($itrans_slogan);
                                }
                            ?>	                 
                        </h1>
                    </div>
                </div>                                    
        	<?php endif; ?>
            
        <?php elseif(!$hide_title) : ?>
        
        
		<?php endif; ?>
		<div id="main" class="site-main">

