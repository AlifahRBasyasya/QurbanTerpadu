<?php
    session_start();
    $conn = mysqli_connect("localhost", "onestepf_user", "q!tU2+UZnss%", "onestepf_os0604");
    if (!isset($_POST['submit'])){
        if (!isset($_GET['vkey'])){
            header("Location: http://onestepfootwear.com/login.php");
        }
        else {
            $vkey = $_GET['vkey'];
            $result = mysqli_query($conn, "SELECT * FROM akun WHERE vkey = '$vkey' ");
            if(mysqli_num_rows($result) == 0){
                header("Location: http://onestepfootwear.com/resetpass-login-a.php");
            }
            $error = 1;
        }
    }
    elseif (isset($_POST['submit'])) {
        $password = $_POST['Password'];
        $cekpassword = $_POST['CekPassword'];
        if ($password == NULL){
            $error = 3;
        }
        elseif ($password != $cekpassword){
            $error = 2;
        }
        else {
            $password = trim($password);
            $password = password_hash($password, PASSWORD_DEFAULT); 
            $vkey = $_GET['vkey'];
            mysqli_query($conn, "UPDATE akun SET pass = '$password' WHERE vkey = '$vkey' ");
            $_SESSION["error_resetpass"] = 10;
            header("Location: http://onestepfootwear.com/resetpass-login-b.php"); 
        }
    }
?>


<!DOCTYPE html>
<html>
    <head>
        <title>Onestep-Resetpass</title>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="resetpass-login-d.css">
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
            <form action="" method="post">
                <label for="Email">Password Baru</label>
                <br>
                <input type="password" name="Password">                    
                <br>
                <label for="Password">Konfirmasi Password Baru</label>
                <br>
                <input type="password" name="CekPassword">
                <br>
                <?php if ($error == 2): ?>
                    <span class="pass-failed">Konfirmasi password tidak sama</span>
                <?php elseif ($error == 3): ?>
                    <span class="pass-failed">Password invalid</span>
                <?php endif ; ?>
                <br>
                <input type="submit" value="ATUR ULANG KATA SANDI" name="submit">
            </form>
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