function animateBurger(x) {
    x.classList.toggle("change");
}

let menuVisible = true;
function toggleMenu() {
    if (menuVisible) {
        let element = document.getElementById("mobile-menu");
        element.classList.add("menu-list-mobile-active");
        document.body.classList.add("body-scroll-hide");
    } else {
        let element = document.getElementById("mobile-menu");
        element.classList.remove("menu-list-mobile-active");
        document.body.classList.remove("body-scroll-hide");
    }
    menuVisible = !menuVisible;
}
