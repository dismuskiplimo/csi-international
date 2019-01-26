<?php
if( ! defined( 'ABSPATH' ) ){
	exit; // Exit if accessed directly
}
?>

<meta http-equiv="refresh" content="3; admin.php?page=be-options" />

<div style="margin:20px 0;">

	<h3><?php esc_html_e( 'BeTheme Options', 'mfn-opts' ) ?></h3>
	
	<p><?php _e( 'This page has been moved to <strong>BeTheme > Theme Options</strong>.', 'mfn-opts' ) ?></p>
	<p><?php esc_html_e( 'Redirecting in 3 seconds...', 'mfn-opts' ) ?></p>
	<p><?php echo sprintf( __( 'If you are not redirected automatically, follow this <a href="%s">link to theme options</a>.', 'mfn-opts' ), 'admin.php?page=be-options' ) ?></p>

</div>
