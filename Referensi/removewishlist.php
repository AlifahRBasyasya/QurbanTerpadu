<?php
session_start();
$_SESSION['email'] = "syifakush@gmail.com";
//$conn = mysqli_connect("localhost", "onestepf_user", "q!tU2+UZnss%", "onestepf_os0604");
$_SESSION['login'] = true;
$email = $_SESSION['email'];
$row = 1;
$conn = mysqli_connect("localhost", "root", "", "shoecasing");	
$result = mysqli_query($conn, "SELECT * FROM akun WHERE email = '$email' ");
$akun = mysqli_fetch_assoc($result);

$idproduk = $_GET['idproduk'];
mysqli_query($conn, "DELETE FROM wishlist WHERE email = '$email' and id_produk = '$idproduk'");
header('location:wishlist_page.php');
?>