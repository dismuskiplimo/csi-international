<?php
/**
 * The sidebar containing the main widget area.
 *
 * @package Total
 */

if ( ! is_active_sidebar( 'total-shop-sidebar' ) ) {
	return;
}
?>

<div id="secondary" class="widget-area">
	<?php dynamic_sidebar( 'total-shop-sidebar' ); ?>
</div><!-- #secondary -->
