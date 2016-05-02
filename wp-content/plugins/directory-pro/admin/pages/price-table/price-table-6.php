<?php
wp_enqueue_style('wp-iv_directories-piblic-11', wp_iv_directories_URLPATH . 'admin/files/css/iv-bootstrap.css');

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
	$sql="SELECT * FROM $wpdb->posts WHERE post_type = 'iv_directories_pack'  and post_status='draft' ";
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

<link href='http://fonts.googleapis.com/css?family=Roboto:100,400' rel='stylesheet' type='text/css'>
<style>
	
	ul#p6, ul#p6 h2, ul#p6 h3{font-family: 'roboto', sans-serif !important;text-align: center}
	ul#p6 li h2{ font-weight:400 !important;font-size: 20px;line-height:normal !important;text-align: center}
	ul#p6 li h3{ font-weight:100;line-height:normal !important}
	
	ul#p6{text-align:center; width:<?php echo $window_ratio; ?>% !important; position:relative; display:inline-block; margin:0; padding:0; list-style:none; z-index:9; }

ul#p6:hover { margin-top:-10px; box-shadow: 5px 0px 30px rgba(0,0,0,0.5);
	-webkit-box-shadow: 5px 0px 30px rgba(0,0,0,0.5);
	-moz-box-shadow: 5px 0px 30px rgba(0,0,0,0.5);  z-index:99;  }
ul#p6:hover ul li{padding:12px 0}
ul#p6 h2 {
	margin:0;
color:#fff !important;
padding:10px 0;
border-bottom: 1px solid #a7384f;
background-color: #222 !important;
background-image: linear-gradient(top, #a7384f, #7c293a) !important;
filter: progid:DXImageTransform.Microsoft.gradient(startColorstr='#a7384f', endColorstr='#7c293a') !important;
-ms-filter: progid:DXImageTransform.Microsoft.gradient(startColorstr='#a7384f', endColorstr='#7c293a') !important;
background: -ms-linear-gradient(top, #a7384f, #7c293a) !important;
background: -moz-linear-gradient(top, #a7384f, #7c293a) !important;
background: -o-linear-gradient(top, #a7384f, #7c293a) !important;
background: -webkit-linear-gradient(top, #a7384f, #7c293a) !important;
background: -webkit-gradient(linear, left top, left bottom, color-stop(0, #a7384f), color-stop(1, #7c293a)) !important;
}
ul#p6 h3 span{ font-size:14px; display:block; font-weight:normal;color:#fff !important; font-family:arial}
ul#p6 h3  {
	color: #fff !important;
	font-size:48px;
	margin:0;
	
text-align:center;padding:10px 0;
border-top: 1px solid #9f354b;
border-bottom: 1px solid #9f354b;
background-color: #353535 !important;
background-image: linear-gradient(top, #9f354b, #7b2839) !important;
filter: progid:DXImageTransform.Microsoft.gradient(startColorstr='#9f354b', endColorstr='#7b2839') !important;
-ms-filter: progid:DXImageTransform.Microsoft.gradient(startColorstr='#9f354b', endColorstr='#7b2839') !important;
background: -ms-linear-gradient(top, #9f354b, #7b2839) !important;
background: -moz-linear-gradient(top, #9f354b, #7b2839) !important;
background: -o-linear-gradient(top, #9f354b, #7b2839) !important;
background: -webkit-linear-gradient(top, #9f354b, #7b2839) !important;
background: -webkit-gradient(linear, left top, left bottom, color-stop(0, #9f354b), color-stop(1, #7b2839)) !important;
}

ul#p6.even ul li.odd{background:#e3e3e3 !important;text-align: center}
ul#p6.even ul li.even{background:#f6f6f6 !important;text-align: center}
ul#p6 ul{ padding:0; margin:0}
ul#p6 ul li{ list-style:none; padding:10px 0; font-family:arial !important; font-size:12px; text-transform:uppercase; color:#444; margin:0;}
ul#p6 ul li.odd{ background:#ebebeb !important;text-align: center}
ul#p6 ul li.even{ background:#ffffff !important;text-align: center}

ul#p6 .submit-btn{
width: 100%;

padding: 10px 0 !important;
float: left;
text-align: center;
border-top: 1px solid #d3d3d3;
border-bottom: none;
background-color: #e2e2e2 !important;
background-image: linear-gradient(top, #f6f6f6, #d0d0d0) !important;
filter: progid:DXImageTransform.Microsoft.gradient(startColorstr='#f6f6f6', endColorstr='#d0d0d0') !important;
-ms-filter: progid:DXImageTransform.Microsoft.gradient(startColorstr='#f6f6f6', endColorstr='#d0d0d0') !important;
background: -ms-linear-gradient(top, #f6f6f6, #d0d0d0) !important;
background: -moz-linear-gradient(top, #f6f6f6, #d0d0d0) !important;
background: -o-linear-gradient(top, #f6f6f6, #d0d0d0) !important;
background: -webkit-linear-gradient(top, #f6f6f6, #d0d0d0) !important;
background: -webkit-gradient(linear, left top, left bottom, color-stop(0, #f6f6f6), color-stop(1, #d0d0d0)) !important;
}
ul#p6 li{ padding:0;margin:0;list-style: none}
ul#p6 .submit-btn a{
	font-family:arial !important; font-size:14px; text-transform:uppercase;
	font-weight: 700;
	border-radius: 3px;
-webkit-border-radius: 3px;
-moz-border-radius: 3px;
color:#a7384f;
text-decoration:none;
width: 120px;

padding: 6px 0px 6px 0px !important;
display: block;
text-align: center;
margin-left: auto;
margin-right: auto;
text-shadow: 0px 1px 0px #ffffff;
border: 1px solid #a7384f;
background-color: #d8d8d8;
outline: none;
background-image: linear-gradient(top, #ffffff, #efefef 1px, #d8d8d8);
filter: progid:DXImageTransform.Microsoft.gradient(startColorstr='#efefef', endColorstr='#d8d8d8');
-ms-filter: progid:DXImageTransform.Microsoft.gradient(startColorstr='#efefef', endColorstr='#d8d8d8');
background: -ms-linear-gradient(top, #ffffff, #efefef 1px, #d8d8d8);
background: -moz-linear-gradient(top, #ffffff, #efefef 1px, #d8d8d8);
background: -o-linear-gradient(top, #ffffff, #efefef 1px, #d8d8d8);
background: -webkit-linear-gradient(top, #ffffff, #efefef 1px, #d8d8d8);
background: -webkit-gradient(linear, left top, left bottom, color-stop(0, #ffffff), color-stop(0.05, #efefef), color-stop(1, #d8d8d8));
box-shadow: none
}

ul#p6:hover .submit-btn a{

	padding: 6px 0px 6px 0px !important;
	text-shadow: none; /* text shadow for firefox 3.6+ */ 
	border: 1px solid #a7384f;
	background-color: #a7384f; /* background color for non-css3 browsers */
	outline: none;
	color: #fff;
	/* gradient */
	background-image: linear-gradient(top, #a7384f, #7c293a 1px, #7c293a); /* W3C */
	filter: progid:DXImageTransform.Microsoft.gradient(startColorstr='#7c293a', endColorstr='#7c293a'); /* IE5.5 - 7 */
	-ms-filter: progid:DXImageTransform.Microsoft.gradient(startColorstr='#7c293a', endColorstr='#7c293a'); /* IE8 */
	background: -ms-linear-gradient(top, #a7384f, #7c293a 1px, #7c293a); /* IE9 */
	background: -moz-linear-gradient(top, #a7384f, #7c293a 1px, #7c293a); /* Firefox */ 
	background: -o-linear-gradient(top, #a7384f, #7c293a 1px, #7c293a); /* Opera 11  */
	background: -webkit-linear-gradient(top, #a7384f, #7c293a 1px, #7c293a); /* Chrome 11  */
	background: -webkit-gradient(linear, left top, left bottom, color-stop(0, #a7384f), color-stop(1, #7c293a)); /* Chrome 10, Safari */
	/* shadow */
	box-shadow: none;
	}
	@media (min-width:320px) and (max-width:480px)  {
		ul#p6 .submit-btn a{
			width: 60px;
			font-size: 10px;
		}
		ul#p6 li h2{
			font-size: 14px;
		}
		ul#p6 li h3{
			font-size: 25px
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
									?><ul id="p6" class="<?php echo ($i%2 == 0 ? 'even' : '') ; ?>">	
										<li>									  
										<h2><?php echo strtoupper($row->post_title); ?></h2>
										<h3><?php echo $amount; ?> <span><?php echo $recurring_text; ?> </span></h3>
										<ul>
											<?php
												$row->post_content;
												$ii=0;
												$feature_all = explode("\n", $row->post_content);
												//print_r($feature_all);
												$last_li_no=sizeof($feature_all);
												foreach($feature_all as $feature){
													if(trim($feature)!=""){
														echo '<li class=" '.($ii == 0 ? 'first' : ''). ($ii == $last_li_no ? 'last' : ''). ($ii %2== 0 ? ' even' : ' odd').'">'.$feature.'</li>';
													
													$ii++;
													}												
												
												}
												
												if($feature_max > $ii){
													while ($ii < $feature_max) {
														echo '<li class=" '.($ii == 0 ? 'first' : ''). ($ii == $feature_max ? 'last' : ''). ($ii %2== 0 ? ' even' : ' odd').'">&nbsp; </li>';
													 $ii++;	
													}
												}
												
											?>										  
										</ul>
										<div class="submit-btn"> <a href="<?php echo get_page_link($page_name_reg).'?&package_id=	'.$row->ID ; ?>">Sign up</a> </div>
									 </li> 
									</ul><?php
								$i++;
								}
							}


						?>						

</div>
</div>
