<?php

session_start();
require_once 'db_connect.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $email = htmlspecialchars($_POST['email']);
    $password = $_POST['password'];

    $sql = "SELECT id, password FROM users WHERE email = :email";
    $stmt = $db->prepare($sql);
    $stmt->bindParam(':email', $email, PDO::PARAM_STR);
    $stmt->execute();

    $user = $stmt->fetch(PDO::FETCH_ASSOC);

    if ($user && password_verify($password, $user['password'])) {
        $_SESSION['user_id'] = $user['id'];
        echo "Logowanie zakończone sukcesem!";
        header("Location: user_page.php");
        exit();
    } else {
        echo "Nieprawidłowa nazwa użytkownika lub hasło.";
    }