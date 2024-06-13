
function loginValidateForm() {


    var email = document.forms["login-form"]["email"].value;
    var errorUserEmail = document.getElementById("jsValidUserLogin");

    var password = document.forms["login-form"]["password"].value;
    var errorPass = document.getElementById("jsValidPassLogin");

    var errors = ["", ""]; // Indeksy odpowiadają identyfikatorom elementów



    if (email === "") {
        errors[1] = "Pole adresu e-mail jest wymagane i nie może być puste! Wpisz adres e-mail!";
    } else if (!validateEmail(email)) {
        errors[1] = "Niewłaściwy format adresu e-mail!";
    }


    if (password === "") {
        errors[1] = "Wpisz hasło!";
    } else if (validatePass(password) < 6) {
        errors[1] = "Hasło nieprawidłowe.";
    } else if (validatePass(password) > 50) {
        errors[1] = "Hasło nieprawidłowe.";
    } else if (!isPasswordStrong(password)) {
        errors[1] = "Hasło nieprawidłowe.";
    }


    // Wyświetlenie błędów w odpowiednich miejscach na stronie
    if (errors.some(error => error !== "")) {
        errorUserEmail.innerHTML = errors[0];
        errorPass.innerHTML = errors[1];
        event.preventDefault(); // Zatrzymuje domyślne zachowanie przeglądarki
        return false;
    } else {
        errorUserEmail.innerHTML = "";
        errorPass.innerHTML = "";
        document.getElementById("login-form").submit(); // Wysyła formularz po pomyślnym walidowaniu
        return true;
    }
}

function loginValidateMobileForm() {

    var email = document.forms["mobile-login-form"]["email"].value;
    var errorUserEmail = document.getElementById("jsValidUserLoginMobile");

    var password = document.forms["mobile-login-form"]["password"].value;
    var errorPass = document.getElementById("jsValidPassLoginMobile");

    var errors = ["", ""]; // Indeksy odpowiadają identyfikatorom elementów



    if (email === "") {
        errors[1] = "Pole adresu e-mail jest wymagane i nie może być puste! Wpisz adres e-mail!";
    } else if (!validateEmail(email)) {
        errors[1] = "Niewłaściwy format adresu e-mail!";
    }


    if (password === "") {
        errors[1] = "Wpisz hasło!";
    } else if (validatePass(password) < 6) {
        errors[1] = "Hasło nieprawidłowe.";
    } else if (validatePass(password) > 50) {
        errors[1] = "Hasło nieprawidłowe.";
    } else if (!isPasswordStrong(password)) {
        errors[1] = "Hasło nieprawidłowe.";
    }


    // Wyświetlenie błędów w odpowiednich miejscach na stronie
    if (errors.some(error => error !== "")) {
        errorUserEmail.innerHTML = errors[0];
        errorPass.innerHTML = errors[1];
        event.preventDefault(); // Zatrzymuje domyślne zachowanie przeglądarki
        return false;
    } else {
        errorUserEmail.innerHTML = "";
        errorPass.innerHTML = "";
        document.getElementById("login-form").submit(); // Wysyła formularz po pomyślnym walidowaniu
        return true;
    }
}


function validateEmail(email) {
    var re = /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
    return re.test(String(email).toLowerCase());
}

function validatePass(password) {
    var pass = String(password).length;
    return pass;
}


function isPasswordStrong(password) {
    return /^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@$!%*?&])[A-Za-z\d@$!%*?&]{6,}$/.test(password);
}


