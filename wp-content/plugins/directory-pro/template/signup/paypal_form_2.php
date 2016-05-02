								 <?php
								 if($total_package>0){
								 ?>
										<div class="row form-group">
										<label for="text" class="col-md-4 col-xs-4 col-sm-4 control-label"><?php  _e('Package Name','ivdirectories');?></label>
										<div class="col-md-8  "> 																				
											<?php
											 $recurring_text=''; 
											 if( $package_name==""){													

												$sql="SELECT * FROM $wpdb->posts WHERE post_type = 'iv_directories_pack'  and post_status='draft' ";
												$membership_pack = $wpdb->get_results($sql);
												$total_package = count($membership_pack);
												
												
												if(sizeof($membership_pack)>0){
													$i=0;
													echo'<select name="package_sel" id ="package_sel" class=" form-control">';
													
													foreach ( $membership_pack as $row )
													{	
														
														echo '<option value="'. $row->ID.'" >'. $row->post_title.'</option>';
														if($i==0){$package_id=$row->ID;}
														$i++;
													}	
																		
													echo '</select>';	
													$package_id= $membership_pack[0]->ID;
													$recurring= get_post_meta($package_id, 'iv_directories_package_recurring', true);	
													if($recurring == 'on'){
														$package_amount=get_post_meta($package_id, 'iv_directories_package_recurring_cost_initial', true);
													}else{
														$package_amount=get_post_meta($package_id, 'iv_directories_package_cost',true);
													}	
													?>
									
													<?php
												}	
													
												
											 }else{
												 
												
												echo '<label class=""> '.$package_name.'</label>';
												$recurring= get_post_meta($package_id, 'iv_directories_package_recurring', true);
												if($recurring == 'on'){
														$package_amount=get_post_meta($package_id, 'iv_directories_package_recurring_cost_initial', true);
													}else{
														$package_amount=get_post_meta($package_id, 'iv_directories_package_cost',true);
												}
												
											}
											
											
											
											 ?>
											</div>
										
										</div>
							<div class="row form-group">
								<label for="text" class="col-md-4 col-xs-4 col-sm-4 control-label"><?php  _e('Amount','ivdirectories');?></label>
								
								
								<div class="col-md-8 col-xs-8 col-sm-8 " id="p_amount"> <label class="control-label"><?php echo $package_amount.' '.$api_currency ; ?> </label>
								</div>										
							</div>
							<?php
								
							 if( get_option('_iv_directories_payment_coupon')==""){
							?>
							<div class="row form-group" id="show_hide_div">
								<label for="text" class="col-md-4 col-xs-4 col-sm-4 control-label"></label>
								<div class="col-md-8 col-xs-8 col-sm-8 " > 
									<button type="button" onclick="show_coupon();"  class="btn btn-default center"><?php  _e('Have a coupon?','ivdirectories');?></button>
								</div>
							</div>
							<?php
								require_once(wp_iv_directories_template.'signup/coupon_form_2.php');
							
							}
							?>
							<?php
								require_once(wp_iv_directories_template.'signup/coupon_form_2.php');
							
						}
							?>
								
								
								<input type="hidden" name="reg_error" id="reg_error" value="yes">
								<input type="hidden" name="package_id" id="package_id" value="<?php echo $package_id; ?>">	
								
								<input type="hidden" name="return_page" id="return_page" value="<?php  the_permalink() ?>">
								<?php
									$iv_directories_payment_terms=get_option('iv_directories_payment_terms'); 
									$term_text='I have read & accept the <a href="#"> Terms & Conditions</a>';
									if( get_option( 'iv_directories_payment_terms_text' ) ) {
										$term_text= get_option('iv_directories_payment_terms_text'); 
									}
									if($iv_directories_payment_terms=='yes'){
									?>
							
								<div class="row">
									<div class="col-md-4 col-xs-4 col-sm-4 "> 
									</div>
											<div class="col-md-8 col-xs-8 col-sm-8 "> 
										<label>
										  <input type="checkbox" data-validation="required" 
		 data-validation-error-msg="You have to agree to our terms "  name="check_terms" id="check_terms"> <?php echo $term_text; ?>
										</label>
										
										      
									  </div>									
								</div>
																				
								<?php
								}	 
										 
								?>	
																	
						<div class="row">
							<div class="col-md-4 col-xs-4 col-sm-4 "> 
							</div>
							<div class="col-md-8 col-xs-8 col-sm-8 "> 
							
							<div id="paypal-button">
								<?php 
								 $p_amount=$package_amount;
								 $recurring=get_post_meta($package_id, 'iv_directories_package_recurring',true);
								 
								 if($package_amount=="0" or trim($package_amount)=="" ){
									 if($recurring=='on'){
											$p_amount=get_post_meta($package_id, 'iv_directories_package_recurring_cost_initial',true); 
										}
									 
								  }else{
									 $p_amount=$package_amount;
									}			
								 if($package_name!="" AND $p_amount=='0' ){ ?>
									<div id="loading-3" style="display: none;"><img src='<?php echo wp_iv_directories_URLPATH. 'admin/files/images/loader.gif'; ?>' /></div>
									<button  id="submit_iv_directories_payment" name="submit_iv_directories_payment"  type="submit" class="btn btn-info ctrl-btn"  > <?php  _e('Submit','ivdirectories');?></button>
									
								<?php
								}else{	
									?>
									<div id="loading-3" style="display: none;"><img src='<?php echo wp_iv_directories_URLPATH. 'admin/files/images/loader.gif'; ?>' /></div>
								<button  id="submit_iv_directories_payment" name="submit_iv_directories_payment" type="submit" class="btn btn-info ctrl-btn"  ><?php  _e('Submit','ivdirectories');?>  </button>
								
								<?php 
									}
								?>
								
							</div>	
							
							</div>										
						</div>		
						
						
	
