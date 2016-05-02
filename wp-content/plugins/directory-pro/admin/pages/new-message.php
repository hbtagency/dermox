<div class="form-group">
		<label  class="col-md-2   control-label"> BCC to Admin all Message : </label>
		<div class="col-md-4 ">
			
			<?php
			 $bcc_message='';
			 if( get_option( '_iv_directories_bcc_message' ) ) {
				  $bcc_message= get_option('_iv_directories_bcc_message'); 
			 }	 
			 //echo  $t_terms;
			?><label>
		  <input  class="" type="checkbox" name="bcc_message" id="bcc_message" value="yes" <?php echo ($bcc_message=='yes'? 'checked':'' ); ?> > 
				Yes, Admin will  get all message.
		
	</div>
</div>
<div class="form-group">
		<label  class="col-md-2   control-label"> New Message Subject : </label>
		<div class="col-md-4 ">
			
				<?php
				$iv_directories_contact_email_subject = get_option( 'iv_directories_contact_email_subject');
				?>
				
				<input type="text" class="form-control" id="contact_email_subject" name="contact_email_subject" value="<?php echo $iv_directories_contact_email_subject; ?>" placeholder="Enter subject">
		
	</div>
</div>
<div class="form-group">
		<label  class="col-md-2   control-label"> New Message Template : </label>
		<div class="col-md-10 ">
													<?php
					$settings_forget = array(															
						'textarea_rows' =>'20',	
						'editor_class'  => 'form-control',														 
						);
					$content_client = get_option( 'iv_directories_contact_email');
					$editor_id = 'message_email_template';
					//wp_editor( $content_client, $editor_id,$settings_forget );										
					?>
			<textarea id="<?php echo $editor_id ;?>" name="<?php echo $editor_id ;?>" rows="20" class="col-md-12 ">
			<?php echo $content_client; ?>
			</textarea>				

	</div>
</div>
