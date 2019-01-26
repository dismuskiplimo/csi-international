<?php
/**
 *
 * @package Total
 */

if(get_theme_mod('total_client_logo_section_disable') != 'on' ){ ?>
<section id="ht-logo-section" class="ht-section">
	<div class="ht-container">
		<?php
		$total_logo_title = get_theme_mod('total_logo_title');
		$total_logo_sub_title = get_theme_mod('total_logo_sub_title');
		?>
		<?php if($total_logo_title || $total_logo_sub_title){ ?>
		<div class="ht-section-title-tagline">
		<?php if($total_logo_title){ ?>
		<h2 class="ht-section-title"><?php echo esc_html($total_logo_title); ?></h2>
		<?php } ?>

		<?php if($total_logo_sub_title){ ?>
		<div class="ht-section-tagline"><?php echo esc_html($total_logo_sub_title); ?></div>
		<?php } ?>
		</div>
		<?php } ?>

		<?php 
		$total_client_logo_image = get_theme_mod('total_client_logo_image');
		$total_client_logo_image = explode(',', $total_client_logo_image);
		?>

		<div class="ht_client_logo_slider owl-carousel">
		<?php
		foreach ($total_client_logo_image as $total_client_logo_image_single) {
			$image = wp_get_attachment_image_src( $total_client_logo_image_single, 'full');
			?>
			<img src="<?php echo esc_url( $image[0] ); ?>">
			<?php
		}
		?>
		</div>
	</div>
</section>
<?php }