<?php
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
<link href="//maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet">

<link href='http://fonts.googleapis.com/css?family=Roboto:100,400' rel='stylesheet' type='text/css'>
<style>
ul#pt-3, ul#pt-3 h2, ul#pt-3 h3{font-family: 'roboto', sans-serif !important;text-align: center}
  ul#pt-3 li h2{ font-weight:700 !important; font-family: 'roboto',sans-serif !important;line-height:normal !important;text-align: center}
  ul#pt-3 li h3{ font-weight:700;font-family: 'roboto',sans-serif !important;line-height:normal !important}
  ul#pt-1 li h2,ul#pt-2 li h2,ul#pt-3 li h2,ul#pt-4 li h2{font-size: 20px}
  ul#pt-3{text-align:center;width:<?php echo $window_ratio; ?>% !important; position:relative; display:inline-block; margin:0; padding:0; list-style:none; z-index:9; }
ul#pt-1 a, ul#pt-2 a, ul#pt-3 a, ul#pt-4 a{
  border:none !important;
  text-decoration: none;
}
ul#pt-3 h2 {
  margin:0;
color:#fff !important;
  padding:10px 0;
border-bottom: 1px solid #fb8267;
background-color: #fb8267 !important;
}
ul#pt-3 h3 span{ font-size:14px; display:block; font-weight:normal;color:#fff !important; font-family:arial}
ul#pt-3 h3  {
  color: #fff!important;
  font-size:48px;
  margin:0;
  
text-align:center;padding:10px 0;
border-top: 1px solid #fb8267;
border-bottom: 1px solid #fb8267;
background-color: #fb8267 !important;
}
ul#pt-3:hover ul li.odd{ background: #fb8267 !important;color:#fff;}
ul#pt-3 ul li.odd{background:#e3e3e3 !important;text-align: center}
ul#pt-3 ul li.even{background:#f6f6f6 !important;text-align: center}
ul#pt-3:hover ul li.even{background:#F59E8A !important;color: #fff}

ul#pt-3 ul{ padding:0; margin:0}
ul#pt-3 ul li{ list-style:none; padding:10px 0; font-family:arial !important; font-size:12px; text-transform:uppercase; color:#444; margin:0;}
ul#pt-3 ul li.odd{ background:#fff !important;text-align: center}
ul#pt-3 ul li.even{ background:#e1e1e1 !important;text-align: center}
ul#pt-3:hover .submit-btn{
  background-color: #fb8267 !important;
  border-top: 1px solid #fff;
  }

ul#pt-3 li{ padding:0;margin:0;list-style: none}
ul#pt-3 .submit-btn a{
      width: 130px;
    
    display: block; 
     font-size: 24px;
   font-family:arial !important; 
    text-transform:uppercase;
   border-radius: 3px;
 -webkit-border-radius: 3px;
 -moz-border-radius: 3px;
 color:#fff;
 text-decoration:none;

 padding: 10px 0px 10px 0px !important;
 display: block;
 text-align: center;
 margin-left: auto;
 margin-right: auto;
 background-color: #fb8267;
 outline: none;
 
}
  ul#pt-3 .submit-btn,
  ul#pt-2 .submit-btn,
  ul#pt-4 .submit-btn,
  ul#pt-1 .submit-btn{
  width: 100%;
  padding: 10px 0 !important;
  float: left;
  text-align: center;
  border-bottom: none;
  background-color: transparent !important;
    border-bottom-right-radius: 3px;
    border-bottom-left-radius: 3px; 
  }
ul#pt-1 :hover .submit-btn a{
     width: 130px;
    
    display: block; 
     font-size: 24px;
 padding: 10px 0px 10px 0px !important;
 text-shadow: none; /* text shadow for firefox 3.6+ */ 
 border: 1px solid #fb8267;
 color: #fff;
 background-color: #transparent; /* background color for non-css3 browsers */
 outline: none;
 /* gradient */
  }
ul#pt-2, ul#pt-2 h2, ul#pt-2 h3{font-family: 'roboto', sans-serif !important;text-align: center}
  ul#pt-2 li h2{ font-weight:700 !important; line-height:normal !important;text-align: center}
  ul#pt-2 li h3{ font-weight:700;line-height:normal !important;font-family: 'roboto',sans-serif !important;}
  
  ul#pt-2{text-align:center; width:<?php echo $window_ratio; ?>% !important; position:relative; display:inline-block; margin:0; padding:0; list-style:none; z-index:9; }

ul#pt-2 h2 {
margin:0;
color:#fff !important;
padding:10px 0;
border-bottom: 1px solid #F0CA38;
background-color: #F0CA38 !important;
}
ul#pt-2 h3 span{ font-size:14px; display:block; font-weight:normal;color:#fff !important; font-family:arial}
ul#pt-2 h3  {
  color: #fff!important;
  font-size:48px;
  margin:0;
  
text-align:center;padding:10px 0;
border-top: 1px solid #F0CA38;
border-bottom: 1px solid #F0CA38;
background-color: #F0CA38 !important;
}
ul#pt-2:hover ul li.odd{ background: #F0CA38 !important;color:#fff;}
ul#pt-2 ul li.even{background:#f6f6f6 !important;text-align: center}
ul#pt-2 ul li.odd{background:#e3e3e3 !important;text-align: center}
ul#pt-2:hover ul li.even{background:#F7D038 !important;color: #fff}

ul#pt-2 ul{ padding:0; margin:0}
ul#pt-2 ul li{ list-style:none; padding:10px 0; font-family:arial !important; font-size:12px; text-transform:uppercase; color:#444; margin:0;}
ul#pt-2 ul li.odd{ background:#fff !important;text-align: center}
ul#pt-2 ul li.even{ background:#f1f1f1 !important;text-align: center}
ul#pt-2:hover .submit-btn{
  background-color: #F0CA38 !important;
  border-top: 1px solid #fff; 
   }

ul#pt-2 li{ padding:0;margin:0;list-style: none}
ul#pt-2 .submit-btn a{
  width: 130px;
  
  display: block; 
   font-size: 24px;
  font-family:arial !important; text-transform:uppercase;
  border-radius: 3px;
-webkit-border-radius: 3px;
-moz-border-radius: 3px;
color:#fff;
text-decoration:none;
padding: 10px 0px 10px 0px !important;
display: block;
text-align: center;
margin-left: auto;
margin-right: auto;
background-color: #F0CA38;
outline: none;


}

ul#pt-2:hover .submit-btn a{
  width: 130px;
  
  display: block; 
   font-size: 24px;
  padding: 10px 0px 10px 0px !important;
  text-shadow: none; /* text shadow for firefox 3.6+ */ 
  border: 1px solid #F0CA38;
  color: #fff;
  background-color: #F0CA38; /* background color for non-css3 browsers */
  outline: none;
  }

ul#pt-4, ul#pt-4 h2, ul#pt-4 h3{font-family: 'roboto', sans-serif !important;text-align: center}
  ul#pt-4 li h2{ font-weight:700 !important; line-height:normal !important;text-align: center}
  ul#pt-4 li h3{ font-weight:700;line-height:normal !important}
  
  ul#pt-4{text-align:center;width:<?php echo $window_ratio; ?>% !important; position:relative; display:inline-block; margin:0; padding:0; list-style:none; z-index:9; }
ul#pt-4 h2 {
  margin:0;
  border-top-right-radius: 5px; 
color:#fff !important;
  padding:10px 0;
border-bottom: 1px solid #c44767;
background-color: #c44767 !important;
}
ul#pt-4 h3 span{ font-size:14px; display:block; font-weight:normal;color:#fff !important; font-family:arial}
ul#pt-4 h3  {
  color: #fff!important;
  font-size:48px;
  margin:0;
  
text-align:center;padding:10px 0;
border-top: 1px solid #c44767;
border-bottom: 1px solid #c44767;
background-color: #c44767 !important;
}
ul#pt-4:hover ul li.odd{ background: #c44767 !important;color:#fff;}
ul#pt-4 ul li.even{background:#e3e3e3 !important;text-align: center}
ul#pt-4 ul li.odd{background:#f6f6f6 !important;text-align: center}
ul#pt-4:hover ul li.even{background:#DA4D71 !important;color: #fff}

ul#pt-4 ul{ padding:0; margin:0}
ul#pt-4 ul li{ list-style:none; padding:10px 0; font-family:arial !important; font-size:12px; text-transform:uppercase; color:#444; margin:0;}
ul#pt-4 ul li.odd{ background:#fff !important;text-align: center}
ul#pt-4 ul li.even{ background:#f1f1f1!important;text-align: center}
ul#pt-4:hover .submit-btn{
  background-color: #c44767 !important;
  border-top: 1px solid #fff;
  }

ul#pt-4 li{ padding:0;margin:0;list-style: none;}
ul#pt-4 .submit-btn a{    width: 130px;
    
    display: block; 
     padding: 10px 0px 10px 0px !important;
     font-size: 24px;
   font-family:arial !important;  text-transform:uppercase;
   border-radius: 3px;
 -webkit-border-radius: 3px;
 -moz-border-radius: 3px;
 color:#fff;
 text-decoration:none;

 display: block;
 text-align: center;
 margin-left: auto;
 margin-right: auto;
 background-color: #c44767;
 outline: none;
 box-shadow: none;
}

ul#pt-4:hover .submit-btn a{
    width: 130px;
    
    display: block; 
     font-size: 24px;
     padding: 10px 0px 10px 0px !important;
 text-shadow: none; /* text shadow for firefox 3.6+ */ 
 border: 1px solid rgba(0,0,0,0);
 color: #fff;
 background-color: #transparent; /* background color for non-css3 browsers */
 outline: none;
 /* gradient */
 background: transparent; /* IE9 */
 /* shadow */
 box-shadow: none;
}
  ul#pt-1 , ul#pt-1  h2, ul#pt-1  h3{font-family: 'roboto', sans-serif !important;text-align: center}
    ul#pt-1  li h2{ font-weight:700 !important; line-height:normal !important;text-align: center}
    ul#pt-1 li h3{ font-weight:700;line-height:normal !important}
    
    ul#pt-1{text-align:center;width:<?php echo $window_ratio; ?>% !important; position:relative; display:inline-block; margin:0; padding:0; list-style:none; z-index:9; }

  ul#pt-1 h2 {
    margin:0;
  color:#fff !important;
    padding:10px 0;
  border-bottom: 1px solid #bfc946;
  background-color: #bfc946 !important;
    }
  ul#pt-1 h3 span{ font-size:14px; display:block; font-weight:normal;color:#fff !important; font-family:arial}
  ul#pt-1 h3  {
    color: #fff!important;
    font-size:48px;
    margin:0;
    
  text-align:center;padding:10px 0;
  border-top: 1px solid #bfc946;
  border-bottom: 1px solid #bfc946;
  background-color: #bfc946 !important;
    }
  ul#pt-1:hover ul li.odd{ background: #bfc946 !important;color:#fff;}
  ul#pt-1 ul li.odd{background:#e3e3e3 !important;text-align: center}
  ul#pt-1 ul li.even{background:#f6f6f6 !important;text-align: center}
  ul#pt-1:hover ul li.even{background:#D0DA53 !important;color: #fff}

  ul#pt-1 ul{ padding:0; margin:0}
  ul#pt-1 ul li{ list-style:none; padding:10px 0; font-family:arial !important; font-size:12px; text-transform:uppercase; color:#444; margin:0;}
  ul#pt-1 ul li.odd{ background:#ffffff !important;text-align: center}
  ul#pt-1 ul li.even{ background:#e1e1e1 !important;text-align: center}
  ul#pt-1:hover .submit-btn{
    background-color: #bfc946 !important;
    border-top: 1px solid #fff;
    }

  ul#pt-1 li{ padding:0;margin:0;list-style: none}
  ul#pt-1 .submit-btn a{
    width: 130px;
    
    display: block; 
     font-size: 24px;
     padding: 10px 0px 10px 0px !important;
    font-family:arial !important; text-transform:uppercase;
   border-radius: 3px;
 -webkit-border-radius: 3px;
 -moz-border-radius: 3px;
 color:#fff;
 text-decoration:none;
 display: block;
 text-align: center;
 margin-left: auto;
 margin-right: auto;
 background-color: #bfc946;
 outline: none;
  }

  ul#pt-1:hover .submit-btn a{
    width: 130px;
    
    display: block; 
     padding: 10px 0px 10px 0px !important;
     font-size: 24px;

  text-shadow: none; /* text shadow for firefox 3.6+ */ 
  border: 1px solid rgba(0,0,0,0);
  color: #fff;
  background-color: #transparent; /* background color for non-css3 browsers */
  outline: none;
 
  background: transparent; /* IE9 */
  /* shadow */
  box-shadow:none;
  }
  .text-center{
  text-align: center;
 }
  @media (min-width: 320px) and (max-width: 480px){
  ul#pt-1 ul li,
   ul#pt-2 ul li,
   ul#pt-3 ul li,
   ul#pt-4 ul li{
    font-size: 10px;
  }
  ul#pt-1 .submit-btn a,
    ul#pt-2 .submit-btn a,
    ul#pt-3 .submit-btn a,
    ul#pt-4 .submit-btn a{
    font-size: 8px;
    width:60px;
  }
  ul#pt-1  h2,
    ul#pt-2  h2,
    ul#pt-3  h2,
    ul#pt-4  h2{
    font-size: 15px;
  }
    ul#pt-1  h3,
    ul#pt-2  h3,
    ul#pt-3  h3,
    ul#pt-4  h3{
    font-size: 20px;
  }
  ul#pt-1:hover .submit-btn a,
 ul#pt-2:hover .submit-btn a,
 ul#pt-3:hover .submit-btn a,
 ul#pt-4:hover .submit-btn a{
    width: 60px;
    font-size: 10px;

 }
  ul#pt-1 .submit-btn a,
   ul#pt-2 .submit-btn a,
   ul#pt-3 .submit-btn a,
   ul#pt-4 .submit-btn a{
    height: 23px;
  }
 }
  .wrapper{
    width: 100%;
  }
</style>


<div class="wrapper">
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
								$pt=0;
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
												
									if($i>3){
										$pt=0;
									}
									$pt++;
									?><ul id="pt-<?php echo $pt;?>" >
										<li>
											<h2><?php echo strtoupper($row->post_title); ?></h2>
											<h3><?php echo $amount; ?><span><?php echo $recurring_text; ?></span></h3>
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

