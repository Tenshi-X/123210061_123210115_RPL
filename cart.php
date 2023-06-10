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
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
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
        <li style="margin-left: 750px;"> <img src="img/cart.svg" alt="Cart"> <a href="cart.php"></a></li>
        </a></li>
             <li> <a href="history.php">
            <img src="img/history.svg" alt="history">
          </a></li>
        <li><a href="logout.php">Logout</a></li>
      </ul>
    </nav>
  </header>
  <section id="promo">

    <h1 class="text-center" style="color:#0274BC" ;>Tabel Cart DeliVer</h1>
    <!-- Buat tabel dengan tag table dan class Bootstrap -->
    <table class="table table-bordered table-striped table-hover">
      <!-- Buat baris header dengan tag tr -->
      <tr>
        <!-- Buat kolom header dengan tag th -->
        <th>Produk Image</th>
        <th>Nama</th>
        <th>Harga</th>
        <th>Jumlah</th>
        <th>Subtotal</th>
        <th>Aksi</th>
      </tr>
      <?php
      $tot = 0;
      $username = $_SESSION["username"];
      $idUser = $konek->query("SELECT `id` FROM `user` WHERE `user`.`username` = '$username'")->fetch_assoc()['id'];
      $dataCart = $konek->query("SELECT * FROM `cart` WHERE `cart`.`id_user` = '$idUser' AND `cart`.`id_status` = '1'");
      $i = 1;
      if ($dataCart->num_rows > 0) {
        while ($value = $dataCart->fetch_assoc()) {
          $idMenu = $value['id_menu'];
          $menu = $konek->query("SELECT * FROM `menu` WHERE `menu`.`id` = '$idMenu'")->fetch_assoc();
          $total = 0;
          $total += $menu["harga"];
      ?>
          <!-- Buat baris data produk dengan tag tr -->
          <tr class="product-row">
            <!-- Buat kolom data produk dengan tag td -->
            <td><img src="img/<?php echo $menu["gambar"]; ?>" style="width: 100px;" alt=""></td>
            <td><?php echo $menu["nama"] ?></td>
            <td class="harga">Rp<?php echo $menu["harga"] ?></td>
            <td> <a href="tambah_jumlah.php?id=<?= $value['id']; ?>" class="btn btn-outline-info" ;><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-plus-lg" viewBox="0 0 16 16">
  <path fill-rule="evenodd" d="M8 2a.5.5 0 0 1 .5.5v5h5a.5.5 0 0 1 0 1h-5v5a.5.5 0 0 1-1 0v-5h-5a.5.5 0 0 1 0-1h5v-5A.5.5 0 0 1 8 2Z"/>
</svg></a> <?= $value['jumlah_barang'] ?> <a href="kurang_jumlah.php?id=<?= $value['id']; ?>" class="btn btn-outline-danger" ;><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-dash-lg" viewBox="0 0 16 16">
  <path fill-rule="evenodd" d="M2 8a.5.5 0 0 1 .5-.5h11a.5.5 0 0 1 0 1h-11A.5.5 0 0 1 2 8Z"/>
</svg></a> </td>
            <!-- Buat kolom untuk menampilkan subtotal harga dengan tag td dan class subtotal -->
            <td class="subtotal">Rp<?php echo $value['jumlah_barang'] * $menu['harga']; ?></td>
            <?php $tot = $tot + ($value['jumlah_barang'] * $menu['harga']); ?>
            <!-- Buat button untuk menghapus produk dari tabel dengan tag td dan class Bootstrap -->
            <td><a href="delete_cart.php?id=<?= $value['id']; ?>" class="btn btn-danger" ;>Hapus</a></td>
        <?php
        }
      }
        ?>
          </tr>
          <!-- Buat baris total harga dengan tag tr -->
          <tr id="total-row">
            <!-- Buat kolom total harga dengan tag td dan colspan 4 -->
            <td colspan="4">Total Harga:</td>
            <!-- Buat kolom untuk menampilkan total harga dengan tag td dan id total-price -->
            <td id="total-price">Rp<?php echo $tot ?></td>
            <!-- Buat kolom kosong dengan tag td -->
            <td><a href="checkout.php" class="btn btn-primary" ;>Checkout</a></td>
            <td><a href="history.php" class="btn btn-primary" ;>History</a></td>
          </tr>
    </table>

  </section>

  <footer style="position: absolute;"> &copy; 2023 DeliVer. All rights reserved.</footer>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>
  <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
  <script src="script.js"></script>

</body>

</html>