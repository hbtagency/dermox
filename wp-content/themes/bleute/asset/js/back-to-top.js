jQuery(document).ready(function($){
	// browser window scroll (in pixels) after which the "back to top" link is shown
	var offset = 300,
		//browser window scroll (in pixels) after which the "back to top" link opacity is reduced
		offset_opacity = 1200,
		//duration of the top scrolling animation (in ms)
		scroll_top_duration = 700,
		//grab the "back to top" link
		$back_to_top = $('.bt-top');
		$back_to_bottom = $('.bt-bottom');
		//Click to details product
		$go_to_description = $('.description_tab a');
		$go_to_additional = $('.additional_information_tab a');
		$go_to_review = $('.reviews_tab a');

		var bottom = $("footer").position();
		var number_after = bottom.top;

	//hide or show the "back to top" link
	$(window).scroll(function(){
		( $(this).scrollTop() > offset ) ? $back_to_top.addClass('cd-is-visible') : $back_to_top.removeClass('cd-is-visible cd-fade-out');
		if( $(this).scrollTop() > offset_opacity ) { 
			$back_to_top.addClass('cd-fade-out');
		}
	});

	//smooth scroll to top
	$back_to_top.click(function(){
		event.preventDefault();
		$('body,html').animate({
			scrollTop: 0 ,
		 	}, scroll_top_duration
		);
	});


	//smooth scroll to bottom
	$back_to_bottom.click(function(){
		event.preventDefault();
		$('body,html').animate({
			scrollTop: 850 ,
		 	}, scroll_top_duration
		);
	});
	$(document).ready(function(){
	//smooth scroll to description
	$go_to_description.click(function(){
		var position_des = $('.shop_attributes').position();
		var go_to_des = position_des.top - 50;
		event.preventDefault();
		$('body,html').animate({
			scrollTop: go_to_des ,
		 	}, scroll_top_duration
		);
	});

	//smooth scroll to additional
	$go_to_additional.click(function(){
		var position_add = $('.shop_attributes').position();
		var go_to_additional = position_add.top + 1300
		event.preventDefault();
		$('body,html').animate({
			scrollTop: go_to_additional,
		 	}, scroll_top_duration
		);
	});

	//smooth scroll to review 
	$go_to_review.click(function(){
		var position_review = $('.shop_attributes').position();
		var go_review = position_review.top + 1400
		event.preventDefault();
		$('body,html').animate({
			scrollTop: go_review ,
		 	}, scroll_top_duration
		);
	});
});
});