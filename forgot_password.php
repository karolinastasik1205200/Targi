<?php require 'header.php';?>
    <section class="forgot-password-section">
        <div id="forgotPasswordForm" class="">
            <!--    <div class="login-background" onclick="toggleLoginForm()"></div>-->
            <div class="login-form-box">
                <h1>Resetowanie hasła</h1>
                <form id="mobile-login-form" action="send_reset_link.php" method="post" class="login-form">
                    <div>
                        <label for="email">Wprowadź swój adres e-mail:</label>
                        <input type="email" name="email" id="email" placeholder="Adres e-mail" required>
                    </div>

                    <div>
                        <input type="submit" value="Wyślij link do resetowania hasła" class="login-form-btn">
                    </div>
                </form>
            </div>
        </div>
    </section>

<?php require 'footer.php';?>
