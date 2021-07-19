<?php
    session_start();

    $conn = mysqli_connect("localhost", "root", "", "qurbanterpadu");
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

            <div class="headline-container">
                <h2>Qurban77 - 1439H/2018</h2>
                <div class="slides-container">
                    <img src="img/Artikel/Slide1.PNG" alt="Slide1">
                    <img src="img/Artikel/Slide2.PNG" alt="Slide2">
                    <img src="img/Artikel/Slide3.PNG" alt="Slide3">
                    <img src="img/Artikel/Slide4.PNG" alt="Slide4">
                    <img src="img/Artikel/Slide5.PNG" alt="Slide5">
                    <img src="img/Artikel/Slide6.PNG" alt="Slide6">
                    <img src="img/Artikel/Slide7.PNG" alt="Slide7">
                    <img src="img/Artikel/Slide8.PNG" alt="Slide8">
                    <img src="img/Artikel/Slide9.PNG" alt="Slide9">
                    <img src="img/Artikel/Slide10.PNG" alt="Slide10">
                    <img src="img/Artikel/Slide11.PNG" alt="Slide11">
                    <img src="img/Artikel/Slide12.PNG" alt="Slide12">
                    <img src="img/Artikel/Slide13.PNG" alt="Slide13">
                    <img src="img/Artikel/Slide14.PNG" alt="Slide14">
                    <img src="img/Artikel/Slide15.PNG" alt="Slide15">
                    <img src="img/Artikel/Slide16.PNG" alt="Slide16">
                    <img src="img/Artikel/Slide17.PNG" alt="Slide17">
                    <img src="img/Artikel/Slide18.PNG" alt="Slide18">
                </div>
            </div>

            <div class="article-container">
                <div class="article-content">
                    <img src="img/kambing.jpg" alt="Artikel">
                    <h2>Header Artikel</h2>
                </div>
                <div class="article-content">
                    <img src="img/kambing.jpg" alt="Artikel">
                    <h2>Header Artikel</h2>
                </div>
                <div class="article-content">
                    <img src="img/kambing.jpg" alt="Artikel">
                    <h2>Header Artikel</h2>
                </div>
                <div class="article-content">
                    <img src="img/kambing.jpg" alt="Artikel">
                    <h2>Header Artikel</h2>
                </div>
                <div class="article-content">
                    <img src="img/kambing.jpg" alt="Artikel">
                    <h2>Header Artikel</h2>
                </div>
                <div class="article-content">
                    <img src="img/kambing.jpg" alt="Artikel">
                    <h2>Header Artikel</h2>
                </div>
                <div class="article-content">
                    <img src="img/kambing.jpg" alt="Artikel">
                    <h2>Header Artikel</h2>
                </div>
                <div class="article-content">
                    <img src="img/kambing.jpg" alt="Artikel">
                    <h2>Header Artikel</h2>
                </div>
                <div class="article-content">
                    <img src="img/kambing.jpg" alt="Artikel">
                    <h2>Header Artikel</h2>
                </div>
                <div class="article-content">
                    <img src="img/kambing.jpg" alt="Artikel">
                    <h2>Header Artikel</h2>
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
