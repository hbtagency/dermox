<div class="form-group">
		<label  class="col-md-2   control-label"> Hide the Refund Link : </label>
		<div class="col-md-4 ">
			
			<?php
			 $refund_message_link='';
			 if( get_option( '_iv_directories_refund_message_link' ) ) {
				  $refund_message_link= get_option('_iv_directories_refund_message_link'); 
			 }	 
			 //echo  $t_terms;
			?><label>
		  <input  class="" type="checkbox" name="refund_message_link" id="refund_message_link" value="yes" <?php echo ($refund_message_link=='yes'? 'checked':'' ); ?> > 
				Yes, User will not see the link.
		
	</div>
</div>
<div class="form-group">
		<label  class="col-md-2   control-label"> Refund Message Subject : </label>
		<div class="col-md-4 ">
			
				<?php
				$iv_directories_refund_email_subject = get_option( 'iv_directories_refund_email_subject');
				?>
				
				<input type="text" class="form-control" id="refund_email_subject" name="refund_email_subject" value="<?php echo $iv_directories_refund_email_subject; ?>" placeholder="Enter subject">
		
	</div>
</div>
<div class="form-group">
		<label  class="col-md-2   control-label"> Refund Message Template : </label>
		<div class="col-md-10 ">
													<?php
					$settings_forget = array(															
						'textarea_rows' =>'20',	
						'editor_class'  => 'form-control',														 
						);
					$content_client = get_option( 'iv_directories_refund_email');
					$editor_id = 'iv_directories_refund_email';
					//wp_editor( $content_client, $editor_id,$settings_forget );										
					?>
			<textarea id="<?php echo $editor_id ;?>" name="<?php echo $editor_id ;?>" rows="20" class="col-md-12 ">
			<?php echo $content_client; ?>
			</textarea>				

	</div>
</div>
