<?php
function acx_smw_styles() 
{	
	wp_register_style('acx_smw_widget_style', plugins_url('css/style.css?v='.ACX_SMW_VERSION, __FILE__));
	wp_enqueue_style('acx_smw_widget_style');
	
}
add_action('wp_enqueue_scripts', 'acx_smw_styles');
function acx_smw_admin_styles()
{
	wp_register_style('acx_smw_admin_style', plugins_url('css/style_admin.css?v='.ACX_SMW_VERSION, __FILE__));
	wp_enqueue_style('acx_smw_admin_style');
	wp_register_style('acx_smw_box_style', plugins_url('css/layout.css?v='.ACX_SMW_VERSION, __FILE__));
	wp_enqueue_style('acx_smw_box_style');
	wp_register_style('acx_smwaddons_style', plugins_url('css/smw_addons.css?v='.ACX_SMW_VERSION, __FILE__));
	wp_enqueue_style('acx_smwaddons_style');
	
}
add_action('admin_enqueue_scripts', 'acx_smw_admin_styles');
function print_acx_smw_option_heading($heading)
{
	$heading_format = "<h2 class='acx_smw_option_head'>";
	$heading_format .= $heading;
	$heading_format .= "</h2>";
	return $heading_format;
}
function print_acx_smw_option_block_start($title,$pre_fix="",$suf_fix="")
{
	global $acx_smw_options_uid;
	if(!$acx_smw_options_uid || $acx_smw_options_uid == "")
	{
		$acx_smw_options_uid = 0;
	}
	$acx_smw_options_uid = $acx_smw_options_uid+1;
	echo "<div class='acx_smw_q_holder acx_smw_q_holder_".$acx_smw_options_uid."'>";
	echo $pre_fix;
	echo "<h4>".$title."</h4>";
	echo $suf_fix;
	echo "<div class='acx_smw_q_holder_c acx_smw_q_holder_c_".$acx_smw_options_uid."'>";
}
function print_acx_smw_option_block_end()
{
	echo "</div> <!-- acx_smw_q_holder_c -->";
	echo "</div> <!-- acx_smw_q_holder -->";
}
function acx_smw_post_isset_check($field)
{
	$value = "";
	if(ISSET($_POST[$field]))
	{
		$value = $_POST[$field];
	}
	return $value;
}

function acx_smw_quick_form()
{
	$acx_installation_url = "";
	if(ISSET($_SERVER['HTTP_HOST']))
	{
		$acx_installation_url = $_SERVER['HTTP_HOST'];
	} 

?>
<div class="acx_smw_es_common_raw acx_smw_es_common_bg">
	<div class="acx_smw_es_middle_section">
    
    <div class="acx_smw_es_acx_content_area">
    	<div class="acx_smw_es_wp_left_area">
        <div class="acx_smw_es_wp_left_content_inner">
        	<div class="acx_smw_es_wp_main_head"><?php _e('Do you Need Technical Support Services to Get the Best Out of Your Wordpress Site ?','acurax-social-media-widget');?></div> <!-- wp_main_head -->
            <div class="acx_smw_es_wp_sub_para_des"><?php _e('Acurax offer a number of WordPress related services: Form installing WordPress on your domain to offering support for existing WordPress sites.','acurax-social-media-widget'); ?></div> <!-- acx_smw_es_wp_sub_para_des -->
            <div class="acx_smw_es_wp_acx_service_list">
            	<ul>
                <li><?php _e('Troubleshoot WordPress Site Issues','acurax-social-media-widget'); ?></li>
                    <li><?php _e('Recommend & Install Plugins For Improved WordPress Performance','acurax-social-media-widget'); ?></li>
                    <li><?php _e('Create, Modify, Or Customise, Themes','acurax-social-media-widget'); ?></li>
                    <li><?php _e('Explain Errors And Recommend Solutions','acurax-social-media-widget'); ?></li>
                    <li><?php _e('Custom Plugin Development According To Your Needs','acurax-social-media-widget'); ?></li>
                    <li><?php _e('Plugin Integration Support','acurax-social-media-widget'); ?></li>
                    <li><?php _e('Many','acurax-social-media-widget'); ?> <a href="http://www.acurax.com/?utm_source=smw&utm_campaign=expert_support" target="_blank"><?php _e('More...','acurax-social-media-widget'); ?></a></li>
               </ul>
            </div> <!-- acx_smw_es_wp_acx_service_list -->
            
   <div class="acx_smw_es_wp_send_ylw_para"><?php _e('We Have Extensive Experience in WordPress Troubleshooting,Theme Design & Plugin Development.','acurax-social-media-widget'); ?></div> <!-- acx_smw_es_wp_secnd_ylw_para-->
   
        </div> <!-- acx_smw_es_wp_left_content_inner -->
        </div> <!-- acx_smw_es_wp_left_area -->
        
        <div class="acx_smw_es_wp_right_area">
        	<div class="acx_smw_es_wp_right_inner_form_wrap">
            	<div class="acx_smw_es_wp_inner_wp_form">
                <div class="acx_smw_es_wp_form_head"><?php _e('WE ARE DEDICATED TO HELP YOU. SUBMIT YOUR REQUEST NOW..!','acurax-social-media-widget'); ?></div> <!-- acx_smw_es_wp_form_head -->
                <form class="acx_smw_es_wp_support_acx">
                <span class="acx_smw_es_cnvas_input acx_smw_es_half_width_sec acx_smw_es_haif_marg_right"><input type="text" placeholder="<?php _e('Name*','acurax-social-media-widget'); ?>" id="acx_name"></span> <!-- acx_smw_es_cnvas_input -->
                <span class="acx_smw_es_cnvas_input acx_smw_es_half_width_sec acx_smw_es_haif_marg_left"><input type="email" placeholder="<?php _e('Email*','acurax-social-media-widget'); ?>" id="acx_email"></span> <!-- acx_smw_es_cnvas_input -->
                <span class="acx_smw_es_cnvas_input acx_smw_es_half_width_sec acx_smw_es_haif_marg_right"><input type="text" placeholder="<?php _e('Phone Number*','acurax-social-media-widget'); ?>" id="acx_phone"></span> <!-- acx_smw_es_cnvas_input -->
                <span class="acx_smw_es_cnvas_input acx_smw_es_half_width_sec acx_smw_es_haif_marg_left"><input type="text" placeholder="<?php _e('Website URL*','acurax-social-media-widget'); ?>" value="<?php echo $acx_installation_url; ?>" id="acx_weburl"></span> <!-- acx_smw_es_cnvas_input -->
                <span class="acx_smw_es_cnvas_input"><input type="text" placeholder="<?php _e('Subject*','acurax-social-media-widget'); ?>" id="acx_subject"></span> <!-- acx_smw_es_cnvas_input -->
                <span class="acx_smw_es_cnvas_input"><textarea placeholder="<?php _e('Question*','acurax-social-media-widget'); ?>" id="acx_question"></textarea></span> <!-- acx_smw_es_cnvas_input -->
                <span class="acx_smw_es_cnvas_input"><input class="acx_smw_es_wp_acx_submit" type="button" value="<?php _e('SUBMIT REQUEST','acurax-social-media-widget'); ?>" onclick="acx_quick_smw_request_submit();"></span> <!-- acx_smw_es_cnvas_input -->
                </form>
                </div> <!-- acx_smw_es_wp_inner_wp_form -->
            </div> <!-- acx_smw_es_wp_right_inner_form_wrap -->
        </div> <!-- acx_smw_es_wp_left_area -->
    </div> <!-- acx_smw_es_acx_content_area -->
    
    <div class="acx_smw_es_footer_content_cvr">
    <div class="acx_smw_es_wp_footer_area_desc"><?php _e('Its our pleasure to thank you for using our plugin and being with us. We always do our best to help you on your needs.','acurax-social-media-widget'); ?></div> <!--acx_smw_es_wp_footer_area_desc -->
    </div> <!-- acx_smw_es_footer_content_cvr -->
    
    </div> <!-- acx_smw_es_middle_section -->
</div> <!--acx_smw_es_common_raw -->
<script type="text/javascript">
var request_acx_form_status = 0;
function acx_quick_form_reset()
{
jQuery("#acx_subject").val('');
jQuery("#acx_question").val('');
}
acx_quick_form_reset();
function acx_quick_smw_request_submit()
{
var acx_name = jQuery("#acx_name").val();
var acx_email = jQuery("#acx_email").val();
var acx_phone = jQuery("#acx_phone").val();
var acx_weburl = jQuery("#acx_weburl").val();
var acx_subject = jQuery("#acx_subject").val();
var acx_question = jQuery("#acx_question").val();
var order = '&action=acx_quick_smw_request_submit&acx_name='+acx_name+'&acx_email='+acx_email+'&acx_phone='+acx_phone+'&acx_weburl='+acx_weburl+'&acx_subject='+acx_subject+'&acx_question='+acx_question+'&acx_smw_es=<?php echo wp_create_nonce("acx_smw_es"); ?>'; 
if(request_acx_form_status == 0)
{
request_acx_form_status = 1;
jQuery.post(ajaxurl, order, function(quick_request_acx_response)
{
if(quick_request_acx_response == 1)
{
alert('<?php _e('Your Request Submitted Successfully!','acurax-social-media-widget'); ?>');
acx_quick_form_reset();
request_acx_form_status = 0;
} else if(quick_request_acx_response == 2)
{
alert('<?php _e('Please Fill Mandatory Fields.','acurax-social-media-widget'); ?>');
request_acx_form_status = 0;
} else
{
alert('<?php _e('There was an error processing the request, Please try again.','acurax-social-media-widget'); ?>');
acx_quick_form_reset();
request_acx_form_status = 0;
}
});
} else
{
alert('<?php _e('A request is already in progress.','acurax-social-media-widget'); ?>');
}
}
</script>
<?php }


function acx_quick_smw_request_submit_callback()
{
	
$acx_name =  $acx_email =  $acx_phone =  $acx_weburl = $acx_subject = $acx_question = $acx_smw_es = "";
	if(ISSET($_POST['acx_name']))
	{
		$acx_name =  $_POST['acx_name'];
	}
	if(ISSET($_POST['acx_email']))
	{
		$acx_email =  $_POST['acx_email'];
	}
	if(ISSET($_POST['acx_phone']))
	{
		$acx_phone =  $_POST['acx_phone'];
	}
	if(ISSET($_POST['acx_weburl']))
	{
		$acx_weburl =  $_POST['acx_weburl'];
	}
	if(ISSET($_POST['acx_subject']))
	{
		$acx_subject =  $_POST['acx_subject'];
	}
	if(ISSET($_POST['acx_question']))
	{
		$acx_question =  $_POST['acx_question'];
	}
	if(ISSET($_POST['acx_smw_es']))
	{
		$acx_smw_es = $_POST['acx_smw_es'];
	}
	if (!wp_verify_nonce($acx_smw_es,'acx_smw_es'))
	{
		$acx_smw_es == "";
	}
	if(!current_user_can('manage_options'))
	{
		$acx_smw_es == "";
	}
if($acx_smw_es == "" || $acx_name == "" || $acx_email == "" || $acx_phone == "" || $acx_weburl == "" || $acx_subject == "" || $acx_question == "")
{
echo 2;
} else
{
$current_user_acx = wp_get_current_user();
$current_user_acx = $current_user->user_email;
if($current_user_acx == "")
{
$current_user_acx = $acx_email;
}
$headers[] = "from: ". $acx_name . ' <' . $current_user_acx . '>';
$headers[] = "Content-Type: text/html; charset=UTF-8"; 
$message = "Name: ".$acx_name . "\r\n <br>";
$message = $message ."E-mail: ".$acx_email . "\r\n <br>";
if($acx_phone != "")
{
$message = $message ."Phone: ".$acx_phone . "\r\n <br>";
}
// In case any of our lines are larger than 70 characters, we should use wordwrap()
$acx_question = wordwrap($acx_question, 70, "\r\n <br>");
$message = $message ."Request From: smw - Expert Help Request Form  \r\n <br>"; 
$message = $message . "Website:".$acx_weburl . "\r\n <br>";
$message = $message . "Question:" .$acx_question . "\r\n <br>";
$message = stripslashes($message);
$acx_subject = "Quick support - " . $acx_subject;
$emailed = wp_mail( 'info@acurax.com', $acx_subject, $message, $headers );
if($emailed)
{
echo 1;
} else
{
echo 0;
}
}
	die(); // this is required to return a proper result
}add_action('wp_ajax_acx_quick_smw_request_submit','acx_quick_smw_request_submit_callback');



//*************** Include style.css in Header ********
// Getting Option From DB *****************************	
$acx_widget_si_theme = get_option('acx_widget_si_theme');
$acx_widget_si_credit = get_option('acx_widget_si_credit');
$acx_widget_si_facebook = get_option('acx_widget_si_facebook');
$acx_widget_si_youtube = get_option('acx_widget_si_youtube');
$acx_widget_si_twitter = get_option('acx_widget_si_twitter');
$acx_widget_si_linkedin = get_option('acx_widget_si_linkedin');
$acx_widget_si_gplus = get_option('acx_widget_si_gplus');
$acx_widget_si_pinterest = get_option('acx_widget_si_pinterest');
$acx_widget_si_feed = get_option('acx_widget_si_feed');
$acx_widget_si_instagram = get_option('acx_widget_si_instagram');
$acx_widget_si_icon_size = get_option('acx_widget_si_icon_size');
$acx_si_smw_float_fix = get_option('acx_si_smw_float_fix');
$acx_si_smw_theme_warning_ignore = get_option('acx_si_smw_theme_warning_ignore');
// *****************************************************


if(ISSET($_GET['page']))
{
$acx_si_widget_current_page = sanitize_text_field(trim($_GET['page']));
} else
{
$acx_si_widget_current_page = "";
} 
function acurax_si_widget_simple($acx_widget_array)
{
	// Getting Globals *****************************	
	global $acx_widget_si_theme, $acx_widget_si_credit , $acx_widget_si_twitter, $acx_widget_si_facebook, $acx_widget_si_youtube,$acx_widget_si_gplus,
	$acx_widget_si_linkedin, $acx_widget_si_pinterest, $acx_widget_si_feed, $acx_widget_si_icon_size,$acx_widget_si_instagram;
	// *****************************************************	
	
	if(is_array($acx_widget_array) && array_key_exists('theme',$acx_widget_array))
	{
		$theme = $acx_widget_array['theme'];	
	}
	else
	{
		$theme = '';
	}

	if ($theme == "") { $acx_widget_si_touse_theme = $acx_widget_si_theme; } else { $acx_widget_si_touse_theme = $theme; }
		//******** MAKING EACH BUTTON LINKS ********************
		if	($acx_widget_si_twitter == "") { $twitter_link = ""; } else 
		{
			$twitter_link = "<a href='http://www.twitter.com/". $acx_widget_si_twitter ."' target='_blank' title='". __('Visit Us On Twitter','acurax-social-media-widget')."'>" . "<img src=" . 
			plugins_url('images/themes/'. $acx_widget_si_touse_theme .'/twitter.png', __FILE__) . " style='border:0px;' alt='". __('Visit Us On Twitter','acurax-social-media-widget'). "' /></a>";
		}
		if	($acx_widget_si_facebook == "") { $facebook_link = ""; } else 
		{
			$facebook_link = "<a href='". $acx_widget_si_facebook ."' target='_blank' title='". __('Visit Us On Facebook','acurax-social-media-widget'). "'>" . "<img src=" . plugins_url('images/themes/'
			. $acx_widget_si_touse_theme .'/facebook.png', __FILE__) . " style='border:0px;' alt='" . __('Visit Us On Facebook','acurax-social-media-widget'). "' /></a>";
		}
		if	($acx_widget_si_gplus == "") { $gplus_link = ""; } else 
		{
			$gplus_link = "<a href='". $acx_widget_si_gplus ."' target='_blank' title='". __('Visit Us On GooglePlus','acurax-social-media-widget') . "'>" . "<img src=" . plugins_url('images/themes/'. 
			$acx_widget_si_touse_theme .'/googleplus.png', __FILE__) . " style='border:0px;' alt='". __('Visit Us On GooglePlus','acurax-social-media-widget') . "' /></a>";
		}
		if	($acx_widget_si_pinterest == "") { $pinterest_link = ""; } else 
		{
			$pinterest_link = "<a href='". $acx_widget_si_pinterest ."' target='_blank' title='". __('Visit Us On Pinterest','acurax-social-media-widget'). "'>" . "<img src=" . plugins_url(
			'images/themes/'. $acx_widget_si_touse_theme .'/pinterest.png', __FILE__) . " style='border:0px;' alt='". __('Visit Us On Pinterest','acurax-social-media-widget'). "' /></a>";
		}
		if	($acx_widget_si_youtube == "") { $youtube_link = ""; } else 
		{
			$youtube_link = "<a href='". $acx_widget_si_youtube ."' target='_blank' title='". __('Visit Us On Youtube','acurax-social-media-widget'). "'>" . "<img src=" . plugins_url('images/themes/'. 
			$acx_widget_si_touse_theme .'/youtube.png', __FILE__) . " style='border:0px;' alt='". __('Visit Us On Youtube','acurax-social-media-widget'). "' /></a>";
		}
		if	($acx_widget_si_linkedin == "") { $linkedin_link = ""; } else 
		{
			$linkedin_link = "<a href='". $acx_widget_si_linkedin ."' target='_blank' title='". __('Visit Us On Linkedin','acurax-social-media-widget'). "'>" . "<img src=" . plugins_url('images/themes/'
			. $acx_widget_si_touse_theme .'/linkedin.png', __FILE__) . " style='border:0px;' alt='". __('Visit Us On Linkedin','acurax-social-media-widget'). "' /></a>";
		}
		if	($acx_widget_si_feed == "") { $feed_link = ""; } else 
		{
			$feed_link = "<a href='". $acx_widget_si_feed ."' target='_blank' title='". __('Check Our Feed','acurax-social-media-widget'). "'>" . "<img src=" . plugins_url('images/themes/'
			. $acx_widget_si_touse_theme .'/feed.png', __FILE__) . " style='border:0px;' alt='". __('Check Our Feed','acurax-social-media-widget'). "' /></a>";
		}
		if	($acx_widget_si_instagram == "") { $instagram_link = ""; } else 
		{
			$instagram_link = "<a href='". $acx_widget_si_instagram ."' target='_blank' title='". __('Visit Us On Instagram','acurax-social-media-widget'). "'>" . "<img src=" . plugins_url('images/themes/'
			. $acx_widget_si_touse_theme .'/instagram.png', __FILE__) . " style='border:0px;' alt='". __('Visit Us On Instagram','acurax-social-media-widget'). "' /></a>";
		}
		$social_widget_icon_array_order = get_option('social_widget_icon_array_order'); 
 	   if(is_serialized($social_widget_icon_array_order)) 
 	   { 
			$social_widget_icon_array_order = unserialize($social_widget_icon_array_order);
		}
		$acx_w_html = '' ;
	foreach ($social_widget_icon_array_order as $key => $value)
	{
		if ($value == 0) { $acx_w_html .= $twitter_link; } 
		else if ($value == 1) { $acx_w_html .= $facebook_link; } 
		else if ($value == 2) { $acx_w_html .= $gplus_link; } 
		else if ($value == 3) { $acx_w_html .= $pinterest_link; } 
		else if ($value == 4) { $acx_w_html .= $youtube_link; } 
		else if ($value == 5) { $acx_w_html .= $linkedin_link; } 
		
		else if ($value == 6) { $acx_w_html .= $feed_link; }
		else if ($value == 7) { $acx_w_html .= $instagram_link; }
	}
return $acx_w_html;
} //acurax_si_widget_simple()
function acx_widget_theme_check_wp_head() {
	$template_directory = get_template_directory();
	// If header.php exists in the current theme, scan for "wp_head"
	$file = $template_directory . '/header.php';
	if (is_file($file)) {
		$search_string = "wp_head";
		$file_lines = @file($file);
		
		foreach ($file_lines as $line) {
			$searchCount = substr_count($line, $search_string);
			if ($searchCount > 0) {
				return true;
			}
		}
		
		// wp_head() not found:
		echo "<div class=\"highlight\" style=\"width: 99%; margin-top: 10px; margin-bottom: 10px; border: 1px solid darkred;\">" . __('Your theme needs to be fixed for plugins to work. To fix your theme, use the ','acurax-social-media-widget'). "<a href=\"theme-editor.php\">". __('Theme Editor','acurax-social-media-widget') ."</a>". __(' to insert','acurax-social-media-widget'). " <code>".htmlspecialchars("<?php wp_head(); ?>")."</code>". __('just before the','acurax-social-media-widget'). " <code>".htmlspecialchars("</head>")."</code> " . __("line of your theme's " ,"acurax-social-media-widget"). "<code>header.php</code> file." . "</div>";
		
		
	}
} // theme check 
if($acx_si_smw_theme_warning_ignore != "yes")
{
add_action('admin_notices', 'acx_widget_theme_check_wp_head');
}
function acurax_widget_icons()
{
	global $acx_widget_si_theme, $acx_widget_si_credit, $acx_widget_si_twitter, $acx_widget_si_facebook, $acx_widget_si_youtube, 		
	$acx_widget_si_linkedin, $acx_widget_si_gplus, $acx_widget_si_pinterest, $acx_widget_si_feed, $acx_widget_si_icon_size,$acx_widget_si_instagram;
			
	if($acx_widget_si_twitter != "" || $acx_widget_si_facebook != "" || $acx_widget_si_youtube != "" || $acx_widget_si_linkedin != ""  || 
	$acx_widget_si_pinterest != "" || $acx_widget_si_gplus != "" || $acx_widget_si_feed != "" || $acx_widget_si_instagram != "")
	{
	//*********************** STARTED DISPLAYING THE ICONS ***********************
		echo "\n\n\n<!-- Starting Icon Display Code For Social Media Icon From Acurax International www.acurax.com -->\n";
		echo "<div id='acx_social_widget' style='text-align:center;'>";
		$acx_pass_array = array(
		'theme' => $acx_widget_si_theme,
		'size'  => $acx_widget_si_icon_size
		);
		echo acurax_si_widget_simple($acx_pass_array);		
		echo "</div>\n";
		echo "<!-- Ending Icon Display Code For Social Media Icon From Acurax International www.acurax.com -->\n\n\n";
	//*****************************************************************************
	} // Chking null fields
	
} // Ending acurax_widget_icons();
function extra_style_acx_widget_icon()
{
	global $acx_widget_si_icon_size;
	global $acx_si_smw_float_fix;
		echo "\n\n\n<!-- Starting Styles For Social Media Icon From Acurax International www.acurax.com -->\n<style type='text/css'>\n";
		echo "#acx_social_widget img \n{\n";
		echo "width: " . $acx_widget_si_icon_size . "px; \n}\n";
				echo "#acx_social_widget \n{\n";
				echo "min-width:0px; \n";
				echo "position: static; \n}\n";
			if ($acx_si_smw_float_fix == "yes") 
			{
				echo ".acx_smw_float_fix a \n{\n";
				echo "display:inline-block; \n}\n";
			}
				
		echo "</style>\n<!-- Ending Styles For Social Media Icon From Acurax International www.acurax.com -->\n\n\n\n";
}	add_action('admin_head', 'extra_style_acx_widget_icon'); // ADMIN
	add_action('wp_head', 'extra_style_acx_widget_icon'); // PUBLIC 

$acx_widget_si_sc_id = 0; // Defined to assign shortcode unique id
function DISPLAY_WIDGET_acurax_widget_icons_SC($atts)
{
	global $acx_widget_si_icon_size, $acx_widget_si_sc_id;
	extract(shortcode_atts(array(
	"theme" => '',
	"size" => $acx_widget_si_icon_size,
	"autostart" => 'false'
	), $atts));
	if ($theme > ACX_SOCIALMEDIA_WIDGET_TOTAL_THEMES) { $theme = ""; }
	if (!is_numeric($theme)) { $theme = ""; }
	if ($size > 55) { $size = $acx_widget_si_icon_size; }
	if (!is_numeric($size)) { $size = $acx_widget_si_icon_size; }
		$acx_widget_si_sc_id = $acx_widget_si_sc_id + 1;
		ob_start();
		echo "<style>\n";
		echo "#short_code_si_icon img \n {";
		echo "width:" . $size . "px; \n}\n";
		echo ".scid-" . $acx_widget_si_sc_id . " img \n{\n";
		echo "width:" . $size . "px !important; \n}\n";
		echo "</style>";
		echo "<div id='short_code_si_icon' style='text-align:center;' class='acx_smw_float_fix scid-" . $acx_widget_si_sc_id . "'>";
		$acx_pass_array = array(
		'theme' => $theme,
		'size'  => $size
		);
		echo acurax_si_widget_simple($acx_pass_array);		
		echo "</div>";
		$content = ob_get_contents();
		ob_end_clean();
		return $content;
} // DISPLAY_WIDGET_acurax_widget_icons_SC
			
function acx_widget_si_custom_admin_js()
{
	wp_enqueue_script('jquery');
	wp_enqueue_script('jquery-ui-core');
	wp_enqueue_script('jquery-ui-sortable');
}	add_action( 'admin_enqueue_scripts', 'acx_widget_si_custom_admin_js' );

$total_arrays = ACX_SMW_TOTAL_STATIC_SERVICES; // Number Of static Services
$social_widget_icon_array_order = get_option('social_widget_icon_array_order'); 

if(is_serialized($social_widget_icon_array_order)) 
{ 
	$social_widget_icon_array_order = unserialize($social_widget_icon_array_order);
}
$social_widget_icon_array_count = count($social_widget_icon_array_order); 
if ($social_widget_icon_array_count < $total_arrays) 
{
	do_action('acx_asmw_orderarray_refresh');
}

// wp-admin Notices >> Plugin not configured
function acx_widget_si_pluign_not_configured()
{
	echo '<div class="updated">
	<p><b>'. __('Congratulations!, You Have Successfully Installed Acurax Social Media Widget, The Plugin Is Not Configured - ','acurax-social-media-widget'). '<a href="'.wp_nonce_url(admin_url("admin.php?page=Acurax-Social-Widget-Settings")).'">'. __('Click Here to Configure','acurax-social-media-widget').'</a></b></p></div>';
}
if ($social_widget_icon_array_count == $total_arrays) 
{
	if ($acx_widget_si_twitter == "" && $acx_widget_si_facebook == "" && $acx_widget_si_youtube == "" && $acx_widget_si_linkedin == ""  && $acx_widget_si_pinterest == "" && $acx_widget_si_gplus == "" && $acx_widget_si_feed == "" && $acx_widget_si_instagram == "")
	{
		if($acx_si_widget_current_page != 'Acurax-Social-Widget-Settings ')
		{
			add_action('admin_notices', 'acx_widget_si_pluign_not_configured',1);
		}
	}
} 

function acx_widget_si_pluign_promotion()
{
 
$acx_widget_si_installed_date = get_option('acx_widget_si_installed_date');
if ($acx_widget_si_installed_date=="") { $acx_widget_si_installed_date = time();}
$acx_widget_si_next_date = get_option('acx_widget_si_next_date');
$acx_widget_si_days_till_today_from_install = time()-$acx_widget_si_installed_date;
$acx_widget_si_days_till_today_from_install = round(($acx_widget_si_days_till_today_from_install/60/60/24))." Days";
global $current_user;
wp_get_current_user();
$acx_widget_si_current_user = $current_user->display_name;
if($acx_widget_si_current_user == "")
{
$acx_widget_si_current_user = "Webmaster";
}
echo '<div id="acx_td_asmw" class="notice">' . __('Hey','acurax-social-media-widget'). ' <b>'.$acx_widget_si_current_user.'</b>,'. __(' You were using Acurax Social Media Widget Wordpress Plugin for the last','acurax-social-media-widget').' <b>'.$acx_widget_si_days_till_today_from_install.'</b>,'. __(' and hope you are enjoying it.','acurax-social-media-widget').'<br>' . __(' From the bottom of our heart, we the team @ ','acurax-social-media-widget').'<a href="http://www.acurax.com/?utm_source=asmw&utm_campaign=days" style="font-weight: normal; margin-left: 0px; color: rgb(68, 68, 68);" target="_blank">'. __(' Acurax Technologies','acurax-social-media-widget').'</a>'. __(' thank you for being with us, and we appreciate your feedback,reviews and support.','acurax-social-media-widget').'<br><a href="https://wordpress.org/support/plugin/'.ACX_SMW_WP_SLUG.'/reviews/?filter=5&rate=5#new-post" target="_blank">'. __('Rate 5★\'s on wordpress','acurax-social-media-widget').'</a><a href="'.wp_nonce_url(admin_url("admin.php?page=Acurax-Social-Widget-Premium")).'">'. __('Premium Version Benefits','acurax-social-media-widget').'</a><a href="'.wp_nonce_url(admin_url('admin.php?page=Acurax-Social-Widget-Premium&td=hide')).'">'. __('Hide for Now','acurax-social-media-widget'). '</a></div>';
}
$acx_widget_si_installed_date = get_option('acx_widget_si_installed_date');
if ($acx_widget_si_installed_date=="") { $acx_widget_si_installed_date = time();}
$acx_asmw_d = 30;
$acx_asmw_prom = false;

if(get_option('acx_widget_si_td') == "")
{
	$acx_widget_si_next_date = $acx_widget_si_installed_date+((60*60*24)*$acx_asmw_d);
	update_option('acx_widget_si_next_date', $acx_widget_si_next_date);
	update_option('acx_widget_si_td', "show");
}

$acx_widget_si_next_date = get_option('acx_widget_si_next_date');

if(time() > $acx_widget_si_next_date)
{
$acx_asmw_prom = true;
}

if ($acx_asmw_prom == true && get_option('acx_widget_si_td') == "show")
{
add_action('admin_notices', 'acx_widget_si_pluign_promotion',1);
}
// Starting Widget Code
class acx_social_widget_icons_Widget extends WP_Widget
{
    // Register the widget
    function __construct() 
	{
        // Set some widget options
        $widget_options = array( 'description' => __('Allow users to show Social Media Icons from Acurax Social Media Widget 
		Plugin','acurax-social-media-widget'), 'classname' => 'acx-smw-social-icon-desc' );
        // Set some control options (width, height etc)
        $control_options = array( 'width' => 300 );
        // Actually create the widget (widget id, widget name, options...)
        parent::__construct( 'acx-social-icons-widget',  __('Acurax Social Media Widget','acurax-social-media-widget'), $widget_options, $control_options );
    }
    // Output the content of the widget
    function widget($args, $instance) 
	{
        extract( $args ); // Don't worry about this
        // Get our variables
        $title = apply_filters( 'widget_title', $instance['title'] );
		$icon_size = $instance['icon_size'];
		$icon_theme = $instance['icon_theme'];
		$icon_align = $instance['icon_align'];
        // This is defined when you register a sidebar
        echo $before_widget;
        // If our title isn't empty then show it
        if ( $title ) 
		{
            echo $before_title . $title . $after_title;
        }
		do_action('acx_fsmi_add_icon_customize_style',$instance,$this->get_field_id('widget'));
		echo "<style>\n";
		echo "." . $this->get_field_id('widget') . " img \n{\n";
		echo "width:" . $icon_size . "px; \n } \n";
		echo "</style>";
		echo "<div id='acurax_si_widget_simple' class='acx_smw_float_fix " . $this->get_field_id('widget') . "'";
		if($icon_align != "") { echo " style='text-align:" . $icon_align . ";'>"; } else { echo " style='text-align:center;'>"; }
		$acx_pass_array = array(
		'theme' => $icon_theme,
		'size'  => $icon_size,
		'align' => $icon_align 
		);
		echo acurax_si_widget_simple($acx_pass_array);	
		echo "</div>";
        // This is defined when you register a sidebar
        echo $after_widget;
    }
	// Output the admin options form
	function form($instance) 
	{
		$total_themes = ACX_SOCIALMEDIA_WIDGET_TOTAL_THEMES;
		$total_themes = $total_themes + 1;
		// These are our default values
		$defaults = array( 'title' => __('Social Media Icons','acurax-social-media-widget'),'icon_size' => '32' );
		// This overwrites any default values with saved values
		$instance = wp_parse_args( (array) $instance, $defaults );
		?>
			<p>
				<label for="<?php echo $this->get_field_id('title'); ?>"><?php _e('Title:','acurax-social-media-widget'); ?></label>
				<input id="<?php echo $this->get_field_id('title'); ?>" name="<?php echo $this->get_field_name('title'); ?>" 
				value="<?php echo $instance['title']; ?>" type="text" class="widefat" />
			</p>
			<p>
				<label for="<?php echo $this->get_field_id('icon_size'); ?>"><?php _e('Icon Size:','acurax-social-media-widget'); ?></label>
				<select class="widefat" name="<?php echo $this->get_field_name('icon_size'); ?>" id="<?php echo $this
				->get_field_id('icon_size'); ?>">
				<option value="16"<?php if ($instance['icon_size'] == "16") { echo 'selected="selected"'; } ?>>16<?php _e('px','acurax-social-media-widget'); ?> X 16<?php _e('px','acurax-social-media-widget'); ?> </option>
				<option value="25"<?php if ($instance['icon_size'] == "25") { echo 'selected="selected"'; } ?>>25<?php _e('px','acurax-social-media-widget'); ?> X 25<?php _e('px','acurax-social-media-widget'); ?> </option>
				<option value="32"<?php if ($instance['icon_size'] == "32") { echo 'selected="selected"'; } ?>>32<?php _e('px','acurax-social-media-widget'); ?> X 32<?php _e('px','acurax-social-media-widget'); ?> </option>
				<option value="40"<?php if ($instance['icon_size'] == "40") { echo 'selected="selected"'; } ?>>40<?php _e('px','acurax-social-media-widget'); ?> X 40<?php _e('px','acurax-social-media-widget'); ?> </option>
				<option value="48"<?php if ($instance['icon_size'] == "48") { echo 'selected="selected"'; } ?>>48<?php _e('px','acurax-social-media-widget'); ?> X 48<?php _e('px','acurax-social-media-widget'); ?> </option>
				<option value="55"<?php if ($instance['icon_size'] == "55") { echo 'selected="selected"'; } ?>>55<?php _e('px','acurax-social-media-widget'); ?> X 55<?php _e('px','acurax-social-media-widget'); ?> </option>
				</select>
			</p>
			<p>
				<label for="<?php echo $this->get_field_id('icon_theme'); ?>"><?php _e('Icon Theme:','acurax-social-media-widget'); ?></label>
				<select class="widefat" name="<?php echo $this->get_field_name('icon_theme'); ?>" id="<?php echo $this
				->get_field_id('icon_theme'); ?>">
				<option value=""<?php if(!ISSET($instance['icon_theme'])) { echo 
				'selected="selected"'; } ?>><?php _e('Default Theme Design','acurax-social-media-widget'); ?></option>
				<?php
				for ($i=1; $i < $total_themes; $i++)
				{
					?>
					<option value="<?php echo $i; ?>"<?php if(ISSET($instance['icon_theme'])){if ($instance['icon_theme'] == $i) { echo 
					'selected="selected"'; }} ?>><?php _e('Theme Design','acurax-social-media-widget'); ?> <?php echo $i; ?> </option>
					<?php
				}	?>
				</select>
			</p>
			<p>
				<label for="<?php echo $this->get_field_id('icon_align'); ?>"><?php _e('Icon Align:','acurax-social-media-widget'); ?></label>
				<select class="widefat" name="<?php echo $this->get_field_name('icon_align'); ?>" id="<?php echo $this
				->get_field_id('icon_align'); ?>">
				<option value=""<?php if(!ISSET($instance['icon_align']))  { echo 'selected="selected"'; } ?>><?php _e('Default','acurax-social-media-widget'); ?> </option>
				<option value="left"<?php if(ISSET($instance['icon_align'])){  if($instance['icon_align'] == "left") { echo 'selected="selected"'; }} ?>><?php _e('Left','acurax-social-media-widget'); ?></option>
				<option value="center"<?php if(ISSET($instance['icon_align'])){ if($instance['icon_align'] == "center") { echo 'selected="selected"'; } }?>><?php _e('Center','acurax-social-media-widget'); ?></option>
				<option value="right"<?php if(ISSET($instance['icon_align'])){ if($instance['icon_align'] == "right") { echo 'selected="selected"'; } }?>><?php _e('Right','acurax-social-media-widget'); ?>  </option>
				</select>
			</p>
			<p><?php _e('You can configure your social media profiles ','acurax-social-media-widget'); ?><a href="<?php echo wp_nonce_url(admin_url('admin.php?page=Acurax-Social-Widget-Settings'));?>" target="_blank"><?php _e('here','acurax-social-media-widget'); ?></a></p>
		<?php
	}
	// Processes the admin options form when saved
	function update($new_instance, $old_instance) 
	{
		// Get the old values
		$instance = $old_instance;
		// Update with any new values (and sanitise input)
		$instance['title'] = strip_tags( $new_instance['title'] );
		$instance['icon_size'] = strip_tags( $new_instance['icon_size'] );
		$instance['icon_theme'] = strip_tags( $new_instance['icon_theme'] );
		$instance['icon_align'] = strip_tags( $new_instance['icon_align'] );
		return $instance;
	}
} add_action('widgets_init', create_function('', 'return register_widget("acx_social_widget_icons_Widget");'));
// Ending Widget Codes
function acurax_smw_optin()
{ 
echo "";
}

function socialicons_widget_comparison($ad=2)
{
$ad_1 = '
</hr>
<div id="ss_middle_wrapper" style="margin-top:15px;"> 
		<div id="ss_middle_center"> 
			<div id="ss_middle_inline_block"> 
			<a name="compare"></a>
				<div class="middle_h2_1"> 
					<h2>'. __("Limited on Features ?","acurax-social-media-widget").'</h2>
					<h3>'. __("Compare and Decide","acurax-social-media-widget").'</h3>
				</div><!-- middle_h2_1 -->
				
<div id="ss_features_table"> 
				
					<div id="ss_table_header"> 
						<div class="tb_h1"> <h3>'. __("Feature Group","acurax-social-media-widget").'</h3> </div><!-- tb_h1 -->
							<div class="tb_h2"> <h3>'. __("Features","acurax-social-media-widget").'</h3> </div><!-- tb_h2 -->
							<div class="tb_h3"> <div class="ss_download"> </div><!-- ss_download --> </div><!-- tb_h3 -->
						<div class="tb_h4 smw_tb_h4"> <a href="http://clients.acurax.com/order.php?pid=fsmi_power&utm_source=plugin_asmw_settings_table&utm_medium=link&utm_campaign=compare_buynow" target="_blank"><div class="ss_buy_now"> </div><!-- ss_buy_now --></a> </div><!-- tb_h4 -->
					</div><!-- ss_table_header -->
						
					<div class="ss_column_holder"> 
					
						<div class="tb_h1 mini"> <h3>'. __("Feature Group","acurax-social-media-widget").'</h3> </div><!-- tb_h1 -->
						<div class="ss_feature_group" style="padding-top: 197px;">'. __(" Display ","acurax-social-media-widget").'</div><!-- -->
						<div class="tb_h1 mini"> <h3>'. __("Features","acurax-social-media-widget").'</h3> </div><!-- tb_h1 -->
						<div class="ss_features"> 
							<ul>
								<li>'. __("More Sharp Quality Icons","acurax-social-media-widget").'</li>
									<li>'. __("20+ Icon Theme/Style","acurax-social-media-widget").'</li>
										<li>'. __("Can Choose Icon Theme/Style","acurax-social-media-widget").'</li>
											<li>'. __("Can Choose Icon Size","acurax-social-media-widget").'</li>
												<li>'. __("Automatic/Manual Integration","acurax-social-media-widget").'</li>
													<li>'. __("Set MouseOver text for each icon in Share Mode","acurax-social-media-widget").'</li>
												<li>'. __("Set MouseOver text for each icon in Profile Link Mode","acurax-social-media-widget").'</li>
											<li>'. __("Option to HIDE Invididual Share Icon","acurax-social-media-widget").'</li>
										<li><strong>'. __("Set Floating Icons in Vertical","acurax-social-media-widget").'</strong></li>
									<li><strong>'. __("Define how many icons in 1 row","acurax-social-media-widget").'</strong></li>
								<li class="ss_last_one"><strong>'. __("Add Custom Icons","acurax-social-media-widget").'</strong></li>
							</ul>
						</div><!-- ss_features -->
						
						<div class="tb_h1 mini"> <h3>'. __("FREE","acurax-social-media-widget").' &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp <span style="color: #ffe400;">'. __("PREMIUM","acurax-social-media-widget").'</span></h3> </div><!-- tb_h1 -->
						<div class="ss_y_n_holder"> 
							<div class="ss_no"> </div><!-- ss_no -->
								<div class="ss_yes"> </div><!-- ss_yes -->
									<div class="ss_yes"> </div><!-- ss_yes -->
										<div class="ss_yes"> </div><!-- ss_yes -->
											<div class="ss_yes"> </div><!-- ss_yes -->
												<div class="ss_no"> </div><!-- ss_no -->
											<div class="ss_no"> </div><!-- ss_no -->
										<div class="ss_no"> </div><!-- ss_no -->
									<div class="ss_no"> </div><!-- ss_no -->
								<div class="ss_no"> </div><!-- ss_no -->
							<div class="ss_no ss_last_one"> </div><!-- ss_no -->
						</div><!-- ss_y_n_holder -->
						
						<div class="ss_y_n_holder"> 
							<div class="ss_yes"> </div><!-- ss_yes -->
								<div class="ss_yes"> </div><!-- ss_yes -->
									<div class="ss_yes"> </div><!-- ss_yes -->
										<div class="ss_yes"> </div><!-- ss_yes -->
											<div class="ss_yes"> </div><!-- ss_yes -->
												<div class="ss_yes"> </div><!-- ss_yes -->
											<div class="ss_yes"> </div><!-- ss_yes -->
										<div class="ss_yes"> </div><!-- ss_yes -->
									<div class="ss_yes"> </div><!-- ss_yes -->
								<div class="ss_yes"> </div><!-- ss_yes -->
							<div class="ss_yes ss_last_one"> </div><!-- ss_yes -->
						</div><!-- ss_y_n_holder -->						
						
					</div><!-- column_holder -->
					
					<div class="ss_column_holder"> 
					
						<div class="tb_h1 mini"> <h3>'. __("Feature Group","acurax-social-media-widget").'</h3> </div><!-- tb_h1 -->
						<div class="ss_feature_group" style="padding-top: 30px;">'. __(" Icon Function ","acurax-social-media-widget").'</div><!-- -->
						<div class="tb_h1 mini"> <h3>'. __("Features","acurax-social-media-widget").'</h3> </div><!-- tb_h1 -->
						<div class="ss_features"> 
							<ul>
								<li>'. __("Link to Social Media Profile","acurax-social-media-widget").'</li>
								<li class="ss_last_one"><strong>'. __("Share On Social Media","acurax-social-media-widget").'</strong></li>
							</ul>
						</div><!-- ss_features -->
						
						<div class="tb_h1 mini"> <h3>'. __("FREE ","acurax-social-media-widget").'&nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp <span style="color: #ffe400;">'. __("PREMIUM","acurax-social-media-widget").'</span></h3> </div><!-- tb_h1 -->
						<div class="ss_y_n_holder"> 
							<div class="ss_yes"> </div><!-- ss_yes -->
							<div class="ss_no ss_last_one"> </div><!-- ss_no -->
						</div><!-- ss_y_n_holder -->
						
						<div class="ss_y_n_holder"> 
							<div class="ss_yes"> </div><!-- ss_yes -->
							<div class="ss_yes ss_last_one"> </div><!-- ss_yes -->
						</div><!-- ss_y_n_holder -->						
						
					</div><!-- column_holder -->			

					<div class="ss_column_holder"> 
					
						<div class="tb_h1 mini"> <h3>'. __("Feature Group","acurax-social-media-widget").'</h3> </div><!-- tb_h1 -->
						<div class="ss_feature_group" style="padding-top: 30px;">'. __(" Animation ","acurax-social-media-widget").'</div><!-- -->
						<div class="tb_h1 mini"> <h3>'. __("Features","acurax-social-media-widget").'</h3> </div><!-- tb_h1 -->
						<div class="ss_features"> 
							<ul>
								<li>Fly Animation</li>
								<li class="ss_last_one"><strong>'. __("Mouse Over Effects","acurax-social-media-widget").'</strong></li>
							</ul>
						</div><!-- ss_features -->
						
						<div class="tb_h1 mini"> <h3>'. __("FREE","acurax-social-media-widget").' &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp <span style="color: #ffe400;">'. __("PREMIUM","acurax-social-media-widget").'</span></h3> </div><!-- tb_h1 -->
						<div class="ss_y_n_holder"> 
							<div class="ss_yes"> </div><!-- ss_yes -->
							<div class="ss_no ss_last_one"> </div><!-- ss_no -->
						</div><!-- ss_y_n_holder -->
						
						<div class="ss_y_n_holder"> 
							<div class="ss_yes"> </div><!-- ss_yes -->
							<div class="ss_yes ss_last_one"> </div><!-- ss_yes -->
						</div><!-- ss_y_n_holder -->						
						
					</div><!-- column_holder -->	

					<div class="ss_column_holder"> 
					
						<div class="tb_h1 mini"> <h3>'. __("Feature Group","acurax-social-media-widget").'</h3> </div><!-- tb_h1 -->
						<div class="ss_feature_group" style="padding-top: 84px;">'. __(" Fly Animation Repeat Interval","acurax-social-media-widget").'</div><!-- -->
						<div class="tb_h1 mini"> <h3>'. __("Features","acurax-social-media-widget").'</h3> </div><!-- tb_h1 -->
						<div class="ss_features"> 
							<ul>
								<li>'. __("Based On Time in Seconds","acurax-social-media-widget").'</li>
									<li><strong>'. __("Based On Time in Minutes","acurax-social-media-widget").'</strong></li>
										<li>'. __("Based On Time in Hours","acurax-social-media-widget").'</li>
									<li>'. __("Based on Page Views","acurax-social-media-widget").'</li>
								<li class="ss_last_one">'. __("Based On Page Views and Time","acurax-social-media-widget").'</li>
							</ul>
						</div><!-- ss_features -->
						
						<div class="tb_h1 mini"> <h3>'. __("FREE","acurax-social-media-widget").' &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp <span style="color: #ffe400;">'. __("PREMIUM","acurax-social-media-widget").'</span></h3> </div><!-- tb_h1 -->
						<div class="ss_y_n_holder"> 
							<div class="ss_no"> </div><!-- ss_no -->
								<div class="ss_no"> </div><!-- ss_no -->
									<div class="ss_no"> </div><!-- ss_no -->
								<div class="ss_no"> </div><!-- ss_no -->
							<div class="ss_no ss_last_one"> </div><!-- ss_no -->
						</div><!-- ss_y_n_holder -->
						
						<div class="ss_y_n_holder"> 
							<div class="ss_yes"> </div><!-- ss_yes -->
								<div class="ss_yes"> </div><!-- ss_yes -->
									<div class="ss_yes"> </div><!-- ss_yes -->
								<div class="ss_yes"> </div><!-- ss_yes -->
							<div class="ss_yes ss_last_one"> </div><!-- ss_yes -->
						</div><!-- ss_y_n_holder -->						
						
					</div><!-- column_holder -->	

					<div class="ss_column_holder"> 
					
						<div class="tb_h1 mini"> <h3>'. __("Feature Group","acurax-social-media-widget").'</h3> </div><!-- tb_h1 -->
						<div class="ss_feature_group" style="padding-top: 30px;"> '. __("Multiple Fly Animation","acurax-social-media-widget").'<br/></div><!-- -->
						<div class="tb_h1 mini"> <h3>'. __("Features","acurax-social-media-widget").'</h3> </div><!-- tb_h1 -->
						<div class="ss_features"> 
							<ul>
								<li>'. __("Can Choose Fly Start Position","acurax-social-media-widget").'</li>
								<li class="ss_last_one">'. __("Can Choose Fly End Position","acurax-social-media-widget").'</li>
							</ul>
						</div><!-- ss_features -->
						
						<div class="tb_h1 mini"> <h3>'. __("FREE ","acurax-social-media-widget").'&nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp <span style="color: #ffe400;">'. __("PREMIUM","acurax-social-media-widget").'</span></h3> </div><!-- tb_h1 -->
						<div class="ss_y_n_holder"> 
							<div class="ss_no"> </div><!-- ss_no -->
							<div class="ss_no ss_last_one"> </div><!-- ss_no -->
						</div><!-- ss_y_n_holder -->
						
						<div class="ss_y_n_holder"> 
							<div class="ss_yes"> </div><!-- ss_yes -->
							<div class="ss_yes ss_last_one"> </div><!-- ss_yes -->
						</div><!-- ss_y_n_holder -->						
						
					</div><!-- column_holder -->				

					<div class="ss_column_holder"> 
					
						<div class="tb_h1 mini"> <h3>'. __("Feature Group","acurax-social-media-widget").'</h3> </div><!-- tb_h1 -->
						<div class="ss_feature_group" style="padding-top: 52px;">'. __("Easy to Configure","acurax-social-media-widget").'</div><!-- -->
						<div class="tb_h1 mini"> <h3>'. __("Features","acurax-social-media-widget").'</h3> </div><!-- tb_h1 -->
						<div class="ss_features"> 
							<ul>
								<li>'. __("Ajax Based Settings Page","acurax-social-media-widget").'</li>
									<li>'. __("Drag & Drop Reorder Icons","acurax-social-media-widget").'</li>
								<li class="ss_last_one">'. __("Easy to Configure","acurax-social-media-widget").'</li>
							</ul>
						</div><!-- ss_features -->
						
						<div class="tb_h1 mini"> <h3>'. __("FREE ","acurax-social-media-widget").'&nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp <span style="color: #ffe400;">'.__("PREMIUM","acurax-social-media-widget").'</span></h3> </div><!-- tb_h1 -->
						<div class="ss_y_n_holder"> 
							<div class="ss_no"> </div><!-- ss_no -->
								<div class="ss_yes"> </div><!-- ss_yes -->
							<div class="ss_no ss_last_one"> </div><!-- ss_no -->
						</div><!-- ss_y_n_holder -->
						
						<div class="ss_y_n_holder"> 
							<div class="ss_yes"> </div><!-- ss_yes -->
								<div class="ss_yes"> </div><!-- ss_yes -->
							<div class="ss_yes ss_last_one"> </div><!-- ss_yes -->
						</div><!-- ss_y_n_holder -->						
						
					</div><!-- column_holder -->			

					<div class="ss_column_holder"> 
					
						<div class="tb_h1 mini"> <h3>'. __("Feature Group","acurax-social-media-widget").'</h3> </div><!-- tb_h1 -->
						<div class="ss_feature_group" style="padding-top: 106px;">'. __("Widget Support ","acurax-social-media-widget").'</div><!-- -->
						<div class="tb_h1 mini"> <h3>'. __("Features","acurax-social-media-widget").'</h3> </div><!-- tb_h1 -->
						<div class="ss_features"> 
							<ul>
								<li>'. __("Multiple Widgets","acurax-social-media-widget").'</li>
									<li>'. __("Separate Icon Style/Theme For Each","acurax-social-media-widget").'</li>
										<li>'. __("Separate Icon Size For Each","acurax-social-media-widget").'</li>
										<li>'. __("Set whether the icons to Link Profiles/SHARE","acurax-social-media-widget").'</li>
									<li><strong>'. __("Separate Mouse Over Multiple Animation for Each","acurax-social-media-widget").'</strong></li>
								<li class="ss_last_one">'. __("Separate Default Opacity for Each","acurax-social-media-widget").'</li>
							</ul>
						</div><!-- ss_features -->
						
						<div class="tb_h1 mini"> <h3>'. __("FREE ","acurax-social-media-widget").'&nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp <span style="color: #ffe400;">'. __("PREMIUM","acurax-social-media-widget").'</span></h3> </div><!-- tb_h1 -->
						<div class="ss_y_n_holder">
							<div class="ss_yes"> </div><!-- ss_yes -->
								<div class="ss_yes"> </div><!-- ss_yes -->
									<div class="ss_yes"> </div><!-- ss_yes -->
									<div class="ss_no"> </div><!-- ss_no -->
								<div class="ss_no"> </div><!-- ss_no -->
							<div class="ss_no ss_last_one"> </div><!-- ss_no -->
						</div><!-- ss_y_n_holder -->
						
						<div class="ss_y_n_holder"> 
							<div class="ss_yes"> </div><!-- ss_yes -->
								<div class="ss_yes"> </div><!-- ss_yes -->
									<div class="ss_yes"> </div><!-- ss_yes -->
									<div class="ss_yes"> </div><!-- ss_yes -->
								<div class="ss_yes"> </div><!-- ss_yes -->
							<div class="ss_yes ss_last_one"> </div><!-- ss_yes -->
						</div><!-- ss_y_n_holder -->						
						
					</div><!-- column_holder -->	

					<div class="ss_column_holder"> 
					
						<div class="tb_h1 mini"> <h3>'. __("Feature Group","acurax-social-media-widget").'</h3> </div><!-- tb_h1 -->
						<div class="ss_feature_group" style="padding-top: 106px;">'. __("Shortcode Support","acurax-social-media-widget").' </div><!-- -->
						<div class="tb_h1 mini"> <h3>'. __("Features","acurax-social-media-widget").'</h3> </div><!-- tb_h1 -->
						<div class="ss_features"> 
							<ul>
								<li>'. __("Multiple Instances","acurax-social-media-widget").'</li>
									<li>'. __("Separate Icon Style/Theme For Each","acurax-social-media-widget").'</li>
										<li><strong>'. __("Separate Icon Size For Each","acurax-social-media-widget").'</strong></li>
										<li>'. __("Set whether the icons to Link Profiles/SHARE","acurax-social-media-widget").'</li>
									<li>'. __("Separate Mouse Over Multiple Animation for Each","acurax-social-media-widget").'</li>
								<li class="ss_last_one">'. __("Separate Default Opacity for Each","acurax-social-media-widget").'</li>
							</ul>
						</div><!-- ss_features -->
						
						<div class="tb_h1 mini"> <h3>'. __("FREE ","acurax-social-media-widget").'&nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp <span style="color: #ffe400;">'. __("PREMIUM","acurax-social-media-widget").'</span></h3> </div><!-- tb_h1 -->
						<div class="ss_y_n_holder">
							<div class="ss_yes"> </div><!-- ss_yes -->
								<div class="ss_yes"> </div><!-- ss_yes -->
									<div class="ss_yes"> </div><!-- ss_yes -->
									<div class="ss_no"> </div><!-- ss_no -->
								<div class="ss_no"> </div><!-- ss_no -->
							<div class="ss_no ss_last_one"> </div><!-- ss_no -->
						</div><!-- ss_y_n_holder -->
						
						<div class="ss_y_n_holder"> 
							<div class="ss_yes"> </div><!-- ss_yes -->
								<div class="ss_yes"> </div><!-- ss_yes -->
									<div class="ss_yes"> </div><!-- ss_yes -->
									<div class="ss_yes"> </div><!-- ss_yes -->
								<div class="ss_yes"> </div><!-- ss_yes -->
							<div class="ss_yes ss_last_one"> </div><!-- ss_yes -->
						</div><!-- ss_y_n_holder -->						
						
					</div><!-- column_holder -->	

					<div class="ss_column_holder"> 
					
						<div class="tb_h1 mini"> <h3>'. __("Feature Group","acurax-social-media-widget").'</h3> </div><!-- tb_h1 -->
						<div class="ss_feature_group" style="padding-top: 126px;">'. __("PHP Code Support ","acurax-social-media-widget").'</div><!-- -->
						<div class="tb_h1 mini"> <h3>'. __("Features","acurax-social-media-widget").'</h3> </div><!-- tb_h1 -->
						<div class="ss_features"> 
							<ul>
								<li>'. __("Multiple Instances","acurax-social-media-widget").'</li>
									<li>'. __("Use Outside Loop","acurax-social-media-widget").'</li>
										<li>'. __("Separate Icon Style/Theme For Each","acurax-social-media-widget").'</li>
											<li>'. __("Separate Icon Size For Each","acurax-social-media-widget").'</li>
										<li><strong>'. __("Set whether the icons to Link Profiles/SHARE","acurax-social-media-widget").'</strong></li>
									<li>'. __("Separate Mouse Over Multiple Animation for Each","acurax-social-media-widget").'</li>
								<li class="ss_last_one">'. __("Separate Default Opacity for Each","acurax-social-media-widget").'</li>
							</ul>
						</div><!-- ss_features -->
						
						<div class="tb_h1 mini"> <h3>'. __("FREE ","acurax-social-media-widget").'&nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp <span style="color: #ffe400;">'. __("PREMIUM","acurax-social-media-widget").'</span></h3> </div><!-- tb_h1 -->
						<div class="ss_y_n_holder">
							<div class="ss_yes"> </div><!-- ss_yes -->
								<div class="ss_yes"> </div><!-- ss_yes -->
									<div class="ss_yes"> </div><!-- ss_yes -->
										<div class="ss_yes"> </div><!-- ss_yes -->
									<div class="ss_no"> </div><!-- ss_no -->
								<div class="ss_no"> </div><!-- ss_no -->
							<div class="ss_no ss_last_one"> </div><!-- ss_no -->
						</div><!-- ss_y_n_holder -->
						
						<div class="ss_y_n_holder"> 
							<div class="ss_yes"> </div><!-- ss_yes -->
								<div class="ss_yes"> </div><!-- ss_yes -->
									<div class="ss_yes"> </div><!-- ss_yes -->
										<div class="ss_yes"> </div><!-- ss_yes -->
									<div class="ss_yes"> </div><!-- ss_yes -->
								<div class="ss_yes"> </div><!-- ss_yes -->
							<div class="ss_yes ss_last_one"> </div><!-- ss_yes -->
						</div><!-- ss_y_n_holder -->						
						
					</div><!-- column_holder -->						
					
				
					
				</div><!-- ss_features_table -->		

			<div id="ad_smw_2_button_order" style="float: left; width: 100%;">
<a href="http://clients.acurax.com/order.php?pid=fsmi_power&utm_source=plugin_asmw_settings&utm_medium=banner&utm_campaign=plugin_yellow_order" target="_blank"><div id="ad_smw_2_button_order_link"></div></a></div> <!-- ad_smw_2_button_order --></div></div></div>';
$ad_2='<div id="ad_smw_2"> <a href="http://clients.acurax.com/order.php?pid=fsmi_power&utm_source=plugin_smw_settings&utm_medium=banner&utm_campaign=plugin_enjoy" target="_blank"><div id="ad_smw_2_button"></div></a> </div> <!-- ad_smw_2 --><br>
<div id="ad_smw_2_button_order">
<a href="http://clients.acurax.com/order.php?pid=fsmi_power&utm_source=plugin_smw_settings&utm_medium=banner&utm_campaign=plugin_yellow_order" target="_blank"><div id="ad_smw_2_button_order_link"></div></a></div> <!-- ad_smw_2_button_order --> ';
if($ad=="" || $ad == 2) { echo $ad_2; } else if ($ad == 1) { echo $ad_1; } else { echo $ad_2; } 
}
add_action('acx_smw_comparison_premium','socialicons_widget_comparison',1);
function acx_asmw_saveorder_callback()
{
	global $wpdb;
	if(!isset($_POST['acx_asmw_saveorder_es'])) die("<br><br>".__('Unknown Error Occurred, Try Again... ','acurax-social-media-widget')."<a href=''>".__('Click Here','acurax-social-media-widget')."</a>");
	if(!wp_verify_nonce($_POST['acx_asmw_saveorder_es'],'acx_asmw_saveorder_es')) die("<br><br>".__('Sorry, You have no permission to do this action...','acurax-social-media-widget')."<a href=''>".__('Click Here','acurax-social-media-widget')."</a>");
	$social_widget_icon_array_order = $_POST['recordsArray'];
	if (current_user_can('manage_options')) {
		$social_widget_icon_array_order = serialize($social_widget_icon_array_order);
		update_option('social_widget_icon_array_order', $social_widget_icon_array_order);
		echo "<div id='acurax_notice' align='center' style='width: 420px; font-family: arial; font-weight: normal; font-size: 22px;'>";
		echo __("Social Media Icon's Order Saved","acurax-social-media-widget");
		echo "</div><br>";
	}
	die(); // this is required to return a proper result
} add_action('wp_ajax_acx_asmw_saveorder', 'acx_asmw_saveorder_callback');


	$social_widget_icon_array_order = get_option('social_widget_icon_array_order'); 
	if(is_serialized($social_widget_icon_array_order)) 
		{ 
	$social_widget_icon_array_order = unserialize($social_widget_icon_array_order); 
	} 
	function acx_asmw_orderarray_refresh_array() 
		{ 
			global $social_widget_icon_array_order; 
			/* Starting The Logic Count and Re Configuring Order Array */    
			$total_arrays = ACX_SMW_TOTAL_STATIC_SERVICES; // Number Of Static Services ,<< Earlier its 10 
			if(is_serialized($social_widget_icon_array_order)) 
			{ 
				$social_widget_icon_array_order = unserialize($social_widget_icon_array_order); 
			} 
			if($social_widget_icon_array_order == "") 
			{ 
				$social_widget_icon_array_order = array(); 
			}    
			if (empty($social_widget_icon_array_order))  
			{ 
				for( $i = 0; $i < $total_arrays; $i++ ) 
				{ 
					array_push($social_widget_icon_array_order,$i); 
				} 	
				if(!is_serialized($social_widget_icon_array_order)) 
				{ 
				$social_widget_icon_array_order = serialize($social_widget_icon_array_order); 
				} 
				update_option('social_widget_icon_array_order', $social_widget_icon_array_order); 
			}
			else  
			{ 
			// Counting and Adding New Keys (UPGRADE PURPOSE) 
			$social_widget_icon_array_order = get_option('social_widget_icon_array_order'); 
			if(is_serialized($social_widget_icon_array_order)) 
			{ 
				$social_widget_icon_array_order = unserialize($social_widget_icon_array_order); 
			} 
			$social_icon_array_count = count($social_widget_icon_array_order);  
			if ($social_icon_array_count < $total_arrays)  
			{ 
				for( $i = $social_icon_array_count; $i < $total_arrays; $i++ ) 
				{ 
					array_push($social_widget_icon_array_order,$i); 
				} // for 
			}
			else 
			{ 
				$acx_temp_array = $social_widget_icon_array_order; 
				foreach ($social_widget_icon_array_order as $key => $value) 
				{ 
					if($social_widget_icon_array_order[$key]>=$total_arrays) 
					{ 
						unset($acx_temp_array[$key]); 
					} 
					} 
					$acx_temp_array = array_values($acx_temp_array); 
					$social_widget_icon_array_order = $acx_temp_array; 
				} 
				if(!is_serialized($social_widget_icon_array_order)) 
				{ 
					$social_widget_icon_array_order = serialize($social_widget_icon_array_order); 
				} 
				update_option('social_widget_icon_array_order', $social_widget_icon_array_order); 
			} // else closing of if array null 
				/* Ending The Logic Count and Re Configuring Order Array */  
		} 
		add_action('acx_asmw_orderarray_refresh','acx_asmw_orderarray_refresh_array');
// refresh 
function acx_smw_install_licence_refresh_callback()
{
	if (!isset($_POST['acx_smw_install_licence_refresh_w_c_n'])) die("<br><br>".__('Unknown Error Occurred, Try Again... ','acurax-social-media-widget')."<a href=''>".__('Click Here','acurax-social-media-widget')."</a>");
	if (!wp_verify_nonce($_POST['acx_smw_install_licence_refresh_w_c_n'],'acx_smw_install_licence_refresh_w_c_n')) die("<br><br>".__('Unknown Error Occurred, Try Again... ','acurax-social-media-widget')."<a href=''>".__('Click Here','acurax-social-media-widget')."</a>");
	$key = $licence = $id = "";
	$local_key = "";
	$response_stat = "failed";
	if(ISSET($_POST['key']))
	{
		$key = $_POST['key'];
	}
	if(ISSET($_POST['licence']))
	{
		$licence = $_POST['licence'];
	}
	$result = check_acx_pfsmi_license($licence,'',true,$id);
	if(ISSET($result["localkey"]))
	{
		$local_key = $result["localkey"];
	}
	$acx_smwp_licence_array = get_option('acx_fsmip_licence_array');
	if(is_serialized($acx_smwp_licence_array))
	{
		$acx_smwp_licence_array = unserialize($acx_smwp_licence_array);
	}
	if($acx_smwp_licence_array == "" || !is_array($acx_smwp_licence_array))
	{
		$acx_smwp_licence_array = array();
	}
	$acx_smw_purchased_li_array = get_option('acx_fsmi_purchased_li_array');
	if(is_serialized($acx_smw_purchased_li_array))
	{
		$acx_smw_purchased_li_array = unserialize($acx_smw_purchased_li_array);
	}
	if($acx_smw_purchased_li_array == "" || !is_array($acx_smw_purchased_li_array))
	{
		$acx_smw_purchased_li_array = array();
	}
	if(ISSET($result["status"]))
	{
		if($result["status"] == 'Active')
		{
			if(ISSET($acx_smwp_licence_array[$key]))
			{
				if(array_key_exists('local_key',$acx_smwp_licence_array[$key]))
				{
					$acx_smwp_licence_array[$key]['local_key'] = $local_key;
					
					if(!is_serialized($acx_smwp_licence_array))
					{
						$acx_smwp_licence_array = serialize($acx_smwp_licence_array);
					}
					update_option('acx_fsmip_licence_array',$acx_smwp_licence_array);
					
				}
			}
			
		} 
		$acx_smw_purchased_li_array[$licence]['status'] = $result['status'];
		if(!is_serialized($acx_smw_purchased_li_array))
		{
			$acx_smw_purchased_li_array = serialize($acx_smw_purchased_li_array);
		}
		update_option('acx_fsmi_purchased_li_array',$acx_smw_purchased_li_array); 
		$response_stat = "success";
	}
	echo $response_stat;
	die();
}
add_action("wp_ajax_acx_smw_install_licence_refresh","acx_smw_install_licence_refresh_callback");
function acx_smw_license_refresh_with_forcing($acx_license,$addon_key)
{
	$retry = true;
	$acx_smw_ip =  isset($_SERVER['SERVER_ADDR']) ? $_SERVER['SERVER_ADDR'] : $_SERVER['LOCAL_ADDR'];
	$acx_smw_domain = $_SERVER['SERVER_NAME'];
	$acx_smw_directory = dirname(__FILE__);
	$acx_smw_args = array(
		'action' 	=> 'acx-li-check-latest-version',
		'method'	=> 'addon_activation',
		'directory' => $acx_smw_directory,
		'unique_id' => $addon_key,
		'domain' 	=> $acx_smw_domain,
		'ip' 		=> $acx_smw_ip,
		'licence' 	=> $acx_license
	);
	$acx_smw_unique_id = "";
	$response_stat = "failed";
	$acx_smwp_licence_array = get_option('acx_fsmip_licence_array');
	if(is_serialized($acx_smwp_licence_array))
	{
		$acx_smwp_licence_array = unserialize($acx_smwp_licence_array);
	}
	if($acx_smwp_licence_array == "" || !is_array($acx_smwp_licence_array))
	{
		$acx_smwp_licence_array = array();
	}
			$acx_fsmip_retry_array = get_option('acx_fsmip_retry_array');
	if(is_serialized($acx_fsmip_retry_array))
	{
		$acx_fsmip_retry_array = unserialize($acx_fsmip_retry_array);
	}
	if($acx_fsmip_retry_array == "")
	{
		$acx_fsmip_retry_array = array();
	}
	if(!is_array($acx_fsmip_retry_array))
	{
		$acx_fsmip_retry_array = array();
	}
	if(ISSET($acx_fsmip_retry_array[$acx_license]['activation_licence_check']))
	{
		if($acx_fsmip_retry_array[$acx_license]['activation_licence_check'] >= 3)
		{
			$retry = false;	
		}
	}
	if($retry == true)
	{
		$response = acx_smw_licence_activation_api_request( $acx_fsmi_args );
		$response = json_decode($response, true);
	}
	
	if(!ISSET($response['response_status']) && !ISSET($response['status']))
	{
		if(ISSET($acx_fsmip_retry_array[$acx_license]['activation_licence_check']))
		{
			$acx_fsmip_retry_array[$acx_license]['activation_licence_check'] = $acx_fsmip_retry_array[$acx_license]['activation_licence_check'] + 1;
		}
		else{
			$acx_fsmip_retry_array[$acx_license]['activation_licence_check'] =  1;
		}
	}
	else
	{
		if($response['response_status'] == "success" &&  $response['status'] == "Active")
		{
			$acx_smw_purchased_li_array = get_option('acx_fsmi_purchased_li_array');
			if(is_serialized($acx_smw_purchased_li_array))
			{
				$acx_smw_purchased_li_array = unserialize($acx_smw_purchased_li_array);
			}
			if($acx_smw_purchased_li_array == "" || !is_array($acx_smw_purchased_li_array))
			{
				$acx_smw_purchased_li_array = array();
			}
			$acx_smw_unique_id = trim($response['unique_id']);
			$acx_smw_purchased_li_array[$acx_license] = array(
			'slug' => $response['slug'],
			'status' => $response['status'],
			'download_dynamic_url' => $response['download_dynamic_url']
			); 
			// update licence array
			
			$acx_smwp_licence_array[$acx_smw_unique_id]['addon_name'] = $response['name'];
			$acx_smwp_licence_array[$acx_smw_unique_id]['licence_code'] = $acx_license;
			if($response['localkey'] != "")
			{
				$acx_smwp_licence_array[$acx_smw_unique_id]['local_key'] = $response['localkey'];
			}
			if(!is_serialized($acx_smwp_licence_array))
			{
				$acx_smwp_licence_array = serialize($acx_smwp_licence_array);
			}
			update_option('acx_fsmip_licence_array',$acx_smwp_licence_array); 
			if(!is_serialized($acx_smw_purchased_li_array))
			{
				$acx_smw_purchased_li_array = serialize($acx_smw_purchased_li_array);
			}
			update_option('acx_fsmi_purchased_li_array',$acx_smw_purchased_li_array); 
			$acx_fsmip_retry_array[$acx_license]['activation_licence_check'] =  0;
			if(!is_serialized($acx_fsmip_retry_array))
			{
				$acx_fsmip_retry_array = serialize($acx_fsmip_retry_array);
			}
			update_option('acx_fsmip_retry_array',$acx_fsmip_retry_array);
			$response_stat = $response['response_status'];
		}
	}
	return $response_stat;
}
?>