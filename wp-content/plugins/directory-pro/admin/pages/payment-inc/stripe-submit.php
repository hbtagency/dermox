<?php

if( isset($_POST['iv-submit-stripe']) && $_POST['payment_gateway']=='stripe' && $_POST['iv-submit-stripe']=='register' ){	
			
				global $wpdb;
				require_once(wp_iv_directories_DIR . '/admin/files/lib/Stripe.php');
			
				$newpost_id='';
				$post_name='iv_directories_stripe_setting';
				$row = $wpdb->get_row("SELECT * FROM $wpdb->posts WHERE post_name = '".$post_name."' ");
							if(sizeof($row )>0){
							  $newpost_id= $row->ID;
							}
				$stripe_mode=get_post_meta( $newpost_id,'iv_directories_stripe_mode',true);	
				if($stripe_mode=='test'){
					$stripe_api =get_post_meta($newpost_id, 'iv_directories_stripe_secret_test',true);	
				}else{
					$stripe_api =get_post_meta($newpost_id, 'iv_directories_stripe_live_secret_key',true);	
				}
				$stripe_currency =get_post_meta($newpost_id, 'iv_directories_stripe_api_currency',true);	
				$stripe_currency =  (isset($stripe_currency)) ? $stripe_currency : 'USD';	 
				
				
				

				$package_id='';
				$dis_amount=0;
				$package_id=$_POST['package_id'];
				//create user here******	
									
					$userdata = array();
					$user_name='';
					if(isset($_POST['iv_member_user_name'])){
						$userdata['user_login']=$_POST['iv_member_user_name'];
					}					
					if(isset($_POST['iv_member_email'])){
						$userdata['user_email']=$_POST['iv_member_email'];
					}					
					if(isset($_POST['iv_member_password'])){
						$userdata['user_pass']=$_POST['iv_member_password'];
					}
					if(isset($_POST['iv_member_fname'])){
						$userdata['first_name']=$_POST['iv_member_fname'];
					}
					if(isset($_POST['iv_member_lname'])){
						$userdata['last_name']=$_POST['iv_member_lname'];
					}							
					
					if($userdata['user_login']!='' and $userdata['user_email']!='' and $userdata['user_pass']!='' ){
					
						$user_id = username_exists( $userdata['user_login'] );
						if ( !$user_id and email_exists($userdata['user_email']) == false ) {							
							
							 $user_id = wp_insert_user( $userdata ) ;
							 $user = new WP_User( $user_id );
							 $user->set_role('basic');
							 $userId=$user_id;
							 
							 $expire_interval = get_post_meta($package_id, 'iv_directories_package_initial_expire_interval', true);						
							 $initial_expire_type = get_post_meta($package_id, 'iv_directories_package_initial_expire_type', true);
							 if($expire_interval!='' AND $initial_expire_type!=''){
									$exp_periodNum = (60 * 60 * 24 * 90);
									
									switch ($initial_expire_type) {
										case 'year':
											$exp_periodNum = (60 * 60 * 24 * 365) * $expire_interval;
											break;
										case 'month':
											$exp_periodNum = (60 * 60 * 24 * 30) * $expire_interval;
											break;
										case 'week':
											$exp_periodNum = (60 * 60 * 24 * 7) * $expire_interval;
											break;
										case 'day':
											$exp_periodNum = (60 * 60 * 24) * $expire_interval;
											break;
									}
									$exp_time = time() + $exp_periodNum;
									$exp_d = date('Y-m-d',$exp_time).'T'.'00:00:00Z';
							 }else{
							 
								$exp_d=date('Y-m-d', strtotime('+19 year'));
							 } 							  
							 
							 							
							 update_user_meta($user_id, 'iv_directories_exprie_date',$exp_d); 
							 update_user_meta($user_id, 'iv_directories_package_id',$package_id);
						
							 
							 
							 require_once( wp_iv_directories_ABSPATH. 'inc/signup-mail.php');
							 
						} else {
							$iv_redirect = get_option( '_iv_directories_registration');
							if(trim($iv_redirect)!=''){
								$reg_page= get_permalink( $iv_redirect).'?&package_id='.$package_id.'&message-error=User_or_Email_Exists'; 
								wp_redirect( $reg_page );
								exit;
							}	
							
						}
					}
				if($userdata['user_login']=='' or $userdata['user_email']=='' or $userdata['user_pass']=='' ){
						$iv_redirect = get_option( '_iv_directories_registration');
							if(trim($iv_redirect)!=''){
								$reg_page= get_permalink( $iv_redirect).'?&package_id='.$package_id.'&message-error=exists'; 
								wp_redirect( $reg_page );
								exit;
							}	
				}	
			//create user End******
				
			$row2 = $wpdb->get_row("SELECT * FROM $wpdb->posts WHERE id = '".$package_id."' ");
			$package_name='';
			if(sizeof($row2 )>0){
				$package_name= $row2->post_title;
				$package_post_name= $row2->post_name;
			}
			
			$iv_directories_package_cost= get_post_meta( $package_id,'iv_directories_package_cost',true);
			$iv_directories_package_recurring= get_post_meta( $package_id,'iv_directories_package_recurring',true);
			
			$package_cost=$iv_directories_package_cost;
			
			// Cheek here Coupon ************			
			
			$recurringDescriptionFull= $package_cost.' '.$stripe_currency.' for '.$package_name .' at '. get_bloginfo();		
			
			$trial_enable= get_post_meta( $package_id,'iv_directories_package_enable_trial_period',true);
			if($iv_directories_package_recurring=='on'){
				$package_cost=get_post_meta($package_id, 'iv_directories_package_recurring_cost_initial', true);			
			}				
			if($package_cost >0){
			
					// CouponStart ******************************
					if($iv_directories_package_recurring!='on'){
						$coupon_code=$_POST['coupon_name'];
						$dis_amount=0;
						$package_amount=get_post_meta($package_id, 'iv_directories_package_cost',true);
							$post_count = $wpdb->get_row("SELECT * FROM $wpdb->posts WHERE post_title = '" . $coupon_code . "' and  post_type='iv_coupon'");	
							
							if(sizeof($post_count)>0){
								$coupon_name = $post_count->post_title;							 
								 $current_date=$today = date("m/d/Y");							 
								 
								 $start_date=get_post_meta($post_count->ID, 'iv_coupon_start_date', true);
								 $end_date=get_post_meta($post_count->ID, 'iv_coupon_end_date', true);
								 $coupon_used=get_post_meta($post_count->ID, 'iv_coupon_used', true);
								 $coupon_limit=get_post_meta($post_count->ID, 'iv_coupon_limit', true);
								 $dis_amount=get_post_meta($post_count->ID, 'iv_coupon_amount', true);							 
								 $package_ids =get_post_meta($post_count->ID, 'iv_coupon_pac_id', true);
								 
								 $all_pac_arr= explode(",",$package_ids);
								 
								 $today_time = strtotime($current_date);
								 $start_time = strtotime($start_date);
								 $expire_time = strtotime($end_date);							 
													
								 if(in_array('0', $all_pac_arr)){
									$pac_found=1;
									
								 }else{
									if(in_array($package_id, $all_pac_arr)){
										$pac_found=1;
									}else{
										$pac_found=0;
									}
									
								 }
								 $trial_enable = get_post_meta( $package_id,'iv_directories_package_enable_trial_period',true); 
								 if($today_time >= $start_time && $today_time<=$expire_time && $coupon_used<=$coupon_limit && $pac_found == '1' ){	
									$coupon_type= get_post_meta($post_count->ID, 'iv_coupon_type', true);
									update_post_meta($post_count->ID, 'iv_coupon_used', $coupon_used+1);
									if($coupon_type=='percentage'){
											$dis_amount= $dis_amount * $package_amount/100;										
									}
								}else{
									$dis_amount=0;
								}
							}else{
									$dis_amount=0;
							}
						}	//if($iv_directories_package_recurring!='on'){
					// Coupon End *****************************
			
					$currencyCode = (isset($stripe_currency)) ? $stripe_currency : 'USD';					
					$page_name_registration=get_option('_iv_directories_registration' ); 
					
					Stripe::setApiKey($stripe_api);
					
					if($iv_directories_package_recurring=='on'){
						
							$period= get_post_meta( $package_id,'iv_directories_package_recurring_cycle_type',true);

							$trial_enable= get_post_meta( $package_id,'iv_directories_package_enable_trial_period',true); 
							if( $trial_enable=='yes' ){
									$pay_text= $package_cost.' '.$stripe_currency.' for '.$package_name .' at '. get_bloginfo();
									$trial_amount=0;//get_post_meta($package_id, 'iv_directories_package_trial_amount', true);									
									if($trial_amount>0){
										$pay_text= $trial_amount.' '.$stripe_currency.' for '.$package_name .'  Trial at '. get_bloginfo();
										$stripe_return =  Stripe_Charge::create(array("amount" => $trial_amount * 100,
																	"currency" => $stripe_currency,
																	"card" => $_POST['stripeToken'],
																	"description" => $pay_text));
									}								
										
							}else{
								$package_cost_int=get_post_meta($package_id, 'iv_directories_package_recurring_cost_initial', true);								
									if($package_cost_int>0){
										$pay_text= $package_cost_int.' '.$stripe_currency.' for '.$package_name .' at '. get_bloginfo();
									}
							}
							try {
								
								$customer = Stripe_Customer::create(array(
										'card' 			=> $_POST['stripeToken'],
										'plan' 			=> $package_post_name,
										'email' 		=> $userdata['user_email'],
										'description' 	=> $pay_text
										
									)
								);
							 
							} catch (Exception $e) {
								//print_r($e);
							}
							
								update_user_meta($userId, 'iv_directories_payment_gateway','stripe'); 								
								if(isset($customer->id)){
									update_user_meta($userId, 'iv_directories_stripe_cust_id', $customer->id);
								}							
								if(isset($customer->subscriptions->data[0]->id)){
									update_user_meta($userId, 'iv_directories_stripe_subscrip_id', $customer->subscriptions->data[0]->id);
								}
								$cycle_count=get_post_meta( $package_id,'iv_directories_package_recurring_cycle_count',true);
								$period = get_post_meta( $package_id,'iv_directories_package_recurring_cycle_type',true);							
								$recurring_cycle_count=	get_post_meta($package_id,'iv_directories_package_recurring_cycle_count',true);
								if($recurring_cycle_count=="" || $recurring_cycle_count=="0"){
									$recurring_cycle_count='1';
								}								
								$trial_enable= get_post_meta( $package_id,'iv_directories_package_enable_trial_period',true);
								if( $trial_enable=='yes'  ){										
										$period = get_post_meta( $package_id,'iv_directories_package_recurring_trial_type',true);						
										$recurring_cycle_count=	get_post_meta( $package_id,'iv_directories_package_trial_period_interval',true);	
								}
								update_user_meta($userId, 'iv_paypal_recurring_profile_amt', get_post_meta($package_id, 'iv_directories_package_recurring_cost_initial', true));
								update_user_meta($userId, 'iv_paypal_recurring_profile_period',$period);	
								update_user_meta($userId, 'iv_paypal_recurring_cycle_count',$cycle_count);
								update_user_meta($userId, 'iv_directories_discount',$dis_amount);	
								update_user_meta($userId, 'iv_directories_package_id',$package_id);									
								
								
						
							$payment_status='';
							if(isset($customer->subscriptions->data[0]->status)){
								$payment_status=$customer->subscriptions->data[0]->status;
							}	
							
							if($payment_status=='active' or $payment_status=='trialing' ){
								
								$role_package= get_post_meta( $package_id,'iv_directories_package_user_role',true); 	
								$user = new WP_User( $userId );
								$user->set_role($role_package);
								
								$periodNum = (60 * 60 * 24 * 365);
								switch ($period) {
									case 'year':
										$periodNum = (60 * 60 * 24 * 365) * $recurring_cycle_count;
										break;
									case 'month':
										$periodNum = (60 * 60 * 24 * 30) * $recurring_cycle_count;
										break;
									case 'week':
										$periodNum = (60 * 60 * 24 * 7) * $recurring_cycle_count;
										break;
									case 'day':
										$periodNum = (60 * 60 * 24) * $recurring_cycle_count;
										break;
								}

								$timeToBegin = time() + $periodNum;
								$exprie = date('Y-m-d',$timeToBegin).'T'.'00:00:00Z';
								
								update_user_meta($userId, 'iv_directories_exprie_date',$exprie); 
								update_user_meta($userId, 'iv_directories_payment_status', 'success');
																
							 }else{							 							
								update_user_meta($userId, 'iv_directories_payment_status', 'pendding'); 
								
							 }	 								  
							require_once( wp_iv_directories_ABSPATH. 'inc/order-mail.php');			  
					
					 }else{ // Not recurring Start******************
								$response='';	
							try {
									$stripe_cost= $package_cost - $dis_amount;
									$stripe_return =  Stripe_Charge::create(array("amount" => $stripe_cost * 100,
																	"currency" => $stripe_currency,
																	"card" => $_POST['stripeToken'],
																	"description" => $recurringDescriptionFull));
									
									$response='success';																	
											
								  }
								  catch (Exception $e) {
											$iv_redirect = get_option( '_iv_directories_registration');
											if(trim($iv_redirect)!=''){
												$reg_page= get_permalink( $iv_redirect).'?&package_id='.$package_id.'&message-error=Your_card_was_declined'; 
												wp_redirect( $reg_page );
												exit;
											}	
								  }
								  if($response == 'success') {
										$role_package= get_post_meta( $package_id,'iv_directories_package_user_role',true); 	
										$user = new WP_User( $userId );
										$user->set_role($role_package);
															
										update_user_meta($userId, 'iv_directories_payment_status', 'success');									
										update_user_meta( $userId, 'iv_stripe_transaction_id', $stripe_return->id);
										update_user_meta($userId, 'iv_directories_payment_gateway','stripe'); 
										update_user_meta($userId, 'iv_directories_package_id',$package_id);
										
										require_once( wp_iv_directories_ABSPATH. 'inc/order-mail.php');
								  }	  
						
					} // Not recurring  End
				
					
					$iv_redirect = get_option( '_iv_directories_thank_you_page');
						if(trim($iv_redirect)!=''){
							$reg_page= get_permalink( $iv_redirect); 
							wp_redirect( $reg_page );
							exit;
						}
					
					
											
					
			 }else{ 
				 //$package_cost ==0 
				 //set Role For Free Package*******
					if(isset($userId)){
						    $user = new WP_User( $userId );
							 $role_package= get_post_meta( $package_id,'iv_directories_package_user_role',true); 
							 if($role_package==""){
								 $role_package='Basic';
							 }
							 $user->set_role($role_package);
							 update_user_meta($userId, 'iv_directories_package_id',$package_id);
				 
				// success Page
					$iv_redirect = get_option( '_iv_directories_thank_you_page');
						if(trim($iv_redirect)!=''){
							$reg_page= get_permalink( $iv_redirect); 
							wp_redirect( $reg_page );
							exit;
						}
				 }			
			
			}
									
			
		
			
		
	}
