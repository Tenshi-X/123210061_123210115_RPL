<?php
session_start();

if (!isset($_SESSION['username'])) {
	header("Location: index.php");
	exit;
}

require 'koneksi.php';

$id_menu = $_GET["id_menu"];

mysqli_query($konek, "DELETE FROM `menu` WHERE id = '$id_menu'");

if (mysqli_affected_rows($konek) > 0) {
	echo "
			<script>
				alert('Data Berhasil Dihapus!');
				document.location.href = 'shop_admin.php';
			</script>
		";
} else {
	echo "
			<script>
				alert('Data Gagal Dihapus!');
				document.location.href = 'shop_admin.php';
			</script>
		";
}
