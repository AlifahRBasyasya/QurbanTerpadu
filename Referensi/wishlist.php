<?php

    session_start();

    if (!isset($_SESSION['login'])){    
        header("Location: https://onestepfootwear.com/login.php");
        exit;
    }


    //$conn = mysqli_connect("localhost", "root", "", "os");
    $conn = mysqli_connect("localhost", "onestepf_user", "q!tU2+UZnss%", "onestepf_os0604");

    $email = $_SESSION['email'];

    $curr_produk = $_GET['idproduk'];
    mysqli_query($conn, "INSERT INTO wishlist (id_produk, email) VALUES ('$curr_produk', '$email')");
    header("Location: https://onestepfootwear.com/productpage.php?idproduk=$curr_produk");

?>