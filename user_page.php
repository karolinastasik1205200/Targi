<?php
require 'header.php';

if (!isset($_SESSION['user_id'])) {
    header("Location: index.php");
    exit();
}

// Kod strony chronionej tutaj
echo "Witaj, " . $_SESSION['username'] . "!";
?>

<!--<button><a href="logout.php">Wyloguj</a></button>-->

<?php
require 'footer.php';
?>