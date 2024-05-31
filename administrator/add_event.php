<?php

require_once '../db_connect.php';


$name = $_POST['name'];
$date = $_POST['date'];
$time = $_POST['time'];
$image = $_POST['image'];
$description = $_POST['description'];


$query = "INSERT INTO wydarzenia (Nazwa, Data, Czas_trwania, Zdjecie, Opis) 
          VALUES (:name, :date, :time, :image, :description)";
$statement = $db->prepare($query);
$statement->execute(array(
    'name' => $name,
    'date' => $date,
    'time' => $time,
    'image' => $image,
    'description' => $description,
));


if ($statement) {
    echo "Dane zostały pomyślnie zapisane do bazy danych.";
} else {
    echo "Wystąpił błąd podczas zapisywania danych.";
}
?>