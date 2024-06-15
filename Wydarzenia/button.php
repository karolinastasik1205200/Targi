<?php
session_start();
$is_logged_in = isset($_SESSION['user_id']) ? $_SESSION['user_id'] : null;
echo json_encode(['isLoggedIn' => $is_logged_in]);
?>