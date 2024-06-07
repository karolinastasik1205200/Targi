<?php
session_start();
require_once '../db_connect.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_FILES['avatar'])) {
    $userId = $_SESSION['user_id'];
    $uploadDir = '../src/user/';
    $uploadFile = $uploadDir . basename($_FILES['avatar']['name']);
    $imageFileType = strtolower(pathinfo($uploadFile, PATHINFO_EXTENSION));
    $allowedTypes = ['jpg', 'jpeg', 'png', 'gif'];
    $maxFileSize = 2 * 1024 * 1024; // 2MB
    $placeholderPath = '../src/user-placeholder.png'; // Ścieżka do placeholdera


    // Pobierz ścieżkę starego avatara z bazy danych
    $sql = "SELECT avatar FROM users WHERE id = :id";
    $stmt = $db->prepare($sql);
    $stmt->bindParam(':id', $userId, PDO::PARAM_INT);
    $stmt->execute();
    $user = $stmt->fetch(PDO::FETCH_ASSOC);
    $oldAvatar = $user['avatar'];

    // Sprawdzenie typu pliku
    if (!in_array($imageFileType, $allowedTypes)) {
        die("Niedozwolony typ pliku.");
    }

    // Sprawdzenie czy plik jest obrazem
    $check = getimagesize($_FILES['avatar']['tmp_name']);
    if ($check === false) {
        die("Plik nie jest obrazem.");
    }

    // Sprawdzenie rozmiaru pliku
    if ($_FILES['avatar']['size'] > $maxFileSize) {
        die("Plik jest za duży. Maksymalny rozmiar to 2MB.");
    }

    // Generowanie unikalnej nazwy pliku
    $newFileName = $uploadDir . uniqid('avatar_', true) . '.' . $imageFileType;

    // Przeniesienie pliku
    if (move_uploaded_file($_FILES['avatar']['tmp_name'], $newFileName)) {

        // Usuń stary avatar, jeśli nie jest placeholderem
        if ($oldAvatar && $oldAvatar !== $placeholderPath && file_exists($oldAvatar)) {
            unlink($oldAvatar);
        }

        // Zapis ścieżki avatara do bazy danych
        $sql = "UPDATE users SET avatar = :avatar WHERE id = :id";
        $stmt = $db->prepare($sql);
        $stmt->bindParam(':avatar', $newFileName);
        $stmt->bindParam(':id', $userId, PDO::PARAM_INT);

        if ($stmt->execute()) {
            echo "Avatar został zaktualizowany.";
        } else {
            echo "Błąd podczas zapisywania do bazy danych.";
        }
    } else {
        echo "Błąd podczas przesyłania pliku.";
    }
} else {
    echo "Nie przesłano pliku.";
}

$db = null;
?>
