(function($){
	var scroll_done = false;
	$(document).ready(function(){	
		$('#accordion-home').on('shown', function () {		
		  // do something…
			if(scroll_done == false){
				$(".custom-scroller").mCustomScrollbar();
				scroll_done = true;
			}
		});
	});
	
})(jQuery);