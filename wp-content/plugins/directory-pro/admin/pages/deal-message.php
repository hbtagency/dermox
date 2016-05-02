<div class="form-group">
		<label  class="col-md-2   control-label"> Deal/ Coupon Message Subject : </label>
		<div class="col-md-4 ">
			
				<?php
				$iv_directories_deal_email_subject = get_option( 'iv_directories_deal_email_subject');
				?>
				
				<input type="text" class="form-control" id="deal_email_subject" name="deal_email_subject" value="<?php echo $iv_directories_deal_email_subject; ?>" placeholder="Enter subject">
		
	</div>
</div>
<div class="form-group">
		<label  class="col-md-2   control-label"> Deal/ Coupon Message Template : </label>
		<div class="col-md-10 ">
				<?php
					$settings_forget = array(															
						'textarea_rows' =>'20',	
						'editor_class'  => 'form-control',														 
						);
					$content_client = get_option( 'iv_directories_deal_email');
					$editor_id = 'iv_directories_deal_email';
															
					?>
			<textarea id="<?php echo $editor_id ;?>" name="<?php echo $editor_id ;?>" rows="20" class="col-md-12 ">
			<?php echo $content_client; ?>
			</textarea>				

	</div>
</div>
