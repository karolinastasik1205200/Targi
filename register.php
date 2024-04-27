<?php
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