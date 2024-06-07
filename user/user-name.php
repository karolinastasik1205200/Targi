<?php
session_start();
require_once 'db_connect.php';

$userId = $_SESSION['user_id'];
$sql = "SELECT username FROM users WHERE id = :id";
$stmt = $db->prepare($sql);
$stmt->bindParam(':id', $userId, PDO::PARAM_INT);
$stmt->execute();
$user = $stmt->fetch(PDO::FETCH_ASSOC);

$username = $user['username'];
?>



<h4><?php echo $username; ?></h4>


<?php $db = null; ?>
