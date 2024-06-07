
<section class="user-page-section">

    <h1>Konto użytkownika</h1>

    <div class="user-page-container">

        <div class="column">
            <h2>Twoje rezerwacje:</h2>
            <ul id="rezerwacje-lista"></ul>
            <script src="admin.js"></script>
        </div>

        <div class="user-information">
            <form>
                <h2>Twoje dane:</h2>
                <div>
                    <label for="user-email">E-mail: </label>
                    <input type="email" value="" id="user-email">
                </div>

                <div>
                    <label for="user-tel">Numer telefonu: </label>
                    <input type="tel" value="" id="user-tel">
                </div>

                <div>
                    <label for="user-address">Adres siedziby: </label>
                    <input type="text" value="" id="user-address">
                </div>

                <div>
                    <label for="user-krs">KRS: </label>
                    <input type="number" value="" id="user-krs">
                </div>

                <div>
                    <label for="user-nip">NIP: </label>
                    <input type="number" value="" id="user-nip">
                </div>

                <div>
                    <label for="user-name-surname">Imię i nazwisko właściciela: </label>
                    <input type="text" value="" id="user-name-surname">
                </div>

                <div>
                    <label for="user-description"></label>
                    <textarea id="user-description"></textarea>
                </div>
            </form>
        </div>

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