<?php
session_start();

//melakukan validasi apakah memiliki session atau tidak, jika tidak akan diarahkan ke halaman login
if (!isset($_SESSION['nama'])) {
    header("Location: ../../login.php?pesan=belum_login");
    exit();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>UJIKOM</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.css">
    <style type="text/css">
        .wrapper{
            width: 500px;
            margin: 0 auto;
        }
    </style>
</head>
<body>
    <a href="../user/index.php" class="btn btn-danger pull-left"><</a>
    <div class="wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="page-header">
                        <h2>Tambah Data</h2>
                    </div>
                    <form method="POST" action="add.php">
                        <label>Nama</label>
                        <input type="text" name="nama" placeholder="Nama" autocomplete="off" class="form-control"> <br>
                        <label>Username</label>
                        <input type="text" name="username" placeholder="Username" autocomplete="off" class="form-control"> <br>
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