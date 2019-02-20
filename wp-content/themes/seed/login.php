<?php /* Template Name: register*/ ?>
<?php get_header(); ?>

<main id="main" class="site-main" role="main">
	<section class="my-20px">
		<div class="container">
			<?php echo do_shortcode( '[woocommerce_my_account]' ); ?>
		</div>
	</section>
</main>

<?php get_footer(); ?>