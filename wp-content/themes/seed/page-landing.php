<?php 
/**
 * Template Name: Landing Page
 */
?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="http://gmpg.org/xfn/11">
	<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
	<?php wp_head(); ?>
</head>

<body <?php body_class('landing-page'); ?>>
	<a class="skip-link screen-reader-text" href="#content"><?php esc_html_e( 'Skip to content', 'seed' ); ?></a>
	<div id="page" class="site">
		<div id="sb-site" class="site-canvas">
			<div id="content" class="site-content">
				<div class="container">
					<div id="primary" class="content-area">
						<main id="main" class="site-main -hide-title" role="main">

							<?php while ( have_posts() ) : the_post(); ?>

								<?php get_template_part( 'template-parts/content', 'page' ); ?>

								<?php
								if ( comments_open() || get_comments_number() ) :
									comments_template();
								endif;
								?>

							<?php endwhile; // End of the loop. ?>

						</main><!-- #main -->
					</div><!-- #primary -->
				</div><!--container-->
			</div><!--site-content-->
		</div><!--site-canvas-->
	</div><!--#page-->

	<?php wp_footer(); ?>

</body>
</html>
