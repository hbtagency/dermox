<?php $blog_title = get_bloginfo(); 	
$loading_image='"<img src="'.wp_iv_directories_URLPATH. 'admin/files/images/loader.gif" />';
	  
$admin_email_template='<div style="background-color: #f5f5f5; width: 100%; margin: 0; padding: 70px 0 70px 0;">
<table border="0" width="100%" cellspacing="0" cellpadding="0">
<tbody>
<tr>
<td align="center" valign="top">
<table style="background-color: #98b709; color: #ffffff; border-top-left-radius: 6px!important; border-top-right-radius: 6px!important; border-bottom: 0; font-family: Arial; font-weight: bold; line-height: 100%; vertical-align: middle;" border="0" width="600" cellspacing="0" cellpadding="0" bgcolor="#98B709">
<tbody>
<tr>
<td align="center" valign="top">
<table style="background-color: #98b709; color: #ffffff; border-top-left-radius: 6px!important; border-top-right-radius: 6px!important; border-bottom: 0; font-family: Arial; font-weight: bold; line-height: 100%; vertical-align: middle;" border="0" width="600" cellspacing="0" cellpadding="0" bgcolor="#98b709">
<tbody>
<tr>
<td>
<h1 style="color: #ffffff; margin: 0; padding: 28px 24px; display: block; font-family: Arial; font-size: 30px; font-weight: bold; text-align: left; line-height: 150%;"><a style="color: #ffffff;text-decoration:none;" href="'.site_url().'" target="_blank">'.get_bloginfo().'</a></h1>
</td>
</tr>
</tbody>
</table>
</td>
</tr>
<tr>
<td align="center" valign="top">
<table border="0" width="600" cellspacing="0" cellpadding="0">
<tbody>
<tr>
<td style="background-color: #fdfdfd; border-radius: 6px!important;" valign="top">
<table border="0" width="100%" cellspacing="0" cellpadding="20">
<tbody>
<tr>
<td valign="top">
<div style="color: #737373; font-family: Arial; font-size: 14px; line-height: 150%; text-align: left;">

&nbsp;

You have received a new contact us post.
<table style="width: 100%; border: 1px solid #eee;" border="1" cellspacing="0" cellpadding="6">
<tfoot>
<tr>
<th style="text-align: left; border: 1px solid #eee; border-top-width: 4px;" colspan="2" scope="row">Name :</th>
<td style="text-align: left; border: 1px solid #eee; border-top-width: 4px;">[contact_name]</td>
</tr>
<tr>
<th style="text-align: left; border: 1px solid #eee;" colspan="2" scope="row">Email:</th>
<td style="text-align: left; border: 1px solid #eee;">[contact_email]</td>
</tr>
<tr>
<th style="text-align: left; border: 1px solid #eee;" colspan="2" scope="row">Content:</th>
<td style="text-align: left; border: 1px solid #eee;">[contact_content]</td>
</tr>
</tfoot>
</table>
</div></td>
</tr>						
<tr>
<td style="color: #737373;"> Regards</td>
</tr>
<tr>
<td style="color: #737373;"><a  style="color: #737373;text-decoration:none;" href="'.site_url().'" target="_blank"> '.get_bloginfo().'</a></td>
</tr>
</tbody>
</table>
</td>
</tr>
</tbody>
</table>
</td>
</tr>
<tr>
<td align="center" valign="top">
<table style="border-top: 0;" border="0" width="600" cellspacing="0" cellpadding="10">
<tbody>
<tr>
<td valign="top">
<table border="0" width="100%" cellspacing="0" cellpadding="10">
<tbody>
<tr>
<td style="border: 0; color: #c1d46b; font-family: Arial; font-size: 12px; line-height: 125%; text-align: center;" colspan="2" valign="middle"></td>
</tr>
</tbody>
</table>
</td>
</tr>
</tbody>
</table>
</td>
</tr>
</tbody>
</table>
</td>
</tr>
</tbody>
</table>
</div>';


$client_email_template='<div style="background-color: #f5f5f5; width: 100%; margin: 0; padding: 70px 0 70px 0;">
<table border="0" width="100%" cellspacing="0" cellpadding="0">
<tbody>
<tr>
<td align="center" valign="top">
<table style="background-color: #98b709; color: #ffffff; border-top-left-radius: 6px!important; border-top-right-radius: 6px!important; border-bottom: 0; font-family: Arial; font-weight: bold; line-height: 100%; vertical-align: middle;" border="0" width="600" cellspacing="0" cellpadding="0" bgcolor="#98B709">
<tbody>
<tr>
<td align="center" valign="top">
<table style="background-color: #98b709; color: #ffffff; border-top-left-radius: 6px!important; border-top-right-radius: 6px!important; border-bottom: 0; font-family: Arial; font-weight: bold; line-height: 100%; vertical-align: middle;" border="0" width="600" cellspacing="0" cellpadding="0" bgcolor="#98b709">
<tbody>
<tr>
<td>
<h1 style="color: #ffffff; margin: 0; padding: 28px 24px; display: block; font-family: Arial; font-size: 30px; font-weight: bold; text-align: left; line-height: 150%;"><a style="color: #ffffff;text-decoration:none;" href="'.site_url().'" target="_blank">'.get_bloginfo().'</a></h1>
</td>
</tr>
</tbody>
</table>
</td>
</tr>
<tr>
<td align="center" valign="top">
<table border="0" width="600" cellspacing="0" cellpadding="0">
<tbody>
<tr>
<td style="background-color: #fdfdfd; border-radius: 6px!important;" valign="top">
<table border="0" width="100%" cellspacing="0" cellpadding="20">
<tbody>
<tr>

<td valign="top">
<div style="color: #737373; font-family: Arial; font-size: 14px; line-height: 150%; text-align: left;">Dear [contact_name],</div>
<div style="color: #737373; font-family: Arial; font-size: 14px; line-height: 150%; text-align: left;"></div>
<div style="color: #737373; font-family: Arial; font-size: 14px; line-height: 150%; text-align: left;">

Thank you for reaching out, we are excited to help you to meet your needs. <br/> Our representative will contact you ASAP. <br/> Please do not hesitate to call or email us should you have any questions in the meantime.							
</div></td>
</tr>
<tr>
<td style="color: #737373;"> Regards,</td>
</tr>
<tr>
<td style="color: #737373;"><a  style="color: #737373;text-decoration:none;" href="'.site_url().'" target="_blank"> '.get_bloginfo().'</a></td>
</tr>
</tbody>
</table>
</td>
</tr>
</tbody>
</table>
</td>
</tr>
<tr>
<td align="center" valign="top">
<table style="border-top: 0;" border="0" width="600" cellspacing="0" cellpadding="10">
<tbody>
<tr>
<td valign="top">
<table style="height: 35px;" border="0" width="471" cellspacing="0" cellpadding="10">
<tbody>
<tr>
<td style="border: 0; color: #c1d46b; font-family: Arial; font-size: 12px; line-height: 125%; text-align: center;" colspan="2" valign="middle"></td>
</tr>
</tbody>
</table>
</td>
</tr>
</tbody>
</table>
</td>
</tr>
</tbody>
</table>
</td>
</tr>
</tbody>
</table>
</div>
		';

update_option('iv_directories_admin_email_green', $admin_email_template ); 
update_option('iv_directories_client_email_green', $client_email_template );

	
								$admin_email_template2='<table width="100%" border="0" cellspacing="0" cellpadding="0" style="background:#ececec url('. wp_iv_directories_URLPATH.'admin/files/images/email-template/bg-tile-grey.jpg) repeat-x left top">
									<tbody><tr>
									  <td align="center" valign="top">
										<table width="750" border="0" align="center" cellpadding="0" cellspacing="0">
										<tbody><tr>
										  <td align="center" valign="top">
											<table width="690" border="0" align="center" cellpadding="0" cellspacing="0">
											<tbody><tr>
											  <td align="right" valign="top">
												<img src="'. wp_iv_directories_URLPATH.'admin/files/images/email-template/shim.gif" width="1" height="30">
											  </td>
											</tr>
											</tbody></table>
										  </td>
										</tr>
										</tbody></table>
										<table width="668" border="0" cellspacing="0" cellpadding="0" style="background:#ffffff;border:1px solid #dddddd">
										<tbody><tr>
										  <td align="center" style="padding-top:30px">
											<table width="100%" border="0" cellspacing="0" cellpadding="0">
											<tbody><tr>
											  <td width="100%" align="left" valign="top">
												<table width="100%" border="0" cellspacing="0" cellpadding="0">
												<tbody><tr>
												  <td align="left" valign="top" style="padding:10px 0 0 20px;color:#505050;font-family:Helvetica,Arial;font-size:28px;font-weight:bold;line-height:100%;padding-bottom:20px ">
												 <a style="text-decoration:none;" href="'.site_url().'" target="_blank">'.get_bloginfo().'</a>
												  </td>
												</tr>
												</tbody></table>
											  </td>
											  <td align="right" valign="top">
												<table border="0" cellpadding="0" cellspacing="0" width="100%">
												
												
												</table>
											  </td>
											</tr>
											</tbody></table>
											<table width="100%" border="0" cellspacing="0" cellpadding="0">
											<tbody><tr>
											  <td align="left" valign="top" style="padding:25px 13px 40px">
												<img src="'. wp_iv_directories_URLPATH.'admin/files/images/email-template/top-image-2.jpg" style="display:block;border:none" width="660" height="220" alt="'.get_bloginfo().'">
											  </td>
											</tr>
											</tbody></table>
											<table width="100%" border="0" cellspacing="0" cellpadding="0">
											<tbody><tr>
											  <td align="left" valign="top" style="padding:0px 65px">
												<table width="100%" border="0" cellspacing="0" cellpadding="0">
									  <tbody><tr>
										<td style="color:#505050;font-family:Helvetica,Arial;font-size:20px;font-weight:bold;line-height:100%;padding-bottom:20px">
											You have received a new contact us post
										 </td>
									  </tr>
									  <tr>
										<td style="color:#525252;font-family:Helvetica,Arial;font-size:14px;line-height:21px;font-weight:300;padding-bottom:40px">
										 
														<table width="100%">
																<tr> <td>Name</td><td>:</td><td>[contact_name] </td>
																</tr>
																<tr> <td>Email Address</td><td>:</td><td>[contact_email] </td>
																</tr>
																<tr> <td>Message</td><td>:</td><td>[contact_content] </td>
																</tr>
															 </table>	  
										  
										</td>
									  </tr>
									</tbody></table>
											  </td>
											</tr>
											</tbody></table>
										  </td>
										</tr>
										</tbody></table>
										<table border="0" cellpadding="0" cellspacing="0" width="668">
										<tbody><tr>
										  <td colspan="2" align="left" valign="middle" style="border-bottom-width:6px;border-bottom-color:#b3b3b3;border-bottom-style:solid">
											<img src="'. wp_iv_directories_URLPATH.'admin/files/images/email-template/shim.gif" width="1" height="20">
										  </td>
										</tr>
										<tr>
										  <td align="left" valign="middle">
										   
										  </td>
										  <td>
											<table width="100%" border="0" cellspacing="0" cellpadding="0" style="color:#878787;font-family:Helvetica,Arial;font-size:11px;line-height:13px;font-weight:300;text-align:right">
											<tbody><tr>
											  <td align="right" valign="top" style="padding-top:16px">
												
											  </td>
											</tr>
											<tr>
											  <td align="right" valign="top" style="padding-top:6px">
												<a style="color:#8dae55;" href="'.site_url().'" target="_blank">'.site_url().'</a>
											  </td>
											</tr>
										   
											</tbody></table>
										  </td>
										</tr>
										<tr>
										  <td colspan="2" style="padding:10px 0 30px">
											<img src="'. wp_iv_directories_URLPATH.'admin/files/images/email-template/divider-grey.jpg" width="689" height="1">
										  </td>
										</tr>
										</tbody></table>
									  </td>
									</tr>
									</tbody></table>
									';
									
								$client_email_template2	='<table width="100%" border="0" cellspacing="0" cellpadding="0" style="background:#ececec url('. wp_iv_directories_URLPATH.'admin/files/images/email-template/bg-tile-grey.jpg) repeat-x left top">
									<tbody><tr>
									  <td align="center" valign="top">
										<table width="750" border="0" align="center" cellpadding="0" cellspacing="0">
										<tbody><tr>
										  <td align="center" valign="top">
											<table width="690" border="0" align="center" cellpadding="0" cellspacing="0">
											<tbody><tr>
											  <td align="right" valign="top">
												<img src="'. wp_iv_directories_URLPATH.'admin/files/images/email-template/shim.gif" width="1" height="30">
											  </td>
											</tr>
											</tbody></table>
										  </td>
										</tr>
										</tbody></table>
										<table width="668" border="0" cellspacing="0" cellpadding="0" style="background:#ffffff;border:1px solid #dddddd">
										<tbody><tr>
										  <td align="center" style="padding-top:30px">
											<table width="100%" border="0" cellspacing="0" cellpadding="0">
											<tbody><tr>
											  <td width="100%" align="left" valign="top">
												<table width="100%" border="0" cellspacing="0" cellpadding="0">
												<tbody><tr>
												  <td align="left" valign="top" style="padding:10px 0 0 20px;color:#505050;font-family:Helvetica,Arial;font-size:28px;font-weight:bold;line-height:100%;padding-bottom:20px ">
												 <a style="text-decoration:none;" href="'.site_url().'" target="_blank">'.get_bloginfo().'</a>
												  </td>
												</tr>
												</tbody></table>
											  </td>
											  <td align="right" valign="top">
												<table border="0" cellpadding="0" cellspacing="0" width="100%">
												
												
												</table>
											  </td>
											</tr>
											</tbody></table>
											<table width="100%" border="0" cellspacing="0" cellpadding="0">
											<tbody><tr>
											  <td align="left" valign="top" style="padding:25px 13px 40px">
												<img src="'. wp_iv_directories_URLPATH.'admin/files/images/email-template/top-image-2.jpg" style="display:block;border:none" width="660" height="220" alt="'.get_bloginfo().'">
											  </td>
											</tr>
											</tbody></table>
											<table width="100%" border="0" cellspacing="0" cellpadding="0">
											<tbody><tr>
											  <td align="left" valign="top" style="padding:0px 65px">
												<table width="100%" border="0" cellspacing="0" cellpadding="0">
									  <tbody><tr>
										<td style="color:#505050;font-family:Helvetica,Arial;font-size:20px;font-weight:bold;line-height:100%;padding-bottom:20px">
											We have received your email
										 </td>
									  </tr>
									  <tr>
										<td style="color:#525252;font-family:Helvetica,Arial;font-size:14px;line-height:21px;font-weight:300;padding-bottom:40px">
										 
														<table width="100%">
																<tr> <td>Dear [contact_name],</td>
																</tr>
																<tr> <td>Thank you for reaching out, we are excited to help you to meet your needs.
																		Our representative will contact you ASAP.
																		Please do not hesitate to call or email us should you have any questions in the meantime.   </td>
																</tr>
																<tr> <td>Regards,</td>
																</tr>
																<tr> <td style="color:#505050;font-family:Helvetica,Arial;font-size:18px;font-weight:bold;line-height:100%;padding-bottom:20px">'.get_bloginfo().'</td>
																</tr>
															 </table>	
															 
										</td>
									  </tr>
									</tbody></table>
											  </td>
											</tr>
											</tbody></table>
										  </td>
										</tr>
										</tbody></table>
										<table border="0" cellpadding="0" cellspacing="0" width="668">
										<tbody><tr>
										  <td colspan="2" align="left" valign="middle" style="border-bottom-width:6px;border-bottom-color:#b3b3b3;border-bottom-style:solid">
											<img src="'. wp_iv_directories_URLPATH.'admin/files/images/email-template/shim.gif" width="1" height="20">
										  </td>
										</tr>
										<tr>
										  <td align="left" valign="middle">
										   
										  </td>
										  <td>
											<table width="100%" border="0" cellspacing="0" cellpadding="0" style="color:#878787;font-family:Helvetica,Arial;font-size:11px;line-height:13px;font-weight:300;text-align:right">
											<tbody><tr>
											  <td align="right" valign="top" style="padding-top:16px">
												
											  </td>
											</tr>
											<tr>
											  <td align="right" valign="top" style="padding-top:6px">
												<a style="color:#8dae55" href="'.site_url().'" target="_blank">'.site_url().'</a>
											  </td>
											</tr>
										   
											</tbody></table>
										  </td>
										</tr>
										<tr>
										  <td colspan="2" style="padding:10px 0 30px">
											<img src="'. wp_iv_directories_URLPATH.'admin/files/images/email-template/divider-grey.jpg" width="689" height="1">
										  </td>
										</tr>
										</tbody></table>
									  </td>
									</tr>
									</tbody></table>
							
							';


update_option('iv_directories_admin_email_black_white', $admin_email_template2 ); 
update_option('iv_directories_client_email_black_white', $client_email_template2 );


$admin_email_template3='<div>
											
												<table cellpadding="0" cellspacing="0" border="0" width="100%">
													<tr>
														<td valign="top" align="center" id="top" style="padding: 0px;margin: 0px;background-image: url('. wp_iv_directories_URLPATH.'admin/files/images/email-template/bg_body.gif);background-repeat: repeat-y no-repeat;background-position: top center;background-color: #3d4852;" bgcolor="#3d4852" background="'. wp_iv_directories_URLPATH.'admin/files/images/email-template/bg_body.gif">
															
															<table style="font-family: Verdana, Arial, sans-serif; color: #8d9ca4;font-size: 10px;margin: 0; text-align:center;" cellpadding="0" cellspacing="0" align="center" width="600">
																<tr>
																	<td valign="top"><img src="'. wp_iv_directories_URLPATH.'admin/files/images/email-template/blank.gif" width="1" height="8" alt="" /></td>
																</tr>
																
																<tr>
																	<td style="background: url('. wp_iv_directories_URLPATH.'admin/files/images/email-template/bg_top.png) no-repeat;"><img src="'. wp_iv_directories_URLPATH.'admin/files/images/email-template/blank.gif" width="1" height="12" alt="" /></td>
																</tr>
															</table>
															<table cellpadding="0" cellspacing="0" align="center" width="600" style="background: url('. wp_iv_directories_URLPATH.'admin/files/images/email-template/bg_email_singlecol.png) repeat-y;">
																<tr>
																	<td rowspan="4" valign="top"><img src="'. wp_iv_directories_URLPATH.'admin/files/images/email-template/blank.gif" width="15" height="1" alt="" /></td>
																	<td rowspan="4" valign="top"><img src="'. wp_iv_directories_URLPATH.'admin/files/images/email-template/header_strip.gif" alt="" width="20" height="249" /></td>
																	<td rowspan="3" valign="top"><img src="'. wp_iv_directories_URLPATH.'admin/files/images/email-template/header_l.gif" alt="" width="405" height="184" /></td>
																	<td bgcolor="#fbfdfd" colspan="2" width="100" height="26"><img src="'. wp_iv_directories_URLPATH.'admin/files/images/email-template/blank.gif" width="100" height="26" alt="" /></td>
																	<td rowspan="4" valign="top"><img src="'. wp_iv_directories_URLPATH.'admin/files/images/email-template/header_r.gif" alt="" width="45" height="249" /></td>
																	<td rowspan="4" valign="top"><img src="'. wp_iv_directories_URLPATH.'admin/files/images/email-template/blank.gif" width="15" height="1" alt="" /></td>
																</tr>
																<tr>
																	<td valign="top"><img src="'. wp_iv_directories_URLPATH.'admin/files/images/email-template/header_mbsbg.gif" width="16" height="79" alt="" /></td>
																	<td valign="top" width="84" align="left" style="background-image: url('. wp_iv_directories_URLPATH.'admin/files/images/email-template/header_mbg.gif);background-repeat: repeat-y no-repeat;background-position: top center;background-color: #f2f8fa;" height="79">																		
																		<p style="color: #4dc8da;font-family: Arial, Helvetica; font-size: 12px; line-height: 12px;margin: 0;padding: 0;text-transform: uppercase;"></p>
																		<p style="color: #b4ebf3;font-family: Arial, Helvetica;font-size: 18px;line-height: 18px;margin: 0;padding: 0;"></p>
																	</td>
																</tr>
																<tr>
																	<td colspan="2"><img src="'. wp_iv_directories_URLPATH.'admin/files/images/email-template/header_m.gif" alt="" width="100" height="79" /></td>
																</tr>
																<tr>
																	<td style="background: url('. wp_iv_directories_URLPATH.'admin/files/images/email-template/bg_title.gif) no-repeat;" background="'. wp_iv_directories_URLPATH.'admin/files/images/email-template/bg_title.gif" valign="bottom" colspan="3" height="65" align="left">
																		<h1 style="color: #ffffff;font-family: Arial Black, Arial, Helvetica; font-size: 48px; line-height: 39px; margin: 0;padding: 0;text-shadow: 0px 0px 1px #1b5362;">
																			<a style="color: #ffffff;font-family: Arial Black, Arial, Helvetica; font-size: 48px; line-height: 39px; margin: 0;padding: 0;text-shadow: 0px 0px 1px #1b5362;;text-decoration:none;" href="'.site_url().'" target="_blank">'.get_bloginfo().'</a>
																		</h1>
																	</td>
																</tr>
																

																<tr>
																	<td colspan="7" align="left" valign="top">
																		<table cellpadding="0" cellspacing="0" width="600" align="left">
																			<tr>
																				<td colspan="2"><img src="'. wp_iv_directories_URLPATH.'admin/files/images/email-template/topbot_singlecol.gif" width="600" height="14" alt="" /></td>
																			</tr>
																			<tr>
																				<td valign="top" width="600">
																				
																					<table cellpadding="0" cellspacing="0" width="600" class="whitecol">
																						<tr>
																							<td valign="top" width="15" rowspan="3"><img src="'. wp_iv_directories_URLPATH.'admin/files/images/email-template/title_rightsinglecol_blue1.gif" alt="" width="15" height="56" /></td>
																							<td bgcolor="#eaf4f7" valign="top" width="21" rowspan="3"><img src="'. wp_iv_directories_URLPATH.'admin/files/images/email-template/title_blue2.gif" alt="" width="21" height="56" /></td>
																							<td bgcolor="#eaf4f7"><img src="'. wp_iv_directories_URLPATH.'admin/files/images/email-template/blank.gif" alt="" width="1" height="20" /></td>
																							<td bgcolor="#eaf4f7" rowspan="4"><img src="'. wp_iv_directories_URLPATH.'admin/files/images/email-template/blank.gif" alt="" width="20" height="1" /></td>
																							<td rowspan="4"><img src="'. wp_iv_directories_URLPATH.'admin/files/images/email-template/blank.gif" alt="" width="15" height="1" /></td>
																						</tr>
																						<tr>											
																							<td bgcolor="#eaf4f7" valign="top" width="529"><h2 style="color: #3994b5 !important;font-family: Arial, Helvetica;text-align: left;font-weight: normal;font-size: 30px;line-height: 32px;margin: 0 0 18px 0;">You have received a contact us post</h2></td>
																						</tr>
																						<tr>
																							<td bgcolor="#eaf4f7" valign="top" style="border-bottom: 1px dotted #9c9c93;padding-bottom:15px;">
																							
																							<br/>
																								<p >
																								
																								<table width="100%" style="color: #4b5863;font-family: Verdana, Arial;text-align: left;font-size: 12px;line-height: 18px;margin: 0 0 8px 0;">
																								<tr> <td>Name</td><td>:</td><td>[contact_name] </td>
																								</tr>
																								<tr> <td>Email Address</td><td>:</td><td>[contact_email] </td>
																								</tr>
																								<tr> <td>Message</td><td>:</td><td>[contact_content] </td>
																								</tr>
																								<tr> <td colspan="3">&nbsp; </td>
																								</tr>
																								
																								<tr> <td colspan="3" style="color: #3994b5 !important;font-family: Arial, Helvetica;text-align: left;font-weight: normal;font-size: 16px;line-height: 32px;margin: 0 0 18px 0;">Regards, </td>
																								</tr>
																								
																								<tr> <td colspan="3"><a style="color: #3994b5 !important;font-family: Arial, Helvetica;text-align: left;font-weight: normal;font-size: 16px;line-height: 32px;margin: 0 0 18px 0;" href="'.site_url().'" 	target="_blank">'.get_bloginfo().'</a></td>
																								</tr>
																								
																							 </table>
																								
																								</p>																								
																								
																								<br/>
																											
																								
																								
																								
																							</td>
																						</tr>
																						
																					</table>
																					
																				</td>
																			</tr>
																			<tr>
																				<td colspan="2"><img src="'. wp_iv_directories_URLPATH.'admin/files/images/email-template/topbot_singlecol.gif" width="600" height="10" alt="" />
																				
																				
																				</td>
																			</tr>
																		</table>
																	</td>
																</tr>
																
																
															
															</table>
															<table class="texttopbottom" cellpadding="0" cellspacing="0" align="center" width="600">
															<tr>
																<td colspan="3" style="background: url('. wp_iv_directories_URLPATH.'admin/files/images/email-template/bg_bottom.png) no-repeat;"><img src="'. wp_iv_directories_URLPATH.'admin/files/images/email-template/blank.gif" width="1" height="24" alt="" /></td>
															</tr>
															
														</table>
																										
														</td>
														
													</tr>
													<tr>
																
												</table>
												</div>';

$client_email_template3	='<div>
											
												<table cellpadding="0" cellspacing="0" border="0" width="100%">
													<tr>
														<td valign="top" align="center" id="top" style="padding: 0px;margin: 0px;background-image: url('. wp_iv_directories_URLPATH.'admin/files/images/email-template/bg_body.gif);background-repeat: repeat-y no-repeat;background-position: top center;background-color: #3d4852;" bgcolor="#3d4852" background="'. wp_iv_directories_URLPATH.'admin/files/images/email-template/bg_body.gif">
															
															<table style="font-family: Verdana, Arial, sans-serif; color: #8d9ca4;font-size: 10px;margin: 0; text-align:center;" cellpadding="0" cellspacing="0" align="center" width="600">
																<tr>
																	<td valign="top"><img src="'. wp_iv_directories_URLPATH.'admin/files/images/email-template/blank.gif" width="1" height="8" alt="" /></td>
																</tr>
																
																<tr>
																	<td style="background: url('. wp_iv_directories_URLPATH.'admin/files/images/email-template/bg_top.png) no-repeat;"><img src="'. wp_iv_directories_URLPATH.'admin/files/images/email-template/blank.gif" width="1" height="12" alt="" /></td>
																</tr>
															</table>
															<table cellpadding="0" cellspacing="0" align="center" width="600" style="background: url('. wp_iv_directories_URLPATH.'admin/files/images/email-template/bg_email_singlecol.png) repeat-y;">
																<tr>
																	<td rowspan="4" valign="top"><img src="'. wp_iv_directories_URLPATH.'admin/files/images/email-template/blank.gif" width="15" height="1" alt="" /></td>
																	<td rowspan="4" valign="top"><img src="'. wp_iv_directories_URLPATH.'admin/files/images/email-template/header_strip.gif" alt="" width="20" height="249" /></td>
																	<td rowspan="3" valign="top"><img src="'. wp_iv_directories_URLPATH.'admin/files/images/email-template/header_l.gif" alt="" width="405" height="184" /></td>
																	<td bgcolor="#fbfdfd" colspan="2" width="100" height="26"><img src="'. wp_iv_directories_URLPATH.'admin/files/images/email-template/blank.gif" width="100" height="26" alt="" /></td>
																	<td rowspan="4" valign="top"><img src="'. wp_iv_directories_URLPATH.'admin/files/images/email-template/header_r.gif" alt="" width="45" height="249" /></td>
																	<td rowspan="4" valign="top"><img src="'. wp_iv_directories_URLPATH.'admin/files/images/email-template/blank.gif" width="15" height="1" alt="" /></td>
																</tr>
																<tr>
																	<td valign="top"><img src="'. wp_iv_directories_URLPATH.'admin/files/images/email-template/header_mbsbg.gif" width="16" height="79" alt="" /></td>
																	<td valign="top" width="84" align="left" style="background-image: url('. wp_iv_directories_URLPATH.'admin/files/images/email-template/header_mbg.gif);background-repeat: repeat-y no-repeat;background-position: top center;background-color: #f2f8fa;" height="79">
																		<p style="color: #4dc8da;font-family: Arial, Helvetica; font-size: 12px; line-height: 12px;margin: 0;padding: 0;text-transform: uppercase;"></p>
																		<p style="color: #4dc8da;font-family: Arial, Helvetica; font-size: 12px; line-height: 12px;margin: 0;padding: 0;text-transform: uppercase;"></p>
																		<p style="color: #b4ebf3;font-family: Arial, Helvetica;font-size: 18px;line-height: 18px;margin: 0;padding: 0;"></p>
																	</td>
																</tr>
																<tr>
																	<td colspan="2"><img src="'. wp_iv_directories_URLPATH.'admin/files/images/email-template/header_m.gif" alt="" width="100" height="79" /></td>
																</tr>
																<tr>
																	<td style="background: url('. wp_iv_directories_URLPATH.'admin/files/images/email-template/bg_title.gif) no-repeat;" background="'. wp_iv_directories_URLPATH.'admin/files/images/email-template/bg_title.gif" valign="bottom" colspan="3" height="65" align="left">
																		<h1 style="color: #ffffff;font-family: Arial Black, Arial, Helvetica; font-size: 48px; line-height: 39px; margin: 0;padding: 0;text-shadow: 0px 0px 1px #1b5362;">
																			<a style="color: #ffffff;font-family: Arial Black, Arial, Helvetica; font-size: 48px; line-height: 39px; margin: 0;padding: 0;text-shadow: 0px 0px 1px #1b5362;;text-decoration:none;" href="'.site_url().'" target="_blank">'.get_bloginfo().'</a>
																		</h1>
																	</td>
																</tr>
																

																<tr>
																	<td colspan="7" align="left" valign="top">
																		<table cellpadding="0" cellspacing="0" width="600" align="left">
																			<tr>
																				<td colspan="2"><img src="'. wp_iv_directories_URLPATH.'admin/files/images/email-template/topbot_singlecol.gif" width="600" height="14" alt="" /></td>
																			</tr>
																			<tr>
																				<td valign="top" width="600">
																				
																					<table cellpadding="0" cellspacing="0" width="600" class="whitecol">
																						<tr>
																							<td valign="top" width="15" rowspan="3"><img src="'. wp_iv_directories_URLPATH.'admin/files/images/email-template/title_rightsinglecol_blue1.gif" alt="" width="15" height="56" /></td>
																							<td bgcolor="#eaf4f7" valign="top" width="21" rowspan="3"><img src="'. wp_iv_directories_URLPATH.'admin/files/images/email-template/title_blue2.gif" alt="" width="21" height="56" /></td>
																							<td bgcolor="#eaf4f7"><img src="'. wp_iv_directories_URLPATH.'admin/files/images/email-template/blank.gif" alt="" width="1" height="20" /></td>
																							<td bgcolor="#eaf4f7" rowspan="4"><img src="'. wp_iv_directories_URLPATH.'admin/files/images/email-template/blank.gif" alt="" width="20" height="1" /></td>
																							<td rowspan="4"><img src="'. wp_iv_directories_URLPATH.'admin/files/images/email-template/blank.gif" alt="" width="15" height="1" /></td>
																						</tr>
																						<tr>											
																							<td bgcolor="#eaf4f7" valign="top" width="529"><h2 style="color: #3994b5 !important;font-family: Arial, Helvetica;text-align: left;font-weight: normal;font-size: 30px;line-height: 32px;margin: 0 0 18px 0;">We have received your email</h2></td>
																						</tr>
																						<tr>
																							<td bgcolor="#eaf4f7" valign="top" style="border-bottom: 1px dotted #9c9c93;padding-bottom:15px;">
																							
																							<br/>
																								<p >
																								
																								<table width="100%" style="color: #4b5863;font-family: Verdana, Arial;text-align: left;font-size: 12px;line-height: 18px;margin: 0 0 8px 0;">
																								
																								<tr> <td>Dear [contact_name], </td>
																								</tr>
																								<tr> <td>
																										Thank you for reaching out, we are excited to help you to meet your needs.
																										Our representative will contact you ASAP.
																										Please do not hesitate to call or email us should you have any questions in the meantime.  </td>
																								</tr>
																								<tr> <td colspan="3">&nbsp; </td>
																								</tr>
																								
																								<tr> <td colspan="3" style="color: #3994b5 !important;font-family: Arial, Helvetica;text-align: left;font-weight: normal;font-size: 16px;line-height: 32px;margin: 0 0 18px 0;">Regards, </td>
																								</tr>
																								
																								<tr> <td colspan="3"><a style="color: #3994b5 !important;font-family: Arial, Helvetica;text-align: left;font-weight: normal;font-size: 16px;line-height: 32px;margin: 0 0 18px 0;" href="'.site_url().'" 	target="_blank">'.get_bloginfo().'</a></td>
																								</tr>
																								
																							 </table>
																								</p>		
																								
																								<br/>
																																																		
																							</td>
																						</tr>
																						
																					</table>
																					
																				</td>
																			</tr>
																			<tr>
																				<td colspan="2"><img src="'. wp_iv_directories_URLPATH.'admin/files/images/email-template/topbot_singlecol.gif" width="600" height="10" alt="" />
																				
																				
																				</td>
																			</tr>
																		</table>
																	</td>
																</tr>
															
															</table>
															<table class="texttopbottom" cellpadding="0" cellspacing="0" align="center" width="600">
															<tr>
																<td colspan="3" style="background: url('. wp_iv_directories_URLPATH.'admin/files/images/email-template/bg_bottom.png) no-repeat;"><img src="'. wp_iv_directories_URLPATH.'admin/files/images/email-template/blank.gif" width="1" height="24" alt="" /></td>
															</tr>
															
														</table>
																										
														</td>
														
													</tr>
													<tr>
																
												</table>
												</div>

';
update_option('iv_directories_admin_email_textile', $admin_email_template3 ); 
update_option('iv_directories_client_email_textile', $client_email_template3 );


$client_template_newsletter_green='<div style="background-color: #f5f5f5; width: 100%; margin: 0; padding: 70px 0 70px 0;">
<table border="0" width="100%" cellspacing="0" cellpadding="0">
<tbody>
<tr>
<td align="center" valign="top">
<table style="background-color: #98b709; color: #ffffff; border-top-left-radius: 6px!important; border-top-right-radius: 6px!important; border-bottom: 0; font-family: Arial; font-weight: bold; line-height: 100%; vertical-align: middle;" border="0" width="600" cellspacing="0" cellpadding="0" bgcolor="#98B709">
<tbody>
<tr>
<td align="center" valign="top">
<table style="background-color: #98b709; color: #ffffff; border-top-left-radius: 6px!important; border-top-right-radius: 6px!important; border-bottom: 0; font-family: Arial; font-weight: bold; line-height: 100%; vertical-align: middle;" border="0" width="600" cellspacing="0" cellpadding="0" bgcolor="#98b709">
<tbody>
<tr>
<td>
<h1 style="color: #ffffff; margin: 0; padding: 28px 24px; display: block; font-family: Arial; font-size: 30px; font-weight: bold; text-align: left; line-height: 150%;"><a style="color: #ffffff;text-decoration:none;" href="'.site_url().'" target="_blank">'.get_bloginfo().'</a></h1>
</td>
</tr>
</tbody>
</table>
</td>
</tr>
<tr>
<td align="center" valign="top">
<table border="0" width="600" cellspacing="0" cellpadding="0">
<tbody>
<tr>
<td style="background-color: #fdfdfd; border-radius: 6px!important;" valign="top">
<table border="0" width="100%" cellspacing="0" cellpadding="20">
<tbody>
<tr>
<td valign="top">
<div style="color: #737373; font-family: Arial; font-size: 14px; line-height: 150%; text-align: left;">Dear [contact_name],</div>
<div style="color: #737373; font-family: Arial; font-size: 14px; line-height: 150%; text-align: left;"></div>
<div style="color: #737373; font-family: Arial; font-size: 14px; line-height: 150%; text-align: left;">

Thanks for subscription. You should begin receiving newsletters immediately.

Please do not hesitate to call or email us should you have any questions in the meantime.

</div></td>
</tr>
<tr>
<td style="color: #737373;">Regards,</td>
</tr>
<tr>

<td style="color: #737373;"><a style="color: #737373; text-decoration: none;" href="'.site_url().'" target="_blank">'.get_bloginfo().'</a></td>
</tr>
</tbody>
</table>
</td>
</tr>
</tbody>
</table>
</td>
</tr>
<tr>
<td align="center" valign="top">
<table style="border-top: 0;" border="0" width="600" cellspacing="0" cellpadding="10">
<tbody>
<tr>
<td valign="top">
<table style="height: 35px;" border="0" width="471" cellspacing="0" cellpadding="10">
<tbody>
<tr>
<td style="border: 0; color: #c1d46b; font-family: Arial; font-size: 12px; line-height: 125%; text-align: center;" colspan="2" valign="middle"></td>
</tr>
</tbody>
</table>
</td>
</tr>
</tbody>
</table>
</td>
</tr>
</tbody>
</table>
</td>
</tr>
</tbody>
</table>
</div>';
$admin_template_newsletter_green ='<div style="background-color: #f5f5f5; width: 100%; margin: 0; padding: 70px 0 70px 0;">
<table border="0" width="100%" cellspacing="0" cellpadding="0">
<tbody>
<tr>
<td align="center" valign="top">
<table style="background-color: #98b709; color: #ffffff; border-top-left-radius: 6px!important; border-top-right-radius: 6px!important; border-bottom: 0; font-family: Arial; font-weight: bold; line-height: 100%; vertical-align: middle;" border="0" width="600" cellspacing="0" cellpadding="0" bgcolor="#98B709">
<tbody>
<tr>
<td align="center" valign="top">
<table style="background-color: #98b709; color: #ffffff; border-top-left-radius: 6px!important; border-top-right-radius: 6px!important; border-bottom: 0; font-family: Arial; font-weight: bold; line-height: 100%; vertical-align: middle;" border="0" width="600" cellspacing="0" cellpadding="0" bgcolor="#98b709">
<tbody>
<tr>
<td>
<h1 style="color: #ffffff; margin: 0; padding: 28px 24px; display: block; font-family: Arial; font-size: 30px; font-weight: bold; text-align: left; line-height: 150%;"><a style="color: #ffffff;text-decoration:none;" href="'.site_url().'" target="_blank">'.get_bloginfo().'</a></h1>
</td>
</tr>
</tbody>
</table>
</td>
</tr>
<tr>
<td align="center" valign="top">
<table border="0" width="600" cellspacing="0" cellpadding="0">
<tbody>
<tr>
<td style="background-color: #fdfdfd; border-radius: 6px!important;" valign="top">
<table border="0" width="100%" cellspacing="0" cellpadding="20">
<tbody>
<tr>
<td valign="top">
<div style="color: #737373; font-family: Arial; font-size: 14px; line-height: 150%; text-align: left;">

&nbsp;

You have received a new "Newsletter Subscriber".
<table style="width: 550px; border: 1px solid #eeeeee; height: 73px;" border="1" cellspacing="0" cellpadding="6">
<tfoot>
<tr>
<th style="text-align: left; border: 1px solid #eee; border-top-width: 4px;" colspan="2" scope="row">Name :</th>
<td style="text-align: left; border: 1px solid #eee; border-top-width: 4px;">[contact_name]</td>
</tr>
<tr>
<th style="text-align: left; border: 1px solid #eee;" colspan="2" scope="row">Email :</th>
<td style="text-align: left; border: 1px solid #eee;">[contact_email]</td>
</tr>
</tfoot>
</table>
</div></td>
</tr>
<tr>
<td style="color: #737373;">Regards</td>
</tr>
<tr>
<td style="color: #737373;"><a style="color: #737373; text-decoration: none;" href="'.site_url().'" target="_blank">'.get_bloginfo().'</a></td>
</tr>
</tbody>
</table>
</td>
</tr>
</tbody>
</table>
</td>
</tr>
<tr>
<td align="center" valign="top">
<table style="border-top: 0;" border="0" width="600" cellspacing="0" cellpadding="10">
<tbody>
<tr>
<td valign="top">
<table border="0" width="100%" cellspacing="0" cellpadding="10">
<tbody>
<tr>
<td style="border: 0; color: #c1d46b; font-family: Arial; font-size: 12px; line-height: 125%; text-align: center;" colspan="2" valign="middle"></td>
</tr>
</tbody>
</table>
</td>
</tr>
</tbody>
</table>
</td>
</tr>
</tbody>
</table>
</td>
</tr>
</tbody>
</table>
</div>';


update_option('iv_directories_admin_email_newsletter_green', $admin_template_newsletter_green ); 
update_option('iv_directories_client_email_newsletter_green', $client_template_newsletter_green );


$sucess_message='The mail has been sent successfully';
update_option('iv_directories_success_message', $sucess_message );
$iv_directories_fail_message='Not send. Please try again';
update_option('iv_directories_fail_message', $iv_directories_fail_message );

update_option('iv_directories_auto_reply','yes' );

$form_content=trim('<link href="'.wp_iv_directories_URLPATH.'admin/files/css/iv-bootstrap.css" rel="stylesheet" media="screen">
	
	<style>

		/* Styles that are also copied for Preview */
		body {
			margin: 0px 10 100 0px;
		}

		.control-label {
			display: inline-block !important;
			pasdding-top: 5px;
			text-align: right;
			vertical-align: baseline;
			padding-right: 10px;
		}
		.top-buffer { margin-top:20px; }

		.droppedField > input,select, button, .checkboxgroup, .selectmultiple, .radiogroup {
			margin-top: 10px;

			margin-right: 10px;
			margin-bottom: 10px;
		}	
		.action-bar .droppedField {
			float: left;
			padding-left:5px;
		}
		.chili{color:red}
		.chili:before{content:" *"}	

		
</style>
<div class="bootstrap-wrapper "><div class="container-fluid">
								<form id="iv_directories_0" name="iv_directories_0" class="form-horizontal" role="form" onsubmit="return false;">
									

									<div class="row">
										<div id="selected-column-1" class=" droppedFields min-height col-md-12 drop_dashed">
										<div class="form-group row droppedField" style=":12;" id="CTRL-DIV-1">									
										<label for="text" class="col-md-4 control-label">Full Name<span class="chili"></span></label>
										<div class="col-md-8">
											<input type="text" name="contact_name" class="form-control ctrl-textbox" placeholder="Enter full name" required="" alt="required">

										</div>
									</div><div class="form-group row droppedField" style=":12;" id="CTRL-DIV-2">									
										<label for="email" class="col-md-4 control-label">Email Address<span class="chili"></span></label>
										<div class="col-md-8">
											<input type="email" name="contact_email" class="form-control ctrl-textbox" placeholder="Enter email address" required="" alt="required">
										</div>
									</div><div class="form-group row droppedField" style=":12;" id="CTRL-DIV-3">									
										<label for="text" class="col-md-4 control-label">Message<span class="chili"></span></label>
										<div class="col-md-8">
											<textarea name="contact_content" class="form-control ctrl-textarea" placeholder="Enter Message" rows="5" required=""></textarea>

										</div>
									</div><div class="form-group row droppedField" style=":12;" id="CTRL-DIV-4">
										
										<label for="text" class="col-md-4 control-label">Are you human?<span class="chili"></span></label>
										
										<div class="col-md-4" id="display_math">										
											<h3> 9 + 15 = ?</h3>
										</div>
										<div class="col-md-4">	
											<input type="hidden" id="captcha_answer" name="captcha_answer" value="24">								
											<input type="text" name="contact_captcha" id="contact_captcha" class="form-control ctrl-textbox" placeholder="Result?" required="" alt="required">
											
										</div>
									</div><div class="form-group row droppedField" style=":12;" id="CTRL-DIV-5">									
										<label for="text" class="col-md-4 control-label"></label>
										<div class="col-md-8">
											<button id="submit_iv_directories_0" type="button" class="btn btn-success ctrl-btn btn-lg">Submit</button>					
										</div>
									</div></div>							
									</div>															
									<input type="hidden" name="hidden_form_name" id="hidden_form_name" value="iv_directories_0">
								</form>					
							</div></div><script type="text/javascript">

		
		jQuery(document).ready(function(){
			jQuery("#submit_iv_directories_0").on("click",function(){
						// validation
						var form_name = "#"+this.form.name
						var valid = 1;
						var succes_mess= "The mail has been sent successfully";
						var fail_mess= "Not send. Please try again";
						var loader_image = "<img src=\''.WP_PLUGIN_URL.'\'admin/files/images/loader.gif\' />";
						var values = {};
						jQuery.each(jQuery(form_name).serializeArray(), function(i, field) {
							values[field.name] = field.value;
						});
						jQuery.each(values, function(name,value) {
							var field_name = "[name="+name+"]";
							var label_name = jQuery("[name="+name+"]").parent().prev().text()
							val = jQuery(field_name).attr("required");
							if (typeof val !== "undefined") {
								if(value==""){
									valid =0;
									jQuery(field_name).css("border-color","red");
									alert("A required field ("+jQuery.trim(label_name)+") is empty");
									return false;
								}
								else{
									jQuery(field_name).css("border-color","#cccccc");
								}
							}
						});
						// end validation
						if(valid == 1){
							var ajaxurl = "'.wp_iv_directories_ADMINPATH.'admin-ajax.php"
							var search_params={
								"action"  : "iv_directories_submit",
								"form_data":	jQuery("#iv_directories_0").serialize(), 
							};
							jQuery.ajax({					
								url : ajaxurl,								
								dataType : "json",
								type : "post",
								data : search_params,
								success : function(response){
									if(response=="success"){
										alert(succes_mess);
										jQuery("#iv_directories_0")[0].reset();
									}
									if(response=="mail-error"){
										alert(fail_mess);
									}
									if(response=="captcha_error"){
										alert("Math Error: You have entered an incorrect result value. Please try again.");
									}
								}
							});
						}

					});


	});

		
</script><script type="text/javascript"> jQuery(document).ready(function(){
							var lower= 5;
							var upper= 50;
							var first_number= Math.floor(Math.random() * lower) + 1;
							var second_number = Math.floor(Math.random() * upper) + 1;
							var result_number= first_number + second_number;
							jQuery("#display_math").html("<h3> "+first_number +" + "+second_number +"= ?</h3>");
							jQuery("#captcha_answer").val(result_number);										
						});</script>

');


$iv_directories_content_edit='	<form id="contact_form_iv" name="contact_form_iv" class="form-horizontal" role="form" onsubmit="return false;">
									

									<div class="row">
										<div id="selected-column-1" class="well2 droppedFields min-height change_width_iv drop_dashed ui-droppable ui-sortable">
										<div class="form-group draggableField row ui-draggable droppedField" style="z-index:12;" id="CTRL-DIV-1">									
										<label for="text" class="col-md-4 control-label">Full Name<span class="chili"></span></label>
										<div class="col-md-8">
											<input type="text" name="contact_name" class="form-control ctrl-textbox" placeholder="Enter full name" required="" alt="required">

										</div>
									</div><div class="form-group draggableField row ui-draggable droppedField" style="z-index:12;" id="CTRL-DIV-2">									
										<label for="email" class="col-md-4 control-label">Email Address<span class="chili"></span></label>
										<div class="col-md-8">
											<input type="email" name="contact_email" class="form-control ctrl-textbox" placeholder="Enter email address" required="" alt="required">
										</div>
									</div><div class="form-group draggableField row ui-draggable droppedField" style="z-index:12;" id="CTRL-DIV-3">									
										<label for="text" class="col-md-4 control-label">Message<span class="chili"></span></label>
										<div class="col-md-8">
											<textarea name="contact_content" class="form-control ctrl-textarea" placeholder="Enter Message" rows="5" required=""></textarea>

										</div>
									</div><div class="form-group draggableField row ui-draggable droppedField" style="z-index:12;" id="CTRL-DIV-4">
										
										<label for="text" class="col-md-4 control-label">Are you human?<span class="chili"></span></label>
										
										<div class="col-md-4 " id="display_math">										
											<h3> 9 + 15 = ?</h3>
										</div>
										<div class="col-md-4">	
											<input type="hidden" id="captcha_answer" name="captcha_answer" value="24">								
											<input type="text" name="contact_captcha" id="contact_captcha" class="form-control ctrl-textbox" placeholder="Result?" required="" alt="required">
											
										</div>
									</div><div class="form-group draggableField row ui-draggable droppedField" style="z-index:12;" id="CTRL-DIV-5">									
										<label for="text" class="col-md-4 control-label"></label>
										<div class="col-md-8">
											<button id="submit_iv_directories" type="button" class="btn btn-success ctrl-btn btn-lg">Submit</button>					
										</div>
									</div></div>							
									</div>															
									<input type="hidden" name="hidden_form_name" id="hidden_form_name" value="iv_directories_0">
								</form>					
							';

global $wpdb;

	$form_name='iv_directories_account_form';	
	
	$last_post_id = $wpdb->get_var("SELECT ID FROM $wpdb->posts WHERE post_name = '" . $form_name . "' ORDER BY `ID` DESC");
	
	

if($last_post_id==""){
	$form_title='User Registration Form';
	$my_post_form = array(
		'post_title'    => wp_strip_all_tags( $form_title),
		'post_name'    => wp_strip_all_tags( $form_name),
		'post_content'  => $form_content,
		'post_status'   => 'draft',
		'post_author'   =>  get_current_user_id(),	
		'post_type'		=> 'post',
		);
	$newpost_id= wp_insert_post( $my_post_form );			
	
	$post_type = 'iv_directories';
	$query = "UPDATE {$wpdb->prefix}posts SET post_type='".$post_type."' WHERE id='".$newpost_id."' LIMIT 1";
	$wpdb->query($query);		
	
	
	update_post_meta($newpost_id, 'iv_directories_content', $iv_directories_content_edit);
	update_post_meta($newpost_id, 'iv_directories_auto_email', $client_email_template );
	update_post_meta($newpost_id, 'iv_directories_admin_email', $admin_email_template );
	
	update_post_meta($newpost_id, 'iv_directories_email_template_type', 'green' );
	update_post_meta($newpost_id, 'iv_directories_width', 'col-md-12');
	
	$iv_directories_admin_email_subject = get_bloginfo().': Contact Us';
	update_post_meta($newpost_id, 'iv_directories_admin_email_subject', $iv_directories_admin_email_subject);									
	update_post_meta($newpost_id, 'iv_directories_auto_email_subject', $iv_directories_admin_email_subject);
	
}



//Newsletter subscribing 

$form_content_newsletter='<link href="'.wp_iv_directories_URLPATH.'admin/files/css/iv-bootstrap.css" rel="stylesheet" media="screen">
	
	<style>
	/* Styles that are also copied for Preview */
		body {
			margin: 0px 10 100 0px;
		}
	
	.control-label {
		display: inline-block !important;
		pasdding-top: 5px;
		text-align: right;
		vertical-align: baseline;
		padding-right: 10px;
	}
	.top-buffer { margin-top:20px; }
	
	.droppedField > input,select, button, .checkboxgroup, .selectmultiple, .radiogroup {
		margin-top: 10px;
		
		margin-right: 10px;
		margin-bottom: 10px;
	}	
	.action-bar .droppedField {
		float: left;
		padding-left:5px;
	}	
	.vcenter{				
		display : table-cell;
		vertical-align : middle !important;				
		float:none;
	}
	.chili{color:red}
	.chili:before{content:" *"}

	
</style>
<div class="bootstrap-wrapper "><div class="container-fluid iv-custom-width">	
														
									
														
									
														
								
								<form id="iv_directories_1" name="iv_directories_1" class="form-horizontal" role="form" onsubmit="return false;">
									

									<div class="row">
										<div id="selected-column-1" class=" droppedFields min-height  drop_dashed activeDroppable"><div class="text-center" id="loading"> </div>
										<div class="form-group row ui-draggable-handle droppedField" style=":12;" id="CTRL-DIV-1">									
										<label for="text" class="col-md-4 control-label">Name<span class="chili"></span></label>
										<div class="col-md-8">
											<input type="text" name="contact_name" class="form-control ctrl-textbox" placeholder="Enter Name" required="" alt="required">

										</div>
									</div><div class="form-group row ui-draggable-handle droppedField" style=": 12;" id="CTRL-DIV-2">									
										<label for="email" class="col-md-4 control-label">Email<span class="chili"></span></label>
										<div class="col-md-8">
											<input type="email" name="contact_email" class="form-control ctrl-textbox" placeholder="Enter Email" alt="required" required="">
										</div>
									</div><div class="form-group row ui-draggable-handle droppedField" style=":12;" id="CTRL-DIV-3">									
										<label for="text" class="col-md-4 control-label"></label>
										<div class="col-md-8">
											<button id="submit_iv_directories_1" type="button" class="btn btn-success ctrl-btn">Subscribe Now</button>						
										</div>
									</div></div>							
									</div>															
									<input type="hidden" name="hidden_form_name" id="hidden_form_name" value="iv_directories_1">
								</form>					
														
														
														
							</div></div><script type="text/javascript">
		
	
	jQuery(document).ready(function(){
		jQuery("#submit_iv_directories_1").on("click",function(){
						// validation
						var form_name = "#"+this.form.name
						var valid = 1;
						var succes_mess= "The mail has been sent successfully";
						var fail_mess= "Not send. Please try again";
						var loader_image = "<img  src=\''.wp_iv_directories_URLPATH.'\admin/files/images/loader.gif\' />";
					
						
						var values = {};
						jQuery.each(jQuery(form_name).serializeArray(), function(i, field) {
							values[field.name] = field.value;
						});
						jQuery.each(values, function(name,value) {
							var field_name = "[name="+name+"]";
							var label_name = jQuery("[name="+name+"]").parent().prev().text()
							val = jQuery(field_name).attr("required");
							if (typeof val !== "undefined") {
								if(value==""){
									valid =0;
									jQuery(field_name).css("border-color","red");
									alert("A required field ("+jQuery.trim(label_name)+") is empty");
									return false;
								}
								else{
									jQuery(field_name).css("border-color","#cccccc");
								}
							}
							if((name.indexOf("contact_email") !== -1) && jQuery.trim(value)!=""){
								if(!isValidEmailAddress(jQuery.trim(value))){
									valid =0;
									jQuery(field_name).css("border-color","red");
									alert("Email address is invalid");
									return false;
								}
								else{
									jQuery(field_name).css("border-color","#cccccc");
								}
							}
							if((name.indexOf("contact_email") !== -1) && jQuery.trim(value)=="" && typeof val === "undefined"){
								jQuery(field_name).css("border-color","#cccccc");
							}
						});
						// end validation
						if(valid == 1){
							var ajaxurl = "'.wp_iv_directories_ADMINPATH.'admin-ajax.php";
							var search_params={
								"action"  : "iv_directories_submit",
								"form_data":	jQuery("#iv_directories_1").serialize(), 
							};
							
							jQuery("#loading").html(loader_image);
							jQuery.ajax({					
								url : ajaxurl,								
								dataType : "json",
								type : "post",
								data : search_params,
								success : function(response){
									jQuery("#loading").html("");
									if(response=="success"){
										alert(succes_mess);
										jQuery("#iv_directories_1")[0].reset();
									}
									if(response=="mail-error"){
										alert(fail_mess);
									}
									if(response=="captcha_error"){
										alert("Math Error: You have entered an incorrect result value. Please try again.");
									}
								}
							});
						}

					});


	});
	function isValidEmailAddress(emailAddress) {
		var pattern = new RegExp(/^((([a-z]|\d|[!#\$%&"\*\+\-\/=\?\^_`{\|}~]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])+(\.([a-z]|\d|[!#\$%&"\*\+\-\/=\?\^_`{\|}~]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])+)*)|((\x22)((((\x20|\x09)*(\x0d\x0a))?(\x20|\x09)+)?(([\x01-\x08\x0b\x0c\x0e-\x1f\x7f]|\x21|[\x23-\x5b]|[\x5d-\x7e]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])|(\\([\x01-\x09\x0b\x0c\x0d-\x7f]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]))))*(((\x20|\x09)*(\x0d\x0a))?(\x20|\x09)+)?(\x22)))@((([a-z]|\d|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])|(([a-z]|\d|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])([a-z]|\d|-|\.|_|~|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])*([a-z]|\d|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])))\.)+(([a-z]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])|(([a-z]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])([a-z]|\d|-|\.|_|~|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])*([a-z]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])))\.?$/i);
		return pattern.test(emailAddress);
	}
		
		
</script>

';



$iv_directories_content_edit_newsletter='				
								
								<form id="contact_form_iv" name="contact_form_iv" class="form-horizontal" role="form" onsubmit="return false;">
									

									<div class="row">
										<div id="selected-column-1" class="well2 droppedFields min-height  drop_dashed ui-droppable ui-sortable activeDroppable"><div class="text-center" id="loading"> </div>
										<div class="form-group draggableField row ui-draggable ui-draggable-handle droppedField" style="z-index:12;" id="CTRL-DIV-1">									
										<label for="text" class="col-md-4 control-label">Name<span class="chili"></span></label>
										<div class="col-md-8">
											<input type="text" name="contact_name" class="form-control ctrl-textbox" placeholder="Enter Name" alt="required" required="">

										</div>
									</div><div class="form-group draggableField row ui-draggable ui-draggable-handle droppedField" style="z-index: 12;" id="CTRL-DIV-2">									
										<label for="email" class="col-md-4 control-label">Email <span class="chili"></span></label>
										<div class="col-md-8">
											<input type="email" name="contact_email" class="form-control ctrl-textbox" placeholder="Enter Email" alt="required" required="">
										</div>
									</div><div class="form-group draggableField row ui-draggable ui-draggable-handle droppedField" style="z-index:12;" id="CTRL-DIV-3">									
										<label for="text" class="col-md-4 control-label"></label>
										<div class="col-md-8">
											<button id="submit_iv_directories" type="button" class="btn btn-success ctrl-btn" name=""> Subscribe Now</button>						
										</div>
									</div></div>							
									</div>															
									<input type="hidden" name="hidden_form_name" id="hidden_form_name" value="iv_directories_1">
								</form>					
														
							';

$client_email_template_newsletter='<div style="background-color: #f5f5f5; width: 100%; margin: 0; padding: 70px 0 70px 0;">
<table border="0" width="100%" cellspacing="0" cellpadding="0">
<tbody>
<tr>
<td align="center" valign="top">
<table style="background-color: #98b709; color: #ffffff; border-top-left-radius: 6px!important; border-top-right-radius: 6px!important; border-bottom: 0; font-family: Arial; font-weight: bold; line-height: 100%; vertical-align: middle;" border="0" width="600" cellspacing="0" cellpadding="0" bgcolor="#98B709">
<tbody>
<tr>
<td align="center" valign="top">
<table style="background-color: #98b709; color: #ffffff; border-top-left-radius: 6px!important; border-top-right-radius: 6px!important; border-bottom: 0; font-family: Arial; font-weight: bold; line-height: 100%; vertical-align: middle;" border="0" width="600" cellspacing="0" cellpadding="0" bgcolor="#98b709">
<tbody>
<tr>
<td>
<h1 style="color: #ffffff; margin: 0; padding: 28px 24px; display: block; font-family: Arial; font-size: 30px; font-weight: bold; text-align: left; line-height: 150%;"><a style="color: #ffffff;text-decoration:none;" href="'.site_url().'" target="_blank">'.get_bloginfo().'</a></h1>
</td>
</tr>
</tbody>
</table>
</td>
</tr>
<tr>
<td align="center" valign="top">
<table border="0" width="600" cellspacing="0" cellpadding="0">
<tbody>
<tr>
<td style="background-color: #fdfdfd; border-radius: 6px!important;" valign="top">
<table border="0" width="100%" cellspacing="0" cellpadding="20">
<tbody>
<tr>
<td valign="top">
<div style="color: #737373; font-family: Arial; font-size: 14px; line-height: 150%; text-align: left;">Dear [contact_name],</div>
<div style="color: #737373; font-family: Arial; font-size: 14px; line-height: 150%; text-align: left;"></div>
<div style="color: #737373; font-family: Arial; font-size: 14px; line-height: 150%; text-align: left;">

Thanks for subscription. You should begin receiving newsletters immediately.

Please do not hesitate to call or email us should you have any questions in the meantime.

</div></td>
</tr>
<tr>
<td style="color: #737373;">Regards,</td>
</tr>
<tr>

<td style="color: #737373;"><a style="color: #737373; text-decoration: none;" href="'.site_url().'" target="_blank">'.get_bloginfo().'</a></td>
</tr>
</tbody>
</table>
</td>
</tr>
</tbody>
</table>
</td>
</tr>
<tr>
<td align="center" valign="top">
<table style="border-top: 0;" border="0" width="600" cellspacing="0" cellpadding="10">
<tbody>
<tr>
<td valign="top">
<table style="height: 35px;" border="0" width="471" cellspacing="0" cellpadding="10">
<tbody>
<tr>
<td style="border: 0; color: #c1d46b; font-family: Arial; font-size: 12px; line-height: 125%; text-align: center;" colspan="2" valign="middle"></td>
</tr>
</tbody>
</table>
</td>
</tr>
</tbody>
</table>
</td>
</tr>
</tbody>
</table>
</td>
</tr>
</tbody>
</table>
</div>';
$admin_email_template_newsletter ='<div style="background-color: #f5f5f5; width: 100%; margin: 0; padding: 70px 0 70px 0;">
<table border="0" width="100%" cellspacing="0" cellpadding="0">
<tbody>
<tr>
<td align="center" valign="top">
<table style="background-color: #98b709; color: #ffffff; border-top-left-radius: 6px!important; border-top-right-radius: 6px!important; border-bottom: 0; font-family: Arial; font-weight: bold; line-height: 100%; vertical-align: middle;" border="0" width="600" cellspacing="0" cellpadding="0" bgcolor="#98B709">
<tbody>
<tr>
<td align="center" valign="top">
<table style="background-color: #98b709; color: #ffffff; border-top-left-radius: 6px!important; border-top-right-radius: 6px!important; border-bottom: 0; font-family: Arial; font-weight: bold; line-height: 100%; vertical-align: middle;" border="0" width="600" cellspacing="0" cellpadding="0" bgcolor="#98b709">
<tbody>
<tr>
<td>
<h1 style="color: #ffffff; margin: 0; padding: 28px 24px; display: block; font-family: Arial; font-size: 30px; font-weight: bold; text-align: left; line-height: 150%;"><a style="color: #ffffff;text-decoration:none;" href="'.site_url().'" target="_blank">'.get_bloginfo().'</a></h1>
</td>
</tr>
</tbody>
</table>
</td>
</tr>
<tr>
<td align="center" valign="top">
<table border="0" width="600" cellspacing="0" cellpadding="0">
<tbody>
<tr>
<td style="background-color: #fdfdfd; border-radius: 6px!important;" valign="top">
<table border="0" width="100%" cellspacing="0" cellpadding="20">
<tbody>
<tr>
<td valign="top">
<div style="color: #737373; font-family: Arial; font-size: 14px; line-height: 150%; text-align: left;">

&nbsp;

You have received a new "Newsletter Subscriber".
<table style="width: 550px; border: 1px solid #eeeeee; height: 73px;" border="1" cellspacing="0" cellpadding="6">
<tfoot>
<tr>
<th style="text-align: left; border: 1px solid #eee; border-top-width: 4px;" colspan="2" scope="row">Name :</th>
<td style="text-align: left; border: 1px solid #eee; border-top-width: 4px;">[contact_name]</td>
</tr>
<tr>
<th style="text-align: left; border: 1px solid #eee;" colspan="2" scope="row">Email :</th>
<td style="text-align: left; border: 1px solid #eee;">[contact_email]</td>
</tr>
</tfoot>
</table>
</div></td>
</tr>
<tr>
<td style="color: #737373;">Regards</td>
</tr>
<tr>
<td style="color: #737373;"><a style="color: #737373; text-decoration: none;" href="'.site_url().'" target="_blank">'.get_bloginfo().'</a></td>
</tr>
</tbody>
</table>
</td>
</tr>
</tbody>
</table>
</td>
</tr>
<tr>
<td align="center" valign="top">
<table style="border-top: 0;" border="0" width="600" cellspacing="0" cellpadding="10">
<tbody>
<tr>
<td valign="top">
<table border="0" width="100%" cellspacing="0" cellpadding="10">
<tbody>
<tr>
<td style="border: 0; color: #c1d46b; font-family: Arial; font-size: 12px; line-height: 125%; text-align: center;" colspan="2" valign="middle"></td>
</tr>
</tbody>
</table>
</td>
</tr>
</tbody>
</table>
</td>
</tr>
</tbody>
</table>
</td>
</tr>
</tbody>
</table>
</div>';


$form_name='iv_directories_1';
$form_title='Newsletter Subscription';
$last_post_id = $wpdb->get_var("SELECT ID FROM $wpdb->posts WHERE post_name = '" . $form_name . "' ORDER BY `ID` DESC");

if($last_post_id==""){
	$my_post_form = array(
		'post_title'    => wp_strip_all_tags( $form_title),
		'post_name'    => wp_strip_all_tags( $form_name),
		'post_content'  => $form_content_newsletter,
		'post_status'   => 'draft',
		'post_author'   =>  get_current_user_id(),	
		'post_type'		=> 'post',
		);
	 $newpost_id= wp_insert_post( $my_post_form );			
	
	$post_type = 'iv_directories';
	$query = "UPDATE {$wpdb->prefix}posts SET post_type='".$post_type."' WHERE id='".$newpost_id."' LIMIT 1";
	$wpdb->query($query);		
	
	
	update_post_meta($newpost_id, 'iv_directories_content', $iv_directories_content_edit_newsletter);
	update_post_meta($newpost_id, 'iv_directories_auto_email', $client_email_template_newsletter );
	update_post_meta($newpost_id, 'iv_directories_admin_email', $admin_email_template_newsletter );
	
	update_post_meta($newpost_id, 'iv_directories_email_template_type', 'newsletter_green' );
	
	update_post_meta($newpost_id, 'iv_directories_width', 'col-md-12');
	
	$iv_directories_admin_email_subject = get_bloginfo().': Newsletter Subscription';
	update_post_meta($newpost_id, 'iv_directories_admin_email_subject', $iv_directories_admin_email_subject);									
	update_post_meta($newpost_id, 'iv_directories_auto_email_subject',  $iv_directories_admin_email_subject);
	
}
?>
