<?php
$blog_title = get_bloginfo(); 
$admin_mail = get_option('admin_email');	
$admin_order_email_template ='<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">

</head>
<body leftmargin="0" marginwidth="0" topmargin="0" marginheight="0" offset="0">
<div style="background-color: #f5f5f5;
  width:100%;
  -webkit-text-size-adjust:none !important;
  margin:0;
  padding: 70px 0 70px 0;">
  <table border="0" cellpadding="0" cellspacing="0" height="100%" width="100%">
    <tr>
      <td align="center" valign="top"><table border="0" cellpadding="0" cellspacing="0" width="600" id="template_container" style="
  -webkit-box-shadow:0 0 15px rgba(0,0,0,0.2) !important;
  box-shadow:0 0 15px rgba(0,0,0,0.2) !important;
  -webkit-border-radius:6px !important;
  border-radius:6px !important;
  background-color: #fdfdfd;
  border: 1px solid #ccc;
  -webkit-border-radius:6px !important;
  border-radius:6px !important;">
          <tr>
            <td align="center" valign="top"><!-- Header -->
              
              <table border="0" cellpadding="0" cellspacing="0" width="600" id="template_header" style="background-color:#099;
			  color: #ffffff;
			  -webkit-border-top-left-radius:6px !important;
			  -webkit-border-top-right-radius:6px !important;
			  border-top-left-radius:6px !important;
			  border-top-right-radius:6px !important;
			  border-bottom: 0;
			  font-family:Arial;
			  font-weight:bold;
			  line-height:100%;
			  vertical-align:middle;">
              
                <tr>
                  <td><h1 style="color: #ffffff;
				margin:0;
			  -webkit-border-top-left-radius:6px !important;
			  -webkit-border-top-right-radius:6px !important;
			  border-top-left-radius:6px !important;
			  border-top-right-radius:6px !important;
			  padding: 28px 24px;
			  text-shadow: 1px 1px 1px rgba(0,0,0,.2);
			  display:block;
			  font-family:Arial;
			  border:1px solid rgba(0,0,0,.2);
			  font-size:30px;
			  font-weight:bold;
			  border-bottom:0;
			  text-align:left;
			  line-height: 150%;
			  -webkit-box-shadow: inset 0px 1px 0px 0px rgba(255,255,255,.5);
			-moz-box-shadow: inset 0px 1px 0px 0px rgba(255,255,255,.5);
			box-shadow: inset 0px 1px 0px 0px rgba(255,255,255,.5);">
			<a  style="color: #FFFFFF; text-decoration:none;" href="'.site_url().'" target="_blank"> New Order </a></h1></td>
                </tr>
              </table>
              
              <!-- End Header --></td>
          </tr>
          <tr>
            <td align="center" valign="top"><!-- Body -->
              
              <table border="0" cellpadding="0" cellspacing="0" width="600" id="template_body">
                <tr>
                  <td valign="top" style="
  background-color: #fdfdfd;
  -webkit-border-radius:6px !important;
  border-radius:6px !important;
"><!-- Content -->
                    
                    <table border="0" cellpadding="20" cellspacing="0" width="100%">
                      <tr>
                        <td valign="top"><div style="
  color: #555;
  font-family:Arial;
  font-size:14px;
  line-height:150%;
  text-align:left;
">
                            <br/> <br/>
                            <p> Good day,<br>
                              We thank you that you have chosen a membership at '.$blog_title .'. </p>
                            <table cellspacing="0" cellpadding="0" style="width: 100%; vertical-align: top;" border="0">
                              <tr>
                                <td valign="top" width="50%"><h3 style="color: #505050; display:block; font-family:Arial; font-size:18px; font-weight:bold; margin-top: 10px; margin-right:20px; margin-bottom:5px; margin-left:0; text-align:left; line-height: 80%; border-bottom:1px dotted #ddd; padding-bottom:5px">Seller</h3>
                                  <p> '.$blog_title .' </p></td>
                                <td valign="top" width="50%"><h3 style="color: #505050; display:block; font-family:Arial; font-size:18px; font-weight:bold; margin-top: 10px; margin-right:20px; margin-bottom:5px; margin-left:0; text-align:left; line-height: 80%;border-bottom:1px dotted #ddd; padding-bottom:5px">Buyer</h3>
                                  <p> [buyer_address] </p></td>
                              </tr>
                            </table>
                            <h2 style="color: #505050; display:block; font-family:Arial; font-size:20px; font-weight:normal; margin-top: 10px; margin-right:0; margin-bottom:30px; margin-left:0; text-align:left; line-height: 150%;">Member No. <strong>[member_no]</strong></h2>
                            <h3>Invoice Number: [invoice_no]</h3>
                            <table cellspacing="0" cellpadding="6" style="width: 100%; border-radius:5px; overflow:hidden;border-top:1px solid #aaa" >
                              <thead>
                                <tr>
                                  <th bgcolor="#cdcdcd" style="text-align:left;-webkit-box-shadow: inset 0px 1px 0px 0px rgba(255,255,255,.5);
-moz-box-shadow: inset 0px 1px 0px 0px rgba(255,255,255,.5);
box-shadow: inset 0px 1px 0px 0px rgba(255,255,255,.5);  " scope="col">Package Name</th>
                                  <th bgcolor="#cdcdcd" style="text-align:left;-webkit-box-shadow: inset 0px 1px 0px 0px rgba(255,255,255,.5);
-moz-box-shadow: inset 0px 1px 0px 0px rgba(255,255,255,.5);
box-shadow: inset 0px 1px 0px 0px rgba(255,255,255,.5); " scope="col">Amount</th>
                                </tr>
                              </thead>
                              <tbody>
                                <tr>
                                  <td style="text-align:left; vertical-align:middle; word-wrap:break-word;"> [package_name] <br>
                                    <small></small></td>
                                  <td style="text-align:left; vertical-align:middle; "><span class="amount">[package_amount]</span></td>
                                </tr>
                              </tbody>
                              <tr>
                                <td bgcolor="#efefef" style="text-align:left; " scope="row">(-) Discount :</td>
                                <td bgcolor="#efefef" style="text-align:left; vertical-align:middle; "><span class="amount">[discount_amount]</span></td>
                              </tr>
                              <tfoot>
                                <tr>
                                  <th scope="row"  style="text-align:left; border-bottom:1px solid #aaa ">Grand total:</th>
                                  <td style="text-align:left;border-bottom:1px solid #aaa"><span class="amount">[total_amount]</span></td>
                                </tr>
                              </tfoot>
                            </table>
                            <p>You can cancel your subscription at any time. If you need technical assistance  contact us at: '.$admin_mail.' </p>
                            
                            <br/> <br/>
                          </div></td>
                      </tr>
                    </table>
                    
                    <!-- End Content --></td>
                </tr>
              </table>
              
              <!-- End Body --></td>
          </tr>
          <tr>
            <td align="center" valign="top"><!-- Footer -->
              
              <table border="0" cellpadding="10" cellspacing="0" width="600" id="template_footer" style="
  border-top:0;
  -webkit-border-bottom-left-radius:6px; border-bottom-left-radius:6px;
  webkit-border-bottom-right-radius:6px; border-bottom-right-radius:6px; overflow:hidden
">
                <tr>
                  <td valign="top" style="background:#eee;-webkit-box-shadow: inset 0px -1px 0px 0px rgba(0,0,0,.1);
-moz-box-shadow: inset 0px -1px 0px 0px rgba(0,0,0,.1);
box-shadow: inset 0px -1px 0px 0px rgba(0,0,0,.1);"><table border="0" cellpadding="10" cellspacing="0" width="100%">
                      <tr>
                        <td colspan="2" valign="middle" id="credit" style="
  border:0;
  color: #c1d46b;
  font-family: Arial;
  font-size:12px;
  line-height:125%;
  text-align:center;
"><p><a  style="color: #666;text-decoration:none;" href="'.site_url().'" target="_blank"> '.$blog_title.'</a></p></td>
                      </tr>
                    </table></td>
                </tr>
              </table>
              
              <!-- End Footer --></td>
          </tr>
        </table></td>
    </tr>
  </table>
  
</div>
</body>
</html>


';
$client_order_email_template='<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">

</head>
<body leftmargin="0" marginwidth="0" topmargin="0" marginheight="0" offset="0">
<div style="background-color: #f5f5f5;
  width:100%;
  -webkit-text-size-adjust:none !important;
  margin:0;
  padding: 70px 0 70px 0;">
  <table border="0" cellpadding="0" cellspacing="0" height="100%" width="100%">
    <tr>
      <td align="center" valign="top"><table border="0" cellpadding="0" cellspacing="0" width="600" id="template_container" style="
  -webkit-box-shadow:0 0 15px rgba(0,0,0,0.2) !important;
  box-shadow:0 0 15px rgba(0,0,0,0.2) !important;
  -webkit-border-radius:6px !important;
  border-radius:6px !important;
  background-color: #fdfdfd;
  border: 1px solid #ccc;
  -webkit-border-radius:6px !important;
  border-radius:6px !important;">
          <tr>
            <td align="center" valign="top"><!-- Header -->
              
              <table border="0" cellpadding="0" cellspacing="0" width="600" id="template_header" style="background-color:#099;
			  color: #ffffff;
			  -webkit-border-top-left-radius:6px !important;
			  -webkit-border-top-right-radius:6px !important;
			  border-top-left-radius:6px !important;
			  border-top-right-radius:6px !important;
			  border-bottom: 0;
			  font-family:Arial;
			  font-weight:bold;
			  line-height:100%;
			  vertical-align:middle;">
              
                <tr>
                  <td><h1 style="color: #ffffff;
				margin:0;
			  -webkit-border-top-left-radius:6px !important;
			  -webkit-border-top-right-radius:6px !important;
			  border-top-left-radius:6px !important;
			  border-top-right-radius:6px !important;
			  padding: 28px 24px;
			  text-shadow: 1px 1px 1px rgba(0,0,0,.2);
			  display:block;
			  font-family:Arial;
			  border:1px solid rgba(0,0,0,.2);
			  font-size:30px;
			  font-weight:bold;
			  border-bottom:0;
			  text-align:left;
			  line-height: 150%;
			  -webkit-box-shadow: inset 0px 1px 0px 0px rgba(255,255,255,.5);
			-moz-box-shadow: inset 0px 1px 0px 0px rgba(255,255,255,.5);
			box-shadow: inset 0px 1px 0px 0px rgba(255,255,255,.5);">
			<a  style="color: #FFFFFF; text-decoration:none;" href="'.site_url().'" target="_blank"> Thank You </a></h1></td>
                </tr>
              </table>
              
              <!-- End Header --></td>
          </tr>
          <tr>
            <td align="center" valign="top"><!-- Body -->
              
              <table border="0" cellpadding="0" cellspacing="0" width="600" id="template_body">
                <tr>
                  <td valign="top" style="
  background-color: #fdfdfd;
  -webkit-border-radius:6px !important;
  border-radius:6px !important;
"><!-- Content -->
                    
                    <table border="0" cellpadding="20" cellspacing="0" width="100%">
                      <tr>
                        <td valign="top"><div style="
  color: #555;
  font-family:Arial;
  font-size:14px;
  line-height:150%;
  text-align:left;
">
                            <br/> <br/>
                            <p> Good day,<br>
                              We thank you that you have chosen a membership at '.$blog_title .'. </p>
                            <table cellspacing="0" cellpadding="0" style="width: 100%; vertical-align: top;" border="0">
                              <tr>
                                <td valign="top" width="50%"><h3 style="color: #505050; display:block; font-family:Arial; font-size:18px; font-weight:bold; margin-top: 10px; margin-right:20px; margin-bottom:5px; margin-left:0; text-align:left; line-height: 80%; border-bottom:1px dotted #ddd; padding-bottom:5px">Seller</h3>
                                  <p> '.$blog_title .' </p></td>
                                <td valign="top" width="50%"><h3 style="color: #505050; display:block; font-family:Arial; font-size:18px; font-weight:bold; margin-top: 10px; margin-right:20px; margin-bottom:5px; margin-left:0; text-align:left; line-height: 80%;border-bottom:1px dotted #ddd; padding-bottom:5px">Buyer</h3>
                                  <p> [buyer_address] </p></td>
                              </tr>
                            </table>
                            <h2 style="color: #505050; display:block; font-family:Arial; font-size:20px; font-weight:normal; margin-top: 10px; margin-right:0; margin-bottom:30px; margin-left:0; text-align:left; line-height: 150%;">Member No. <strong>[member_no]</strong></h2>
                            <h3>Invoice Number: [invoice_no]</h3>
                            <table cellspacing="0" cellpadding="6" style="width: 100%; border-radius:5px; overflow:hidden;border-top:1px solid #aaa" >
                              <thead>
                                <tr>
                                  <th bgcolor="#cdcdcd" style="text-align:left;-webkit-box-shadow: inset 0px 1px 0px 0px rgba(255,255,255,.5);
-moz-box-shadow: inset 0px 1px 0px 0px rgba(255,255,255,.5);
box-shadow: inset 0px 1px 0px 0px rgba(255,255,255,.5);  " scope="col">Package Name</th>
                                  <th bgcolor="#cdcdcd" style="text-align:left;-webkit-box-shadow: inset 0px 1px 0px 0px rgba(255,255,255,.5);
-moz-box-shadow: inset 0px 1px 0px 0px rgba(255,255,255,.5);
box-shadow: inset 0px 1px 0px 0px rgba(255,255,255,.5); " scope="col">Amount</th>
                                </tr>
                              </thead>
                              <tbody>
                                <tr>
                                  <td style="text-align:left; vertical-align:middle; word-wrap:break-word;"> [package_name] <br>
                                    <small></small></td>
                                  <td style="text-align:left; vertical-align:middle; "><span class="amount">[package_amount]</span></td>
                                </tr>
                              </tbody>
                              <tr>
                                <td bgcolor="#efefef" style="text-align:left; " scope="row">(-) Discount :</td>
                                <td bgcolor="#efefef" style="text-align:left; vertical-align:middle; "><span class="amount">[discount_amount]</span></td>
                              </tr>
                              <tfoot>
                                <tr>
                                  <th scope="row"  style="text-align:left; border-bottom:1px solid #aaa ">Grand total:</th>
                                  <td style="text-align:left;border-bottom:1px solid #aaa"><span class="amount">[total_amount]</span></td>
                                </tr>
                              </tfoot>
                            </table>
                            <p>You can cancel your subscription at any time. If you need technical assistance  contact us at: '.$admin_mail.' </p>
                            
                            <br/> <br/>
                          </div></td>
                      </tr>
                    </table>
                    
                    <!-- End Content --></td>
                </tr>
              </table>
              
              <!-- End Body --></td>
          </tr>
          <tr>
            <td align="center" valign="top"><!-- Footer -->
              
              <table border="0" cellpadding="10" cellspacing="0" width="600" id="template_footer" style="
  border-top:0;
  -webkit-border-bottom-left-radius:6px; border-bottom-left-radius:6px;
  webkit-border-bottom-right-radius:6px; border-bottom-right-radius:6px; overflow:hidden
">
                <tr>
                  <td valign="top" style="background:#eee;-webkit-box-shadow: inset 0px -1px 0px 0px rgba(0,0,0,.1);
-moz-box-shadow: inset 0px -1px 0px 0px rgba(0,0,0,.1);
box-shadow: inset 0px -1px 0px 0px rgba(0,0,0,.1);"><table border="0" cellpadding="10" cellspacing="0" width="100%">
                      <tr>
                        <td colspan="2" valign="middle" id="credit" style="
  border:0;
  color: #c1d46b;
  font-family: Arial;
  font-size:12px;
  line-height:125%;
  text-align:center;
"><p><a  style="color: #666;text-decoration:none;" href="'.site_url().'" target="_blank"> '.$blog_title.'</a></p></td>
                      </tr>
                    </table></td>
                </tr>
              </table>
              
              <!-- End Footer --></td>
          </tr>
        </table></td>
    </tr>
  </table>
  
</div>
</body>
</html>

';




// For Template ****

update_option('iv_directories_order_admin_email', $admin_order_email_template  ); 
update_option('iv_directories_order_client_email', $client_order_email_template  ); 


// For Subject ****

$order_subject = get_bloginfo().': New Order';
update_option('iv_directories_order_admin_email_sub', $order_subject ); 
$order_subject = get_bloginfo().': Order Confirm'; 
update_option('iv_directories_order_client_email_sub', $order_subject  ); 


?>
