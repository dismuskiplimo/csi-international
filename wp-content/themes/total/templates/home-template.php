<?php
/**
 * Template Name: Home Page
 *
 * @package Total
 */

get_header();

	$total_home_sections = total_home_section();

	foreach ($total_home_sections as $total_home_section) {
		get_template_part( 'template-parts/section', $total_home_section );
	}

get_footer(); 