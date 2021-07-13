<?php
    session_start();

    $conn = mysqli_connect("localhost", "onestepf_user", "q!tU2+UZnss%", "onestepf_os0604"); 
    /*$conn = mysqli_connect("localhost", "root", "", "shoecasing"); */

    $error = NULL;
    if (isset($_SESSION['login'])){
        $email = $_SESSION['email'];
        $result = mysqli_query($conn, "SELECT * FROM akun WHERE email = '$email' ");
        $akun = mysqli_fetch_assoc($result);
    }

    if (!isset($_GET['idproduk'])){
        header("Location: http://onestepfootwear.com/coba1/katalog.php");
        exit;
    }
    else {
        $id_produk = $_GET['idproduk'];
        $result2 = mysqli_query($conn, "SELECT * FROM produk WHERE id_produk = '$id_produk'");
        $produk = mysqli_fetch_assoc($result2);
        if ($produk < 0 ) {
            header("Location: http://onestepfootwear.com/coba1/login.php");
        }
    }
?>

<!DOCTYPE html>
<html>
    <head>
        <title>Onestep-Product</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <link rel="stylesheet" href="productpage.css?v=<?php echo time(); ?>">
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
        <hr>

        <div class="body-container">
            <div class="header">
                <a class="nama-produk" href="https://onestepfootwear.com/katalog.php">
                    &#8592; &nbsp; &nbsp; &nbsp; &nbsp; <?= $produk['nama']; ?>
                </a>
            </div>
            <br>
            <div class="mainphoto-container">
                <img class="main-photo" src=<?= $produk["g1"]; ?>>
            </div>
            <div class="photos-container">
                <div class="side-photos">
                    <img class="side-photo" src=<?= $produk["g2"]; ?>>
                    <img class="side-photo" src=<?= $produk["g3"]; ?>>
                    <img class="side-photo" src=<?= $produk["g4"]; ?>>
                    <img class="side-photo" src=<?= $produk["g5"]; ?>>
                </div>
                <br>
                <p class="title-ukuran">Size</p>
                <div class="ukuran">
                    <?php for ($i = 35; $i < 46; $i++) : ?>
                        <?php if ($produk[$i] > 0) : ?>
                            <span class="check-round"><?= $i; ?></span>
                        <?php else : ?>
                            <span class="check-round disabled"><?= $i; ?></span>
                        <?php endif ; ?>
                    <?php endfor ; ?>
                </div>
                <div class="cart-container">
                    <span class="harga">Harga</span>
                    <span class="orgprice">Rp <?= number_format($produk["harga"],0," ","."); ?></span>
                    <span class="newprice">Rp <?= number_format($produk["harga_baru"],0," ","."); ?></span>
                    <br>

                    <span class="beli">Beli</span>

                    <a href= <?= $produk['tokopedia']; ?> >
                        <button type="button" class="tokopedia">
                            <img class="logo-tokopedia" src="images/logo-tokopedia.png">
                        </button>
                    </a>
                    <a href= <?= $produk['shopee']; ?> >
                    <button type="button" class="shopee">
                        <img class="logo-shopee" src="images/logo-shopee.png">
                    </button>
                    <br>
                    <a href="https://onestepfootwear.com/wishlist.php?idproduk=<?php echo $produk['id_produk'] ?>">
                        <button type="button" class="addtowishlist">ADD TO WISHLIST</button>
                    </a>
                    <br>

                </div>
                <br>
                <div class="desc-container">
                    <p class="desc-title">Deskripsi Produk</p>
                    <p class="desc">
                        <?= $produk['deskripsi']; ?>
                    </p>
                </div>
            </div>
            
        </div>
        <br><br><br><br><br><br><br>

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