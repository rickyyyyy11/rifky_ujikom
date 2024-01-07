<?php
//memanggil file koneksi.php
require "../../koneksi.php";

session_start();

//melakukan validasi apakah memiliki session atau tidak, jika tidak akan diarahkan ke halaman login
if (!isset($_SESSION['nama'])) {
    header("Location: ../../login.php?pesan=belum_login");
    exit();
}

if( isset($_GET['id']) ){

    // ambil username dari string id
    $username = $_GET['id'];

    //melakukan query hapus data berdasarkan username
    $sql = "DELETE FROM admin WHERE username='$username'";
    $result = mysqli_query($koneksi, $sql);

    //melakukan pengecekan query
    if( $result ) {
        // jika berhasil alihkan ke halaman index.php dengan status=sukses
        header('Location: index.php?status=sukses');
    } else {
        // jika gagal alihkan ke halaman index.php dengan status=gagal
        header('Location: index.php?status=gagal');
    }

}

?>