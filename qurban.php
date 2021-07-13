<?php
    session_start();

    $conn = mysqli_connect("localhost", "root", "7CacaITB7", "qurbantpd");
?>

<!DOCTYPE html>
<html>
    <head>
        <title>Qurban Terpadu - Qurban</title>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="qurban.css">
        <link rel="stylesheet" href="css/all.min.css">
        <link href='http://fonts.googleapis.com/css?family=Roboto' rel='stylesheet' type='text/css'>
        <style>
            * {
                margin: 0;
                padding: 0;
                font-family: 'Roboto';
            }
        </style>
    </head>
    <body>
        <div class="wrapper">
            <nav>
                <img src="img/rumahamal.png" alt="Rumah Amal">
                <ul>
                    <?php if (isset($_SESSION['login'])):?>
                        <li><a href="profil.php">Profil  <i class="far fa-user"></i></a></li>
                        <li><a href="kontak.php">Kontak</a></li>
                        <li><a href="qurban.php" class="active">Qurban</a></li>
                        <li><a href="index.php">Home</a></li>
                    <?php else : ?>
                        <li><a href="kontak.php">Kontak</a></li>
                        <li><a href="qurban.php" class="active">Qurban</a></li>
                        <li><a href="index.php">Home</a></li>
                    <?php endif ; ?>
                </ul>
            </nav>

            <div class="article-container">
                <div class="article-content">
                    <img src="img/artikel1.jpg" alt="Artikel1">
                    <h2>Artikel 1</h2>
                </div>
                <div class="article-content">
                    <img src="img/artikel2.jpg" alt="Artikel2">
                    <h2>Artikel 2</h2>
                </div>
                <div class="article-content">
                    <img src="img/artikel3.jpg" alt="Artikel3">
                    <h2>Artikel 3</h2>
                </div>
            </div>
            
            <div class="push"></div>
        </div>

        <footer>
            <div class="copyright-container">
                <span>@rumahamalsalmanitb</span>
            </div>
        </footer>
    </body>
</html>