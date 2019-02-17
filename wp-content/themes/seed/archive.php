<?php
/**
 * The template for displaying archive pages.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package seed
 */

get_header(); ?>

<div class="main-header">
	<div class="container">
		<?php the_archive_title( '<h2 class="main-title">', '</h2>' ); ?>
	</div>
</div>

<div class="container">
	<div id="primary" class="content-area <?php echo '-'.SEED_BLOG_LAYOUT; ?>">
		<main id="main" class="site-main" role="main">

			<?php if ( have_posts() ) : ?>

				<header class="page-header">
					<?php
					the_archive_title( '<h1 class="page-title entry-title hide">', '</h1>' );
					the_archive_description( '<div class="taxonomy-description">', '</div>' );
					?>
				</header><!-- .page-header -->

				<?php 
				if ((int)SEED_BLOG_COLUMNS > 1) {
					echo '<div class="seed-grid-'.SEED_BLOG_COLUMNS.'">';
					while ( have_posts() ) : the_post();
					get_template_part( 'template-parts/content','card-excerpt');
					endwhile; 
					echo '</div>';
				} else {
					while ( have_posts() ) : the_post();
					get_template_part( 'template-parts/content');
					endwhile; 
				}
				?>

				<?php seed_posts_navigation(); ?>

			<?php else : ?>

				<?php get_template_part( 'template-parts/content', 'none' ); ?>

			<?php endif; ?>

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
