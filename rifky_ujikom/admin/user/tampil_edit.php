<?php
//memanggil file koneksi.php
require "../../koneksi.php";

session_start();

//melakukan validasi apakah memiliki session atau tidak, jika tidak akan diarahkan ke halaman login
if (!isset($_SESSION['nama'])) {
    header("Location: ../../login.php?pesan=belum_login");
    exit();
}

//jika tidak ada username pada query string, dikembalikan ke index.php
if( !isset($_GET['id']) ){
    header('Location: index.php');
}

//ambil username dari query string
$uname_lama = $_GET['id'];

//buat query untuk ambil data dari database berdasarkan id
$sql = "SELECT * FROM admin WHERE username ='$uname_lama'";
$result = mysqli_query($koneksi, $sql);
$user = mysqli_fetch_assoc($result);

//jika data yang di-edit tidak ditemukan
if( mysqli_num_rows($result) < 1 ){
    die("data tidak ditemukan...");
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
                        <h2>Ubah Data</h2>
                    </div>
                    
                    <form method="POST" action="edit.php">
                        <input type="hidden" name="uname_lama" value="<?php echo $uname_lama; ?>">
                        <label>Nama</label>
                        <input type="text" name="nama" placeholder="Nama" autocomplete="off" class="form-control" value="<?php echo $user['nama'] ?>"> <br>
                        <label>Username</label>
                        <input type="text" name="username" placeholder="Username" autocomplete="off" class="form-control" value="<?php echo $user['username'] ?>"> <br>
                        <label>Password</label>
                        <input type="password" name="password" placeholder="Password" autocomplete="off" class="form-control" value="<?php echo $user['password'] ?>"> <br>
                        <input type="submit" name="submit" class="btn btn-success pull-right">
                    </form>
                </div>
            </div>
        </div>
    </div>
</body>
</html>