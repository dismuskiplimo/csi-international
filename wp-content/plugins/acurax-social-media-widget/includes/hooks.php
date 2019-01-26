<?php
function acx_smw_hook_function($function_name)
{
	if($function_name!="")
	{
		if(function_exists($function_name))
		{
			$function_name();	
		}
	}
}
function acx_smw_hook_option_above_ifpost()
{
	do_action('acx_smw_hook_option_above_ifpost');
}
function acx_smw_hook_option_onpost()
{
	do_action('acx_smw_hook_option_onpost');
}
function acx_smw_hook_option_postelse()
{
	do_action('acx_smw_hook_option_postelse');
}
function acx_smw_hook_option_after_else()
{
	do_action('acx_smw_hook_option_after_else');
}
function acx_smw_hook_option_form_head()
{
	do_action('acx_smw_hook_option_form_head');
}
function acx_smw_hook_option_fields()
{
	do_action('acx_smw_hook_option_fields');
}
function acx_smw_hook_option_form_footer()
{
	do_action('acx_smw_hook_option_form_footer');
}
function acx_smw_hook_option_sidebar()
{
	do_action('acx_smw_hook_option_sidebar');
}
function acx_smw_hook_option_footer()
{
	do_action('acx_smw_hook_option_footer');
}
/* Misc Page */

function acx_smw_misc_hook_option_onpost()
{
	do_action('acx_smw_misc_hook_option_onpost');
}
function acx_smw_misc_hook_option_postelse()
{
	do_action('acx_smw_misc_hook_option_postelse');
}
function acx_smw_misc_hook_option_after_else()
{
	do_action('acx_smw_misc_hook_option_after_else');
}
function acx_smw_misc_hook_option_fields()
{
	do_action('acx_smw_misc_hook_option_fields');
}
function acx_smw_misc_hook_option_above_page_left()
{
	do_action('acx_smw_misc_hook_option_above_page_left');
}
function acx_smw_misc_hook_option_form_head()
{
	do_action('acx_smw_misc_hook_option_form_head');
}
function acx_smw_misc_hook_option_form_footer()
{
	do_action('acx_smw_misc_hook_option_form_footer');
}
function acx_smw_misc_hook_option_sidebar()
{
	do_action('acx_smw_misc_hook_option_sidebar');
}
function acx_smw_misc_hook_option_footer()
{
	do_action('acx_smw_misc_hook_option_footer');
}
/*    Premium */
function acx_smw_premium_hook_option_footer()
{
	do_action('acx_smw_premium_hook_option_footer');
}
/*    EXpert and Troubleshoot */
function acx_smw_exprt_hook_option_exprt_quick()
{
	do_action('acx_smw_exprt_hook_option_exprt_quick');
}
function acx_smw_exprt_hook_option_above_page_left()
{
	do_action('acx_smw_exprt_hook_option_above_page_left');
}
function acx_smw_exprt_hook_option_sidebar()
{
	do_action('acx_smw_exprt_hook_option_sidebar');
} 
function acx_smw_exprt_hook_option_form_head()
{
	do_action('acx_smw_exprt_hook_option_form_head');
}
/* Help Page */
function acx_smw_help_hook_option_form_head()
{
	do_action('acx_smw_help_hook_option_form_head');
}
function acx_smw_help_hook_option_above_page_left()
{
	do_action('acx_smw_help_hook_option_above_page_left');
}
function acx_smw_help_hook_option_sidebar()
{
	do_action('acx_smw_help_hook_option_sidebar');
} 
function acx_smw_help_hook_option_fields()
{
	do_action('acx_smw_help_hook_option_fields');
}
/* Addon Page */

function acx_smw_addon_hook_option_page_head()
{
	do_action('acx_smw_addon_hook_option_page_head');
}
function acx_smw_addon_hook_option_above_page_cvr()
{
	do_action('acx_smw_addon_hook_option_above_page_cvr');
}
function acx_smw_addon_hook_option_page()
{
	do_action('acx_smw_addon_hook_option_page');
}
function acx_smw_addon_hook_option_footer()
{
	do_action('acx_smw_addon_hook_option_footer');
}
function acx_smw_addon_hook_option_field_content()
{
	do_action('acx_smw_addon_hook_option_field_content');
}
?>