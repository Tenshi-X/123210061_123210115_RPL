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
  <title>404</title>
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
        <li class="dropdown"><a class=" dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">Kategori</a>
          <ul class="dropdown-menu">
            <li><a href="kategori_admin.php?tag=Protein" class="dropdown-item">Protein</a></li>
            <li><a href="kategori_admin.php?tag=Sayuran" class="dropdown-item">Sayuran</a></li>
            <li><a href="kategori_admin.php?tag=Buah" class="dropdown-item">Buah</a></li>
            <li><a href="kategori_admin.php?tag=Bumbu" class="dropdown-item">Bumbu</a></li>
            <li><a href="kategori_admin.php?tag=Snack" class="dropdown-item">Snack</a></li>
            <li><a href="kategori_admin.php?tag=Minuman" class="dropdown-item">Minuman</a></li>
          </ul>
        </li>
        <li style="margin-left: 750px;"> <a href="cart_admin.php">
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
    <!-- breadcrumb-section -->
    <h1 style="padding: 100px;text-align: center; color: blue; text-decoration: underline; font-weight: bold;">404 - Not Found</h1>
    <!-- end breadcrumb section -->

    <!-- error section -->
    <nav style="text-align: center;padding: 100px; background-color:  #0274BC;">
      <i><img src="img/cry.svg" alt="cry"> </i>
      <h1 style="text-align: center; color: whitesmoke; text-decoration: underline;font-weight: bold;">Oops! Not Found.</h1>
      <p style="color : whitesmoke;">The page you requested for is not found.</p>
      <a href="homepage.php" class="btn btn-light" ;>Back to Home</a>
    </nav>

    <!-- end error section -->


    <footer style="position: absolute;"> &copy; 2023 DeliVer. All rights reserved.</footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>

    <script src="script.js"></script>

</body>

</html>