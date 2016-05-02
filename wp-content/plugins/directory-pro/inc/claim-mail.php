<?php
global $wpdb;	
		
	$email_body = get_option( 'iv_directories_contact_email');
	$contact_email_subject = get_option( 'iv_directories_contact_email_subject');			
					
		$admin_mail = get_option('admin_email');	
		if( get_option( 'admin_email_iv_directories' )==FALSE ) {
			$admin_mail = get_option('admin_email');						 
		}else{
			$admin_mail = get_option('admin_email_iv_directories');								
		}						
	$bcc_message='';
	 if( get_option( '_iv_directories_bcc_message' ) ) {
		  $bcc_message= get_option('_iv_directories_bcc_message'); 
	 }	
	$wp_title = get_bloginfo();
	$user_id=get_current_user_id();
	$user_info = get_userdata( $user_id);	
					
	parse_str($_POST['form_data'], $form_data);
	$dir_id=$form_data['dir_id'];	
	$dir_detail= get_post($dir_id); 
	$dir_title= '<a href="'.get_permalink($dir_id).'">'.$dir_detail->post_title.'</a>';		
	// Email for Admin		
	$client_email_address =$user_info->user_email;
	$client_email_address = $client_email_address .' | <b>User ID = '.$user_id.'</b>';	
	
	$email_body = str_replace("Your Directory", 'Claim Listing', $email_body);	
	$email_body = str_replace("New Message", 'Claim Listing', $email_body);	
	$email_body = str_replace("[iv_member_sender_email]", $client_email_address, $email_body);
	$email_body = str_replace("[iv_member_directory]", $dir_title, $email_body);
	$email_body = str_replace("[iv_member_message]", $form_data['message-content'], $email_body);
	
			
	$auto_subject=  $form_data['subject']; //$contact_email_subject; 	
	$headers = array("From: " . $wp_title . " <" . $admin_mail . ">", "Reply-To: ".$client_email_address  ,"Content-Type: text/html");	
		
	$h = implode("\r\n", $headers) . "\r\n";
	if(wp_mail($admin_mail, $auto_subject, $email_body, $h)){		
		
	}
	