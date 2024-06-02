
let slideIndex = 0;
showSlides();

function showSlides() {
    let i;
    let slides = document.getElementsByClassName("slide");
    let dots = document.getElementsByClassName("dot");
    // let htxt = document.getElementsByClassName("headtxt");

    for (i = 0; i < slides.length; i++) {
        slides[i].style.display = "none";
    }

    // for (i = 0; i < htxt.length; i++) {
    //     htxt[i].style.display = "none";
    // }

    if (slideIndex >= slides.length) {
        slideIndex = 0;
    }

    slideIndex++;

    for (i = 0; i < dots.length; i++) {
        dots[i].className = dots[i].className.replace(" active", "");
    }

    slides[slideIndex - 1].style.display = "block";
    // htxt[slideIndex - 1].style.display = "block";
    dots[slideIndex - 1].className += " active";
    setTimeout(showSlides, 6000); // Change image every 8 seconds
}