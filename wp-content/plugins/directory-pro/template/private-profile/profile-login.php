<?php
wp_enqueue_style('wp-iv_directories-style-11', wp_iv_directories_URLPATH . 'admin/files/css/iv-bootstrap.css');
//wp_enqueue_script('iv_directories-script-12', wp_iv_directories_URLPATH . 'admin/files/js/bootstrap.min.js');

//wp_enqueue_media(); 
   //global $current_user;
?>
<script src="//ajax.googleapis.com/ajax/libs/jquery/1/jquery.min.js"></script> 
<link href='http://fonts.googleapis.com/css?family=Open+Sans:300italic,600italic,400,700' rel='stylesheet' type='text/css'>

<link href="//maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet">
 
<style>

#login-2 .form-control-solid {
background-color: #F1F3F8;
color: #A6B2BA;
border-radius: 0;
outline: 0;
font-size: 14px;
padding: 10px 15px;
line-height: 15px;
margin: 0;
box-shadow: none;
}
#login-2 .form-control-solid:focus{
  border: 1px solid #ddd;
  box-shadow: none;

}
#login-2 a{
  border:none !important;
  text-decoration: none;
}
#forget-password{
  display: none;
}
#login-2 .content {
background-color: #fff;
border: 1px solid #6c7a8d;
-webkit-border-radius: 0;
-moz-border-radius: 0;
-ms-border-radius: 0;
-o-border-radius: 0;
border-radius: 5px;
max-width: 400px;
margin: 40px auto 10px auto;
padding: 30px 22px 0;
padding-top: 10px;
overflow: hidden;
position: relative;
}
#login-2 h3 {
color: #4db3a5;
text-align: center;
font-size: 28px;
margin: 20px 0;
font-weight: 400 !important;
}
#login-2 .margin-b-30{
  margin-bottom: 30px;
}
#login-2 .uppercase{
  text-transform: uppercase;
  outline: 0;
  box-shadow: none;
  border-radius: 0;
  padding: 10px 25px;
}
#login-2 .social-icons {
  margin-left: 0;
  padding-top: 15px;
}
#login-2 .social-icons li {
  list-style: none;
  display: inline-block;
}
#login-2 .social-icon{
  padding:10px;
  border-radius: 50% !important;
  margin-top: 10px;
}
#login-2  .googleplus{
  background-color: #db4a37;
  color: #fff; 
  border: 1px solid #db4a37;
}
#login-2  .facebook{
  background-color: #4a6d9d;
  color: #fff; 
  border: 1px solid #4a6d9d;
}
#login-2  .twitter{
  background-color: #3bc1ed;
  color: #fff; 
  border: 1px solid #3bc1ed;
}
#login-2  .linkedin{
  background-color: #0b7bb5;
  color: #fff; 
  border: 1px solid #0b7bb5;
}
#login-2 button.close {
-webkit-appearance: none;
padding: 0;
cursor: pointer;
background: 0 0;
border: 0;
}
#login-2 .close {
display: inline-block;
margin-top: 0px;
margin-right: 0px;
width: 9px;
height: 9px;
background-repeat: no-repeat !important;
text-indent: -10000px;
outline: none;

}
#login-2 .close {
float: right;
font-size: 21px;
font-weight: 700;
line-height: 1;
color: #000;
text-shadow: 0 1px 0 #fff;
filter: alpha(opacity=20);
opacity: .2;
}
input:-webkit-autofill, textarea:-webkit-autofill, select:-webkit-autofill {
background-color: rgb(250, 255, 189);
background-image: none;
color: rgb(0, 0, 0);
}
.btn-success:hover, .btn-success:focus, .btn-success:active, .btn-success.active {
color: white;
background-color: #3b9c96;
border-color: #307f7a;
filter:none;
}
.btn-success{
color: white;
background-color: #44b6ae !important;
border: 1px solid #44b6ae !important;
filter:none;
}
/****
 CSS3 Spinner Bar
****/
.page-spinner-bar > div,
.block-spinner-bar > div {
  background: #da594a;
}

.login {
  background-color: #364150 !important;
}

.login .logo {
  margin: 0 auto;
  margin-top: 60px;
  padding: 15px;
  text-align: center;
}

.login .content {
  background-color: #eceef1;
  -webkit-border-radius: 7px;
  -moz-border-radius: 7px;
  -ms-border-radius: 7px;
  -o-border-radius: 7px;
  border-radius: 7px;
  max-width: 400px;
  margin: 40px auto 10px auto;
  padding: 30px;
  padding-top: 10px;
  overflow: hidden;
  position: relative;
}
.para{
  font-size: 12px
}
.login .content h3 {
  color: #4db3a5;
  text-align: center;
  font-size: 28px;
  font-weight: 400 !important;
}

.login .content h4 {
  color: #555;
}

.login .content .hint {
  color: #999;
  padding: 0;
  margin: 15px 0 7px 0;
}
#login-2 .login-form{
  margin-bottom: 0;
}
.login .content .login-form,
.login .content .forget-form {
  padding: 0px;
  margin: 0px;
}

.login .content .form-control {
  border: none;
  background-color: #dde3ec;
  height: 43px;
  color: #8290a3;
  border: 1px solid #dde3ec;
}
.login .content .form-control:focus, .login .content .form-control:active {
  border: 1px solid #c3ccda;
}
.login .content .form-control::-moz-placeholder {
  color: #8290a3;
  opacity: 1;
}
.login .content .form-control:-ms-input-placeholder {
  color: #8290a3;
}
.login .content .form-control::-webkit-input-placeholder {
  color: #8290a3;
}

.login .content select.form-control {
  padding-left: 9px;
  padding-right: 9px;
}

.login .content .forget-form {
  display: none;
}

.login .content .register-form {
  display: none;
}

.login .content .form-title {
  font-weight: 300;
  margin-bottom: 25px;
}

.login .content .form-actions {
  clear: both;
  border: 0px;
  border-bottom: 1px solid #eee;
  padding: 0px 30px 25px 30px;
  margin-left: -30px;
  margin-right: -30px;
}
div.selector, div.selector span, div.checker span, div.radio span, div.uploader, div.uploader span.action, div.button, div.button span
{
  background-image: url("./img/bg-white.png");
background-repeat: no-repeat;
-webkit-font-smoothing: antialiased;
}
}
.login-options {
  margin: 30px 0;
  overflow: hidden;
}
.login .content .check {
 color: #8290a3;
}
.login-options h4 {
  float: left;
  font-weight: 600;
  font-size: 15px;
  color: #7d91aa !important;
}

.login-options .social-icons {
  float: right;
  padding-top: 3px;
}

.login-options .social-icons li a {
  border-radius: 15px 15px 15px 15px !important;
  -moz-border-radius: 15px 15px 15px 15px !important;
  -webkit-border-radius: 15px 15px 15px 15px !important;
}

.login .content .form-actions .checkbox {
  margin-left: 0;
  padding-left: 0;
}

.login .content .forget-form .form-actions {
  border: 0;
  margin-bottom: 0;
  padding-bottom: 20px;
}

.login .content .register-form .form-actions {
  border: 0;
  margin-bottom: 0;
  padding-bottom: 0px;
}

.login .content .form-actions .btn {
  margin-top: 1px;
}

.login .content .form-actions .btn-success {
  font-weight: 600;
  padding: 10px 20px !important;
}

.login .content .form-actions .btn-default {
  font-weight: 600;
  padding: 10px 25px !important;
  color: #6c7a8d;
  background-color: #ffffff;
  border: none;
}

.login .content .form-actions .btn-default:hover {
  background-color: #fafaff;
  color: #45b6af;
}

.login .content .forget-password {
  font-size: 14px;
  float: right;
  display: inline-block;
  margin-top: 10px;
}

.login .content .check {
  color: #8290a3;
}

.login .content .rememberme {
  margin-left: 8px;
  margin-top: 10px;
}

.login .content .create-account {
  margin: 0 -40px -40px -40px;
  padding: 15px 0 17px 0;
  text-align: center;
  background-color: #6c7a8d;
  -webkit-border-radius: 0 0 7px 7px;
  -moz-border-radius: 0 0 7px 7px;
  -ms-border-radius: 0 0 7px 7px;
  -o-border-radius: 0 0 7px 7px;
  border-radius: 0 0 7px 7px;
}
#login-2 .content .create-account {
margin: 10px -40px 0;
padding: 10px 0 1px 0;
text-align: center;
background-color: #6c7a8d;
-webkit-border-radius: 0 0 7px 7px;
-moz-border-radius: 0 0 7px 7px;
-ms-border-radius: 0 0 7px 7px;
-o-border-radius: 0 0 7px 7px;
border-radius: 0 0 7px 7px;
}
#login-2 .content .create-account p a {
  font-weight: 600;
  font-size: 14px;
  color: #c3cedd;
}

#login-2 .create-account a {
  display: inline-block;
  margin-top: 5px;
}

/* footer copyright */
.login .copyright {
  text-align: center;
  margin: 0 auto 30px 0;
  padding: 10px;
  color: #7a8ca5;
  font-size: 13px;
}
/* Base for label styling */
[type="checkbox"]:not(:checked),
[type="checkbox"]:checked {
  position: absolute;
  left: -9999px;
}
[type="checkbox"]:not(:checked) + label,
[type="checkbox"]:checked + label {
  position: relative;
  padding-left: 25px;
  cursor: pointer;
}

/* checkbox aspect */
[type="checkbox"]:not(:checked) + label:before,
[type="checkbox"]:checked + label:before {
  content: '';
  position: absolute;
  left:0; top: 2px;
  width: 17px; height: 17px;
  border: 1px solid #aaa;
  background: #f8f8f8;
  border-radius: 3px;
  box-shadow: inset 0 1px 3px rgba(0,0,0,.3)
}
/* checked mark aspect */
[type="checkbox"]:not(:checked) + label:after,
[type="checkbox"]:checked + label:after {
  content: '✔';
  position: absolute;
  top: 0; left: 4px;
  font-size: 14px;
  color: #09ad7e;
  transition: all .2s;
}
/* checked mark aspect changes */
[type="checkbox"]:not(:checked) + label:after {
  opacity: 0;
  transform: scale(0);
}
[type="checkbox"]:checked + label:after {
  opacity: 1;
  transform: scale(1);
}
/* disabled checkbox */
[type="checkbox"]:disabled:not(:checked) + label:before,
[type="checkbox"]:disabled:checked + label:before {
  box-shadow: none;
  border-color: #bbb;
  background-color: #ddd;
}
[type="checkbox"]:disabled:checked + label:after {
  color: #999;
}
[type="checkbox"]:disabled + label {
  color: #aaa;
}
/* accessibility */
[type="checkbox"]:checked:focus + label:before,
[type="checkbox"]:not(:checked):focus + label:before {
  border: 1px dotted #ddd;
}

/* hover style just for information */
label:hover:before {
  border: 1px solid #ddd!important;
}


/* Useless styles, just for demo design */
.txtcenter {
  margin-top: 4em;
  font-size: .9em;
  text-align: center;
  color: #aaa;
}
.copy {
 margin-top: 2em; 
}
.copy a {
 text-decoration: none;
 color: #4778d9;
}
.margin-20{
  margin: 10px 0 !important;
}
@media (max-width: 967px) {
.para{
    font-size: 10px;
  }
  }
@media (max-width: 440px) {
  /***
  Login page
  ***/
  .login .logo {
    margin-top: 10px;
  }

  .login .content {
    width: 280px;
    margin-top: 10px;
  }
  .login .content h3 {
    font-size: 22px;
  }
  .forget-password {
    display: inline-block;
    margin-top: 20px;
  }
  .login-options .social-icons {
    float: left;
    padding-top: 3px;
  }
  .login .checkbox {
    font-size: 13px;
  }
}

</style>
  <div id="login-2" class="bootstrap-wrapper">
   <div class="menu-toggler sidebar-toggler">
   </div>
   <!-- END SIDEBAR TOGGLER BUTTON -->
   <!-- BEGIN LOGO -->
  
   <!-- END LOGO -->
   <!-- BEGIN LOGIN -->
   <div class="content">
    <!-- BEGIN LOGIN FORM -->
    <form id="login_form" class="login-form" action="" method="post">
      <h3 class="form-title"><?php  _e('Sign In','ivdirectories');?></h3>
      <div class="display-hide" id="error_message"> 
        
      </div>
      <div class="form-group">
        <!--ie8, ie9 does not support html5 placeholder, so we just show field title for that-->
        <label class="control-label visible-ie8 visible-ie9"><?php  _e('Username','ivdirectories');?></label>
        <input class="form-control form-control-solid placeholder-no-fix" type="text" autocomplete="off" placeholder="Username" name="username" id="username"/>
      </div>
      <div class="form-group">
        <label class="control-label visible-ie8 visible-ie9"><?php  _e('Password','ivdirectories');?></label>
        <input class="form-control form-control-solid placeholder-no-fix" type="password" autocomplete="off" placeholder="Password" name="password" id="password"/>
      </div>
      <div class="form-actions row">
      <div class="col-md-4">
        <button type="button" class="btn btn-success uppercase pull-left" onclick="return chack_login();" ><?php  _e('Login','ivdirectories');?></button>
      </div>
  <p class="pull-left  margin-20 para col-md-4">
    <input type="checkbox" id="test2" checked="checked" />
    <label for="test2"><?php  _e('Remember','ivdirectories');?> </label>
  </p>
        <p class="pull-left margin-20 para col-md-4">
        <a href="javascript:;" class="forgot-link"><?php  _e('Forgot Password?','ivdirectories');?> </a>
        </p>
      </div>
    <div class="create-account">
          <p><?php
			$iv_redirect = get_option( '_iv_directories_price_table');
			$reg_page= get_permalink( $iv_redirect); 
			?>
            <a  href="<?php echo $reg_page;?>" id="register-btn" class="uppercase"><?php  _e('Create an account','ivdirectories');?>  </a>
          </p>
        </div>
    
    </form>
    <!-- END LOGIN FORM -->
    <!-- BEGIN FORGOT PASSWORD FORM -->
    <form id="forget-password" name="forget-password" class="forget-form" action="" method="post" >
      <h3><?php  _e('Forget Password ?','ivdirectories');?>  </h3>
	  <div id="forget_message"> 
		<p>
        <?php  _e('Enter your e-mail address','ivdirectories');?>  
      </p>

      </div>
      <div class="form-group">
        <input class="form-control form-control-solid placeholder-no-fix" type="text"  placeholder="Email" name="forget_email" id="forget_email"/>
      </div>
      <div class="">
        <button type="button" id="back-btn" class="btn btn-default uppercase margin-b-30"><?php  _e('Back','ivdirectories');?> </button>
        <button type="button" onclick="return forget_pass();"  class="btn btn-success uppercase pull-right margin-b-30"><?php  _e('Submit','ivdirectories');?> </button>
      </div>
    </form>
    </div>
    </div>
    <script type="text/javascript">
		function  forget_pass(){
				
			var ajaxurl = '<?php echo admin_url('admin-ajax.php'); ?>';
			var loader_image = "<img src='<?php echo wp_iv_directories_URLPATH. 'admin/files/images/loader.gif'; ?>'/>";
				jQuery('#forget_message').html(loader_image);
				var search_params={
					"action"  : 	"iv_directories_forget_password",	
					"form_data":	jQuery("#forget-password").serialize(), 
				};
				var femail = jQuery('#forget_email').val();
				
				if( femail!="" ){
				jQuery.ajax({					
					url : ajaxurl,					 
					dataType : "json",
					type : "post",
					data : search_params,
					success : function(response){
						if(response.code=='success'){
							// redirect							
							jQuery('#forget_message').html('<div class="alert alert-success alert-dismissable"><a class="panel-close close" data-dismiss="alert">x</a>Password Sent. Please check your email. </div>' );
						}else{
							jQuery('#forget_message').html('<div class="alert alert-info alert-dismissable"><a class="panel-close close" data-dismiss="alert">x</a>'+response.msg+'</div>' );
						}
						
						
					}
				});
			}else{
				jQuery('#forget_message').html('<div class="alert alert-info alert-dismissable"><a class="panel-close close" data-dismiss="alert">x</a><?php  _e('Enter Email Address','ivdirectories');?></div>' );
			}	
	}
	function  chack_login(){
				
			var ajaxurl = '<?php echo admin_url('admin-ajax.php'); ?>';
			var loader_image = "<img src='<?php echo wp_iv_directories_URLPATH. 'admin/files/images/loader.gif'; ?>'/>";
				jQuery('#error_message').html(loader_image);
				var search_params={
					"action"  : 	"iv_directories_check_login",	
					"form_data":	jQuery("#login_form").serialize(), 
				};
				var username = jQuery('#username').val();
				var password = jQuery('#password').val();
				if( password!="" && username!=""){
				jQuery.ajax({					
					url : ajaxurl,					 
					dataType : "json",
					type : "post",
					data : search_params,
					success : function(response){
						if(response.code=='success'){
							// redirect							
							window.location.href = response.msg;
						}else{
							jQuery('#error_message').html('<div class="alert alert-info alert-dismissable"><a class="panel-close close" data-dismiss="alert">x</a><?php  _e('Invalid Username & Password','ivdirectories');?> </div>' );
						}
						
						
					}
				});
			}else{
				jQuery('#error_message').html('<div class="alert alert-info alert-dismissable"><a class="panel-close close" data-dismiss="alert">x</a><?php  _e('Enter Username & Password','ivdirectories');?> </div>' );
			}	
	}	
    (function($){
        $(document).ready(function(){
            $('.forgot-link').on('click',function(){
                $("#login_form").hide();
                $("#forget-password").show();
            });
             $('#back-btn').on('click',function(){
                $("#login_form").show();
                $("#forget-password").hide();
            });
        });
    }(jQuery));
    
	
	jQuery("#password").keypress(function(e) {
		if(e.which == 13) {
			chack_login();
		
		}
	});
    jQuery("#forget_email").keypress(function(e) {
		if(e.which == 13) { 
		forget_pass();
		
		}
	});
	jQuery(document).ready(function () {
		jQuery("#forget-password").submit(function(e){
			e.preventDefault();
		});
	});	
	
    </script>
