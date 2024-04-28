<?php
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
if ($nameErr != '' && $emailErr != '' && $passwordErr != '') {

}
try {




    require_once "db_connect.php";

    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $confirm_password = $_POST['confirm_password'];

    if ($password !== $confirm_password) {
        echo "Podane hasła nie są zgodne!";
        exit();
    }

    $hashed_password = password_hash($password, PASSWORD_DEFAULT);

    $sql = "INSERT INTO users (username, email, password) VALUES (:username, :email, :password)";
    $stmt = $db->prepare($sql);

    $stmt->bindParam(':username', $username);
    $stmt->bindParam(':email', $email);
    $stmt->bindParam(':password', $hashed_password);

    $stmt->execute();

    echo "Rejestracja zakończona pomyslnie.";
} catch (PDOException $e) {
    echo "Błąd podczas rejestracji: " . $e->getMessage();
}
$db = null;
*/


function testInput($data)
{
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    $username = testInput($_POST['username']);
    $email = testInput($_POST['email']);
    $password = $_POST['password'];
    $confirm_password = $_POST['confirm_password'];
}
$usernameErr = '';
$emailErr = '';
$passwordErr = '';
$confirm_passwordErr = '';


if (!preg_match('/^[a-zA-Z0-9][a-zA-Z0-9\s]*[a-zA-Z0-9]$/', $username)) {
    $usernameErr = 'Dozwolone są tylko litery i cyfry oraz spacje!';
} elseif (empty($username)) {
    $usernameErr = 'Pole nazwy użytkownika nie może być puste, ani posiadać wyłącznie znaków spacji!';
} elseif (strlen($username) < 3) {
    $usernameErr = 'Nazwa użytkownika musi posiadać więcej niż 3 znaki!';
} elseif (strlen($username) > 50) {
    $usernameErr = 'Nazwa użytkownika nie może posiadać więcej niż 50 znaków!';
}

if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    $emailErr = 'Niewłaściwy format adresu e-mail!';
}

if (empty($_POST['password'])) {
    $passwordErr = 'Pole hasła nie może być puste!';
} elseif (strlen($password) < 6) {
    $passwordErr = 'Hasło musi posiadać co najmniej 6 znaków!';
} elseif (strlen($password) > 50) {
    $passwordErr = 'Hasło nie może posiadać więcej niż 50 znaków!';
}

if ($password !== $confirm_password) {
    $confirm_passwordErr = 'Podane hasła nie są zgodne!';
}

if (empty($usernameErr) && empty($emailErr) && empty($passwordErr) && empty($confirm_passwordErr)) {
    try {
        $hashed_password = password_hash($password, PASSWORD_DEFAULT);

        require_once 'db_connect.php';

        $sql = "INSERT INTO users (username, email, password) VALUES (:username, :email, :password)";
        $stmt = $db->prepare($sql);

        $stmt->bindParam(':username', $username);
        $stmt->bindParam(':email', $email);
        $stmt->bindParam(':password', $hashed_password);

        $stmt->execute();
        echo 'Rejestracja zakończona pomyslnie.';

    } catch (PDOException $e) {
        echo 'Błąd podczas rejestracji: ' . $e->getMessage();
    }
    $db = null;
} elseif (!empty($usernameErr) || !empty($emailErr)  || !empty($passwordErr) || !empty($confirm_passwordErr)) {
    if (!empty($usernameErr)) {
        echo $usernameErr;
    } elseif (!empty($emailErr)) {
        echo $emailErr;
    } elseif (!empty($passwordErr)) {
        echo $passwordErr;
    } elseif (!empty($confirm_passwordErr)) {
        echo $confirm_passwordErr;
    }
}

