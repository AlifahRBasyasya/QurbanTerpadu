<?php
    session_start();

    $conn = mysqli_connect("localhost", "root", "7CacaITB7", "qurbantpd");

    $error = NULL;
    if (isset($_POST['submit'])){
        $username = $_POST["username"];
        $password = $_POST["pass"];

        $result = mysqli_query($conn, "SELECT * FROM pekurban WHERE username = '$username'");
        if ($username == NULL || $password == NULL){
            $error = "Isi setiap kolom di atas";
        }
        else {
            if(mysqli_num_rows($result) == 1) {
                $row = mysqli_fetch_assoc($result);
                if ($password == $row["pass"]) {
                    $_SESSION["login"] = true;
                    $_SESSION["username"] = $username;
                    header("Location: profil.php");
                    exit;
                }
                else {
                    $error = "Password salah";
                }
            }
            else {
                $error ="Cek kembali username Anda";
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
                        Lorem ipsum dolor sit amet, consectetur adipiscing elit. Cras ac lorem hendrerit, facilisis neque quis, consectetur arcu. Integer vel felis sed dui iaculis mattis sed at nibh.
                    </p>
                </div>
            </div>

            <div class="form-container">
                <?php if (!isset($_SESSION['login'])):?>
                    <div class="login">
                        <p>Untuk melihat lebih lanjut progress qurban, Anda perlu login terlebih dahulu. <br>
                            Silakan masukkan username dan password yang sudah diberikan. </p>
                        <br>
                        <form action="" method="POST">
                            <label for="username">Username:</label>
                            <input type="text" name="username" id="username">
                            <br>
                            <label for="password">Password:</label>
                            <input type="password" name="pass" id="pass">
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