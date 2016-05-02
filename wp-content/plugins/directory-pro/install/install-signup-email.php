<?php
$blog_title = get_bloginfo(); 

$client_signup_email_template='
 <!DOCTYPE html>
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
			<a  style="color: #FFFFFF; text-decoration:none;" href="'.site_url().'" target="_blank"> Welcome </a></h1></td>
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
                            <p> Dear [user_name],<br><br>
								Welcome to '.$blog_title.'!  
							</p>
                          
                       
                            
							<h3>We\'re so happy you\'ve joined us.</h3>
							
							
							<p>							
							Your User Name & Password:
							</p>
							
                            <table cellspacing="0" cellpadding="6" style="width: 100%; border-radius:5px; overflow:hidden;border-top:1px solid #aaa" >                              
                              <tbody>
                                <tr>
                                  <td style="text-align:left; vertical-align:middle; word-wrap:break-word;">User Name :<br>
                                    <small></small></td>
                                  <td style="text-align:left; vertical-align:middle; "><span class="amount">[iv_member_user_name]</span></td>
                                </tr>
                              </tbody>
                              <tr>
                                <td bgcolor="#efefef" style="text-align:left; " scope="row">Password :</td>
                                <td bgcolor="#efefef" style="text-align:left; vertical-align:middle; "><span class="amount">[iv_member_password]</span></td>
                              </tr>
                              
                            </table>
							<br/>
							
                            <p> Best regards, </p>
                            
							 <p> '.$blog_title.' </p>
                          
						  
						  </td>
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

 
update_option('iv_directories_signup_email', trim($client_signup_email_template)  ); 


$signup_subject = 'Welcome To '.get_bloginfo();

update_option('iv_directories_signup_email_subject', $signup_subject  ); 


$client_forget_email_template='
<!DOCTYPE html>
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
			<a  style="color: #FFFFFF; text-decoration:none;" href="'.site_url().'" target="_blank"> '.$blog_title.' </a></h1></td>
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
                            <p> Dear [user_name],<br><br>
								 
							</p>
                          
                       
							<p>							
							Your User Name & Password:
							</p>
							
                            <table cellspacing="0" cellpadding="6" style="width: 100%; border-radius:5px; overflow:hidden;border-top:1px solid #aaa" >                              
                              <tbody>
                                <tr>
                                  <td style="text-align:left; vertical-align:middle; word-wrap:break-word;">User Name :<br>
                                    <small></small></td>
                                  <td style="text-align:left; vertical-align:middle; "><span class="amount">[iv_member_user_name]</span></td>
                                </tr>
                              </tbody>
                              <tr>
                                <td bgcolor="#efefef" style="text-align:left; " scope="row">Password :</td>
                                <td bgcolor="#efefef" style="text-align:left; vertical-align:middle; "><span class="amount">[iv_member_password]</span></td>
                              </tr>
                              
                            </table>
							<br/>
							
                            <p> Best regards, </p>
                            
							 <p> '.$blog_title.' </p>
                          
						  
						  </td>
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

 
update_option('iv_directories_forget_email', trim($client_forget_email_template)  ); 
$forget_subject = 'Forget Password '.get_bloginfo();
update_option('iv_directories_forget_email_subject', $forget_subject  ); 


// Directory Contact Email Template 

$contact_email_template='
<!DOCTYPE html>
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
			<a  style="color: #FFFFFF; text-decoration:none;" href="'.site_url().'" target="_blank"> New Message</a></h1></td>
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
                        <td valign="top"><div style="color: #555;font-family:Arial;font-size:14px;line-height:150%;text-align:left;">
                            <br/> <br/>
							<p>							
							Message Detail:
							</p>
							
                            <table cellspacing="0" cellpadding="6" style="width: 100%; border-radius:5px; overflow:hidden;border-top:1px solid #aaa" >                              
                              <tbody>
                                <tr>
                                  <td style="text-align:left; vertical-align:middle; word-wrap:break-word;">Sender Email:<br>
                                    <small></small></td>
                                  <td style="text-align:left; vertical-align:middle; "><span class="amount">[iv_member_sender_email]</span></td>
                                </tr>
                              </tbody>
							  <tr>
                                <td bgcolor="#efefef" style="text-align:left; " scope="row">Your Directory :</td>
                                <td bgcolor="#efefef" style="text-align:left; vertical-align:middle; "><span class="amount">[iv_member_directory]</span></td>
                              </tr>
                              <tr>
                                <td bgcolor="#FFFFFF" style="text-align:left; " scope="row">Message :</td>
                                <td bgcolor="#FFFFFF" style="text-align:left; vertical-align:middle; "><span class="amount">[iv_member_message]</span></td>
                              </tr>
                              <tr>
                                <td bgcolor="#efefef" style="text-align:left; " scope="row"></td>
                                <td bgcolor="#efefef" style="text-align:left; vertical-align:middle; "><span class=""></span></td>
                              </tr>
                            </table>
							<br/>
							
                            <p> Best regards, </p>
                            
							 <p> '.$blog_title.' </p>
                          
						  
						  </td>
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
"><p><a  style="color: #666;text-decoration:none;" href="'.site_url().'" target="_blank"> '.$blog_title.' </a></p></td>
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

 
update_option('iv_directories_contact_email', trim($contact_email_template)  ); 
$contact_subject = 'New Message '.get_bloginfo();
update_option('iv_directories_contact_email_subject', $contact_subject  ); 



// Money Refund Email Template 

$money_refund_email_template='
<!DOCTYPE html>
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
			<a  style="color: #FFFFFF; text-decoration:none;" href="'.site_url().'" target="_blank"> Money Refund Request</a></h1></td>
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
                        <td valign="top"><div style="color: #555;font-family:Arial;font-size:14px;line-height:150%;text-align:left;">
                            <br/> <br/>
							<p>							
							Message Detail:
							</p>
							
                            <table cellspacing="0" cellpadding="6" style="width: 100%; border-radius:5px; overflow:hidden;border-top:1px solid #aaa" >                              
                              <tbody>
                                <tr>
                                  <td style="text-align:left; vertical-align:middle; word-wrap:break-word;">User Email:<br>
                                    <small></small></td>
                                  <td style="text-align:left; vertical-align:middle; "><span class="amount">[iv_member_user_email]</span></td>
                                </tr>
                              </tbody>
							  <tr>
                                <td bgcolor="#efefef" style="text-align:left; " scope="row">User Current Balance :</td>
                                <td bgcolor="#efefef" style="text-align:left; vertical-align:middle; "><span class="amount">[iv_member_balance]</span></td>
                              </tr>
                              <tr>
                                <td bgcolor="#fffff" style="text-align:left; " scope="row">Message :</td>
                                <td bgcolor="#fffff" style="text-align:left; vertical-align:middle; "><span class="amount">[iv_member_message]</span></td>
                              </tr>
                              <tr>
                                <td bgcolor="#efefef" style="text-align:left; " scope="row"></td>
                                <td bgcolor="#efefef" style="text-align:left; vertical-align:middle; "><span class=""></span></td>
                              </tr>
                            </table>
							<br/>
							
                            <p> Best regards, </p>
                            
							 <p> '.$blog_title.' </p>
                          
						  
						  </td>
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
"><p><a  style="color: #666;text-decoration:none;" href="'.site_url().'" target="_blank"> '.$blog_title.' </a></p></td>
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

 
update_option('iv_directories_refund_email', trim($money_refund_email_template)  ); 
$money_refund_email_subject = 'Money Refund Request '.get_bloginfo();
update_option('iv_directories_refund_email_subject', $money_refund_email_subject  ); 


// Deal Coupon Email Template*****************


$deal_email_template='
<!DOCTYPE html>
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
			<a  style="color: #FFFFFF; text-decoration:none;" href="'.site_url().'" target="_blank">Coupon/Deal Order </a></h1></td>
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
                        <td valign="top"><div style="color: #555;font-family:Arial;font-size:14px;line-height:150%;text-align:left;">
                            <br/> <br/>
							<p>							
							Coupon/ Deal  Detail:
							</p>
							
                            <table cellspacing="0" cellpadding="6" style="width: 100%; border-radius:5px; overflow:hidden;border-top:1px solid #aaa" >                              
                              <tbody>
                                <tr>
                                  <td width="30%" style="text-align:left; vertical-align:middle; word-wrap:break-word;">Client Email:<br>
                                    <small></small></td>
                                  <td style="text-align:left; vertical-align:middle; "><span class="amount">[iv_member_user_email]</span></td>
                                </tr>
                              </tbody>
							  <tr>
                                <td bgcolor="#efefef" style="text-align:left; " scope="row">Coupon / Deal # :</td>
                                <td bgcolor="#efefef" style="text-align:left; vertical-align:middle; "><span class="amount">[iv_member_deal_number]</span></td>
                              </tr>
							  
                              <tr>
                                <td  style="text-align:left; " scope="row">Title :</td>
                                <td  style="text-align:left; vertical-align:middle; "><span class="amount">[iv_deal_title]</span></td>
                              </tr>
							  
                              <tr>
                                <td bgcolor="#efefef" style="text-align:left; " scope="row">Detail</td>
                                <td bgcolor="#efefef" style="text-align:left; vertical-align:middle; "><span class="">[iv_deal_detail] </span></td>
                              </tr>
							  
							 <tr>
                                <td  style="text-align:left; " scope="row">Listing  :</td>
                                <td style="text-align:left; vertical-align:middle; "><span class="amount">[iv_member_directory]</span></td>
                             </tr>
							  <tr>
                                <td bgcolor="#efefef" style="text-align:left; " scope="row">Amount :</td>
                                <td bgcolor="#efefef" style="text-align:left; vertical-align:middle; "><span class="amount">[iv_deal_amount]</span></td>
                              </tr>
							  <tr>
                                <td  style="text-align:left; " scope="row">Issue Date  :</td>
                                <td  style="text-align:left; vertical-align:middle; "><span class="amount">[iv_member_deal_date]</span></td>
                             </tr>
							 <tr>
                                <td bgcolor="#efefef" style="text-align:left; " scope="row"></td>
                                <td bgcolor="#efefef" style="text-align:left; vertical-align:middle; "><span class="amount"></span></td>
                              </tr>
                            </table>
							<br/>
							
                            <p> Best regards, </p>
                            
							 <p> '.$blog_title.' </p>
                          
						  
						  </td>
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
"><p><a  style="color: #666;text-decoration:none;" href="'.site_url().'" target="_blank"> '.$blog_title.' </a></p></td>
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

 
update_option('iv_directories_deal_email', trim($deal_email_template)  ); 
$deal_email_subject = 'Coupon Order '.get_bloginfo();
update_option('iv_directories_deal_email_subject', $deal_email_subject  ); 



?>
