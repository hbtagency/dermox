<?php
wp_enqueue_style('wp-iv_directories-style-11', wp_iv_directories_URLPATH . 'admin/files/css/iv-bootstrap.css');
?>
<div class="bootstrap-wrapper">
	<div class="welcome-panel container-fluid">
		
		<div class="row">
			<div class="col-md-12">
				
				<h3 class="page-header" ><?php  _e('User Setting','ivdirectories')	;?>  <small>  </small> </h3>
				
				
				
			</div>
		</div>
		
		
	<div class="form-group col-md-12 row">
			
			
		<?php
		global $wpdb,$wp_roles;
		$package ='';
		$currencyCode= get_option('_iv_directories_api_currency');
		if(isset($_REQUEST['package_sel'])){
			$package = $_REQUEST['package_sel'];
			
		}
		if($package==''){			
			if(isset($_REQUEST['package'])){
				$package=$_REQUEST['package'];
			}			
		}	
	
		
		$search_user='';
		if(isset($_POST['search_user'])){
			$search_user = $_POST['search_user'];
			//$package = $_POST['package_hidden'];
		}
		
		?>
	       <div class="row">
	        	<div class="main clearfix underline form-group col-md-12">
	        	    <form class=" dd col-md-6"   action="<?php echo the_permalink(); ?>" method="post"  >
	        	        <div class="row pull-left">
	        	        <input type="text" name="search_user" id="search_user" class="search" placeholder="Search by user name" value="<?php echo $search_user; ?>">
	        	        <button class="submit"><i class="fa fa-search"></i></button>
						<input type="hidden" name="package_hidden" id="package_hidden" value="<?php echo $package; ?>">
	        	    	</div>
	        	    </form>
        	 		<!--[if IE ]>
					<![endif]-->
        	 		 <form class=" dd col-md-6"   action="<?php echo the_permalink(); ?>" method="post"  >     
						<div class="row pull-right">	 		  
							   <!--
							   <select id="package_sel" name="package_sel" class="btn-infu form-group" >  
							<?php
							   $sql="SELECT * FROM $wpdb->posts WHERE post_type = 'iv_directories_pack'  and post_status='draft' ";
							$membership_pack = $wpdb->get_results($sql);
								echo'<option value="">All Package </option>';
									foreach ( $membership_pack as $row ){
										echo'<option value="'.$row->ID.'"  '.($package==$row->ID ? " selected" : " ") .' >'.$row->post_title.'</option>';	
											
									}

							  ?>
							  </select >
							  -->
									
							 <select id="package_sel" name="package_sel" class="btn-infu form-group" >  
								<?php		
											echo'<option value="">All Roles </option>';									
											foreach ( $wp_roles->roles as $key=>$value ){
												echo'<option value="'.$key.'"  '.($package==$key? " selected" : " ") .' >'.$key.'</option>';	
													
											}

									  ?>	
							</select>	
						</div>	  
        	 		</form>
					</div>
	        	 	
	        	</div>
					
								
				        <?php
				       
				     
						$no=20;	
						 $paged = (isset($_REQUEST['paged'])) ? $_REQUEST['paged'] : 1;
						
						if($paged==1){
						  $offset=0;  
						}else {
						   $offset= ($paged-1)*$no;
						}
				        $args = array();
				        $args['number']=$no;
				        $args['offset']=$offset;
				        $args['orderby']='registered';
				        $args['order']='DESC'; 
				        //$args['search']='12';				       
				        //$args['search_columns']=array( 'user_login', 'user_email' );
				        if($package!=''){	
							$role_package= $package; 	
							$args['role']=$role_package;
						}
						  if($search_user!=''){							
							$args['search']='*'.$search_user.'*';
						}										
						
				        $user_query = new WP_User_Query( $args );
						//echo'<pre>';
						//print_r($user_query);
						//echo'</pre>';
						?>	
						 <table class="table">						 
						  <thead>
							<tr>	
							  <th> <?php  _e('Create Date','ivdirectories')	;?> </th>						 
							  <th> <?php  _e('User Name','ivdirectories')	;?></th>
							  <th> <?php  _e('Email','ivdirectories')	;?> </th>
							  <th> <?php  _e('Expiry Date','ivdirectories')	;?> </th>
							  <th> <?php  _e('Payment Status','ivdirectories')	;?> </th>							  
							  <th> <?php  _e('Role','ivdirectories')	;?> </th>
							  <th> <?php  _e('Balance','ivdirectories')	;?> </th>
							  <th><?php  _e('Action','ivdirectories')	;?></th>
							</tr>
						  </thead>
						  <tbody>
							
							
						<?php	
				        // User Loop
				        if ( ! empty( $user_query->results ) ) {
				        	foreach ( $user_query->results as $user ) {								
								//print_r($user );
								?>
									<tr>
									  <td><?php echo date("d-M-Y h:m:s A" ,strtotime($user->user_registered) ); ?></td>							 
									  <td><?php echo $user->display_name; ?></td>
									  <td><?php echo $user->user_email; ?></td>
									  <td><?php
												
											$exp_date= get_user_meta($user->ID, 'iv_directories_exprie_date', true);
											if($exp_date!=''){
												echo date('d-M-Y',strtotime($exp_date));
											}	
											
											?></td>
									  <td>
									  <?php 
										echo get_user_meta($user->ID, 'iv_directories_payment_status', true);
										?>
										</td>	
									  
									  <td><?php
										if ( !empty( $user->roles ) && is_array( $user->roles ) ) {
											foreach ( $user->roles as $role )
												echo ucfirst($role);
										}
										?>
									  </td>
									  <td>
									   <?php  echo $currencyCode .(get_user_meta(get_current_user_id(),'balance',true)== "" ? '0': get_user_meta($user->ID,'balance',true));?>
									  </td>
									  <td>		<a class="btn btn-primary btn-xs" href="?page=wp-iv_directories-user_update&id=<?php echo $user->ID; ?>"> <?php  _e('Edit','ivdirectories')	;?></a> 
												<a class="btn btn-danger btn-xs" href="<?php echo admin_url().'/users.php'?>"><?php  _e('Delete','ivdirectories')	;?> </a>
									  </td>
									</tr>
													
						<?php  	
								
							}
						
						} else {
								 echo '<tr><td>No users found.</td></tr>';
						}

		?>
					  </tbody>
				</table>
				
				<div class="text-center">
				<?php
					$total_user = $user_query->total_users;  
					$total_pages=ceil($total_user/$no);						
					echo '<div id="iv-pagination" class="iv-pagination">';  
							
						echo paginate_links( array(
							'base'     => add_query_arg('paged','%#%?&package='.$package),
							'format'   => '',
							'prev_text' => __('&laquo; Previous'), // text for previous page
							'next_text' => __('Next &raquo;'), // text for next page
							'total' => $total_pages, // the total number of pages we have
							'current' => $paged, // the current page
							'end_size' => 1,
							'mid_size' => 5,	
						));	
						
										
					echo '</div></div>';  	
					?>
					</div>
				
									
			
			
		
	</div>
</div>
<script>
	jQuery(function() {
    jQuery('#package_sel').change(function() {
        this.form.submit();
    });
});
</script>


