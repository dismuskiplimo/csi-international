<?php
/********************** ICON SETTINGS PAGE ******************************/

/*
	Premium Info HTML - Save - Get - Set Default Logic Starts Here
*/
function acx_smw_premium_advert_above_form()
{
 global $acx_si_smw_hide_advert;
if($acx_si_smw_hide_advert == "no")
{ ?>
<div id="acx_asmw_premium">
<a href="#compare" style="margin: 10px 0px 0px 10px; font-weight: bold; font-size: 14px; display: block;"><?php _e("Fully Featured - Acurax Social Media Widget is Available With Tons of Extra Features!","acurax-social-media-widget");?></a><a href="http://clients.acurax.com/order.php?pid=fsmi_power&utm_source=asmw&utm_campaign=day_button" target="_blank" class="buy_now"></a></div> <!-- acx_smw_premium -->
<?php }
	echo "<span class='acx_smw_q_sep'></span>";
}  add_action('acx_smw_hook_option_above_page_left','acx_smw_premium_advert_above_form',50);

/*
	Premium Info HTML - Save - Get - Set Default Logic Starts Here
*/
	/*
	Current Theme HTML - Save - Get - Set Default Logic Starts Here
*/
function acx_smw_current_icon_html()
{
	global $acx_widget_si_icon_size , $acx_widget_si_theme;
	$acx_smw_string = __("Your Current Theme is","acurax-social-media-widget");
	print_acx_smw_option_block_start($acx_smw_string.' ' .$acx_widget_si_theme);	
	 echo "<div class='image_div'>
			<img src='".ACX_SMW_BASE_LOCATION."images/themes/".$acx_widget_si_theme."/twitter.png' style='height:
			".$acx_widget_si_icon_size."px'>
			<img src='".ACX_SMW_BASE_LOCATION."images/themes/".$acx_widget_si_theme."/facebook.png' style='height:
			".$acx_widget_si_icon_size."px'>
			<img src='".ACX_SMW_BASE_LOCATION."images/themes/".$acx_widget_si_theme."/googleplus.png' style='height:
			".$acx_widget_si_icon_size."px'>
			<img src='".ACX_SMW_BASE_LOCATION."images/themes/".$acx_widget_si_theme."/pinterest.png' style='height:
			".$acx_widget_si_icon_size."px'>
			<img src='".ACX_SMW_BASE_LOCATION."images/themes/".$acx_widget_si_theme."/youtube.png' style='height:
			".$acx_widget_si_icon_size."px'>
			<img src='".ACX_SMW_BASE_LOCATION."images/themes/".$acx_widget_si_theme."/linkedin.png' style='height:
			".$acx_widget_si_icon_size."px'>
			<img src='".ACX_SMW_BASE_LOCATION."images/themes/".$acx_widget_si_theme."/feed.png' style='height:
			".$acx_widget_si_icon_size."px'>
			<img src='".ACX_SMW_BASE_LOCATION."images/themes/".$acx_widget_si_theme."/instagram.png' style='height:
			".$acx_widget_si_icon_size."px'>
		</div>"; 
	echo "<span class='acx_smw_q_sep'></span>";
	print_acx_smw_option_block_end();
}  add_action('acx_smw_hook_option_fields','acx_smw_current_icon_html',100);

/*
	Current Theme Save - Get - Set Default Logic Ends Here
*/
/*
	Icon Theme Settings - Save - Get - Set Default Logic Starts Here
*/

function acx_smw_icon_theme_settings_html()
{
	global $smw_total_themes,$acx_widget_si_theme,$social_widget_icon_array_order;
	if(is_serialized($social_widget_icon_array_order))
	{
	$social_widget_icon_array_order = unserialize($social_widget_icon_array_order);
	}
	$acx_smw_string = __('Icon Theme Settings','acurax-social-media-widget');
	print_acx_smw_option_block_start($acx_smw_string);


echo "<div id='acx_widget_si_theme_display' class='widefat'>";
	for ($i=1; $i < $smw_total_themes; $i++)
	{ ?>
		<label class="acx_widget_si_single_theme_display <?php if ($acx_widget_si_theme == $i) { echo "selected"; } ?>" id="icon_selection">
		<div class="acx_widget_si_single_label"><?php _e('Theme','acurax-social-media-widget');?><?php echo $i; ?><br><input type="radio" name="acx_widget_si_theme" value="<?php echo $i; ?>"<?php if ($acx_widget_si_theme == $i) { echo " checked"; } ?>></div>
		<div class="image_div">
			<?php
				foreach ($social_widget_icon_array_order as $key => $value)
				{
					if ($value == 0) 
					{
						echo "<img src='".ACX_SMW_BASE_LOCATION."images/themes/". $i ."/twitter.png'>"; 
					} 	else 
					if ($value == 1) 
					{
						echo "<img src='".ACX_SMW_BASE_LOCATION."images/themes/". $i ."/facebook.png'>"; 
					}	else 
					if ($value == 2) 
					{
						echo "<img src='".ACX_SMW_BASE_LOCATION."images/themes/". $i ."/googleplus.png'>"; 
					}	else
	 
					if ($value == 3) 
					{
						echo "<img src='".ACX_SMW_BASE_LOCATION."images/themes/". $i ."/pinterest.png'>"; 
					}	else
					if ($value == 4) 
					{
						echo "<img src='".ACX_SMW_BASE_LOCATION."images/themes/". $i ."/youtube.png'>"; 
					}	else 
					if ($value == 5) 
					{
						echo "<img src='".ACX_SMW_BASE_LOCATION."images/themes/". $i ."/linkedin.png'>"; 
					}
					else
					if ($value == 6) 
					{
					
						echo "<img src='".ACX_SMW_BASE_LOCATION."images/themes/". $i ."/feed.png'>"; 
					}
					else
					if ($value == 7) 
					{
					
						echo "<img src='".ACX_SMW_BASE_LOCATION."images/themes/". $i ."/instagram.png'>"; 
					}
				}
			?>			
		</div>
		</label>
	<?php
	}
	echo "</div> <!-- acx_widget_si_theme_display -->";
	// Ending The Theme List

	echo "<span class='note'></span>";
	echo "<span class='acx_smw_q_sep'></span>";
	print_acx_smw_option_block_end();
}  add_action('acx_smw_hook_option_fields','acx_smw_icon_theme_settings_html',200);

function acx_smw_icon_theme_settings_ifpost()
{
	global $acx_widget_si_theme;
	$acx_widget_si_theme = sanitize_text_field(acx_smw_post_isset_check('acx_widget_si_theme'));
	if(!is_numeric($acx_widget_si_theme))
	{
		$acx_widget_si_theme = 1;
	}
	update_option('acx_widget_si_theme', $acx_widget_si_theme);
} add_action('acx_smw_hook_option_onpost','acx_smw_icon_theme_settings_ifpost');
function acx_smw_icon_theme_settings_else()
{
	global $acx_widget_si_theme,$social_widget_icon_array_order;
	$acx_widget_si_theme = get_option('acx_widget_si_theme');
	$social_widget_icon_array_order = get_option('social_widget_icon_array_order');
	if(is_serialized($social_widget_icon_array_order))
	{
		$social_widget_icon_array_order = unserialize($social_widget_icon_array_order);
	}
} add_action('acx_smw_hook_option_postelse','acx_smw_icon_theme_settings_else');
function acx_smw_icon_theme_settings_after_else()
{
	global $acx_widget_si_theme;
	if ($acx_widget_si_theme == "") 
	{
		$acx_widget_si_theme = "1";
	}
} add_action('acx_smw_hook_option_after_else','acx_smw_icon_theme_settings_after_else');
/*
	Icon Theme Settings Save - Get - Set Default Logic Ends Here
*/
/*
		Icon Theme Size - Save - Get - Set Default Logic Starts Here
*/
function acx_smw_icon_theme_size_html()
{
	global $acx_widget_si_icon_size;
	$acx_smw_string = __('Icon Size Settings','acurax-social-media-widget');
	print_acx_smw_option_block_start($acx_smw_string);
	?>
	<select name="acx_widget_si_icon_size" style="width: 99.7%">
	<option value="16"<?php if ($acx_widget_si_icon_size == "16") { echo 'selected="selected"'; } ?>>16<?php _e('px','acurax-social-media-widget'); ?> X 16<?php _e('px','acurax-social-media-widget'); ?> </option>
	<option value="25"<?php if ($acx_widget_si_icon_size == "25") { echo 'selected="selected"'; } ?>>25<?php _e('px','acurax-social-media-widget'); ?> X 25<?php _e('px','acurax-social-media-widget'); ?> </option>
	<option value="32"<?php if ($acx_widget_si_icon_size == "32") { echo 'selected="selected"'; } ?>>32<?php _e('px','acurax-social-media-widget'); ?> X 32<?php _e('px','acurax-social-media-widget'); ?> </option>
	<option value="40"<?php if ($acx_widget_si_icon_size == "40") { echo 'selected="selected"'; } ?>>40<?php _e('px','acurax-social-media-widget'); ?> X 40<?php _e('px','acurax-social-media-widget'); ?> </option>
	<option value="48"<?php if ($acx_widget_si_icon_size == "48") { echo 'selected="selected"'; } ?>>48<?php _e('px','acurax-social-media-widget'); ?> X 48<?php _e('px','acurax-social-media-widget'); ?> </option>
	<option value="55"<?php if ($acx_widget_si_icon_size == "55") { echo 'selected="selected"'; } ?>>55<?php _e('px','acurax-social-media-widget'); ?> X 55<?php _e('px','acurax-social-media-widget'); ?> </option>
	</select>
<?php	
echo "<span class='acx_smw_q_sep'></span>";
	print_acx_smw_option_block_end();
}  add_action('acx_smw_hook_option_fields','acx_smw_icon_theme_size_html',300);
function acx_smw_icon_theme_size_ifpost()
{
	global $acx_widget_si_icon_size;
	$acx_widget_si_icon_size = acx_smw_post_isset_check('acx_widget_si_icon_size');
	update_option('acx_widget_si_icon_size', $acx_widget_si_icon_size);
	
} add_action('acx_smw_hook_option_onpost','acx_smw_icon_theme_size_ifpost');
function acx_smw_icon_theme_size_else()
{
	global $acx_widget_si_icon_size;
	$acx_widget_si_icon_size = get_option('acx_widget_si_icon_size');

} add_action('acx_smw_hook_option_postelse','acx_smw_icon_theme_size_else');
function acx_smw_icon_theme_size_after_else()
{
	global $acx_widget_si_icon_size;
		if ($acx_widget_si_icon_size == "") { $acx_widget_si_icon_size = "32"; }

} add_action('acx_smw_hook_option_after_else','acx_smw_icon_theme_size_after_else');

/*
	Icon Theme Size Save - Get - Set Default Logic Ends Here
*/

/*
		Icon Theme Order - Save - Get - Set Default Logic Starts Here
*/
function acx_smw_icon_theme_order_html()
{
	global $acx_widget_si_icon_size,$social_widget_icon_array_order,$acx_widget_si_theme;
	if(is_serialized($social_widget_icon_array_order))
	{
	$social_widget_icon_array_order = unserialize($social_widget_icon_array_order);
	}
	$acx_smw_string = __("Social Media Icon Display Order - Drag and Drop to Reorder","acurax-social-media-widget");
	print_acx_smw_option_block_start($acx_smw_string);
	?>
	<script type="text/javascript">
	jQuery(document).ready(function()
	{
		jQuery(function() 
		{
			jQuery("#contentLeft ul").sortable(
			{ 
				opacity: 0.5, cursor: 'move', update: function() 
				{
					var order = jQuery(this).sortable("serialize") + '&action=acx_asmw_saveorder'+'&acx_asmw_saveorder_es=<?php echo wp_create_nonce("acx_asmw_saveorder_es"); ?>'; 
					jQuery.post(ajaxurl, order, function(theResponse)
					{
						jQuery("#contentRight").html(theResponse);
					}); 															 
				}								  
			});
		});
	});	
	</script>
	<?php
	echo "<div class='acx_smw_admin_left_section_c'>
		<div id='contentLeft'>
			<ul>";

			foreach ($social_widget_icon_array_order as $key => $value)
			{
				
				echo "<li id='recordsArray_$value'>";
		
				if ($value == 0) 
				{
					echo "<img src='".ACX_SMW_BASE_LOCATION."images/themes/". $acx_widget_si_theme ."/twitter.png' border='0'><br> Twitter"; 
				} 	else 
				if ($value == 1) 
				{
					echo "<img src='".ACX_SMW_BASE_LOCATION."images/themes/". $acx_widget_si_theme ."/facebook.png'  border='0'><br> Facebook"; 
				}	else 
				if ($value == 2) 
				{
					echo "<img src='".ACX_SMW_BASE_LOCATION."images/themes/". $acx_widget_si_theme ."/googleplus.png' border='0'><br> Google Plus"; 
				}	else
				 
				if ($value == 3) 
				{
					echo "<img src='".ACX_SMW_BASE_LOCATION."images/themes/". $acx_widget_si_theme ."/pinterest.png' border='0'><br> Pinterest"; 
				}	else
				if ($value == 4) 
				{
					echo "<img src='".ACX_SMW_BASE_LOCATION."images/themes/". $acx_widget_si_theme ."/youtube.png' border='0'><br> Youtube"; 
				}	else 
				if ($value == 5) 
				{
					echo "<img src='".ACX_SMW_BASE_LOCATION."images/themes/". $acx_widget_si_theme ."/linkedin.png' border='0'><br> Linkedin"; 
				} else
				if ($value == 6) 
				{
					echo "<img src='".ACX_SMW_BASE_LOCATION."images/themes/". $acx_widget_si_theme ."/feed.png' border='0'><br>  Rss Feed"; 
				}
				else
				if ($value == 7) 
				{
					echo "<img src='".ACX_SMW_BASE_LOCATION."images/themes/". $acx_widget_si_theme ."/instagram.png' border='0'><br>  Instagram"; 
				}	
					echo "</li>	";
			}	
			echo "</ul>
		</div>
		<div id='contentRight'></div> <!-- contentRight -->";
 _e("Drag and Reorder Icons (It will automatically save on reorder)","acurax-social-media-widget" ); 
echo "</div> <!-- acx_smw_admin_left_section_c -->";
	
	echo "<span class='acx_smw_q_sep'></span>";
	print_acx_smw_option_block_end();
}  
add_action('acx_smw_hook_option_fields','acx_smw_icon_theme_order_html',400);

/*
	Icon Theme Order Save - Get - Set Default Logic Ends Here
*/

/*
Social Media Configuration Starts Here
*/
function acx_smw_social_media_configuration()
{
	global $acx_widget_si_twitter;
	$acx_smw_string = __("Social Media Configuration","acurax-social-media-widget");
	print_acx_smw_option_block_start($acx_smw_string);
	do_action('acx_smw_icons_option_field');
	echo "<span class='acx_smw_q_sep'></span>";
	print_acx_smw_option_block_end();
}  
add_action('acx_smw_hook_option_fields','acx_smw_social_media_configuration',500);

function acx_smw_social_media_twitter_icon_field()
{
	global $acx_widget_si_twitter;
	echo "<span class='label'>". __('Twitter Username:','acurax-social-media-widget')."</span>";
	echo "<input type='text' name='acx_widget_si_twitter' value='".$acx_widget_si_twitter."' placeholder='" . __("acuraxdotcom","acurax-social-media-widget"). "'>";
	echo "<span class='acx_smw_q_sep'></span>";
}
add_action('acx_smw_icons_option_field','acx_smw_social_media_twitter_icon_field',100);


function acx_smw_twitter_post_if()
{
	global $acx_widget_si_twitter;
	$acx_widget_si_twitter = acx_smw_post_isset_check('acx_widget_si_twitter');
	update_option('acx_widget_si_twitter', $acx_widget_si_twitter);
} add_action('acx_smw_hook_option_onpost','acx_smw_twitter_post_if');

function acx_smw_twitter_post_else()
{
	global $acx_widget_si_twitter;
	$acx_widget_si_twitter = get_option('acx_widget_si_twitter');
} 
add_action('acx_smw_hook_option_postelse','acx_smw_twitter_post_else');

function acx_smw_social_media_facebook_icon_field()
{
	global $acx_widget_si_facebook;
	echo "<span class='acx_smw_q_sep'></span>";
	echo "<span class='label'>". __('Facebook Profile URL:','acurax-social-media-widget')."</span>";
	echo "<input type='text' name='acx_widget_si_facebook' value='".$acx_widget_si_facebook."' placeholder='".__('eg: http://www.facebook.com/AcuraxInternational','acurax-social-media-widget')."'>";
	echo "<span class='acx_smw_q_sep'></span>";
}
add_action('acx_smw_icons_option_field','acx_smw_social_media_facebook_icon_field',200);

function acx_smw_facebook_post_if()
{
	global $acx_widget_si_facebook;
	$acx_widget_si_facebook = acx_smw_post_isset_check('acx_widget_si_facebook');
	if($acx_widget_si_facebook != "")
	{
		if (substr($acx_widget_si_facebook, 0, 4) != 'http') {
		$acx_widget_si_facebook = 'http://' . $acx_widget_si_facebook;
		} if($acx_widget_si_facebook == "http://#") { $acx_widget_si_facebook = "#"; }
	}	update_option('acx_widget_si_facebook', $acx_widget_si_facebook);
} add_action('acx_smw_hook_option_onpost','acx_smw_facebook_post_if');

function acx_smw_facebook_post_else()
{
	global $acx_widget_si_facebook;
	$acx_widget_si_facebook = get_option('acx_widget_si_facebook');
} 
add_action('acx_smw_hook_option_postelse','acx_smw_facebook_post_else');

function acx_smw_social_media_gplus_icon_field()
{	global $acx_widget_si_gplus;
	echo "<span class='label'> ". __('Google Plus URL:','acurax-social-media-widget')."</span>";
	echo "<input type='text' name='acx_widget_si_gplus' value='".esc_url($acx_widget_si_gplus)."' placeholder='".__('Enter Your Complete Google Plus Url Starting With http://','acurax-social-media-widget')."'>";
	echo "<span class='acx_smw_q_sep'></span>";
}
add_action('acx_smw_icons_option_field','acx_smw_social_media_gplus_icon_field',300);

function acx_smw_gplus_post_if()
{
	global $acx_widget_si_gplus;
	$acx_widget_si_gplus = esc_url_raw(acx_smw_post_isset_check('acx_widget_si_gplus'));
	update_option('acx_widget_si_gplus', $acx_widget_si_gplus);
} add_action('acx_smw_hook_option_onpost','acx_smw_gplus_post_if');

function acx_smw_gplus_post_else()
{
	global $acx_widget_si_gplus;
	$acx_widget_si_gplus = get_option('acx_widget_si_gplus');
} 
add_action('acx_smw_hook_option_postelse','acx_smw_gplus_post_else');

function acx_smw_social_media_pinterest_icon_field()
{ 	global $acx_widget_si_pinterest;
	echo "<span class='label'> ". __('Pinterest URL:','acurax-social-media-widget')."</span>";
	echo "<input type='text' name='acx_widget_si_pinterest' value='".esc_url($acx_widget_si_pinterest)."' placeholder='".__('Enter Your Complete Pinterest Url Starting With http://','acurax-social-media-widget')."'>";
	echo "<span class='acx_smw_q_sep'></span>";
}
add_action('acx_smw_icons_option_field','acx_smw_social_media_pinterest_icon_field',400);

function acx_smw_pinterest_post_if()
{
	global $acx_widget_si_pinterest;
	$acx_widget_si_pinterest = esc_url_raw(acx_smw_post_isset_check('acx_widget_si_pinterest'));
	update_option('acx_widget_si_pinterest', $acx_widget_si_pinterest);
} add_action('acx_smw_hook_option_onpost','acx_smw_pinterest_post_if');

function acx_smw_pinterest_post_else()
{
	global $acx_widget_si_pinterest;
	$acx_widget_si_pinterest = get_option('acx_widget_si_pinterest');
} 
add_action('acx_smw_hook_option_postelse','acx_smw_pinterest_post_else');

function acx_smw_social_media_youtube_icon_field()
{
	global $acx_widget_si_youtube;
	echo "<span class='label'>". __('Youtube URL:','acurax-social-media-widget')."</span>";
	echo "<input type='text' name='acx_widget_si_youtube' value='".esc_url($acx_widget_si_youtube)."' placeholder='".__('http://www.youtube.com/user/acuraxdotcom','acurax-social-media-widget')."'>";
	echo "<span class='acx_smw_q_sep'></span>";
}
add_action('acx_smw_icons_option_field','acx_smw_social_media_youtube_icon_field',500);

function acx_smw_youtube_post_if()
{
	global $acx_widget_si_youtube;
	$acx_widget_si_youtube = esc_url_raw(acx_smw_post_isset_check('acx_widget_si_youtube'));
	update_option('acx_widget_si_youtube', $acx_widget_si_youtube);
} add_action('acx_smw_hook_option_onpost','acx_smw_youtube_post_if');

function acx_smw_youtube_post_else()
{
	global $acx_widget_si_youtube;
	$acx_widget_si_youtube = get_option('acx_widget_si_youtube');
} 
add_action('acx_smw_hook_option_postelse','acx_smw_youtube_post_else');

function acx_smw_social_media_linkedin_icon_field()
{
	global $acx_widget_si_linkedin;
	echo "<span class='label'>". __('Linkedin URL:','acurax-social-media-widget')."</span>";
	echo "<input type='text' name='acx_widget_si_linkedin' value='".esc_url($acx_widget_si_linkedin)."' placeholder='".__('http://www.linkedin.com/company/acurax-international','acurax-social-media-widget')."'>";
	echo "<span class='acx_smw_q_sep'></span>";	
}
add_action('acx_smw_icons_option_field','acx_smw_social_media_linkedin_icon_field',600);

function acx_smw_linkedin_post_if()
{
	global $acx_widget_si_linkedin;
		$acx_widget_si_linkedin = esc_url_raw(acx_smw_post_isset_check('acx_widget_si_linkedin'));
	update_option('acx_widget_si_linkedin', $acx_widget_si_linkedin);
} add_action('acx_smw_hook_option_onpost','acx_smw_linkedin_post_if');

function acx_smw_linkedin_post_else()
{
	global $acx_widget_si_linkedin;
	$acx_widget_si_linkedin = get_option('acx_widget_si_linkedin');
} 
add_action('acx_smw_hook_option_postelse','acx_smw_linkedin_post_else');
function acx_smw_social_media_feed_field()
{
	global $acx_widget_si_feed;
	echo "<span class='label'>". __('Feed URL:','acurax-social-media-widget')."</span>";
	echo "<input type='text' name='acx_widget_si_feed' value='".esc_url($acx_widget_si_feed)."'  placeholder='".__('http://www.yourwebsite.com/feed','acurax-social-media-widget')."'>";
	echo "<span class='acx_smw_q_sep'></span>";
}
add_action('acx_smw_icons_option_field','acx_smw_social_media_feed_field',700);

function acx_smw_feed_post_if()
{
	global $acx_widget_si_feed;
	$acx_widget_si_feed = esc_url_raw(acx_smw_post_isset_check('acx_widget_si_feed'));
	update_option('acx_widget_si_feed', $acx_widget_si_feed);
} add_action('acx_smw_hook_option_onpost','acx_smw_feed_post_if');

function acx_smw_feed_post_else()
{
	global $acx_widget_si_feed;
	$acx_widget_si_feed = get_option('acx_widget_si_feed');
} 
add_action('acx_smw_hook_option_postelse','acx_smw_feed_post_else');
// instagram
function acx_smw_social_media_instagram_field()
{
	global $acx_widget_si_instagram;
	echo "<span class='label'>". __('Instagram URL:','acurax-social-media-widget')."</span>";
	echo "<input type='text' name='acx_widget_si_instagram' value='".esc_url($acx_widget_si_instagram)."'  placeholder='".__('https://www.instagram.com/username','acurax-social-media-widget')."'>";
	echo "<span class='acx_smw_q_sep'></span>";
}
add_action('acx_smw_icons_option_field','acx_smw_social_media_instagram_field',700);

function acx_smw_instagram_post_if()
{
	global $acx_widget_si_instagram;
	$acx_widget_si_instagram = esc_url_raw(acx_smw_post_isset_check('acx_widget_si_instagram'));
	update_option('acx_widget_si_instagram', $acx_widget_si_instagram);
} add_action('acx_smw_hook_option_onpost','acx_smw_instagram_post_if');

function acx_smw_instagram_post_else()
{
	global $acx_widget_si_instagram;
	$acx_widget_si_instagram = get_option('acx_widget_si_instagram');
} 
add_action('acx_smw_hook_option_postelse','acx_smw_instagram_post_else');


function acx_smw_custom_icon_btn_field()
{
?><span class='button smw_info_premium smw_info_lb' lb_title='<?php _e('Adding Extra Icons Feature','acurax-social-media-widget'); ?>' lb_content='<?php _e('Its possible to add any number of extra icons by uploading them and you can link them to anywhere you need.','acurax-social-media-widget'); ?><br><br><?php _e('Lets say, you needs to have an icon which links to your contact page or services page, you can do that.','acurax-social-media-widget'); ?><br><br><i><?php _e('This feature is only available in our premium version - ','acurax-social-media-widget'); ?><a href="<?php echo wp_nonce_url(admin_url('admin.php?page=Acurax-Social-Icons-Premium'));?>" target="_blank"><?php _e('Compare Features','acurax-social-media-widget'); ?></a> / <a href="http://clients.acurax.com/order.php?pid=fsmi_power&utm_source=smw&utm_campaign=premium-info" target="_blank"><?php _e('Order Now','acurax-social-media-widget'); ?></a>'><?php _e('Add Custom Icon','acurax-social-media-widget'); ?></span><?php
echo "<span class='acx_smw_q_sep'></span>";
}
add_action('acx_smw_icons_option_field','acx_smw_custom_icon_btn_field',800);

/*
Social Media Configuration Ends Here
*/

/*
Define Submit Button Starts Here
*/
function acx_smw_submit_button_html()
{
	echo "<span class='acx_smw_q_sep'></span>";?>
	<span id='acx_smw_save_btn' style='clear:both;'><input type='submit' name='Submit' class='button button-primary' value='<?php _e('Save Configuration','acurax-social-media-widget'); ?>' /></span>
	<?php
	echo "<span class='acx_smw_q_sep'></span>";
} 
add_action('acx_smw_hook_option_fields','acx_smw_submit_button_html',900);
/*
Define Submit Button Ends Here
*/
/*
Define options in else  post Starts Here
*/

function acx_smw_social_media_else()
{

	global $acx_widget_si_installed_date,$acx_widget_si_credit,$social_widget_icon_array_order,$acx_si_smw_hide_advert;
	$acx_widget_si_installed_date = get_option('acx_widget_si_installed_date');
	if ($acx_widget_si_installed_date=="")
		{ 	$acx_widget_si_installed_date = time();
			update_option('acx_widget_si_installed_date', $acx_widget_si_installed_date);
		}

		$acx_widget_si_credit = get_option('acx_widget_si_credit');
		if ($acx_widget_si_credit == "") {	$acx_widget_si_credit = 'no'; }
	$acx_si_smw_hide_advert = get_option('acx_si_smw_hide_advert');
	if ($acx_si_smw_hide_advert == "") { $acx_si_smw_hide_advert = 'no'; }
	do_action('acx_asmw_orderarray_refresh');
	$social_widget_icon_array_order = get_option('social_widget_icon_array_order');
	$social_widget_icon_array_order = unserialize($social_widget_icon_array_order);
	
	
}
 add_action('acx_smw_hook_option_postelse','acx_smw_social_media_else',100);
/*
Define options in else  post Ends Here
*/

/*
Comparison HTML Starts Here
*/
 function acx_smw_show_comparison()
{
	global $acx_si_smw_hide_advert;
	if($acx_si_smw_hide_advert == "no")
	{
	echo "<span class='acx_smw_q_sep'></span>";
	do_action('acx_smw_comparison_premium',1);
	echo "<span class='acx_smw_q_sep'></span>";
	}
}
add_action('acx_smw_hook_option_footer','acx_smw_show_comparison',400); 

/*
Comparison HTML Ends Here
*/

/*
Footer HTML Starts Here
*/
function acx_smw_show_footer_contact_section()
{
?><p class="widefat" style="padding:8px;width:99%;"><?php _e('Something Not Working Well? Have a Doubt? Have a Suggestion?','acurax-social-media-widget'); ?> - <a href="http://www.acurax.com/contact.php" target="_blank"><?php _e('Contact us now','acurax-social-media-widget'); ?></a> |<?php _e(' Need a Custom Designed Theme For your Blog or Website? Need a Custom Header Image?','acurax-social-media-widget'); ?> - <a href="http://www.acurax.com/contact.php" target="_blank"><?php _e('Contact us now','acurax-social-media-widget'); ?></a></p>
<?php
echo "<span class='acx_smw_q_sep'></span>";
}
add_action('acx_smw_hook_option_footer','acx_smw_show_footer_contact_section',500); 
/*
Footer HTML Ends Here
*/


/*
Define options above if post Starts Here
*/
function acx_smw_options_above_if()
{
	global $smw_total_themes;
/**********************************************/
$smw_total_themes = ACX_SOCIALMEDIA_WIDGET_TOTAL_THEMES; // DEFINE NUMBER OF THEMES HERE
$smw_total_themes = ($smw_total_themes+1); // DO NOT EDIT THIS
/**********************************************/

}
add_action('acx_smw_hook_option_above_ifpost','acx_smw_options_above_if',100);
/*
Define options above if post Ends Here
*/

/********************************************** MISC PAGE *******************************************/
/*
	Premium Info HTML - Save - Get - Set Default Logic Starts Here
*/
function acx_smw_misc_premium_advert_above_form()
{
 global $acx_si_smw_hide_advert,$acx_widget_si_credit;
if($acx_si_smw_hide_advert == "no")
{
	echo "<span class='acx_smw_q_sep'></span>"; ?>
<div id="acx_asmw_premium">
<a href="#compare" style="margin: 10px 0px 0px 10px; font-weight: bold; font-size: 14px; display: block;"><?php _e('Fully Featured - Acurax Social Media Widget is Available With Tons of Extra Features!','acurax-social-media-widget'); ?></a><a href="http://clients.acurax.com/order.php?pid=fsmi_power&utm_source=asmw&utm_campaign=day_button" target="_blank" class="buy_now"></a></div> <!-- acx_smw_premium -->
<?php } 
	echo "<span class='acx_smw_q_sep'></span>";
}  add_action('acx_smw_misc_hook_option_above_page_left','acx_smw_misc_premium_advert_above_form',50);

/*
	Premium Info HTML - Save - Get - Set Default Logic Starts Here
*/

/*
Acurax Theme Conflict Settings Starts Here
*/
function acx_smw_misc_icons_vertical_html()
{

$acx_string  = __('Acurax Theme Conflict Settings','acurax-social-media-widget');
	print_acx_smw_option_block_start($acx_string);	
	do_action('acx_smw_misc_theme_conflict_option_field');
	echo "<span class='acx_smw_q_sep'></span>";
	print_acx_smw_option_block_end();


}  add_action('acx_smw_misc_hook_option_fields','acx_smw_misc_icons_vertical_html',100);

function acx_smw_icons_vertical()
{
	global $acx_si_smw_float_fix;
	?>
	<span class='label'><?php _e('Widget Icons Vertical','acurax-social-media-widget'); ?><a style="cursor:pointer;" class="asmw_info_premium smw_info_lb" lb_title="<?php _e('Icon Shows Vertical Instead of Horizontal','acurax-social-media-widget'); ?>" lb_content="<?php _e('If your social media icons is displaying vertically instead of horizontal, You can change this settings.','acurax-social-media-widget'); ?>">[?]</a></span>
<select name="acx_si_smw_float_fix">
<option value="yes"<?php if ($acx_si_smw_float_fix == "yes") { echo 'selected="selected"'; } ?>><?php _e('Yes,Make My Vertical Icons Horizontal','acurax-social-media-widget'); ?></option>
<option value="no"<?php if ($acx_si_smw_float_fix == "no") { echo 'selected="selected"'; } ?>><?php _e('No, I Dont Have Any Issues','acurax-social-media-widget'); ?></option>
</select>
<?php
echo "<span class='acx_smw_q_sep'></span>";
}
add_action('acx_smw_misc_theme_conflict_option_field','acx_smw_icons_vertical',100);
function acx_smw_float_fix_if()
{
	global $acx_si_smw_float_fix;
	$acx_si_smw_float_fix = sanitize_text_field(acx_smw_post_isset_check('acx_si_smw_float_fix'));
	update_option('acx_si_smw_float_fix', $acx_si_smw_float_fix);
} add_action('acx_smw_misc_hook_option_onpost','acx_smw_float_fix_if');

function acx_smw_smw_float_fix_else()
{
	global $acx_si_smw_float_fix;
	$acx_si_smw_float_fix = get_option('acx_si_smw_float_fix');
} 
add_action('acx_smw_misc_hook_option_postelse','acx_smw_smw_float_fix_else'); 
function acx_smw_smw_float_fix_after_else()
{
	global $acx_si_smw_float_fix;

if ($acx_si_smw_float_fix == "") {	$acx_si_smw_float_fix = "no"; }
} add_action('acx_smw_misc_hook_option_after_else','acx_smw_smw_float_fix_after_else');

function acx_smw_ignore_theme_warning()
{
	global $acx_si_smw_theme_warning_ignore;
	?>
	<span class='label'><?php _e('Ignore Theme Warning','acurax-social-media-widget'); ?></span>
	<select name="acx_si_smw_theme_warning_ignore">
<option value="yes"<?php if ($acx_si_smw_theme_warning_ignore == "yes") { echo 'selected="selected"'; } ?>><?php _e('Yes, Everything is working fine and and i still see theme warning - Fix This','acurax-social-media-widget'); ?></option>
<option value="no"<?php if ($acx_si_smw_theme_warning_ignore == "no") { echo 'selected="selected"'; } ?>><?php _e('No, I Have No Issues ','acurax-social-media-widget'); ?></option>
</select>
<?php
echo "<span class='acx_smw_q_sep'></span>";
}
add_action('acx_smw_misc_theme_conflict_option_field','acx_smw_ignore_theme_warning',200);
function acx_smw_theme_warning_if()
{
	global $acx_si_smw_theme_warning_ignore;
	$acx_si_smw_theme_warning_ignore = sanitize_text_field(acx_smw_post_isset_check('acx_si_smw_theme_warning_ignore'));
	update_option('acx_si_smw_theme_warning_ignore', $acx_si_smw_theme_warning_ignore);
} add_action('acx_smw_misc_hook_option_onpost','acx_smw_theme_warning_if');

function acx_smw_theme_warning_else()
{
	global $acx_si_smw_theme_warning_ignore;
	$acx_si_smw_theme_warning_ignore = get_option('acx_si_smw_theme_warning_ignore');
} 
add_action('acx_smw_misc_hook_option_postelse','acx_smw_theme_warning_else'); 
function acx_smw_theme_warning_after_else()
{
	global $acx_si_smw_theme_warning_ignore;

if ($acx_si_smw_theme_warning_ignore == "") {	$acx_si_smw_theme_warning_ignore = "no"; }
} add_action('acx_smw_misc_hook_option_after_else','acx_smw_theme_warning_after_else');


/*
Acurax Theme Conflict Settings Starts Here
*/
	/*
	Acurax Service/Info Settings HTML - Get - Set Default Logic Starts Here
*/
function acx_smw_misc_service_info_html()
{
	$acx_string = __('Acurax Service/Info Settings','acurax-social-media-widget');
	print_acx_smw_option_block_start($acx_string);	
	do_action('acx_smw_misc_service_info');
	echo "<span class='acx_smw_q_sep'></span>";
	print_acx_smw_option_block_end();
}  add_action('acx_smw_misc_hook_option_fields','acx_smw_misc_service_info_html',200);

function acx_smw_service_info_option()
{
	global $acx_si_smw_acx_service_banners;
	echo "<span class='label'>". __('Acurax Service Info ','acurax-social-media-widget')."</span>";?>
	<select name="acx_si_smw_acx_service_banners">
<option value="yes"<?php if ($acx_si_smw_acx_service_banners == "yes") { echo 'selected="selected"'; } ?>><?php _e('Show Acurax Service Banner','acurax-social-media-widget');?></option>
<option value="no"<?php if ($acx_si_smw_acx_service_banners == "no") { echo 'selected="selected"'; } ?>><?php _e('Hide Acurax Service Banner','acurax-social-media-widget');?></option>
</select>
	<?php
	echo "<span class='acx_smw_q_sep'></span>";
	
}
add_action('acx_smw_misc_service_info','acx_smw_service_info_option',100);


function acx_smw_service_info_if()
{
	global $acx_si_smw_acx_service_banners;
	$acx_si_smw_acx_service_banners = sanitize_text_field(acx_smw_post_isset_check('acx_si_smw_acx_service_banners'));
	update_option('acx_si_smw_acx_service_banners', $acx_si_smw_acx_service_banners);
} add_action('acx_smw_misc_hook_option_onpost','acx_smw_service_info_if');

function acx_smw_service_info_else()
{
	global $acx_si_smw_acx_service_banners;
	$acx_si_smw_acx_service_banners = get_option('acx_si_smw_acx_service_banners');
} 
add_action('acx_smw_misc_hook_option_postelse','acx_smw_service_info_else');
function acx_smw_service_info_after_else()
{
	global $acx_si_smw_acx_service_banners;

if ($acx_si_smw_acx_service_banners == "") {	$acx_si_smw_acx_service_banners = "yes"; }
} add_action('acx_smw_misc_hook_option_after_else','acx_smw_service_info_after_else');

/*
	Acurax Service/Info Settings HTML - Get - Set Default Logic Ends Here
*/

	/*
	Premium Version Info Settings HTML - Get - Set Default Logic Starts Here
*/
function acx_smw_misc_premium_info_option()
{
	global $acx_si_smw_hide_advert;
	echo "<span class='label'>". __('Premium Version Info ','acurax-social-media-widget')."</span>";?>
	<select name="acx_si_smw_hide_advert">
<option value="yes"<?php if ($acx_si_smw_hide_advert == "yes") { echo 'selected="selected"'; } ?>><?php _e('Hide Premium Version Infos','acurax-social-media-widget');?></option>
<option value="no"<?php if ($acx_si_smw_hide_advert == "no") { echo 'selected="selected"'; } ?>><?php _e('Show Premium Version Infos','acurax-social-media-widget');?></option>
</select>
	<?php
	echo "<span class='acx_smw_q_sep'></span>";
	
}
add_action('acx_smw_misc_service_info','acx_smw_misc_premium_info_option',200);
function acx_smw_premium_info_if()
{
	global $acx_si_smw_hide_advert;
	$acx_si_smw_hide_advert = sanitize_text_field(acx_smw_post_isset_check('acx_si_smw_hide_advert'));
	update_option('acx_si_smw_hide_advert', $acx_si_smw_hide_advert);
} add_action('acx_smw_misc_hook_option_onpost','acx_smw_premium_info_if');

function acx_smw_premium_info_else()
{
	global $acx_si_smw_hide_advert;
	$acx_si_smw_hide_advert = get_option('acx_si_smw_hide_advert');
} 
add_action('acx_smw_misc_hook_option_postelse','acx_smw_premium_info_else');
function acx_smw_premium_info_after_else()
{
	global $acx_si_smw_hide_advert;
if ($acx_si_smw_hide_advert == "") {	$acx_si_smw_hide_advert = "no"; }
} add_action('acx_smw_misc_hook_option_after_else','acx_smw_premium_info_after_else');

/* 	Premium Version Info Settings  Settings HTML - Get - Set Default Logic Ends Here */
/* Expert Support Menu Settings HTML - Get - Set Default Logic Starts Here */


function acx_smw_misc_expert_support_option()
{
	global $acx_si_asmw_hide_expert_support_menu;
	echo "<span class='label'>". __('Expert Support Menu','acurax-social-media-widget')."</span>";?>
	<select name="acx_si_asmw_hide_expert_support_menu">
<option value="yes"<?php if ($acx_si_asmw_hide_expert_support_menu == "yes") { echo 'selected="selected"'; } ?>><?php _e('Hide Expert Support Menu From Acurax ','acurax-social-media-widget');?></option>
<option value="no"<?php if ($acx_si_asmw_hide_expert_support_menu == "no") { echo 'selected="selected"'; } ?>><?php _e('Show Expert Support Menu From Acurax ','acurax-social-media-widget');?></option>
</select>
	<?php
	echo "<span class='acx_smw_q_sep'></span>";
	
}
add_action('acx_smw_misc_service_info','acx_smw_misc_expert_support_option',300);


function acx_smw_expert_support_if()
{
	global $acx_si_asmw_hide_expert_support_menu;
	$acx_si_asmw_hide_expert_support_menu = sanitize_text_field(acx_smw_post_isset_check('acx_si_asmw_hide_expert_support_menu'));
	update_option('acx_si_asmw_hide_expert_support_menu', $acx_si_asmw_hide_expert_support_menu);
} add_action('acx_smw_misc_hook_option_onpost','acx_smw_expert_support_if');

function acx_smw_expert_support_else()
{
	global $acx_si_asmw_hide_expert_support_menu;
	$acx_si_asmw_hide_expert_support_menu = get_option('acx_si_asmw_hide_expert_support_menu');
} 
add_action('acx_smw_misc_hook_option_postelse','acx_smw_expert_support_else');
function acx_smw_expert_support_after_else()
{
	global $acx_si_asmw_hide_expert_support_menu;

if ($acx_si_asmw_hide_expert_support_menu == "") {	$acx_si_asmw_hide_expert_support_menu = "no"; }
} add_action('acx_smw_misc_hook_option_after_else','acx_smw_expert_support_after_else');

/*
	Expert Support Menu Settings  Settings HTML - Get - Set Default Logic Ends Here
*/

/*
Define Misc Submit Button Starts Here
*/
function acx_smw_misc_submit_button_html()
{
	echo "<span class='acx_smw_q_sep'></span>";?>
	<input type='submit' name='Submit' class='button button-primary' value='<?php _e('Save Settings','acurax-social-media-widget'); ?>' />
	<?php
echo "<span class='acx_smw_q_sep'></span>";
} 
add_action('acx_smw_misc_hook_option_fields','acx_smw_misc_submit_button_html',300);
/*
Define Misc Submit Button Ends Here
*/
/*
Comparison HTML Starts Here
*/
function acx_smw_misc_show_comparison()
{
	global $acx_si_smw_hide_advert;
	if($acx_si_smw_hide_advert == "no")
	{
		echo "<span class='acx_smw_q_sep'></span>";
		do_action('acx_smw_comparison_premium',1);
		echo "<span class='acx_smw_q_sep'></span>";
	}
}
add_action('acx_smw_misc_hook_option_footer','acx_smw_misc_show_comparison',100); 

/*
Comparison HTML Starts Here
*/

/*
Footer HTML Starts Here
*/
function acx_smw_misc_show_footer_contact_section()
{
	echo "<span class='acx_smw_q_sep'></span>";
?><p class="widefat" style="padding:8px;width:99%;">
<?php _e('Something Not Working Well? Have a Doubt? Have a Suggestion? -','acurax-social-media-widget'); ?> <a href="http://www.acurax.com/contact.php" target="_blank"><?php _e('Contact us now','acurax-social-media-widget'); ?></a> | <?php _e('Need a Custom Designed Theme For your Blog or Website? Need a Custom Header Image? ','acurax-social-media-widget'); ?>- <a href="http://www.acurax.com/contact.php" target="_blank"><?php _e('Contact us now','acurax-social-media-widget');?></a></p>
<?php
echo "<span class='acx_smw_q_sep'></span>";
}
add_action('acx_smw_misc_hook_option_footer','acx_smw_misc_show_footer_contact_section',200); 

/*
Footer HTML Ends Here
*/
/*********************************** PREMIUM *****************************************************************/
/* Premium Updation HTML Starts Here */
function acx_smw_premium_html()
{
	$get_td ="";
	if(ISSET($_GET['td']))
	{
		if(sanitize_text_field($_GET['td']) == 'hide')
		{
			$get_td = "hide";
		}
	}
	if($get_td == 'hide') 
	{
		update_option('acx_widget_si_td', "hide");
	?>
	<style type='text/css'>
	#acx_td_asmw
	{
		display:none;
	}
	</style>
	<div class="error" style="background: none repeat scroll 0pt 0pt infobackground; border: 1px solid inactivecaption; padding: 5px;line-height:16px;"><?php _e('Thanks again for using the plugin.','acurax-social-media-widget'); ?>

	</div>
	<?php
	}
}
add_action('acx_smw_premium_hook_option_footer','acx_smw_premium_html',100);
/* Premium Updation HTML Ends Here */
/* Comparison  HTML Starts Here */
function acx_smw_premium_comparison_html()
{
	echo "<span class='acx_smw_q_sep'></span>";
	do_action('acx_smw_comparison_premium',1);
	echo "<span class='acx_smw_q_sep'></span>";

}
add_action('acx_smw_premium_hook_option_footer','acx_smw_premium_comparison_html',200);
/* Comparison  HTML Ends Here */
/*  Money Back Guarantee  Starts Here */

function acx_smw_money_back_html()
{
	echo "<span class='acx_smw_q_sep'></span>";
	echo "<div align='center'><img style='border:1px solid gray;box-shadow:1px 1px 20px -9px black;border-radius: 8px 8px 8px 8px;' src='".ACX_SMW_BASE_LOCATION."images/money_back.jpg'></div>";
	echo "<span class='acx_smw_q_sep'></span>";

}
add_action('acx_smw_premium_hook_option_footer','acx_smw_money_back_html',300);

/*  Money Back Guarantee  Ends Here */

/********************************************************* Expert  Page *****************************************************/
/* Troubleshooter page options Starts Here*/
function acx_smw_quick_fix_applied()
{	
	global $smw_fix_applied;
	if($smw_fix_applied == 1)
	{
	echo "<div style='background: none repeat scroll 0% 0% lightgreen; width: 300px; text-align: center; margin-right: auto; margin-left: auto; padding: 7px 7px 5px; border-top-right-radius: 7px; border-top-left-radius: 7px; border-bottom: 2px solid green;'>". __('Action Completed Successfully','acurax-social-media-widget')."</div>";
	}
}
add_action('acx_smw_exprt_hook_option_form_head','acx_smw_quick_fix_applied',120);
function acx_smw_expert_icon_select_html()
{	
	global $smw_page;
	if($smw_page == "Acurax-Social-Widget-Troubleshooter")
	{
		echo "<h2 class='acx_smw_option_head'>". __('Social Media Widget by Acurax','floating-social-media-icon')."</h2>"; 
		echo "<span class='acx_smw_q_sep'></span>";?>
<p style="font-weight:bold;text-align:center;color:darkred;"><?php _e('IMPORTANT NOTE: Please do troubleshooting only if you got instructions from support or know what you are going to do.','acurax-social-media-widget') ;?></p>

<p class="widefat" style="background: none repeat scroll 0% 0% menu; border-bottom: 2px dashed lavender; border-right: 2px dashed lavender; margin-bottom: 15px; margin-top: 8px; padding: 8px; width: 99%;">	<?php _e("1) Icon Selection Display Fix: ","acurax-social-media-widget" ); ?>
<?php _e("If you cant find any icons on the icon theme/style selection section, try this fix","acurax-social-media-widget" ); ?>
<a href="<?php echo wp_nonce_url(admin_url('admin.php?page=Acurax-Social-Widget-Troubleshooter&quickfix=1&sid='. wp_create_nonce('acx_smw_qfix')));?>" class="acx_trouble_fixit"><?php _e('Click here to try this fix!','acurax-social-media-widget') ;?></a>
</p>
<?php
echo "<span class='acx_smw_q_sep'></span>";

	}
}
add_action('acx_smw_exprt_hook_option_above_page_left','acx_smw_expert_icon_select_html',200);

function acx_smw_expert_down_note_html()
{
	global $smw_page;
	if($smw_page == "Acurax-Social-Widget-Troubleshooter")
	{
		echo "<span class='acx_smw_q_sep'></span>";?>
	<p style="text-align:center;"><?php _e('We will be adding more troubleshooting quick fix options according to requests','acurax-social-media-widget') ;?></p>
	<?php
	echo "<span class='acx_smw_q_sep'></span>";
	acx_smw_quick_form();
	}
}
add_action('acx_smw_exprt_hook_option_above_page_left','acx_smw_expert_down_note_html',400);
function acx_smw_exprt_quick_fix_add()
{
	global $social_widget_icon_array_order,$smw_fix_applied,$smw_page;
	if(is_serialized($social_widget_icon_array_order))
	{
	$social_widget_icon_array_order = unserialize($social_widget_icon_array_order);
	}
	$smw_page = $get_quickfix = $get_sid = "";
	if(ISSET($_GET['page']))
	{
		$smw_page = $_GET['page'];
	}
	if(ISSET($_GET['quickfix']))
	{
		$get_quickfix = sanitize_text_field($_GET['quickfix']);
	}
	if(ISSET($_GET['sid']))
	{
		$get_sid = sanitize_text_field($_GET['sid']);
	} 
	if (!wp_verify_nonce($get_sid,'acx_smw_qfix'))
	{
		$get_sid = "";
	}
	if(!current_user_can('manage_options'))
	{
		$get_sid = "";
	}

	$fix_applied = 0;
	if($get_sid != "")
	{
		if($get_quickfix == 1)
		{
				do_action('acx_asmw_orderarray_refresh');
				$smw_fix_applied = 1;
			}
	}
}
add_action('acx_smw_exprt_hook_option_exprt_quick','acx_smw_exprt_quick_fix_add',100);
/**************************************************** Help Page*******************************************************************/
/* Premium Ad on the top starts Here*/
function acx_smw_help_html()
{
	 global $acx_si_smw_hide_advert;
	
	if($acx_si_smw_hide_advert == "no")
	{
	?>
	<div id="acx_asmw_premium">
	<a href="#compare" style="margin: 10px 0px 0px 10px; font-weight: bold; font-size: 14px; display: block;"><?php _e('Fully Featured - Acurax Social Media Widget is Available With Tons of Extra Features!','acurax-social-media-widget') ;?></a><a href="http://clients.acurax.com/order.php?pid=fsmi_power&utm_source=asmw&utm_campaign=day_button" target="_blank" class="buy_now"></a></div> <!-- acx_smw_premium -->
	<?php } 
}
add_action('acx_smw_help_hook_option_above_page_left','acx_smw_help_html',100);
/* Premium Ad on the top Ends Here*/


/* Help/Support HTML  starts Here*/
function acx_smw_help_support_html()
{
?>
<h2 style="text-align:center;"><?php _e('Acurax Social Media Widget - Wordpress Plugin - Help/Support','floating-social-media-icon');?></h2>
<p style="text-align:center;"><?php _e('Thank you for using Floating Social Media Icon Plugin For Your Wordpress Social Media Profile Linking Need.','acurax-social-media-widget')?></p>
<h3 style="text-align:center;"><a href="http://clients.acurax.com/link.php?id=14" target="_blank" class="button"><?php _e('Click here to open the FAQ and Help Page','acurax-social-media-widget'); ?></a></h3>
<?php }
add_action('acx_smw_help_hook_option_above_page_left','acx_smw_help_support_html',200);

/* Help/Support HTML  starts Here*/
/* Comparison HTML  starts Here*/

 function acx_smw_help_show_comparison()
{
	$acx_si_smw_hide_advert = get_option('acx_si_smw_hide_advert');
	if($acx_si_smw_hide_advert == "no")
	{
		echo "<span class='acx_smw_q_sep'></span>";
		do_action('acx_smw_comparison_premium',1);
		echo "<span class='acx_smw_q_sep'></span>";
	}
}
add_action('acx_smw_help_hook_option_above_page_left','acx_smw_help_show_comparison',300); 
/* Comparison HTML  Ends Here*/
/* Troubleshooter page options Ends Here*/
/* Addon Page */
function acx_smw_addon_list_section()
{
	$smw_addons_intro = array();
	$smw_addons_intro[] = array(
							'name' => __('Social Media Icon - Power Addon','acurax-social-media-widget'),
							'img' => plugins_url('/images/power_addon.jpg',dirname(__FILE__)),
							'desc' => __('This addon is packed with more sharp quality icons and can upload any number of icons.Social Media Function Option allows you to set the icon as share icons or profile linking icons,it also adds option in page and posts, while editing to define Social Media Meta Tags. Share icons can also be integrated automatically to page/post.','acurax-social-media-widget'),
							'url' => 'http://www.acurax.com/products/floating-social-media-icon-wordpress-plugin/?feature=fsmi_power&utm_source=smw&utm_medium=addon-page',
							'button' => __('View Details','acurax-social-media-widget')
							);
							?>
							<div id="smw_addons_intro_holder">
<?php
foreach($smw_addons_intro as $key => $value)
{
?>
<div class="smw_addons_intro" onclick="window.open('<?php echo $value['url']; ?>'); return false;">
<img src="<?php echo $value['img']; ?>">
<h3><?php echo $value['name']; ?></h3>
<p>
<?php echo $value['desc']; ?>
</p>
<a class="smw_addon_button" href="<?php echo $value['url']; ?>" target="_blank"><?php echo $value['button']; ?></a>
</div> <!-- smw_addons_intro -->
<?php } ?>
</div> <!-- smw_addons_intro_holder -->
<?php
}
add_action("acx_smw_addon_hook_option_field_content","acx_smw_addon_list_section",10);
/* Addon Page */
?>