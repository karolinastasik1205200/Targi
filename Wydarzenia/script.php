<?php
// Połączenie z bazą danych
$config = require_once '../config.php';
try {
    $db = new PDO("mysql:host={$config['host']};dbname={$config['database']};charset=utf8", $config['user'], $config['password'], [
        PDO::ATTR_EMULATE_PREPARES => false,
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
    ]);

    // Zapytanie SQL
    // $sql = "SELECT Nazwa, Zdjecie, Data FROM Wydarzenia";
    $sql = "SELECT Nazwa, Data, Zdjecie, id FROM wydarzenia";
    $stmt = $db->prepare($sql);

    $zmienna = $stmt->execute();

if ($zmienna === false) {
    $errorInfo = $stmt->errorInfo();
    // Wypisz szczegóły błędu
    echo "Błąd zapytania: " . $errorInfo[2];
}

    $wydarzenia = $stmt->fetchAll(PDO::FETCH_ASSOC);
    // Przetwarzanie wyników
    if ($wydarzenia === false) {
        exit('Error processing results');
    }
    // Zamykanie połączenia z bazą danych
    $db = null;

    // Zwrócenie danych w formacie JSON
    header('Content-Type: application/json');
    echo json_encode($wydarzenia);
} catch (PDOException $error) {
    // Obsługa błędu
    header('Content-Type: application/json');
    echo json_encode(array('error' => $error));
}
?>