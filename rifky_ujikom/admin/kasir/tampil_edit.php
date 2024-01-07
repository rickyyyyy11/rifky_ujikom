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
    $query_kelas = "SELECT kd_kelas,nm_kelas FROM kelas";
    $query_admin = "SELECT username,password FROM admin";

    $result_kelas = mysqli_query($koneksi, $query_kelas);
    $result_admin = mysqli_query($koneksi, $query_admin);

    //ambil id dari query string
    if (isset($_GET['id'])) {
        $kd_lama = $_GET['id'];

        //ambil data yang akan diubah
        $edit_query = "SELECT * FROM kasir WHERE id_kasir = '$kd_lama'";
        $edit_result = mysqli_query($koneksi, $edit_query);
        $edit_row = mysqli_fetch_assoc($edit_result);

        if( mysqli_num_rows($edit_result) < 1 ){
        die("data tidak ditemukan...");
    }
    }

    //untuk menginputkan data ke database
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $id_kasir = $_POST["id_kasir"];
        $nama_kasir = $_POST["nama_kasir"];
        $alamat = $_POST["alamat"];
        $telp = $_POST["telp"];
        $nomor_ktp = $_POST["nomor_ktp"];
        $username = $_POST["username"];
        $password = $_POST["password"];

        $update_kasir = "UPDATE kasir SET id_kasir = '$id_kasir', nama_kasir = '$nama_kasir', alamat= '$alamat', telp= '$telp', nomor_ktp= '$nomor_ktp', username= '$username', password= '$password' WHERE id_kasir = '$kd_lama'";
        $result_kasir = mysqli_query($koneksi, $update_query);

        $update_admin = "UPDATE admin SET username = '$username', password = '$password', nama = '$nama'  WHERE id_kasir = '$kd_lama'";
        $result_admin = mysqli_query($koneksi, $update_query);

        if( $result_kasir && $result_admin == 1 ) {
            // jika berhasil alihkan ke halaman index.php dengan status=sukses
            header('Location: index.php?status=sukses');
        } else {
            // jika gagal alihkan ke halaman indek.php dengan status=gagal
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
    <a href="../kasir/index.php" class="btn btn-danger pull-left"><</a>
    <div class="wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="page-header">
                        <h2>Ubah Data</h2>
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