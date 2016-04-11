jQuery(document).ready(function ($) {
	/**
	 * Metabox custom jquery
	 */
	 //Check show Properties when click
	$('#image_metabox, #video_metabox, #audio_metabox, #quote_metabox, #link_metabox').hide('fast');
	$('#post-formats-select input').each( function() {
	  	var atCheck = $(this).attr('checked');
	  	var idShow = $(this).attr('id');
	  	if (atCheck =='checked') {
	  		chedkPostType(idShow);
	  	};
	});

	//Check show Properties when click
	$('#post-formats-select input').click(function(){
		var idToshow = $(this).attr('id');
		$('#image_metabox, #video_metabox, #audio_metabox, #quote_metabox, #link_metabox').hide('slow');
		chedkPostType(idToshow);
	});

	//Check template
	var selecTemp = $('#page_template').val();
	if (selecTemp == 'template-noneheader.php') {
		$('#page_metabox').hide();
	}
	$('#page_template').change(function() {
		if ($(this).val() == 'template-noneheader.php') {
			$('#page_metabox').hide('fast');
		}else{
			$('#page_metabox').show('slow');
		}
	});

	//Check custom sidebar
	var checkCustom = $('#beau_option_custom_sidebar').attr('checked');
	checkCustomSidebar(checkCustom, 6);
	$('#beau_option_custom_sidebar').change(function() {
		var chez = $('#beau_option_custom_sidebar').attr('checked');
		checkCustomSidebar(chez, 6);
	});

	//Check postype to show
	function chedkPostType(postype){
		switch(postype){
			case "post-format-image": $('#image_metabox').show('fast'); break;
			case "post-format-video": $('#video_metabox').show('fast'); break;
			case "post-format-audio": $('#audio_metabox').show('fast'); break;
			case "post-format-quote": $('#quote_metabox').show('fast'); break;
			case "post-format-link": $('#link_metabox').show('fast'); break;
			case "post-format-gallery": $('#gallery_metabox').show('fast'); break;
		}
	}

	//Check checkbox checked or no for custom sidebar
	function checkCustomSidebar(str, child){
		if (str) {
			$('.redux-main tr:nth-child('+child+')').show('fast');
		};
		if (!str) {
			$('.redux-main tr:nth-child('+child+')').hide('fast');
		};
	}

});