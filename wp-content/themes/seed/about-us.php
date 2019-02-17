<?php /* Template Name: about-us */ ?>
<?php get_header(); ?>

<main id="main" class="site-main" role="main">
	<section class="section-head-page">
		<div class="content-page">
			<h1>เกี่ยวกับเรา</h1>
			<ul class="breadcrumb">
			    <li><a href="<?php echo esc_url( home_url( '/' ) ); ?>">หน้าแรก</a></li>
			    <li class="active">เกี่ยวกับเรา</li>
			</ul>
		</div>
	</section>


	<section class="my-20px">
		<div class="content-page">
			<div class="row">
				<?php
					$args = array(
						'post_type' => 'news',
						);
					$the_query = new WP_Query( $args );
				?>
				<?php while ( $the_query->have_posts() ) : $the_query->the_post(); ?>
				<div class="col-md-4">
					<div class="panel panel-default border-none">
					  <div class="news-img-title">
							<a href="<?php the_permalink(); ?>">
					  			<img class="fix-img-cover" src="<?php the_post_thumbnail_url('full'); ?>">
					  		</a>
					   </div>
					  <div class="panel-body">
					  	<div class="font-blog-size">
							<a href="<?php the_permalink(); ?>" class="title-color font-bold">
								<?php the_title(); ?>
							</a>
						</div>
						<div>
							<i class="far fa-calendar-alt"></i> <?php the_date(); ?>
						</div>
						<hr>
						<div>
							<?php the_excerpt(); ?>
						</div>
					  </div>
					</div>
				</div>
				<?php endwhile; wp_reset_postdata(); ?>
			</div>
			
		</div>
	</section>
</main>

<?php get_footer(); ?>