
<?php
session_start();
require_once 'db_connect.php';

$userId = $_SESSION['user_id'];
$sql = "SELECT avatar FROM users WHERE id = :id";
$stmt = $db->prepare($sql);
$stmt->bindParam(':id', $userId, PDO::PARAM_INT);
$stmt->execute();
$user = $stmt->fetch(PDO::FETCH_ASSOC);

$avatar = $user['avatar'] ? $user['avatar'] : 'src/user-placeholder.png'; // Placeholder jeśli nie ma avatara
?>

<img src="<?php echo htmlspecialchars($avatar); ?>" alt="Avatar" style="width:250px; height:250px; border-radius: 20px">

<?php //$db = null; ?>
