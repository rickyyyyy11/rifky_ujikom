<?php
    //memanggil file koneksi.php
    require "../../koneksi.php";

    session_start();

    //melakukan validasi apakah memiliki session atau tidak, jika tidak akan diarahkan ke halaman login
    if (!isset($_SESSION['nama'])) {
        header("Location: ../../login.php?pesan=belum_login");
        exit();
    }

    //mengambil data untuk ditampilkan pada dropdown
    $query_admin = "SELECT username,password FROM admin";

    $result_admin = mysqli_query($koneksi, $query_admin);

    //untuk menginputkan data ke database
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $id_kasir = $_POST["id_kasir"];
        $nama_kasir = $_POST["nama_kasir"];
        $alamat = $_POST["alamat"];
        $telp = $_POST["telp"];
        $nomor_ktp = $_POST["nomor_ktp"];
        $username = $_POST["username"];
        $password = $_POST["password"];
        
        $insert_kasir = "INSERT INTO kasir (id_kasir, nama_kasir, alamat, telp, nomor_ktp, username, password) VALUES ('$id_kasir', '$nama_kasir', '$alamat', '$telp', '$nomor_ktp', '$username', '$password')";
        $result_kasir = mysqli_query($koneksi, $insert_kasir);

        $insert_admin = "INSERT INTO admin (username, password, nama) VALUES ('$username', '$password', '$nama_kasir')";
        $result_insadmin = mysqli_query($koneksi, $insert_admin);

        if( $result_kasir && $result_insadmin == 1 ) {
        // jika berhasil alihkan ke halaman index.php dengan status=sukses
        header('Location: index.php?status=sukses');
        } else {
            // jika gagal alihkan ke halaman index.php dengan status=gagal
            header('Location: index.php?status=gagal');        }
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
    <a href="../kasir/index.php" class="btn btn-danger pull-left"><</a>
    <div class="wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="page-header">
                        <h2>Tambah Data</h2>
                    </div>
                    <form method="POST">
                        <label>ID Kasir:</label>
                        <input type="number" name="id_kasir" placeholder="ID Kasir" autocomplete="off" class="form-control"><br>
                        <label>Nama Kasir:</label><br>
                        <input type="text" name="nama_kasir" placeholder="Nama Kasir" autocomplete="off" class="form-control"><br>
                        <label>Alamat:</label><br>
                        <input type="text" name="alamat" placeholder="Alamat" autocomplete="off" class="form-control"><br>
                        <label>Telpon:</label><br>
                        <input type="text" name="telp" placeholder="Telpon" autocomplete="off" class="form-control"><br>
                        <label>Nomor KTP:</label><br>
                        <input type="text" name="nomor_ktp" placeholder="Nomor KTP" autocomplete="off" class="form-control"><br>
                        <label>Username:</label><br>
                        <input type="text" name="username" placeholder="Username" autocomplete="off" class="form-control"><br>
                        <label>Password:</label><br>
                        <input type="text" name="password" placeholder="Password" autocomplete="off" class="form-control"><br>

                        <input type="submit" name="submit" class="btn btn-success pull-right">
                    </form>
                </div>
            </div>
        </div>
    </div>
</body>
</html>