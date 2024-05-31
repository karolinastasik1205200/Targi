<?php

$config = require_once '../config.php';

try {
    $db = new PDO("mysql:host={$config['host']};dbname={$config['database']};charset=utf8", $config['user'], $config['password'], [
        PDO::ATTR_EMULATE_PREPARES => false,
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
    ]);

    
    $id = null;
    if ($_SERVER['REQUEST_METHOD'] === 'GET' && isset($_GET['id'])) {
        $id = $_GET['id'];
    } elseif ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $input = json_decode(file_get_contents('php://input'), true);
        if (isset($input['id'])) {
            $id = $input['id'];
        }
    }

    if ($id === null) {
        throw new Exception('Brak wymaganego parametru "id"');
    }

    
    $sql = "SELECT Miejsce FROM rezerwacje_potwierdzone WHERE ID_Wydarzenia = :id";
    $stmt = $db->prepare($sql);

    
    $stmt->bindParam(':id', $id, PDO::PARAM_INT);

    $stmt->execute();

    $rezerwacje = $stmt->fetchAll(PDO::FETCH_ASSOC);

    
    $db = null;

   
    header('Content-Type: application/json');
    echo json_encode($rezerwacje);

} catch (PDOException $error) {
    
    header('Content-Type: text/html');
    echo "Wystąpił błąd: " . $error->getMessage();
} catch (Exception $error) {
    
    header('Content-Type: text/html');
    echo "Wystąpił błąd: " . $error->getMessage();
}
?>