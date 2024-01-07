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
        $id_barang = $_POST["id_barang"];
        $nama_barang = $_POST["nama_barang"];
        $satuan = $_POST["satuan"];
        $harga_satuan = $_POST["harga_satuan"];
        
        $insert_query = "INSERT INTO barang (id_barang, nama_barang, satuan, harga_satuan) VALUES ('$id_barang', '$nama_barang', '$satuan', '$harga_satuan')";
        $result = mysqli_query($koneksi, $insert_query);

        if( $result ) {
        // jika berhasil alihkan ke halaman index.php dengan status=sukses
        header('Location: index.php?status=sukses');
        } else {
            // jika gagal alihkan ke halaman index.php dengan status=gagal
            header('Location: index.php?status=gagal');
        }
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
    <a href="../barang/index.php" class="btn btn-danger pull-left"><</a>
    <div class="wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="page-header">
                        <h2>Tambah Data</h2>
                    </div>
                    <form method="POST">
                        <label>ID Barang:</label>
                        <input type="number" name="id_barang" placeholder="ID Barang" autocomplete="off" class="form-control"><br>
                        <label>Nama Barang:</label><br>
                        <input type="text" name="nama_barang" placeholder="Nama Barang" autocomplete="off" class="form-control"><br>
                        <label>Satuan:</label><br>
                        <input type="text" name="satuan" placeholder="Satuan" autocomplete="off" class="form-control"><br>
                        <label>Harga Satuan:</label><br>
                        <input type="text" name="harga_satuan" placeholder="Harga Satuan" autocomplete="off" class="form-control"><br>

                        <input type="submit" name="submit" class="btn btn-success pull-right">
                    </form>
                </div>
            </div>
        </div>
    </div>
</body>
</html>