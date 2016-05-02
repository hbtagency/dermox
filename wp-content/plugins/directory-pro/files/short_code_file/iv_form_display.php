<link href="http://localhost/affiliate_plugins/wp-content/plugins/iv_directories_builder/admin/files/css/iv-bootstrap.css" rel="stylesheet" media="screen">
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
				
				.droppedField {
					padding-left:5px;
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

			
</style>
<div class="bootstrap-wrapper "><div class="container"> 
						<form id="Form_0" name="Form_0" class="form-horizontal" role="form">		
						<!--[if lt IE 9]>
						<div class="row" id="form-title-div">
								<label>Type form title here...</label>
						</div>
						<![endif]-->
											
						
						
						<div class="row top-buffer" style="z-index: 72;">
						</div>
						
						<div class="row" style="z-index: 70;">
							<div id="selected-column-1" class="col-md-6 droppedFields" style="z-index: 96;">
							<div class="form-group row droppedField" style="z-index: 69;" id="CTRL-DIV-1">									
									<label for="text" class="col-md-3 control-label">Text Input</label>
									<div class="col-md-9" style="z-index: 107;">
										<input type="text" name="text" class="form-control ctrl-textbox" placeholder="Text">
									</div>
								</div><div class="form-group row droppedField" style="z-index: 63;" id="CTRL-DIV-2">									
									<label for="text" class="col-md-3 control-label">Email</label>
									<div class="col-md-9" style="z-index: 110;">
										<input type="email" name="text" class="form-control ctrl-textbox" placeholder="Enter email address">
									</div>
								</div><div class="form-group row droppedField" style="z-index: 62;" id="CTRL-DIV-3">									
									<label for="text" class="col-md-3 control-label">Text Area</label>
									<div class="col-md-9" style="z-index: 111;">
										<textarea name="textcontent" class="form-control ctrl-textarea" placeholder="Enter Content" rows="5"></textarea>
										
									</div>
								</div></div>
							<div id="selected-column-2" class="col-md-6 droppedFields" style="z-index: 117;">
							
							</div>
						</div>
						
						<!-- Action bar - Suited for buttons on form -->
							<div class="row" style="z-index: 61;">								
								<div class="col-md-6" style="z-index: 118;">
										<div id="selected-action-column-1" class="col-md-3 action-bar droppedFields" style="z-index: 119;">
											
										</div>
										<div id="selected-action-column-2" class="col-md-9 action-bar droppedFields" style="z-index: 120;">
											
										<div class="row droppedField" style="z-index: 135;" id="CTRL-DIV-4">
								<button type="button" class="btn btn-success ctrl-btn" onclick="send_contact_Form_0();"><i class="icon-ok-sign icon-white"></i> Send Now</button>
							</div></div>
								
								</div>
									
									<div class="col-md-6" style="z-index: 121;">
										<div id="selected-action-column-3" class="col-md-3 action-bar droppedFields" style="z-index: 122;">
											
										</div>
										<div id="selected-action-column-4" class="col-md-9 action-bar droppedFields" style="z-index: 123;">
											
										</div>
									</div>							
							</div>
						</form>				
					</div></div><script>

			  function send_contact_Form_0(){
				  var form = $('#my_awesome_form');
						var search_params={
							  "action"  : "iv_directories_submit",				  
							  		  
							 
							};
							jQuery.ajax({					
							  url : ajaxurl,
							  // url : '/json/demo-baby.json',
							  dataType : "json",
							  type : "post",
							  data : search_params,
							  success : function(response){
								 conlose.log(response.code);
							  }
							});
			  }
		
</script>
