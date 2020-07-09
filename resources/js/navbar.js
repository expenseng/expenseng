let h = document.getElementById("home");
h.addEventListener('click', function () {
    h.classList.toggle("active");
});

let s = document.getElementById("spending");
s.addEventListener('click', function () {
    s.classList.toggle("active");
});

let m = document.getElementById("ministries");
m.addEventListener('click', function () {
    m.classList.toggle("active");
});

let c = document.getElementById("contractors");
c.addEventListener('click', function () {
    c.classList.toggle("active");
});

let a = document.getElementById("about");
a.addEventListener('click', function () {
    a.classList.toggle("active");
});
