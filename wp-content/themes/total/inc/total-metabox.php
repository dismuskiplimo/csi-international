<?php
/**
 *
 * @package Total
 */

/**
 * Adds a box to the main column on the Post and Page edit screens.
 */
function total_sidebar_layout_meta_box(){

	$screens = array( 'post', 'page' );

	add_meta_box(
		'total_sidebar_layout',
		__( 'Sidebar Layout', 'total' ),
		'total_sidebar_layout_meta_box_callback',
		$screens,
		'normal',
		'high'
	);
}

add_action( 'add_meta_boxes', 'total_sidebar_layout_meta_box' );

/**
 * Prints the box content.
 * 
 * @param WP_Post $post The object for the current post/page.
 */
function total_sidebar_layout_meta_box_callback( $post ){

	// Add a nonce field so we can check for it later.
	wp_nonce_field( 'total_sidebar_layout_save_meta_box', 'total_sidebar_layout_meta_box_nonce' );

	/*
	 * Use get_post_meta() to retrieve an existing value
	 * from the database and use the value for the form.
	 */
	$total_sidebar_layout = get_post_meta( $post->ID, 'total_sidebar_layout', true );

	if(!$total_sidebar_layout){
		$total_sidebar_layout = 'right_sidebar';
	}

	echo '<label>';
	echo '<input type="radio" name="total_sidebar_layout" value="right_sidebar" '.checked( $total_sidebar_layout, 'right_sidebar', false ).' />';
	echo '<img src="'.get_template_directory_uri().'/inc/css/right-sidebar.jpg"/>';
	echo '</label>';

	echo '<label>';
	echo '<input type="radio" name="total_sidebar_layout" value="left_sidebar" '.checked( $total_sidebar_layout, 'left_sidebar', false ).' />';
	echo '<img src="'.get_template_directory_uri().'/inc/css/left-sidebar.jpg"/>';
	echo '</label>';
	
	echo '<label>';
	echo '<input type="radio" name="total_sidebar_layout" value="no_sidebar" '.checked( $total_sidebar_layout, 'no_sidebar', false ).' />';
	echo '<img src="'.get_template_directory_uri().'/inc/css/no-sidebar.jpg"/>';
	echo '</label>';

	echo '<label>';
	echo '<input type="radio" name="total_sidebar_layout" value="no_sidebar_condensed" '.checked( $total_sidebar_layout, 'no_sidebar_condensed', false ).' />';
	echo '<img src="'.get_template_directory_uri().'/inc/css/no-sidebar-condensed.jpg"/>';
	echo '</label>';
}

/**
 * When the post is saved, saves our custom data.
 *
 * @param int $post_id The ID of the post being saved.
 */
function total_sidebar_layout_save_meta_box( $post_id ){

	/*
	 * We need to verify this came from our screen and with proper authorization,
	 * because the save_post action can be triggered at other times.
	 */

	// Check if our nonce is set.
	if ( ! isset( $_POST['total_sidebar_layout_meta_box_nonce'] ) ) {
		return;
	}

	// Verify that the nonce is valid.
	if ( ! wp_verify_nonce( $_POST['total_sidebar_layout_meta_box_nonce'], 'total_sidebar_layout_save_meta_box' ) ) {
		return;
	}

	// If this is an autosave, our form has not been submitted, so we don't want to do anything.
	if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) {
		return;
	}

	// Check the user's permissions.
	if ( ! current_user_can( 'edit_post', $post_id ) ) {
		return;
	}

	/* OK, it's safe for us to save the data now. */
	
	// Make sure that it is set.
	if ( isset( $_POST['total_sidebar_layout'] ) ) {
		// Sanitize user input.
		$total_data = sanitize_text_field( $_POST['total_sidebar_layout'] );
		// Update the meta field in the database.
		update_post_meta( $post_id, 'total_sidebar_layout', $total_data );
	}
		
}

add_action( 'save_post', 'total_sidebar_layout_save_meta_box' );