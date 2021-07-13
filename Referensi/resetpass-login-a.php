<?php
    session_start();
    $conn = mysqli_connect("localhost", "onestepf_user", "q!tU2+UZnss%", "onestepf_os0604");
    //$conn = mysqli_connect("localhost", "root", "", "os");

    if (isset($_POST['Submit'])){
        $Email = $_POST["Email"];
        $result = mysqli_query($conn, "SELECT * FROM akun WHERE email = '$Email'");
        if ($Email == NULL){
            $_SESSION["error_resetpass"] = 4;
            header("Location: http://onestepfootwear.com/resetpass-login-c.php");
        }
        elseif(mysqli_num_rows($result) == 1){
            $row = mysqli_fetch_assoc($result);
            if($row["verified"]==1){
                $_SESSION["error_resetpass"] = 0;
                ini_set('display_errors', 1);
                error_reporting(E_ALL);
                $vkey = $row["vkey"];
                $to = $Email;
                $subject = "Email Reset Password Akun Onestep";
                $message = '<html>
                            <body style=" text-align: center;
                                align-items: center;
                                vertical-align: middle;
                                font-family: Product Sans;">
                            <p style="color: black; font-size: 18px">Selamat datang di Onestep !</p>
                            <p style="color: black; font-size: 15px">Silahkan ubah password Anda dengan mengklik tombol di bawah ini :</p>
                            <a style="font-size:14px; 
                                color: white; 
                                border: 1px solid black; 
                                border-radius: 8px; 
                                background-color: black; 
                                display: block; 
                                padding: 10px 10px;"  
                                href=http://onestepfootwear.com/resetpass-login-d.php?vkey='.$vkey.' >UBAH PASSWORD
                            </a>
                            <br><br>
                            <p style="color: black; font-size: 18px">Terima Kasih !</p>
                            </body>
                            </html>';
                $from = 'Onestep';
                $reply = 'onestepfootwear@lpik-itb.ac.id';
                $headers  = 'MIME-Version: 1.0' . "\r\n";
                $headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
                $headers .= 'From: '.$from."\r\n".
                            'Reply-To: '.$reply."\r\n" .
                            'X-Mailer: PHP/' . phpversion();
                mail($to,$subject,$message,$headers);
                header("Location: http://onestepfootwear.com/resetpass-login-b.php");
            }
            else {
                $_SESSION["error_resetpass"] = 3;
                header("Location: http://onestepfootwear.com/resetpass-login-c.php");
            }
        }
        else {
            $_SESSION["error_resetpass"] = 2;
            header("Location: http://onestepfootwear.com/resetpass-login-c.php");
        }
    }

?>

<!DOCTYPE html>
<html>
    <head>
        <title>Onestep-Resetpass</title>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="resetpass-login-a.css">
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
                <label for="Email">Email</label>
                <br>
                <input type="email" name="Email">                    
                <br>
                <input type="submit" name="Submit" value="Kirim Link Reset Password">
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