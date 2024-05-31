<?php
$config = require_once '../config.php';

try {
    $db = new PDO("mysql:host={$config['host']};dbname={$config['database']};charset=utf8", $config['user'], $config['password'], [
        PDO::ATTR_EMULATE_PREPARES => false,
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
    ]);
} catch (PDOException $error) {
    exit('Database error');
}

$id_wydarzenia = $_GET['id'];

$sql = "SELECT Nazwa, Data, Czas_Trwania, Zdjecie, Opis FROM wydarzenia WHERE id = :id";
$stmt = $db->prepare($sql);
$stmt->bindParam(':id', $id_wydarzenia);
$stmt->execute();
$wydarzenie = $stmt->fetch(PDO::FETCH_ASSOC);

echo json_encode($wydarzenie);
?>