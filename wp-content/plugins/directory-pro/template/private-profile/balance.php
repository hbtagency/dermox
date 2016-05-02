<?php
global $wpdb;	
wp_enqueue_style('wp_iv_directory-style-0A2', wp_iv_directories_URLPATH . 'admin/files/css/jquery.dataTables.css');



?> 
<style>
	#user-data{
		display:none;
	}
</style>

<link rel="stylesheet" href="http://cdn.datatables.net/tabletools/2.2.2/css/dataTables.tableTools.css" />
<script type="text/javascript" src="//cdn.datatables.net/1.10.7/js/jquery.dataTables.min.js"></script>


 <div class="profile-content">
            
              <div class="portlet light">
                  <div class="portlet-title tabbable-line clearfix">
                    <div class="caption caption-md">
                      <span class="caption-subject"><?php _e( 'Balance : ', 'ivdirectories' ); echo  $currency_symbol .get_user_meta(get_current_user_id(),'balance',true);?></span>
                    </div>
					 <ul class="nav nav-tabs">                     
					  <li class="active">
                        <a href="#tab_balance" data-toggle="tab"><?php _e( 'Add Balance', 'ivdirectories' ); ?> </a>
                      </li>
					    
                      <li>
                        <a href="#tab_history" data-toggle="tab"><?php _e( 'History', 'ivdirectories' ); ?></a>
                      </li>
                   
                    </ul>
                  
                  </div>
                  
                  <div class="portlet-body">
                    <div class="tab-content">
                   
					<div class="tab-pane active" id="tab_balance">
						
					
							
						<?php
						
						$iv_gateway = get_option('iv_directories_payment_gateway');			
						if($iv_gateway=='paypal-express'){							
						?>
			<form class="form-group"  name="profile_add_balance_form" id="profile_add_balance_form" action="<?php  the_permalink() ?>?&payment_gateway=paypal&iv-submit-balance=addbalance" method="post">			
				
						<div class="row form-group">
								<label for="text" class="col-md-4 col-xs-4 col-sm-4 control-label"><?php _e( 'Enter Amount', 'ivdirectories' ); ?> </label>
								
								<div class="col-md-8 col-xs-8 col-sm-8 " id="p_amount"> 									
										<input type="text" class="form-control" id="amount" name="amount"  placeholder="<?php _e( 'Enter Amount', 'ivdirectories' ); ?>">									
								</div>										
						</div>	
                        
                       
								<div class="row form-group">
									<label for="text" class="col-md-4 col-xs-4 col-sm-4 control-label"></label>
									<div class="col-md-8 col-xs-8 col-sm-8 " > 	<div id="loading" style="display: none;"> 
										<img src="<?php echo wp_iv_directories_URLPATH. "admin/files/images/loader.gif"; ?>" />
									</div> 
																				
										<button class="btn green-haze" type="submit"> <?php _e( 'Submit', 'ivdirectories' ); ?></button>
										<input type="hidden" name="return_page" id="return_page" value="<?php  the_permalink() ?>">
									</div>
									
								</div>	
						</form> 
							<script>
							jQuery('#profile_add_balance_form').submit(function(e) {
								var amount =jQuery('#amount').val();
								
								if(amount>0){										
									jQuery('#loading').show();
									
								}else{
									alert('Please enter amount');
									e.preventDefault();
								}
								
								
							});
							
							</script>
						 <?php
						 }
																			
						if($iv_gateway=='stripe'){ ?>
							<form class="form"  name="profile_add_balance_form" id="profile_add_balance_form" action="" method="post">
						<?php	
							require_once(wp_iv_directories_template.'private-profile/iv_stripe_form_balance.php');
								$arb_status =	get_user_meta($current_user->ID, 'iv_directories_payment_status', true);
								$cust_id = get_user_meta($current_user->ID,'iv_directories_stripe_cust_id',true);
								$sub_id = get_user_meta($current_user->ID,'iv_directories_stripe_subscrip_id',true);	
							?>
							
							<input type="hidden" name="cust_id" value="<?php echo $cust_id; ?>">
							<input type="hidden" name="sub_id" value="<?php echo $sub_id; ?>">
							
						</form>
						<?php		
							}
							?>
						
					</div>
					<div class="tab-pane" id="tab_history">						
								<table id="user-data" class="display" cellspacing="0" width="100%">
									<thead>
										<tr>
											<th><?php _e('Date','wp_iv_membership'); ?></th>											
											<th><?php _e('Detail','wp_iv_membership'); ?></th>											
											<th><?php _e('Amount','wp_iv_membership'); ?></th>
										</tr>
									</thead>

									<tfoot>
										<tr>
											<th><?php _e('Date','wp_iv_membership'); ?></th>										
											<th><?php _e('Detail','wp_iv_membership'); ?></th>	
											<th><?php _e('Amount','wp_iv_membership'); ?></th>
										
										</tr>
									</tfoot>
								<?php
								
								$args = array (
									'post_type'              => 'iv_payment',
									'author'                 => $current_user->ID,
									'orderby'                => 'id',
									
								);
								
								$post_query = new WP_Query( $args );
								?>			

							

									<tbody>

										<?php	
												// User Loop
										
									if ( $post_query->have_posts() ) {
										while ( $post_query->have_posts() ) {
											$post_query->the_post();	
											//foreach ( $post_query->results as $iv_post ) {								
														
												?>
												<tr>
													<td><?php echo date("d-M-y h:m A" ,strtotime($post_query->post->post_date) ); ?></td>							 
													<td><?php echo get_the_title(); ?></td>
													
													<td><?php
														echo get_post_meta($post_query->post->ID,'amount' ,true);
														
														?>
													</td>


													</tr>

													<?php  	

												}
												
											} else {
												//echo '<tr><td>No Data found.</td></tr>';
											}

											?>



										</tr>

									</tbody>
								</table>
								
								
					</div>
                  </div>
                </div>
              </div>
            </div>
			
	<script>
						
			jQuery(window).on('load',function(){
				jQuery('#user-data').show();				
				var oTable = jQuery('#user-data').dataTable();
				oTable.fnSort( [ [1,'DESC'] ] );
			});
			
			
		</script>


 
          <!-- END PROFILE CONTENT -->
        
