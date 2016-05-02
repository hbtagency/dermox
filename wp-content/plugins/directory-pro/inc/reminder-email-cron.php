<?php

	global $wpdb, $post;
	$sql="SELECT * FROM $wpdb->users ";
	$membership_users = $wpdb->get_results($sql);
	$total_package=count($membership_users);

	if(sizeof($membership_users)>0){
		$i=0;
		foreach ( $membership_users as $row )
		{	
			$user_id= $row->ID;
			$reminder_day = get_option( 'iv_directories_reminder_day');
			$exp_date= get_user_meta($user_id, 'iv_directories_exprie_date', true);
			
			$date2 = date("Y-m-d");
			$date1 = $exp_date;
			$diff = abs(strtotime($date2) - strtotime($date1));
			$days = floor($diff / (60*60*24));
			
			if( $reminder_day >= $days ){
					$exprie_send_email_date= get_user_meta($user_id, 'exprie_send_email_date', true);
					if(strtotime($exprie_send_email_date) != strtotime($exp_date) || $exprie_send_email_date=='' ){
						// Start Email Action
						
							$email_body = get_option( 'iv_directories_reminder_email');
							$signup_email_subject = get_option( 'iv_directories_reminder_email_subject');			
										
								$admin_mail = get_option('admin_email');	
								if( get_option( 'admin_email_iv_directories' )==FALSE ) {
									$admin_mail = get_option('admin_email');						 
								}else{
									$admin_mail = get_option('admin_email_iv_directories');								
								}						
								$wp_title = get_bloginfo();
							
							$user_info = get_userdata( $user_id);											
							$email_body = str_replace("[expire_date]", $exp_date, $email_body);	
							//echo'<br/>'.$email_body;			
							$cilent_email_address =$user_info->user_email;			
							$auto_subject=  $signup_email_subject; 
													
							$headers = array("From: " . $wp_title . " <" . $admin_mail . ">", "Content-Type: text/html");
							$h = implode("\r\n", $headers) . "\r\n";
							wp_mail($cilent_email_address, $auto_subject, $email_body, $h);
						// End Email Action
						
						 update_user_meta($user_id, 'exprie_send_email_date', $exp_date);
				}	
			}	
		}
	}		
?>
