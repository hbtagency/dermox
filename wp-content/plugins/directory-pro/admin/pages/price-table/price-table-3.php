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
<style>
ul#pt1, ul#pt1 h2, ul#pt1 h3{font-family: 'roboto', sans-serif !important;text-align: center}
  ul#pt1 li h2{ font-weight:700 !important; font-family: 'roboto',sans-serif !important;line-height:normal !important;text-align: center}
  ul#pt1 li h3{ font-weight:700;font-family: 'roboto',sans-serif !important;line-height:normal !important}
  
  ul#pt1{text-align:center;width:<?php echo $window_ratio; ?>% !important; position:relative; display:inline-block; margin:0; padding:0; list-style:none; z-index:9; }
ul#pt1 a, ul#pt2 a, ul#pt3 a, ul#pt4 a{
  border:none !important;
  text-decoration: none;
}
ul#pt1 h2,ul#pt2 h2,ul#pt3 h2,ul#pt4 h2{
  font-size: 20px;
  word-wrap:break-word;
}
ul#pt1 h2 {
  margin:0;
color:#fff !important;
  padding:10px 0;
border-bottom: 1px solid #749934;
background-color: #03A678 !important;
background-image: linear-gradient(top, #afc457,  #90ad42) !important;
filter: progid:DXImageTransform.Microsoft.gradient(startColorstr='#afc457', endColorstr='#90ad42') !important;
-ms-filter: progid:DXImageTransform.Microsoft.gradient(startColorstr='#afc457', endColorstr='#90ad42') !important;
background: -ms-linear-gradient(top, #afc457,#90ad42) !important;
background: -moz-linear-gradient(top, #afc457,#90ad42) !important;
background: -o-linear-gradient(top, #afc457, #90ad42) !important;
background: -webkit-linear-gradient(top, #afc457, #90ad42) !important;
background: -webkit-gradient(linear, left top, left bottom, color-stop(0, #afc457), color-stop(1, #90ad42)) !important;
border-top-left-radius: 3px; 
}
ul#pt1 h3 span{ font-size:14px; display:block; font-weight:normal;color:#fff !important; font-family:arial}
ul#pt1 h3  {
  color: #fff!important;
  font-size:35px;
  margin:0;
  
text-align:center;padding:10px 0;
border-top: 1px solid #cbd877;
border-bottom: 1px solid #afc457;
background-color: #afc457 !important;
background-image: linear-gradient(top, #afc457, #90ad42) !important;
filter: progid:DXImageTransform.Microsoft.gradient(startColorstr='#afc457', endColorstr='#90ad42') !important;
-ms-filter: progid:DXImageTransform.Microsoft.gradient(startColorstr='#afc457', endColorstr='#90ad42') !important;
background: -ms-linear-gradient(top, #afc457, #90ad42) !important;
background: -moz-linear-gradient(top, #afc457, #90ad42) !important;
background: -o-linear-gradient(top, #afc457, #90ad42) !important;
background: -webkit-linear-gradient(top, #afc457, #9017342) !important;
background: -webkit-gradient(linear, left top, left bottom, color-stop(0, #afc457), color-stop(1, #90ad42)) !important;
}
ul#pt1:hover ul li.odd{ background: #90ad42 !important;color:#fff;}
ul#pt1 ul li.odd{background:#e3e3e3 !important}
ul#pt1 ul li.even{background:#f6f6f6 !important}
ul#pt1:hover ul li.even{background:rgba(144, 173, 66,.8) !important;color: #fff}

ul#pt1 ul{ padding:0; margin:0}
ul#pt1 ul li{ list-style:none; padding:10px 0; font-family:arial !important; font-size:12px; text-transform:uppercase; color:#444; margin:0;}
ul#pt1 ul li.odd{ background:#fff !important;text-align: center;}
ul#pt1 ul li.even{ background:#e1e1e1 !important;text-align: center}
ul#pt1:hover .submit-btn{
  background-color: #e2e2e2 !important;
  background-image: linear-gradient(top, #afc457, #90ad42) !important;
  filter: progid:DXImageTransform.Microsoft.gradient(startColorstr='#afc457', endColorstr='#90ad42') !important;
  -ms-filter: progid:DXImageTransform.Microsoft.gradient(startColorstr='#afc457', endColorstr='#90ad42') !important;
  background: -ms-linear-gradient(top, #afc457, #90ad42) !important;
  background: -moz-linear-gradient(top, #afc457, #90ad42) !important;
  background: -o-linear-gradient(top, #afc457, #90ad42) !important;
  background: -webkit-linear-gradient(top, #afc457, #90ad42) !important;
  background: -webkit-gradient(linear, left top, left bottom, color-stop(0, #afc457), color-stop(1, #90ad42)) !important;
  }

ul#pt1 .submit-btn{
  width: 100%;
padding: 10px 0 !important;
float: left;
text-align: center;
border-bottom: none;
background-color: transparent !important;
border-bottom-right-radius: 3px;
border-bottom-left-radius: 3px; 
box-shadow: none;
}
ul#pt1 li{ padding:0;margin:0;list-style: none}
ul#pt1 .submit-btn a{
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
box-shadow: none;
 padding: 10px 0px 10px 0px !important;
 display: block;
 text-align: center;
 margin-left: auto;
 margin-right: auto;
 background-color: #90ad42;
 outline: none;
 background-image: linear-gradient(top, #afc457, #efefef 1px, #90ad42);
 filter: progid:DXImageTransform.Microsoft.gradient(startColorstr='#afc457', endColorstr='#90ad42');
 -ms-filter: progid:DXImageTransform.Microsoft.gradient(startColorstr='#afc457', endColorstr='#90ad42');
 background: -ms-linear-gradient(left top, left bottom, #afc457, #efefef 1px, #90ad42);
 background: -moz-linear-gradient(left top, left bottom, #afc457, #efefef 1px, #90ad42);
 background: -o-linear-gradient(left top, left bottom, #afc457, #efefef 1px, #90ad42);
 background: -webkit-linear-gradient(left top, left bottom, #afc457, #efefef 1px, #90ad42);
 background: -webkit-gradient(linear, left top, left bottom, color-stop(0, #afc457), color-stop(1, #90ad42));

 font-weight: bold;
 box-sizing: content-box;
 -moz-box-sizing: content-box;
 -webkit-box-sizing: content-box;
 
}

ul#pt1:hover .submit-btn a{
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
 box-shadow:none;
 }
ul#pt2, ul#pt2 h2, ul#pt2 h3{font-family: 'roboto', sans-serif !important;text-align: center}
  ul#pt2 li h2{ font-weight:700 !important; line-height:normal !important}
  ul#pt2 li h3{ font-weight:700;line-height:normal !important;font-family: 'roboto',sans-serif !important;}
  
  ul#pt2{text-align:center;width:<?php echo $window_ratio; ?>% !important; position:relative; display:inline-block; margin:0; padding:0; list-style:none; z-index:9; }

ul#pt2 h2 {
margin:0;
color:#fff !important;
padding:10px 0;
border-bottom: 1px solid #4c7532;
background-color: #03A678 !important;
background-image: linear-gradient(top, #7ead50,  #5f8d3d) !important;
filter: progid:DXImageTransform.Microsoft.gradient(startColorstr='#7ead50', endColorstr='#5f8d3d') !important;
-ms-filter: progid:DXImageTransform.Microsoft.gradient(startColorstr='#7ead50', endColorstr='#5f8d3d') !important;
background: -ms-linear-gradient(top, #7ead50,#5f8d3d) !important;
background: -moz-linear-gradient(top, #7ead50,#5f8d3d) !important;
background: -o-linear-gradient(top, #7ead50, #5f8d3d) !important;
background: -webkit-linear-gradient(top, #7ead50, #5f8d3d) !important;
background: -webkit-gradient(linear, left top, left bottom, color-stop(0, #7ead50), color-stop(1, #5f8d3d)) !important;
}
ul#pt2 h3 span{ font-size:14px; display:block; font-weight:normal;color:#fff !important; font-family:arial}
ul#pt2 h3  {
  color: #fff!important;
  font-size:35px;
  margin:0;
  
text-align:center;padding:10px 0;
border-top: 1px solid #a5ca6d;
border-bottom: 1px solid #7ead50;
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
ul#pt2:hover ul li.odd{ background: #7ead50 !important;color:#fff;}
ul#pt2 ul li.even{background:#f6f6f6 !important}
ul#pt2 ul li.odd{background:#e3e3e3 !important}
ul#pt2:hover ul li.even{background:rgba(126, 173, 80,.8) !important;color: #fff}

ul#pt2 ul{ padding:0; margin:0}
ul#pt2 ul li{ list-style:none; padding:10px 0; font-family:arial !important; font-size:12px; text-transform:uppercase; color:#444; margin:0;}
ul#pt2 ul li.odd{ background:#fff !important;text-align: center}
ul#pt2 ul li.even{ background:#f1f1f1 !important;text-align: center}
ul#pt2:hover .submit-btn{
  background-color: #e2e2e2 !important;
  background-image: linear-gradient(top, #7ead50, #5f8d3d) !important;
  filter: progid:DXImageTransform.Microsoft.gradient(startColorstr='#7ead50', endColorstr='#5f8d3d') !important;
  -ms-filter: progid:DXImageTransform.Microsoft.gradient(startColorstr='#7ead50', endColorstr='#5f8d3d') !important;
  background: -ms-linear-gradient(top, #7ead50, #5f8d3d) !important;
  background: -moz-linear-gradient(top, #7ead50, #5f8d3d) !important;
  background: -o-linear-gradient(top, #7ead50, #5f8d3d) !important;
  background: -webkit-linear-gradient(top, #7ead50, #5f8d3d) !important;
  background: -webkit-gradient(linear, left top, left bottom, color-stop(0, #7ead50), color-stop(1, #5f8d3d)) !important;
  }

ul#pt2 .submit-btn{
width: 100%;
padding: 10px 0 !important;
float: left;
text-align: center;
border-bottom: none;
background-color: #transparent !important;
border-bottom-right-radius: 3px;
border-bottom-left-radius: 3px; 
}
ul#pt2 li{ padding:0;margin:0;list-style: none}
ul#pt2 .submit-btn a{
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
background-color: #5f8d3d;
outline: none;
background-image: linear-gradient(left top, left bottom, #7ead50, #efefef 1px, #5f8d3d);
filter: progid:DXImageTransform.Microsoft.gradient(startColorstr='#7ead50', endColorstr='#5f8d3d');
-ms-filter: progid:DXImageTransform.Microsoft.gradient(startColorstr='#7ead50', endColorstr='#5f8d3d');
background: -ms-linear-gradient(left top, left bottom, #7ead50, #efefef 1px, #5f8d3d);
background: -moz-linear-gradient(left top, left bottom, #7ead50, #efefef 1px, #5f8d3d);
background: -o-linear-gradient(left top, left bottom, #7ead50, #efefef 1px, #5f8d3d);
background: -webkit-linear-gradient(left top, left bottom, #7ead50, #efefef 1px, #5f8d3d);
background: -webkit-gradient(linear, left top, left bottom, color-stop(0, #7ead50), color-stop(1, #5f8d3d));
box-shadow: 0px 1px 0px rgba(255,255,255,0.5);
-webkit-box-shadow: 0px 1px 0px rgba(255,255,255,0.5);
-moz-box-shadow: 0px 1px 0px rgba(255,255,255,0.5);
font-weight: bold;
box-sizing: content-box;
-moz-box-sizing: content-box;
-webkit-box-sizing: content-box;
}

ul#pt2:hover .submit-btn a{
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
  box-shadow:none;
  }

ul#pt4, ul#pt4 h2, ul#pt4 h3{font-family: 'roboto', sans-serif !important;text-align: center}
  ul#pt4 li h2{ font-weight:700 !important; line-height:normal !important}
  ul#pt4 li h3{ font-weight:700;line-height:normal !important}
  
  ul#pt4{text-align:center;width:<?php echo $window_ratio; ?>% !important; position:relative; display:inline-block; margin:0; padding:0; list-style:none; z-index:9; }
ul#pt4 h2 {
  margin:0;
  border-top-right-radius: 5px; 
color:#fff !important;
  padding:10px 0;
border-bottom: 1px solid #0b4a46;
background-color: #147e78 !important;
background-image: linear-gradient(top, #147e78,  #0e5d58) !important;
filter: progid:DXImageTransform.Microsoft.gradient(startColorstr='#147e78', endColorstr='#0e5d58') !important;
-ms-filter: progid:DXImageTransform.Microsoft.gradient(startColorstr='#147e78', endColorstr='#0e5d58') !important;
background: -ms-linear-gradient(top, #147e78,#0e5d58) !important;
background: -moz-linear-gradient(top, #147e78,#0e5d58) !important;
background: -o-linear-gradient(top, #147e78, #0e5d58) !important;
background: -webkit-linear-gradient(top, #147e78, #0e5d58) !important;
background: -webkit-gradient(linear, left top, left bottom, color-stop(0, #147e78), color-stop(1, #0e5d58)) !important;
}
ul#pt4 h3 span{ font-size:14px; display:block; font-weight:normal;color:#fff !important; font-family:arial}
ul#pt4 h3  {
  color: #fff!important;
  font-size:35px;
  margin:0;
  
text-align:center;padding:10px 0;
border-top: 1px solid #199f98;
border-bottom: 1px solid #147e78;
background-color: #147e78 !important;
background-image: linear-gradient(top, #147e78, #0e5d58) !important;
filter: progid:DXImageTransform.Microsoft.gradient(startColorstr='#147e78', endColorstr='#0e5d58') !important;
-ms-filter: progid:DXImageTransform.Microsoft.gradient(startColorstr='#147e78', endColorstr='#0e5d58') !important;
background: -ms-linear-gradient(top, #147e78, #0e5d58) !important;
background: -moz-linear-gradient(top, #147e78, #0e5d58) !important;
background: -o-linear-gradient(top, #147e78, #0e5d58) !important;
background: -webkit-linear-gradient(top, #147e78, #0e5d58) !important;
background: -webkit-gradient(linear, left top, left bottom, color-stop(0, #147e78), color-stop(1, #0e5d58)) !important;
}
ul#pt4:hover ul li.odd{ background: #148079 !important;color:#fff;}
ul#pt4 ul li.even{background:#e3e3e3 !important;text-align: center}
ul#pt4 ul li.odd{background:#f6f6f6 !important;text-align: center}
ul#pt4:hover ul li.even{background:rgba(20, 128, 121,.8) !important;color: #fff}

ul#pt4 ul{ padding:0; margin:0}
ul#pt4 ul li{ list-style:none; padding:10px 0; font-family:arial !important; font-size:12px; text-transform:uppercase; color:#444; margin:0;}
ul#pt4 ul li.odd{ background:#fff !important;text-align: center}
ul#pt4 ul li.even{ background:#f1f1f1!important;text-align: center}
ul#pt4:hover .submit-btn{
  background-color: #147e78 !important;
  background-image: linear-gradient(top, #147e78, #0e5d58) !important;
  filter: progid:DXImageTransform.Microsoft.gradient(startColorstr='#147e78', endColorstr='#0e5d58') !important;
  -ms-filter: progid:DXImageTransform.Microsoft.gradient(startColorstr='#147e78', endColorstr='#0e5d58') !important;
  background: -ms-linear-gradient(top, #147e78, #0e5d58) !important;
  background: -moz-linear-gradient(top, #147e78, #0e5d58) !important;
  background: -o-linear-gradient(top, #147e78, #0e5d58) !important;
  background: -webkit-linear-gradient(top, #147e78, #0e5d58) !important;
  background: -webkit-gradient(linear, left top, left bottom, color-stop(0, #147e78), color-stop(1, #0e5d58)) !important;
  }

ul#pt4 .submit-btn{
width: 100%;
border-bottom-right-radius: 5px;
padding: 10px 0 !important;
float: left;
text-align: center;
border-bottom: none;
background-color: transparent !important;
  border-bottom-right-radius: 3px;
    border-bottom-left-radius: 3px; 
}
ul#pt4 li{ padding:0;margin:0;list-style: none}
ul#pt4 .submit-btn a{    width: 130px;
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
 background-color: #0e5d58;
 outline: none;
 background-image: linear-gradient(top, #147e78, #efefef 1px, #0e5d58);
 filter: progid:DXImageTransform.Microsoft.gradient(startColorstr='#147e78', endColorstr='#0e5d58');
 -ms-filter: progid:DXImageTransform.Microsoft.gradient(startColorstr='#147e78', endColorstr='#0e5d58');
 background: -ms-linear-gradient(left top, left bottom, #147e78, #efefef 1px, #0e5d58);
 background: -moz-linear-gradient(left top, left bottom, #147e78, #efefef 1px, #0e5d58);
 background: -o-linear-gradient(left top, left bottom, #147e78, #efefef 1px, #0e5d58);
 background: -webkit-linear-gradient(left top, left bottom, #147e78, #efefef 1px, #0e5d58);
 background: -webkit-gradient(linear, left top, left bottom, color-stop(0, #147e78), color-stop(1, #0e5d58));
 box-shadow: 0px 1px 0px rgba(255,255,255,0.5);
 -webkit-box-shadow: 0px 1px 0px rgba(255,255,255,0.5);
 -moz-box-shadow: 0px 1px 0px rgba(255,255,255,0.5);
 font-weight: bold;
 box-sizing: content-box;
 -moz-box-sizing: content-box;
 -webkit-box-sizing: content-box;
 
}

ul#pt4:hover .submit-btn a{
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
 box-shadow:none;
}
  ul#pt3, ul#pt3 h2, ul#pt3 h3{font-family: 'roboto', sans-serif !important;text-align: center}
    ul#pt3 li h2{ font-weight:700 !important; line-height:normal !important;word-wrap: break-word;}
    ul#pt3 li h3{ font-weight:700;line-height:normal !important}
    
    ul#pt3{text-align:center;width:<?php echo $window_ratio; ?>% !important; position:relative; display:inline-block; margin:0; padding:0; list-style:none; z-index:9; }

  ul#pt3 h2 {
    margin:0;
  color:#fff !important;
    padding:10px 0;
  border-bottom: 1px solid #235d39;
  background-color: #03A678 !important;
  background-image: linear-gradient(top, #3c9f62,  #235d39) !important;
  filter: progid:DXImageTransform.Microsoft.gradient(startColorstr='#3c9f62', endColorstr='#235d39') !important;
  -ms-filter: progid:DXImageTransform.Microsoft.gradient(startColorstr='#3c9f62', endColorstr='#235d39') !important;
  background: -ms-linear-gradient(top, #3c9f62,#235d39) !important;
  background: -moz-linear-gradient(top, #3c9f62,#235d39) !important;
  background: -o-linear-gradient(top, #3c9f62, #235d39) !important;
  background: -webkit-linear-gradient(top, #3c9f62, #235d39) !important;
  background: -webkit-gradient(linear, left top, left bottom, color-stop(0, #3c9f62), color-stop(1, #235d39)) !important;
  }
  ul#pt3 h3 span{ font-size:14px; display:block; font-weight:normal;color:#fff !important; font-family:arial}
  ul#pt3 h3  {
    color: #fff!important;
    font-size:35px;
    margin:0;
    
  text-align:center;padding:10px 0;
  border-top: 1px solid #4fbd81;
  border-bottom: 1px solid #3c9f62;
  background-color: #3c9f62 !important;
  background-image: linear-gradient(top, #3c9f62, #235d39) !important;
  filter: progid:DXImageTransform.Microsoft.gradient(startColorstr='#3c9f62', endColorstr='#235d39') !important;
  -ms-filter: progid:DXImageTransform.Microsoft.gradient(startColorstr='#3c9f62', endColorstr='#235d39') !important;
  background: -ms-linear-gradient(top, #3c9f62, #235d39) !important;
  background: -moz-linear-gradient(top, #3c9f62, #235d39) !important;
  background: -o-linear-gradient(top, #3c9f62, #235d39) !important;
  background: -webkit-linear-gradient(top, #3c9f62, #235d39) !important;
  background: -webkit-gradient(linear, left top, left bottom, color-stop(0, #3c9f62), color-stop(1, #235d39)) !important;
  }
  ul#pt3:hover ul li.odd{ background: #3c9f62 !important;color:#fff;}
  ul#pt3 ul li.odd{background:#e3e3e3 !important}
  ul#pt3 ul li.even{background:#f6f6f6 !important}
  ul#pt3:hover ul li.even{background:rgba(60, 159, 98,.8) !important;color: #fff}

  ul#pt3 ul{ padding:0; margin:0}
  ul#pt3 ul li{ list-style:none; padding:10px 0; font-family:arial !important; font-size:12px; text-transform:uppercase; color:#444; margin:0;}
  ul#pt3 ul li.odd{ background:#ffffff !important;text-align: center}
  ul#pt3 ul li.even{ background:#e1e1e1 !important;text-align: center}
  ul#pt3:hover .submit-btn{
    background-color: #e2e2e2 !important;
    background-image: linear-gradient(top, #3c9f62, #235d39) !important;
    filter: progid:DXImageTransform.Microsoft.gradient(startColorstr='#3c9f62', endColorstr='#235d39') !important;
    -ms-filter: progid:DXImageTransform.Microsoft.gradient(startColorstr='#3c9f62', endColorstr='#235d39') !important;
    background: -ms-linear-gradient(top, #3c9f62, #235d39) !important;
    background: -moz-linear-gradient(top, #3c9f62, #235d39) !important;
    background: -o-linear-gradient(top, #3c9f62, #235d39) !important;
    background: -webkit-linear-gradient(top, #3c9f62, #235d39) !important;
    background: -webkit-gradient(linear, left top, left bottom, color-stop(0, #3c9f62), color-stop(1, #235d39)) !important;

    }
 .text-center{
  margin:0 auto;
  text-align: center;
 }
  ul#pt3 .submit-btn{
  width: 100%;
  padding: 10px 0 !important;
  float: left;
  text-align: center;
  border-bottom: none;
  background-color: transparent !important;
    border-bottom-right-radius: 3px;
    border-bottom-left-radius: 3px; 
  }
  ul#pt3 li{ padding:0;margin:0;list-style: none}
  ul#pt3 .submit-btn a{
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
 background-color: #235d39;
 outline: none;
 background-image: linear-gradient(left top, left bottom, #3c9f62, #efefef 1px, #235d39);
 filter: progid:DXImageTransform.Microsoft.gradient(startColorstr='#3c9f62', endColorstr='#235d39');
 -ms-filter: progid:DXImageTransform.Microsoft.gradient(startColorstr='#3c9f62', endColorstr='#235d39');
 background: -ms-linear-gradient(left top, left bottom, #3c9f62, #efefef 1px, #235d39);
 background: -moz-linear-gradient(left top, left bottom, #3c9f62, #efefef 1px, #235d39);
 background: -o-linear-gradient(left top, left bottom, #3c9f62, #efefef 1px, #235d39);
 background: -webkit-linear-gradient(left top, left bottom, #3c9f62, #efefef 1px, #235d39);
 background: -webkit-gradient(linear, left top, left bottom, color-stop(0, #3c9f62), color-stop(1, #235d39));
 box-shadow: 0px 1px 0px rgba(255,255,255,0.5);
 -webkit-box-shadow: 0px 1px 0px rgba(255,255,255,0.5);
 -moz-box-shadow: 0px 1px 0px rgba(255,255,255,0.5);
 font-weight: bold;
 box-sizing: content-box;
 -moz-box-sizing: content-box;
 -webkit-box-sizing: content-box;
 
  }

  ul#pt3:hover .submit-btn a{
    width: 130px;
    display: block; 
     padding: 10px 0px 10px 0px !important;
     font-size: 24px;

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
  @media (min-width: 320px) and (max-width: 480px){
  ul#pt1 ul li,
   ul#pt2 ul li,
   ul#pt3 ul li,
   ul#pt4 ul li{
    font-size: 10px;
  }
  ul#pt1 .submit-btn a,
  ul#pt2 .submit-btn a,
  ul#pt3 .submit-btn a,
  ul#pt4 .submit-btn a{
  font-size: 10px;
  width:60px;
  }
  ul#pt1  h2,
  ul#pt2  h2,
  ul#pt3  h2,
  ul#pt4  h2{
    font-size: 14px;
  }
  ul#pt1  h3,
  ul#pt2  h3,
  ul#pt3  h3,
  ul#pt4  h3{
  font-size: 20px;
}
 ul#pt1:hover .submit-btn a,
 ul#pt2:hover .submit-btn a,
 ul#pt3:hover .submit-btn a,
 ul#pt4:hover .submit-btn a{
    width: 60px;
    font-size: 10px;

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
									?><ul id="pt<?php echo $pt;?>" >
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

