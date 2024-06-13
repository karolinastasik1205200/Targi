<?php

session_start();
require_once '../db_connect.php';


try {

    // Sprawdzenie, czy użytkownik jest zalogowany
    if (!isset($_SESSION['user_id'])) {
        header('Location: /index.php');
        exit;
    }

    $userId = $_SESSION['user_id'];

    $sql = "SELECT r.*, w.Nazwa
        FROM rezerwacje_niepotwierdzone r
        JOIN wydarzenia w ON r.ID_Wydarzenia = w.id
        WHERE user_id = :user_id";
    $stmt = $db->prepare($sql);
    $stmt->bindParam(':user_id', $userId, PDO::PARAM_INT);
    $stmt->execute();
    $rezerwacje = $stmt->fetchAll(PDO::FETCH_ASSOC);



    header('Content-Type: application/json');
    echo json_encode($rezerwacje);

} catch (PDOException $error) {
    header('Content-Type: application/json');
    echo json_encode(['error' => $error->getMessage()]);
}
?>
