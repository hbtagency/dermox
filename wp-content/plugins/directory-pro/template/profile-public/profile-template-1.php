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
  #post-pro4 img{
    width:50px;
    height: 50px;
    border-radius: 50%
  }
  .bootstrap-wrapper blockquote{
    border-left: 0px solid #eeeeee !important;
  }
  #p-pro-4 .agent{
    border-radius: 50%;
    margin-top: 20px;
  }
  #p-pro-4 .entry-content a{
    border:0;
  }
  #p-pro-4 h2{
    color: #56688a;
    font-size: 24px;
    font-family: 'Roboto', sans-serif;
    margin-top: 25px;
    font-weight: 600;
  }
  #p-pro-4 a{
  border:none !important;
  text-decoration: none;
}
  #p-pro-4 h2 span{
    font-size: 18px;
    display: block;
    margin-top: 20px;
    margin-bottom:40px;
    color:#56688a; 
    font-size: 14px;
    font-family: 'Roboto', sans-serif;
  }
  #p-pro-4 h4{
   color:#56688a; 
   font-size: 18px;
   font-family: 'Oswald', sans-serif;
 } 
 #p-pro-4 .fa{
  color:#56688a;
  margin: 0 10px;
  font-size: 18px
}
#p-pro-4 .contact-info{
  color:#56688a;
  font-size: 16px;
  font-weight: 400;
  font-family: 'Roboto', sans-serif;
  margin-left: 0;
}
#p-pro-4 .contact-info li{
  border-bottom: 1px solid #eee;
  padding:15px 0;
  margin-left: 0;     
  word-wrap: break-word;
}
#p-pro-4 ul li {
  list-style: none;
  word-wrap: break-word;
}
#p-pro-4 .contact-info li:last-child {
  border-bottom: 0px solid #eee;
}
#p-pro-4 .fa1{
  border-radius: 50%
}
#p-pro-4 .contact-info0{
  color:#56688a;
  font-size: 18px;
  font-family: 'Roboto', sans-serif;
  margin: 30px 0;
  font-weight: 600;
}
#p-pro-4 .contact-info0 li{
  margin-left: 0
}
#p-pro-4 .contact-info0 span{
  font-size: 16px;
  font-weight: 300;
  font-family: 'Roboto', sans-serif;
  display: block;
}
#p-pro-4 .post-pro-4{
  padding: 20px;
}
#p-pro-4 .contact-info1{
  color:#56688a;
  font-size: 18px;
  font-family: 'Roboto', sans-serif;
  margin: 30px 0;
  font-weight: 600;
}
#p-pro-4 .contact-info1 li{
  margin-left: 0
}
#p-pro-4 .contact-info1 span{
  font-size: 16px;
  font-weight: 300;
  font-family: 'Roboto', sans-serif;
  display: block;
}
#p-pro-4 .boxed li{
  padding: 8px 5px;
  border: 1px solid #56688a;
  display: inline-block; 
  border-radius: 3px;
}
#p-pro-4  .bottom-line{
 border-bottom: 1px solid #eee;
 margin: 20px 0 0;
}
#p-pro-4 .separetor{
 box-shadow: 0 0 0px 4px #eee,0 0 0px 4px rgba(240,240,240,.8);
}
#p-pro-4  .around-separetor{
  border: 1px solid #aaa;
  margin-right: 0px;
}
#p-pro-4  .bio{
  font-size: 16px;
  font-weight: 300;
  font-family: 'Roboto', sans-serif;
  color:#56688a;
  margin: 30px 15px;
}
#p-pro-4  .bio span{
  font-size: 16px;
  font-weight: 300;
  font-family: 'Roboto', sans-serif;
  color:#999;
  margin-top: 30px;
  display: block;
}
#p-pro-4 .top-b-bar{
  background-color:#2C3E50;
  padding: 10px 10px 1px
}
#p-pro-4 h1{
  color: #fff;
  font-size: 24px;
  font-family: 'Oswald', sans-serif;
  margin-bottom: 12px;
  padding: 0;
}
#p-pro-4 .fa-linkedin{
 border:1px solid #eee;
 padding: 12.5px 15px;
 margin: 15px 5px;
}
#p-pro-4 .fa-google-plus{
  border:1px solid #eee;
  padding: 12.5px 15px;
  margin: 15px 5px;
}

#p-pro-4 .fa-twitter{
  border:1px solid #eee;
  padding: 12.5px 15px;
  margin: 15px 5px;
}
#p-pro-4 .fa-facebook{
  border:1px solid #eee;
  padding: 12.5px 15px;
  margin: 15px 5px;
}
#p-pro-4 .fa{
  font-size:15px;
}
.fa.pull-left {
  margin-right: 0 !important;
}
#p-pro-4 .fa-linkedin:hover{
  color:#fff;
  background-color: #1184cd;
}
#p-pro-4 .fa-google-plus:hover{
  background-color:#d63b3b;
  color:#fff; 
}
#p-pro-4 .fa-twitter:hover{
  background-color:#2bbfec;
  color:#fff; 
}
#p-pro-4 .fa-facebook:hover{
  background-color: #395b89;
  color:#fff;
}
#p-pro-4 .margin-top{
  margin-top: 30px
}
#p-pro-4 .margin-zero{
  margin: 0;
}
#p-pro-4 .bio1{
  font-size: 16px;
  font-weight: 300;
  font-family: 'Roboto', sans-serif;
}
 #p-pro-4 ul.iv-pagination {
 display: inline-block;
 padding-left: 0;
 margin: 20px 0;
 border-radius: 4px;
 list-style: none;
 }
#p-pro-4 .list-pagi:hover{
  border: 1px solid #59ABE3;
}
#p-pro-4 .list-pagi:hover a{
  text-decoration: none;
  color: #59ABE3;
}
#p-pro-4 .list-pagi{
  border: 1px solid #555;
  float: left;
  margin-left: .5em;
  padding: 0;
}
#p-pro-4 .list-pagi a{
  color: #555;
  padding: 1px 10px;
}
#p-pro-4 .active-li{
  border: 1px solid #019875;
  background:#019875;
}
#p-pro-4 .active-li a{
  color: #fff;
}
</style>

<body>
 <div id="p-pro-4" class="bootstrap-wrapper">
  <div class="wrapper">
    <div class="row margin-zero">
      <div class="col-md-6">
        <div class="row around-separetor">
          <div class="top-b-bar">
            <h1><?php _e('Profile','ivdirectories'); ?>  </h1>
          </div>
          <div class="row bottom-line">
            <div class="col-md-6 text-center">
              <?php

              if($iv_profile_pic_url!=''){ ?>
              <img src="<?php echo $iv_profile_pic_url; ?>" class="agent">
              <?php
            }else{
              echo'	 <img src="'. wp_iv_directories_URLPATH.'assets/images/Blank-Profile.jpg" class="agent">';
            }
            ?>
            <h2>
             <?php 
             $name_display=get_user_meta($user_id,'first_name',true).' '.get_user_meta($user_id,'last_name',true);
             echo (trim($name_display)!=""? $name_display : $display_name );?>
           </h2>
		   
         </div>
         <div class="col-md-6">
          <h4><?php _e('Contact Info','ivdirectories'); ?> </h4>

          
          <ul class="list-unstyled contact-info">
            <li><i class="fa fa-phone"></i><?php
              if( get_user_meta($user_id,'hide_phone',true)==''){ ?>

              <?php echo get_user_meta($user_id,'phone',true);
            } ?></li>
            <li><i class="fa fa-envelope"></i><?php if( get_user_meta($user_id,'hide_email',true)==''){ ?>
				<a href="mailto: <?php echo $email; ?>"><?php echo $email; ?></a>
              <?php
            }
             ?>
          </li>
          <li><a href="http://<?php  echo get_user_meta($user_id,'web_site',true); ?>"><i class="fa fa-globe"></i><?php  echo get_user_meta($user_id,'web_site',true);  ?></a>
          </li>
        </ul>
      </div>
    </div>
    <div class="row bottom-line">
      <div class="col-md-offset-1 col-md-5">
        <ul class="list-unstyled contact-info0">
          <?php
          if( get_user_meta($user_id,'hide_mobile',true)==''){ ?>
          <li><span><?php _e('Mobile','ivdirectories'); ?> </span><?php echo get_user_meta($user_id,'mobile',true); ?></li>
          <?php
        }
        ?>
        <li><span><?php _e('Occupation','ivdirectories'); ?> </span><?php echo get_user_meta($user_id,'occupation',true); ?></li>
      </ul>
    </div>
    <div class="col-md-6">
      <ul class="list-unstyled contact-info1">
        <li><span><?php _e('Address','ivdirectories'); ?> </span><?php echo get_user_meta($user_id,'address',true); ?></li>

      </ul>
    </div>
  </div>
  <div class="row bottom-line">
    <div class="col-md-offset-1 col-md-11">
      <p class="bio">
        <span><?php _e('Bio','ivdirectories'); ?> </span>
        <?php echo get_user_meta($user_id,'description',true); ?>
      </p>

      <div>
        <a href="http://www.facebook.com/<?php  echo get_user_meta($user_id,'facebook',true);  ?>/">
         <i class="fa fa1 fa-facebook pull-left"></i>
       </a>
       <a href="http://www.twitter.com/<?php  echo get_user_meta($user_id,'twitter',true);  ?>/">
         <i class="fa fa1 fa-twitter pull-left"></i>
       </a>
       <a href="http://www.linkedin.com/<?php  echo get_user_meta($user_id,'linkedin',true);  ?>/">
         <i class="fa fa1 fa-linkedin pull-left"></i>
       </a>
       <a href="http://www.plus.google.com/<?php  echo get_user_meta($user_id,'gplus',true);  ?>/">
         <i class="fa fa1 fa-google-plus pull-left"></i>
       </a>
       <div class="clearfix"></div>
     </div>
   </div>
 </div>
</div>
</div>
<div class="col-md-6">
  <div class="top-b-bar">
    <h1><?php _e('Recent post','ivdirectories'); ?>  </h1>
  </div>
  <div class="around-separetor">
    <div class="carousel-inner" id="post-pro4">
      <!-- Quote 1 -->
            
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
			  <div class="item active">
				<div class="post-pro-4">
				  <div class="row">
					<div class="col-sm-3 text-center">
					  <a href="<?php echo get_permalink( $row->ID ); ?>">
							<?php  echo get_the_post_thumbnail( $row->ID, 'thumbnail' ); //the_post_thumbnail(); ?>
						 </a>
					</div>
					<div class="col-sm-9" >
					  <p class="bio1"><a href="<?php echo get_permalink( $row->ID ); ?>"> <?php echo $row->post_title;?> </a></p>
					  <p class="bio1"><?php _e('Post date: ','ivdirectories'); ?> <?php echo date('d M Y',strtotime($row->post_date)); ?></p>
					</div>
				  </div>
				</div>
			  </div>
      <?php
			}
		}
      
       ?>
		
    </div>
    <div class="item active">
        <div class="post-pro-4">        
			<div class="center">
				<?php
				$sql2="SELECT * FROM $wpdb->posts WHERE post_type =  '".$iv_post."' and post_author='".$user_id."' and post_status IN ('publish' ) ";
				$authpr_post2 = $wpdb->get_results($sql2);
				$total_post=count($authpr_post2);
				
				$total_page= $total_post/$per_page;
				$total_page=ceil( $total_page);
					 if($total_page>1){
						$current_page =($current_page==''? '1': $current_page );
						echo ' <ul class="iv-pagination">';										
						for($i=1;$i<= $total_page;$i++){
								echo '<li class="list-pagi '.($i==$current_page  ? 'active-li': '').'"><a href="'.get_permalink().'?&profile=all-post&cpage='.$i.'"> '.$i.'</a></li>';	
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
