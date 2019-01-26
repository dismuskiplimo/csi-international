<?php
/**
 *
 * @package Total
 */

if(get_theme_mod('total_testimonial_section_disable') != 'on' ){ ?>
<section id="ht-testimonial-section" class="ht-section">
	<div class="ht-container">
		<?php
		$total_testimonial_title = get_theme_mod('total_testimonial_title');
		$total_testimonial_sub_title = get_theme_mod('total_testimonial_sub_title');
		?>
		<?php if($total_testimonial_title || $total_testimonial_sub_title){ ?>
		<div class="ht-section-title-tagline">
		<?php if($total_testimonial_title){ ?>
		<h2 class="ht-section-title"><?php echo esc_html($total_testimonial_title); ?></h2>
		<?php } ?>

		<?php if($total_testimonial_sub_title){ ?>
		<div class="ht-section-tagline"><?php echo esc_html($total_testimonial_sub_title); ?></div>
		<?php } ?>
		</div>
		<?php } ?>

		<div class="ht-testimonial-wrap">
			<div class="ht-testimonial-slider owl-carousel">
			<?php 
			$total_testimonial_page = get_theme_mod('total_testimonial_page');

				if(is_array($total_testimonial_page)){
					$args = array(
						'post_type' => 'page',
						'post__in' => $total_testimonial_page,
						'posts_per_page' => 12
				 		);
					$query = new WP_Query($args);
					if($query->have_posts()):
						while($query->have_posts()) : $query->the_post();
						$total_image = wp_get_attachment_image_src(get_post_thumbnail_id(),'total-thumb');
					?>
						<div class="ht-testimonial">
							<div class="ht-testimonial-excerpt">
							<i class="fa fa-quote-left"></i>
							<?php 
							if(has_excerpt()){
								echo get_the_excerpt();
							}else{
								echo total_excerpt( get_the_content(), 300 );
							}
							?>
							</div>
							<?php
								if(has_post_thumbnail()){
									?>
									<img src="<?php echo esc_url($total_image[0]) ?>" alt="<?php the_title(); ?>">
									<?php
								}
							?>
							<h6><?php the_title(); ?></h6>
						</div>
					<?php
					endwhile;
					endif;	
					wp_reset_postdata();
				}
			?>
			</div>
		</div>
	</div>	
</section>
<?php }