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

    $id = isset($_GET['id']) ? intval($_GET['id']) : 0;

    if ($id > 0) {
        
        $sql = "
            SELECT r.*, w.Nazwa
            FROM rezerwacje_niepotwierdzone r
            JOIN wydarzenia w ON r.ID_Wydarzenia = w.id
            WHERE r.id = :id
        ";
        $stmt = $db->prepare($sql);
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        $stmt->execute();
        $rezerwacja = $stmt->fetch(PDO::FETCH_ASSOC);

        
        header('Content-Type: application/json');
        if ($rezerwacja) {
            echo json_encode($rezerwacja);
        } else {
            echo json_encode(['error' => 'No record found']);
        }
    } else {
        
        header('Content-Type: application/json');
        echo json_encode(['error' => 'Invalid ID']);
    }
    
    $db = null;

} catch (PDOException $error) {
    header('Content-Type: application/json');
    echo json_encode(['error' => $error->getMessage()]);
}
?>