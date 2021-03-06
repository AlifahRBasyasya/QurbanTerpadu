<?php
    session_start();

    $conn = mysqli_connect("localhost", "root", "", "qurbanterpadu");
    
    $kode_pekurban = $_SESSION["kode_pekurban"];
    $result1 = mysqli_query($conn, "SELECT * FROM Pekurban_Hewan WHERE Kode_Pekurban = '$kode_pekurban'");
    $result2 = mysqli_query($conn, "SELECT * FROM Progress_Qurban WHERE Kode_Pekurban = '$kode_pekurban'");

    $row1 = mysqli_fetch_assoc($result1);
    $row2 = mysqli_fetch_assoc($result2);
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
                <img class="salman" src="img/rumahamal.png" alt="Rumah Amal">
                <img class="mbkm" src="img/kampusmerdeka.png" alt="Kampus Merdeka">
                <ul>
                    <li><a href="profil.php" class="active">Profil  <i class="far fa-user"></i></a></li>
                    <li><a href="kontak.php">Kontak</a></li>
                    <li><a href="qurban.php">CeritaQurban</a></li>
                    <li><a href="index.php">Home</a></li>
                </ul>
            </nav>

            <div class="pekurban-container content" id="pekurban-container">
                <div class="pekurban" id="pekurban">
                    <h2>Data Pekurban</h2><br>
                    <p><span>Kode Pekurban</span><?= $row1["Kode_Pekurban"]; ?></p>
                    <p><span>Nama Pekurban</span><?= $row1["Nama_Pekurban"]; ?></p>
                    <p><span>Jenis Kurban</span><?= $row1["Jenis_Kurban"]; ?></p>
                    <p><span>Lokasi</span><?= $row1["Lokasi"]; ?></p>
                    <p><span>Pengelola</span><?= $row1["Pengelola"]; ?></p>
                    <p><span>Kontak Pekurban</span><?= $row1["Kontak_Pekurban"]; ?></p>
                    <p><span>No WA Kontak</span><?= $row1["No_WA_Contact_Person"]; ?></p>
                </div>
                <div class="confirmation">
                    <h2>Label Penyembelihan</h2>
                    <?php if (file_exists("img/LabelQurban/LabelQurban_" . $kode_pekurban . ".png")):?>
                        <img src=<?= "img/LabelQurban/LabelQurban_" . $kode_pekurban . ".png"; ?> alt="Label">
                    <?php else : ?>
                        <span>Label Belum Ada</span>
                    <?php endif ; ?>
                    <br><br>
                    <p>Mohon memeriksa Nama Pekurban. Jika tidak ada kesalahan, tekan tombol 'Sudah Benar'. Jika ada perbaikan, tekan tombol 'Revisi'.</p>
                    <a href="https://forms.gle/UCzVngvocEm7mTJBA"><button>Revisi</button></a>
                    <button class="confirmed">Sudah Benar</button>
                </div>
            </div>
            <div class="hewan-container content" id="hewan-container">
                <div class="hewan" id="hewan">
                    <h2>Data Hewan Qurban</h2><br>
                    <p><span>Jenis Kurban</span><?= $row1["Jenis_Kurban"]; ?></p>
                    <?php if ($row1["Bobot"] == "tidak ada"):?>
                        <p><span>Bobot</span><?= $row1["Bobot"]; ?></p>
                    <?php else : ?>
                        <p><span>Bobot</span><?= $row1["Bobot"]; ?> kg</p>
                    <?php endif ; ?>

                    <?php if ($row1["Temperatur"] == "tidak ada"):?>
                        <p><span>Temperatur</span><?= $row1["Temperatur"]; ?></p>
                    <?php else : ?>
                        <p><span>Temperatur</span><?= $row1["Temperatur"]; ?>&#8451;</p>
                    <?php endif ; ?>

                    <p><span>Tanggal Penyembelihan</span><?= $row1["Tgl_Penyembelihan"]; ?></p>
                    <br>
                    <p><span>Kode Pekurban</span><?= $row1["Kode_Pekurban"]; ?></p>
                    <p><span>Nama Pekurban</span><?= $row1["Nama_Pekurban"]; ?></p>
                    <p><span>Lokasi</span><?= $row1["Lokasi"]; ?></p>
                    <p><span>Pengelola</span><?= $row1["Pengelola"]; ?></p>
                </div>
                <div class="picture">
                    <h2>Gambar Hewan Qurban</h2>
                    <?php if (file_exists("img/Hewan/" . $row1["Foto_1"] . ".jpeg")):?>
                        <div class="picture-column">
                            <img src=<?= "img/Hewan/" . $row1["Foto_1"] . ".jpeg"; ?> alt="Sapi 1">
                            <h4>Foto 1</h4>
                        </div>
                    <?php endif ; ?>

                    <?php if (file_exists("img/Hewan/" . $row1["Foto_2"] . ".jpeg")):?>
                        <div class="picture-column">
                            <img src=<?= "img/Hewan/" . $row1["Foto_2"] . ".jpeg"; ?> alt="Sapi 2">
                            <h4>Foto 2</h4>
                        </div>
                    <?php endif ; ?>

                    <?php if (file_exists("img/Hewan/" . $row1["Foto_3"] . ".jpeg")):?>
                        <div class="picture-column">
                            <img src=<?= "img/Hewan/" . $row1["Foto_3"] . ".jpeg"; ?> alt="Sapi 3">
                            <h4>Foto 3</h4>
                        </div>
                    <?php endif ; ?>
                </div>
            </div>
            <div class="progres-container content" id="progres-container">
                <div class="timeline">
                    <div class="tahap-container left">
                        <h2>Penerimaan</h2>
                        <?php if ($row2["Penerimaan"] == "1"):?>
                            <p>Status: Sudah diterima di lokasi</p>
                        <?php else : ?>
                            <p>Status: Belum sampai di lokasi</p>
                        <?php endif ; ?>
                    </div>
                    <br>
                    <div class="tahap-container right">
                        <h2>Pra Penyembelihan</h2>
                        <?php if ($row2["Prapenyembelihan"] == "1"):?>
                            <p>Status: Siap disembelih</p>
                        <?php else : ?>
                            <p>Status: Menunggu pengecekan</p>
                        <?php endif ; ?>
                    </div>
                    <br>
                    <div class="tahap-container left">
                        <h2>Penyembelihan</h2>
                        <?php if ($row2["Penyembelihan"] == "1"):?>
                            <p>Status: Sudah disembelih</p>
                        <?php else : ?>
                            <p>Status: Belum disembelih</p>
                        <?php endif ; ?>
                    </div>
                    <br>
                    <div class="tahap-container right">
                        <h2>Pencacahan</h2>
                        <?php if ($row2["Pencacahan"] == "1"):?>
                            <p>Status: Siap didistribusikan</p>
                        <?php else : ?>
                            <p>Status: Menunggu giliran</p>
                        <?php endif ; ?>
                    </div>
                    <br>
                    <div class="tahap-container left">
                        <h2>Distribusi</h2>
                        <?php if ($row2["Distribusi"] == "1"):?>
                            <p>Status: Sudah didistribusikan</p>
                        <?php else : ?>
                            <p>Status: Sedang didistribusikan</p>
                        <?php endif ; ?>
                    </div>
                </div>
                <div class="development">
                    <span>Halaman ini masih dalam tahap pengembangan</span>
                </div>
            </div>

            <div class="profile-click">
                <button class="click" onclick="document.getElementById('profile-container').innerHTML=document.getElementById('pekurban-container').innerHTML;">
                    Data Pekurban
                </button>
                <button class="click" onclick="document.getElementById('profile-container').innerHTML=document.getElementById('hewan-container').innerHTML;">
                    Foto Penyembelihan
                </button>
                <button class="click" onclick="document.getElementById('profile-container').innerHTML=document.getElementById('progres-container').innerHTML;">
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