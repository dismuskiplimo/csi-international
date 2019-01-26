<?php
acx_smw_hook_function('acx_smw_misc_hook_option_above_ifpost');
if(ISSET($_POST['acx_smw_misc_hidden']))
{
	$acx_smw_misc_hidden = $_POST['acx_smw_misc_hidden'];
} 
else
{
	$acx_smw_misc_hidden = "";
}
if($acx_smw_misc_hidden == 'Y') 
{
	acx_smw_hook_function('acx_smw_misc_hook_option_onpost');
} else
{
	acx_smw_hook_function('acx_smw_misc_hook_option_postelse');
}
acx_smw_hook_function('acx_smw_misc_hook_option_after_else');
acx_smw_hook_function('acx_smw_misc_hook_option_form_head');
acx_smw_hook_function('acx_smw_misc_hook_option_fields');
acx_smw_hook_function('acx_smw_misc_hook_option_form_footer');
acx_smw_hook_function('acx_smw_misc_hook_option_sidebar');
?>