<?php require "header.php"?>
<section>
    <form action="register.php" method="post" class="">
        <div>
            <label for="username">Podaj nazwę użytkownika:</label>
            <input type="text" name="username" id="username" placeholder="Nazwa użytkownika" required>
        </div>

        <div>
            <label for="email">Wprowadź swój adres e-mail:</label>
            <input type="email" name="email" id="email" placeholder="Adres e-mail" required>
        </div>

        <div>
            <label for="password">Podaj hasło:</label>
            <input type="password" name="password" id="password" placeholder="Hasło" required>
        </div>

        <div>
            <label for="confirm-password">Potwierdź swoje hasło:</label>
            <input type="password" name="confirm_password" id="confirm-password" placeholder="Potwierdź hasło" required>
        </div>

        <div>
            <button type="submit">Zarejestruj</button>
        </div>
    </form>
</section>
