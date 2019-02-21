<?php
/**
 * The header for our theme.
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package seed
 */
?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="http://gmpg.org/xfn/11">
	<link href="https://fonts.googleapis.com/css?family=Roboto:100,100i,300,300i,400,400i,500,500i,700,700i,900,900i" rel="stylesheet">
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.1/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
	<link type="text/css" rel="stylesheet" href="wp-content/themes/seed/vendor/OwlCarousel2-develop/dist/assets/owl.carousel.css" />
	<link type="text/css" rel="stylesheet" href="wp-content/themes/seed/vendor/lightslider/dist/css/lightslider.css" />
	<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
	<?php wp_head(); ?>
</head>

<?php $bodyClass = ''; if (is_active_sidebar( 'headbar' )) { $bodyClass = 'has-headbar'; } ?>

<body <?php body_class($bodyClass); ?>>
	<a class="skip-link screen-reader-text" href="#content"><?php esc_html_e( 'Skip to content', 'seed' ); ?></a>
	<div id="page" class="site -layout-<?php echo SEED_LAYOUT; ?> -header-mobile-<?php echo SEED_HEADER_MOBILE; ?> -header-desktop-<?php echo SEED_HEADER_DESKTOP; ?> -menu-<?php echo SEED_MENU; ?> -menu-icon-<?php echo SEED_MENU_ICON; ?> -shop-layout-<?php echo SEED_SHOP_LAYOUT; ?>">
		
		<nav id="site-mobile-navigation" class="site-mobile-navigation <?php if(SEED_MENU == 'off-canvas') { echo 'sb-slidebar sb-right'; } else { echo '-dropdown'; } ?> _mobile _heading" role="navigation">
			<?php wp_nav_menu( array( 'theme_location' => 'mobile', 'menu_id' => 'mobile-menu' ) ); ?>
			<?php if(is_active_sidebar('top-right')) { ?><div class="mobile-widget"><?php dynamic_sidebar( 'top-right' ); ?></div><?php } ?>
		</nav>

		<header id="masthead" class="bg-black-nav py-10px haed-top" role="banner">
			<div class="container content-page">
				<div class="d-flex">
					<ul class="nav navbar-nav navbar-color">
					<?php
						$args = array(
							'post_type' => 'contact',
							);
						$the_query = new WP_Query( $args );
					?>
					<?php while ( $the_query->have_posts() ) : $the_query->the_post(); ?>
				      <li class="border-menu-mail">Email: <?php $key="email"; echo get_post_meta($post->ID, $key, true); ?></li>
				      <li class="border-menu-mail"><?php $key="content"; echo get_post_meta($post->ID, $key, true); ?></li>
				      <?php endwhile; wp_reset_postdata(); ?>
				    </ul>

				    <?php
						if ( is_user_logged_in() ) {
							global $current_user;
							get_currentuserinfo();

							echo '<ul id="mem" class="clearfix nav navbar-nav navbar-color ml-auto">
							            <li class="border-menu-mail"><a href="'. wp_logout_url( get_permalink( woocommerce_get_page_id( 'myaccount' ) ) ) .'">'.$current_user->display_name.'</a></li>
							            <li class="border-menu-mail"><a href="'. wp_logout_url( get_permalink( woocommerce_get_page_id( 'myaccount' ) ) ) .'">Logout</a></li>
							        </ul>';
							} else {
							echo '<ul id="mem" class="clearfix nav navbar-nav navbar-color ml-auto">
							            <li class="border-menu-mail"><a href="">Register</a></li>
							            <li class="border-menu-mail"><a href="http://localhost/importchina/%E0%B9%80%E0%B8%82%E0%B9%89%E0%B8%B2%E0%B8%AA%E0%B8%B9%E0%B9%88%E0%B8%A3%E0%B8%B0%E0%B8%9A%E0%B8%9A/">Login</a></li>
							        </ul>';
							}
					?>
				</div>
			</div>
		</header>

		<header id="masthead" class="bg-white haed-top" role="banner">	
			<div class="container content-page">
				<div class="row">
					<div class="col-md-3">
						<div class="site-logo"><?php if(function_exists('the_custom_logo')) {the_custom_logo();} ?></div>
						<div class="site-branding">
							<?php if ( is_front_page() && is_home() ) : ?>
								<h1 class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h1>
							<?php else : ?>
								<p class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></p>
							<?php endif; ?>

							<?php 
							$description = get_bloginfo( 'description', 'display' );
							if ( $description || is_customize_preview() ) : ?>
							<p class="site-description"><?php echo $description; /* WPCS: xss ok. */ ?></p><?php endif; ?>
						</div><!--site-branding-->
					</div>
					<div class="col-md-5">
						<div class="search-width">
								<?php get_search_form(); ?>
						</div>
					</div>
					<div class="col-md-4 my-20px">
						<div class="col-xs-5 float-right px-5px">
							<a href="#">
								<div>
									<div class="col-xs-6 px-5px">
										<div class="text-right text-icon-head">
											<i class="fas fa-shopping-cart"></i>
										</div>
									</div>
									<div class="col-xs-6 px-5px">
										<a href="<?php echo wc_get_cart_url(); ?>">
										<div class="icon-number-header">
											<?php echo sprintf ( _n( '', '%d ', WC()->cart->get_cart_contents_count() ), WC()->cart->get_cart_contents_count() ); ?>
										</div>
										<div class="icon-content-head">
											<p>My cart</p>
										</div>
										</a>
									</div>
								</div>
							</a>
						</div>
<!-- 						<div class="col-xs-5 float-right px-5px">
							<a href="#">
								<div>
									<div class="col-xs-6 px-5px">
										<div class="text-right text-icon-head">
											<i class="fas fa-heart"></i>
										</div>
									</div>
									<div class="col-xs-6 px-5px">
										<div class="icon-number-header">
											<span>0</span>
										</div>
										<div class="icon-content-head">
											<p>Wishlist</p>
										</div>
									</div>
								</div>
							</a>
						</div> -->
					</div>
				</div>
				
			</div><!--container-->
		</header>
		
		<header id="masthead" class="navbar-herder-2" role="banner">
			<div class="container content-page">

				<a class="site-toggle <?php if(SEED_MENU == 'off-canvas') { echo 'sb-toggle-right'; } ?> _mobile">
					<i><span></span><span></span><span></span><span></span></i><b><?php esc_html_e( 'Menu', 'seed' ); ?></b>
				</a>

				<?php if ($bodyClass == 'has-headbar'): ?>
					<div id="headbar" class="_desktop"><?php dynamic_sidebar( 'headbar' ); ?></div>
				<?php else: ?>
					<div class="site-top-right _desktop"><?php dynamic_sidebar( 'top-right' ); ?></div>
					<nav id="site-desktop-navigation" class="site-desktop-navigation _desktop" role="navigation">
						<?php wp_nav_menu( array( 'theme_location' => 'primary', 'menu_id' => 'primary-menu' ) ); ?>
					</nav>
					<?php
						$args = array(
							'post_type' => 'contact',
							);
						$the_query = new WP_Query( $args );
					?>
					<?php while ( $the_query->have_posts() ) : $the_query->the_post(); ?>
					<p class="font-phone"><i class="fas fa-mobile-alt phone-icon"></i> <?php $key="phone"; echo get_post_meta($post->ID, $key, true); ?></p>
					<?php endwhile; wp_reset_postdata(); ?>
				<?php endif; ?>

				
			</div><!--container-->
		</header><!--site-header-->

		<div id="sb-site" class="site-canvas">

			<div id="content" class="site-content">
