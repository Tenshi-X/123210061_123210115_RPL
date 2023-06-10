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
                    <li style="margin-left: 800px;"> <a href="history_admin.php">
            <img src="img/history.svg" alt="history">
          </a></li>
          <li> <a href="user_admin.php">
            <img src="img/accounts.svg" alt="user_admin">
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
                <th>ID user</th>
                <th>Nama</th>
                <th>Username</th>
                <th>Password</th>
                <th>Alamat</th>
                <th>No.hp</th>
                <th>Action</th>
            </tr>
            <?php
            $tot = 0;
           
           $dataUser = $konek->query("SELECT * FROM `user`");
            $i = 1;
            if ($dataUser->num_rows > 0) {
                while ($value = $dataUser->fetch_assoc()) {
            ?>
                    <!-- Buat baris data produk dengan tag tr -->
                    <tr class="product-row">
                        <!-- Buat kolom data produk dengan tag td -->
                        <td><?php echo $i ?>.</td>
                        <td class="id"><?php echo $value['id'] ?></td>
                        <td class="id_user"><?php echo $value['nama'] ?></td>
                        <td class="nama"><?php echo $value['username'] ?></td>
                        <td class="alamat"><?php echo $value['password'] ?></td>
                        <td> <?= $value['alamat'] ?></td>
                        <!-- Buat kolom untuk menampilkan subtotal harga dengan tag td dan class subtotal -->
                        <td class="tanggal"><?php echo $value['no_hp']; ?></td>
                        <td><a href="hapus_user.php?id=<?= $value['id'] ?>"class="btn btn-outline-danger" onclick="return confirm('Yakin Untuk Menghapus?');"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash3-fill" viewBox="0 0 16 16">
                <path d="M11 1.5v1h3.5a.5.5 0 0 1 0 1h-.538l-.853 10.66A2 2 0 0 1 11.115 16h-6.23a2 2 0 0 1-1.994-1.84L2.038 3.5H1.5a.5.5 0 0 1 0-1H5v-1A1.5 1.5 0 0 1 6.5 0h3A1.5 1.5 0 0 1 11 1.5Zm-5 0v1h4v-1a.5.5 0 0 0-.5-.5h-3a.5.5 0 0 0-.5.5ZM4.5 5.029l.5 8.5a.5.5 0 1 0 .998-.06l-.5-8.5a.5.5 0 1 0-.998.06Zm6.53-.528a.5.5 0 0 0-.528.47l-.5 8.5a.5.5 0 0 0 .998.058l.5-8.5a.5.5 0 0 0-.47-.528ZM8 4.5a.5.5 0 0 0-.5.5v8.5a.5.5 0 0 0 1 0V5a.5.5 0 0 0-.5-.5Z" />
              </svg></a></td>
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