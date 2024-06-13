<?php
ob_start();
session_start();
require_once 'db_connect.php';

// Sprawdzenie, czy użytkownik jest zalogowany
if (!isset($_SESSION['user_id'])) {
    header('Location: /index.php');
    exit;
}

// Pobieranie danych użytkownika z bazy danych
$user_id = $_SESSION['user_id'];
$sql = "SELECT email, phone_number, address, krs, nip, owner_name, description FROM users WHERE id = :id";
$stmt = $db->prepare($sql);
$stmt->bindParam(':id', $user_id, PDO::PARAM_INT);
$stmt->execute();
$user = $stmt->fetch(PDO::FETCH_ASSOC);

// Obsługa aktualizacji danych użytkownika
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Pobieranie danych z formularza
    $email = filter_input(INPUT_POST, 'email', FILTER_VALIDATE_EMAIL);
    $phone_number = filter_input(INPUT_POST, 'phone_number', FILTER_SANITIZE_STRING);
    $address = filter_input(INPUT_POST, 'address', FILTER_SANITIZE_STRING);
    $krs = filter_input(INPUT_POST, 'krs', FILTER_SANITIZE_STRING);
    $nip = filter_input(INPUT_POST, 'nip', FILTER_SANITIZE_STRING);
    $owner_name = filter_input(INPUT_POST, 'owner_name', FILTER_SANITIZE_STRING);
    $description = filter_input(INPUT_POST, 'description', FILTER_SANITIZE_STRING);

    // Walidacja wymaganych pól
    if ($email === false) {
        die('Podaj poprawny adres e-mail.');
    }

    // Aktualizacja danych w bazie
    $update_sql = "UPDATE users SET email = :email, phone_number = :phone_number, address = :address, krs = :krs, nip = :nip, owner_name = :owner_name, description = :description WHERE id = :id";
    $update_stmt = $db->prepare($update_sql);
    $update_stmt->bindParam(':email', $email, PDO::PARAM_STR);
    $update_stmt->bindParam(':phone_number', $phone_number, PDO::PARAM_STR);
    $update_stmt->bindParam(':address', $address, PDO::PARAM_STR);
    $update_stmt->bindParam(':krs', $krs, PDO::PARAM_STR);
    $update_stmt->bindParam(':nip', $nip, PDO::PARAM_STR);
    $update_stmt->bindParam(':owner_name', $owner_name, PDO::PARAM_STR);
    $update_stmt->bindParam(':description', $description, PDO::PARAM_STR);
    $update_stmt->bindParam(':id', $user_id, PDO::PARAM_INT);
    $update_stmt->execute();

}

ob_end_flush();
?>

<div class="user-information-profile-container">
    <h1>Twoje dane:</h1>
    <form action="" method="post" class="user-information-form">
        <table class="user-information-table">
            <tr>
                <td><label for="email">E-mail:</label></td>
                <td><span id="email"><?php echo htmlspecialchars($user['email']); ?></td>
            </tr>
            <tr>
                <td><label for="phone_number">Numer telefonu:</label></td>
                <td><input type="text" name="phone_number" id="phone_number" value="<?php echo htmlspecialchars($user['phone_number'] ?? ''); ?>" placeholder="Brak danych"></td>
            </tr>
            <tr>
                <td><label for="address">Adres siedziby:</label></td>
                <td><input type="text" name="address" id="address" value="<?php echo htmlspecialchars($user['address'] ?? ''); ?>" placeholder="Brak danych"></td>
            </tr>
            <tr>
                <td><label for="krs">KRS:</label></td>
                <td><input type="text" name="krs" id="krs" value="<?php echo htmlspecialchars($user['krs'] ?? ''); ?>" placeholder="Brak danych"></td>
            </tr>
            <tr>
                <td><label for="nip">NIP:</label></td>
                <td><input type="text" name="nip" id="nip" value="<?php echo htmlspecialchars($user['nip'] ?? ''); ?>" placeholder="Brak danych"></td>
            </tr>
            <tr>
                <td><label for="owner_name">Imię i nazwisko właściciela:</label></td>
                <td><input type="text" name="owner_name" id="owner_name" value="<?php echo htmlspecialchars($user['owner_name'] ?? ''); ?>" placeholder="Brak danych"></td>
            </tr>
            <tr>
                <td><label for="description">Opis działalności:</label></td>
                <td><textarea name="description" id="description" placeholder="Brak danych"><?php echo htmlspecialchars($user['description'] ?? ''); ?></textarea></td>
            </tr>
            <tr class="form-actions">
                <td colspan="2"><button type="submit">Zaktualizuj dane</button></td>
            </tr>
        </table>
    </form>
</div>
