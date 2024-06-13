
<section class="user-page-section">


    <h1>Konto użytkownika</h1>

    <div class="user-page-container">

        <div class="column">
            <h2>Twoje rezerwacje:</h2>
            <ul id="rezerwacje-lista"></ul>
            <script src="user/user_reservation.js"></script>
        </div>

        <?php include 'profile.php';?>

        <button onclick="toggleResetPassForm()">Zmień hasło</button>


        <div class="user-avatar">
            <div>
                <?php include 'avatar.php';?>
            </div>

            <form action="user/upload_avatar.php" method="post" enctype="multipart/form-data">
                <label for="avatar">Wybierz avatar:</label>
                <input type="file" name="avatar" id="avatar" required>
                <button type="submit">Zapisz avatar</button>
            </form>
            <div>
                <?php include 'user-name.php';?>
            </div>
        </div>

    </div>
</section>