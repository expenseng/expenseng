var arrowLeft=$(".arrow-left");
var arrowRight=$(".arrow-right");
var card=$(".card");
var slide=0;

arrowLeft.click(function(e){
    slide-=90;
    card.css("transform","translateX("+slide+"%)");
});

arrowRight.click(function(e){
    slide+=90;
    card.css("transform","translateX("+slide+"%)");
});


//for active link styling, not functional yet
$(document).ready(function() {
	// get current URL path and assign 'active' class
	var pathname = window.location.pathname;
	$('.nav > li > a[href="'+pathname+'"]').parent().addClass('active');
})
