<?php
add_action('wp_ajax_send_contact', 'beau_Contact');
add_action('wp_ajax_nopriv_send_contact', 'beau_Contact');
function beau_valid_email($str)
{
	return ( ! preg_match("/^([a-z0-9\+_\-]+)(\.[a-z0-9\+_\-]+)*@([a-z0-9\-]+\.)+[a-z]{2,6}$/ix", $str)) ? FALSE : TRUE;
}
function beau_Contact(){
    if ( isset($_POST['email-contact']) )
    {
    	$_POST = array_map('trim', $_POST);
    	$contact_name = stripslashes($_POST['name-contact']);
    	$contact_email = stripslashes($_POST['email-contact']);
    	$contact_message = stripslashes($_POST['message']);
    	$regex_email = "/^([a-z0-9\+_\-]+)(\.[a-z0-9\+_\-]+)*@([a-z0-9\-]+\.)+[a-z]{2,6}$/ix";
    	if ( empty($contact_name) ) {
    		$halt[] = esc_html__('empty name', 'bebo');
    	}
    	if ( empty($contact_email) ) {
    		$halt[] = esc_html__('empty email', 'bebo');
    	}
    	elseif ( !beau_valid_email($contact_email) ) {
    		$halt[] = esc_html__('email is malformed', 'bebo');
    	}
    	if ( empty($contact_message) ) {
    		$halt[] = esc_html__('empty message', 'bebo');
    	}
    	if ( isset($halt) )
    	{
    		return esc_html__('Error: ','bebo').@implode(', ', $halt);
            exit();
    	}
    	else {
    		$messages = '
    		<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
    		"http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
    		<html xmlns="http://www.w3.org/1999/xhtml">
    		<head></head>
    		<body>
    		<table>
    			<tr><td colspan="3"><strong>'.esc_html__('You have a messages from website','bebo').'</strong> '.get_site_url().'</td></tr>
    			<tr><td valign="top"><b>'. esc_html__('Name', 'bebo') .'</b></td><td valign="top">:</td><td valign="top">' . $contact_name . ' </td></tr>
    			<tr><td valign="top"><b>'. esc_html__('Email', 'bebo') .'</b></td><td valign="top">:</td><td valign="top">' . $contact_email . '</td></tr>
    			<tr><td valign="top"><b>'. esc_html__('Message', 'bebo') .'</b></td><td valign="top">:</td><td valign="top">' . $contact_message . '</td></tr>
    		</table>
    		</body>
    		</html>';
    		$headers = "MIME-Version: 1.0" . "\r\n";
    		$headers .= "Content-type:text/html;charset=utf-8" . "\r\n";
    		$headers .= "From: " . stripslashes($contact_name) . " <" . $contact_email . ">" . "\r\n";
    		$headers .= "Sender-IP: " . $_SERVER["SERVER_ADDR"] . "\r\n";
    		$headers .= "Priority: normal" . "\r\n";
    		$headers .= "X-Mailer: PHP/" . phpversion();
    		$body = utf8_decode($messages);
    		$to = get_option('admin_email');
    		global $beau_option;
    		if (!empty($beau_option['admin-email'])) {
    			$to = $beau_option['admin-email'];
    		}
    		$subject = esc_html__('Contact email from', 'bebo') .': '. $contact_name;
    		$sendEmail = wp_mail( $to, $subject, $body, $headers);
    		if ($sendEmail){
    			return true;
                exit();
    		}else{
    			return esc_html__('Sending email error please try again','bebo');
                exit();
    		}
    	}
    }else{
    	return esc_html__('Nodata Post','bebo');
        exit();
    }
}
if (isset($_POST['email-contact'])) { echo beau_Contact(); exit();}