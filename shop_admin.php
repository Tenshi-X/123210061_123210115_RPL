<?php
include 'koneksi.php';
session_start();
// semisal belum login, langsung masuk ke index.php
if (!isset($_SESSION['username'])) {
  header("Location: index.php");
}

$sql = "SELECT * FROM menu";
$query = $konek->query($sql);
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
        <li><a href="homepage_admin.php">Home</a></li>
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

  <main>
    <section id="promo">
      <div class="container">
        <div class="category">
          <a href="kategori_admin.php?tag=Protein" class="category-item" style="background-image: url('img/protein.jpeg');
 background-size: 100px;">Protein</a>
          <a href="kategori_admin.php?tag=Sayuran" class="category-item" style="background-image: url('img/sayuran.jpg');
 background-size: 100px;">Sayuran</a>
          <a href="kategori_admin.php?tag=Buah" class="category-item" style="background-image: url('img/buah.jpeg');
 background-size: 100px;">Buah</a>
          <a href="kategori_admin.php?tag=Bumbu" class="category-item" style="background-image: url('img/bumbu.jpeg');
 background-size: 100px;">Bumbu</a>
          <a href="kategori_admin.php?tag=Snack" class="category-item" style="background-image: url('img/snack.jpeg');
 background-size: 100px;">Snack</a>
          <a href="kategori_admin.php?tag=Minuman" kategori_admin.php?tag=Protein class="category-item" style="background-image: url('img/minuman.jpeg');
 background-size: 100px;">Minuman</a>
        </div>
      </div>
    </section>

    <section id="products">
      <div style="text-align: center; padding: 20px">
        <a href="upload.php" class="btn btn-outline-primary"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-bag-plus-fill" viewBox="0 0 16 16">
            <path fill-rule="evenodd" d="M10.5 3.5a2.5 2.5 0 0 0-5 0V4h5v-.5zm1 0V4H15v10a2 2 0 0 1-2 2H3a2 2 0 0 1-2-2V4h3.5v-.5a3.5 3.5 0 1 1 7 0zM8.5 8a.5.5 0 0 0-1 0v1.5H6a.5.5 0 0 0 0 1h1.5V12a.5.5 0 0 0 1 0v-1.5H10a.5.5 0 0 0 0-1H8.5V8z" />
          </svg> Add Data</a>
      </div>

      <ul class="product-list">
        <?php $i = 1; ?>
        <?php foreach ($query as $id) : ?>
          <li class="product-item">
            <img class="img-barang" src="img/<?php echo $id["gambar"]; ?>" alt="">
            <h3 style="font-weight: bold; color: whitesmoke; font-size: 20px;"><?= $id["nama"]; ?></h3>
            <p style="font-weight: bold; color: whitesmoke; font-size: 30px">Rp<?= $id["harga"]; ?></p>
            <a href="update.php?id_menu=<?= $id["id"]; ?>" class="btn btn-outline-light"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pencil-fill" viewBox="0 0 16 16">
                <path d="M12.854.146a.5.5 0 0 0-.707 0L10.5 1.793 14.207 5.5l1.647-1.646a.5.5 0 0 0 0-.708l-3-3zm.646 6.061L9.793 2.5 3.293 9H3.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.207l6.5-6.5zm-7.468 7.468A.5.5 0 0 1 6 13.5V13h-.5a.5.5 0 0 1-.5-.5V12h-.5a.5.5 0 0 1-.5-.5V11h-.5a.5.5 0 0 1-.5-.5V10h-.5a.499.499 0 0 1-.175-.032l-.179.178a.5.5 0 0 0-.11.168l-2 5a.5.5 0 0 0 .65.65l5-2a.5.5 0 0 0 .168-.11l.178-.178z" />
              </svg> Update</a>
            <a href="delete.php?id_menu=<?= $id["id"]; ?>" class="btn btn-outline-danger" onclick="return confirm('Yakin Untuk Menghapus?');"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash3-fill" viewBox="0 0 16 16">
                <path d="M11 1.5v1h3.5a.5.5 0 0 1 0 1h-.538l-.853 10.66A2 2 0 0 1 11.115 16h-6.23a2 2 0 0 1-1.994-1.84L2.038 3.5H1.5a.5.5 0 0 1 0-1H5v-1A1.5 1.5 0 0 1 6.5 0h3A1.5 1.5 0 0 1 11 1.5Zm-5 0v1h4v-1a.5.5 0 0 0-.5-.5h-3a.5.5 0 0 0-.5.5ZM4.5 5.029l.5 8.5a.5.5 0 1 0 .998-.06l-.5-8.5a.5.5 0 1 0-.998.06Zm6.53-.528a.5.5 0 0 0-.528.47l-.5 8.5a.5.5 0 0 0 .998.058l.5-8.5a.5.5 0 0 0-.47-.528ZM8 4.5a.5.5 0 0 0-.5.5v8.5a.5.5 0 0 0 1 0V5a.5.5 0 0 0-.5-.5Z" />
              </svg> Delete</a>
          </li>
          <?php $i++; ?>
        <?php endforeach; ?>
      </ul>

    </section>

    <footer style="position: absolute;"> &copy; 2023 DeliVer. All rights reserved.</footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>

    <script src="script.js"></script>

</body>

</html>