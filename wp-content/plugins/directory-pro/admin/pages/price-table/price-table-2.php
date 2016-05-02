<?php
wp_enqueue_style('wp-iv_directories-style-11', wp_iv_directories_URLPATH . 'admin/files/css/iv-bootstrap.css');
//wp_enqueue_script('iv_directories-script-12', wp_iv_directories_URLPATH . 'admin/files/js/bootstrap.min.js');

	global $wpdb, $post;
	$currencyCode= get_option('_iv_directories_api_currency');
	$currencies = array();
	$currencies['AUD'] ='$';$currencies['CAD'] ='$';
	$currencies['EUR'] ='€';$currencies['GBP'] ='£';
	$currencies['JPY'] ='¥';$currencies['USD'] ='$';
	$currencies['NZD'] ='$';$currencies['CHF'] ='Fr';
	$currencies['HKD'] ='$';$currencies['SGD'] ='$';
	$currencies['SEK'] ='kr';$currencies['DKK'] ='kr';
	$currencies['PLN'] ='zł';$currencies['NOK'] ='kr';
	$currencies['HUF'] ='Ft';$currencies['CZK'] ='Kč';
	$currencies['ILS'] ='₪';$currencies['MXN'] ='$';
	$currencies['BRL'] ='R$';$currencies['PHP'] ='₱';
	$currencies['MYR'] ='RM';$currencies['AUD'] ='$';
	$currencies['TWD'] ='NT$';$currencies['THB'] ='฿';	
	$currencies['TRY'] ='TRY';	$currencies['CNY'] ='¥';		
	$currencies['INR'] ='₹';
	
	$currencyCode= get_option('_iv_directories_api_currency');
	
	$currencyCode=(isset($currencies[$currencyCode]) ? $currencies[$currencyCode] :$currencyCode );
	
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
<link href='http://fonts.googleapis.com/css?family=Roboto:100' rel='stylesheet' type='text/css'>
<style>
	ul#bp1 h1,ul#bp2 h1,ul#bp3 h1{ margin:5px;font-weight:100;}
   ul#bp1 h2,ul#bp2 h2,ul#bp3 h2{ margin:5px;font-weight:100;word-wrap: break-word;
}
	#bp1,#bp2,#bp3{}
  ul#bp1 li,ul#bp2 li,ul#bp3 li{ margin:0;list-style: none}
   ul#bp1 ul,ul#bp2 ul,ul#bp3 ul{list-style:none !important}
  #bp1,#bp2,#bp3{margin:0; padding: 0;list-style: none}
  ul#bp1 a,ul#bp2 a,ul#bp3 a{
  border:none !important;
  text-decoration: none;
}
.kue-body{
  width: <?php echo $window_ratio; ?>% ;
  display: inline-block;
  margin-top: 40px;
  list-style: none !important;
}
.kue-around{
   border-right:1px solid #eee;
   border-left:1px solid #eee;
   border-bottom:1px solid #eee;
}
.kue-title{
  background: -ms-linear-gradient(top, #afc457, #90ad42) !important;
  background: -moz-linear-gradient(top, #afc457, #90ad42) !important;
  background: -o-linear-gradient(top, #afc457, #90ad42) !important;
  background: -webkit-linear-gradient(top, #afc457, #9017342) !important;
  background: -webkit-gradient(linear, left top, left bottom, color-stop(0, #afc457), color-stop(1, #90ad42)) !important;
  background-color: #afc457;
  padding:5px 10px;
  display: block;
  color: #fff;
  text-align: center;

}
ul#bp2 .kue-title{
  background-color: #7ead50 !important;
background-image: linear-gradient(top, #7ead50, #5f8d3d) !important;
filter: progid:DXImageTransform.Microsoft.gradient(startColorstr='#7ead50', endColorstr='#5f8d3d') !important;
-ms-filter: progid:DXImageTransform.Microsoft.gradient(startColorstr='#7ead50', endColorstr='#5f8d3d') !important;
background: -ms-linear-gradient(top, #7ead50, #5f8d3d) !important;
background: -moz-linear-gradient(top, #7ead50, #5f8d3d) !important;
background: -o-linear-gradient(top, #7ead50, #5f8d3d) !important;
background: -webkit-linear-gradient(top, #7ead50, #5f8d3d) !important;
background: -webkit-gradient(linear, left top, left bottom, color-stop(0, #7ead50), color-stop(1, #5f8d3d)) !important;

}
ul#bp2{ 
  margin-top:-10px; 
  box-shadow: 0 0px 30px 10px rgba(65,65,65,0.38);
  -webkit-box-shadow: 0 0 30px 10px rgba(65, 65, 65, 0.38);
  -moz-box-shadow:0 0 30px 10px rgba(65, 65, 65, 0.38);  z-index:99;  
  position: relative;
}
.kue-title h2{
  margin: 0;
  font-size: 35px;
  font-family: 'Roboto';
  padding:5px; 
  font-weight: 700;
}

.kue-subtitle{
  background: #fff;
  padding: 10px;
  display: block;
  text-align: center;
  border-right:1px solid #eee;
  border-left:1px solid #eee;
  border-bottom:1px solid #eee;
}
.kue-subtitle h1{
   margin: 0;
  font-size: 55px;
  font-family: 'Roboto';
  font-weight: 700;
  padding:10px 0 0;
}
.kue-subtitle h1 span{
  font-size: 14px;
  color:#888;
  display: block;
  margin:15px auto 0; 
}
.blue{
  color: #3498db !important;
}
.kue-odd{
    text-align: center;
    padding:10px;
    font-size: 15px;
    font-family: 'Roboto';
    color: #000;
    border-right: 1px solid #eee;
    border-left:  1px solid #eee; 
    border-bottom: 1px solid #eee;
    font-weight: 600;
   
}
.kue-odd:hover{
  color:#2c3ecd;
}
.kue-even{
    text-align: center;
    font-size: 15px;
    font-family: 'Roboto';
    color: #000;
    border-right: 1px solid #eee;
    border-left:  1px solid #eee; 
    border-bottom: 1px solid #eee;
    padding:10px; 
    font-weight: 600;
     margin:none;
}
.even:hover{
  color:#2c3ecd;
}
.btn-color {
  color: #fff !important;
  background-color: #afc457 !important;

}
.btn-color:hover {
  background-color: #7ead50 !important;
  color:#fff;
  } 
ul#bp1:hover .btn-color{
  background: #007196;
  color: #fff;
}
ul#bp2:hover .btn-color{
  background: #007196;
  color: #fff;
}
ul#bp3:hover .btn-color{
  background: #007196;
  color: #fff;
}
.kue-button{
  text-align: center;
  padding: 10px;
  padding-bottom: 30px;
  border:1px solid #eee;
  
}
.kue-content{
  padding:0; margin: 0;list-style: none;
}
.wrapper{
  width:100%;
}
.border-around{
   border-right:1px solid #eee;
   border-left:1px solid #eee;
   border-bottom:1px solid #eee;
}
.cbtn {
display: inline-block;
padding: 6px 12px;
margin-bottom: 0;
font-size: 14px;
font-weight: 400;
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

@media (min-width: 320px) and (max-width: 480px){
.kue-even{
  font-size: 10px !important;
}
.kue-odd{
  font-size: 10px !important;
}
.kue-title h2{
  font-size: 10px !important;
}
.kue-subtitle h1{
  font-size: 15px !important;
}
.cbtn {
	font-size:10px; padding:5px !important;
	}	
}
</style>

<div class="bootstrap-wrapper">
						<div class="text-center">


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
								foreach ( $membership_pack as $row )
								{
									$recurring_text='  '; 
									if(get_post_meta($row->ID, 'iv_directories_package_cost', true)=='0' or get_post_meta($row->ID, 'iv_directories_package_cost', true)==""){
									   $amount= 'Free';
									}else{
									  $amount= $currencyCode.' '. get_post_meta($row->ID, 'iv_directories_package_cost', true);
									}
									
									$recurring= get_post_meta($row->ID, 'iv_directories_package_recurring', true);	
									if($recurring == 'on'){
										
										$amount= $currencyCode.' '. get_post_meta($row->ID, 'iv_directories_package_recurring_cost_initial', true);
										
										$count_arb=get_post_meta($row->ID, 'iv_directories_package_recurring_cycle_count', true); 	
										if($count_arb=="" or $count_arb=="1"){
										$recurring_text=" per ".' '.get_post_meta($row->ID, 'iv_directories_package_recurring_cycle_type', true);
										}else{
										$recurring_text=' per '.$count_arb.' '.get_post_meta($row->ID, 'iv_directories_package_recurring_cycle_type', true).'s';
										}
										
									}else{
										$recurring_text=' &nbsp; ';
									}
									?><ul id="bp<?php  echo ($i %2== 0 ? '1' : '2'); ?>" class="kue-body">
										<li class="kue-title">
											<h2><?php echo strtoupper($row->post_title); ?></h2>
										</li>
											
										 
									       <li class="kue-subtitle">
									      <h1><?php echo $amount; ?><span><?php echo $recurring_text; ?></span></h1>
									      </li>
										
									
											<?php
												$row->post_content;
												$ii=0;
												$feature_all = explode("\n", $row->post_content);
												//print_r($feature_all);
												$last_li_no=sizeof($feature_all);
												?>
												 <li class="border-around">
													<ul class="kue-content">
												<?php
												foreach($feature_all as $feature){
													if(trim($feature)!=""){
														echo '<li class=" '.($ii == 0 ? 'first' : ''). ($ii == $last_li_no ? 'last' : ''). ($ii %2== 0 ? ' kue-even' : ' kue-odd').'">'.$feature.'</li>';
													
													$ii++;
													}												
												
												}
												?>
												 </ul>
												</li>
												
												<?php
												
												if($feature_max > $ii){
													while ($ii < $feature_max) {
														echo '<li class=" '.($ii == 0 ? 'first' : ''). ($ii == $feature_max ? 'last' : ''). ($ii %2== 0 ? ' kue-even' : ' kue-odd').'">&nbsp; </li>';
													 $ii++;	
													}
												}
												
											?>										  
										
										
										 <div class="kue-button"> 
										  <a style="text-decoration:none" class="cbtn btn-color" href="<?php echo get_page_link($page_name_reg).'?&package_id=	'.$row->ID ; ?>" >Sign up</a>
										  <!--
										 <button  href="<?php echo get_page_link($page_name_reg).'?&package_id=	'.$row->ID ; ?>" class="cbtn btn-color">Sign Up</button> 
										 -->
										 
										 </div>
									 </li> 
									</ul><?php
								
								$i++;
								}
							}


						?>						
</div>
</div>