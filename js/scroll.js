document.addEventListener("DOMContentLoaded", ready);


let goTopBtn = document.getElementById("UPPER");
goTopBtn.addEventListener('click', backToTop);

function backToTop() {
    if (window.pageYOffset > 0) {
        window.scrollBy(0, -160);
        setTimeout(backToTop, 0);
    }
}

function ready() {
    scrolling()
}

function upp() {
    pageYOffset = 0;
}

window.addEventListener('scroll', scrolling);

function scrolling() {
    let pixel = pageYOffset;
	let UP = document.getElementById("UP");
    let srch = document.getElementById("srch");
        /* console.log(pixel); */
	UP = document.getElementById("UPPER");
    if (pixel > 145) {
        UP.style.display = "block";
    } else {
        UP.style.display = "none";
    }
    if (pixel < 10) {
        srch.style.top = "14.9%";
        srch.style.margin = "0.7% 0 0% 0.7%";
    }
    if (pixel > 10) {
        srch.style.top = "14%";
    }
    if (pixel > 20) {
        srch.style.top = "13%";
    }
    if (pixel > 30) {
        srch.style.top = "12%";
    }
    if (pixel > 40) {
        srch.style.top = "11%";
    }
    if (pixel > 50) {
        srch.style.top = "10%";
    }
    if (pixel > 60) {
        srch.style.top = "9%";
    }
    if (pixel > 70) {
        srch.style.top = "8%";
    }
    if (pixel > 80) {
        srch.style.top = "7%";
    }
    if (pixel > 90) {
        srch.style.top = "6%";
    }
    if (pixel > 100) {
        srch.style.top = "5%";
    }
    if (pixel > 110) {
        srch.style.top = "4%";
    }
    if (pixel > 120) {
        srch.style.top = "3%";
    }
    if (pixel > 130) {
        srch.style.top = "2%";
        srch.style.margin = "0.5% 0 0% 0.7%";
    }
    if (pixel > 140) {
        srch.style.margin = "0.5% 0 0% 0.7%";
        srch.style.top = "0%";
    }
    if (pixel > 145) {
        srch.style.margin = "0.5% 0 0% 0.7%";
        srch.style.top = "0px";
    };

}