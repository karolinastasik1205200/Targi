<?php
ob_start(); // Włącz buforowanie wyjścia

require 'header.php';

if (!isset($_SESSION['user_id'])) {
    header("Location: index.php");
    exit();
}

require 'user/user.php';

require 'footer.php';

ob_end_flush(); // Opróżnij (i wyślij) bufor wyjścia
?>
