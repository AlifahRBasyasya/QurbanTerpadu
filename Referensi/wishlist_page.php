<?php
    session_start();


    $error = NULL;
    if (!isset($_SESSION['login'])){
        header("Location: login.php");
        exit;
    } else {
         $conn = mysqli_connect("localhost", "onestepf_user", "q!tU2+UZnss%", "onestepf_os0604");
         /*$conn = mysqli_connect("localhost","root","","shoecasing");  */

        $email = $_SESSION['email'];
        $row = 1;
        $result = mysqli_query($conn, "SELECT * FROM akun WHERE email = '$email' ");
        $akun = mysqli_fetch_assoc($result);
        $res_wishlist = mysqli_query($conn, "SELECT * FROM wishlist WHERE email = '$email' ");
        
    }
?>

<!DOCTYPE html>
<html>
    <head>
        <title>Onestep-Wishlist</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <link rel="stylesheet" href="wishlist.css?v=<?php echo time(); ?>">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
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
    <br>

        <div class="body-container">
            <div class="banner-container">
                <img class="banner" src="images/banner_wishlist.png">
                <!-- <h1 class="title">MY WISHLIST</h1> -->
            </div>
        </div>
        <div class="wishlist-container">
            <div class="products">
                <?php while ($wishlist = mysqli_fetch_assoc($res_wishlist)) :
                $idprod = $wishlist['id_produk'];
                $resultproduk = mysqli_query($conn, "SELECT * FROM produk where id_produk = '$idprod'");
                $produk = mysqli_fetch_assoc($resultproduk);
                $a = "Rp ";
                $row = $row + 1; 
                if ($row % 4 == 0) echo "
                "; ?> 
                <div class="full-container">
                    <div class="sepatu-container">
                        <a href="https://onestepfootwear.com/productpage.php?idproduk=<?php echo($idprod); ?>"><img class="sepatu" src=<?= $produk["g1"]; ?> > </a>
                        <div class="wishlist">
                            <a href="https://onestepfootwear.com/removewishlist.php?idproduk=<?php echo($idprod); ?>" onclick="return confirm('Apakah anda yakin ingin menghapus wishlist ?')"><img src="images/trashbin.png"></a>
                        </div>
                    </div>
                    
                    <div class="product-desc">
                        <span class="product-name"><?= $produk["nama"];?></span>
                        <br>
                        <?php
                        if ($produk["diskon"] !=0){?>
                            <span class="product-newprice"><?= number_format($produk["harga_baru"],0," ","."); ?></span>
                            <span class="product-orgprice">Rp <?= number_format($produk["harga"],0," ","."); ?></span>
                        <?php } else {?>
                            <span class="product-newprice"><?= number_format($produk["harga_baru"],0," ","."); ?></span>
                        <?php } ?>
                    </div>
                </div>
                <?php endwhile; ?>
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