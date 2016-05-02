		<style>	
		
		.activeDroppable {
			background-color: #eeffee;
		}

		.hoverDroppable {
			background-color: lightgreen;
		}

		.draggableField {
			/* float: left; */
			padding-left:5px;
		}
		
		.draggableField > input,select, button, .checkboxgroup, .selectmultiple, .radiogroup {
			margin-top: 10px;
			
			margin-right: 10px;
			margin-bottom: 10px;
		}

		.draggableField:hover{
			background-color: #ccffcc;
		}
		.modal-body{
			text-align:center;
		}
		.min-height{
			min-height:200px !important;
		}
		.checkbox_custom{
			margin-left:-100px !important;
		}	
		button.bookmark {
			border:none;
			background: none;
			padding: 0;
			vertical-align: middle;
		}
		.html-active .switch-html,.tmce-active .switch-tmce {
			height: 28px!important;
		}
		.wp-switch-editor {
			height: 28px!important;
		}
		.vcenter {
			display: inline-block;
			vertical-align: middle;
			float: none;
		}
		<!--
		.bg-image_drag{
			background-image: url(<?php echo wp_iv_directories_URLPATH; ?>admin/files/images/DragDropFile.png);
			background-position:center center;
		}
		-->
		.custom_style{
			background:url("<?php echo wp_iv_directories_URLPATH; ?>admin/files/images/images1.jpg") center 60% no-repeat;
			text-align:center;
		}
		.custom_style:before{content:"Drop Here From Left"; margin-top:100px;}
		.drop_dashed{border: 2px dashed grey;}
		.arrow_right{margin-top:195px;}
		.onlypadding{padding:0 8px 0 11px}
		.chili{color:red}
		.chili:before{content:" *"}
		</style>
		
		
	</style>
	
	
	<style id="content-styles">
	/* Styles that are also copied for Preview */
	
	.vcenter{				
		display : table-cell;
		vertical-align : middle !important;				
		float:none;
	}
	.chili{color:red}
	.chili:before{content:" *"}

	</style>
	
	<script id="content-script">		
	
	jQuery(document).ready(function(){
		jQuery("#submit_iv_directories").on("click",function(){
						// validation
						var form_name = "#"+this.form.name
						var valid = 1;
						var succes_mess= "<?php echo get_option('iv_directories_success_message'); ?>";
						var fail_mess= "<?php echo get_option('iv_directories_fail_message'); ?>";
						var loader_image = "<img src='<?php echo wp_iv_directories_URLPATH. 'admin/files/images/loader.gif'; ?>' />";
					
						
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
							var ajaxurl = "<?php echo admin_url('admin-ajax.php'); ?>";
							var search_params={
								"action"  : "iv_directories_submit",
								"form_data":	jQuery("#contact_form_iv").serialize(), 
							};
							
							jQuery("#loading").html(loader_image);
							jQuery.ajax({					
								url : ajaxurl,								
								dataType : "json",
								type : "post",
								data : search_params,
								success : function(response){
									jQuery('#loading').html("");
									if(response=="success"){
										alert(succes_mess);
										jQuery("#theform_contact")[0].reset();
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
			
		<script>
		jQuery(document).on("click", ".draggableField", function () {
			var me = jQuery(this)
			var ctrl = me.find("[class*=ctrl]")[0];
			var ctrl_type = jQuery.trim(ctrl.className.match("ctrl-.*")[0].split(" ")[0].split("-")[1]);
				//console.log(this.id)
				customize_ctrl(ctrl_type, this.id);
				
			});
		
		/* fucntion to check wehther right form has element or not*/
		function dropContentCheck(){
			var content = jQuery.trim(jQuery("#selected-column-1").html())
			if(content==""){
				jQuery("#selected-column-1").addClass( "custom_style" );
			}
			jQuery("#selected-column-1").addClass( "drop_dashed" );
		}
		/* function to remove drop image and text */
		function dropImageRemove(){
			jQuery("#selected-column-1").removeClass( "custom_style" );
		}
		/* Make the control draggable */
		function makeDraggable() {
			jQuery(".selectorField").draggable({ helper: "clone",stack: "div",cursor: "move", cancel: null  });
		}

		var _ctrl_index = 100;
		var name_number = 1;
		function docReady() {
				//console.log("document ready");
				dropContentCheck();		
				compileTemplates();
				
				makeDraggable();
				
				jQuery( ".droppedFields" ).droppable({
					activeClass: "activeDroppable",
					hoverClass: "hoverDroppable",
					accept: ":not(.ui-sortable-helper)",
					drop: function( event, ui ) {
						dropImageRemove();
						//console.log(event, ui);
						var draggable = ui.draggable;				
						draggable = draggable.clone();
						draggable.removeClass("selectorField");
						draggable.addClass("droppedField");
						draggable[0].id = "CTRL-DIV-"+(_ctrl_index++); // Attach an ID to the rendered control
						draggable.appendTo(this);		
						var checkInput = (jQuery(this).find("div:last input:last").attr("name"))
						if (typeof checkInput !== "undefined") {
							var currentName = jQuery(this).find('input:last').attr('name')
							var counter =-2;
							jQuery("input[name='"+currentName+"']").each(function(){counter++});
							if(counter>1){
								var newName = currentName+name_number;
								jQuery(this).find('input:last').attr('name', newName);
								if(currentName.indexOf('captcha') !== -1){
									newName = jQuery(this).find("input[type=hidden]").attr('name')+name_number
									jQuery(this).find("input[type=hidden]").attr('name', newName);
								}
								name_number++;								
							}
						}		
						

						/* Once dropped, attach the customization handler to the control */
						draggable.click(function () {
							
												// The following assumes that dropped fields will have a ctrl-defined. 
												//   If not required, code needs to handle exceptions here. 
												var me = jQuery(this)
												var ctrl = me.find("[class*=ctrl]")[0];
												var ctrl_type = jQuery.trim(ctrl.className.match("ctrl-.*")[0].split(" ")[0].split("-")[1]);
												customize_ctrl(ctrl_type, this.id);
												//window["customize_"+ctrl_type](this.id);
											});

						makeDraggable();
					}
				});		

		/* Make the droppedFields sortable and connected with other droppedFields containers*/
		jQuery( ".droppedFields" ).sortable({
												cancel: null, // Cancel the default events on the controls
												connectWith: ".droppedFields"
											}).disableSelection();
	}
	

			/*
				Preview the customized form 
					-- Opens a new window and renders html content there.
					*/
					function update_the_form() {
						
						tinyMCE.triggerSave();			
						
						
						var selected_content =jQuery("#selected-content").clone();
						selected_content.find("div").each(function(i,o) {
							var obj = jQuery(o)
							obj.removeClass("draggableField ui-draggable well ui-droppable ui-sortable");
						});
						selected_content.find("#form-title-div").remove();
						
						var selected_content_main =jQuery("#selected-content").clone();
						selected_content_main.find("#form-title-div").remove();
						
						var selected_content_html = selected_content.html();	
						
						var scriptContent='\n'+jQuery("#content-script").html()+'\n';
						
						
						var dialogContent  ='';
						dialogContent+= '<link href="<?php echo wp_iv_directories_URLPATH; ?>admin/files/css/iv-bootstrap.css" rel="stylesheet" media="screen">\n';
						dialogContent+='<style>\n'+jQuery("#content-styles").html()+'\n</style>\n';
						
						var iv_directories_width_type = jQuery('input:radio[name=iv_directories_width]:checked').val();
						var iv_directories_width=iv_directories_width_type;	
										
						var iv_directories_width_css="";
							if(iv_directories_width_type=='custom_width'){
								var iv_directories_width_input = jQuery('#iv_directories_width-input').val();
								var iv_directories_width=iv_directories_width_input;	
								
								iv_directories_width_css ='<style>\n .iv-custom-width{ width:'+iv_directories_width_input+' !important;} \n</style>\n';
								dialogContent=dialogContent + iv_directories_width_css;
							}
						
						
						dialogContent+= '<div class="bootstrap-wrapper "><div class="container-fluid iv-custom-width">';
						dialogContent+= '';
						dialogContent+= selected_content_html;
						dialogContent+= '';

						var source_dialogContent='<br/><br/><b>Source code: </b><pre>'+jQuery('<div/>').text(dialogContent).html();+'</pre>\n\n';
						
						
						dialogContent+= '</div></div>';
						var form_elements="";
						
						jQuery('#contact_form_iv input, textarea, select').each(function() {				
							form_elements=form_elements + '|'+ jQuery(this).attr('name');
							
						});
						
						var iv_directories_auto_email=jQuery("#client_email_template").val();
						
						var iv_directories_admin_email=jQuery("#admin_email_template").val();			
						
						
						var iv_client_email =		jQuery("#client-email").val();				 
						var hidden_form_id =		jQuery("#hidden_form_id").val();
						var hidden_form_name =		jQuery("#hidden_form_name").val();  
						var search_params={
							"action"  : 				"iv_directories_update_form", 
							"source_formContent" : 	source_dialogContent,
							"form_title" : 			jQuery("[name=post-title]").val(),	
							"form_content" : 			dialogContent,
							"script_content" : 		scriptContent,					  
							"form_mdata" :     		selected_content_main.html(),
							"iv_directories_auto_email" :	iv_directories_auto_email,	
							"iv_directories_admin_email" :	iv_directories_admin_email,
							"client-email" 	:		iv_client_email,
							"hidden_form_id" 	:	hidden_form_id, 
							'hidden_form_name': 	hidden_form_name,
							"iv_directories_width" 	:	iv_directories_width,	
							"iv_directories_email_template_type" 	:jQuery("#all-tempalte").val(),	
							"iv_directories_auto_email_subject" 	:	jQuery("[name=iv_directories_auto_email_subject]").val(),	
							"iv_directories_admin_email_subject" 	:	jQuery("[name=iv_directories_admin_email_subject]").val(),	
							
						};
						jQuery.ajax({					
							url : ajaxurl,					 
							dataType : "json",
							type : "post",
							data : search_params,
							success : function(response){
								jQuery('#p_title').html('Your Form ['+jQuery("[name=post-title]").val() +']' );
								alert('Successfully Updated');
							}
						});
					//jQuery('#update_message').html('<h3>Successfully Updated</h3>');
					
					
				}
				
				if(typeof(console)=='undefined' || console==null) { console={}; console.log=function(){}}
				
				/* Delete the control from the form */
				function delete_ctrl() {
				//if(window.confirm("Are you sure about this?")) {
					var ctrl_id = jQuery("#theForm").find("[name=forCtrl]").val();
					//console.log(ctrl_id);
					
					jQuery("#"+ctrl_id).remove();
					dropContentCheck();	
				//}
			}
			
			/* Compile the templates for use */
			function compileTemplates() {
				window.templates = {};
				window.templates.common = Handlebars.compile(jQuery("#control-customize-template").html());
				
				
				// Mostly we donot need so many templates
				
				window.templates.textbox = Handlebars.compile(jQuery("#textbox-template").html());
				window.templates.passwordbox = Handlebars.compile(jQuery("#textbox-template").html());
				window.templates.combobox = Handlebars.compile(jQuery("#combobox-template").html());
				window.templates.selectmultiplelist = Handlebars.compile(jQuery("#combobox-template").html());
				window.templates.radiogroup = Handlebars.compile(jQuery("#combobox-template").html());
				window.templates.checkboxgroup = Handlebars.compile(jQuery("#combobox-template").html());
				
				
				window.templates.textarea = Handlebars.compile(jQuery("#textarea-template").html());
				window.templates.textbox = Handlebars.compile(jQuery("#textbox-template").html()+jQuery("#textbox-required-template").html());
				window.templates.passwordbox = Handlebars.compile(jQuery("#textbox-template").html()+jQuery("#textbox-required-template").html());
				
				
			}
			
			// Object containing specific "Save Changes" method
			save_changes = {};
			
			// Object comaining specific "Load Values" method. 
			load_values = {};
			
			
			/* Common method for all controls with Label and Name */
			load_values.common = function(ctrl_type, ctrl_id) {
				var form = jQuery("#theForm");
				var div_ctrl = jQuery("#"+ctrl_id);
				
				form.find("[name=label]").val(div_ctrl.find('.control-label').text())
				var specific_load_method = load_values[ctrl_type];
				if(typeof(specific_load_method)!='undefined') {
					specific_load_method(ctrl_type, ctrl_id);		
				}
			}
			
			
			
			/* Specific method to load values from a textbox control to the customization dialog */
			load_values.textbox = function(ctrl_type, ctrl_id) {
				var form = jQuery("#theForm");
				var div_ctrl = jQuery("#"+ctrl_id);
				var ctrl = div_ctrl.find("input")[0];
				if(typeof(div_ctrl.find("input")[1])!=='undefined'){
					var captchaName = jQuery(div_ctrl).find('input:last').attr('name')
					if(captchaName.indexOf('captcha') !== -1){
						ctrl = div_ctrl.find("input")[1];
					}
				}		
				form.find("[name=name]").val(ctrl.name)	;	
				form.find("[name=placeholder]").val(ctrl.placeholder);
				// start required @zea
				if(ctrl.alt=="required"){
					form.find("[name=required]").prop('checked', true);
				}
				else{
					form.find("[name=required]").prop('checked', false);
				}
				// end required
				
			}
			load_values.textarea = function(ctrl_type, ctrl_id) {
				
				var form = jQuery("#theForm");
				var div_ctrl = jQuery("#"+ctrl_id);
				var ctrl = div_ctrl.find("textarea")[0];			
				form.find("[name=name]").val(ctrl.name);		
				form.find("[name=placeholder]").val(ctrl.placeholder);
				// start required @zea
				if(ctrl.alt=="required" || ctrl.required==true){
					form.find("[name=required]").prop('checked', true);
				}
				else{
					form.find("[name=required]").prop('checked', false);
				}				
				// end required
				
			}
			
			// Passwordbox uses the same functionality as textbox - so just point to that
			load_values.passwordbox = load_values.textbox;

			
			/* Specific method to load values from a combobox control to the customization dialog  */
			load_values.combobox = function(ctrl_type, ctrl_id) {
				var form = jQuery("#theForm");
				var div_ctrl = jQuery("#"+ctrl_id);
				var ctrl = div_ctrl.find("select")[0];
				form.find("[name=name]").val(ctrl.name)
				// start required @zea
				if(ctrl.alt=="required" || ctrl.required==true){
					form.find("[name=required]").prop('checked', true);
				}
				else{
					form.find("[name=required]").prop('checked', false);
				}				
				// end required
				var options= '';
				jQuery(ctrl).find('option').each(function(i,o) { options+=o.text+'\n'; });
				form.find("[name=options]").val(jQuery.trim(options));
			}
			// Multi-select combobox has same customization features
			load_values.selectmultiplelist = load_values.combobox;
			
			
			/* Specific method to load values from a radio group */
			load_values.radiogroup = function(ctrl_type, ctrl_id) {
				var form = jQuery("#theForm");
				var div_ctrl = jQuery("#"+ctrl_id);
				var options= '';
				var ctrls = div_ctrl.find("div").find("label");
				var radios = div_ctrl.find("div").find("input");
				
				ctrls.each(function(i,o) { options+=jQuery(o).text()+'\n'; });
				form.find("[name=name]").val(radios[0].name)
				form.find("[name=options]").val(jQuery.trim(options));
				// start required @zea
				if(ctrl.alt=="required" || ctrl.required==true){
					form.find("[name=required]").prop('checked', true);
				}
				else{
					form.find("[name=required]").prop('checked', false);
				}				
				// end required
			}
			
			// Checkbox group  customization behaves same as radio group
			load_values.checkboxgroup = load_values.radiogroup;
			
			/* Specific method to load values from a checkbox */
			load_values.checkbox = load_values.radiogroup;
			
			/* Specific method to load values from a button */
			load_values.btn = function(ctrl_type, ctrl_id) {
				var form = jQuery("#theForm");
				var div_ctrl = jQuery("#"+ctrl_id);
				var ctrl = div_ctrl.find("button")[0];
				form.find("[name=name]").val(ctrl.name)		
				form.find("[name=label]").val(jQuery(ctrl).text().trim())		
			}
			
			/* Common method to save changes to a control  - This also calls the specific methods */
			
			save_changes.common = function(values) {
				var div_ctrl = jQuery("#"+values.forCtrl);
				if(values.type!="btn"){
					div_ctrl.find('.control-label').text(values.label);
				}
				var specific_save_method = save_changes[values.type];
				//console.log(values);
				if(typeof(specific_save_method)!='undefined') {
					specific_save_method(values);		
				}
			}
			
			/* Specific method to save changes to a text box */
			save_changes.textbox = function(values) {
				
				var div_ctrl = jQuery("#"+values.forCtrl);
				var ctrl = div_ctrl.find("input")[0];
				if(typeof(div_ctrl.find("input")[1])!=='undefined'){
					var captchaName = jQuery(div_ctrl).find('input:last').attr('name')
					if(captchaName.indexOf('captcha') !== -1){
						ctrl = div_ctrl.find("input")[1];
					}
				}	
				
				ctrl.placeholder = values.placeholder;
				ctrl.name = values.name;
				//changes for required field @zea
				ctrl.required = values.required;
				if(values.required == true){
					ctrl.alt="required";
					ctrl.required="required";
					div_ctrl.find('.control-label').append("<span class='chili'></span>")
				}
				else{
					ctrl.alt="";
					ctrl.required="";
					div_ctrl.find('.control-label').removeClass( "chili" )
					//ctrl.data-bv-notempty="";
				}			
				//end required
			}

			// Password box customization behaves same as textbox
			save_changes.passwordbox= save_changes.textbox;
			
			/* Specific method to save changes to a text Area */
			save_changes.textarea = function(values) {
				var div_ctrl = jQuery("#"+values.forCtrl);
				var ctrl = div_ctrl.find("textarea")[0];
				ctrl.placeholder = values.placeholder;
				ctrl.name = values.name;
				//changes for required field @zea
				ctrl.required = values.required;
				if(values.required == true){
					ctrl.alt="required";
					div_ctrl.find('.control-label').append("<span class='chili'></span>")
				}
				else{
					ctrl.alt="";
					div_ctrl.find('.control-label').removeClass( "chili" )
				}			
				//end required				
			}
			
			/* Specific method to save changes to a combobox */
			save_changes.combobox = function(values) {
				console.log(values);
				var div_ctrl = jQuery("#"+values.forCtrl);
				var ctrl = div_ctrl.find("select")[0];
				ctrl.name = values.name;
				//changes for required field @zea
				ctrl.required = values.required;
				if(values.required == true){
					ctrl.alt="required";
					div_ctrl.find('.control-label').append("<span class='chili'></span>")
				}
				else{
					ctrl.alt="";
					div_ctrl.find('.control-label').removeClass( "chili" )
				}			
				//end required
				jQuery(ctrl).empty();
				jQuery(values.options.split('\n')).each(function(i,o) {
					jQuery(ctrl).append("<option>"+jQuery.trim(o)+"</option>");
				});
			}
			
			/* Specific method to save a radiogroup */
			save_changes.radiogroup = function(values) {
				var div_ctrl = jQuery("#"+values.forCtrl);
				
				var label_template = jQuery(".selectorField .ctrl-radiogroup label")[0];
				var radio_template = jQuery(".selectorField .ctrl-radiogroup input")[0];
				
				var ctrl = div_ctrl.find(".ctrl-radiogroup");
				ctrl.empty();
				jQuery(values.options.split('\n')).each(function(i,o) {
					var label = jQuery(label_template).clone().text(jQuery.trim(o))
					var radio = jQuery(radio_template).clone();
					radio[0].name = values.name;
					//changes for required field @zea
					ctrl.required = values.required;
					if(values.required == true){
						ctrl.alt="required";
						div_ctrl.find('.control-label').append("<span class='chili'></span>")
					}
					else{
						ctrl.alt="";
						div_ctrl.find('.control-label').removeClass( "chili" )
					}			
					//end required
					label.append(radio);
					jQuery(ctrl).append(label);
				});
			}
			
			/* Same as radio group, but separated for simplicity */
			save_changes.checkboxgroup = function(values) {
				var div_ctrl = jQuery("#"+values.forCtrl);
				
				var label_template = jQuery(".selectorField .ctrl-checkboxgroup label")[0];
				var checkbox_template = jQuery(".selectorField .ctrl-checkboxgroup input")[0];
				
				var ctrl = div_ctrl.find(".ctrl-checkboxgroup");
				ctrl.empty();
				jQuery(values.options.split('\n')).each(function(i,o) {
					var label = jQuery(label_template).clone().text(jQuery.trim(o))
					var checkbox = jQuery(checkbox_template).clone();
					checkbox[0].name = values.name;
					//changes for required field @zea
					ctrl.required = values.required;
					if(values.required == true){
						ctrl.alt="required";
						div_ctrl.find('.control-label').append("<span class='chili'></span>")
					}
					else{
						ctrl.alt="";
						div_ctrl.find('.control-label').removeClass( "chili" )
					}			
					//end required
					label.append(checkbox);
					jQuery(ctrl).append(label);
				});
			}
			
			// Multi-select customization behaves same as combobox
			save_changes.selectmultiplelist = save_changes.combobox;
			
			/* Specific method for Button */
			save_changes.btn = function(values) {
				var div_ctrl = jQuery("#"+values.forCtrl);
				var ctrl = div_ctrl.find("button")[0];
				jQuery(ctrl).html(jQuery(ctrl).html().replace(jQuery(ctrl).text()," "+jQuery.trim(values.label)));
				ctrl.name = values.name;
				//console.log(values);
			}

			
			/* Save the changes due to customization 
				- This method collects the values and passes it to the save_changes.methods
				*/
				function save_customize_changes(e, obj) {
				//console.log('save clicked', arguments);
				var formValues = {};
				var val=null;
				jQuery("#theForm").find("input, textarea").each(function(i,o) {
					if(o.type=="checkbox"){
						val = o.checked;
					} else {
						val = o.value;
					}
					formValues[o.name] = val;
				});
				
				save_changes.common(formValues);
			}
			
			/*
				Opens the customization window for this
				*/
				function customize_ctrl(ctrl_type, ctrl_id) {
					
					var ctrl_params = {};

					/* Load the specific templates */
					var specific_template = templates[ctrl_type];
					if(typeof(specific_template)=='undefined') {
						specific_template = function(){return ''; };
					}
					var modal_header = jQuery("#"+ctrl_id).find('.control-label').text();
					
					var template_params = {
						header:modal_header, 
						content: specific_template(ctrl_params), 
						type: ctrl_type,
						forCtrl: ctrl_id
						
					}
					
				// Pass the parameters - along with the specific template content to the Base template
				var s = templates.common(template_params)+"";
				
				
				// jQuery("[name=customization_modal]").remove(); // Making sure that we just have one instance of the modal opened and not leaking
				jQuery('#customization_modal').html(s).modal('show');
				// jQuery('<div id="customization_modal" aria-labelledby="customization_modal" role="dialog" name="customization_modal" class="modal fade" aria-hidden="false" />').append(s).modal('show');
				
				
				setTimeout(function() {
					// For some error in the code  modal show event is not firing - applying a manual delay before load
					load_values.common(ctrl_type, ctrl_id);
				},300);
			}
			
				
			</script>
			
			<?php
			
			
			$form_id='';
			if(isset($_REQUEST['id'])){
				$form_id=$_REQUEST['id'];
			}
			$form_meta_data= get_post_meta( $form_id,'iv_directories_content',true);
			
			$queried_post = get_post($form_id); 
			if(isset($queried_post->post_title)){
				$post_title= $queried_post->post_title;
			}else{
				die();
			}
			
			
			$iv_directories_width= get_post_meta( $form_id,'iv_directories_width',true);
			$digit1 = mt_rand(1,20);
			$digit2 = mt_rand(1,20);
			if( mt_rand(0,1) === 1 ) {
				$math = "$digit1 + $digit2";
				$captcha_answer = $digit1 + $digit2;				
			} else {
				$math = "$digit1 - $digit2";
				$captcha_answer = $digit1 - $digit2;
				
			}
			
			?>
			<script>
				jQuery(function(){				 
				  var radioButton = jQuery("#fixed_width");
				  var  iv_directories_width = jQuery("#iv_directories_width-input");
				  var iv_responsive =jQuery("#Responsive"); 

					  radioButton.change(function () { 
						if( this.checked ) { 
						  iv_directories_width.show();
						}
					  });
					iv_responsive.click(function (){
					 iv_directories_width.hide(); 
					});
				});
				jQuery(function(){	
						jQuery('#all-tempalte').on('change', function (e) {
						var optionSelected = jQuery("option:selected", this);
						var valueSelected = this.value;
						
							var tempalte_params={
								"action"  : 				"iv_directories_email_admin_template_change",										
								"iv_directories_template" 	:		valueSelected,	
							};
							jQuery.ajax({					
								url : ajaxurl,					 
								//dataType : "json",
								type : "post",
								cache: false,
								data : tempalte_params,
								success : function(response){	
									 tinyMCE.get('admin_email_template').setContent(response);													
								}
							});
							var tempalte_params={
								"action"  : 				"iv_directories_email_client_template_change",										
								"iv_directories_template" 	:		valueSelected,	
							};
							jQuery.ajax({					
								url : ajaxurl,					 
								//dataType : "json",
								type : "post",
								cache: false,
								data : tempalte_params,
								success : function(response){	
									 tinyMCE.get('client_email_template').setContent(response);													
								}
							});
				
				});
			});
			
			function insert_control_name_admin(btn_name){
				 tinyMCE.get('admin_email_template').execCommand("mceInsertContent", true, btn_name);
			}
			function insert_control_name_client(btn_name){
				 tinyMCE.get('client_email_template').execCommand("mceInsertContent", true, btn_name);
			}
			
			</script>
			
				
				
			<div class="bootstrap-wrapper">
				<div class="welcome-panel container-fluid">
					 
					<div class="row">
						<div class="col-md-12" style="z-index: 1017;">
							<div id="customization_modal"  aria-labelledby="customization_modal" role="dialog" name="customization_modal" class="modal fade" aria-hidden="true"></div>
						</div>
					</div>
					
					<!-- modal email template -->
					<div class="modal fade " id="modal_template_help" tabindex="-1" role="dialog" aria-labelledby="modal_template_helpLabel" aria-hidden="true">
						<div class="modal-dialog modal-lg">
						
							<div class="modal-content">
								
							</div>
							<!-- /.modal-content -->
						</div>
						
						<!-- /.modal-dialog -->
					</div>
					
					<!-- /.modal -->
					
					
					<!-- Start Form 101 -->
					<div class="row">					
						<div class="col-xs-12" id="submit-button-holder">					
							<div class="pull-right">
								<input type="hidden" name="hidden_form_id" id="hidden_form_id" value="<?php echo $form_id; ?>">
								<button class="btn btn-info btn-lg" onclick="return update_the_form();">Update Form</button>
								
							</div>
							
						</div>
					</div>
					<div class="row">
						<div class="col-md-5"><h3 class="page-header">Form Controls <br /><small> Drag Controls to Right Panel</small> </h3>
						</div>	
						<div class="col-md-1">
						</div>
						<div class="col-md-6"><h3 class="page-header"><span id="p_title">Your Form [<?php echo $post_title; ?>] </span><br /><small> Edit Your Form Elements</small> </h3>
						</div>
					</div> 
					
					
					<div class="row" >
						
						
						<div class="col-md-12" >
							<div id="listOfFields" class="col-md-5 well tab-content">
								<div class="tab-pane active form-group" id="simple">
									
									<div class="form-group selectorField draggableField row" style="z-index:12;">									
										<label for="text" class="col-md-4 control-label">Full Name</label>
										<div class="col-md-8">
											<input type="text"  name="contact_name" class="form-control ctrl-textbox"  placeholder="Enter Full Name">

										</div>
									</div>
									<div class="form-group selectorField draggableField row" style="z-index:12;">									
										<label for="text" class="col-md-4 control-label">Subject</label>
										<div class="col-md-8">
											<input type="text"  name="contact_subject" class="form-control ctrl-textbox"  placeholder="Enter Subject">

										</div>
									</div>

									<div class="form-group selectorField draggableField row" style="z-index:12;">									
										<label for="email" class="col-md-4 control-label">Email Address</label>
										<div class="col-md-8">
											<input type="email"  name="contact_email" class="form-control ctrl-textbox"  placeholder="Enter Email Address">
										</div>
									</div> 
									<div class="form-group selectorField draggableField row" style="z-index:12;">									
										<label for="text" class="col-md-4 control-label">Phone #</label>
										<div class="col-md-8">
											<input type="text"  name="contact_phone" class="form-control ctrl-textbox"  placeholder="Enter Phone Number">

										</div>
									</div>
									<div class="form-group selectorField draggableField row" style="z-index:12;">
										<label for="text" class="col-md-4 control-label">How did you hear about us</label>
										<div class="col-md-8">
											<select name="contact_about_us" class="ctrl-combobox form-control">											
												<option value="Advertisement">Advertisement</option>
												<option value=" Email/Newsletter"> Email/Newsletter</option>
												<option value="Facebook">Facebook</option>
												<option value="Family or Friend">Family or Friend</option>
												<option value="Newspaper Story">Newspaper Story</option>
												<option value="Magazine Article">Magazine Article</option>
												<option value="Newspaper Story">Newspaper Story</option>
												<option value="TV/Cable News">TV/Cable News</option>
												<option value="Twitter">Twitter</option>
												<option value="Website/Search Engine">Website/Search Engine</option>
												<option value="YouTube">YouTube</option>
												<option value="Other">Other</option>

											</select>
										</div>
									</div>
									
									
									<div class="form-group selectorField draggableField row" style="z-index:12;">									
										<label for="text" class="col-md-4 control-label">Are you human?</label>
										
										<div class="col-md-4 " id="display_math">									
											<h3 > <?php echo $math; ?> = ?</h3>
										</div>
										<div class="col-md-4">	
											<input type="hidden"  id="captcha_answer" name="captcha_answer" value="<?php echo $captcha_answer; ?>" />									
											<input type="text"  name="contact_captcha" class="form-control ctrl-textbox"  placeholder="Result?">
											

										</div>
									</div>
									
									
									<div class="form-group selectorField draggableField row" style="z-index:12;">									
										<label for="text" class="col-md-4 control-label">Message</label>
										<div class="col-md-8">
											<textarea  name="contact_content" class="form-control ctrl-textarea" placeholder="Enter Message" rows="5"></textarea>

										</div>
									</div>

									<div class="form-group selectorField draggableField row" style="z-index:12;">									
										<label for="text" class="col-md-4 control-label"></label>
										<div class="col-md-8">
											<button  id="submit_iv_directories" type="button" class="btn btn-default ctrl-btn ">Send Now</button>										
										</div>
									</div>
									<div class="form-group selectorField draggableField row" style="z-index:12;">									
										<label for="text" class="col-md-4 control-label"></label>
										<div class="col-md-8">
											<button id="submit_iv_directories" type="button" class="btn btn-primary ctrl-btn">Submit</button>							
										</div>
									</div>
									<div class="form-group selectorField draggableField row" style="z-index:12;">									
										<label for="text" class="col-md-4 control-label"></label>
										<div class="col-md-8">
											<button  id="submit_iv_directories" type="button" class="btn btn-success ctrl-btn"  > Send Now</button>						
										</div>
									</div>
									<div class="form-group selectorField draggableField row" style="z-index:12;">									
										<label for="text" class="col-md-4 control-label"></label>
										<div class="col-md-8">
											<button id="submit_iv_directories" type="button" class="btn btn-success ctrl-btn btn-lg"  >Submit</button>					
										</div>
									</div>
									<div class="form-group selectorField draggableField row" style="z-index:12;">									
										<label for="text" class="col-md-4 control-label"></label>
										<div class="col-md-8">
											<button id="submit_iv_directories" type="button" class="btn btn-default ctrl-btn btn-lg"  >Submit</button>					
										</div>
									</div>	
									<div class="form-group selectorField draggableField row" style="z-index:12;">									
										<label for="text" class="col-md-4 control-label">First Name</label>
										<div class="col-md-8">
											<input type="text"  name="contact_fname" class="form-control ctrl-textbox"  placeholder="Enter First Name">

										</div>
									</div>
									
									<div class="form-group selectorField draggableField row" style="z-index:12;">									
										<label for="text" class="col-md-4 control-label">Last Name</label>
										<div class="col-md-8">
											<input type="text"  name="contact_lname" class="form-control ctrl-textbox"  placeholder="Enter Last Name">

										</div>
									</div>
									<div class="form-group selectorField draggableField row" style="z-index:12;">									
										<label for="text" class="col-md-4 control-label">Web Address</label>
										<div class="col-md-8">
											<input type="text"  name="contact_web" class="form-control ctrl-textbox"  placeholder="Enter Web Address">

										</div>
									</div>
									<div class="form-group selectorField draggableField row" style="z-index:12;">									
										<label for="text" class="col-md-4 control-label">Enter Date</label>
										<div class="col-md-8">
											<input type="text"  name="contact_date"   id="contact_date" class="form-control ctrl-textbox"  placeholder="Select Date">

										</div>
									</div>
									<!--
									<div class="form-group selectorField draggableField row radiogroup" style="z-index:12;">
										<label for="text" class="col-md-4 control-label">Radio Buttons</label>
										<div class="col-md-8 ctrl-radiogroup">
											<label class="radio"><input type="radio" name="radioField" value="option1" />Option 1</label>
											<label class="radio"><input type="radio" name="radioField" value="option2" />Option 2</label>
											<label class="radio"><input type="radio" name="radioField" value="option3" />Option 3</label>
										</div>
									</div>

									<div class="form-group selectorField draggableField row checkboxgroup" style="z-index:12;">
										<label for="text" class="col-md-4 control-label">Checkboxes</label>
										<div class="col-md-8 ctrl-checkboxgroup">
											<label class="checkbox"><input type="checkbox" name="checkboxField" value="option1" />Option 1</label>
											<label class="checkbox"><input type="checkbox" name="checkboxField" value="option2" />Option 2</label>
											<label class="checkbox"><input type="checkbox" name="checkboxField" value="option3" />Option 3</label>
										</div>
									</div>						

									<div class="form-group selectorField draggableField row selectmultiple" style="z-index:12;">
										<label for="text" class="col-md-4 control-label">Select Multiple</label>
										<div class="col-md-8 ctrl-selectmultiplelist">
											<select name="multiple1" multiple="multiple" class="ctrl-selectmultiplelist col-md-12">
												<option value="option1">Option 1</option>
												<option value="option2">Option 2</option>
												<option value="option3">Option 3</option>
											</select>
										</div>
									</div>	
									-->
									
								</div>
							</div>			
							
							
							
							
							<div class="col-md-1 arrow_right" id="">
								<img  class="col-md-12" src="<?php echo wp_iv_directories_URLPATH; ?>admin/files/images/icon-arrow-right.png"> 
							</div>
							
							<div class="col-md-6" id="selected-content"  style="z-index:10;">	
								<div class="form-group row top-buffer " id="form-title-div">									
									<div class="onlypadding">
											
											<div class="row">
													<div class="col-md-12">
														
														<div class="form-group">
															<label for="text" class="col-md-4 control-label">Form Name</label>
																<div class="col-md-8">
																	<input type="text"  id="post-title" name="post-title" class="form-control"  value="<?php echo $post_title; ?>" placeholder="Please Enter Form Name">										
																	
																</div>
														</div>
													</div>
												</div>	
											<div class="row">&nbsp;
											</div>	
										
											<div class="row" >	
												<div class="col-md-12" >
													<div class="form-group">	
														<label for="text" class="col-md-4 control-label">Form Width</label>
															<div class="col-md-8">
																	
																		<label class="radio">
																			<input type="radio" name="iv_directories_width" value="Responsive" id ="Responsive"  <?php echo ($iv_directories_width=='Responsive'? 'checked':''); ?> />Responsive
																		</label>
																		<label class="radio">
																			<input type="radio" name="iv_directories_width" id ="fixed_width"  value="custom_width" <?php echo($iv_directories_width!='Responsive'? 'checked':''); ?> />
																			Fixed Width
																		<input type="text"  id="iv_directories_width-input" name="iv_directories_width-input" class="form-control col-md-4"  value="<?php echo ($iv_directories_width!='Responsive'? $iv_directories_width :''); ?>" placeholder="Enter Form Width  Like 500px"  style="display: none" >
																		</label>
																	
																	
														</div>
													</div>	
												</div>		
											</div>
										
										
									</div>
									
								</div>						
								<?php echo $form_meta_data; ?>							
							</div>						
						</div>
					</div>
					
					<!-- End Form 101-->
						<div class="row">
							<div class="col-md-5">
								<h3 class="page-header">Admin Email Subject </h3> 
								<label  class="col-md-4 control-label">Admin Email Subject : </label>
								<div class="col-md-8">
									<?php
									$iv_directories_admin_email_subject = get_post_meta( $form_id,'iv_directories_admin_email_subject',true);
									?>
									<input type="text" class="form-control" id="iv_directories_admin_email_subject" name="iv_directories_admin_email_subject" value="<?php echo $iv_directories_admin_email_subject; ?>" placeholder="Enter admin email subjec">
								</div>
							</div>	
							<div class="col-md-1">
						
							</div>	
							<div class="col-md-6">
								<h3 class="page-header">Auto Reply Email Subject </h3>
								<label  class="col-md-4 control-label">Auto Reply Email Subject : </label>
								<div class="col-md-8">
									<?php
									$iv_directories_auto_email_subject = get_post_meta( $form_id,'iv_directories_auto_email_subject',true);
									?>
									<input type="text" class="form-control" id="iv_directories_auto_email_subject" name="iv_directories_auto_email_subject" value="<?php echo $iv_directories_auto_email_subject; ?>" placeholder="Enter auto email subject">
								</div>
							</div>	
						</div>			
						<div class="row">
							<br />
						</div>	
						
					<div class="row">
						<div class="col-md-5">
							
							<h3 class="page-header">Email Tempalte  <small> 
							
							<a data-toggle="modal" href="<?php echo wp_iv_directories_URLPATH; ?>admin/pages/template_email_modal.php?upath=<?php echo wp_iv_directories_URLPATH; ?>" data-target="#modal_template_help"><img  title="Template Preview" class="caption-help  right"  height="30px" src="<?php echo wp_iv_directories_URLPATH; ?>admin/files/images/eye-open-128.png"></a></small></h3> 
							
							
							
								<div class="form-group">
									<label  class="col-md-4 control-label">Select Email Template : </label>
									<div class="col-md-8">
										<?php
										//iv_directories_email_template_type
										$iv_directories_email_template_type=get_post_meta( $form_id,'iv_directories_email_template_type',true);
										
										?>
										<select class="form-control" id="all-tempalte" name="all-tempalte">
											<option value="green" <?php echo ($iv_directories_email_template_type=='green'? 'selected': '') ?>>Green [Contact Us]</option>
											<option value="black_white" <?php echo ($iv_directories_email_template_type=='black_white'? 'selected': '') ?>>Black & White [Contact Us]</option>
											<option value="textile" <?php echo ($iv_directories_email_template_type=='textile'? 'selected': '') ?>>Textile [Contact Us]</option>
											<option value="newsletter_green" <?php echo ($iv_directories_email_template_type=='newsletter_green'? 'selected': '') ?> >Green [Newsletter]</option>
										</select>
									</div>
								</div>
						</div>	
					</div>	
					<div class="row">
						<br/>
					</div>
					
					<div class="row">					
						
						<div class="col-md-6">
							<h3 class="page-header">Email Tempalte: Admin</h3>
										<div class="panel panel-default">
												
														<div class="panel-heading">	
														  <a data-toggle="collapse" data-parent="#accordion" href="#collapseAdmin">
														  <p class="control-label">Insert Control Name On Email Template </p>
														  </a>	
													</div>	
																							
												<div id="collapseAdmin" class="panel-collapse collapse in">
												  <div class="panel-body">
													<button type="button" class="btn btn-default " onclick="return insert_control_name_admin('[contact_name]');">Full Name</button>	
													<button type="button" class="btn btn-default " onclick="return insert_control_name_admin('[contact_subject]');">Subject</button>	
													<button type="button" class="btn btn-default " onclick="return insert_control_name_admin('[contact_email]');">Email</button>	
													<button type="button" class="btn btn-default " onclick="return insert_control_name_admin('[contact_phone]');">Phone #</button>	
													<button type="button" class="btn btn-default " onclick="return insert_control_name_admin('[contact_about_us]');">Hear About Us</button>	
													<button type="button" class="btn btn-default " onclick="return insert_control_name_admin('[contact_content]');">Message</button>
													<button type="button" class="btn btn-default " onclick="return insert_control_name_admin('[contact_fname]');">First Name</button>
													<button type="button" class="btn btn-default " onclick="return insert_control_name_admin('[contact_lname]');">Last Name</button>
													<button type="button" class="btn btn-default " onclick="return insert_control_name_admin('[contact_web]');">Web Address</button>
													<button type="button" class="btn btn-default " onclick="return insert_control_name_admin('[contact_date]');">Enter Date</button>
														
												  </div>
												</div>
											</div>
							<div class="email-wrap">
								<?php
								
								
								
								
								$content_admin = get_post_meta( $form_id,'iv_directories_admin_email',true);
								
								$editor_id = 'admin_email_template';
													//wp_editor( $content_admin, $editor_id );
								wp_editor($content_admin,  $editor_id, array(
									'textarea_name' =>  $editor_id,
									'textarea_rows' => 20,
									));	
								
									?>
								</div>									
							</div>
							<div class="col-md-6 ">
								<h3 class="page-header">Email Tempalte: Auto Reply</h3>
											<div class="panel panel-default">
												 <div class="panel-heading">													  
														<a data-toggle="collapse" data-parent="#accordion" href="#collapseClient">
														  <p class="control-label">Insert Control Name On Email Template </p>
														</a>													  
													</div>												
												<div id="collapseClient" class="panel-collapse collapse in">
												  <div class="panel-body">
													<button type="button" class="btn btn-default " onclick="return insert_control_name_client('[contact_name]');">Full Name</button>	
													<button type="button" class="btn btn-default " onclick="return insert_control_name_client('[contact_subject]');">Subject</button>	
													<button type="button" class="btn btn-default " onclick="return insert_control_name_client('[contact_email]');">Email</button>	
													<button type="button" class="btn btn-default " onclick="return insert_control_name_client('[contact_phone]');">Phone #</button>	
													<button type="button" class="btn btn-default " onclick="return insert_control_name_client('[contact_about_us]');">Hear About Us</button>	
													<button type="button" class="btn btn-default " onclick="return insert_control_name_client('[contact_content]');">Message</button>
													<button type="button" class="btn btn-default " onclick="return insert_control_name_client('[contact_fname]');">First Name</button>
													<button type="button" class="btn btn-default " onclick="return insert_control_name_client('[contact_lname]');">Last Name</button>
													<button type="button" class="btn btn-default " onclick="return insert_control_name_client('[contact_web]');">Web Address</button>
													<button type="button" class="btn btn-default " onclick="return insert_control_name_client('[contact_date]');">Enter Date</button>
														
												  </div>
												</div>
											</div>
								
								<input type="hidden" class="form-control" id="client-email" name="client-email" value="[contact_email]" >
								<div class="col-md-12 email-wrap">
									
									<?php
									$settings_a = array(															
										'textarea_rows' =>20,															 
										);
									$content_client = get_post_meta( $form_id,'iv_directories_auto_email',true);
									$editor_id = 'client_email_template';
									wp_editor( $content_client, $editor_id,$settings_a );										
									?>
								</div>	
							</div>				
						</div>	
						<div class="row">					
							<div class="col-xs-12">					
								<div align="center">
									<button class="btn btn-info btn-lg" onclick="return update_the_form();">Update Form</button></div>
									<p>&nbsp;</p>
								</div>
							</div>
						</div>
					</div>			 
					
					<script id="control-customize-template" type="text/x-handlebars-template">			
					
					<div class="modal-dialog">
					<div class="modal-content">
					<div class="modal-header">
					<h3>{{header}}</h3>
					</div>
					
					<div class="modal-body" >
					<form id="theForm" class="form-horizontal" role="form">								
					
					<input type="hidden" value="{{type}}" name="type" />
					<input type="hidden" value="{{forCtrl}}" name="forCtrl" />
					
					<div class="form-group">									
					<label for="text" class="col-md-3 control-label">Label</label>
					<div class="col-md-6">
					<input class="form-control" type="text" name="label" value="" />
					</div>
					</div>
					
					
					<div class="form-group">									
					<label for="text" class="col-md-3 control-label">Name</label>
					<div class="col-md-6">
					<input class="form-control" readonly type="text" value="" name="name" />
					</div>
					</div>
					
					<div class="form-group">
					{{{content}}}	
					</div>	
					<!-- creating the typebox @ zea 
					<div class="form-group">									
					<label for="required" class="col-md-3 control-checkbox-required">Required *</label>
					<div class="col-md-3">
					<input type="checkbox" value="" name="required" class="checkbox_custom" />
					</div>
					</div>	
					<!-- end typebox -->					
					</form>
					</div>
					
					<div class="modal-footer">
					<button class="btn btn-primary" data-dismiss="modal" onclick='save_customize_changes()'>Save changes</button>
					<button class="btn" data-dismiss="modal" aria-hidden="true">Close</button>
					<button class="btn btn-danger" data-dismiss="modal" aria-hidden="true" onclick='delete_ctrl()'>Delete</button>
					</div>
					</div>
					</div>		
					
					</script>
					
					<script id="textbox-template" type="text/x-handlebars-template">
					<label for="text" class="col-md-3 control-label">Placeholder</label> 
					<div class="col-md-6">
					<input type="text"  class="form-control" name="placeholder" value="" />
					</div>			
					</script>
					
					<script id="combobox-template" type="text/x-handlebars-template">
					<label for="text" class="col-md-3 control-label">Options</label> <div class="col-md-6"><textarea class="form-control" name="options" rows="5"></textarea></div>
					</script>
					
					<!-- Zea test -->
					<script id="textarea-template" type="text/x-handlebars-template">
					<label for="text" class="col-md-3 control-label">Placeholder</label> 
					<div class="col-md-6"><input type="text" class="form-control" name="placeholder" value="" /></div>			
					</div>
					
					
					<div class="form-group">
					<label for="required" class="col-md-3 control-label control-checkbox-required">Required *</label>
					<div class="col-md-3">
					<input type="checkbox" value="" name="required" class="checkbox_custom" />
					</div>
					
					</script>
					<script id="textbox-required-template" type="text/x-handlebars-template">
					
					</div>
					<div class="form-group">
					<label for="text" class="col-md-3 control-label control-checkbox-required ">    Required *</label>
					<div class="col-md-3">
					<input type="checkbox" value=""   name="required" class="checkbox_custom" />
					</div>
					
					</script>
					<!-- Zea test end -->

					<!-- End of templates -->


					<script>
					jQuery(document).ready(docReady); 
					
					</script>
