<?php
require 'header.php';
?>
<section class="mobile-login-form">
    <div id="mobile-login-form-container" class="">
    <!--    <div class="login-background" onclick="toggleLoginForm()"></div>-->
        <div class="login-form-box">
            <form id="mobile-login-form" action="login.php" method="post" class="login-form">
                <div>
                    <label for="username">Nazwa użytkownika:</label>
                    <input type="text" name="username" id="username" required>
                    <span id="jsValidUserLoginMobile"></span>
                </div>

                <div>
                    <label for="password">Hasło:</label>
                    <input type="password" name="password" id="password" required>
                    <span id="jsValidPassLoginMobile"></span>
                </div>

                <div>
                    <input type="submit" value="Zaloguj się" name="submit" class="login-form-btn" onclick="loginValidateMobileForm()">
                </div>
            </form>
        </div>
    </div>
</section>
<?php
require 'footer.php';
?>
