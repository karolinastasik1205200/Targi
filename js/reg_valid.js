
function validateForm() {
    var username = document.forms["register-form"]["username"].value;
    var errorUser = document.getElementById("jsValidUser");

    var email = document.forms["register-form"]["email"].value;
    var errorEmail = document.getElementById("jsValidEmail");

    var password = document.forms["register-form"]["password"].value;
    var errorPass = document.getElementById("jsValidPass");

    var confirmPassword = document.forms["register-form"]["confirm-password"].value;
    var errorConPass = document. getElementById("jsValidConPass");

    var errors = ["", "", "", ""]; // Indeksy odpowiadają identyfikatorom elementów

    if (username.length < 5) {
        errors[0] = "Nazwa użytkownika jest zbyt krótka! Musi posiadać co najmniej 5 znaków!";
    } else if (username.length > 50 ) {
        errors[0] = "Nazwa użytkownika nie może być dłuższa niż 50 znaków!";
    } else if (!isUserNameValid(username)) {
        errors[0] = "Dozwolone są tylko litery i cyfry oraz spacje w nazwie użytkownika!";
    }

    if (email === "") {
        errors[1] = "Pole adresu e-mail jest wymagane i nie może być puste! Wpisz adres e-mail!";
    } else if (!validateEmail(email)) {
        errors[1] = "Niewłaściwy format adresu e-mail!";
    }

    if (password === "") {
        errors[2] = "Pole hasło nie może być puste! Wpisz hasło!";
    } else if (validatePass(password) < 6) {
        errors[2] = "Hasło musi posiadać co najmniej 6 znaków!";
    } else if (validatePass(password) > 50) {
        errors[2] = "Hasło nie może posiadać więcej niż 50 znaków!";
    }

    if (confirmPassword === "") {
        errors[3] = "Pole potwierdzenia hasła nie może być puste! Potwierdź hasło!";
    } else if (validateConPass(confirmPassword) < 6) {
        errors[3] = "Hasło musi posiadać co najmniej 6 znaków!";
    } else if (validateConPass(confirmPassword) > 50) {
        errors[3] = "Hasło nie może posiadać więcej niż 50 znaków!";
    } else if (password !== confirmPassword) {
        errors[3] = "Podane hasła nie są tożsame!";
    }

    // Wyświetlenie błędów w odpowiednich miejscach na stronie
    if (errors.some(error => error !== "")) {
        errorUser.innerHTML = errors[0];
        errorEmail.innerHTML = errors[1];
        errorPass.innerHTML = errors[2];
        errorConPass.innerHTML = errors[3];
        return false;
    } else {
        errorUser.innerHTML = "";
        errorEmail.innerHTML = "";
        errorPass.innerHTML = "";
        errorConPass.innerHTML = "";
        return true;
    }
}


function validateEmail(email) {
    var re = /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
    return re.test(String(email).toLowerCase());
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

function validateConPass(confirmPassword) {
    var conPass = String(confirmPassword).length;
    return conPass;
}