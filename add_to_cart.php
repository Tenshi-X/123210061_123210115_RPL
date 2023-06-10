<?php
include 'koneksi.php';
session_start();
// semisal belum login, langsung masuk ke index.php
if (!isset($_SESSION['username'])) {
    header("Location: index.php");
} else {
    $username = $_SESSION['username'];
    $idUser = $konek->query("SELECT `id` FROM `user` WHERE `user`.`username` = '$username'")->fetch_assoc()['id'];
    $bykMenu = 0;
    $idMenu = $_GET['id'];
    $cek = $konek->query("SELECT * FROM `cart` WHERE `cart`.`id_user` = '$idUser' AND `cart`.`id_menu`='$idMenu' AND `cart`.`id_status` = '1'");
    $menu = $konek->query("SELECT * FROM `menu` WHERE `menu`.`id` = '$idMenu'")->fetch_assoc();
    $row = mysqli_fetch_assoc($cek);
    if ($row == NULL) {
        $bykMenu += 1;
        $idStatus = 1;
        $totalHarga = $menu['harga'];
        $sql = "INSERT INTO cart VALUES (NULL, '$idUser', '$idMenu', '$bykMenu','$totalHarga', '$idStatus', NULL)";
        if ($konek->query($sql)) {
            header("Location:cart.php");
        } else {
            header("index.php");
        }
    } else {
        $bykMenu = $row['jumlah_barang'] + 1;
        $idCart = $row['id'];
        $total = $menu['harga'] * $bykMenu;
        $sql = "UPDATE `cart` SET `jumlah_barang` = '$bykMenu', `total_harga` = '$total' WHERE `cart`.`id` = '$idCart'";
        if ($konek->query($sql)) {
            header("Location:cart.php");
        } else {
            header("index.php");
        }
    }
}
