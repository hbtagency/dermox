<?php
global $wpdb;	
		
	$email_body = get_option( 'iv_directories_deal_email');
	$contact_email_subject = get_option( 'iv_directories_deal_email_subject');			
		
	$wp_title = get_bloginfo();
	$user_id=get_current_user_id();
	$user_info = get_userdata( $user_id);	
				
	
	$dir_id=$_REQUEST['dir_id'];	
	$dir_detail= get_post($dir_id); 
	
	$admin_mail = get_the_author_meta('user_email',$dir_detail->post_author);
	

	$dir_title= '<a href="'.get_permalink($dir_id).'">'.$dir_detail->post_title.'</a>';		
	
		
	$client_email_address = $_REQUEST['client_email'];
		
	$iv_deal_title=get_post_meta($dir_id,'deal_title',true);
	$iv_deal_detail=get_post_meta($dir_id,'deal_detail',true);	
	$iv_deal_amount=get_post_meta($dir_id,'deal_amount',true);
	$currencyCode= get_option('_iv_directories_api_currency');
	$iv_member_deal_date =date('M-d-Y',time());
	
	$email_body = str_replace("[iv_member_user_email]", $client_email_address, $email_body);
	$email_body = str_replace("[iv_member_directory]", $dir_title, $email_body);
	$email_body = str_replace("[iv_member_deal_number]", time(), $email_body);
	$email_body = str_replace("[iv_deal_title]", $iv_deal_title, $email_body);
	$email_body = str_replace("[iv_deal_detail]", $iv_deal_detail, $email_body);
	$email_body = str_replace("[iv_member_deal_date]", $iv_member_deal_date, $email_body); 

	$email_body = str_replace("[iv_deal_amount]", $currencyCode.$iv_deal_amount, $email_body);
	
			
	$auto_subject= $contact_email_subject; 	
	$headers = array("From: " . $wp_title . " <" . $admin_mail . ">", "Reply-To: ".$client_email_address  ,"Content-Type: text/html");	
	
	// listing_owner************ 	
	$h = implode("\r\n", $headers) . "\r\n";
	if(wp_mail($admin_mail, $auto_subject, $email_body, $h)){		
		
	}
	// For Client**************
	$headers = array("From: " . $wp_title . " <" . $admin_mail . ">", "Reply-To: ".$admin_mail  ,"Content-Type: text/html");			
	$h = implode("\r\n", $headers) . "\r\n";
	wp_mail($client_email_address, $auto_subject, $email_body, $h);	

	
	