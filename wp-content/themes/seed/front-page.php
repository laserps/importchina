<?php get_header(); ?>

<main id="main" class="site-main" role="main">

	<!-- BANNER -->
	<section class="mb-5">
		<div class="owl-carousel owl-theme position-relative">
			<?php
				$args = array(
					'post_type' => 'baner_home_page',
					);
				$the_query = new WP_Query( $args );
			?>
			<?php while ( $the_query->have_posts() ) : $the_query->the_post(); ?>
		    <div class="item img-banner">
		    	<img class="fix-img-cover" src="<?php the_post_thumbnail_url('full'); ?>">
		    </div>
		    <?php endwhile; wp_reset_postdata(); ?>
		</div>
	</section>
	
	<div class="content-page">




		<section class="mb-5">
			<div class="row">
				<div class="col-md-2">
					<h1>สินค้ามาใหม่</h1>
				</div>
				<div class="col-md-10 position-relative">
	
					<hr class="hr-respon">
					<ul class="nav navbar-nav border-tab">
						<?php
							$prod_cat_args = array(
							'taxonomy'     => 'product_cat',
				            'orderby'      => 'name',
				            'empty'        => 0,
				            );
				            $terms = get_categories( $prod_cat_args );
				            //$term_id=6;
				            foreach ( $terms as $term ) {
				            $term_link = get_term_link( $term );
				            echo '<li><a class="shopping-now" href="' . esc_url( $term_link ) . '">' . $term->name . '</a></li>';
				            }  
						?>
				    </ul>
				</div>
			</div>
		</section>

		<section class="mb-5">
			<div>
				<ul id="slideproduct1">
					<?php
						$args = array(
							'post_type' => 'product',
							'posts_per_page' => 10,
							);
						$loop = new WP_Query( $args );
							while ( $loop->have_posts() ) : $loop->the_post();
							global $woocommerce;
							$currency = get_woocommerce_currency_symbol();
							$price = get_post_meta( get_the_ID(), '_regular_price', true);
							$sale = get_post_meta( get_the_ID(), '_sale_price', true);
					?>
				 	  <li>
				  		<div class="panel panel-default position-relative">
						  <div class="panel-home position-relative">
						  	<div class="slide-img">
						  		<img class="fix-img-cover" src="<?php the_post_thumbnail_url('full'); ?>">
						  	</div>
						  	<div class="slide-category">
						  		<a href="<?php echo get_category_link($category);?>" class="category-color">
						  			<?php global $post, $product;
								    $categ = $product->get_categories();
								    echo $categ; 
								    ?>
						  		</a>
						  	</div>
						  	<div class="font-title">
						  		<a href="<?php the_permalink(); ?>" class="title-color">
						  			<?php the_title(); ?>
						  		</a>
						  	</div>
					  		<div class="rating-custom">
							    <?php wc_get_template( 'single-product/rating.php' ); ?>
							</div>
						  	<div class="color-red text-price">
						  		<span><?php echo " " . get_woocommerce_currency_symbol().$product->get_sale_price(); ?></span>
						  		<span class="ch-sale-price"><?php echo $price; echo $currency;?></span>
						  	</div>
						  	<div class="overlay-icon">
					  			<a href="#" class="icon-btu-hover"><i class="far fa-heart"></i></a>
					  			<a href="#" class="icon-btu-hover"><i class="fas fa-sync-alt"></i></a>
					  			<a href="#" class="icon-btu-hover"><i class="fas fa-phone-volume"></i></a>
						  	</div>
						  	<div class="overlay">	

						  		<a href="<?php echo esc_url( home_url( '/' ) ); ?> " data-quantity="1" data-product_id="<?php echo $product->id; ?>" 
						  			class="button alt ajax_add_to_cart add_to_cart_button product_type_simple btn-add-cart" onClick="window.location.reload()">
								    ใส่ตะกร้า
								</a>
						  		<!-- <button type="button" class="btn btn-add-cart">ใส่ตะกร้า</button> -->
						  	</div>
						  	<div class="sale-icon">
						  			<?php 
										if($product->regular_price > 0){
										$percentage = round( ( ( $product->regular_price - $product->sale_price ) / $product->regular_price ) * 100 );
										if($percentage < 100){
										echo apply_filters( 'woocommerce_sale_flash', '<span>' . __( 'ลดราคา '. $percentage . '%', 'woocommerce' ) . '</span>', $post, $product ); 
										}
										}
									?>
						  	</div>
						  </div>
						</div>
					  </li>
				   <?php
						endwhile;
						wp_reset_postdata();
					?>
				</ul>
			</div>
		</section>

		<section class="mb-5">
			<div class="row">
				<?php
					$args = array(
						'category_name' => 'promotion',
						'posts_per_page' => 3,
						);
					$the_query = new WP_Query( $args );
				?>
				<?php while ( $the_query->have_posts() ) : $the_query->the_post(); ?>
				<div class="col-md-4">
					<div class="img-banner-promotion">
						<a href="<?php the_permalink(); ?>">
							<img class="fix-img-cover" src="<?php the_post_thumbnail_url('full'); ?>">
						</a>
					</div>
				</div>
				<?php endwhile; wp_reset_postdata(); ?>
			</div>
		</section>

		<section class="mb-5 tab-hot">
			<div class="col-12 position-relative">
				<hr class="hr-respon">
				<ul class="nav navbar-nav border-tab nav-tabs nav-link-thee">
			      <li><a href="<?php echo get_term_link( 18 ,'product_cat') ?>"><h1>สินค้าขายดี</h1></a></li>
				  <li><a href="<?php echo get_term_link( 19 ,'category') ?>"><h1>โปรโมชั่น</h1></a></li>
				  <li><a href="<?php echo get_term_link( 20 ,'category') ?>"><h1>สินค้ากำลังมา</h1></a></li>
			    </ul>
			</div>
			<div class="tab-content">
			  <div class="tab-pane fade in active">
			    	<div class="row">
			    		<div class="col-md-4">
			    			<?php
								$args = array(
									'category_name' => 'coming',
									'posts_per_page' => 1,
									);
								$the_query = new WP_Query( $args );
							?>
							<?php while ( $the_query->have_posts() ) : $the_query->the_post(); ?>
			    			<div class="hot-product-img position-relative">
			    				<img class="fix-img-cover" src="<?php the_post_thumbnail_url('full'); ?>">
			    				<div class="hot-product-btn">
			    					<a href="<?php the_permalink(); ?>"  type="button" class="btn">ดูรายละเอียด</a>
			    				</div>
			    			</div>
			    			<?php endwhile; wp_reset_postdata(); ?>
			    		</div>
			    		<div class="col-md-8">
			    			<ul id="hotnew">
			    				<?php
									$args = array(
										'post_type' => 'product',
										'product_cat' => 'product_hot',
										'posts_per_page' => 10,
										);
									$loop = new WP_Query( $args );
										while ( $loop->have_posts() ) : $loop->the_post();
										global $woocommerce;
										$currency = get_woocommerce_currency_symbol();
										$price = get_post_meta( get_the_ID(), '_regular_price', true);
										$sale = get_post_meta( get_the_ID(), '_sale_price', true);
								?>
						 	  <li>
						  		<div class="panel panel-default position-relative">
								  <div class="panel-home position-relative">
								  	<div class="slide-img">
								  		<img class="fix-img-cover" src="<?php the_post_thumbnail_url('full'); ?>">
								  	</div>
								  	<!-- Detail -->
								  	<div class="slide-category">
								  		<a href="<?php the_permalink(); ?>" class="category-color">
								  			<?php global $post, $product;
										    $categ = $product->get_categories();
										    echo $categ; 
										    ?>
								  		</a>
								  	</div>
								  	<div class="font-title">
								  		<a href="#" class="title-color"><?php the_title(); ?></a>
								  	</div>
								  		<div class="rating-custom">
										    <?php wc_get_template( 'single-product/rating.php' ); ?>
										</div>
								  	<div class="color-red text-price">
								  		<span><?php echo " " . get_woocommerce_currency_symbol().$product->get_sale_price(); ?></span>
								  		<span class="ch-sale-price"><?php echo $price; echo $currency;?></span>
								  	</div>
								  	<div class="overlay-icon">
							  			<a href="#" class="icon-btu-hover"><i class="far fa-heart"></i></a>
							  			<a href="#" class="icon-btu-hover"><i class="fas fa-sync-alt"></i></a>
							  			<a href="#" class="icon-btu-hover"><i class="fas fa-phone-volume"></i></a>
								  	</div>
								  	<div class="overlay">
								  		<a href="<?php echo esc_url( home_url( '/' ) ); ?> " data-quantity="1" data-product_id="<?php echo $product->id; ?>" 
								  			class="button alt ajax_add_to_cart add_to_cart_button product_type_simple btn-add-cart" onClick="window.location.reload()">
										    ใส่ตะกร้า
										</a>
								  	</div>
								  	<div class="sale-icon">
								  		<?php 
											if($product->regular_price > 0){
											$percentage = round( ( ( $product->regular_price - $product->sale_price ) / $product->regular_price ) * 100 );
											if($percentage < 100){
											echo apply_filters( 'woocommerce_sale_flash', '<span>' . __( 'ลดราคา '. $percentage . '%', 'woocommerce' ) . '</span>', $post, $product ); 
											}
											}
										?>
								  	</div>
								  </div>
								</div>
							  </li>
							 	<?php
									endwhile;
									wp_reset_postdata();
								?>
							</ul>
			    		</div>
			    	</div>
			  </div>
			</div>
		</section>

		<section class="mb-5">
			<div class="row">
				<?php
					$args = array(
						'category_name' => 'discountpromotions',
						'posts_per_page' => 2,
						);
					$the_query = new WP_Query( $args );
				?>
				<?php while ( $the_query->have_posts() ) : $the_query->the_post(); ?>
				<div class="col-md-6">
					<a href="<?php the_permalink(); ?>">
						<div class="img-banner-promotion">
							<img class="fix-img-cover" src="<?php the_post_thumbnail_url('full'); ?>">
						</div>
					</a>
				</div>
				<?php endwhile; wp_reset_postdata(); ?>
			</div>
		</section>

		<section class="mb-5">
			<div class="row">
				<div class="col-md-2 pr-0">
					<h3>ม่านหน้าต่างกันยุง</h3>
				</div>
				<div class="col-md-10">
					<hr>
				</div>
			</div>
			
			<ul id="category-1">
				<?php
					$args = array(
						'post_type' => 'product',
						'product_cat' => 'mosquitocurtainwindow',
						'posts_per_page' => 8,
						);
					$the_query = new WP_Query( $args );
				?>
				<?php while ( $the_query->have_posts() ) : $the_query->the_post(); ?>
				<li>
					<div class="panel panel-default">
					  <div class="panel-body">
					  	<div class="row">
					  		<div class="col-md-5 pr-5px">
					  			<div class="fix-img-100">
					  				<a href="<?php the_permalink(); ?>">
					  					<img class="fix-img-cover" src="<?php the_post_thumbnail_url('full'); ?>">
					  				</a>
					  			</div>
					  		</div>
					  		<div class="col-md-7 pl-5px">
					  			<div class="slide-category">
							  		<a href="<?php the_permalink(); ?>" class="category-color">
							  			<?php global $post, $product;
										    $categ = $product->get_categories();
										    echo $categ; 
									    ?>
							  		</a>
							  	</div>
							  	<div class="font-title">
							  		<a href="<?php the_permalink(); ?>" class="title-color"><?php the_title(); ?></a>
							  	</div>
							  	<div class="rating-custom">
							  		<?php wc_get_template( 'single-product/rating.php' ); ?>
							  	</div>
							  	<div class="color-red text-price">
							  		<span><?php echo $price; echo $currency;?></span>
							  	</div>
					  		</div>
					  	</div>
					  </div>
					</div>
				</li>
				<?php endwhile; wp_reset_postdata(); ?>
			</ul>
		</section>



		<section class="mb-5">
			<div class="row">
				<div class="col-md-2 pr-0">
					<h3>ผ้าม่านกันยุงลายเส้นตรง</h3>
				</div>
				<div class="col-md-10">
					<hr>
				</div>
			</div>
			
			<ul id="category-2">
				<?php
					$args = array(
						'post_type' => 'product',
						'product_cat' => 'mosquitocurtain',
						'posts_per_page' => 8,
						);
					$the_query = new WP_Query( $args );
				?>
				<?php while ( $the_query->have_posts() ) : $the_query->the_post(); ?>
				<li>
					<div class="panel panel-default">
					  <div class="panel-body">
					  	<div class="row">
					  		<div class="col-md-7 pr-5px">
					  			<div class="slide-category">
							  		<a href="<?php the_permalink(); ?>" class="category-color">
							  			<?php global $post, $product;
										    $categ = $product->get_categories();
										    echo $categ; 
									    ?>
							  		</a>
							  	</div>
							  	<div class="font-title">
							  		<a href="<?php the_permalink(); ?>" class="title-color"><?php the_title(); ?></a>
							  	</div>
							  	<div class="rating-custom">
							  		<?php wc_get_template( 'single-product/rating.php' ); ?>
							  	</div>
							  	<div class="color-red text-price">
							  		<span><?php echo $price; echo $currency;?></span>
							  	</div>
					  		</div>
					  		<div class="col-md-5 pl-5px">
					  			<div class="fix-img-100">
					  				<a href="<?php the_permalink(); ?>">
					  					<img class="fix-img-cover" src="<?php the_post_thumbnail_url('full'); ?>">
					  				</a>
					  			</div>
					  		</div>
					  	</div>
					  </div>
					</div>
				</li>
				<?php endwhile; wp_reset_postdata(); ?>
			</ul>
		</section>
		<section class="mb-5">
			<div class="row">
				<div class="col-md-2 pr-0">
					<h3>ผ้าม่านหน้าต่างกันยุงลายนกฮูก</h3>
				</div>
				<div class="col-md-10">
					<hr>
				</div>
			</div>
			
			<ul id="category-2">
				<?php
					$args = array(
						'post_type' => 'product',
						'product_cat' => 'owlwindowmosquitocurtain',
						'posts_per_page' => 8,
						);
					$the_query = new WP_Query( $args );
				?>
				<?php while ( $the_query->have_posts() ) : $the_query->the_post(); ?>
				<li>
					<div class="panel panel-default">
					  <div class="panel-body">
					  	<div class="row">
					  		<div class="col-md-7 pr-5px">
					  			<div class="slide-category">
							  		<a href="<?php the_permalink(); ?>" class="category-color">
							  			<?php global $post, $product;
										    $categ = $product->get_categories();
										    echo $categ; 
									    ?>
							  		</a>
							  	</div>
							  	<div class="font-title">
							  		<a href="<?php the_permalink(); ?>" class="title-color"><?php the_title(); ?></a>
							  	</div>
							  	<div class="rating-custom">
							  		<?php wc_get_template( 'single-product/rating.php' ); ?>
							  	</div>
							  	<div class="color-red text-price">
							  		<span><?php echo $price; echo $currency;?></span>
							  	</div>
					  		</div>
					  		<div class="col-md-5 pl-5px">
					  			<div class="fix-img-100">
					  				<a href="<?php the_permalink(); ?>">
					  					<img class="fix-img-cover" src="<?php the_post_thumbnail_url('full'); ?>">
					  				</a>
					  			</div>
					  		</div>
					  	</div>
					  </div>
					</div>
				</li>
				<?php endwhile; wp_reset_postdata(); ?>
			</ul>
		</section>

		<section class="mb-5">
			<?php
				$args = array(
					'post_type' => 'pomotion_footer',
					'posts_per_page' => 1,
					);
				$the_query = new WP_Query( $args );
			?>
			<?php while ( $the_query->have_posts() ) : $the_query->the_post(); ?>
			<div class="fix-banner-footer">
				<a href="<?php the_permalink(); ?>">
					<img class="fix-img-cover" src="<?php the_post_thumbnail_url('full'); ?>">
				</a>
			</div>
			<?php endwhile; wp_reset_postdata(); ?>
		</section>

		<section class="mb-5">
			<div class="row">
				<div class="col-md-2">
					<h1>บทความ & ข่าวสาร</h1>
				</div>
				<div class="col-md-10">
					<hr>
				</div>
			</div>
			<ul id="news">
				<?php
					$args = array(
						'post_type' => 'news',
						'posts_per_page' => 10,
						);
					$the_query = new WP_Query( $args );
				?>
				<?php while ( $the_query->have_posts() ) : $the_query->the_post(); ?>
				<li>
					<div class="panel panel-default">
						<div class="fix-img-news">
							<a href="<?php the_permalink(); ?>">
					  			<img class="fix-img-cover" src="<?php the_post_thumbnail_url('full'); ?>">
					  		</a>
					  	</div>
						<div class="panel-body">
						  	<div class="post-date"><?php the_date(); ?></div>
						  	<div class="font-title font-title-news">
								<a href="<?php the_permalink(); ?>" class="title-color font-bold">
									<?php the_title(); ?>
								</a>
							</div>
							<hr class="hr-news">
							<div class="post-excerpt">
								<p><?php the_excerpt(); ?></p>
							</div>
						</div>
					</div>
				</li>
				<?php endwhile; wp_reset_postdata(); ?>
			</ul>
		</section>
	</div>

</main><!--.site-main-->



<?php get_footer(); ?>

<script type="text/javascript">
	jQuery('.owl-carousel').owlCarousel({
	    loop:true,
	    margin:10,
	    animateOut: 'fadeOut',
	    autoplay:true,
		autoplayTimeout:3000,
		autoplayHoverPause:false,
	    nav:true,
	    items:1,
	});
	jQuery(document).ready(function() {
    jQuery('#slideproduct1').lightSlider({
	        item:6,
	        loop:false,
	        slideMove:2,
	        easing: 'cubic-bezier(0.25, 0, 0.25, 1)',
	        speed:600,
	        responsive : [
	            {
	                breakpoint:1599,
	                settings: {
	                    item:5,
	                    slideMove:1,
	                    slideMargin:6,
	                  }
	            },
	            {
	                breakpoint:1199,
	                settings: {
	                    item:4,
	                    slideMove:1,
	                    slideMargin:6,
	                  }
	            },
	            {
	                breakpoint:768,
	                settings: {
	                    item:2,
	                    slideMove:1,
	                    slideMargin:6,
	                  }
	            },
	            {
	                breakpoint:576,
	                settings: {
	                    item:2,
	                    slideMove:1
	                  }
	            },
	        ]
	    });  
	  });
	  jQuery(document).ready(function() {
	    jQuery('#hotnew').lightSlider({
	        item:4,
	        loop:false,
	        slideMove:2,
	        easing: 'cubic-bezier(0.25, 0, 0.25, 1)',
	        speed:600,
	        responsive : [
	            {
	                breakpoint:1600,
	                settings: {
	                    item:3,
	                    slideMove:1,
	                    slideMargin:6,
	                  }
	            },
	            {
	                breakpoint:991,
	                settings: {
	                    item:3,
	                    slideMove:1,
	                    slideMargin:6,
	                  }
	            },
	            {
	                breakpoint:768,
	                settings: {
	                    item:2,
	                    slideMove:1,
	                    slideMargin:6,
	                  }
	            },
	            {
	                breakpoint:576,
	                settings: {
	                    item:2,
	                    slideMove:1
	                  }
	            },
	        ]
	    });  
	  });


	  jQuery(document).ready(function() {
	    jQuery('#category-1').lightSlider({
	        item:4,
	        loop:false,
	        slideMove:2,
	        easing: 'cubic-bezier(0.25, 0, 0.25, 1)',
	        speed:600,
	        responsive : [
	        	{
	                breakpoint:1599,
	                settings: {
	                    item:3,
	                    slideMove:1,
	                    slideMargin:6,
	                  }
	            },
	            {
	                breakpoint:1199,
	                settings: {
	                    item:2,
	                    slideMove:1,
	                    slideMargin:6,
	                  }
	            },
	            {
	                breakpoint:769,
	                settings: {
	                    item:2,
	                    slideMove:1,
	                    slideMargin:6,
	                  }
	            },
	            {
	                breakpoint:576,
	                settings: {
	                    item:2,
	                    slideMove:1
	                  }
	            },
	        ]
	    });  
	  });
	  jQuery(document).ready(function() {
	    jQuery('#category-2').lightSlider({
	        item:4,
	        loop:false,
	        slideMove:2,
	        easing: 'cubic-bezier(0.25, 0, 0.25, 1)',
	        speed:600,
	        responsive : [
	           {
	                breakpoint:1599,
	                settings: {
	                    item:3,
	                    slideMove:1,
	                    slideMargin:6,
	                  }
	            },
	            {
	                breakpoint:1199,
	                settings: {
	                    item:2,
	                    slideMove:1,
	                    slideMargin:6,
	                  }
	            },
	            {
	                breakpoint:769,
	                settings: {
	                    item:2,
	                    slideMove:1,
	                    slideMargin:6,
	                  }
	            },
	            {
	                breakpoint:576,
	                settings: {
	                    item:2,
	                    slideMove:1
	                  }
	            },
	        ]
	    });  
	  });
	  jQuery(document).ready(function() {
	    jQuery('#category-3').lightSlider({
	        item:4,
	        loop:false,
	        slideMove:2,
	        easing: 'cubic-bezier(0.25, 0, 0.25, 1)',
	        speed:600,
	        responsive : [
	            {
	                breakpoint:1599,
	                settings: {
	                    item:3,
	                    slideMove:1,
	                    slideMargin:6,
	                  }
	            },
	            {
	                breakpoint:1199,
	                settings: {
	                    item:2,
	                    slideMove:1,
	                    slideMargin:6,
	                  }
	            },
	            {
	                breakpoint:769,
	                settings: {
	                    item:2,
	                    slideMove:1,
	                    slideMargin:6,
	                  }
	            },
	            {
	                breakpoint:480,
	                settings: {
	                    item:2,
	                    slideMove:1
	                  }
	            }
	        ]
	    });  
	  });
	  jQuery(document).ready(function() {
	    jQuery('#news').lightSlider({
	        item:5,
	        loop:false,
	        slideMove:2,
	        easing: 'cubic-bezier(0.25, 0, 0.25, 1)',
	        speed:600,
	        responsive : [
	        	{
	                breakpoint:1599,
	                settings: {
	                    item:4,
	                    slideMove:1,
	                    slideMargin:6,
	                  }
	            },
	            {
	                breakpoint:1199,
	                settings: {
	                    item:3,
	                    slideMove:1,
	                    slideMargin:6,
	                  }
	            },
	            {
	                breakpoint:991,
	                settings: {
	                    item:2,
	                    slideMove:1,
	                    slideMargin:6,
	                  }
	            },
	            {
	                breakpoint:768,
	                settings: {
	                    item:2,
	                    slideMove:1,
	                    slideMargin:6,
	                  }
	            },
	            {
	                breakpoint:576,
	                settings: {
	                    item:2,
	                    slideMove:1
	                  }
	            }
	        ]
	    });  
	  });

</script>