<?php require 'header.php';
if (!isset($_SESSION['user_id'])) {
    header("Location: ../index.php");
    exit();
}
?>
<link rel="stylesheet" href="admin.css">


    <h1>Konto administratora</h1>
    <div class="container">
        <div class="column">
            <h2>Rezerwacje niezatwierdzone</h2>
            <ul id="rezerwacje-lista"></ul>
            <script src="admin.js"></script>
        </div>
        <div class="column">
            <h2>Dodaj nowe wydarzenie:</h2>
            <form action="add_event.php" method="post">
                <label for="name">Nazwa wydarzenia:</label><br>
                <input type="text" id="name" name="name"><br><br>
        
                <label for="date">Data:</label><br>
                <input type="date" id="date" name="date"><br><br>

                <label for="time">Czas trwania:</label><br>
                <input type="text" id="time" name="time"><br><br>

                <label for="image">Link do zdjęcia:</label><br>
                <input type="text" id="image" name="image"><br><br>

                <label id="description" for="description">Opis wydarzenia:</label><br>
                <textarea id="description" name="description" rows="8" cols="70"></textarea><br><br>
                
                <input type="submit" value="Wyślij">
            </form>
        </div>
    </div>
<?php require 'footer.php';?>