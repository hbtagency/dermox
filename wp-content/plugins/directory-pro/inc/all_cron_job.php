<?php

	global $wpdb, $post;
	 //Strat  Subscription remainder email ********************************
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
	
	  //End Subscription remainder email *************************
	  
	  // Start Hide Directory******************
	$sql="SELECT * FROM $wpdb->posts WHERE post_type ='directories'  and post_status='publish' ";									
	$all_post = $wpdb->get_results($sql);
	$total_post=count($all_post);									
	if(sizeof($total_post)>0){
		$i=0;
		foreach ( $all_post as $row )								
		{
			$dir_id=$row->ID;
			$post_author_id=$row->post_author;	
			
				$exp_date= get_user_meta($post_author_id, 'iv_directories_exprie_date', true);
				if($exp_date!=''){
					$package_id=get_user_meta($post_author_id,'iv_directories_package_id',true);
					$dir_hide= get_post_meta($package_id, 'iv_directories_package_hide_exp', true);
					if($dir_hide=='yes'){
						//echo 'exp_date...'.strtotime($exp_date) .' --Time..'. time();
						if(strtotime($exp_date) < time()){
								//die('<br/>Will Hide'); //expire
									$dir_post = array();
									$dir_post['ID'] = $dir_id;
									$dir_post['post_status'] = 'draft';								
									wp_update_post( $dir_post );
						}
						
					}
					
				}
			
		
		}
	}										

 // End  Hide Directory******************
	  
// Strat Bidding *************************

	$args = array(
		'post_status' => 'publish',
		'post_type' => 'directories',
		'meta_query' => array(
			 array(
				'key' => '_bump_status',
				'value' => 'open',				
			) 
		)
	);
	$query_bidding = new WP_Query($args);
	//var_dump($query_bidding);
	
	//die('--**--');
	
	 if ( $query_bidding->have_posts() ) : 	
		while ( $query_bidding->have_posts() ) : $query_bidding->the_post();
				$id = get_the_ID();
				$dir_id=$id;
				$newpost_id=$dir_id;
				$post_author_id=$post->post_author;
		
				
				
			$exp_date= get_user_meta($post_author_id, 'iv_directories_exprie_date', true);							
			$bump_exp_date= strtotime("+1 day", time());
						
		
			
			$current_bump_exp=date( strtotime(get_post_meta($dir_id,'_bump_exp_date',true)));
			$today=date( time());
			$amount = get_post_meta($dir_id,'_bump_amount',true);
			
			if ( $current_bump_exp<=$today){
				
						
					$balance=get_user_meta($post_author_id,'balance',true);
					$amount = get_post_meta($dir_id,'_bump_amount',true);
					
					
										
					if($balance<$amount){
						//echo json_encode(array("msg" => 'lowBalance'));
						update_post_meta($dir_id,'_bump_status', 'close');
					}else{
						
						$new_amount=$amount - get_post_meta($dir_id,'_bump_amount',true); 
						$bump_exp_date= strtotime("+1 day", time());
						$bump_exp_date=date("Y-m-d H:i:s",$bump_exp_date); 
						
						update_post_meta($dir_id,'_bump_exp_date',$bump_exp_date);
						update_post_meta($dir_id,'_bump_amount',$amount); 
						$current_date=date("Y-m-d H:i:s", time());
						update_post_meta($dir_id,'_bump_create_date',$current_date);
						update_post_meta($dir_id,'_bump_status', 'open');
						$total=get_post_meta($dir_id,'_bump_amount_total',true);
						update_post_meta($dir_id,'_bump_amount_total',$total+$amount);
						
					
						
						//**********						
						$balance=$balance - $new_amount;
						update_user_meta($post_author_id,'balance',$balance);
						
						// Add History ******
						$post_history='Bidding Cost';
						$history_content='Bidding Cost :'.$new_amount.' For Directory  : <a href="'.get_permalink( $dir_id ).'"> '.get_the_title( $dir_id ).'</a>';
						$my_post_form = array('post_title' => wp_strip_all_tags($post_history), 'post_name' => wp_strip_all_tags($post_history), 'post_content' => $history_content, 'post_status' => 'publish', 'post_author' => $post_author_id,);
						$newpost_id = wp_insert_post($my_post_form);
						
						$post_type = 'iv_payment';
						$query = "UPDATE {$wpdb->prefix}posts SET post_type='" . $post_type . "' WHERE id='" . $newpost_id . "' LIMIT 1";
						$wpdb->query($query);
						
						update_post_meta($newpost_id,'amount',$new_amount);
						
					}
			}
			
		endwhile; 		
    endif;	
    wp_reset_query();
	//wp_reset_postdata();

// End Bidding*******************

 
