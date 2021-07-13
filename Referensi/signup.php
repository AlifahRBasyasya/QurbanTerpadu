<?php
    session_start();
    //$conn = mysqli_connect("localhost", "root", "", "os");	
    $conn = mysqli_connect("localhost", "onestepf_user", "q!tU2+UZnss%", "onestepf_os0604");
    $error = NULL;
    if (isset($_POST['Daftar'])) {
        $username = $_POST['Nama'];
        $email = $_POST['Email'];
        $password1 = $_POST['Pass'];
        $password2 = $_POST['PassConf'];
        $result = mysqli_query($conn, "SELECT email FROM akun WHERE email = '$email' ");
        if ($username == NULL || $email == NULL || $password1 == NULL){
            $error = "Isi setiap kolom di atas";
        }
        else if (strlen($username)<8 && strlen($username)>5){
            $error = "Username harus mengandung 5-8 karakter";
        }
        else if ($password1 != $password2){
            $error ="Konfirmasi password tidak sama";
        }
        else {
            if (mysqli_fetch_assoc($result)) {
                $error = "Email sudah pernah digunakan";
            }
            else {
                $username = trim($username);
                $username = htmlentities($username);
                $email = trim($email);
                $password1 = trim($password1);
                $password1 = password_hash($password1, PASSWORD_DEFAULT);
                $vkey = md5(time().$username);
                mysqli_query($conn, "INSERT INTO akun (nama, email, pass, vkey) VALUES ('$username','$email','$password1','$vkey')");

                ini_set('display_errors', 1);
                error_reporting(E_ALL);
                $to = $email;
                $subject = "Email Verifikasi Akun Onestep";
                $message = '<html>
    <body style=" text-align: center;
    align-items: center;
    vertical-align: middle;
    font-family: Product Sans;">
        <p style="color: black; font-size: 18px">Selamat datang di Onestep !</p>
        <p style="color: black; font-size: 15px">Silahkan verifikasi email Anda dengan mengklik tombol di bawah ini :</p>
        <a style="font-size:14px; 
        color: white; 
        border: 1px solid black; 
        border-radius: 8px; 
        background-color: black; 
        display: block; 
        padding: 10px 10px;"  
        href=https://onestepfootwear.com/login.php?vkey='.$vkey.' >VERIFIKASI EMAIL</a>
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
                $_SESSION["signup"] = true;
                header("Location: https://onestepfootwear.com/signup-success.php");
            }
        }
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
    
        <div class="form-container">
            <div class="signup">
                <h2>Sign Up</h2>
                <form action="" method="post">
                    <label for="Nama">Username</label>
                    <br>
                    <input type="text" name="Nama" placeholder="Username mengandung 5-8 karakter">
                    <br>
                    <label for="Email">Email</label>
                    <br>
                    <input type="email" name="Email">
                    <br>
                    <label for="Pass">Password</label>
                    <br>
                    <input type="password" name="Pass">
                    <br>
                    <label for="PassConf">Konfirmasi Password</label>
                    <br>
                    <input type="password" name="PassConf">
                    <div class="signup-fail"><?= $error; ?></div>
                    <br>
                    <!--<input type="checkbox" name="Setuju">-->
                    <!--<label for="Setuju" class="setuju">Saya setuju dengan <a href="#" class="terms" id="terms">syarat dan ketentuan</a> yang berlaku</label>-->
                    <br>
                    <input type="submit" name="Daftar" value="DAFTAR">
                </form>
            </div>
        </div>

        <!-- Terms Modal -->
        <div class="termsModal" id="termsModal">

            <!-- Modal content -->
            <div class="modal-content">
                <div class="modal-header">
                    <h2>Syarat & Ketentuan</h2>
                </div>
                <div class="modal-body">
                    <br><br>
                    <p>-----------------------------------------------------------------------------------</p>
                    <p>-----------------------------------------------------------------------------------</p>
                    <p>-----------------------------------------------------------------------------------</p>
                    <p>-----------------------------------------------------------------------------------</p>
                    <p>-----------------------------------------------------------------------------------</p>
                    <p>-----------------------------------------------------------------------------------</p>
                    <p>-----------------------------------------------------------------------------------</p>
                    <p>-----------------------------------------------------------------------------------</p>
                    <p>-----------------------------------------------------------------------------------</p>
                    <p>-----------------------------------------------------------------------------------</p>
                    <p>-----------------------------------------------------------------------------------</p>
                    <p>-----------------------------------------------------------------------------------</p>
                    <p>-----------------------------------------------------------------------------------</p>
                    <p>-----------------------------------------------------------------------------------</p>
                    <p>-----------------------------------------------------------------------------------</p>
                    <p>-----------------------------------------------------------------------------------</p>
                    <p>-----------------------------------------------------------------------------------</p>
                    <p>-----------------------------------------------------------------------------------</p>
                    <p>-----------------------------------------------------------------------------------</p>
                    <p>-----------------------------------------------------------------------------------</p>
                    <p>-----------------------------------------------------------------------------------</p>
                    <p>-----------------------------------------------------------------------------------</p>
                    <p>-----------------------------------------------------------------------------------</p>
                    <br><br>
                </div>
                <div class="modal-footer">
                    <button class="done">SELESAI MEMBACA</button>
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
    
        <script>
            // Get the modal
            var modal = document.getElementById("termsModal");
            
            // Get the button that opens the modal
            var btnTerms = document.getElementById("terms");
            
            // Get the <span> element that closes the modal
            var btnClose = document.getElementsByClassName("done")[0];
            
            // When the user clicks the button, open the modal 
            btnTerms.onclick = function() {
                modal.style.display = "block";
            }
            
            // When the user clicks on <span> (x), close the modal
            btnClose.onclick = function() {
                modal.style.display = "none";
            }
            
            // When the user clicks anywhere outside of the modal, close it
            window.onclick = function(event) {
                if (event.target == modal) {
                    modal.style.display = "none";
                }
            }
        </script>
    </body>
</html>