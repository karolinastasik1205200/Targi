<?php require "header.php"; ?>

<script src="js/reg_valid.js"></script>
<section class="section-register-form">
    <h1>Formularz rejestracji</h1>
    <form id="register-form" action="register.php" method="post" class="register-form">
        <div>
            <label for="username">Podaj nazwę użytkownika:</label>
            <input type="text" name="username" id="username" placeholder="Nazwa użytkownika" required>
            <span id="jsValidUser"></span>
        </div>

        <div>
            <label for="email">Wprowadź swój adres e-mail:</label>
            <input type="email" name="email" id="email" placeholder="Adres e-mail" required>
            <span id="jsValidEmail"></span>
        </div>

        <div>
            <label for="password">Podaj hasło:</label>
            <input type="password" name="password" id="password" placeholder="Hasło" required>
            <span id="jsValidPass"></span>

            <label for="confirm-password">Potwierdź swoje hasło:</label>
            <input type="password" name="confirm_password" id="confirm-password" placeholder="Potwierdź hasło" required>
            <span id="jsValidConPass"></span>
        </div>

        <div>
            <input type="submit" name="submit" value="Zarejestruj" class="register-btn" onclick="validateForm()">
        </div>
    </form>
</section>

<?php require 'footer.php'; ?>
