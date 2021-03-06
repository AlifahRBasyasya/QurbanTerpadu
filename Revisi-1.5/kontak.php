<?php
    session_start();

    $conn = mysqli_connect("localhost", "root", "", "qurbanterpadu");
?>

<!DOCTYPE html>
<html>
    <head>
        <title>Qurban Terpadu - Kontak</title>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="kontak.css">
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
                <img class="salman" src="img/rumahamal.png" alt="Rumah Amal">
                <img class="mbkm" src="img/kampusmerdeka.png" alt="Kampus Merdeka">
                <ul>
                    <?php if (isset($_SESSION['login'])):?>
                        <li><a href="profil.php">Profil  <i class="far fa-user"></i></a></li>
                        <li><a href="kontak.php" class="active">Kontak</a></li>
                        <li><a href="qurban.php">CeritaQurban</a></li>
                        <li><a href="index.php">Home</a></li>
                    <?php else : ?>
                        <li><a href="kontak.php" class="active">Kontak</a></li>
                        <li><a href="qurban.php">CeritaQurban</a></li>
                        <li><a href="index.php">Home</a></li>
                    <?php endif ; ?>
                </ul>
            </nav>

            <div class="contact-container">
                <h2>Hubungi Kami</h2>
                <div class="detail-container">
                    <div class="column-container question">
                        <form action="">
                            <label for="Nama">Nama</label>
                            <br>
                            <input type="text" name="Nama" id="Nama">
                            <br>
                            <label for="Email">Email</label>
                            <br>
                            <input type="text" name="Email" id="Email">
                            <br>
                            <textarea rows="5" cols="30" name="Pertanyaan" id="Pertanyaan" placeholder="Pertanyaan..."></textarea>
                            <input type="submit" value="Kirim">
                        </form>
                    </div>
                    <div class="column-container socmed">
                        <a href="#"><i class="fab fa-whatsapp fa-2x fa-fw"></i>WhatsApp</a>
                        <br><br><br>
                        <a href="#"><i class="fab fa-instagram fa-2x fa-fw"></i>Instagram</a>
                        <br><br><br>
                        <a href="#"><i class="far fa-envelope fa-2x fa-fw"></i>Email</a>
                        <br><br><br>
                        <a href="#"><i class="fas fa-home fa-2x fa-fw"></i>Alamat</a>
                    </div>
                </div>
            </div>

            <div class="development">
                <span>Halaman ini masih dalam tahap pengembangan</span>
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