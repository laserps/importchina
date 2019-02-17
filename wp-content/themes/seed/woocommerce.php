<?php 
get_header(); 

if(is_front_page()){
	// Show Banner for Homepage
	if (is_active_sidebar( 'banner' )) {
		echo '<div class="site-banner">';
		dynamic_sidebar( 'banner' );
		echo '</div>';
	} else {
		if (get_header_image() != '') {
			echo '<div class="site-banner"><img src="' . get_header_image() . '" alt="banner"></div>';
		}
	}
} else {
	// Show Shop title
	$shop_page_id = get_option( 'woocommerce_shop_page_id' ); ?>
	<div class="main-header">
		<div class="container">
			<h2 class="main-title -shop"><a href="<?php echo esc_url( get_permalink( $shop_page_id ) ); ?>"><?php echo get_the_title( $shop_page_id ); ?></a><small><?php woocommerce_breadcrumb(); ?></small></h2>
		</div>
	</div>
	<?php	
}
?>

<div class="container -shopbar">
	<div id="primary" class="content-area -shopbar">
		<main id="main" class="site-main" role="main">
			<?php 
			if(is_shop() && !(is_search()) && (SEED_SHOP_MAINPAGE == 'page-builder')) { 

				/* Use Shop Page instead of Archive Product */
				$the_query = new WP_Query( array( 'page_id' => $shop_page_id ));
				while ( $the_query->have_posts() ) : $the_query->the_post(); 
				the_content();
				endwhile; 
				edit_post_link(
					sprintf(
						esc_html__( 'Edit %s', 'seed' ),
						the_title( '<span class="screen-reader-text">"', '"</span>', false )
						),
					'<span class="edit-link">',
					'</span>',
					$shop_page_id
					);
				wp_reset_postdata();

			} else {
				woocommerce_content();
				seed_entry_footer();
			}
			?>
		</main><!-- #main -->
	</div><!-- #primary -->
	<?php if(SEED_SHOP_LAYOUT != 'full-width') get_sidebar('shop'); ?>
</div><!--.container-->
<?php get_footer(); ?>
