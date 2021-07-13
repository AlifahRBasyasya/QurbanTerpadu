<?php
    session_start();

    $error = NULL;
    if (!isset($_SESSION['login'])){
        header("Location: login.php");
        exit;
    }
    else {
        $conn = mysqli_connect("localhost", "onestepf_user", "q!tU2+UZnss%", "onestepf_os0604");
    
        $email = $_SESSION['email'];

        //$conn = mysqli_connect("localhost", "root", "", "os");	
        $result = mysqli_query($conn, "SELECT * FROM akun WHERE email = '$email' ");
        $akun = mysqli_fetch_assoc($result);
        if (isset($_POST['submit'])){
            $passlama = $_POST['passlama'];
            if ($_POST['passlama']!=NULL && $_POST['passbaru']!=NULL && $_POST['confirmpass']!=NULL){
                if (password_verify($passlama, $akun['pass'])){
                    if ($_POST['passbaru']==$_POST['confirmpass']){
                        $password = trim($_POST['passbaru']);
                        $password = password_hash($password, PASSWORD_DEFAULT); 
                        mysqli_query($conn, "UPDATE akun SET pass = '$password' WHERE email = '$email' ");
                        $error = 10;
                    }
                    else{
                        $error = "Konfirmasi password tidak sama";
                    }
                }
                else {
                    $error = "Password lama salah";
                } 
            }
            else {
                $error = "Isi setiap kolom di atas";
            }
        }
    }

    if (isset($_POST['back'])){
        header("Location: http://onestepfootwear.com/profile.php");
    }
?>

<!DOCTYPE html>
<html>
    <head>
        <title>Onestep-Resetpass</title>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="resetpass-profile.css">
        <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Poppins" />
        <style> 
            * {
                margin: 0;
                padding: 0;
                font-family: Poppins;
            }
        </style>
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
                        <li><a href="https://onestepfootwear.com/wishlist_page.php"><img src="images/like.png" alt="Like"></a></li>
                        <li class="profile"><a href="https://onestepfootwear.com/profile.php"><img src="images/account.png" alt="Account"></a></li>
						<li class="logout"><a href="https://onestepfootwear.com/logout.php"><img src="images/logout.png" alt="Logout"></a></li>
					    <li class="name">Hallo, <?= $akun['nama']; ?> !</li>
                    </ul>
                </nav>
            </div>
        </header>


        <?php if($error != 10) : ?>
        <div class="form-container">
            <div class="resetpass">
                <form action="" method="post">
                    <label for="passlama">Password Lama</label>
                    <br>
                    <input type="password" id="passlama" name="passlama">
                    <br>
                    <label for="passbaru">Password Baru</label>
                    <br>
                    <input type="password" id="passbaru" name="passbaru">
                    <br>
                    <label for=confirmpass>Konfirmasi Password Baru</label>
                    <br>
                    <input type="password" id="confirmpass" name="confirmpass">
                    <div class="resetpass-fail"><?= $error; ?></div>
                    <input type="submit" name="submit" value="ATUR ULANG KATA SANDI">
                </form>
            </div>
        </div>
        <?php elseif ($error == 10) : ?>
        <div class="form-container-2">
            <div class="resetpass">
                <div class="resetpass-success"><img src="images/Tick.png" alt="Selamat"> KATA SANDI BERHASIL DIUBAH</div>
                <form action="" method="post">
                    <input type="submit" class="back" name="back" value="PROFILE">
                </form>
            </div>
        </div>
        <?php endif ; ?>

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