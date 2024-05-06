
function validateForm() {
    var username = document.forms["register-form"]["username"].value;
    var errorUser = document.getElementById("jsValidUser");

    var email = document.forms["register-form"]["email"].value;
    var errorEmail = document.getElementById("jsValidEmail");

    var password = document.forms["register-form"]["password"].value;
    var errorPass = document.getElementById("jsValidPass");

    var errors = ["", "", ""]; // Indeksy odpowiadają identyfikatorom elementów

    if (!isUserNameValid(username)) {
        errors[0] = "Dozwolone są tylko litery i cyfry oraz spacje w nazwie użytkownika!";
    } else if (username.length < 5) {
        errors[0] = "Nazwa użytkownika jest zbyt krótka! Musi posiadać co najmniej 5 znaków!"
    }

    if (!validateEmail(email)) {
        errors[1] = "Niewłaściwy format adresu e-mail!";
    }

    if (validatePass(password) < 6) {
        errors[2] = "Hasło musi posiadać co najmniej 6 znaków!";
    }

    // Wyświetlenie błędów w odpowiednich miejscach na stronie
    if (errors.some(error => error !== "")) {
        errorUser.innerHTML = errors[0];
        errorEmail.innerHTML = errors[1];
        errorPass.innerHTML = errors[2];
        return false;
    } else {
        errorUser.innerHTML = "";
        errorEmail.innerHTML = "";
        errorPass.innerHTML = "";
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