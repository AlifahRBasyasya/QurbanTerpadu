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

    $row3 = mysqli_fetch_assoc($result3);
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

            <div class="pekurban-container content" id="pekurban-container">
                <div class="pekurban" id="pekurban">
                    <h2>Pekurban</h2><br>
                    <p><span>Kode Pekurban</span><?= $row1["kode_hewan"]; ?></p>
                    <p><span>Nama Pekurban</span><?= $row1["nama"]; ?></p>
                    <p><span>Jenis Kurban</span><?= $row1["jenis"]; ?></p>
                    <p><span>Lokasi</span><?= $row1["lokasi"]; ?></p>
                    <p><span>Narahubung</span><?= $row1["narahubung"]; ?></p>
                    <p><span>Kontak Pekurban</span><?= $row1["nama_kontak"]; ?></p>
                    <p><span>No WA Kontak</span><?= $row1["no_wa_kontak"]; ?></p>
                </div>
                <div class="confirmation">
                    <h2>Konfirmasi</h2>
                    <img src=<?= $row1["foto_konfirmasi"]; ?> alt="Konfirmasi">
                    <br>
                    <a href="https://forms.gle/UCzVngvocEm7mTJBA"><button>Revisi</button></a>
                </div>
            </div>
            <div class="hewan-container content" id="hewan-container">
                <div class="hewan" id="hewan">
                    <h2>Hewan Qurban</h2><br>
                    <p><span>Bobot</span><?= $row2["bobot"]; ?> kg</p>
                    <p><span>Temperatur</span><?= $row2["temperatur"]; ?>&#8451;</p>
                    <p><span>Tanggal Penyembelihan</span><?= $row2["tgl_penyembelihan"]; ?></p>
                </div>
                <div class="picture">
                    <h2>Gambar Hewan Qurban</h2>
                    <div class="picture-column">
                        <img src=<?= $row2["foto1"]; ?> alt="Sapi 1">
                        <h4>Foto 1</h4>
                    </div>
                    <div class="picture-column">
                        <img src=<?= $row2["foto2"]; ?> alt="Sapi 2">
                        <h4>Foto 2</h4>
                    </div>
                    <div class="picture-column">
                        <img src=<?= $row2["foto3"]; ?> alt="Sapi 3">
                        <h4>Foto 3</h4>
                    </div>
                </div>
            </div>
            <div class="progres-container content" id="progres-container">
                <div class="timeline">
                    <div class="tahap-container left">
                        <h2>Penerimaan</h2>
                        <?php if ($row3["penerimaan"] == "1"):?>
                            <p>Status: Sudah diterima di lokasi</p>
                        <?php else : ?>
                            <p>Status: Belum sampai di lokasi</p>
                        <?php endif ; ?>
                    </div>
                    <br>
                    <div class="tahap-container right">
                        <h2>Pra Penyembelihan</h2>
                        <?php if ($row3["prapenyembelihan"] == "1"):?>
                            <p>Status: Siap disembelih</p>
                        <?php else : ?>
                            <p>Status: Menunggu pengecekan</p>
                        <?php endif ; ?>
                    </div>
                    <br>
                    <div class="tahap-container left">
                        <h2>Penyembelihan</h2>
                        <?php if ($row3["penyembelihan"] == "1"):?>
                            <p>Status: Sudah disembelih</p>
                        <?php else : ?>
                            <p>Status: Belum disembelih</p>
                        <?php endif ; ?>
                    </div>
                    <br>
                    <div class="tahap-container right">
                        <h2>Pencacahan</h2>
                        <?php if ($row3["pencacahan"] == "1"):?>
                            <p>Status: Siap didistribusikan</p>
                        <?php else : ?>
                            <p>Status: Menunggu giliran</p>
                        <?php endif ; ?>
                    </div>
                    <br>
                    <div class="tahap-container left">
                        <h2>Distribusi</h2>
                        <?php if ($row3["distribusi"] == "1"):?>
                            <p>Status: Sudah didistribusikan</p>
                        <?php else : ?>
                            <p>Status: Sedang didistribusikan</p>
                        <?php endif ; ?>
                    </div>
                </div>
            </div>

            <div class="profile-click">
                <button class="pekurban-click" onclick="document.getElementById('profile-container').innerHTML=document.getElementById('pekurban-container').innerHTML;">
                    Pekurban
                </button>
                <button class="hewan-click" onclick="document.getElementById('profile-container').innerHTML=document.getElementById('hewan-container').innerHTML;">
                    Hewan
                </button>
                <button class="progres-click" onclick="document.getElementById('profile-container').innerHTML=document.getElementById('progres-container').innerHTML;">
                    Progress
                </button>
            </div>

            <div id="profile-container"></div>

            <div class="push"></div>
        </div>

        <footer>
            <div class="copyright-container">
                <span>@rumahamalsalmanitb</span>
            </div>
        </footer>
    </body>
</html>