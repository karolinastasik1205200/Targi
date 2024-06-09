

<div id="reset-password-container" class="login-hidden">
    <div class="login-background" onclick="toggleResetPassForm()"></div>
    <div class="login-form-box">
        <h1>Zmiana hasła</h1>
        <form action="user/user_reset_password_process.php" method="post" class="login-form">
            <div>
                <label for="current_password">Aktualne hasło:</label>
                <input type="password" name="current_password" id="current_password" required>
                <span id="jsValidCurrentPass"></span>
            </div>
            <div>
                <label for="new_password">Nowe hasło:</label>
                <input type="password" name="new_password" id="new_password" required>
                <span id="jsValidResetPass"></span>
            </div>
            <div>
                <label for="confirm_new_password">Potwierdź nowe hasło:</label>
                <input type="password" name="confirm_new_password" id="confirm_new_password" required>
                <span id="jsValidResetConfirmPass"></span>
            </div>
            <div>
                <button type="submit">Zmień hasło</button>
            </div>
        </form>
    </div>
</div>
