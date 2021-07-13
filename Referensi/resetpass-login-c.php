<?php
    session_start();

    $error = NULL;
    if (!isset($_SESSION['error_resetpass'])){
        header("Location: http://onestepfootwear.com/login.php");
    }

    if ($_SESSION["error_resetpass"] == 2){
        $error = "Email yang Anda masukkan belum terdaftar";
    }
    elseif ($_SESSION["error_resetpass"] == 3){
        $error = "Email yang Anda masukkan belum terverifikasi";
    }
    elseif ($_SESSION["error_resetpass"] == 4){
        $error = "Email yang Anda masukkan invalid";
    }
?>

<!DOCTYPE html>
<html>
    <head>
        <title>Onestep-Resetpass</title>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="resetpass-login-c.css">
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
                        <li class="name">Hallo, Onestep !</li>
						<li><a href="https://onestepfootwear.com/login.php"><img src="images/login.png"></a></li>
                    </ul>
                </nav>
            </div>
        </header>


        <div class="body-container">
            <div class="failed">
                <span class="red"><?= $error; ?></span>
                <br>
                <span class="black">Belum punya akun Onestep ? </span>
                <a href="#" class="red underline">Daftar</a>
                <br>
                <span class="black">Salah memasukkan email ? </span>
                <a href="#" class="red underline">Kirim ulang</a>
            </div>
        </div>
        <br><br><br><br>

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