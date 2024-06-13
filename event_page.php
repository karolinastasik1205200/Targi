<?php
ob_start();
session_start();
require 'header.php';

if (!isset($_SESSION['user_id'])) {
    header("Location: index.php");
    exit();
}

require 'Wydarzenia/ListaWydarzen.html';

require 'footer.php';
ob_end_flush();
?>
