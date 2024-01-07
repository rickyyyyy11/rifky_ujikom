<?php
    //memanggil file koneksi.php
    require "../../koneksi.php";

    session_start();

    //melakukan validasi apakah memiliki session atau tidak, jika tidak akan diarahkan ke halaman login
    if (!isset($_SESSION['nama'])) {
        header("Location: ../../login.php?pesan=belum_login");
        exit();
    }
    //untuk menginputkan data ke database
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $id_penjualan   = $_POST['id_penjualan'];
        $tanggal        = $_POST['tanggal'];
        $total          = $_POST['total'];
        $kasir          = $_POST['kasir'];
        
        mysqli_query($koneksi, "INSERT INTO rf_penjualan VALUES ('$id_penjualan', '$tanggal', '$total', '$kasir')");
        header("location:index.php");
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Mini Market</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.css">
    <style type="text/css">
        .wrapper{
            width: 500px;
            margin: 0 auto;
        }
    </style>
</head>
<body>
    <a href="index.php" class="btn btn-danger pull-left"><</a>
    <div class="wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="page-header">
                        <h2>Tambah Data</h2>
                    </div>
                    <form method="POST">
                        <label>ID Penjualan:</label>
                        <input type="number" name="id_penjualan" placeholder="ID Penjualan" autocomplete="off" class="form-control"><br>
                        <label>Tanggal</label><br>
                        <input type="datetime-local" name="tanggal" placeholder="Nama Barang" autocomplete="off" class="form-control"><br>
                        <label>Total:</label><br>
                        <input type="text" name="total" placeholder="Total" autocomplete="off" class="form-control"><br>
                        <label>ID Kasir:</label><br>
                        <select name="kasir" autocomplete="off" class="form-control">
                            <?php
                            $sql_kasir = mysqli_query($koneksi, "SELECT id_kasir, nama_kasir FROM kasir");
                            while ($data_kasir = mysqli_fetch_array($sql_kasir)) {
                                ?>
                                <option value="<?= $data_kasir['id_kasir'] ?>"><?= $data_kasir['id_kasir'] . ' - ' . $data_kasir['nama_kasir']; ?></option>
                                <?php
                            }
                            ?>
                        </select>

                        <input type="submit" name="submit" class="btn btn-success pull-right">
                    </form>
                </div>
            </div>
        </div>
    </div>
</body>
</html>