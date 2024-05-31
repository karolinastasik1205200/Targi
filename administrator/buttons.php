<?php

$config = require_once '../config.php';

try {
    $db = new PDO(
        "mysql:host={$config['host']};dbname={$config['database']};charset=utf8", 
        $config['user'], 
        $config['password'], 
        [
            PDO::ATTR_EMULATE_PREPARES => false,
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
        ]
    );

    $postData = json_decode(file_get_contents('php://input'), true);
    $action = isset($postData['action']) ? $postData['action'] : '';
    $id = isset($postData['id']) ? intval($postData['id']) : 0;

    if ($action === 'accept') {
        
        $sql = "INSERT INTO rezerwacje_potwierdzone SELECT * FROM rezerwacje_niepotwierdzone WHERE id = :id";
        $stmt = $db->prepare($sql);
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        $stmt->execute();

        $sql = "DELETE FROM rezerwacje_niepotwierdzone WHERE id = :id";
        $stmt = $db->prepare($sql);
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        $stmt->execute();

        echo json_encode(['success' => true]);

    } elseif ($action === 'reject') {
        
        $sql = "DELETE FROM rezerwacje_niepotwierdzone WHERE id = :id";
        $stmt = $db->prepare($sql);
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        $stmt->execute();

        echo json_encode(['success' => true]);
    }

    
    $db = null;

} catch (PDOException $error) {
    header('Content-Type: application/json');
    echo json_encode(['error' => $error->getMessage()]);
}
?>