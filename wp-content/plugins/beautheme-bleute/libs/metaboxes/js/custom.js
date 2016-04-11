jQuery(document).ready(function ($) {
	/**
	 * Metabox of Header Element
	 */
	$('#image_, #video_, #audio_, #quote_, #link_, #gallery_').hide('fast');
	$('#post-formats-select input').click(function(){
		var idToshow = $(this).attr('id');
		alert(idToshow);
		$('#image_, #video_, #audio_, #quote_, #link_, #gallery_').hide('slow');
		switch(idToshow){
			case "post-format-image": $('#image_').show('fast'); break;
			case "post-format-video": $('#video_').show('fast'); break;
			case "post-format-audio": $('#audio_').show('fast'); break;
			case "post-format-quote": $('#quote_').show('fast'); break;
			case "post-format-link": $('#link_').show('fast'); break;
			case "post-format-gallery": $('#gallery_').show('fast'); break;
		}
	});
});