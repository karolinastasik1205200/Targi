<?php

require_once 'db_connect.php';


if (isset($_GET['token'])) {
    $token = htmlspecialchars($_GET['token']);

//    // Activate user account
//    $sql = "UPDATE users SET activated = 1 WHERE token='$token'";
//    $stmt = $db->prepare($sql);
//
//    $stmt->execute();
//
//    if ($stmt->execute() === TRUE) {
//        echo "Konto zostało pomyślnie aktywowane!";
//    } else {
//        echo "Niewłaściwy token lub konto jest już aktywowane.";
//    }
//
//}

    $sql = "SELECT activated FROM users WHERE token = :token";
    $stmt = $db->prepare($sql);
    $stmt->bindParam(':token', $token, PDO::PARAM_STR);
    $stmt->execute();
    $user = $stmt->fetch(PDO::FETCH_ASSOC);

    if ($user) {
        if ($user['activated'] == 0) {
            // Aktywuj konto użytkownika
            $sql = "UPDATE users SET activated = 1 WHERE token = :token";
            $stmt = $db->prepare($sql);
            $stmt->bindParam(':token', $token, PDO::PARAM_STR);
            $stmt->execute();

            echo "Konto zostało pomyślnie aktywowane!";
        } else {
            echo "Konto było już aktywowane.";
        }
    } else {
        echo "Niewłaściwy token.";
    }
}
$db = null;
?>