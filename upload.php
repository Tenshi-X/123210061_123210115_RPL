<?php
session_start();

if (!isset($_SESSION['username'])) {
	header("Location: index.php");
	exit;
}

require 'koneksi.php';

// cek apakah tombol tambah sudah ditekan atau belum
if (isset($_POST["tambah"])) {
	$nama = htmlspecialchars($_POST["nama"]);
	$harga = htmlspecialchars($_POST["harga"]);
	$kategori = htmlspecialchars($_POST["kategori"]);
	$gambar = upload();
	if (!$gambar) {
		return false;
	}

	// query insert data
	$query = "INSERT INTO menu VALUES
			('', '$nama', '$harga', '$kategori', '$gambar')
		";
	mysqli_query($konek, $query);

	// cek keberhasilan input data
	if (mysqli_affected_rows($konek) > 0) {
		echo "
				<script>
					alert('Data Berhasil Ditambahkan!');
					document.location.href = 'shop_admin.php';
				</script>
			";
	} else {
		echo "
				<script>
					alert('Data Gagal Ditambahkan!');
					document.location.href = 'upload.php';
				</script>
			";
	}
}

// fungsi upload gambar
function upload()
{
	$namaFile = $_FILES['gambar']['name'];
	$ukuranFile = $_FILES['gambar']['size'];
	$error = $_FILES['gambar']['error'];
	$tmpName = $_FILES['gambar']['tmp_name'];

	// cek apakah ada gambar yang diupload
	if ($error === 4) {
		echo "
				<script>
					alert('Gambar Belum Diinputkan!');
					document.location.href = 'upload.php';
				</script>
			";
		return false;
	}

	// cek apakah yang diupload adalah gambar
	$ekstensiGambarValid = ['jpg', 'jpeg', 'png'];
	$ekstensiGambar = explode('.', $namaFile);
	$ekstensiGambar = strtolower(end($ekstensiGambar));

	// adakah sebuah string dalam sebuah array
	if (!in_array($ekstensiGambar, $ekstensiGambarValid)) {
		echo "
				<script>
					alert('Yang Anda Upload Bukan Gambar!');
					document.location.href = 'upload.php';
				</script>
			";
		return false;
	}
	// jika ukuran terlalu besar
	if ($ukuranFile > 10000000) {
		echo "
				<script>
					alert('Ukuran Gambar Terlalu Besar!');
					document.location.href = 'upload.php';
				</script>
			";
		return false;
	}

	// generate nama gambar baru
	$namaFileBaru = uniqid();
	$namaFileBaru .= '.';
	$namaFileBaru .= $ekstensiGambar;

	// lolos pengecekan, gambar siap diupload
	move_uploaded_file($tmpName, 'img/' . $namaFileBaru);
	return $namaFileBaru;
}
?>


<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>DeliVer</title>
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
	<link rel="stylesheet" type="text/css" href="styles.css">
</head>

<body>
	<header>
		<nav class="navbar fixed-top" style="background-color: #0274BC; padding: 20px;">
			<ul>
				<img src="img/logo.svg" alt="Logo DeliVer" style="text-align: left;">
			</ul>
			<ul>
				<li><a href="homepage.php">Home</a></li>
				<li class="dropdown"><a href="shop_admin.php" class=" dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">Kategori</a>
					<ul class="dropdown-menu">
						<li><a href="kategori_admin.php?tag=Protein" class="dropdown-item">Protein</a></li>
						<li><a href="kategori_admin.php?tag=Sayuran" class="dropdown-item">Sayuran</a></li>
						<li><a href="kategori_admin.php?tag=Buah" class="dropdown-item">Buah</a></li>
						<li><a href="kategori_admin.php?tag=Bumbu" class="dropdown-item">Bumbu</a></li>
						<li><a href="kategori_admin.php?tag=Snack" class="dropdown-item">Snack</a></li>
						<li><a href="kategori_admin.php?tag=Minuman" class="dropdown-item">Minuman</a></li>
					</ul>
				</li>
				<li style="margin-left: 750px;"> <a href="history_admin.php">
            <img src="img/history.svg" alt="history">
          </a></li>
          <li> <a href="user_admin.php">
            <img src="img/accounts.svg" alt="user_admin">
          </a></li>
				<li><a href="logout.php">Logout</a></li>
			</ul>
		</nav>
	</header>
	<div class="container">
		<h1 style="text-align: center; color:#0274BC" ;>Tambah Data Bahan Makanan</h1>
		<!-- Buat form dengan tag form dan atribut action dan method -->
		<form action="" method="POST" enctype="multipart/form-data">
			<!-- Buat label dan input untuk nama produk -->
			<label for="nama">Nama Bahan Makanan</label>
			<input type="text" id="nama" name="nama" placeholder="Masukkan nama Bahan Makanan.." required>
			<!-- Buat label dan input untuk harga produk -->
			<label for="harga">Harga Bahan Makanan</label>
			<input type="text" id="harga" name="harga" placeholder="Masukkan harga Bahan Makanan.." required>
			<!-- Buat label dan input untuk kategori produk -->
			<label for="kategori">Kategori</label>
			<select name="kategori" id="kategori" required>
				<option selected>kategori menu</option>
				<option name="kategori">Protein</option>
				<option name="kategori">Sayuran</option>
				<option name="kategori">Buah</option>
				<option name="kategori">Bumbu</option>
				<option name="kategori">Snack</option>
				<option name="kategori">Minuman</option>
			</select>
			<!-- Buat label dan input untuk gambar produk -->
			<label for="gambar">Gambar Bahan Makanan</label>
			<input type="file" id="gambar" name="gambar" placeholder="Masukkan gambar Bahan Makanan.." required>
			<!-- Buat button untuk submit form -->
			<label></label>
			<button type="submit" name="tambah" value="Upload" style=" background-color: #0274BC;">Tambah Data</button>
		</form>
		<a href="shop_admin.php" style="color: whitesmoke;text-decoration: none;">
			<button style=" background-color: red;max-width: 600px;margin: 0 auto;">Batal</button>
		</a>
	</div>
	</section>
	<footer style="position: absolute;"> &copy; 2023 DeliVer. All rights reserved.</footer>

	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>

	<script src="script.js"></script>

</body>

</html>