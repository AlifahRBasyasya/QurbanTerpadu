<?php 
	session_start();

	//$conn = mysqli_connect("localhost", "root", "", "os");
	$conn = mysqli_connect("localhost", "onestepf_user", "q!tU2+UZnss%", "onestepf_os0604");	
	$result = mysqli_query($conn, "SELECT * FROM produk ORDER BY id_produk DESC");

	$i=0;
	$produk= []; 
	while ( $row = mysqli_fetch_assoc($result)) {
		if ($i<4){
			$produk[] = $row;
		}
		$i=$i+1;
	}

	if (isset($_SESSION['login'])){
		$email = $_SESSION['email'];
		$result2 = mysqli_query($conn, "SELECT * FROM akun WHERE email = '$email' ");
		$akun = mysqli_fetch_assoc($result2);
	}

?>


<!DOCTYPE html>
<html>

<head>
	<title>Onestep-HomePage</title>
	<link rel="stylesheet" type="text/css" href="HomePage.css">
	<link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Poppins" />
	<link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<style> * {
    margin: 0;
    padding: 0;
    font-family: Poppins ;}
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

	<div class="slide-container">
	    <div class="slide-images">
	    	<div class="img-container"><img src="images/Fix-3.jpg"></div>
		    <div class="img-container"><img src="images/Fix-1.jpg"></div>
		    <div class="img-container"><img src="images/Fix-2.jpg"></div>
		    <div class="img-container"><img src="images/Fix-3.jpg"></div>
	    </div>
	</div>

	<section id="produk">
		<div class="container">
			<h1>KEEP EVERY STEP GOING</h1>
			<div class="daftar">
				<a href="https://forms.gle/dwJCAxiDPWvbnEj49"><h5><u>REGISTER FOR OUR GRAND LAUNCHING</u></h5></a>
				<p>	To announce our grand launching, we invite you to join our event that will be held on :</p>
				Sunday, 27th June 2021</p>
				10.00 - 12.00 WIB</p>
			</div>

			<h5>NEW ARRIVAL</h5>
			<center>
			<?php for ($j=0; $j<$i; $j++) : ?>
			    <?php if ($produk[$j] != NULL ) : ?>
				<div class="produk2">
				<a href="https://onestepfootwear.com/productpage.php?idproduk=<?= $produk[$j]['id_produk']; ?>">
					<img src=<?= $produk[$j]['g1']; ?>>
				</a>
				<p><?= $produk[$j]['nama'] ; ?></p>
				<p><span class="harga">Rp <?= number_format($produk[$j]["harga_baru"],0," ","."); ?></span>
				<?php if ($produk[$j]["diskon"] > 0) : ?>
					<span class="diskon">Rp <?= number_format($produk[$j]["harga"],0," ","."); ?></span>
				<?php endif ; ?>
				</p>
				</div>
			<?php endif ; ?>
			<?php endfor ; ?>		
			</center>	
		</div>	
	</section>

	<section id="Video">
		<p class="black">a</p>
		<div class="two-image">
			<video controls>
				<source src="product/V2-VIDEO.mp4">
			</video>
		</div>
		<p class="black">a</p>
	</section>

	<section id="introduction">
		<div class="container">
			<h3>A changeable sneakers that sold two parts of shoes seperately</h3>
			<img src="images/web.jpg">
		</div>
	</section>
	<section id="Tentang-Onestep">
		<div class="judul">
			<br><br>
			<a href="https://onestepfootwear.com/index.php"><img class="onestep-logo" src="images/Onestep.png" alt="Onestep Logo"></a>
		</div>
		<div class="grid-container">
			<div class="grid-item1"><img src="images/Kiri-1.png"></div>
			<div class="grid-item2">
				<p>
					<img src="images/eco.png"><br><br>
					We realize that to be sustainable is not always about materials, but a small change in product design can be led to the same impac
				</p>
			</div>
			<div class="grid-item3"><img src="images/Kanan-1.png"></div>
			<div class="grid-item4"><img src="images/Kiri-2.png"></div>
			<div class="grid-item5"><img src="images/Kanan-2.png"></div>
			<div class="grid-item6"><img src="images/Kiri-3.png"></div>
			<div class="grid-item7"><img src="images/Kanan-3.png"></div>
			<div class="grid-item8"><img src="images/Kiri-4.png"></div>
			<div class="grid-item9"><img src="images/Kanan-4.png"></div>				
		</div>
		<!--<button onclick="location.href='#'">SEE MORE</button>-->
	</section>

	<section id="third-show">
		<h1>ANYONE COULD CREATE</h1>
		<div class="img-c-container">
			<div class="img-cl"><img src="product/V4.png"></div>
			<div class="img-cr"><img src="product/V1.png"></div>
			<div class="img-cl"><img src="product/V2.png"></div>
			<div class="img-cr"><img src="product/V3.png"></div>
		</div>
	</section>

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