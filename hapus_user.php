<?php
	include 'koneksi.php';
	session_start();
	// semisal belum login, langsung masuk ke index.php
		if(!isset($_SESSION['username'])){
			header("Location: index.php");
		}
    $username = $_SESSION['username'];
    $id = $_GET['id'];
    
    $sql = "DELETE FROM `user` WHERE `id` = '$id'";
    if ($konek->query($sql)) {
      echo "string";
      header("Location:user_admin.php");
    }else {
      header("Location:user_admin.php");
    }
 ?>