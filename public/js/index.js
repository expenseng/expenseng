
let arrowLeft = document.querySelector('.arrow-left');
let arrowRight = document.querySelector('.arrow-right')
let arrowLeft2 = document.querySelector('.arrow-left2');
let arrowRight2 = document.querySelector('.arrow-right2')
let card = document.querySelector('.card1');
let card2 = document.querySelector('.card2');
let slide = 0;

function shift(){
    if (slide <  0){
        return slide = 0;
    }else{
    slide -= 90;
    card2.style.transform = "translateX(" + slide + "%)";
    
    card.style.transform = "translateX(" + slide + "%)";}
}

function unshift(){
    if (slide =  0){
        return slide =0;
    }else{
    slide += 45;
    card.style.transform = "translateX(" + slide + "%)";
    card2.style.transform = "translateX(" + slide + "%)";}
}
arrowLeft.addEventListener("click", unshift);
arrowRight.addEventListener('click', shift);
arrowLeft2.addEventListener("click", unshift);
arrowRight2.addEventListener('click', shift);

