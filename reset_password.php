
<section>
    <div class="">
        <div class="">
            <h1>Resetowanie hasła</h1>
            <?php
            if (isset($_GET['token'])) {
                $token = htmlspecialchars($_GET['token']);
                echo '
                <form action="reset_password_process.php" method="post">
                    <div>
                        <input type="hidden" name="token" value="' . $token . '">
                        <label for="password">Nowe hasło:</label>
                        <input type="password" name="password" id="password" required>
                    </div>
                    
                    <div>
                        <label for="confirm_password">Potwierdź nowe hasło:</label>
                        <input type="password" name="confirm_password" id="confirm_password" required>
                    </div>
                    
                    <div>
                        <input type="submit" value="Resetuj hasło">
                    </div>
                </form>';
            } else {
                echo 'Brak ważnego tokenu.';
            }
            ?>
        </div>
    </div>
</section>