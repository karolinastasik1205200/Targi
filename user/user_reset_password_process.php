<?php
session_start();
require_once '../db_connect.php';

if (!isset($_SESSION['user_id'])) {
    header('Location: index.php');
    exit();
}

$user_id = $_SESSION['user_id'];

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $current_password = $_POST['current_password'];
    $new_password = $_POST['new_password'];
    $confirm_new_password = $_POST['confirm_new_password'];

    // Pobierz aktualne hasło użytkownika z bazy danych
    $sql = "SELECT password FROM users WHERE id = :id";
    $stmt = $db->prepare($sql);
    $stmt->bindParam(':id', $user_id, PDO::PARAM_INT);
    $stmt->execute();
    $user = $stmt->fetch(PDO::FETCH_ASSOC);

    // Sprawdź, czy aktualne hasło jest poprawne
    if (!password_verify($current_password, $user['password'])) {
        echo "Błędne aktualne hasło.";
        exit();
    }

    // Sprawdź, czy nowe hasła są zgodne
    if ($new_password !== $confirm_new_password) {
        echo "Nowe hasła się nie zgadzają.";
        exit();
    }

    // Zaktualizuj hasło w bazie danych
    $new_password_hashed = password_hash($new_password, PASSWORD_DEFAULT);
    $update_sql = "UPDATE users SET password = :new_password WHERE id = :id";
    $update_stmt = $db->prepare($update_sql);
    $update_stmt->bindParam(':new_password', $new_password_hashed, PDO::PARAM_STR);
    $update_stmt->bindParam(':id', $user_id, PDO::PARAM_INT);
    $update_stmt->execute();

    echo "Hasło zostało zmienione.";
}
?>

<a href="../user_page.php">Wróć na konto użytkownika</a>
