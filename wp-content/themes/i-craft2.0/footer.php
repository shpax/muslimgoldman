<?php
/**
 * The template for displaying the footer
 *
 * Contains footer content and the closing of the #main and #page div elements.
 *
 * @package i-craft
 * @since i-craft 1.0
 */
?>
			<div class="mob_foot_info">
						<p>
							<span class="foot-link"><a href="http://muslimgoldman.com/dostavka-i-oplata">Доставка <br>и оплата</a></span>
							<span class="foot-link"><a href="http://muslimgoldman.com/my-account">Личный <br>кабинет</a></span>
							<span class="foot-link"><a href="http://muslimgoldman.com/my-account">Контакты</a></span>
						</p>
					</div>
		</div><!-- #main -->
		<footer id="colophon" class="site-footer" role="contentinfo">
			
			<div class="for_seotext">
				<h1 class="zag-seo_foot"><?php single_cat_title()  ?></h1>
				
				<?php echo category_description( $category_id ); ?>
				
				
			</div>
        	<div class="footer-bg clearfix">
				
                <div class="widget-wrap">
                    <?php get_sidebar( 'main' ); ?>
                </div>
			</div>
			<div class="site-info">
				<div class="l_foot_info">
					
					<div class="logo_foot">
							<a href="/">
								<img src="<?php bloginfo('template_directory'); ?>/images/footlogo_3.png" alt="">
							</a>
						</div>
						<p class="name_foot">Muslim Goldman</p>
						<p class="descrip_foo">Производство и продажа ювелирных изделий</p>
					</div>
					<div class="right_info">
						<p class="foot_phon">8(800)755-18-82 - по России</p>
						<p class="foot_phon">8(495)989-77-12 - по Москве</p>
					</div>
                <!--<div class="copyright">
                	<?php esc_attr_e( 'Copyright &copy;', 'i-craft' ); ?>  <?php bloginfo( 'name' ); ?>
                </div>            
            	<div class="credit-info">
					<a href="<?php echo esc_url( __( 'http://wordpress.org/', 'i-craft' ) ); ?>" title="<?php esc_attr_e( 'Semantic Personal Publishing Platform', 'i-craft' ); ?>">
						<?php printf( __( 'Powered by %s', 'i-craft' ), 'WordPress' ); ?>
                    </a>
                    <?php printf( __( ', Designed and Developed by', 'i-craft' )); ?> 
                    <a href="<?php echo esc_url( __( 'http://www.templatesnext.org/', 'i-craft' ) ); ?>">
                   		<?php printf( __( 'templatesnext', 'i-craft' ) ); ?>
                    </a>
                </div>-->

			</div><!-- .site-info -->
		</footer><!-- #colophon -->
	</div><!-- #page -->
	<script>
	document.getElementsByClassName('.menu-toggle').innerHTML='';
	$( document ).ready(function() {
    $('.menu-toggle').empty();
	setTimeout("$('.form_cont').fadeIn(1000)",0);
	if($(window).width()>999){
		$('.form_cont').css('display','none');
	}

});
    

	
	</script>
	
	<?php wp_footer(); ?>
</body>
</html>