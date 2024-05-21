<?php require "header.php" ?>

<section class="section-register-form">
    <h1></h1>
    <div class="register-form register-form-answer">

        <?php

        require 'vendor/autoload.php';
        use PHPMailer\PHPMailer\PHPMailer;
        use PHPMailer\PHPMailer\Exception;

        function testInput($data)
        {
            $data = trim($data);
            $data = stripslashes($data);
            $data = htmlspecialchars($data);
            return $data;
        }

        if ($_SERVER['REQUEST_METHOD'] == 'POST') {

            $username = testInput($_POST['username']);
            $email = testInput($_POST['email']);
            $password = $_POST['password'];
            $confirm_password = $_POST['confirm_password'];
            $token = bin2hex(random_bytes(16));
        }
        $usernameErr = '';
        $emailErr = '';
        $passwordErr = '';
        $confirm_passwordErr = '';
        $registerInfo = '';
        $registerErr = '';


        if (!preg_match('/^[a-zA-Z0-9][a-zA-Z0-9\s]*[a-zA-Z0-9]$/', $username)) {
            $usernameErr = 'Dozwolone są tylko litery i cyfry oraz spacje!';
        } elseif (empty($username)) {
            $usernameErr = 'Pole nazwy użytkownika nie może być puste, ani posiadać wyłącznie znaków spacji!';
        } elseif (strlen($username) < 3) {
            $usernameErr = 'Nazwa użytkownika musi posiadać więcej niż 3 znaki!';
        } elseif (strlen($username) > 50) {
            $usernameErr = 'Nazwa użytkownika nie może posiadać więcej niż 50 znaków!';
        }

        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $emailErr = 'Niewłaściwy format adresu e-mail!';
        }

        if (empty($_POST['password'])) {
            $passwordErr = 'Pole hasła nie może być puste!';
        } elseif (strlen($password) < 6) {
            $passwordErr = 'Hasło musi posiadać co najmniej 6 znaków!';
        } elseif (strlen($password) > 50) {
            $passwordErr = 'Hasło nie może posiadać więcej niż 50 znaków!';
        }

        if ($password !== $confirm_password) {
            $confirm_passwordErr = 'Podane hasła nie są tożsame!';
        }


        if (empty($usernameErr) && empty($emailErr) && empty($passwordErr) && empty($confirm_passwordErr)) {
            try {
                $hashed_password = password_hash($password, PASSWORD_DEFAULT);

                require_once 'db_connect.php';

                $sql = "INSERT INTO users (username, email, password, token) VALUES (:username, :email, :password, :token)";
                $stmt = $db->prepare($sql);

                $stmt->bindParam(':username', $username);
                $stmt->bindParam(':email', $email);
                $stmt->bindParam(':password', $hashed_password);
                $stmt->bindParam(':token', $token);

                $stmt->execute();
                $registerInfo = '<p class="regInfo">Rejestracja zakończona pomyślnie.</p>';


                // Próba wysłania maila przez biblioteke PHPMailer

                $mail = new PHPMailer(true);

                $mail->isSMTP();
                $mail->Host = 'mail62.mydevil.net';
                $mail->SMTPAuth = true;
                $mail->Username = 'rejestracja@event-arena.org.pl';
                $mail->Password = 'R$nGz+LTr+s63awY.5ZZo9vn~J6_GQ';
                $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
                $mail->Port = 587;

                // Recipients
                $mail->setFrom('rejestracja@event-arena.org.pl', 'Mailer');
                $mail->addAddress($email, $username);

                // Content
                $mail->isHTML(true);
                $mail->Subject = 'Aktywuj swoje konto w serwisie Event-Arena.org.pl';
                $mail->Body    = "Kliknij w link, aby aktywować swoje konto użytkownika: <a href='http://event-arena.org.pl/activate.php?token=$token'>Aktywuj moje konto!</a>";

                $mail->send();


            } catch (PDOException $e) {
                if ($e->getCode() == 23000) { // Kod błędu dla naruszenia unikalności
                    // Sprawdź, które pole spowodowało błąd
                    if (strpos($e->getMessage(), 'username') !== false) {
                        $usernameErr = "Nazwa użytkownika jest już zajęta. Wybierz inną nazwę.";
                    } elseif (strpos($e->getMessage(), 'email') !== false) {
                        $emailErr = "Adres e-mail jest już zarejestrowany. Użyj innego adresu e-mail.";
                    } else {
                        $registerErr = '<p class="regInfo">Błąd podczas rejestracji: Naruszenie unikalności</p>';
                    }
                } else {
                    $registerErr = '<p class="regInfo">Błąd podczas rejestracji</p>';
                }
                $registerErr = '<p class="regInfo">Błąd podczas rejestracji</p>';
            }
            $db = null;
        } elseif (!empty($usernameErr) || !empty($emailErr) || !empty($passwordErr) || !empty($confirm_passwordErr)) {
            $registerErr = "<p class='regInfo'>Błąd podczas rejestracji</p>";
        }
        ?>
        <ul>

            <?php
            if (!empty($registerInfo)) {
                echo "<li>
                        $registerInfo
                      </li>";
            } elseif (!empty($registerErr)) {
                echo "<li>
                        $registerErr
                      </li>";
            }

            if (!empty($usernameErr)) {
                echo "<li>
                        <p>Nazwa użytkownika: $usernameErr </p>
                      </li>";
            }
            if (!empty($emailErr)) {
                echo "<li>
                        <p>E-mail: $emailErr</p>
                      </li>";
            }
            if (!empty($passwordErr)) {
                echo "<li>
                        <p>Hasło: $passwordErr</p>
                      </li>";
            }
            if (!empty($confirm_passwordErr)) {
                echo "<li>
                        <p>Potwierdzenie hasła: $confirm_passwordErr</p>
                      </li>";
            }


            if (empty($usernameErr) && empty($emailErr) && empty($passwordErr) && empty($confirm_passwordErr) && empty($registerErr)) {
                echo "<li>
                        <p>Na podany adres e-mail została wysłana wiadomość, z dalszymi instrukcjami dotyczącymi konta użytkownika.</p>
                      </li>";
            }
            ?>

        </ul>
    </div>
</section>

