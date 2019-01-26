<?php
/**
 *
 * @package Total
 */

if(get_theme_mod('total_team_section_disable') != 'on' ){ ?>
<section id="ht-team-section" class="ht-section">
	<div class="ht-container">
		<?php
		$total_team_title = get_theme_mod('total_team_title');
		$total_team_sub_title = get_theme_mod('total_team_sub_title');
		?>
		<?php if( $total_team_title || $total_team_sub_title ){ ?>
			<div class="ht-section-title-tagline">
				<?php if($total_team_title){ ?>
				<h2 class="ht-section-title"><?php echo esc_html($total_team_title); ?></h2>
				<?php } ?>

				<?php if($total_team_sub_title){ ?>
				<div class="ht-section-tagline"><?php echo esc_html($total_team_sub_title); ?></div>
				<?php } ?>
			</div>
		<?php } ?>

		<div class="ht-team-member-wrap ht-clearfix">
			<?php 
			for( $i = 1; $i < 5; $i++ ){
				$total_team_page_id = get_theme_mod('total_team_page'.$i); 
				$total_team_page_icon = get_theme_mod('total_team_page_icon'.$i);
			
				if($total_team_page_id){
					$args = array( 'page_id' => absint($total_team_page_id) );
					$query = new WP_Query($args);
					if($query->have_posts()):
						while($query->have_posts()) : $query->the_post();
						$total_image = wp_get_attachment_image_src(get_post_thumbnail_id(),'total-team-thumb');	
						$total_team_designation = get_theme_mod('total_team_designation'.$i);
						$total_team_facebook = get_theme_mod('total_team_facebook'.$i);
						$total_team_twitter = get_theme_mod('total_team_twitter'.$i);
						$total_team_google_plus = get_theme_mod('total_team_google_plus'.$i);
					?>
						<div class="ht-team-member">
							
							<div class="ht-team-member-image">
								<?php if( has_post_thumbnail() ){
									$image_url = $total_image[0];
								}else{
									$image_url = get_template_directory_uri().'/images/team-thumb.png';
								} ?>
								
								<img src="<?php echo esc_url($image_url);?>" alt="<?php the_title(); ?>" />
								<div class="ht-title-wrap">
								<h6><?php the_title(); ?></h6>
								</div>

								<a href="<?php the_permalink(); ?>" class="ht-team-member-excerpt">
									<div class="ht-team-member-excerpt-wrap">
									<div class="ht-team-member-span">
                                        <h6><?php the_title(); ?></h6>
								
        								<?php if($total_team_designation){ ?>
        									<div class="ht-team-designation"><?php echo esc_html($total_team_designation); ?></div>
        								<?php }
                                    
										if(has_excerpt()){
											echo get_the_excerpt();
										}else{
											echo total_excerpt( get_the_content() , 100 );
										}
									?>
									<div class="ht-team-detail"><?php _e('Detail', 'total') ?></div>
									</div>
									</div>
								</a>
							</div>	

							<?php if( $total_team_facebook || $total_team_twitter || $total_team_google_plus ){ ?>
								<div class="ht-team-social-id">
									<?php if($total_team_facebook){ ?>
									<a target="_blank" href="<?php echo esc_url($total_team_facebook) ?>"><i class="fa fa-facebook"></i></a>
									<?php } ?>

									<?php if($total_team_twitter){ ?>
									<a target="_blank" href="<?php echo esc_url($total_team_twitter) ?>"><i class="fa fa-twitter"></i></a>
									<?php } ?>

									<?php if($total_team_google_plus){ ?>
									<a target="_blank" href="<?php echo esc_url($total_team_google_plus) ?>"><i class="fa fa-google-plus"></i></a>
									<?php } ?>
								</div>
							<?php } ?>
						</div>
					
					<?php
					endwhile;
					endif;	
					wp_reset_postdata();
				}
			}
			?>
		</div>
	</div>
</section>
<?php }