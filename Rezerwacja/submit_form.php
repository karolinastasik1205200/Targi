<?php
require_once '../db_connect.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
   
    $name = $_POST['name'];
    $email = $_POST['email'];
    $telephone = $_POST['telephone'];
    $blaty = $_POST['blaty'];
    $krzesla = $_POST['krzesla'];
    $description = $_POST['description'];
    $selected_area = $_POST['selected_area'];
    $id_wydarzenia = $_POST['id_wydarzenia'];

    
    $equipment = [];

    if (isset($_POST['monitor'])) {
        $equipment[] = $_POST['monitor'];
    }
    if (isset($_POST['glosniki'])) {
        $equipment[] = $_POST['glosniki'];
    }
    if (isset($_POST['rzutnik'])) {
        $equipment[] = $_POST['rzutnik'];
    }
    if (isset($_POST['mikrofon_z_naglosnieniem'])) {
        $equipment[] = $_POST['mikrofon_z_naglosnieniem'];
    }

    
    $equipment_string = implode(', ', $equipment);

    

   
    $query = "INSERT INTO rezerwacje_niepotwierdzone (Wlasciciel, ID_Wydarzenia, Email, Telefon, Blaty, Krzesla, Wyposazenie, Opis, Miejsce) 
              VALUES (:name, :id_wydarzenia, :email, :telephone, :blaty, :krzesla, :equipment, :description, :selected_area)";
    $statement = $db->prepare($query);
    $statement->execute(array(
        'name' => $name,
        'id_wydarzenia' => $id_wydarzenia,
        'email' => $email,
        'telephone' => $telephone,
        'blaty' => $blaty,
        'krzesla' => $krzesla,
        'equipment' => $equipment_string, // Zmiana na $equipment_string
        'description' => $description,
        'selected_area' => $selected_area
    ));
}
?>