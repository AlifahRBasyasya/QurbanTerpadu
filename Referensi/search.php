<?php
session_start();
//$conn = mysqli_connect("localhost","root","","shoecasing");
$conn = mysqli_connect("localhost", "onestepf_user", "q!tU2+UZnss%", "onestepf_os0604");
if (!isset($_POST['search-box'])){
    $resultproduk = mysqli_query($conn, "SELECT * FROM produk");
}
else {
    $s = $_POST['search-box'];
    $resultproduk = mysqli_query($conn,"SELECT * FROM produk where nama like '%$s%' order by id_produk ASC");
}


$row = 1;

if (isset($_SESSION['login'])){
		$email = $_SESSION['email'];
		$result2 = mysqli_query($conn, "SELECT * FROM akun WHERE email = '$email' ");
		$akun = mysqli_fetch_assoc($result2);
	}
$row = 1;

if (isset($_SESSION['login'])){
		$email = $_SESSION['email'];
		$result2 = mysqli_query($conn, "SELECT * FROM akun WHERE email = '$email' ");
		$akun = mysqli_fetch_assoc($result2);
	}

?>
<!DOCTYPE html>
<html>
<head>
    <title>Onestep-Katalog</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width; initial-scale=1.0; maximum-scale=1.0;">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="katalog.css?v=<?php echo time(); ?>">
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

<div class="body-container">
    <div class="banner-container">
        <img class="banner" src="images/product-banner.png">
        <h1 class="title">OUR PRODUCTS</h1>
    </div>

    <div class="search">
        <!--<img src="images/Search.png">-->
        <form action="search.php" method = "post"> 
            <input type="text" name="search-box" placeholder="Cari Produk">
        </form>
    </div> 
    
    <!--<div class="search">-->
    <!--    <img src="images/Search.png">-->
    <!--    <a href="#"><input type="text" id="search-box" placeholder="Search"></a>-->
    <!--    <br>-->
    <!--</div>-->

    <button class="collapsible">Filter</button>
    <div class="filter-container">
        <form action ="filter.php" method ="get">
            <p class="filter-title">KATEGORI</p>
            <div class="kategori">
                <input type="checkbox" class="hidden" id="sport" name="kategori[]" value="Sport">
                <label for="sport">Sport</label>
                <input type="checkbox" class="hidden" id="casual" name="kategori[]" value="Casual">
                <label for="casual">Casual</label>
                <input type="checkbox" class="hidden" id="slipon" name="kategori[]" value="SlipOn">
                <label for="slipon">Slip-On</label>
            </div>
            <p class="filter-title">URUTKAN</p>
            <div class="urutkan">
                <select class="urutan" id="urutan" name="urutan">
                    <option value="baru">Terbaru</option>
                    <option value="rendah">Harga Terendah ke Tertinggi</option>
                    <option value="tinggi">Harga Tertinggi ke Terendah</option>
                    <option value="diskon">Diskon</option>
                </select>
            </div>
            <p class="filter-title">HARGA</p>
            <div class="harga">
                <input type="number" id="harga-min" name="harga-min" placeholder="Harga Minimum" default='0'>
                <br>
                <input type="number" id="harga-maks" name="harga-maks" placeholder="Harga Maksimum" default='0'>
                <br><br>
                <button id="btn_search" type="Submit">Search</button>
            </div>  
        </form>
    </div>

    <script>
        var coll = document.getElementsByClassName("collapsible");
        var i;
        
        for (i = 0; i < coll.length; i++) {
            coll[i].addEventListener("click", function() {
            this.classList.toggle("active");
            var content = this.nextElementSibling;
            if (content.style.display === "block") {
                content.style.display = "none";
            } else {
                content.style.display = "block";
            }
            });
        }
    </script>

    <br><br>
    <div class="products">
        <?php while ($katalog = mysqli_fetch_assoc($resultproduk)) :
        $a = "Rp ";
        $nilai = ((100-$katalog["diskon"])/100) * $katalog["harga"]; 
        $row = $row + 1; 
        if ($row % 3 == 0) echo "
        "; ?> 
            <div class="product-container">
                <div class="sepatu-container">
                    <?php 
                    if ($katalog["diskon"] !=0){?>
                        <div class="label">
                            <img class="label-diskon" src="images/discount.png">
                            <span class="percent">-<?= $katalog["diskon"] . "%"; ?></span>
                            <a href="https://onestepfootwear.com/productpage.php?idproduk=<?php echo $katalog['id_produk'] ?>"><img class="sepatu" src=<?= $katalog["g1"]; ?> > </a>
                        </div>
                    <?php } else { ?>
                        <br><br><br>
                        <a href="https://onestepfootwear.com/productpage.php?idproduk=<?php echo $katalog['id_produk'] ?>"><img class="sepatu" src=<?= $katalog["g1"]; ?> > </a>
                    <?php } ?>
                </div>
                <div class="product-desc">
                    <span class="product-name"><?= $katalog["nama"];?></span>
                    <br>
                    <?php
                    if ($katalog["diskon"] !=0){?>
                        <span class="product-newprice"><?= $a . $nilai ;?></span>
                        <span class="product-orgprice"><?= $a . $katalog["harga"];?></span>
                    <?php } else {?>
                        <span class="product-newprice"><?= $a . $nilai ;?></span>
                    <?php } ?>
                </div>
        </div>
        <?php endwhile; ?>
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