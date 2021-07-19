<?php
    session_start();

    $conn = mysqli_connect("localhost", "root", "B1sm1ll@h", "qurbanterpadu");

    $error = NULL;
    if (isset($_POST['submit'])){
        $kode_pekurban = $_POST["kode_pekurban"];

        $result = mysqli_query($conn, "SELECT * FROM Pekurban_Hewan WHERE Kode_Pekurban = '$kode_pekurban'");
        if ($kode_pekurban == NULL){
            $error = "Isi kolom di atas";
        }
        else {
            if(mysqli_num_rows($result) == 1) {
                $_SESSION["login"] = true;
                $_SESSION["kode_pekurban"] = $kode_pekurban;
                header("Location: profil.php");
                exit;
            }
            else {
                $error ="Cek kembali kode pekurban Anda";
            }
        }
    }
?>
<!DOCTYPE html>
<html>
    <head>
        <title>Qurban Terpadu - Home</title>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="index.css">
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
                        <li><a href="qurban.php">Qurban</a></li>
                        <li><a href="index.php" class="active">Home</a></li>
                    <?php else : ?>
                        <li><a href="kontak.php">Kontak</a></li>
                        <li><a href="qurban.php">Qurban</a></li>
                        <li><a href="index.php" class="active">Home</a></li>
                    <?php endif ; ?>
                </ul>
            </nav>
    
            <div class="slide-container">
                <div class="slide-content">
                    <h2>Qurban Terpadu</h2>
                    <br>
                    <p>Qurban Terpadu adalah platform bertemunya dua orang yang ingin melakukan proses jual-beli penyembelihan hewan qurban dalam rangka memperingati hari idul adha
                    </p>
                </div>
            </div>

            <div class="form-container">
                <?php if (!isset($_SESSION['login'])):?>
                    <div class="login">
                        <p>Untuk melihat lebih lanjut progress qurban, Anda perlu login terlebih dahulu. <br>
                            Silakan masukkan kode pekurban yang sudah diberikan. </p>
                        <br>
                        <form action="" method="POST">
                            <label for="kode_pekurban">Kode Pekurban:</label>
                            <input type="text" name="kode_pekurban" id="kode_pekurban">
                            <span><?= $error; ?></span>
                            <input type="submit" name="submit" value="Login">
                        </form>
                    </div>
                <?php else : ?>
                    <div class="logged-in">
                        <h2>Anda sudah login</h2><br><br>
                        <p>Untuk memantau kegiatan kurban, tekan</p>
                        <span>Profil <i class="far fa-user"></i></span>
                        <p>Pada pojok kanan atas layar.</p>
                    </div>
                    <a href="logout.php"><button>Logout</button></a>
                <?php endif ; ?>
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