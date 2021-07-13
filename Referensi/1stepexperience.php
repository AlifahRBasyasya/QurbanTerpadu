<?php 
	session_start();

	//$conn = mysqli_connect("localhost", "root", "", "os");
	$conn = mysqli_connect("localhost", "onestepf_user", "q!tU2+UZnss%", "onestepf_os0604");	
	$result = mysqli_query($conn, "SELECT * FROM produk ORDER BY id_produk DESC");

	if (isset($_SESSION['login'])){
		$email = $_SESSION['email'];
		$result2 = mysqli_query($conn, "SELECT * FROM akun WHERE email = '$email' ");
		$akun = mysqli_fetch_assoc($result2);
	}

?>


<!DOCTYPE html>
<html>

<head>
	<title>Onestep-#1STEPXPERIENCE</title>
	<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width; initial-scale=1.0; maximum-scale=1.0;">
	<link rel="stylesheet" type="text/css" href="experience.css">
	<link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<link href='https://fonts.googleapis.com/css?family=Poppins' rel='stylesheet'>
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


	<div class="coming-soon">
		<br><br><br><br><br><br><br>
		<h1>COMING SOON</h1>
		<br><br><br><br><br>
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