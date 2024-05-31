<?php

require_once 'db_connect.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $token = htmlspecialchars($_POST['token']);
    $password = $_POST['password'];
    $confirm_password = $_POST['confirm_password'];

    if ($password !== $confirm_password) {
        echo 'Hasła się nie zgadzają.';
        exit();
    }

    // Sprawdzenie tokenu
    $sql = "SELECT * FROM password_reset WHERE token = :token AND expires >= :current_time";
    $stmt = $db->prepare($sql);
    $stmt->bindParam(':token', $token);
    $stmt->bindParam(':current_time', date("U"));
    $stmt->execute();
    $reset = $stmt->fetch(PDO::FETCH_ASSOC);

    if ($reset) {
        $hashed_password = password_hash($password, PASSWORD_DEFAULT);

        // Aktualizacja hasła użytkownika
        $sql = "UPDATE users SET password = :password WHERE email = :email";
        $stmt = $db->prepare($sql);
        $stmt->bindParam(':password', $hashed_password);
        $stmt->bindParam(':email', $reset['email']);
        $stmt->execute();

        // Usunięcie użytego tokenu
        $sql = "DELETE FROM password_reset WHERE token = :token";
        $stmt = $db->prepare($sql);
        $stmt->bindParam(':token', $token);
        $stmt->execute();

        echo 'Hasło zostało zresetowane.';
    } else {
        echo 'Nieprawidłowy lub przeterminowany token.';
    }
}

