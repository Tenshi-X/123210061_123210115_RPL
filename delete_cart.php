<?php
	include 'koneksi.php';
	session_start();
	// semisal belum login, langsung masuk ke index.php
		if(!isset($_SESSION['username'])){
			header("Location: index.php");
		}
    $username = $_SESSION['username'];
    $idCart = $_GET['id'];
    
    $sql = "DELETE FROM cart WHERE cart.id = '$idCart'";
    if ($konek->query($sql)) {
      echo "string";
      header("Location:cart.php");
    }else {
      header("Location:cart.php");
    }
 ?>