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
	
	ul#price-t-5, ul#price-t-5 h2, ul#price-t-5 h3{font-family: 'roboto', sans-serif !important;text-align: center}
	ul#price-t-5 li h2{ font-weight:400 !important; font-size: 20px; line-height:normal !important;text-align: center}
	ul#price-t-5 li h3{ font-weight:100;line-height:normal !important}
	
	ul#price-t-5{text-align:center;width:<?php echo $window_ratio; ?>% !important; position:relative; display:inline-block; margin:0 auto; padding:0; list-style:none; z-index:9; }
ul#price-t-5, ul#price-t-5 h2, ul#price-t-5 a{
  border:none !important;
  text-decoration: none;
}
ul#price-t-5:hover { margin-top:-10px; box-shadow: 5px 0px 30px rgba(0,0,0,0.5);
	-webkit-box-shadow: 5px 0px 30px rgba(0,0,0,0.5);
	-moz-box-shadow: 5px 0px 30px rgba(0,0,0,0.5);  z-index:99;  }
ul#price-t-5:hover ul li{padding:12px 0}
ul#price-t-5 h2 {
	margin:0;
	color:#fff !important;
	padding:10px 0;
	background-color: #16A085 !important;
}
ul#price-t-5 h3 span{ font-size:14px; display:block; font-weight:normal;color:#fff !important; font-family:arial}
ul#price-t-5 h3  {
	color: #fff !important;
	font-size:48px;
	margin:0;	
	text-align:center;padding:10px 0;
	border-top: 1px solid #16A085;
	border-bottom: 1px solid #16A085;
	background-color: #2ABB9B !important;
 }
ul li {
	list-style: none;
}
ul#price-t-5.even ul li.odd{background:#e3e3e3 !important;text-align: center}
ul#price-t-5.even ul li.even{background:#f6f6f6 !important;text-align: center}
ul#price-t-5 ul{ padding:0; margin:0}
ul#price-t-5 ul li{ list-style:none; padding:10px 0; font-family:arial !important; font-size:12px; text-transform:uppercase; color:#444; margin:0;}
ul#price-t-5 ul li.odd{ background:#ebebeb !important;text-align: center}
ul#price-t-5 ul li.even{ background:#ffffff !important;text-align: center}

ul#price-t-5 .submit-btn{
width: 100%;

padding: 10px 0 !important;
float: left;
text-align: center;
border-top: 3px solid #2ABB9B;
border-bottom: none;
background-color: #2ABB9B !important;
background-image: linear-gradient(top, #f6f6f6, #d0d0d0) !important;
filter: progid:DXImageTransform.Microsoft.gradient(startColorstr='#f6f6f6', endColorstr='#d0d0d0') !important;
-ms-filter: progid:DXImageTransform.Microsoft.gradient(startColorstr='#f6f6f6', endColorstr='#d0d0d0') !important;
background: -ms-linear-gradient(top, #f6f6f6, #d0d0d0) !important;
background: -moz-linear-gradient(top, #f6f6f6, #d0d0d0) !important;
background: -o-linear-gradient(top, #f6f6f6, #d0d0d0) !important;
background: -webkit-linear-gradient(top, #f6f6f6, #d0d0d0) !important;
background: -webkit-gradient(linear, left top, left bottom, color-stop(0, #f6f6f6), color-stop(1, #d0d0d0)) !important;
}
ul#price-t-5 li{ padding:0;margin:0;list-style: none}
ul#price-t-5 .submit-btn a{
font-family:arial !important; font-size:14px; text-transform:uppercase;
border-radius: 3px;
-webkit-border-radius: 3px;
-moz-border-radius: 3px;
color:#444;
text-decoration:none;
width: 120px;
padding: 6px 0px 6px 0px !important;
display: block;
text-align: center;
margin-left: auto;
margin-right: auto;
border: 1px solid #2ABB9B;
color:#fff;
text-shadow:none;
background: #2ABB9B; /* background color for non-css3 browsers */
outline: none;
/* gradient */
/* shadow */
box-shadow: 0px 1px 0px rgba(255,255,255,0.5);
-webkit-box-shadow: 0px 1px 0px rgba(255,255,255,0.5);
-moz-box-shadow: 0px 1px 0px rgba(255,255,255,0.5);
}

ul#price-t-5:hover .submit-btn a{
	padding: 6px 0px 6px 0px !important;
	text-shadow: 0px 1px 0px #ffffff; /* text shadow for firefox 3.6+ */ 
	border: 1px solid #2ABB9B;
	color:#fff;
	text-shadow:none;
	background: #2ABB9B; /* background color for non-css3 browsers */
	outline: none;
	/* gradient */
	/* shadow */
	box-shadow: 0px 1px 0px rgba(255,255,255,0.5);
	-webkit-box-shadow: 0px 1px 0px rgba(255,255,255,0.5);
	-moz-box-shadow: 0px 1px 0px rgba(255,255,255,0.5);
	}
	@media (min-width:320px) and (max-width:480px)  {
		ul#price-t-5 .submit-btn a{
			width: 60px;
			font-size: 10px;
		}
		ul#price-t-5 li h2{
			font-size: 14px;
		}
		ul#price-t-5 li h3{
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
									?><ul id="price-t-5" class="<?php echo ($i%2 == 0 ? 'even' : '') ; ?>">	
										<li>									  
										<h2><?php echo strtoupper($row->post_title); ?></h2>
										<h3><?php echo $amount; ?><span><?php echo $recurring_text; ?> </span></h3>
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

