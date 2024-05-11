<?php require "header.php";
/*
function testInput($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $name = testInput($_POST['username']);
    $nameErr = '';
    if (!preg_match('/^[a-zA-Z0-9 ]*$/', $name)) {
        $nameErr = "Dozwolone są tylko litery";
    }

    $email2 = testInput($_POST['email']);
    $emailErr = '';
    if (!filter_var($email2, FILTER_VALIDATE_EMAIL)) {
        $emailErr = 'Niewłaściwy format adresu e-mail';
    }

    $passwordErr = '';
    if (empty($_POST['password'])) {
        $passwordErr = "Pole hasła nie może być puste";
    } else {
        $password2 = $_POST['password'];
        if (strlen($password2) < 6) {
            $passwordErr = "Hasło musi posiadać co najmniej 6 znaków";
        }
    }
}
*/
?>
<!--<script src="js/reg_valid.js"></script>-->
<section class="section-register-form">
    <h1>Formularz rejestracji</h1>
    <form id="register-form" action="register.php" method="post" class="register-form">
        <div>
            <label for="username">Podaj nazwę użytkownika:</label>
            <input type="text" name="username" id="username" placeholder="Nazwa użytkownika" required>
            <span id="jsValidUser"></span>
        </div>

        <div>
            <label for="email">Wprowadź swój adres e-mail:</label>
            <input type="email" name="email" id="email" placeholder="Adres e-mail" required>
            <span id="jsValidEmail"></span>
        </div>

        <div>
            <label for="password">Podaj hasło:</label>
            <input type="password" name="password" id="password" placeholder="Hasło" required>
            <span id="jsValidPass"></span>

            <label for="confirm-password">Potwierdź swoje hasło:</label>
            <input type="password" name="confirm_password" id="confirm-password" placeholder="Potwierdź hasło" required>
            <span id="jsValidConPass"></span>
        </div>

        <div>
            <input type="submit" name="submit" value="Zarejestruj" class="register-btn" onclick="validateForm()">
        </div>
    </form>
</section>
