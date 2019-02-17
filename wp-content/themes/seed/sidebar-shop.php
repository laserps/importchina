<?php
/**
 * The sidebar containing the main widget area.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package seed
 */

if ( ! is_active_sidebar( 'shopbar' ) ) {
	return;
}
?>

<aside id="secondary" class="widget-area -shopbar _heading" role="complementary">
	<?php dynamic_sidebar( 'shopbar' ); ?>
</aside><!-- #secondary -->
