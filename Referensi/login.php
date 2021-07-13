<?php
    session_start();

    $conn = mysqli_connect("localhost", "onestepf_user", "q!tU2+UZnss%", "onestepf_os0604");
    //$conn = mysqli_connect("localhost", "root", "", "os");	

    if (isset($_GET['vkey'])){
        $vkey = $_GET['vkey'];
        mysqli_query($conn, "UPDATE akun SET verified=1 WHERE vkey='$vkey' LIMIT 1");
        $result = mysqli_query($conn, "SELECT * FROM akun WHERE vkey = '$vkey'");
        $row = mysqli_fetch_assoc($result);
        $_SESSION["email"] = $row['email'];
        $_SESSION["login"] = true;
        header("Location: http://onestepfootwear.com/index.php");
        exit;
    }

    $error = NULL;
    if (isset($_SESSION["login"])) {
		header("Location: http://onestepfootwear.com/index.php");
		exit;
	}
    if (isset($_POST['Submit'])){
        $Email = $_POST["Email"];
		$Password = $_POST["Password"];

		$result = mysqli_query($conn, "SELECT * FROM akun WHERE email = '$Email'");
        if ($Email == NULL || $Password == NULL){
            $error = "Isi setiap kolom di atas";
        }
		else {
            if(mysqli_num_rows($result) == 1) {
                $row = mysqli_fetch_assoc($result);
                if ($row["verified"]==1) {
                    if (password_verify($Password, $row["pass"])){
                        $_SESSION["login"] = true;
                        $_SESSION["email"] = $Email;
                        header("Location: http://onestepfootwear.com/index.php");
                        exit;}
                    else {
                        $error = "Password salah";}
                }else {
                    $error = "Email Anda belum diverifikasi";}
            }else {
                $error ="Email Anda belum terdaftar";}
        }
    }

    require 'vendor/autoload.php';
    $client = new Google_Client();
    $client->setClientId('667093748531-3q1i38og9o1hcsaputu6dop8vauaa1bi.apps.googleusercontent.com');
    $client->setClientSecret('U-DjxaWUOZv3GpAUte-P-uwp');
    $client->setRedirectUri('https://onestepfootwear.com/login.php');

    $client->addScope("email");
    $client->addScope("profile");

    if(isset($_GET['code'])){

        $token = $client->fetchAccessTokenWithAuthCode($_GET['code']);

        if(!isset($token["error"])){

            $client->setAccessToken($token['access_token']);

            // getting profile information
            $google_oauth = new Google_Service_Oauth2($client);
            $google_account_info = $google_oauth->userinfo->get();

            // Storing data into database
            $email = mysqli_real_escape_string($conn, $google_account_info->email);

            // checking user already exists or not
            $get_user = mysqli_query($conn, "SELECT * FROM akun WHERE email='$email'");
            if(mysqli_num_rows($get_user) > 0){
                $_SESSION['login'] = true; 
                $_SESSION['email'] = $email;
                header('Location: http://onestepfootwear.com/index.php');
                exit;
            }
            else{
                header('Location: http://onestepfootwear.com/login-resetpass1.php');
            }
        }
        else{
            header('Location: https://onestepfootwear.com/login.php');
            exit;
        }
    }
?>

<!DOCTYPE html>
<html>
    <head>
        <title>Onestep-Login</title>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="login.css">
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
            <div class="login">
                <h2>Masuk</h2>
                <div class="signup">
                    <p>Belum punya akun Onestep</p>
                    <a href="https://onestepfootwear.com/signup.php">DAFTAR</a>
                    <br>
                    <a href="https://onestepfootwear.com/signup.php"><img class="onestep-signup" src="images/Onestep.png" alt="Onestep Logo"></a>
                </div>
                
                <br>
                <form action="" method="post">
                    <label for="Email">Email</label>
                    <br>
                    <input type="text" name="Email">
                    <br>
                    <label for="Password">Password</label>
                    <br>
                    <input type="password" name="Password">
                    <br>
                    <span class="login-failed"><?= $error; ?></span>
                    <br>
                    <div class="lupa_password">
                       <a href="https://onestepfootwear.com/resetpass-login-a.php">Lupa password?</a>
                    </div>
                    <input type="submit" name="Submit" value="MASUK">
                </form>
                <p>atau login dengan</p>
                <br>
                <div class="social_media_login">
                    <a href="<?php echo $client->createAuthUrl(); ?>" class="btn google">
                      <img src="images/GLogin.png">
                    </a>
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