<?php $blog_title = get_bloginfo(); 

global $wpdb;
// Create Basic Role
global $wp_roles;												
//$contributor_roles = $wp_roles->get_role('subscriber');							
$role_name_new= 'basic';
$wp_roles->remove_role( $role_name_new );						 

$role_display_name = 'Basic';						
//$wp_roles->add_role($role_name_new, $role_display_name, $contributor_roles->capabilities);
$wp_roles->add_role($role_name_new, $role_display_name, array(
    'read' => true, // True allows that capability, False specifically removes it.
    //'edit_posts' => true,
    //'delete_posts' => true,
    //'edit_published_posts' => true,
    //'publish_posts' => true,
    //'edit_files' => true,
    'upload_files' => true //last in array needs no comma!
));
	
require_once ('install-payment-option.php');
require_once ('install-profile-option.php');
require_once ('install-signup-email.php');
require_once ('install-order-email.php');
require_once ('install-reminder-email.php'); 

update_option('_iv_directory_url','directories');
update_option('_iv_new_badge_day','7');
update_option('_iv_radius','50');
update_option('_bid_start_amount','.01');
//************************************* Font End Page ****************

/// **** Create Page for Pricing Table******


	$page_title='Pricing Table';
	$page_name='price-table';
	$page_content='[iv_directories_price_table]';
	$my_post_form = array(
		'post_title'    => wp_strip_all_tags( $page_title),
		'post_name'    => wp_strip_all_tags( $page_name),
		'post_content'  => $page_content,
		'post_status'   => 'publish',
		'post_author'   =>  get_current_user_id(),	
		'post_type'		=> 'page',
		);
	$newpost_id= wp_insert_post( $my_post_form );	
	
	update_option('_iv_directories_price_table', $newpost_id); 		
	update_option('iv_directories_signup_redirect', $newpost_id);  
	
	// **** Create Account Form For Registration Page******
	
	$page_title='User Registration';
	$page_name='registration';
	$page_content='[iv_directories_form_wizard]';
	$post_iv = array(
		'post_title'    => wp_strip_all_tags( $page_title),
		'post_name'    => wp_strip_all_tags( $page_name),
		'post_content'  => $page_content,
		'post_status'   => 'publish',
		'post_author'   =>  get_current_user_id(),	
		'post_type'		=> 'page',
		);
	
	
		
	$newpost_id= wp_insert_post( $post_iv );
	//$post_type = 'iv_directories_acc';
	//$query = "UPDATE {$wpdb->prefix}posts SET post_type='".$post_type."' WHERE id='".$newpost_id."' LIMIT 1";
	//$wpdb->query($query);
	 update_option('_iv_directories_registration', $newpost_id); 	
	
	/// **** Create Page for User Profile******


	$page_title='My Account';
	$page_name='my-account';
	$page_content='[iv_directories_profile_template]';
	$my_post_form = array(
		'post_title'    => wp_strip_all_tags( $page_title),
		'post_name'    => wp_strip_all_tags( $page_name),
		'post_content'  => $page_content,
		'post_status'   => 'publish',
		'post_author'   =>  get_current_user_id(),	
		'post_type'		=> 'page',
		);
	$newpost_id= wp_insert_post( $my_post_form );	
	
	update_option('_iv_directories_profile_page', $newpost_id); 	
	
	/// **** Create Page for User public Profile****** c c c c c c c   c


	$page_title='Profile Public';
	$page_name='profile-public';
	$page_content='[iv_directories_profile_public]';
	$my_post_form = array(
		'post_title'    => wp_strip_all_tags( $page_title),
		'post_name'    => wp_strip_all_tags( $page_name),
		'post_content'  => $page_content,
		'post_status'   => 'publish',
		'post_author'   =>  get_current_user_id(),	
		'post_type'		=> 'page',
		);
	$newpost_id= wp_insert_post( $my_post_form );	
	
	update_option('_iv_directories_profile_public_page', $newpost_id);
	
	
	
	// Login Page *******************
	$page_title='Login';
	$page_name='login';
	$page_content='[iv_directories_login]';
	$my_post_form = array(
		'post_title'    => wp_strip_all_tags( $page_title),
		'post_name'    => wp_strip_all_tags( $page_name),
		'post_content'  => $page_content,
		'post_status'   => 'publish',
		'post_author'   =>  get_current_user_id(),	
		'post_type'		=> 'page',
		);
	$newpost_id= wp_insert_post( $my_post_form );	
	$reg_login_page= get_permalink( $newpost_id);
	update_option('_iv_directories_login_page', $newpost_id);
	
	/// **** Create Page for Thank you ****** 
	
	$reg_login_page= get_permalink(get_option('_iv_directories_login_page'));
	
	$page_title='Thank You';
	$page_name='thank-you';
	$page_content='<h3>Thank You For Your Signup & Payment. Please login <a href="'.$reg_login_page.'"> here </a>.</h3>';
	$my_post_form = array(
		'post_title'    => wp_strip_all_tags( $page_title),
		'post_name'    => wp_strip_all_tags( $page_name),
		'post_content'  => $page_content,
		'post_status'   => 'publish',
		'post_author'   =>  get_current_user_id(),	
		'post_type'		=> 'page',
		);
	$newpost_id= wp_insert_post( $my_post_form );	
	
	update_option('_iv_directories_thank_you_page', $newpost_id);
	
	/// **** Create Page for User Directory ******
	
	$reg_login_page= get_permalink(get_option('_iv_directories_login_page'));
	
	$page_title='User Directory';
	$page_name='user-directory';
	$page_content='[iv_directories_user_directory]';
	$my_post_form = array(
		'post_title'    => wp_strip_all_tags( $page_title),
		'post_name'    => wp_strip_all_tags( $page_name),
		'post_content'  => $page_content,
		'post_status'   => 'publish',
		'post_author'   =>  get_current_user_id(),	
		'post_type'		=> 'page',
		);
	$newpost_id= wp_insert_post( $my_post_form );	
	
	update_option('_iv_directories_user_dir_page', $newpost_id);
	
	
	
?>
