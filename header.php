<!doctype html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" type="text/css" href="css/reset.css"/>
    <link rel="stylesheet" type="text/css" href="css/style.css"/>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <title>Event-Arena - Targi projekt zaliczeniowy</title>
</head>
<body>
<!-- MENU -->
<section class="menu-section">

    <div class="menu-logo-space">
        <img class="menu-logo" src="src/dimes.png" alt="Logo">
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
    <form class="menu-login-form">
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
    </form>

</section>

<div class="panel-container">
    <button type="button" class="zaloguj-button-rozwin">Zaloguj
        <div class="panel">

        </div>
    </button>
</div>
<?php

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
    default :
    {
        echo "Strona Glówna";
    }
}
?>

<!-- TESTING ELEMENTS -->
<div class="place">

</div>
<div class="place2">

</div>