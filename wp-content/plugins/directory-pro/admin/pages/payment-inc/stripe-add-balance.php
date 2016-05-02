<?php
				 global $wpdb;
				$userdata = array();
				$package_id=$form_data['package_id'];
				$message='';
				$userId=$current_user->ID;
				$user_id=$userId;
				$stripe_cost= $form_data['amount'];
				$currencyCode = (isset($stripe_currency)) ? $stripe_currency : 'USD';					
				$page_name_registration=get_option('_iv_directories_registration' ); 
				$stripe_currency =get_post_meta($newpost_id, 'iv_directories_stripe_api_currency',true);
				$recurringDescriptionFull= $stripe_cost.' '.$stripe_currency.' at '. get_bloginfo();			
				
				$post_name2='iv_directories_stripe_setting';
				$row = $wpdb->get_row("SELECT * FROM $wpdb->posts WHERE post_name = '".$post_name2."' ");
					if(sizeof($row )>0){
					  $stripe_id= $row->ID;
					}					
				$stripe_mode=get_post_meta( $stripe_id,'iv_directories_stripe_mode',true);	
				if($stripe_mode=='test'){
					$stripe_api =get_post_meta($stripe_id, 'iv_directories_stripe_secret_test',true);	
				}else{
					$stripe_api =get_post_meta($stripe_id, 'iv_directories_stripe_live_secret_key',true);	
				}
				require_once(wp_iv_directories_DIR . '/admin/files/lib/Stripe.php');	
				Stripe::setApiKey($stripe_api);	
					$response='';	
				try {
						
						$stripe_return =  Stripe_Charge::create(array("amount" => $stripe_cost * 100,
														"currency" => $stripe_currency,
														"card" => $form_data['stripeToken'],
														"description" => $recurringDescriptionFull));
						
						$response='success';																	
								
					  }
					  catch (Exception $e) {
								$response=$e ;//'Your card was declined';	
					  }
					  if($response == 'success') {	
							$balance=get_user_meta($userId,'balance',true);
							$balance=$balance+$form_data['amount'];
							update_user_meta($userId, 'balance', $balance);									
							// Add history****************
							$package_name='Bidding Deposit';
							$amount= $form_data['amount'];
							$my_post_form = array('post_title' => wp_strip_all_tags($package_name), 'post_name' => wp_strip_all_tags($package_name), 'post_content' => $amount, 'post_status' => 'publish', 'post_author' => $userId,);
							
							$newpost_id = wp_insert_post($my_post_form);					
							$post_type = 'iv_payment';
							$query = "UPDATE {$wpdb->prefix}posts SET post_type='" . $post_type . "' WHERE id='" . $newpost_id . "' LIMIT 1";
							$wpdb->query($query);
							update_post_meta( $newpost_id, 'amount', $amount );		
					
					
							$response='Balance Add Successfully. Current Balance: '.$balance;
							//require_once( wp_iv_directories_ABSPATH. 'inc/order-mail.php');
					  }	  
							

