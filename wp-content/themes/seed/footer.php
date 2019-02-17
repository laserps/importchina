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
		<div id="colophon" class="site-footer" >
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
		</div>
		<div class="content-page colophon py-5">
			<div class="row">
				<div class="col-md-4">
					<div class="site-logo w-100"><?php if(function_exists('the_custom_logo')) {the_custom_logo();} ?></div>
					<div class="wpb_wrapper">
						<p>We are a team of designers and developers that create high quality WordPress, Magento, Prestashop, Opencart themes.</p>
					</div>
					<div class="heading-title style3 ">
						<h3><span>Payment:</span></h3>
					</div>
					<div class="vc_single_image-wrapper   vc_box_border_grey">
						<img width="286" height="23" src="http://localhost/importchina/wp-content/uploads/2019/02/payment-icon.png" class="vc_single_image-img attachment-full">
					</div>
				</div>
				<div class="col-md-4"></div>
				<div class="col-md-4"></div>
			</div>
		</div>
	</footer><!--site-footer-->

<?php endif; ?>

</div><!--site-canvas-->
</div><!--#page-->

<?php wp_footer(); ?>
	<script src="wp-content/themes/seed/vendor/OwlCarousel2-develop/dist/owl.carousel.js"></script>
	<script src="wp-content/themes/seed/vendor/lightslider/dist/js/lightslider.js"></script>

	
</body>
</html>
