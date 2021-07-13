<?php
    session_start();

    $conn = mysqli_connect("localhost", "root", "7CacaITB7", "qurbantpd");
    
    $username = $_SESSION["username"];
    $result1 = mysqli_query($conn, "SELECT * FROM pekurban WHERE username = '$username'");
    $result2 = mysqli_query($conn, "SELECT * FROM hewan WHERE username = '$username'");
    $result3 = mysqli_query($conn, "SELECT * FROM progresqurban WHERE username = '$username'");

    $row1 = mysqli_fetch_assoc($result1);
    foreach ($row1 as $key => $value) {
        if (is_null($value)) {
            $row1[$key] = "Belum ada";
        }
    }

    $row2 = mysqli_fetch_assoc($result2);
    foreach ($row2 as $key => $value) {
        if (is_null($value)) {
            $row2[$key] = "Belum ada";
        }
    }
?>

<!DOCTYPE html>
<html>
    <head>
        <title>Qurban Terpadu - Profil</title>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="profil.css">
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
                    <li><a href="profil.php" class="active">Profil  <i class="far fa-user"></i></a></li>
                    <li><a href="kontak.php">Kontak</a></li>
                    <li><a href="qurban.php">Qurban</a></li>
                    <li><a href="index.php">Home</a></li>
                </ul>
            </nav>

            <div class="data-container">
                <div class="text-container">
                    <div class="column-container pekurban" id="pekurban">
                        <h2>Pekurban</h2><br>
                        <p><span>Kode Pekurban</span><?= $row1["kode_hewan"]; ?></p>
                        <p><span>Nama Pekurban</span><?= $row1["nama"]; ?></p>
                        <p><span>Jenis Kurban</span><?= $row1["jenis"]; ?></p>
                        <p><span>Lokasi</span><?= $row1["lokasi"]; ?></p>
                        <p><span>Narahubung</span><?= $row1["narahubung"]; ?></p>
                        <p><span>Kontak Pekurban</span><?= $row1["nama_kontak"]; ?></p>
                        <p><span>No WA Kontak</span><?= $row1["no_wa_kontak"]; ?></p>
                    </div>
                    <div class="column-container hewan" id="hewan">
                        <h2>Hewan Qurban</h2><br>
                        <p><span>Bobot</span><?= $row2["bobot"]; ?> kg</p>
                        <p><span>Temperatur</span><?= $row2["temperatur"]; ?>&#8451;</p>
                        <p><span>Tanggal Penyembelihan</span><?= $row2["tgl_penyembelihan"]; ?></p>
                    </div>
                </div>
                <div class="picture-container">
                    <h2>Gambar Hewan Qurban</h2>
                    <div class="picture-column">
                        <h4>Foto 1</h4>
                        <img src=<?= $row2["foto1"]; ?> alt="Sapi 1">
                    </div>
                    <div class="picture-column">
                        <h4>Foto 2</h4>
                        <img src=<?= $row2["foto2"]; ?> alt="Sapi 2">
                    </div>
                    <div class="picture-column">
                        <h4>Foto 3</h4>
                        <img src=<?= $row2["foto3"]; ?> alt="Sapi 3">
                    </div>
                </div>
            </div>

            <div class="confirmation-container">
                <h2>Konfirmasi</h2>
                <img src=<?= $row1["foto_konfirmasi"]; ?> alt="Konfirmasi">
                <br>
                <button>Revisi</button>
            </div>

            <!-- <table>
                <tr>
                    <td onclick="document.getElementById('data-container').innerHTML=document.getElementById('pekurban').innerHTML;">Pekurban</td>
                    <td onclick="document.getElementById('data-container').innerHTML=document.getElementById('hewan').innerHTML;">Hewan</td>
                </tr>
            </table>

            <div id="data-container"></div> -->

            <div class="push"></div>
        </div>

        <footer>
            <div class="copyright-container">
                <span>@rumahamalsalmanitb</span>
            </div>
        </footer>
    </body>
</html>