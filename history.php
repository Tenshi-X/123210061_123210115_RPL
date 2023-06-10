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
                <li style="margin-left: 750px;"> <a href="cart.php">
                        <img src="img/cart.svg" alt="Cart">
                    </a></li>
                    <li> <a href="history.php">
            <img src="img/history.svg" alt="history">
          </a></li>
                <li><a href="logout.php">Logout</a></li>
            </ul>
        </nav>
    </header>
    <section id="promo">

        <h1 class="text-center" style="color:#0274BC" ;>History</h1>
        <!-- Buat tabel dengan tag table dan class Bootstrap -->
        <table class="table table-bordered table-striped table-hover">
            <!-- Buat baris header dengan tag tr -->
            <tr>
                <!-- Buat kolom header dengan tag th -->
                <th>No</th>
                <th>ID Pembelian</th>
                <th>Total</th>
                <th>Tanggal</th>
                <th>Action</th>
            </tr>
            <?php
            $tot = 0;
            $username = $_SESSION["username"];
            $idUser = $konek->query("SELECT `id` FROM `user` WHERE `user`.`username` = '$username'")->fetch_assoc()['id'];
            $dataCart = $konek->query("SELECT * FROM `transaksi` WHERE `transaksi`.`id_user` = '$idUser' AND `transaksi`.`id_status` = '2'");
            $i = 1;
            if ($dataCart->num_rows > 0) {
                while ($value = $dataCart->fetch_assoc()) {
            ?>
                    <!-- Buat baris data produk dengan tag tr -->
                    <tr class="product-row">
                        <!-- Buat kolom data produk dengan tag td -->
                        <td><?php echo $i ?>.</td>
                        <td class="id"><?php echo $value['id'] ?></td>
                        <td> <?= $value['total_harga'] ?></td>
                        <!-- Buat kolom untuk menampilkan subtotal harga dengan tag td dan class subtotal -->
                        <td class="tanggal"><?php echo $value['waktu_order']; ?></td>
                        <td><a href="detail.php?waktu= <?= $value['waktu_order'] ?>" class="btn btn-primary" ;>Detail</a></td>
                        <?php $tot = $tot + $value['total_harga']; ?>
                        <!-- Buat button untuk menghapus produk dari tabel dengan tag td dan class Bootstrap -->
                <?php
                    $i++;
                }
            }
                ?>
                    </tr>
                    <!-- Buat baris total harga dengan tag tr -->
                  
        </table>


    </section>

    <footer style="position: absolute;"> &copy; 2023 DeliVer. All rights reserved.</footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="script.js"></script>

</body>

</html>