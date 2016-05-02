<?php

//wp_enqueue_style('wp-iv_directories-style-11', wp_iv_directories_URLPATH . 'admin/files/css/iv-bootstrap.css');
//wp_enqueue_script('iv_directories-script-12', wp_iv_directories_URLPATH . 'admin/files/js/bootstrap.min.js');

	global $wpdb, $post;
	$currencyCode= get_option('_iv_directories_api_currency');
	//$currencyCode = (isset($paypal_api_currency)) ? $paypal_api_currency : '$';
	$sql="SELECT * FROM $wpdb->posts WHERE post_type = 'iv_directories_pack'  and post_status='draft'";
	$membership_pack = $wpdb->get_results($sql);
	$total_package=count($membership_pack);
	if($total_package>0){
		if($total_package==1 || $total_package==2){
			$window_ratio='33.33';
		}else{
			$window_ratio= 100/$total_package;
		}
	}
?>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link href='http://fonts.googleapis.com/css?family=Roboto:100,400' rel='stylesheet' type='text/css'>
<style>
	

.rounder-header-pt{
  width: <?php echo $window_ratio; ?>%;
  float: left;
  margin-bottom: 0 !important;
}
ul#a1 .rounder-header{
  background-color: #E87E04;
  color: #fff;
  padding: 20px;
  text-align: center;
  display: block;
  border-right: 1px solid #fff;
  font-family: 'Roboto', sans-serif;
  margin-bottom: 0;
}
ul#a2 .rounder-header{
  background-color: #F9690E;
  color: #fff;
  padding: 20px;
  text-align: center;
  display: block;
  border-right: 1px solid #fff;
  font-family: 'Roboto', sans-serif;
  margin-bottom: 0;
}
ul#a3 .rounder-header{
  background-color: #E7640E;
  color: #fff;
  padding: 20px;
  text-align: center;
  display: block;
  border-right: 1px solid #fff;
  font-family: 'Roboto', sans-serif;
  margin-bottom: 0;
}
ul#a1 ul ,ul#a2 ul ,ul#a3 ul ,ul#a4 ul {
  margin-left: 0;
  list-style: none;
  border-right: 1px solid #fff;
}
ul#a1 ul li,ul#a2 ul li,ul#a3 ul li,ul#a4 ul li{
  margin-left: 0;
  list-style: none;
}
#pricelist_4_iv ul{
  margin-left: 0;
}
#pricelist_4_iv ul li{
  margin-left: 0;
  list-style: none;
}
ul#a2:hover .rounder-header,
ul#a3:hover .rounder-header,
ul#a1:hover .rounder-header{
  border-right:  1px solid #fff;
  border-left: 0;
}
ul#a1 .rounder,ul#a2 .rounder,ul#a3 .rounder{
  width: 100px;
  height: 100px;
  border-radius: 50%;
  background-color: #F9BF3B;
  text-align: center;
  margin: 0 auto;
  border:5px solid #FFF;
}
ul#a1 .rounder h1,ul#a2 .rounder h1,ul#a3 .rounder h1{
  font-size: 40px;
  font-family: 'Roboto', sans-serif;
  font-weight: 700;
  margin-top: 30px;
  color: #fff;
}
ul#a1:hover .rounder h1,ul#a2:hover .rounder h1,ul#a3:hover .rounder h1{
  color:#F9BF3B;
}
.kue-rounder-list-unstyled{
  padding-left:0;
  list-style: none; 
}
.rounder h1 span{
  font-size: 14px;
  font-family: 'Roboto', sans-serif;
  display: block;
}
.kue-rounder-border-around{
  border-left: 1px solid #eee;
  border-right: 1px solid #eee;
  margin-bottom: 0;
}
.kue-rounder-btn {
  display: inline-block;
  padding: 6px 12px;
  margin-bottom: 0;
  font-size: 14px;
  font-weight: normal;
  font-family: 'Roboto', sans-serif;
  line-height: 1.42857143;
  text-align: center;
  white-space: nowrap;
  vertical-align: middle;
  -ms-touch-action: manipulation;
      touch-action: manipulation;
  cursor: pointer;
  -webkit-user-select: none;
     -moz-user-select: none;
      -ms-user-select: none;
          user-select: none;
  background-image: none;
  border: 1px solid transparent;
  border-radius: 4px;
}
ul#a3:hover .kue-rounder-border-around,
ul#a1:hover .kue-rounder-border-around,
ul#a2:hover .kue-rounder-border-around{
  border-right: 0;
  border-left: 0;
  margin-bottom: 0;
}
.kue-rounder-odd-4{
  background-color: #fff;
  padding: 10px 15px;
  margin: 0 auto;
  text-align: center;
  font-family: 'Roboto', sans-serif;
  font-weight: 600;
  margin-bottom: 0;
}
.kue-rounder-even-4{
  background-color: #f1f1f1;
  padding: 10px 15px;
  text-align: center;
  font-family: 'Roboto', sans-serif;
  font-weight: 600;
  margin-bottom: 0;
}
ul#a1 .kue-rounder-btn-color{
  background-color: #E87E04;
  color: #fff;
}
ul#a2 .kue-rounder-btn-color{
  background-color: #F9690E;
  color: #fff;
}
ul#a3 .kue-rounder-btn-color{
  background-color: #E7640E;
  color: #fff;
}
ul#a1 .kue-rounder-button{
  text-align: center;
  padding: 20px 0;
  border-bottom: 5px solid #E87E04;
  background-color: #fff;
}
ul#a2 .kue-rounder-button{
  text-align: center;
  padding: 20px 0;
  border-bottom: 5px solid #F9690E;
  background-color: #fff;
}
ul#a3 .kue-rounder-button{
  text-align: center;
  padding: 20px 0;
  border-bottom: 5px solid #E7640E;
  background-color: #fff;
}


ul#a1:hover .rounder,
ul#a3:hover .rounder,
ul#a2:hover .rounder{
  background-color: #fff;
  color:#674172 ;
}

ul#a1:hover .kue-rounder-even-4{
  background-color: rgb(235, 149, 50);
    color: #fff;
}
ul#a2:hover .kue-rounder-even-4{
  background-color: rgb(242, 121, 53);
    color: #fff;
}
ul#a3:hover .kue-rounder-even-4{
  background-color: rgb(249, 105, 14);
    color: #fff;
}
ul#a1:hover .btn-color,
ul#a2:hover .btn-color{
  background-color: #fff;
  color: #674172; 
}
ul#a3:hover .btn-color{
  background-color: #fff;
  color: #674172; 
}
ul#a1:hover .kue-rounder-odd-4{
  background-color: rgba(235, 149, 50,.9);
  color: #fff;
}
ul#a2:hover .kue-rounder-odd-4{
  background-color: rgba(242, 121, 53,.9);
  color: #fff;
}
ul#a3:hover .kue-rounder-odd-4{
  background-color: rgba(249, 105, 14,.9);
  color: #fff;
}

ul#a1:hover .kue-rounder-button{
  background-color: #E87E04;
  border-bottom: 5px solid #E87E04;
  background-image: none;
}
ul#a2:hover .kue-rounder-button{
  background-color: #F9690E ;
  border-bottom: 5px solid #F9690E;
  background-image: none;
}
ul#a3:hover .kue-rounder-button{
  background-color: #E7640E;
  border-bottom: 5px solid #E7640E;
  background-image: none;
}


ul#a1:hover ul li,
ul#a2:hover ul li,
ul#a3:hover ul li{padding:12px 0}
ul#a1:hover,
ul#a3:hover,
ul#a2:hover{ 
  margin-top:-10px; 
  box-shadow: 0 0px 30px 10px rgba(65,65,65,0.38);
  -webkit-box-shadow: 0 0 30px 10px rgba(65, 65, 65, 0.38);
  -moz-box-shadow:0 0 30px 10px rgba(65, 65, 65, 0.38);  z-index:99;  
  position: relative;
}
.wrapper-4{
  width:100%;
}
ul#a1:hover .kue-rounder-btn{
  background-color: #E87E04;
  color: #fff;
  font-size: 24px;
  font-weight: 700;
  font-family: 'Roboto', sans-serif;
} 
ul#a2:hover .kue-rounder-btn{
  background-color: #F9690E;
  color: #fff;
  font-size: 24px;
  font-weight: 700;
  font-family: 'Roboto', sans-serif;
} 
ul#a3:hover .kue-rounder-btn{
  background-color: #E7640E;
  color: #fff;
  font-size: 24px;
  font-weight: 700;
  font-family: 'Roboto', sans-serif;
}
ul#a1:hover button,ul#a2:hover button,ul#a3:hover button{
  background-image: none;
  border: none;
  outline: none;
}

@media (max-width: 480px){
ul#a1 .rounder,ul#a2 .rounder,ul#a3 .rounder{
    width: 45px !important;
    height: 45px !important;
    margin: 0;
  }
  ul#a1 .rounder-header,ul#a2 .rounder-header,ul#a3 .rounder-header{
    padding: 5px
  }
ul#a1 .rounder h1,ul#a2 .rounder h1,ul#a3 .rounder h1{
    font-size: 20px;
    margin-top: 10px;
  }
  .rounder h1 span{
    font-size: 10px;
  }
  ul#a1 h2,ul#a2 h2,ul#a3 h2{
    font-size: 16px !important ;
  }
  ul#a2:hover .kue-rounder-btn,
  ul#a3:hover .kue-rounder-btn,
  ul#a1:hover .kue-rounder-btn{
    font-size: 12px;
    padding: 10px 5px;
  }
  ul#a2 .kue-rounder-btn,
  ul#a3 .kue-rounder-btn,
  ul#a1 .kue-rounder-btn{
    font-size: 12px;
    padding: 10px 5px;
  }
}
</style>
<div id="pricelist_4_iv" class="wrapper-4">
<?php
					
							//echo'$total_package.....'.$total_package;
							if(sizeof($membership_pack)>0){
								 $page_name_reg=get_option('_iv_directories_registration' ); 
								$feature_max=0;
								//$last_li_no2 = array();
								foreach ( $membership_pack as $row5 )
								{
									$feature_arr = array_filter(explode("\n", $row5->post_content));
									
									//$source_string = gzdecode($row5->post_conten);
									//$feature_arr = array_filter(explode("\r\n", $source_string));
										//print_r($feature_all);
									$last_li_no=sizeof($feature_arr);
									if($last_li_no > $feature_max){
										$feature_max=$last_li_no;
										
									}
									
								}	
								//print_r($last_li_no2);
								
								$i=0;
								$pt=0;
								foreach ( $membership_pack as $row )
								{
									$recurring_text='  '; 
									if(get_post_meta($row->ID, 'iv_directories_package_cost', true)=='0' or get_post_meta($row->ID, 'iv_directories_package_cost', true)==""){
									  $amount= $currencyCode. '00';
									}else{
									  $amount= $currencyCode. get_post_meta($row->ID, 'iv_directories_package_cost', true);
									}
									
									$recurring= get_post_meta($row->ID, 'iv_directories_package_recurring', true);	
									if($recurring == 'on'){
										$count_arb=get_post_meta($row->ID, 'iv_directories_package_recurring_cycle_count', true); 	
										if($count_arb=="" or $count_arb=="1"){
										$recurring_text=" per ".' '.get_post_meta($row->ID, 'iv_directories_package_recurring_cycle_type', true);
										}else{
										$recurring_text=' per '.$count_arb.' '.get_post_meta($row->ID, 'iv_directories_package_recurring_cycle_type', true).'s';
										}
										
									}else{
										$recurring_text=' &nbsp; ';
									}
									if($i>2){
										$pt=0;
									}
									$pt++;
									?>
									
									<ul id="a<?php echo $pt;?>" class="kue-rounder-list-unstyled rounder-header-pt <?php echo ($i%2 == 0 ? 'even-4' : '') ; ?>">	
										<li class="rounder-header">	
											<div class="rounder"><h1><?php echo $amount; ?> <span><?php echo $recurring_text; ?></span></h1></div>
											<h2><?php echo strtoupper($row->post_title); ?></h2>
										</li>
										
										
										<li class="kue-rounder-border-around">
											<ul class="kue-rounder-list-unstyled kue-rounder-content">
											<?php
												$row->post_content;
												$ii=0;
												$feature_all = explode("\n", $row->post_content);
												//print_r($feature_all);
												$last_li_no=sizeof($feature_all);
												foreach($feature_all as $feature){
													if(trim($feature)!=""){
														echo '<li class=" '.($ii == 0 ? 'first' : ''). ($ii == $last_li_no ? 'last' : ''). ' kue-rounder-'.($ii %2== 0 ? 'even-4' : 'odd-4').'">'.$feature.'</li>';
													
													$ii++;
													}												
												
												}
												
												if($feature_max > $ii){
													while ($ii < $feature_max) {
														echo '<li class=" '.($ii == 0 ? 'first' : ''). ($ii == $feature_max ? 'last' : ''). ' kue-rounder-'.($ii %2== 0 ? 'even-4' : 'odd-4').'">&nbsp; </li>';
													 $ii++;	
													}
												}
												
											?>	
										<li class="kue-rounder-button"> 
										    <a style="text-decoration:none" class=" kue-rounder-btn kue-rounder-btn-color" href="<?php echo get_page_link($page_name_reg).'?&package_id=	'.$row->ID ; ?>" >Sign up</a>
										<!--
											<button  href="<?php echo get_page_link($page_name_reg).'?&package_id=	'.$row->ID ; ?>"  class="kue-rounder-btn kue-rounder-btn-color">Buy Now</button>
											-->
										
										</li>											
										</ul>
									 </li> 
									</ul>
									
								<?php
								$i++;
								}
							}


						?>						

</div>
