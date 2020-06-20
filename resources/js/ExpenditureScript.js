var view_choice = "day";
var sort_choice = "htl";
function show_filter() {
    document.getElementById(view_choice).style.backgroundColor = "#00945e";
    document.getElementById(view_choice).style.color = "white";
    document.getElementById(sort_choice).style.backgroundColor = "#00945e";
    document.getElementById(sort_choice).style.color = "white";
    document.getElementById("filter-screen").style.display = "block";
}

function filterSelectionView(view){
    view_choice = view;
    document.getElementById("day").removeAttribute("style");
    document.getElementById("month").removeAttribute("style");
    document.getElementById("year").removeAttribute("style");
    document.getElementById(view).style.backgroundColor = "#00945e";
    document.getElementById(view).style.color = "white";
}
function filterSelectionSort(sort){
    sort_choice = sort;
    document.getElementById("htl").removeAttribute("style");
    document.getElementById("lth").removeAttribute("style");
    document.getElementById(sort).style.backgroundColor = "#00945e";
    document.getElementById(sort).style.color = "white";
}
function apply(){
    document.getElementById("filter-screen").style.display = "none";
    console.log("View By: ",view_choice); 
    console.log("Sort By: ",sort_choice); 
}




let showPopup = function(){
    document.querySelector('.section-wrapper').classList.add('show')
}
let profileSummary = document.querySelectorAll(".profileSummary").forEach
(profileSummary => profileSummary.addEventListener('click' , showPopup));

let closeButton = document.querySelector('.section-wrapper .close-button');

let hidePopup = function(){
    document.querySelector('.section-wrapper').classList.remove('show')
}
closeButton.addEventListener('click', hidePopup);
