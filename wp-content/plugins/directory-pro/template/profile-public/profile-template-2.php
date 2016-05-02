<?php
wp_enqueue_style('wp-iv_directories-piblic-11', wp_iv_directories_URLPATH . 'admin/files/css/iv-bootstrap.css');
wp_enqueue_script('iv_directories-piblic-12', wp_iv_directories_URLPATH . 'admin/files/js/bootstrap.min.js');

//wp_enqueue_media(); 
$display_name='';
$email='';
$user_id=1;
 if(isset($_REQUEST['id'])){	
	   $author_name= $_REQUEST['id'];
		$user = get_user_by( 'slug', $author_name );
	if(isset($user->ID)){
		$user_id=$user->ID;
		$display_name=$user->display_name;
		$email=$user->user_email;
	}
  }else{
	  global $current_user;
	  get_currentuserinfo();
	  $user_id=$current_user->ID;
	  $display_name=$current_user->display_name;
	  $email=$current_user->user_email;
	  if($user_id==0){
		$user_id=1;
	  }
  }	
  //print_r($current_user);
  $iv_profile_pic_url=get_user_meta($user_id, 'iv_profile_pic_thum',true);
   $iv_post = get_option( '_iv_directories_profile_post');
	if($iv_post!=''){
		$post_type=  $iv_post;											
	}else{
		$post_type=  'Post';
	}
?>
<script src="//ajax.googleapis.com/ajax/libs/jquery/1/jquery.min.js"></script> 
 <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="//maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet">
    
    <!-- Bootstrap -->
  
    <link href='http://fonts.googleapis.com/css?family=Roboto:100,300,400,600,700' rel='stylesheet' type='text/css'>
    <link href='http://fonts.googleapis.com/css?family=Oswald:400,700,300' rel='stylesheet' type='text/css'>
<style>
body{
   background: transparent;
   font-family: 'Open Sans', sans-serif;
 }
 label {
 font-weight: 400;
 font-size: 14px;
 }
 #profile-template-5  .form-control {
 font-size: 14px;
 font-weight: normal;
 color: #333333;
 background-color: #fff;
 border: 1px solid #e5e5e5;
 -webkit-box-shadow: none;
 box-shadow: none;
 border-radius:0 !important; 
 -webkit-transition: border-color ease-in-out .15s, box-shadow ease-in-out .15s;
 transition: border-color ease-in-out .15s, box-shadow ease-in-out .15s;
 }
 #profile-template-5  .wrapper{
  width: 98%
 }
  #profile-template-5 .entry-content a{
    border:0;
  }
 #profile-template-5 .active{
  background-color: #fff;
 }
 #profile-template-5profile-template-5 .btn.default {
 color: #333333;
 background-color: #e5e5e5;
 border:1px solid #e5e5e5;
 outline: 0;
 }
 #profile-template-5profile-template-5 label {
 font-weight: 400;
 font-size: 14px;
 }
 #profile-template-5profile-template-5 .default {
   color: #333333;
   background-color: #e5e5e5;
   border-color: "";
   }

 #profile-template-5 .green-haze.btn {
 color: white;
 background-color: #44b6ae;
 border-color:  #44b6ae;
 }
 #profile-template-5  .form-control:focus{
 border-color: #999999;
 outline: 0;
 -webkit-box-shadow: none;
 box-shadow: none;
 }
 #profile-template-5 .profile-usertitle-name {
 color: #5a7391;
 font-size: 20px;
 font-weight: 600;
 margin: 10px 0;
 }
 #profile-template-5 .nav  li a{
   padding: 10px;
 }
 #profile-template-5 .profile-sidebar {
   float: left;
   width: 100%;
   margin-right: 0;
   padding: 0 0 10px 0;
    border: 1px solid #59ABE3;
 }
 #profile-template-5 .icon-round{
   border: 1px solid #93a3b5;
   border-radius: 50%;
   padding: 4px;
   font-size: 8px !important;
 }
 #profile-template-5  .nav{
   margin-left: 0;
 }
  #profile-template-5  .nav li{
   margin-left: 0;
 }
 #profile-template-5  .nav li:hover .icon-round{
   border: 1px solid #5b9bd1;
 }

  #profile-template-5  .portlet-title  .nav li:hover{
   border-bottom: 5px solid #d9534f;
 }
  #profile-template-5 .portlet-title  .nav li.active{
   border-bottom: 5px solid #d9534f;
 }
  #profile-template-5 .portlet-title  .nav li a:focus{
   box-shadow: 0 0 0 0px #5b9dd9,0 0 0px 0px rgba(30,140,190,.0);
   -web-kit-box-shadow:  0 0 0 0px #5b9dd9,0 0 0px 0px rgba(30,140,190,.0);
 }
 #profile-template-5 .nav-tabs > li.active > a{
   border: 1px solid #fff; 

 }
 #profile-template-5 .profile-content {
   overflow: hidden;
   background: #fff;
   padding: 15px;
   border: 1px solid #59ABE3;
 }

 /* PROFILE SIDEBAR */
 #profile-template-5  .profile-sidebar-portlet {
   padding: 30px 0 0 0 !important;
 }

 #profile-template-5  .profile-userpic img {
   float: none;
   margin: 0 auto;
   width: 150px;
   height: 150px;
   -webkit-border-radius: 50% !important;
   -moz-border-radius: 50% !important;
   border-radius: 50% !important;
 }

 #profile-template-5  .profile-usertitle {
   text-align: center;
   margin-top: 20px;
 }

 #profile-template-5  .profile-usertitle-name {
   color: #5a7391;
   font-size: 20px;
   font-weight: 600;
   margin-bottom: 7px;
 }

 #profile-template-5  .profile-usertitle-job {
   text-transform: uppercase;
   color: #5b9bd1;
   font-size: 13px;
   font-weight: 800;
   margin-bottom: 7px;
 }
 .entry-content a{
  border-bottom: 0px solid #333 !important;
 }
 #profile-template-5 .profile-userbuttons {
   text-align: center;
   margin-top: 10px;
 }

 #profile-template-5  .profile-userbuttons .btn {
   margin-right: 5px;
 }
 #profile-template-5 .profile-userbuttons .btn:last-child {
   margin-right: 0;
 }
 #profile-template-5  .caption {
 float: left;
 display: inline-block;
 font-size: 18px;
 line-height: 18px;
 font-weight: 100%;
 padding: 10px 0;
 }
 #profile-template-5 .profile-userbuttons button {
   text-transform: uppercase;
   font-size: 11px;
   font-weight: 600;
   padding: 6px 15px;
 }

 #profile-template-5 .profile-usermenu {
   margin-top: 30px;
   padding-bottom: 20px;
 }

 #profile-template-5  .profile-usermenu ul li {
   border-bottom: 1px solid #f0f4f7;
 }

 #profile-template-5 .profile-usermenu ul li:last-child {
   border-bottom: none;
 }

 #profile-template-5  .profile-usermenu ul li a {
   color: #93a3b5;
   font-size: 16px;
   font-weight: 400;
 }

 #profile-template-5 .profile-usermenu ul li a {
   font-size: 16px;
 }

 #profile-template-5 .profile-usermenu ul li a:hover {
   background-color: #fafcfd;
   color: #5b9bd1;
 }

 .profile-usermenu ul li.active a {
   color: #5b9bd1 !important;
   background-color: #f6f9fb;
   border-left: 2px solid #5b9bd1;
   margin-left: -2px;
 }

 #profile-template-5 .profile-stat {
   padding-bottom: 20px;
   border-bottom: 1px solid #f0f4f7;
 }

 #profile-template-5  .profile-stat-title {
   color: #7f90a4;
   font-size: 25px;
   text-align: center;
 }
 #profile-template-5 .tabbable-line{
   border-bottom: 1px solid #ececec;
   margin-bottom: 30px;
 }
  #profile-template-5 .profile-stat-text {
   color: #5b9bd1;
   font-size: 11px;
   font-weight: 800;
   text-align: center;
 }
 .bm{margin-bottom: 40px}

 #profile-template-5 .profile-desc-title {
   color: #7f90a4;
   font-size: 17px;
   font-weight: 600;
 }
 #profile-template-5 .profile-desc-text {
   color: #7e8c9e;
   font-size: 14px;
 }
 #profile-template-5 .caption-subject{
   font-weight: 600;
   font-size: 15px !important;
   font-family: 'open-sans',sans-serif;
   text-transform: uppercase;
   color: #578ebe !important;
 }
 #profile-template-5 .profile-desc-link i {
   width: 22px;
   font-size: 19px;
   color: #abb6c4;
   margin-right: 5px;
 }
 #profile-template-5 .portlet{
   background: #fff;
   padding: 20px 30px 20px 20px;
   margin-bottom: 0;
 }
 
 #profile-template-5 .profile-desc-link a {
   font-size: 14px;
   font-weight: 600;
   color: #5b9bd1;
   word-wrap: break-word;
 }
 #profile-template-5 .margin-top-20{
   margin-top: 20px
 }
 #profile-template-5  h2 {
   font-weight: 700;
   font-family: 'open-sans',sans-serif;
   font-size: 16px;
   padding-bottom: 15px;
   display: block;
   color:#578ebe !important;
   }
   
.entry-content p{
   padding: 10px 15px 0 0 !important;
   font-weight: 400;
   font-family: 'open-sans',sans-serif;
   font-size: 14px;
   text-align: left;
   margin-bottom: 0;
   }
   #profile-template-5 .nav-tabs {
   border-bottom: 1px solid #ddd;
   }
  #profile-template-5 .post-list-header{
    color: #5a7391;
    margin-bottom: 0;
    display:inline-block;
    text-decoration: underline;
  }
  #profile-template-5 .post-onprofile-header{
   font-weight: 600;
   font-family: 'open-sans',sans-serif;
   font-size: 15px;
   text-align: left;
   margin: 0;
  }
  #profile-template-5 .nav-tabs {
   background: none;
   margin: 0;
   float: right;
   display: inline-block;
   border: 0;
   }

   #profile-template-5 .around-separetor{
   background-color: #eff3f8 !important;
   }

 /* RESPONSIVE MODE */
 @media (max-width: 767px) {
  
 #profile-template-5 .profile-sidebar {
     float: none;
     width: 100%;
     margin-right: 20px;
     padding: 0 0 15px 15px;
     text-align: center;
     border: 1px solid #59ABE3;
     }

 #profile-template-5  .profile-sidebar > .portlet {
     margin-bottom: 0;
   }

 #profile-template-5  .profile-content {
     overflow: visible;
   }
 }
 .view:hover .s2{
  -webkit-transform: translate3d(59px,0,0) rotate3d(0,1,0,-45deg);
  -moz-transform: translate3d(59px,0,0) rotate3d(0,1,0,-45deg);
  -o-transform: translate3d(59px,0,0) rotate3d(0,1,0,-45deg);
  -ms-transform: translate3d(59px,0,0) rotate3d(0,1,0,-45deg);
  transform: translate3d(59px,0,0) rotate3d(0,1,0,-45deg);
 }
 .view:hover .s3, 
 .view:hover .s5{
  -webkit-transform: translate3d(59px,0,0) rotate3d(0,1,0,90deg);
  -moz-transform: translate3d(59px,0,0) rotate3d(0,1,0,90deg);
  -o-transform: translate3d(59px,0,0) rotate3d(0,1,0,90deg);
  -ms-transform: translate3d(59px,0,0) rotate3d(0,1,0,90deg);
  transform: translate3d(59px,0,0) rotate3d(0,1,0,90deg);
 }
 .view:hover .s4{
  -webkit-transform: translate3d(59px,0,0) rotate3d(0,1,0,-90deg);
  -moz-transform: translate3d(59px,0,0) rotate3d(0,1,0,-90deg);
  -o-transform: translate3d(59px,0,0) rotate3d(0,1,0,-90deg);
  -ms-transform: translate3d(59px,0,0) rotate3d(0,1,0,-90deg);
  transform: translate3d(59px,0,0) rotate3d(0,1,0,-90deg);
 }

 .view .s1 > .overlay {
  background: -moz-linear-gradient(right, rgba(0,0,0,0.05) 0%, rgba(0,0,0,0) 100%);
  background: -webkit-linear-gradient(right, rgba(0,0,0,0.05) 0%,rgba(0,0,0,0) 100%);
  background: -o-linear-gradient(right, rgba(0,0,0,0.05) 0%,rgba(0,0,0,0) 100%);
  background: -ms-linear-gradient(right, rgba(0,0,0,0.05) 0%,rgba(0,0,0,0) 100%);
  background: linear-gradient(right, rgba(0,0,0,0.05) 0%,rgba(0,0,0,0) 100%);
 }

 .view .s2 > .overlay {
  background: -moz-linear-gradient(left, rgba(255,255,255,0) 0%, rgba(255, 255, 255, 0.2) 100%);
  background: -webkit-linear-gradient(left, rgba(255,255,255,0) 0%, rgba(255, 255, 255, 0.2) 100%);
  background: -o-linear-gradient(left, rgba(255,255,255,0) 0%, rgba(255, 255, 255, 0.2) 100%);
  background: -ms-linear-gradient(left, rgba(255,255,255,0) 0%, rgba(255, 255, 255, 0.2) 100%);
  background: linear-gradient(left, rgba(255,255,255,0) 0%, rgba(255, 255, 255, 0.2) 100%);
 }

 .view .s3 > .overlay {
  background: -moz-linear-gradient(right, rgba(0,0,0,0.8) 0%, rgba(0,0,0,0.2) 100%);
  background: -webkit-linear-gradient(right, rgba(0,0,0,0.8) 0%,rgba(0,0,0,0.2) 100%);
  background: -o-linear-gradient(right, rgba(0,0,0,0.8) 0%,rgba(0,0,0,0.2) 100%);
  background: -ms-linear-gradient(right, rgba(0,0,0,0.8) 0%,rgba(0,0,0,0.2) 100%);
  background: linear-gradient(right, rgba(0,0,0,0.8) 0%,rgba(0,0,0,0.2) 100%);
 }

 .view .s4 > .overlay {
  background: -moz-linear-gradient(left, rgba(0,0,0,0.8) 0%, rgba(0,0,0,0) 100%);
  background: -webkit-linear-gradient(left, rgba(0,0,0,0.8) 0%,rgba(0,0,0,0) 100%);
  background: -o-linear-gradient(left, rgba(0,0,0,0.8) 0%,rgba(0,0,0,0) 100%);
  background: -ms-linear-gradient(left, rgba(0,0,0,0.8) 0%,rgba(0,0,0,0) 100%);
  background: linear-gradient(left, rgba(0,0,0,0.8) 0%,rgba(0,0,0,0) 100%);
 }

 .view .s5 > .overlay {
  background: -moz-linear-gradient(left, rgba(0,0,0,0.3) 0%, rgba(0,0,0,0) 100%);
  background: -webkit-linear-gradient(left, rgba(0,0,0,0.3) 0%,rgba(0,0,0,0) 100%);
  background: -o-linear-gradient(left, rgba(0,0,0,0.3) 0%,rgba(0,0,0,0) 100%);
  background: -ms-linear-gradient(left, rgba(0,0,0,0.3) 0%,rgba(0,0,0,0) 100%);
  background: linear-gradient(left, rgba(0,0,0,0.3) 0%,rgba(0,0,0,0) 100%);
 }
 .view-tenth img {
    -webkit-transform: scaleY(1);
    -moz-transform: scaleY(1);
    -o-transform: scaleY(1);
    -ms-transform: scaleY(1);
    transform: scaleY(1);
    -webkit-transition: all 1s ease-in-out;
    -moz-transition: all 1s ease-in-out;
    -o-transition: all 1s ease-in-out;
    -ms-transition: all 1s ease-in-out;
    transition: all 1s ease-in-out;
 }
 .view-tenth .mask {
    background-color: rgba(174, 168, 211,0.3);
    -webkit-transition: all 0.5s linear;
    -moz-transition: all 0.5s linear;
    -o-transition: all 0.5s linear;
    -ms-transition: all 0.5s linear;
    transition: all 0.5s linear;
    -ms-filter: "progid: DXImageTransform.Microsoft.Alpha(Opacity=0)";
    filter: alpha(opacity=0);
    opacity: 0;
 }
  .home-img {
    width:100%; height:200px; overflow:hidden; text-align:center
 }
 .home-img img.wide {
     max-width: 100%;
     max-height: 100%;
     height: auto;
 }

 .home-img img.tall  {
     max-height: 100%;
     max-width: 100%;
     width: auto;
   }
 .view-tenth a.info {
    -ms-filter: "progid: DXImageTransform.Microsoft.Alpha(Opacity=0)";
    filter: alpha(opacity=0);
    opacity: 0;
    -webkit-transform: scale(0);
    -moz-transform: scale(0);
    -o-transform: scale(0);
    -ms-transform: scale(0);
    transform: scale(0);
    -webkit-transition: all 0.5s linear;
    -moz-transition: all 0.5s linear;
    -o-transition: all 0.5s linear;
    -ms-transition: all 0.5s linear;
    transition: all 0.5s linear;
 }
 .view-tenth:hover img {
    -webkit-transform: scale(10);
    -moz-transform: scale(10);
    -o-transform: scale(10);
    -ms-transform: scale(10);
    transform: scale(10);
    -ms-filter: "progid: DXImageTransform.Microsoft.Alpha(Opacity=0)";
    filter: alpha(opacity=0);
    opacity: 0;
 }
 .view-tenth:hover .mask {
    -ms-filter: "progid: DXImageTransform.Microsoft.Alpha(Opacity=100)";
    filter: alpha(opacity=100);
    opacity: 1;
 }
 .view-tenth:hover h2,.view-tenth:hover p,.view-tenth:hover a.info {
    -webkit-transform: scale(1);
    -moz-transform: scale(1);
    -o-transform: scale(1);
    -ms-transform: scale(1);
    transform: scale(1);
    -ms-filter: "progid: DXImageTransform.Microsoft.Alpha(Opacity=100)";
    filter: alpha(opacity=100);
    opacity: 1;
 }
 .view {
    width: 100%;
    max-height: 150px;
    margin: 0 0 10px 0;
    float: left;
    border: 1px solid #59ABE3;
    overflow: hidden;
    position: relative;
    text-align: center;
    -webkit-box-shadow: 1px 1px 2px #e6e6e6;
    -moz-box-shadow: 1px 1px 2px #e6e6e6;
    box-shadow: 1px 1px 2px #e6e6e6;
    cursor: default;
    background: #fff url() no-repeat center center;
 }
 .view .mask,.view .content {
    width: 100%;
    height:100%;
    position: absolute;
    top: 0;
    left: 0;
 }
 #profile-template-5 .view img {
    display: block;
    position: relative;
    margin: 0;
 }
  #profile-template-5 .date{
    font-size: 14px;
    font-weight: 100;
    font-family: 'open-sans',sans-serif;
    text-align: left;
    color: #bbb;
  }
 #profile-template-5 .view h4 {
    text-transform: uppercase;
    color: #59ABE3;
    text-align: center;
    position: relative;
    font-size: 10px;
    padding: 10px;
    background: rgba(27, 163, 156);
    margin: 0 !important;
 }
 .view p {
    font-family: Georgia, serif;
    font-style: italic;
    font-size: 45px;
    position: relative;
    color: #fff;
    padding: 25px;
    text-align: center;
 }
 .view a.info {
    display: inline-block;
    text-decoration: none;
    padding: 7px 14px;
    background: #000;
    color: #fff;
    text-transform: uppercase;
    -webkit-box-shadow: 0 0 1px #000;
    -moz-box-shadow: 0 0 1px #000;
    box-shadow: 0 0 1px #000;
 }
 .view a.info: hover {
    -webkit-box-shadow: 0 0 5px #000;
    -moz-box-shadow: 0 0 5px #000;
    box-shadow: 0 0 5px #000;
 }
 .border-blue{
 border: 1px solid #59ABE3;
 background: #fff;
 }
.padding-0{
  padding: 0 !important;
}
.padding-left-10{
 padding-left: 10px;
 margin: 0 auto;
}
.profile-usertitle-nameI{
font-weight: 600;
font-size: 15px !important;
font-family: 'open-sans',sans-serif;
text-transform: uppercase;
color: #578ebe !important;
padding-bottom: 10px;
border-bottom: 1px solid #EEE;
margin: 10px 0 35px;
}
 #profile-template-5 ul.iv-pagination {
 display: inline-block;
 padding-left: 0;
 margin: 20px 0;
 border-radius: 4px;
 list-style: none;
 }
#profile-template-5 .list-pagi{
  border: 1px solid #59ABE3;
  float: left;
  margin-left: .5em;
  padding: 0;
  list-style: none;
}
#profile-template-5 .list-pagi a{
  color: #59ABE3;
  padding: 1px 10px;
}
#profile-template-5 .list-pagi:hover{
  border: 1px solid #555;
}
#profile-template-5 .list-pagi:hover a{
  color: #555;
  text-decoration: none;
}
#profile-template-5 .active-li{
  border: 1px solid #59ABE3;
  background:#59ABE3 
}
#profile-template-5 .active-li a{
  color: #fff;
}
</style>


 <div id="profile-template-5" class="bootstrap-wrapper around-separetor">
    <div class="wrapper">
      <div class="row margin-top-10">
        <div class="col-md-4 col-sm-4">
          <div class="profile-sidebar">
            <div class="portlet light profile-sidebar-portlet">
              <!-- SIDEBAR USERPIC -->
              <div class="profile-userpic text-center"> 
                  <?php			  	
				  	if($iv_profile_pic_url!=''){ ?>
					 <img src="<?php echo $iv_profile_pic_url; ?>">
					<?php
					}else{
					 echo'	 <img src="'. wp_iv_directories_URLPATH.'assets/images/Blank-Profile.jpg" class="agent">';
					}
				  	?>  
                      </div>
              <!-- END SIDEBAR USERPIC -->
              <!-- SIDEBAR USER TITLE -->
              <div class="profile-usertitle">
                <div class="profile-usertitle-name">
                   <?php 
				   $name_display=get_user_meta($user_id,'first_name',true).' '.get_user_meta($user_id,'last_name',true);
				   echo (trim($name_display)!=""? $name_display : $display_name );?>
                   
                </div>
                <div class="profile-usertitle-job">
                    <?php echo get_user_meta($user_id,'occupation',true); ?>
                </div>
              </div>
             
            </div>
            <!-- END PORTLET MAIN -->
            <!-- PORTLET MAIN -->
            <div class="portlet portlet0 light">
              <!-- STAT -->
              
              <!-- END STAT -->
              <div>
                <h4 class="profile-desc-title"><?php _e('About','ivdirectories'); ?>     <?php 
				   $name_display=get_user_meta($user_id,'first_name',true).' '.get_user_meta($user_id,'last_name',true);
				   echo (trim($name_display)!=""? $name_display : $display_name );?>
</h4>
                <span class="profile-desc-text"> <?php echo get_user_meta($user_id,'description',true); ?> </span>         
					<?php
					if( get_user_meta($user_id,'hide_phone',true)==''){ ?>
						 <div class="margin-top-20 profile-desc-text">		                   
		                    <i class="fa fa-phone"></i>
					<?php echo 'Phone # :'. get_user_meta($user_id,'phone',true); ?>
						 </div>
					<?php
					}
					if( get_user_meta($user_id,'hide_mobile',true)==''){ ?>
						 <div class="margin-top-20 profile-desc-text">		                   
		                    <i class="fa fa-mobile"></i>
					<?php echo 'Mobile # :'. get_user_meta($user_id,'mobile',true); ?>
						 </div>
					<?php
					}
					
					if( get_user_meta($user_id,'hide_email',true)==''){ ?>
						 <div class="margin-top-20 profile-desc-link"
						 ><a href="mailto:<?php echo $email; ?>">		                   
		                    <i class="fa fa-envelope"></i>
							<?php echo $email; ?>
							</a>
						 </div>
					<?php
					}
            ?>
							<div class="margin-top-20 profile-desc-link"><a href="http://<?php  echo get_user_meta($user_id,'web_site',true); ?>">		                   
							<i class="fa fa-globe"></i>
							<?php  echo get_user_meta($user_id,'web_site',true);  ?>
							</a>
						 </div>
                <div class="margin-top-20 profile-desc-link">
                  <i class="fa fa-twitter"></i>
                  <a href="http://www.twitter.com/<?php  echo get_user_meta($user_id,'twitter',true);  ?>/">@<?php  echo get_user_meta($user_id,'twitter',true);  ?></a>
                </div>
                <div class="margin-top-20 profile-desc-link">
                  <i class="fa fa-facebook"></i>
                  <a href="http://www.facebook.com/<?php  echo get_user_meta($user_id,'facebook',true);  ?>/"><?php  echo get_user_meta($user_id,'facebook',true);  ?></a>
                </div>
               
                <div class="margin-top-20 profile-desc-link">
                  <i class="fa fa-google-plus"></i>
                  <a href="http://www.plus.google.com/<?php  echo get_user_meta($user_id,'gplus',true);  ?>/"><?php  echo get_user_meta($user_id,'gplus',true);  ?></a>
                </div>
              </div>
            </div>
            <!-- END PORTLET MAIN -->
          </div>
          
          </div>
            <div class="col-md-8 col-sm-8 border-blue">
              <div class="portlet light">
                  <div class="portlet-title tabbable-line clearfix">
                    <div class="caption caption-md pull-left">
                      <i class="icon-globe theme-font hide"></i>
                      <span class="caption-subject font-blue-madison bold uppercase"><?php _e('User Post','ivdirectories'); ?> </span>
                    </div>
                  </div>
                  <div class="portlet-body">
                    <div class="tab-content">
                      <!-- PERSONAL INFO TAB -->
                      <div class="tab-pane active" id="tab_1_1">
                        <div class="main row padding-left-10 text-center">           
                       <?php
							global $wpdb;
							$iv_post='directories';
							$per_page=8;
							$row_strat=0;$row_end=$per_page;
							$current_page=0 ;
							if(isset($_REQUEST['cpage']) and $_REQUEST['cpage']!=1 ){   
								$current_page=$_REQUEST['cpage']; $row_strat =($current_page-1)*$per_page; 
								$row_end=$per_page;
							}
							$sql="SELECT * FROM $wpdb->posts WHERE post_type = '".$iv_post."' and post_author='".$user_id."' and post_status IN ('publish') ORDER BY  ID DESC  limit ".$row_strat.", ".$row_end." ";
							$authpr_post = $wpdb->get_results($sql);
							$total_post=count($authpr_post);
							//echo'$total_package.....'.$total_package;
							if(sizeof($total_post)>0){
								$i=0;
								foreach ( $authpr_post as $row )								
								{?>
                                      <div class="col-md-6 text-left">
                                        <div class="view view-tenth ">
                                        <?php 
                                        if ( get_the_post_thumbnail( $row->ID, 'thumbnail' )!="" ) { 
                                           
											//the_post_thumbnail('post-thumbnail', array( 'class' => "home-img"));
												echo get_the_post_thumbnail( $row->ID, 'medium',array( 'class' => "home-img") );
                                            }else{ ?>
                                            <div style="width:300px; height:150px;border:1px solid #EEE"></div>
                                             <?php 
                                            }
                                           ?>

                                          <div class="mask">
                                              <h4> <?php echo $row->post_title;?></h4>
                                              <p><a href="<?php echo get_permalink( $row->ID ); ?>"><i class="fa fa-link"></i></a></p>
                                          </div>
                                      </div>
                                            <h3 class="post-onprofile-header text-left"><a href="<?php echo get_permalink( $row->ID ); ?>" class="post-list-header"><?php echo $row->post_title;?></a></h3>
                                            <p class="post-onprofile text-left">
                                            <?php
                                             // $content=the_excerpt();
                                              $content_2 =  $row->post_content;
                                              
                                               echo substr(strip_tags($content_2) ,0,75); ?></p>
                                              <p class="date">
                                              <?php _e('Post on :','ivdirectories'); ?> 
                                             <?php echo date('d M Y',strtotime($row->post_date)); ?>
                                              </p>
                                     </div>
                                          <?php
                                         }
                                       }                
                                          ?>
                                </div>
								
                      </div>
                      <!-- END PERSONAL INFO TAB -->
                      			<div class="center"><?php
								$sql2="SELECT * FROM $wpdb->posts WHERE post_type =  '".$iv_post."' and post_author='".$user_id."' and post_status IN ('publish') ";
								$authpr_post2 = $wpdb->get_results($sql2);
								$total_post=count($authpr_post2);
								$total_page= $total_post/$per_page;								
								$total_page=ceil( $total_page);
								 if($total_page>1){
										$current_page =($current_page==''? '1': $current_page );
										echo ' <ul class="iv-pagination">';										
										for($i=1;$i<= $total_page;$i++){
												echo '<li class="'.($i==$current_page  ? 'active-li': '').' list-pagi"><a href="'.get_permalink().'?&profile=all-post&cpage='.$i.'"> '.$i.'</a></li>';		
										}
										echo'</ul>';
								}		
							?>
						</div>  
                  </div>
				  
                </div>
				
                </div>
                </div>
        </div>
        </div>
      </div>


  <script>
  (function($){
    jQuery(window).load(function() {
        jQuery('.home-img').find('img').each(function() {
            var imgClass = (this.width / this.height > 1) ? 'wide' : 'tall';
            jQuery(this).addClass(imgClass);
        })    
     
    })
   }); 
  </script>

