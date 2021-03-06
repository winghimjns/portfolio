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
			//closeDisplayArea(this);
			
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
			// 4. slide down to the displaying area's top
			
			var _this = this;
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
					xsDisplayArea.slideDown();
				}
			});
			
			// 4
			setTimeout(function() {
				$("html, body").animate({
					scrollTop: $(_this).offset().top + $(_this).height() - 20
				});
			}, 400);
		
		} // end if
		
	});
	
	// register close display area
	$("#techniques .techniques-display-area").on("click", ".techniques-display-area-close", closeDisplayArea);
	
	// mood
	$("[wg-mood]").click(function() {
		
		$("html").attr("wg-color-set", "color-set-" + $(this).attr("wg-mood"));
		
	});
	
	// particle background
	particlesJS.load('particles-js', './assets/particles.json', function() {
		console.log('callback - particles.js config loaded');
	});
	
	// update section page name in body tag
	window.updateSections();
	
	// add class "load-done" in html attribute
	$("html").addClass("load-done");
	setTimeout(function() {
		$("html").addClass("load-done-2s");
	});
	
	// show cookie notice
	if(!window.localStorage.portfolioReadCookie) {
		showCookieNotice();
	} // end if
	
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

var closeDisplayArea = function(el) {
	
	// slide up the details display area
	$(".techniques-display-area").each(function() {
		if($(this).is(":visible")) {
			$("html, body").animate({
				scrollTop: $("body").scrollTop() - $(this).height()
			});
		} // end if
	}).slideUp();
	
	// remove all the active class
	$("#techniques .techniques-block").removeClass("active");
}; // end closeDisplayArea()

/**
 * 
 * show the project examples
 * 
 */
var showProjectExample = function(id) {
	return $("html, body").animate({
		scrollTop: $("#" + id).slideDown().offset().top - 20
	});
}; // showProjectExample(var)

/**
 * 
 * hide the project examples
 * 
 */
var hideProjectExample = function(id) {
	return $("html, body").animate({
		scrollTop: $("body").scrollTop() - $("#" + id).slideUp().height()
	});
}; // end hideProjectExample(var)

/**
 * 
 * show the cookie notice
 * 
 */
var showCookieNotice = function() {
	return $("#cookie_statement").slideDown();
};

/**
 * 
 * hide the cookie notice
 * 
 */
var hideCookieNotice = function() {
	return $("#cookie_statement").slideUp(function() {
		window.localStorage.portfolioReadCookie = '1';
	});
};