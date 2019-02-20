<?php /* Template Name: about-us */ ?>
<?php get_header(); ?>

<main id="main" class="site-main" role="main">
	<?php
		$args = array(
			'post_type' => 'about_us',
			);
		$the_query = new WP_Query( $args );
	?>
	<?php while ( $the_query->have_posts() ) : $the_query->the_post(); ?>
	<section class="section-head-page">
		<div class="content-page">
			<h1><?php the_title(); ?></h1>
			<ul class="breadcrumb">
			    <li><a href="<?php echo esc_url( home_url( '/' ) ); ?>">หน้าแรก</a></li>
			    <li class="active">เกี่ยวกับเรา</li>
			</ul>
		</div>
	</section>
	<img class="w-100" src="<?php the_post_thumbnail_url('full'); ?>">

	<section class="my-20px">
		<div class="container text-center">	 
				<p><?php the_content(); ?></p>
		</div>
	</section>
	<?php endwhile; wp_reset_postdata(); ?>
</main>

<?php get_footer(); ?>