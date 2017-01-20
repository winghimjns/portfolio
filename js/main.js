/**
 * 
 * @Created 2017-01-02
 * @Author  winghimjns
 * 
 */

/**
 * 
 * After the page has been loaded
 * 
 */
$(document).ready(function() {
	
	// ================================================================================
	//    TECHNIQUES SECTION
	// ================================================================================
	
	$("#techniques .techniques-block").click(function() {
		
		
		// if the clicked .techniques-block is activating
		if($(this).hasClass("active")) {
			
			// close display area
			closeDisplayArea();
			
		}
		
		// if the clicked .techniques-block is not activating
		else {
			
			// remove all the active class
			$("#techniques .techniques-block").removeClass("active");
			
			// add the active class
			$(this).addClass("active");
			
			// get the details
			var detailsHTML = $(this).parent().parent().find(".techniques-details").html();
			
			// 1. slide up the details display area
			// 2. paste the details html into the displaying area
			// 3. slide down the details display area
			
			var xlDisplayArea = $(".techniques-display-area-xl");
			var smDisplayArea = $(this).parent().parent().parent().find(".techniques-display-area-sm");
			var xsDisplayArea = $(this).parent().parent().find(".techniques-display-area-xs");
			
			// 1
			$(".techniques-display-area-xl").slideUp(400, function() {
				xlDisplayArea.html(detailsHTML).slideDown();
			});
			
			// 2
			$(".techniques-display-area-sm").slideUp(400, function() {
				if(smDisplayArea.index(this) !== -1) {
					smDisplayArea.html(detailsHTML).slideDown();
				}
			});
			
			// 3
			$(".techniques-display-area-xs").slideUp(400, function() {
				if(xsDisplayArea.index(this) !== -1) {
					xsDisplayArea.slideDown().scroll();
				}
			});
		
		} // end if
		
	});
	
	$("#techniques .techniques-display-area").on("click", ".techniques-display-area-close", closeDisplayArea);
	
	
	
	
	// load text
	// currently the text displaying will be processed in backend
	// TODO
	//processTextJson(window.textsJson);
	
	// ================================================================================
	//    ACTIVATING
	// ================================================================================
	//$('.interactive-background').parallax();



	// particle background
	particlesJS.load('particles-js', './assets/particles.json', function() {
		console.log('callback - particles.js config loaded');
	});
	
});

var processTextJson = function(json) {
	
	var obj = JSON.parse(json);
	
	var 
		date = obj.date,
		language = obj.language,
		texts = obj.texts;
	
	injectText(texts);
	
}; // end processTextJson(var)

var injectText = function(texts) {
	
	for(var key in texts) {
		
		$("[wg-text='" + key + "']").html(texts[key]);
	} // end for
	
}; // end injectText(var)

var closeDisplayArea = function() {
	
	// slide up the details display area
	$(".techniques-display-area").slideUp();
	
	// remove all the active class
	$("#techniques .techniques-block").removeClass("active");
}; // end closeDisplayArea()