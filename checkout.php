<?php
session_start();

if (!isset($_SESSION['username'])) {
	header("Location: index.php");
	exit;
}

require 'koneksi.php';
$username = $_SESSION['username'];
$idUser = $konek->query("SELECT `id` FROM `user` WHERE `user`.`username` = '$username'")->fetch_assoc()['id'];
$dataCart = $konek->query("SELECT * FROM `cart` WHERE `cart`.`id_user` = '$idUser' AND `cart`.`id_status` = '1'");

if ($dataCart->num_rows > 0) {
	while ($value = $dataCart->fetch_assoc()) {
		$idMenu = $value['id_menu'];
		$menu = $konek->query("SELECT * FROM `menu` WHERE `menu`.`id` = '$idMenu'")->fetch_assoc();
		$total = $total + ($value['jumlah_barang'] * $menu['harga']);
	}
}

$sql = "UPDATE `cart` SET `id_status` = '2', `tanggal_pembelian` = CURRENT_TIMESTAMP() WHERE `cart`.`id_user` = '$idUser' AND `cart`.`id_status` = '1'";
mysqli_query($konek, $sql);
if ($konek->query($sql)) {
	$idStatus = $konek->query("SELECT * FROM `cart` WHERE `cart`.`id_user` = '$idUser' AND `cart`.`id_status`='2'")->fetch_assoc()['id_status'];
	$sql = "INSERT INTO `transaksi` VALUES (NULL, '$idUser','$total', '$idStatus', CURRENT_TIMESTAMP())";
	if ($konek->query($sql)) {
		header("Location:history.php");
	}
} else {
	header("Location:history.php");
}
