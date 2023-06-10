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
            <img src="img/history.svg" alt="history_admin">
          </a></li>
          <li> <a href="user_admin.php">
            <img src="img/accounts.svg" alt="user_admin">
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
                <th>Status</th>
            </tr>
            <?php
            $tot = 0;
            $username = $_SESSION["username"];
            $idUser = $konek->query("SELECT `id` FROM `user` WHERE `user`.`username` = '$username'")->fetch_assoc()['id'];
            $dataCart = $konek->query("SELECT * FROM `cart` WHERE `cart`.`id_user` = '$idUser'");
            $i = 1;
            if ($dataCart->num_rows > 0) {
                while ($value = $dataCart->fetch_assoc()) {
                    $idMenu = $value['id_menu'];
                    $menu = $konek->query("SELECT * FROM `menu`")->fetch_assoc();
                    $total = 0;
                    $total += $menu["harga"];
            ?>
                    <!-- Buat baris data produk dengan tag tr -->
                    <tr class="product-row">
                        <!-- Buat kolom data produk dengan tag td -->
                        <td><img src="img/<?php echo $menu["gambar"]; ?>" style="width: 100px;" alt=""></td>
                        <td><?php echo $menu["nama"] ?></td>
                        <td class="harga">Rp<?php echo $menu["harga"] ?></td>
                        <td> <?= $value['jumlah_barang'] ?></td>
                        <!-- Buat kolom untuk menampilkan subtotal harga dengan tag td dan class subtotal -->
                        <td class="subtotal">Rp<?php echo $value['jumlah_barang'] * $menu['harga']; ?></td>
                        <?php $tot = $tot + ($value['jumlah_barang'] * $menu['harga']); ?>
                        <!-- Buat button untuk menghapus produk dari tabel dengan tag td dan class Bootstrap -->
                        <td><a href="delete_cart.php?id=<?= $value['id']; ?>" class="btn btn-danger" ;>Hapus</a></td>
                        <td class="status"><?php echo $value["id_status"]; ?></td>
                <?php
                }
            }
                ?>
        </table>


    </section>

    <footer style="position: absolute;"> &copy; 2023 DeliVer. All rights reserved.</footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="script.js"></script>

</body>

</html>