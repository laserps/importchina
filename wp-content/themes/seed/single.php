<?php
/**
 * The template for displaying all single posts.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package seed
 */

get_header(); ?>
<div class="main-header">
	<div class="container">
		<h2 class="main-title"><?php the_title(); ?></h2>
	</div>
</div>
<div class="container">
	<div id="primary" class="content-area <?php echo '-'.SEED_BLOG_LAYOUT; ?>">
		<main id="main" class="site-main -hide-title" role="main">

		<?php while ( have_posts() ) : the_post(); ?>

			<?php get_template_part( 'template-parts/content', 'single' ); ?>

			<?php //the_post_navigation(); ?>

			<?php
				// If comments are open or we have at least one comment, load up the comment template.
				if ( comments_open() || get_comments_number() ) :
					comments_template();
				endif;
			?>

		<?php endwhile; // End of the loop. ?>

		</main><!-- #main -->
	</div><!-- #primary -->

<?php 
	switch (SEED_BLOG_LAYOUT) {
		case 'rightbar':
			get_sidebar('right'); 
			break;
		case 'leftbar':
			get_sidebar('left'); 
			break;
		case 'full-width':
			break;
		default:
			break;
	}
	?>
</div><!--container-->
<?php get_footer(); ?>
