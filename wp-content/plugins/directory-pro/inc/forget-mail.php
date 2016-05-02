<?php
global $wpdb;			
	$email_body = get_option( 'iv_directories_forget_email');
	$forget_email_subject = get_option( 'iv_directories_forget_email_subject');			
					
		$admin_mail = get_option('admin_email');	
		if( get_option( 'admin_email_iv_directories' )==FALSE ) {
			$admin_mail = get_option('admin_email');						 
		}else{
			$admin_mail = get_option('admin_email_iv_directories');								
		}						
		$wp_title = get_bloginfo();
	
	parse_str($_POST['form_data'], $data_a);
	
	$user_info = get_user_by( 'email',$data_a['forget_email'] );
	if(isset($user_info->ID) ){

		
        $random_password = wp_generate_password( 12, false );
					// Get user data by field and data, other field are ID, slug, slug and login
		
			
		$update_user = wp_update_user( array (
					'ID' => $user_info->ID, 
					'user_pass' => $random_password
				)
		);
        
		$email_body = str_replace("[user_name]", $user_info->display_name, $email_body);
		$email_body = str_replace("[iv_member_user_name]", $user_info->user_login, $email_body);	
		$email_body = str_replace("[iv_member_password]", $random_password, $email_body); 
				
		$cilent_email_address =$user_info->user_email; //trim(get_post_meta($post_id, 'iv_form_modal_client_email', true));
						
		
				
		$auto_subject=  $forget_email_subject; 
								
		$headers = array("From: " . $wp_title . " <" . $admin_mail . ">", "Content-Type: text/html");
		$h = implode("\r\n", $headers) . "\r\n";
		wp_mail($cilent_email_address, $auto_subject, $email_body, $h);
			
	}
					
			
	

