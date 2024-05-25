<!doctype html>
<html lang="pl">
<head>
<link rel="apple-touch-icon" sizes="180x180" href="favicon_io/apple-touch-icon.png">
<link rel="icon" type="image/png" sizes="32x32" href="favicon_io/favicon-32x32.png">
<link rel="icon" type="image/png" sizes="16x16" href="favicon_io/favicon-16x16.png">
<link rel="manifest" href="favicon_io/site.webmanifest">
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" type="text/css" href="css/reset.css"/>
    <link rel="stylesheet" type="text/css" href="css/style.css"/>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <title>Event-Arena - Targi projekt zaliczeniowy</title>

    <script type="text/javascript" src="js/javascript.js"></script>
    <script type="text/javascript" src="js/login_valid.js"></script>
</head>
<body>

<!-- MENU -->
<section class="menu-section">

    <div class="menu-logo-space">
        <a href="index.php"><img class="menu-logo" src="/src/Event%20Arena.png" alt="Logo"></a>
    </div>

    <div class="menu-content">
        <div>
            <span>
                <a href="#"><i class="social-icons facebook-icon fa fa-facebook"></i></a>
                <a href="#"><i class="social-icons youtube-icon fa fa-youtube"></i></a>
                <a href="#"><i class="social-icons instagram-icon fa fa-instagram"></i></a>
            </span>
            <span class="search-bar-span">
                <input type="text" placeholder="Wyszukaj wydarzenie... " name="search" class="search-bar">
                <i class="search-icon fa fa-search"></i>
            </span>
        </div>
        <ul class="menu-list">
            <li>
                <a href="index.php?id=1">STRONA GŁÓWNA</a>
            </li>
            <li>
                <a href="index.php?id=2">WYDARZENIA</a>
            </li>
            <li>
                <a href="index.php?id=3">KALENDARZ</a>
            </li>
            <li>
                <a href="index.php?id=3">KONTAKT</a>
            </li>
        </ul>
    </div>

    <div class="search-bar-span-mobile search-bar-span">
        <input type="text" placeholder="Szukaj wydarzenie..." name="search" class="search-bar">
        <i class="search-icon fa fa-search"></i>
    </div>

    <div class="menu-content-mobile">

        <div class="menu-burger" onclick="toggleMenu()">
            <div class="burger-container" onclick="animateBurger(this)">
                <div class="bar1 burger-bars"></div>
                <div class="bar2 burger-bars"></div>
                <div class="bar3 burger-bars"></div>
            </div>
            <div id="mobile-menu" class="menu-list-mobile-hidden">
                <ul>
                    <li>
                        <a href="index.php?id=1">STRONA GŁÓWNA</a>
                    </li>
                    <li>
                        <a href="index.php?id=2">WYDARZENIA</a>
                    </li>
                    <li>
                        <a href="index.php?id=3">KALENDARZ</a>
                    </li>
                    <li>
                        <a href="index.php?id=3">KONTAKT</a>
                    </li>
                </ul>
                <ul class="log-reg-btns-mobile">
                    <li>
                        <a href="#">ZALOGUJ</a>
                    </li>
                    <li>
                        <a href="#">ZAREJESTRUJ</a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
    <div class="menu-list log-reg-btns">
        <ul>
            <li>
                <a href="#" onclick="toggleLoginForm()">ZALOGUJ</a>
            </li>
            <li>
                <a href="register_page.php">ZAREJESTRUJ</a>
            </li>
        </ul>
    </div>
    <div id="login-form-container" class="login-hidden">
        <div class="login-background" onclick="toggleLoginForm()"></div>
        <div class="login-form-box">
            <form id="login-form" action="login.php" method="post" class="login-form">
                <div>
                    <label for="username">Nazwa użytkownika:</label>
                    <input type="text" name="username" id="username" required>
                    <span id="jsValidUserLogin"></span>
                </div>

                <div>
                    <label for="password">Hasło:</label>
                    <input type="password" name="password" id="password" required>
                    <span id="jsValidPassLogin"></span>
                </div>

                <div>
                    <input type="submit" value="Zaloguj się" name="submit" class="login-form-btn" onclick="loginValidateForm()">
                </div>
            </form>
        </div>
    </div>
    <!-- <form class="menu-login-form">
        <div class="container-login-form">
            <label for="username"><b>Nazwa użytkownika</b></label>
            <input type="text" placeholder="Podaj nazwę użytkownika" name="username" required>

            <label for="psw"><b>Hasło</b></label>
            <input type="password" placeholder="Podaj hasło" name="psw" required>

            <button type="submit">Zaloguj</button>
            <label>
                <input type="checkbox" checked="checked" name="remember"> Zapamiętaj
            </label>
        </div>

        <div class="" style="background-color:#f1f1f1">
            <button type="button" class="cancel-btn">Anuluj</button>
            <span class="psw">Nie pamiętasz <a href="#">hasła?</a></span>
        </div>
    </form> -->

</section>

<?php
/*
if (isset($_GET['id'])) {
    $id = $_GET['id'];
} else {
    $id = "";
}

switch ($id) {
    case ('1') :
    {
        echo "To jest id 1";
        break;
    }
    case ('2') :
    {
        echo "To jest id 2";
        break;
    }
    case ('3') :
    {
        echo "A to jest id 3";
        break;
    }
    case ('register') : {
        header("Location:register_page.php");
        break;
    }
    default :
    {
        echo "Strona Glówna";
    }
} */
?>

