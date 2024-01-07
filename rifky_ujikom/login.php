<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Mini Market</title>
	<link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.css">
	<style type="text/css">
		.wrapper{
			width: 350px;
			margin: 0 auto;
		}
	</style>
</head>
<body>
	<div class="wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                	<?php

                	//melakukan pengecekan pesan notifikasi
			        if (isset($_GET['pesan'])) {
			            if ($_GET['pesan'] == "gagal") {
			                echo "<script>alert('Login gagal! username dan password salah!')</script>";
			            } else if ($_GET['pesan'] == "logout") {
			                echo "<script>alert('Anda telah berhasil logout')</script>";
			            } else if ($_GET['pesan'] == "belum_login") {
			                echo "<script>alert('Anda harus login untuk mengakses halaman admin')</script>";
			            }
			        }
			        ?>
                    <div class="page-header">
                    	<h1 style="text-align: center;">Login</h1>
                    </div>
                    <form method="POST" action="cek_login.php">
						<label>Username</label>
						<input type="username" name="username" placeholder="Username" autocomplete="off" class="form-control"><br>
						<label>Password</label>
						<input type="password" name="password" placeholder="Password" autocomplete="off" class="form-control"> <br>
						<input type="submit" name="submit" class="btn btn-success pull-right">
					</form>
                </div>
            </div>
        </div>
    </div>
</body>
</html>