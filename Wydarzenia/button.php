<?php
session_start();
$is_logged_in = isset($_SESSION['user']) ? $_SESSION['user'] : null;
echo json_encode(['isLoggedIn' => $is_logged_in]);
?>