<?php require 'header.php'?>
<link rel="stylesheet" type="text/css" href="podstrona_wydarzenia.css"/>
<section class="podstrona_wydarzenia-section">

    <div class="wydarzenia-h1">
        <h1 id="title"></h1>
    </div>
    <div class="container">
        <div class="column">
            <img id="image" alt="Wydarzenie">
            <p>Czas trwania: <span id="duration"></span></p>
            <p>Data: <span id="date"></span></p><br><br>
            <a id="dynamicLink" href="#" >Zarezerwuj stoisko!</a>
        </div>
        <div class="column">
            <p><span id="description"></span></p>
        </div>
    </div>



   
    <script src="podstrona_wydarzenia copy.js"></script>
    <script src="button copy.js"></script>
  
  </section>

<?php require 'footer.php'?>