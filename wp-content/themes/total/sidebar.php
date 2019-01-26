<?php
/**
 * The sidebar containing the main widget area.
 *
 * @package Total
 */

$total_sidebar_layout = "right_sidebar";

if( is_singular( array( 'post', 'page' )) ){
	$total_sidebar_layout = get_post_meta( $post->ID, 'total_sidebar_layout', true );
	if(!$total_sidebar_layout){
		$total_sidebar_layout = "right_sidebar";
	}
}

if ( $total_sidebar_layout == "no_sidebar" || $total_sidebar_layout == "no_sidebar_condensed" ) {
	return;
}

if( is_active_sidebar( 'total-right-sidebar' ) &&  $total_sidebar_layout == "right_sidebar" ){
	?>
	<div id="secondary" class="widget-area">
		<?php dynamic_sidebar( 'total-right-sidebar' ); ?>
	</div><!-- #secondary -->
	<?php
}

if( is_active_sidebar( 'total-left-sidebar' ) &&  $total_sidebar_layout == "left_sidebar" ){
	?>
	<div id="secondary" class="widget-area">
		<?php dynamic_sidebar( 'total-left-sidebar' ); ?>
	</div><!-- #secondary -->
	<?php
}