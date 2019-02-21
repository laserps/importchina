<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package seed
 */
?>
</div><!--site-content-->

<?php if (is_active_sidebar( 'footbar' ) ) : ?>
	<aside id="footbar" class="site-footbar" role="complementary">
		<div class="container">
			<?php dynamic_sidebar( 'footbar' ); ?>
		</div>
	</aside><!--site-footbar-->

<?php else: ?>
<!-- 	<div class="site-footer-space"></div> -->
	<footer role="contentinfo">
<!-- 		<div id="colophon" class="site-footer" >
			<div class="content-page colophon">
				<div class="row">
					<div class="col-md-5">
						<div class="newsletter-title">
							<h3>
								<span>Sign Up For Newsletters</span>
							</h3>
							<p>Be the First to Know. Sign up for newsletter today</p>
						</div>
					</div>
					<div class="col-md-5"></div>
				</div>
			</div>
		</div> -->
		<div class="content-page colophon py-5">
			<div class="row">
				<div class="col-md-4">
					<div class="img-logo-footer w-100"><?php if(function_exists('the_custom_logo')) {the_custom_logo();} ?></div>
					<div class="wpb_wrapper">
						<?php $args = array( 'post_type' => 'about_us',);
							$the_query = new WP_Query( $args );
						?>
						<?php while ( $the_query->have_posts() ) : $the_query->the_post(); ?>
						<?php the_excerpt(); ?>
						<?php endwhile; wp_reset_postdata(); ?>
					</div>
					<div class="heading-title style3 ">
						<h3><span>Payment:</span></h3>
					</div>
					<div class="vc_single_image-wrapper   vc_box_border_grey">
						<img width="286" height="23" src="wp-content/uploads/2019/02/payment-icon.png" class="vc_single_image-img attachment-full">
					</div>
				</div>
				<div class="col-md-4">
					<div class="contact-footer">
						<h3>ติดต่อเรา</h3>
						<?php
							$args = array(
								'post_type' => 'contact',
								);
							$the_query = new WP_Query( $args );
						?>
						<?php while ( $the_query->have_posts() ) : $the_query->the_post(); ?>
						
					      <p>Email: <?php $key="email"; echo get_post_meta($post->ID, $key, true); ?></p>
					      <p><?php $key="Address"; echo get_post_meta($post->ID, $key, true); ?></p>
					      <p><?php $key="phone"; echo get_post_meta($post->ID, $key, true); ?></p>
					    <?php endwhile; wp_reset_postdata(); ?>
				    </div>
				</div>
				<div class="col-md-4">
					<h3>Facebook</h3>
					<iframe src="https://www.facebook.com/plugins/page.php?href=https%3A%2F%2Fwww.facebook.com%2FFB-CLUB-271565726575170%2F&tabs&width=340&height=214&small_header=false&adapt_container_width=false&hide_cover=false&show_facepile=true&appId=779591188909317" width="100%" height="214" style="border:none;overflow:hidden" scrolling="no" frameborder="0" allowTransparency="true" allow="encrypted-media"></iframe>
				</div>
			</div>
		</div>
	</footer><!--site-footer-->

<?php endif; ?>

</div><!--site-canvas-->
</div><!--#page-->

<?php wp_footer(); ?>
	<script src="wp-content/themes/seed/vendor/OwlCarousel2-develop/dist/owl.carousel.js"></script>
	<script src="wp-content/themes/seed/vendor/lightslider/dist/js/lightslider.js"></script>
	<script>
	function refreshPage(){
	    window.location.reload();
	} 
</script>
	
</body>
</html>
