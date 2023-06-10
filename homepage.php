<?php
include 'koneksi.php';
session_start();
// semisal belum login, langsung masuk ke index.php
if (!isset($_SESSION['username'])) {
  header("Location: index.php");
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
      <div class="container" style="text-align: center;padding: 100px;">
        <h1 style="text-align: center; color: #0274BC; font-weight: bold;">Your Warmindo Needs Us</h1>
        <a href="shop.php" class="btn btn-outline-primary" style="text-align: center;">Go to shop</a>
      </div>
    </section>

    <footer style="position: absolute;"> &copy; 2023 DeliVer. All rights reserved.</footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>

    <script src="script.js"></script>

</body>

</html>