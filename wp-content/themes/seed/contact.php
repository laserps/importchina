<?php /* Template Name: contact */ ?>
<?php get_header(); ?>

<main id="main" class="site-main" role="main">
	<?php
		$args = array(
			'post_type' => 'contact',
			);
		$the_query = new WP_Query( $args );
	?>
	<?php while ( $the_query->have_posts() ) : $the_query->the_post(); ?>
	<section class="section-head-page">
		<div class="content-page">
			<h1><?php the_title(); ?></h1>
			<ul class="breadcrumb">
			    <li><a href="<?php echo esc_url( home_url( '/' ) ); ?>">หน้าแรก</a></li>
			    <li class="active">ติดต่อเรา</li>
			</ul>
		</div>
	</section>
	<img class="w-100" src="<?php the_post_thumbnail_url('full'); ?>">

	<section class="my-20px">
		<div class="container">	 
			<div class="row">
				<div class="col-md-6">
					<?php the_content(); ?>
				</div>
				<div class="col-md-6">
					<div class="mb-5">
					  <p><b>Email:</b> <?php $key="email"; echo get_post_meta($post->ID, $key, true); ?></p>
				      <p><b>ที่อยู่</b><?php $key="Address"; echo get_post_meta($post->ID, $key, true); ?></p>
				      <p><b>เบอร์โทรศัพท์</b><?php $key="phone"; echo get_post_meta($post->ID, $key, true); ?></p>
					</div>
					<div>
						<?php the_excerpt(); ?>
					</div>
				</div>
			</div>
		</div>
	</section>
	<?php endwhile; wp_reset_postdata(); ?>
</main>

<?php get_footer(); ?>