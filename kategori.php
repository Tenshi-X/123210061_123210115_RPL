<?php
include 'koneksi.php';
session_start();

// semisal belum login, langsung masuk ke index.php
if (!isset($_SESSION['username'])) {
  header("Location: index.php");
}

if (isset($_GET['tag'])) {
  $tag = $_GET['tag'];
  $sql = "SELECT * FROM menu WHERE kategori='$tag'";
} else {
  $sql = "SELECT * FROM menu";
}

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
        <li><a href="homepage.php">Home</a></li>
        <li class="dropdown"><a href="shop.php" class=" dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">Kategori</a>
          <ul class="dropdown-menu">
            <li><a href="kategori.php?tag=Protein" class="dropdown-item">Protein</a></li>
            <li><a href="kategori.php?tag=Sayuran" class="dropdown-item">Sayuran</a></li>
            <li><a href="kategori.php?tag=Buah" class="dropdown-item">Buah</a></li>
            <li><a href="kategori.php?tag=Bumbu" class="dropdown-item">Bumbu</a></li>
            <li><a href="kategori.php?tag=Snack" class="dropdown-item">Snack</a></li>
            <li><a href="kategori.php?tag=Minuman" class="dropdown-item">Minuman</a></li>
          </ul>
        </li>
        <li style="margin-left: 750px;"> <a href="cart.php">
            <img src="img/cart.svg" alt="Cart">
          </a></li>
        </a></li>
        <li> <a href="history.php">
            <img src="img/history.svg" alt="history">
          </a></li>
        <li><a href="logout.php">Logout</a></li>
      </ul>
    </nav>
  </header>

  <main>
    <section id="promo">
      <div class="container">
        <div class="category">
          <a href="kategori.php?tag=Protein" class="category-item" style="background-image: url('img/protein.jpeg');
 background-size: 100px;">Protein</a>
          <a href="kategori.php?tag=Sayuran" class="category-item" style="background-image: url('img/sayuran.jpg');
 background-size: 100px;">Sayuran</a>
          <a href="kategori.php?tag=Buah" class="category-item" style="background-image: url('img/buah.jpeg');
 background-size: 100px;">Buah</a>
          <a href="kategori.php?tag=Bumbu" class="category-item" style="background-image: url('img/bumbu.jpeg');
 background-size: 100px;">Bumbu</a>
          <a href="kategori.php?tag=Snack" class="category-item" style="background-image: url('img/snack.jpeg');
 background-size: 100px;">Snack</a>
          <a href="kategori.php?tag=Minuman" class="category-item" style="background-image: url('img/minuman.jpeg');
 background-size: 100px;">Minuman</a>
        </div>
      </div>
    </section>

    <section id="products">
      <h2>Produk Rekomendasi</h2>

      <ul class="product-list">
        <?php $i = 1; ?>
        <?php foreach ($query as $id) : ?>
          <li class="product-item">
            <img class="img-barang" src="img/<?php echo $id["gambar"]; ?>" alt="">
            <h3 style="font-weight: bold; color: whitesmoke; font-size: 20px;"><?= $id["nama"]; ?></h3>
            <p style="font-weight: bold; color: whitesmoke; font-size: 30px">Rp<?= $id["harga"]; ?></p>
            <a href="add_to_cart.php?id=<?= $id["id"]; ?>" class="btn btn-outline-light"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-cart-plus" viewBox="0 0 16 16">
                <path d="M9 5.5a.5.5 0 0 0-1 0V7H6.5a.5.5 0 0 0 0 1H8v1.5a.5.5 0 0 0 1 0V8h1.5a.5.5 0 0 0 0-1H9V5.5z" />
                <path d="M.5 1a.5.5 0 0 0 0 1h1.11l.401 1.607 1.498 7.985A.5.5 0 0 0 4 12h1a2 2 0 1 0 0 4 2 2 0 0 0 0-4h7a2 2 0 1 0 0 4 2 2 0 0 0 0-4h1a.5.5 0 0 0 .491-.408l1.5-8A.5.5 0 0 0 14.5 3H2.89l-.405-1.621A.5.5 0 0 0 2 1H.5zm3.915 10L3.102 4h10.796l-1.313 7h-8.17zM6 14a1 1 0 1 1-2 0 1 1 0 0 1 2 0zm7 0a1 1 0 1 1-2 0 1 1 0 0 1 2 0z" />
              </svg> Add to Cart</a>
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