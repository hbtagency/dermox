(function($) {
	"use strict";

    var pos = $(".menu-main");
    var checkPos = pos.position();
    if(checkPos!=undefined){
        pos = checkPos.top;
        $(window).scroll(function() {
            var windowpos = $(window).scrollTop();
            if (windowpos >= pos +90) {$(".menu-fix-all").addClass("stick");}
            else {$(".menu-fix-all").removeClass("stick");}
            if(windowpos<1){$(".menu-fix-all").removeClass("stick");}
        });
    }

})(jQuery);