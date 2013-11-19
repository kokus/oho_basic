jQuery.each(jQuery.browser, function(i, val) {
 if(i=="msie" && jQuery.browser.version.substr(0,3)=="6.0")
     $(document).ready(function() {

    //These two functions add a class hover to the li so that you may enable a block display of the menu in CSS.
	
	$("#block-menu-primary-links .content > .menu > li").mouseover(function(){
        $(this).addClass("hover");
    });

    $("#block-menu-primary-links .content > .menu > li").mouseout(function(){
        $(this).removeClass("hover");
    });
			
});
});