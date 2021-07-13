<?php 
    session_start();
    $conn = mysqli_connect("localhost", "onestepf_user", "q!tU2+UZnss%", "onestepf_os0604");
    // $conn = mysqli_connect("localhost", "root", "", "os");	

    $edit = 0;
    
    if (isset($_SESSION['login'])) {
		$email = $_SESSION['email'];
		$result = mysqli_query($conn, "SELECT * FROM akun WHERE email = '$email'");
		$akun = mysqli_fetch_assoc($result);
	}
    else {
        header("Location: http://onestepfootwear.com/login.php");
		exit;
    }

    if (isset($_POST['Simpan'])) {
        if ($_POST['nama']!=NULL && $_POST['email']!=NULL && $_POST['telepon']!=0){
            $nama_lengkap = htmlentities($_POST['nama']);
            $ttl = $_POST['ttl'];
            $email = trim($_POST['email']);
            $telepon = htmlentities($_POST['telepon']);
            $email_lama = $_SESSION['email'];

            $entity_ttl = explode('/', $ttl);
            $switch = array($entity_ttl[2], $entity_ttl[0], $entity_ttl[1]);
            $ttl = implode('-', $switch);

            mysqli_query($conn, "UPDATE akun SET tgl_lahir='$ttl', email='$email', no_telp='$telepon', nama_lengkap='$nama_lengkap' WHERE email='$email_lama' ");
            $_SESSION['email'] = $email;
            $edit = 1;
        }
    }
    if (isset($_POST['back'])){
        $edit = 0;
    }
    
?>

<!DOCTYPE html>
<html>
    <head>
        <title>Onestep-Profile</title>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="profile.css">
        <script type="text/javascript" src="https://cdn.jsdelivr.net/jquery/latest/jquery.min.js"></script>
        <script type="text/javascript" src="https://cdn.jsdelivr.net/momentjs/latest/moment.min.js"></script>
        <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.min.js"></script>
        <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Poppins" />
        <style> 
            * {
                margin: 0;
                padding: 0;
                font-family: Poppins;
            }
        </style>
        <script>
            $(function() {
                $('input[id="ttl"]').daterangepicker({
                    singleDatePicker: true,
                    showDropdowns: true,
                    minYear: 1950,
                    maxYear: parseInt(moment().format('YYYY'),12)
                });
            });
        </script>
        <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.css" />

    </head>
    <body>
        	<header>
		<div class="container">
                <div id="branding">
					<a href="https://onestepfootwear.com/index.php"><img class="onestep-header" src="images/Onestep.png" alt="Onestep Logo"></a>
                    <li><a href="https://onestepfootwear.com/katalog.php">KATALOG</a></li>
                    <li><a href="https://onestepfootwear.com/1stepexperience.php">#1STEPXPERIENCE</a></li>
                </div>
                <nav>
                    <ul>
                        <?php if (isset($_SESSION['login'])):?>
                            <li><a href="https://onestepfootwear.com/wishlist_page.php"><img src="images/like.png" alt="Like"></a></li>
                            <li class="profile"><a href="https://onestepfootwear.com/profile.php"><img src="images/account.png" alt="Account"></a></li>
							<li class="logout"><a href="https://onestepfootwear.com/logout.php"><img src="images/logout.png" alt="Logout"></a></li>
						    <li class="name">Hallo, <?= $akun['nama']; ?> !</li>
					    <?php else : ?>
						    <li class="name">Hallo, Onestep !</li>
						    <li><a href="https://onestepfootwear.com/login.php"><img src="images/login.png"></a></li>
					    <?php endif ; ?>
                    </ul>
                </nav>
            </div>
	</header>

        <div class="profile-container">
            <div class="profile-column left">
                <div class="profile-data">
                    <img class="profpic" src="images/Profpic.png" alt="Profile">
                    <?php if($akun['nama_lengkap'] != NULL): ?>
                        <h2><?= $akun['nama_lengkap']; ?></h2>
                    <?php else: ?>
                        <h2><?= $akun['nama']; ?></h2>
                    <?php endif ; ?>
                    <br>
                    <div class="data">
                        <img src="images/Date.png" alt="Birth">
                        <?php if($akun['tgl_lahir'] != 0): ?>
                            <label><?= $akun['tgl_lahir']; ?></label>
                        <?php else: ?>
                            <label class="editprofile">Lengkapi data diri Anda</label>
                        <?php endif ; ?>
                    </div>
                    <div class="data">
                        <img src="images/Email.png" alt="Email">
                        <label><?= $akun['email']; ?></label>
                    </div>
                    <div class="data">
                        <img src="images/Contact.png" alt="Contact">
                        <?php if($akun['no_telp'] != 0): ?>
                            <label><?= $akun['no_telp']; ?></label>
                        <?php else: ?>
                            <label class="editprofile">Lengkapi data diri Anda</label>
                        <?php endif ; ?>
                    </div>
                    <br>
                    <a class="resetpass" href="https://onestepfootwear.com/resetpass-profile.php">Ubah Password <img src="images/Pencil.png" alt="Pencil">  </a>
                </div>
            </div>
            <?php if($edit == 0) : ?>
            <div class="profile-column right">
                <div class="edit-profile">
                    <div class="edit">
                        <h2>EDIT PROFIL</h2>
                        <img src="images/Pencil.png" alt="Pencil">
                    </div>
                    <form action="" method="post">
                        <label for="nama">Nama Lengkap<sup class="star">*</sup></label>
                        <br>
                        <input type="text" name="nama">
                        <br>
                        <label for="ttl">Tanggal Lahir</label>
                        <br>
                        <input type="text" name="ttl" id="ttl">
                        <br>
                        <label for="email">Email<sup class="star">*</sup></label>
                        <br>
                        <input type="text" name="email">
                        <br>
                        <label for="telepon">Nomor Telepon<sup class="star">*</sup></label>
                        <br>
                        <input type="text" name="telepon">
                        <br>
                        <div class="editprofile warning">Kolom bertanda * wajib diisi</div>
                        <br>
                        <input type="submit" class="simpan" name="Simpan" value="SIMPAN">
                    </form>
                </div>
            </div>
            <?php elseif($edit == 1) : ?>
            <div class="profile-column right success">
                <div class="edit-profile">
                    <div class="editprofile-success"><img src="images/Tick.png" alt="Selamat"> DATA BERHASIL DISIMPAN</div>
                    <form action="" method="post">
                        <input type="submit" class="back" name="back" value="KEMBALI">
                    </form>
                </div>
            </div>
            <?php endif ; ?>
        </div>

        <footer>
        <div class="contact-container">
            <div class="contact-content">
				<br>
				<a href="https://onestepfootwear.com/index.php"><img class="onestep-logo" src="images/Onestep.png" alt="Onestep"></a>
				<br>
                <div class="logos-row">
						<a class="column" href="mailto:contact@onestepfootwear.com">
                            <img src="images/gmail.png" alt="Email" style="width:100%">
                        </a>
                        <a class="column" href="#">
                            <img src="images/fb_icon.png" alt="Facebook" style="width:100%">
                        </a>
                        <a class="column" href="#">
                            <img src="images/youtube_icon.png" alt="Youtube" style="width:100%">
                        </a>
                        <a class="column" href="https://www.instagram.com/onestepfootwear/">
                            <img src="images/instagram_icon.png" alt="Instagram" style="width:100%">
                        </a>
                </div>
            </div>
        </div>

		<div class="copyright-container">
            <span class="copyright">Copyright <sup>&copy;</sup>Onestepfootwear</span>
        </div>
    </footer>

    </body>
</html>