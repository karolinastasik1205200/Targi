<?php

require_once 'db_connect.php';

require 'vendor/autoload.php';
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $email = htmlspecialchars($_POST['email']);

    // Sprawdzenie czy użytkownik istnieje
    $sql = "SELECT id FROM users WHERE email = :email";
    $stmt = $db->prepare($sql);
    $stmt->bindParam(':email', $email);
    $stmt->execute();
    $user = $stmt->fetch(PDO::FETCH_ASSOC);

    if ($user) {
        $token = bin2hex(random_bytes(50)); // Generowanie tokenu
        $expires = date("U") + 1800; // Token ważny przez 30 minut

        // Usuwanie starych tokenów
        $sql = "DELETE FROM password_reset WHERE email = :email";
        $stmt = $db->prepare($sql);
        $stmt->bindParam(':email', $email);
        $stmt->execute();

        // Wstawianie nowego tokenu
        $sql = "INSERT INTO password_reset (email, token, expires) VALUES (:email, :token, :expires)";
        $stmt = $db->prepare($sql);
        $stmt->bindParam(':email', $email);
        $stmt->bindParam(':token', $token);
        $stmt->bindParam(':expires', $expires);
        $stmt->execute();

        // Wysłanie e-maila
//        $to = $email;
//        $subject = 'Resetowanie hasła';
//        $message = 'Kliknij poniższy link, aby zresetować swoje hasło: ';
//        $message .= '<a href="http://yourwebsite.com/reset_password.php?token=' . $token . '">Resetuj hasło</a>';
//        $headers = 'From: webmaster@yourwebsite.com' . "\r\n" .
//            'Reply-To: webmaster@yourwebsite.com' . "\r\n" .
//            'X-Mailer: PHP/' . phpversion();
//        $headers .= 'Content-type: text/html; charset=utf-8' . "\r\n";

        $mail = new PHPMailer(true);

        $mail->isSMTP();
        $mail->Host = 'mail62.mydevil.net';
        $mail->SMTPAuth = true;
        $mail->Username = 'reset@event-arena.org.pl';
        $mail->Password = '3-hCR(M8+hX9Y.z-0rm0gFjwothI{8';
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
        $mail->Port = 587;


        $mail->setFrom('reset@event-arena.org.pl', 'Resetowanie hasła');
        $mail->addAddress($email, 'event-arena.org.pl');


        $mail->isHTML(true);
        $mail->Subject = 'Resetowanie hasła do konta użytkownika w serwisie Event-Arena.org.pl';
        $mail->Body    = 'Kliknij poniższy link, aby zresetować swoje hasło: <a href="http://event-arena.org.pl/reset_password.php?token=' . $token . '">Resetuj hasło</a>';

        $mail->send();

        if ($mail->send()) {
            echo 'Wysłano link do resetowania hasła na podany adres e-mail.';
        } else {
            echo 'Nie udało się wysłać e-maila.';
        }
    } else {
        echo 'Nie znaleziono użytkownika z tym adresem e-mail.';
    }
}
?>
