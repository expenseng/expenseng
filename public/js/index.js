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