<?php
session_start();

//melakukan validasi apakah memiliki session atau tidak, jika tidak akan diarahkan ke halaman login
if (!isset($_SESSION['nama'])) {
	header("Location: ../login.php?pesan=belum_login");
	exit();
}
?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Mini Market</title>
	<link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.css">
	<style type="text/css">
		.wrapper{
			width: 800px;
			margin: 0 auto;
		}
	</style>
</head>
<body>
	<div class="wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                	<div class="page-header">
                		<a href="logout.php"><button class="btn btn-danger pull-right">Logout</button></a> 
                    	<h2>Selamat Datang, <?php echo $_SESSION['nama'];?></h2>
                    </div>
                    <h4>Master</h4>
					<a href="kasir/index.php"><button class="btn btn-success">Data Kasir</button></a>
					<!-- <a href="user/index.php"><button class="btn btn-success">Kelola Data User</button></a> -->
					<a href="barang/index.php"><button class="btn btn-success">Data Barang</button></a> 
					<!-- <a href="matpel/index.php"><button class="btn btn-success">Data Mata Pelajaran</button></a>  -->
					<a href="penjualan/index.php"><button class="btn btn-success">Data Penjualan</button></a>
					<!-- <a href="user/index.php"><button class="btn btn-success">Kelola Data User</button></a> -->
					<!-- <a href="kelas/index.php"><button class="btn btn-success">Data Kelas</button></a>  -->
                    <!-- <h4>Transaksi</h4>
					<a href="absen/index.php"><button class="btn btn-success">Data Absen</button></a> 
					<a href="nilai/index.php"><button class="btn btn-success">Data Nilai</button></a> 
					<h4>Pengaturan</h4>
					  -->
			</div>
        </div>
    </div>
</body>
</html>