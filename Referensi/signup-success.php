<?php
    session_start();
    if (!isset($_SESSION["signup"])){
        header("Location: https://onestepfootwear.com/signup.php");
    }
?>

<!DOCTYPE html>
<html>
    <head>
        <title>Onestep-SignUp</title>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="signup.css">
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
						<li class="name">Hallo, Onestep !</li>
					    <li><a href="https://onestepfootwear.com/login.php"><img src="images/login.png"></a></li>
                    </ul>
                </nav>
            </div>
	</header>

        <div class="notification-container">
            <div class="notification">
                <div class="success">
                    <img src="images/Done-green.png" alt="\2705"> AKUN ANDA BERHASIL DITAMBAHKAN
                </div>
                <br>
                <div class="check">
                    Silakan cek email Anda untuk verifikasi akun
                </div>
            </div>
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