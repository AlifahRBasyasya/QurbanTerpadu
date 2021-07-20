<?php
    session_start();

    $conn = mysqli_connect("localhost", "root", "", "qurbanterpadu");

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
                <img class="salman" src="img/RumahAmalSalman.png" alt="Rumah Amal Salman">
                <img class="mbkm" src="img/MBKM_QurbanTerpadu.png" alt="Kampus Merdeka">
                <img class="q77" src="img/Q77.png" alt="Qurban77">
                <ul>
                    <?php if (isset($_SESSION['login'])):?>
                        <li><a href="profil.php">Profil  <i class="far fa-user"></i></a></li>
                        <li><a href="kontak.php">Kontak</a></li>
                        <li><a href="qurban.php">CeritaQurban</a></li>
                        <li><a href="index.php" class="active">Home</a></li>
                    <?php else : ?>
                        <li><a href="kontak.php">Kontak</a></li>
                        <li><a href="qurban.php">CeritaQurban</a></li>
                        <li><a href="index.php" class="active">Home</a></li>
                    <?php endif ; ?>
                </ul>
            </nav>

            <div class="running-text">
                <p><span>Website ini masih dalam tahap UJICOBA dan PENGEMBANGAN.</span> Untuk kalangan sendiri, bukan untuk diakses oleh publik.</p>
            </div>
    
            <div class="slideshow-container">
                <div class="slideshow-content fade">
                    <h1>Qurban Terpadu</h1>
                    <br>
                    <p>Qurban terpadu adalah kegiatan pengembangan untuk meningkatkan pengelolaan. Kegiatan ini dilaksanakan oleh Rumah Salman bekerja sama dengan program Merdeka Belajar Kampus Merdeka &#8211; Institut Teknologi Bandung (MBKM-ITB)
                    </p>
                </div>
                <div class="slideshow-content fade">
                    <h1>Qurban77 tahun 1441 H / 2020 M</h1>
                    <br>
                    <p>Halaman ini memuat info tentang pekurban dan pengelolaan kurban yang dilaksanakan oleh program Qurban77 (Q77) pada tahun 1441H / 2020M.</p>
                    <p>Berbagai info dan cerita yang terhimpun dari pengelolaan Qurban77 ini diberikan pada bagian CeritaQurban. Silakan klik tombol "CeritaQurban".</p>
                </div>

                <a class="prev" onclick="plusSlides(-1)">&#10094;</a>
                <a class="next" onclick="plusSlides(1)">&#10095;</a>
            </div>

            <div class="form-container">
                <?php if (!isset($_SESSION['login'])):?>
                    <div class="login">
                        <p>Untuk melihat info tentang Data Pekurban dan foto penyembelihan, Anda perlu login terlebih dahulu. <br>
                            Silakan masukkan Kode Pekurban yang sudah dikirimkan melalui WA. </p>
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

            <div class="report">
                <h2>Laporan Panitia Q77</h2>
                <span>17 Agustus 2020</span>

                <h3>Sobat Pekurban yg budiman</h2>
                <p>
                    Dengan berakhirnya hari Raya Idul Adha, maka program Kurban77-thn 2020 berakhir juga. Bersama ini kami melaporkan kegiatan kurban77 2020 Mabrur. Kegiatan ini dimulai di akhir Bulan Januari 2020, Panitia membuat pemberitahuan kepada teman2 utk bergabung dalam kepesertaan kurban.
                </p>
                    Program Q77 dg biaya perkurban Rp 3 077 000,- dengan 2 kali pembayaran agar tidak terlalu membebani. Dalam program tahun ini jumlah yg ikut menjadi pekurban sebanyak 114 peserta.
                <p>
                    Pengadaan dan penyebaran Hewan kurban dalam program ini kami dibantu oleh beberapa Ponpes dan Peternak serta beberapa teman sebagai penghubung dan pemantau kegiatan.
                </p>

                <h3>Distribusi Q-77 tahun 2020 sbb :</h3>
                <p><b>
                A. Mendho Ageng - Yogyakarta - M. Wafroni 
                </b><br>
                Jml 45 ekor Domba 
                </p>
                <p><b>
                B. Wedhus Gembel - Yogyakarta - M. Wafroni
                </b><br>
                Jml 30 ekor Domba
                </p>
                <p><b>
                C. Koperasi K77 - Tanjung Siang, Subang - Djoko Sardjadi
                </b><br>
                Jml 14 ekor Domba yg dikonversi menjadi 2 ekor Sapi
                </p>
                <p><b>
                D. Yayasan At tanmia - Nusa Tenggara Timur - Saiful Halim
                </b><br>
                Jml 9 ekor Domba
                </p>
                <p><b>
                E. CMR – Jakarta - Edy Sugiarto
                </b><br>
                Jml 2 ekor Domba
                </p>
                <p><b>
                F. PTIQ - Jakarta - Nanang Kuswara
                </b><br>
                Jml 4 ekor Domba
                </p>
                <p><b>
                G. Ponpes Assyifa – Parung, Bogor - Muchtar Hadi
                </b><br>
                Jml 3 ekor Domba
                </p>
                <p><b>
                H. Ponpes Mina - Bogor - Saul Siregar
                </b><br>
                Jml 2 ekor domba n bergabung dg pekurban lain konversi 1 ekor Sapi
                </p>
                <p><b>
                I. Ponpes Sulaimanyah, Ciputat, TangSel - Ita Soerono
                </b><br>
                Jml 3 ekor Domba.
                </p>
                <p>
                    Pada tahun ini terkumpul dana dari Sobat pekurban sebesar Rp 353 887 213,-. Dan dana dikeluarkan untuk pembelian anakan (bibit), penggemukan, transportasi, komunikasi penyembelihan, dll serta dana bantuan 2 ekor domba utk Mualaf di Jogyakarta dan bantuan pulsa serta terima kasih buat adik yg membantu Q77
                </p>
                <p>
                    Jumlah, pengeluaran sebesar Rp 324 670 620,- sehingga saldo Rp 29 216 593,-
                </p>
                <p>
                    Mohon izin dari sobat Pekurban saldo tsb akan kami masukkan ke Kas Mabrur sebagai amal jariyah sobat2 Pekurban. Kami mohon respon dari sobat2
                </p>
                <p>
                    Dalam pelaksanaan program Q77 Mabrur pasti yg ada tidak pas, menurut sobat2 Pekurban, Kami panitia mohon dimaklumi dan dimaafkan.
                </p>
                <p>
                    Wassalam 🙏🙏🙏
                </p>
                <p><b>Irfan Fuady</b></p>
            </div>

            <div class="push"></div>
        </div>

        <footer>
            <div class="copyright-container">
                <span>@rumahamalsalmanitb</span>
            </div>
        </footer>

        <script>
            var slideIndex = 1;
            var timer = null;
            showSlides(slideIndex);

            function plusSlides(n) {
                clearTimeout(timer);
                showSlides(slideIndex += n);
            }

            function currentSlide(n) {
                clearTimeout(timer);
                showSlides(slideIndex = n);
            }

            function showSlides(n) {
                var i;
                var slides = document.getElementsByClassName("slideshow-content");
                if (n==undefined) {
                    n = ++slideIndex
                }
                if (n > slides.length) {
                    slideIndex = 1
                }
                if (n < 1) {
                    slideIndex = slides.length
                }
                for (i = 0; i < slides.length; i++) {
                    slides[i].style.display = "none";
                }
                slides[slideIndex-1].style.display = "block";
                timer = setTimeout(showSlides, 10000);
            } 
        </script>
    </body>
</html>