<?php
//memanggil file koneksi.php
require "../../koneksi.php";
session_start();

//melakukan validasi apakah memiliki session atau tidak, jika tidak akan diarahkan ke halaman login
if (!isset($_SESSION['nama'])) {
    header("Location: ../../login.php?pesan=belum_login");
    exit();
}

//menambahkan data yang diinputkan ke database
if(isset($_POST['submit'])){
    $nama = $_POST['nama'];
    $username = $_POST['username'];
    $password = $_POST['password'];

    //melakukan query tambah data
    $sql="INSERT INTO admin (nama, username, password) VALUES ('$nama','$username', '$password')";
    $result = mysqli_query($koneksi, $sql);

    if( $result ) {
        // jika berhasil alihkan ke halaman index.php dengan status=sukses
        header('Location: index.php?status=sukses');
    } else {
        // jika gagal alihkan ke halaman index.php dengan status=gagal
        header('Location: index.php?status=gagal');
    }
}
?>