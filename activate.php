<?php

require_once 'db_connect.php';


if (isset($_GET['token'])) {
    $token = $_GET['token'];

    // Activate user account
    $sql = "UPDATE users SET activated = 1 WHERE token = '$token'";
    if ($db->query($sql) == TRUE) {
        echo "Konto zostało pomyślnie aktywowane!";
    } else {
        echo "Niewłaściwy token lub konto jest już aktywowane.";
    }
}

$db = null;
?>