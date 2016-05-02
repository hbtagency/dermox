<meta name="viewport" content="width=device-width, initial-scale=1">
<link href="//maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet">
<title> </title>
 <link href='http://fonts.googleapis.com/css?family=Open+Sans:400,600,300,700' rel='stylesheet' type='text/css'>
<?php
wp_enqueue_style('wp-iv_directories-style-11', wp_iv_directories_URLPATH . 'admin/files/css/iv-bootstrap.css');
wp_enqueue_script('iv_directories-script-12', wp_iv_directories_URLPATH . 'admin/files/js/bootstrap.min.js');
wp_enqueue_script('iv_directories-script-13', wp_iv_directories_URLPATH . 'admin/files/js/modernizr.custom.79639.js');
global $wpdb;
//wp_enqueue_media(); 
?>
<style>
	#directory-temp1 .ch-item {
		width: 100%;
		border-radius: 50%;
		cursor: default;
		position: relative;
		top:10px;
		box-shadow: 
			inset 0 0 0 16px rgba(255,255,255,0.6),
			0 1px 2px rgba(0,0,0,0.1);
		-webkit-transition: all 0.4s ease-in-out;
		-moz-transition: all 0.4s ease-in-out;
		-o-transition: all 0.4s ease-in-out;
		-ms-transition: all 0.4s ease-in-out;
		transition: all 0.4s ease-in-out;
	}
	#directory-temp1 .entry-content img,
	#directory-temp1 .home-img
	{
		border-radius: 50%;
		width:100%;
		margin: 0;
	}
	#directory-temp1 .ch-info {
		position: absolute;
		background: rgba(75,75,75, 0.8);
		width: 100%;
		height: 100%;
		border-radius: 50%;
		opacity: 0;
		-webkit-transition: all 0.4s ease-in-out;
		-moz-transition: all 0.4s ease-in-out;
		-o-transition: all 0.4s ease-in-out;
		-ms-transition: all 0.4s ease-in-out;
		transition: all 0.4s ease-in-out;
		-webkit-transform: scale(0);
		-moz-transform: scale(0);
		-o-transform: scale(0);
		-ms-transform: scale(0);
		transform: scale(0);		
		-webkit-backface-visibility: hidden;
		top: 0px;
	}

 #directory-temp1 .ch-info h3 {
		color: #fff;
		text-transform: uppercase;
		letter-spacing: 2px;
		font-size: 22px;
		padding: 0;
		font-family: 'Open Sans', Arial, sans-serif;
		text-shadow: none;
		margin-top: 75px;
	}
	#directory-temp1 h3 {
		color: #aaa;
		text-transform: uppercase;
		letter-spacing: 2px;
		font-size: 22px;
		padding: 45px 0 0 0;
		font-family: 'Open Sans', Arial, sans-serif;
		text-shadow: none;
		margin: 10px 0 5px;
		text-align: center;
	}
	#directory-temp1 .para0{
		font-size: 12px;
		padding:0;
		font-family: 'Open Sans', Arial, sans-serif;
		text-align: center;
	}
    #directory-temp1 .ch-info h3 a{
		color: #fff;
		margin-left: 15px;
		border-bottom: 0px solid #eee !important;
		text-decoration: none;
	}
 	#directory-temp1 .ch-info p {
		color: #fff;
		padding: 10px 5px;
		font-style: italic;
		margin: 0 30px;
		font-size: 18px;
		border-top: 1px solid rgba(255,255,255,0.5);
		opacity: 0;
		-webkit-transition: all 1s ease-in-out 0.4s;
		-moz-transition: all 1s ease-in-out 0.4s;
		-o-transition: all 1s ease-in-out 0.4s;
		-ms-transition: all 1s ease-in-out 0.4s;
		transition: all 1s ease-in-out 0.4s;
	}

	#directory-temp1 .ch-info p a {
	 	display: block;
		color: #fff;
		color: rgba(255,255,255,0.7);
		font-style: normal;
		font-weight: 700;
		text-transform: uppercase;
		font-size: 18px;
		letter-spacing: 1px;
		padding-top: 4px;
		font-family: 'Open Sans', Arial, sans-serif;
	}

	#directory-temp1 .ch-info p a:hover {
		color: #fff222;
		color: rgba(255,242,34, 0.8);
	}

	#directory-temp1 .ch-item:hover {
		box-shadow: 
			inset 0 0 0 1px rgba(255,255,255,0.1),
			0 1px 2px rgba(0,0,0,0.1);
	}
	#directory-temp1 .ch-item:hover .ch-info {
		-webkit-transform: scale(1);
		-moz-transform: scale(1);
		-o-transform: scale(1);
		-ms-transform: scale(1);
		transform: scale(1);
		opacity: 1;
	}

	#directory-temp1 .ch-item:hover .ch-info p {
		opacity: 1;
	}
	#directory-temp1 .ch-grid {
		margin: 20px 0 0 0;
		padding: 0;
		list-style: none;
		display: block;
		text-align: center;
		width: 100%;
	}
	#directory-temp1 .fa{
		color: #fff;
	}
	#directory-temp1 .ch-grid:after,
	#directory-temp1 .ch-item:before {
		content: '';
	    display: table;
	}

	#directory-temp1 .ch-grid:after {
		clear: both;
	}

	#directory-temp1 .ch-grid li {
		width: 220px;
		display: inline-block;
		margin: 20px;
	}
	#directory-temp1 .fa-search{
		color: #555;
	}
		#directory-temp1 .fa-search{
			color: #555;
		}
		#directory-temp1 .search{
		   margin: 0 auto 20px;
		   width: 250px;
		   padding:10px 15px;
		   font-size: 16px;
		   outline: none;
		   float: right;
		}
		input:focus{
		border: 1px solid #555;
		outline: none;
		}
			
	 	#directory-temp1 .submit{
		 position: absolute;
		 left:93%;
		 background: none;
		 border: none;
		 outline: none;
		 filter:none;
		 top:10px;
		 box-shadow: none;
		 box-sizing:none;
		 float: right;
		 padding: 0;
		}
		#directory-temp1 .main{
		   margin: 0 auto;
		   text-align: center;
		}
		#directory-temp1 .dd{
			position:relative;
		}

		#directory-temp1 .btn-infu{
			margin: 0 auto;
			padding:10px 15px;
			font-size: 16px;
			outline: none;
			box-shadow: none;
			border: 1px solid #ddd;
			border-radius:0;
			background: #fff;
			-moz-appearance: none;
			-moz-appearance: none;
			width:240px;
			float:left;
			padding: 10px 30px 10px 15px;
    		text-align: left;
    		height: 48px
		}
		#directory-temp1 .arrow-user {
    		width: 20px;
    		height: 40px;
    		float: left;
    		font-size: 15px;
    		position: relative;
    		right: 21px;
    		float: left;
    		top: 2px;
    		background: #fff;
    		padding: 10px 0;
		}
		#directory-temp1 .arrow-user1{
    		width: 50px;
    		height: 28px;
    		font-size: 15px;
    		position: relative;
    		right: 73px;
    		float: left;
    		top: 10px;
    		background: #fff;
		}
		#directory-temp1 .btn-infu:hover{
			border: 1px solid #555;
		}

	#directory-temp1 .main{
	   margin: 0 auto;
	   text-align: center;
	}
		
	#directory-temp1 .dropdown-menu li{
		list-style: none;
		margin-left: 0;
		display: block;
	}
	#directory-temp1 .dropdown-menu{
		padding: 0;
	}
	#directory-temp1 .underline{
		border-bottom: 1px solid #aaa;
	}
	#directory-temp1 a{
		text-decoration: none;
	}
	#directory-temp1 .dropdown-menu li a{
	text-align: left;
}
	#directory-temp1 .fa-angle-down{
		color: #aaa;
	}
	#directory-temp1 .page-numbers{
		border: 1px solid #59ABE3;
		color: #59ABE3;
		padding: 1px 10px;
	}
	#directory-temp1 .page-numbers:last-child{
		border: 1px solid transparent;
	}
	#directory-temp1 .current{
		background: #59ABE3;
		color:#fff;
	}
	#directory-temp1 .page-numbers:first-child{
		border: 1px solid transparent;
	}
	#directory-temp1 .iv-pagination{
		text-align: center;
		margin: 40px auto;
	}
@media (max-width: 320px){
	#directory-temp1 .submit{
		left:100px;
		top:40px;
	}
	#directory-temp1 .arrow-user{
		display: none;
	}
}
</style>

		<?php
		$package ='';
		if(isset($_REQUEST['package_sel'])){
			$package = $_REQUEST['package_sel'];
			
		}
		if($package==''){			
			if(isset($_REQUEST['package'])){
				$package=$_REQUEST['package'];
			}			
		}	
	
		
		$search_user='';
		if(isset($_POST['search_user'])){
			$search_user = $_POST['search_user'];
			//$package = $_POST['package_hidden'];
		}
		?>
          <div id="directory-temp1" class="bootstrap-wrapper">
        	        	<div class="main clearfix underline row">
    	           	    <form class="pull-right dd col-md-6"   action="<?php echo the_permalink(); ?>" method="post"  >
    	           	        <div class="row">
    	           	        <input type="text" name="search_user" id="search_user" class="search" placeholder="User Name" value="<?php echo $search_user; ?>">
    	           	        <button class="submit"><i class="fa fa-search"></i></button>
    	   					<input type="hidden" name="package_hidden" id="package_hidden" value="<?php echo $package; ?>">
    	           	    	</div>
    	           	    </form>
                	  <form class="pull-right dd col-md-6"   action="<?php echo the_permalink(); ?>" method="post"  >   
                	 	<div class="row">       	 		  
        	 		   <select id="package_sel" name="package_sel" class="btn-infu" >  
						<?php
					   $sql="SELECT * FROM $wpdb->posts WHERE post_type = 'iv_directories_pack'  and post_status='draft' ";
							$membership_pack = $wpdb->get_results($sql);
							echo'<option value="">All</option>';
							foreach ( $membership_pack as $row ){
								echo'<option value="'.$row->ID.'"  '.($package==$row->ID ? " selected" : " ") .' >'.$row->post_title.'</option>';	
									
							}	
							  ?>
        	 		  </select >
	          	 		  <div class="arrow-user">
	          	 		  <i class="fa fa-angle-down"></i>
	          	 		  </div>
	          	 		  <!--[if IE ]>
	  						<div class="arrow-user1">
	  						<i class="fa fa-angle-down"></i>
	  						</div>
	          	 		  <![endif]-->
	          	 		  </div>
	          	 		</form>	
        	 		
        	        	 	
        	        	</div>
			<section  class="main">
				<ul class="ch-grid">
                <?php
               
                if(isset($atts['per_page'])){
					 $no=$atts['per_page'];
				}else{
					$no=12;
				}
				
				// total no of author to display

        		$paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
        		if($paged==1){
        		  $offset=0;  
        		}else {
        		   $offset= ($paged-1)*$no;
        		}
                $args = array();
                $args['number']=$no;
                $args['offset']=$offset;
                $args['orderby']='registered';
				$args['order']='DESC';
                //$args['search']='12';				       
                //$args['search_columns']=array( 'user_login', 'user_email' );
                if($package!=''){        			
        			$role_package= get_post_meta( $package,'iv_directories_package_user_role',true); 	
        			$args['role']=$role_package;
        		}
        		  if($search_user!=''){							
        			$args['search']='*'.$search_user.'*';
        		}
        		
        		$iv_redirect_user = get_option( '_iv_directories_profile_public_page');
        		$reg_page_user='';
                if($iv_redirect_user!='defult'){ 
        			$reg_page_user= get_permalink( $iv_redirect_user) ; 										 
        		}
                $user_query = new WP_User_Query( $args );

                // User Loop 
               
                if ( ! empty( $user_query->results ) ) {
                	foreach ( $user_query->results as $user ) {
							if (isset($user->wp_capabilities['administrator'])!=1 ){ 
								$iv_profile_pic_url=get_user_meta($user->ID, 'iv_profile_pic_thum',true);
								$reg_page_u=$reg_page_user.'?&id='.$user->user_login; //$reg_page ;
								?>
								<li><a href="<?php echo $reg_page_u; ?>">
								<h3><?php echo $user->display_name; ?></h3>
								<p class="para0"><?php  if(get_user_meta($user->ID,'occupation',true)==!""){ 
								echo get_user_meta($user->ID,'occupation',true);
								}else{ echo "";} ?></p>
								<div class="ch-item">	
									<?php
									if($iv_profile_pic_url!=''){ ?>
									 <img src="<?php echo $iv_profile_pic_url; ?>" class="home-img wide tall">
									<?php
									}else{
									 echo '<img src="'. wp_iv_directories_URLPATH.'assets/images/Blank-Profile.jpg" class="home-img wide tall">';
								} 
								
								?>
									
									<div class="ch-info">
										<h3>
									<?php  
								  if(get_user_meta($user->ID,'twitter',true)!=''){
								  ?>		
									  <a href="http://www.twitter.com/<?php  echo get_user_meta($user->ID,'twitter',true);  ?>/">
									  <i class="fa fa-twitter"></i>
									  </a>
									 <?php
								  }						 
								  if(get_user_meta($user->ID,'linkedin',true)!=''){
								  ?>  
								  <a href="http://www.linkedin.com/<?php  echo get_user_meta($user->ID,'linkedin',true);  ?>/">             
								  <i class="fa fa-linkedin"></i>
								  </a>
								  <?php
								  }
								  if(get_user_meta($user->ID,'facebook',true)!=''){
								  ?>
								  <a href="http://www.facebook.com/<?php  echo get_user_meta($user->ID,'facebook',true);  ?>/">
								  <i class="fa fa-facebook"></i>
								  </a>
								   <?php
								  }
								   if(get_user_meta($user->ID,'gplus',true)!=''){
								  ?>
								  <a href="http://www.plus.google.com/<?php  echo get_user_meta($user->ID,'gplus',true);  ?>/">            
								  <i class="fa fa-google-plus"></i>
								  </a>
								  <?php
								  }
								  ?>
								  </h3>
								  <p class="text-center">
								  <a href="<?php echo $reg_page_u; ?>">
								  <i class="fa fa-link"></i>
								  </a>
								  </p>
								  
									</div>
								</div>
								</a>
							</li>
		        	<?php
		        }	
		    }
        } else {
        	echo 'No users found.';
        }
        ?>
		</ul>			
		</section>
		<?php
		
			$total_user = $user_query->total_users;  
			$total_pages=ceil($total_user/$no);						
			echo '<div id="iv-pagination" class="iv-pagination">';  					
				echo paginate_links( array(
							'base' => '%_%'.'?&package='.$package, // the base URL, including query arg						
							'format' => '?&paged=%#%', // this defines the query parameter that will be used, in this case "p"
							'prev_text' => __('&laquo; Previous'), // text for previous page
							'next_text' => __('Next &raquo;'), // text for next page
							'total' => $total_pages, // the total number of pages we have
							'current' => $paged, // the current page
							'end_size' => 1,
							'mid_size' => 5,	
						));									
			echo '</div>';  	
			
			?>
    </div>	
<script>
	jQuery(function() {
    jQuery('#package_sel').change(function() {
        this.form.submit();
    });
});
</script>	
