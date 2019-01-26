<?php
/**
 *
 * @package Total
 */

if(get_theme_mod('total_cta_section_disable') != 'on' ){ ?>
<section id="ht-cta-section" data-stellar-background-ratio="0.5">
    <div class="ht-cta-section ht-section">
    	<div class="ht-cta-overlay"></div>
    	<div class="ht-container">
    		<?php
    		$total_cta_title = get_theme_mod('total_cta_title');
    		$total_cta_sub_title = get_theme_mod('total_cta_sub_title');
    		$total_cta_button1_text = get_theme_mod('total_cta_button1_text');
    		$total_cta_button1_link = get_theme_mod('total_cta_button1_link');
    		$total_cta_button2_text = get_theme_mod('total_cta_button2_text');
    		$total_cta_button2_link = get_theme_mod('total_cta_button2_link');
    		?>
    		<?php if($total_cta_title || $total_cta_sub_title){ ?>
    		<div class="ht-section-title-tagline">
    		<?php if($total_cta_title){ ?>
    		<h2 class="ht-section-title"><?php echo esc_html($total_cta_title); ?></h2>
    		<?php } ?>
    
    		<?php if($total_cta_sub_title){ ?>
    		<div class="ht-section-tagline"><?php echo esc_html($total_cta_sub_title); ?></div>
    		<?php } ?>
    		</div>
    		<?php } ?>
    
    		<?php 
    		if($total_cta_button1_link || $total_cta_button2_link){
    		?>
    		<div class="ht-cta-buttons">
    
    		<?php if($total_cta_button1_link){ ?>
    		<a class="ht-cta-button1" href="<?php echo esc_url($total_cta_button1_link); ?>"><?php echo esc_html($total_cta_button1_text); ?></a>
    		<?php } ?>
    
    		<?php if($total_cta_button2_link){ ?>
    		<a class="ht-cta-button2" href="<?php echo esc_url($total_cta_button2_link); ?>"><?php echo esc_html($total_cta_button2_text); ?></a>
    		<?php } ?>
    
    		</div>
    		<?php
    		}
    		?>
    
    	</div>
    </div>
</section>
<?php }