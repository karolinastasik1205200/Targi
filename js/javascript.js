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

let loginVisible = true;
function toggleLoginForm() {
    if (loginVisible) {
        let element = document.getElementById('login-form-container');
        element.classList.add('login-form-container-show');
        element.classList.remove('login-hidden');
        document.body.classList.add('body-scroll-hide');
    } else {
        let element = document.getElementById('login-form-container');
        element.classList.remove('login-form-container-show');
        element.classList.add('login-hidden');
        document.body.classList.remove('body-scroll-hide');
    }
    loginVisible = !loginVisible;
}
