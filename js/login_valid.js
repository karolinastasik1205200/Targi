
function loginValidateForm() {


    var username = document.forms["login-form"]["username"].value;
    var errorUser = document.getElementById("jsValidUserLogin");

    var password = document.forms["login-form"]["password"].value;
    var errorPass = document.getElementById("jsValidPassLogin");

    var errors = ["", ""]; // Indeksy odpowiadają identyfikatorom elementów



    if (username === "") {
        errors[0] = "Wpisz nazwę użytkownika!";
    } else if (username.length < 5) {
        errors[0] = "Podana nazwa użytkownika nie istnieje.";
    } else if (username.length > 50 ) {
        errors[0] = "Podana nazwa użytkownika nie istnieje.";
    } else if (!isUserNameValid(username)) {
        errors[0] = "Podana nazwa użytkownika nie istnieje.";
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
        errorUser.innerHTML = errors[0];
        errorPass.innerHTML = errors[1];
        event.preventDefault(); // Zatrzymuje domyślne zachowanie przeglądarki
        return false;
    } else {
        errorUser.innerHTML = "";
        errorPass.innerHTML = "";
        document.getElementById("login-form").submit(); // Wysyła formularz po pomyślnym walidowaniu
        return true;
    }
}

function loginValidateMobileForm() {

    var username = document.forms["mobile-login-form"]["username"].value;
    var errorUser = document.getElementById("jsValidUserLoginMobile");

    var password = document.forms["mobile-login-form"]["password"].value;
    var errorPass = document.getElementById("jsValidPassLoginMobile");

    var errors = ["", ""]; // Indeksy odpowiadają identyfikatorom elementów



    if (username === "") {
        errors[0] = "Wpisz nazwę użytkownika!";
    } else if (username.length < 5) {
        errors[0] = "Podana nazwa użytkownika nie istnieje.";
    } else if (username.length > 50 ) {
        errors[0] = "Podana nazwa użytkownika nie istnieje.";
    } else if (!isUserNameValid(username)) {
        errors[0] = "Podana nazwa użytkownika nie istnieje.";
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
        errorUser.innerHTML = errors[0];
        errorPass.innerHTML = errors[1];
        event.preventDefault(); // Zatrzymuje domyślne zachowanie przeglądarki
        return false;
    } else {
        errorUser.innerHTML = "";
        errorPass.innerHTML = "";
        document.getElementById("login-form").submit(); // Wysyła formularz po pomyślnym walidowaniu
        return true;
    }
}


function isUserNameValid(username) {
    var res = /^[a-zA-Z0-9][a-zA-Z0-9\s]*[a-zA-Z0-9]$/.exec(username);
    var valid = !!res;
    return valid;
}

function validatePass(password) {
    var pass = String(password).length;
    return pass;
}


function isPasswordStrong(password) {
    return /^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@$!%*?&])[A-Za-z\d@$!%*?&]{6,}$/.test(password);
}


