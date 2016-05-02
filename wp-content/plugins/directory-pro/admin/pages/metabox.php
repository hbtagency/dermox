 <div class="bootstrap-wrapper">
 	<div class="welcome-panel container-fluid">
 		<?php	
		global $wpdb, $post;	
		
		// Save action   iv_directories_meta_save  
		//*************************	plugin file *********
			
 		 $iv_directories_approve= get_post_meta( $post->ID,'iv_directories_approve', true );
		 $iv_directories_current_author= $post->post_author;
		 
		 $current_user = wp_get_current_user();
		 $userId=$current_user->ID;
		 if(isset($current_user->roles[0]) and $current_user->roles[0]=='administrator'){
						
							 
 		?>
 		
 		<div class="row">
 			<div class="col-md-12">
				<?php _e( 'User ID :', 'iv_directories' )?>
 				<select class="form-control" id="iv_directories_author_id" name="iv_directories_author_id">
 					<?php	
 							
 					
 					$sql="SELECT * FROM $wpdb->users ";		
 					$products_rows = $wpdb->get_results($sql); 	
 					if(sizeof($products_rows)>0){									
 						foreach ( $products_rows as $row ) 
 						{	
 							echo '<option value="'.$row->ID.'"'. ($iv_directories_current_author == $row->ID ? "selected" : "").' >'. $row->ID.' | '.$row->user_email.' </option>';
 						}
 					}	
 					?>
 					
 				</select>
 			</div>  
 			<div class="col-md-12"> <label>
 				<input type="checkbox" name="iv_directories_approve" id="iv_directories_approve" value="yes" <?php echo ($iv_directories_approve=="yes" ? 'checked': "" )  ; ?> />  <strong><?php _e( 'Approve', 'iv_directories' )?></strong>
				</label>
 			</div> 
 			
 		</div>	  
 		<?php
			}
 		?>
 		<br/>
 	</div>
 </div>		
