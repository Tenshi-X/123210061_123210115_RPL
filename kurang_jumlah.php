<?php
include 'koneksi.php';
session_start();
// semisal belum login, langsung masuk ke index.php
if (!isset($_SESSION['username'])) {
    header("Location: index.php");
} else {
    $username = $_SESSION['username'];
      $idCart = $_GET['id'];
       $cek = $konek->query("SELECT * FROM `cart` WHERE `cart`.`id` = '$idCart'")->fetch_assoc();
       if ($cek['jumlah_barang'] <= 1) {
           header("Location:cart.php");
       }
       else{
$jumlah = $cek['jumlah_barang'] - 1;
    $sql = "UPDATE cart SET `jumlah_barang` = '$jumlah' WHERE `cart`.`id` = '$idCart'";
        if ($konek->query($sql)) {
            header("Location:cart.php");
        } else {
            header("Location:cart.php");
        }
    } 

       }
    