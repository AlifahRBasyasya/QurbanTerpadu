<?php
    session_start();
    if (!isset($_SESSION['error_resetpass'])){
        header("Location: http://onestepfootwear.com/login.php");
    }
?>

<!DOCTYPE html>
<html>
    <head>
        <title>OneStep-Resetpass</title>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="resetpass-login-b.css">
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
                        <li class="name">Hallo, OneStep !</li>
						<li><a href="https://onestepfootwear.com/login.php"><img src="images/login.png"></a></li>
                    </ul>
                </nav>
            </div>
        </header>

        <?php if ($_SESSION["error_resetpass"] == 0) :?>
            <div class="body-container">
                <div class="berhasil1">
                    <span class="berhasil1">&#10004; LINK RESET PASSWORD BERHASIL DIKIRIM</span>
                </div>
            </div>
        <?php elseif ($_SESSION["error_resetpass"] == 10) :?>
            <div class="body-container">
                <div class="berhasil2">
                    <span class="berhasil2">&#10004; KATA SANDI BERHASIL DIUBAH</span>
                </div>
                <a href="http://onestepfootwear.com/login.php" class="btn-login">LOGIN</a>
            </div>
        <?php endif ; ?>
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