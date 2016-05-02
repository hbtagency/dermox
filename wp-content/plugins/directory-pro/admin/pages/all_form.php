<?php
if(isset($_REQUEST['id']))  {
	require_once ('edit_form.php');
}
if(isset($_REQUEST['delete_id']))  {
	$post_id=$_REQUEST['delete_id'];
	wp_delete_post($post_id);
	delete_post_meta($post_id,true);
	$message="Form Deleted Successfully";
}
?>
<div class="bootstrap-wrapper">
	<div class="welcome-panel container-fluid">
		
		<?php
		if(!isset($_REQUEST['id']))  {
			?>
			
			<div class="row ">					
				<div class="col-md-12" id="submit-button-holder">					
					<div class="pull-right ">								
						
						<a class="btn btn-info "  href="<?php echo wp_iv_directories_ADMINPATH; ?>admin.php?page=wp-iv_directories-create">Create A New Form</a>
					</div>
				</div>
			</div>
			
			
			
			<div class="row">
				<div class="col-md-12 table-responsive">
					<h3  class="page-header">Forms List
						<small >
							<?php
							if (isset($_REQUEST['form_submit']) AND $_REQUEST['form_submit'] <> "") {
								echo  '<span style="color: #0000FF;"> [ The Form Create Successfully ]</span>';
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
								<th >Form Name</th>
								<th>Form Short Code</th>
								<th>PHP Code</th>
								<th >Action</th>
							</tr>
						</thead>
						<tbody>
							<?php
							global $wpdb, $post;
							$sql="SELECT * FROM $wpdb->posts WHERE post_type = 'iv_directories'";
							$products_rows = $wpdb->get_results($sql);
							if(sizeof($products_rows)>0){
								$i=0;
								foreach ( $products_rows as $row )
								{	
									echo'<tr>';
									echo '<td>'. $row->post_title.'</td>';
									echo '<td>[ form="'. $row->post_name.'"]</td>';
									
									
									echo "<td> ";
									?>
									<p>
										&lt;?php
										echo do_shortcode('[ form="<?php echo $row->post_name; ?>"]');
										?&gt;</p>
										
										
										<?php
										echo" </td> ";
										echo '<td>  <a class="btn btn-primary btn-xs" href="?page=wp-iv_directories-from-all&id='.$row->ID.'"> Edit</a> <a href="?page=wp-iv_directories-from-all&delete_id='.$row->ID.'" class="btn btn-danger btn-xs" onclick="return confirm(\'Are you sure to delete this form?\');">Delete</a></td>';
										echo'</tr>';
										$i++;
									}
								}
								?>
								
							</tbody>
						</table>
						
					</div>
					
				</div>
				<div class="row">					
					<div class="col-md-12">					
						<div class="">								
							
							<a class="btn btn-info "  href="<?php echo wp_iv_directories_ADMINPATH; ?>admin.php?page=wp-iv_directories-create">Create A New Form</a>
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
