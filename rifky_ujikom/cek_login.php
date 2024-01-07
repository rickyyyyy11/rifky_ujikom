<?php

//memanggil file koneksi.php
require 'koneksi.php';
session_start();


if(isset($_POST['submit'])){
	$username = $_POST['username'];
	$password = $_POST['password'];

	//melakukan pengecekan jika username & password yang di-inputkan ada pada table user
	$sql="SELECT * FROM admin WHERE username='$username' AND password='$password'";
	$result = mysqli_query($koneksi, $sql);

	if($result->num_rows > 0){
		//jika ada, buat session dengan value username dan diarahkan ke halaman index admin
		$row = mysqli_fetch_assoc($result);
		$_SESSION['nama'] = $row['nama'];
		header("Location: admin/index.php");
		exit();
	}else{
		//jika tidak ada, dikembalikan ke halaman login dengan pesan gagal
		header("location:login.php?pesan=gagal");
	}
}

?>