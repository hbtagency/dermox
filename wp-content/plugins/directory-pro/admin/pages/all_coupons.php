<?php

if(isset($_REQUEST['delete_id']))  { 
	$post_id=$_REQUEST['delete_id'];
	wp_delete_post($post_id);
	delete_post_meta($post_id,true);
	$message="Form Deleted Successfully";
}
?>
<style>
.bs-callout {
    margin: 20px 0;
    padding: 15px 30px 15px 15px;
    border-left: 5px solid #eee;
}
.bs-callout-info {
    background-color: #E4F1FE;
    border-color: #22A7F0;
}

</style>	
<div class="bootstrap-wrapper">
	<div class="welcome-panel container-fluid">
		
		<?php
		if(!isset($_REQUEST['id']))  {
			?>
			
			<div class="row ">					
				<div class="col-md-12" id="submit-button-holder">					
					<div class="pull-right ">								
						
						<a class="btn btn-info "  href="<?php echo wp_iv_directories_ADMINPATH; ?>admin.php?page=wp-iv_directories-coupon-create">Create A New Coupon</a>
					</div>
				</div>
			</div>
			
			
			
			<div class="row">
				<div class="col-md-12 table-responsive">
					<h3  class="page-header">Coupon List
						<small >
							<?php
							if (isset($_REQUEST['form_submit']) AND $_REQUEST['form_submit'] <> "") {
								echo  '<span style="color: #0000FF;"> [ The Coupon Create Successfully ]</span>';
							}
							if (isset($message) AND $message <> "") {
								echo  '<span style="color: #0000FF;"> [ '.$message.' ]</span>';
							}
							?>
						</small>
					</h3>
					<table class="table table-striped col-md-12">
						<thead >
							<tr>
								
								<th>Coupon Code/ Name</th>
								<th>Start Date</th>
								<th>End Date</th>
								<th>Uses Limit</th>
								<th>Amount </th>
								<th >Action</th>
							</tr>
						</thead>
						<tbody>
							<?php
							global $wpdb, $post;
							$sql="SELECT * FROM $wpdb->posts WHERE post_type = 'iv_coupon'";
							$products_rows = $wpdb->get_results($sql);
							if(sizeof($products_rows)>0){
								$i=0;
								foreach ( $products_rows as $row )
								{	
									echo'<tr>';
									echo '<td>'. $row->post_title.'</td>';
									echo '<td>'. get_post_meta($row->ID, 'iv_coupon_start_date', true).'</td>';
									echo '<td>'. get_post_meta($row->ID, 'iv_coupon_end_date', true).'</td>';
									echo '<td>'. get_post_meta($row->ID, 'iv_coupon_limit', true).' / '.get_post_meta($row->ID, 'iv_coupon_used', true).' </td>';
									
									echo '<td>'. get_post_meta($row->ID, 'iv_coupon_amount', true).'</td>';
									
									
									
										echo '<td>  <a class="btn btn-primary btn-xs" href="?page=wp-iv_directories-coupon-update&id='.$row->ID.'"> Edit</a> ';
										echo '  <a href="?page=wp-iv_directories-coupons-form&delete_id='.$row->ID.'" class="btn btn-danger btn-xs" onclick="return confirm(\'Are you sure to delete this form?\');">Delete</a></td>';
										
										
										echo'</tr>';
										
										$i++;
									}
								}
								?>
								
							</tbody>
						</table>
						
						<div class=" col-md-12  bs-callout bs-callout-info">		
					
								Note : Coupon will work on "One Time Payment" only. Coupon will not work on recurring payment.					
						</div>
. 
					</div>
					
				</div>
				<div class="row">					
					<div class="col-md-12">					
						<div class="">								
							
							<a class="btn btn-info "  href="<?php echo wp_iv_directories_ADMINPATH; ?>admin.php?page=wp-iv_directories-coupon-create">Create A New Coupon</a>
						</div>
					</div>
				</div>
				<div class="row">
					<br/>	
				</div>
				<?php
			} //End if(!isset($_REQUEST['id']))  {
				?>
				
			</div>
		</div>
