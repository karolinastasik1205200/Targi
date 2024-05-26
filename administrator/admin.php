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

    
    $sql = "
        SELECT r.*, w.Nazwa
        FROM rezerwacje_niepotwierdzone r
        JOIN wydarzenia w ON r.ID_Wydarzenia = w.id
    ";
    $stmt = $db->prepare($sql);
    $stmt->execute();
    $rezerwacje = $stmt->fetchAll(PDO::FETCH_ASSOC);

    
    $db = null;

    
    header('Content-Type: application/json');
    echo json_encode($rezerwacje);

} catch (PDOException $error) {
    header('Content-Type: application/json');
    echo json_encode(['error' => $error->getMessage()]);
}
?>