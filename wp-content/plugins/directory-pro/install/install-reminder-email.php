<?php
global $wpdb;
$blog_title = get_bloginfo(); 
$admin_mail = get_option('admin_email');	

$reminder_email_template='<body leftmargin="0" marginwidth="0" topmargin="0" marginheight="0" offset="0">
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
			<a  style="color: #FFFFFF; text-decoration:none;" href="'.site_url().'" target="_blank"> Subscription Reminder </a></h1></td>
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
  font-size:16px;
  line-height:150%;
  text-align:left;
">
                            <br/> <br/>
                            <h5> Good day,</h5>
                              We thank you that you have been stay at '.$blog_title .'. </p>
                              Your Subscription will close very soon.
                          
                           <br/> <br/>
                            <h4> Subscription Expire Date : [expire_date]</h4>
                           
                           
                            <p>If you need technical assistance  contact us at: '.$admin_mail.' </p>
                            
                            <br/> <br/> 
                            <p>
                            <h5>
								Best Regards
							</h5>
								<h5>'.$blog_title .'</h5>
								
							</p>
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
';


// For Template ****
update_option('iv_directories_reminder_email', $reminder_email_template  ); 

// For Subject ****

$reminder_subject = get_bloginfo().': Subscription Reminder ';
update_option('iv_directories_reminder_email_subject', $reminder_subject ); 
update_option('iv_directories_reminder_day', '10'); 




	
	/// **** Create Page for  reminder Email Cron Job Link ******
/*		
	$page_title='Reminder Email Cron Job';
	$page_name='iv-reminder-email-cron-job';
	$page_content='[iv_directories_reminder_email_cron]';
	$my_post_form = array(
		'post_title'    => wp_strip_all_tags( $page_title),
		'post_name'    => wp_strip_all_tags( $page_name),
		'post_content'  => $page_content,
		'post_status'   => 'publish',
		'post_author'   =>  get_current_user_id(),	
		'post_type'		=> 'page',
		);
	$newpost_id= wp_insert_post( $my_post_form );	
	
	update_option('_iv_directories_remainder_email_page', $newpost_id);

*/
