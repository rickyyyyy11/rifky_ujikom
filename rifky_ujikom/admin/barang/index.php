<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Mini Market</title>
    <link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.24/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.js"></script>
    <style type="text/css">
        .wrapper{
            width: 900px;
            margin: 0 auto;
        }
        .page-header h2{
            margin-top: 0;
        }
        table tr td:last-child a{
            margin-right: 15px;
        }
    </style>
    <script type="text/javascript">
        $(document).ready(function(){
            $('[data-toogle="tooltip"]').tooltip();
        });
    </script>
</head>
<body>
    <a href="../index.php" class="btn btn-danger pull-left"><</a>
    <div class="wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="page-header clearfix">
                        <h2 class="pull-left">Informasi Barang</h2>
                        <a href="tampil_add.php" class="btn btn-success pull-right">Tambah Baru</a>
                    </div>
                    <?php
                    //memanggil file koneksi.php
                    require "../../koneksi.php";

                    //membuat variabel untuk dijadikan angka row tabel
                    $i = 1;

                    session_start();

                    //melakukan validasi apakah memiliki session atau tidak, jika tidak akan diarahkan ke halaman login
                    if (!isset($_SESSION['nama'])) {
                        header("Location: ../../login.php?pesan=belum_login");
                        exit();
                    }

                    //melakukan pengecekan pesan notifikasi
                    if (isset($_GET['status'])) {
                        if ($_GET['status'] == "sukses") {
                            echo "<script>alert('Record berhasil berubah')</script>";
                        } else if ($_GET['status'] == "gagal") {
                            echo "<script>alert('Record gagal berubah')</script>";
                        }
                    }

                    //menampilkan data pada tabel kelas
                    $sql = "SELECT
                                g.id_barang,
                                g.nama_barang,
                                g.satuan,
                                g.harga_satuan
                            FROM
                                barang g";
                    if($result = mysqli_query($koneksi, $sql)){
                        if(mysqli_num_rows($result) > 0){
                            echo "<table class='table table-bordered table-striped'>";
                                echo "<thead>";
                                    echo "<tr>";
                                        echo "<th>#</th>";
                                        echo "<th>ID Barang</th>";
                                        echo "<th>Nama Barang</th>";
                                        echo "<th>Satuan</th>";
                                        echo "<th>Harga Satuan</th>";
                                        echo "<th>Edit</th>";
                                        echo "<th>Delete</th>";
                                    echo "</tr>";
                                echo "</thead>";
                                echo "<tbody>";
                                while($row = mysqli_fetch_array($result)){
                                    echo "<tr>";
                                        echo "<td>" . $i; $i++ . "</td>";
                                        echo "<td>" . $row['id_barang'] . "</td>";
                                        echo "<td>" . $row['nama_barang'] . "</td>";
                                        echo "<td>" . $row['satuan'] . "</td>";
                                        echo "<td>" . $row['harga_satuan'] . "</td>";
                                        echo "<td><a href='tampil_edit.php?id=". $row['id_barang'] ."' title='Update Data' data-toggle='tooltip'><span class='glyphicon glyphicon-pencil'></span></a></td>";
                                        echo "<td><a href='delete.php?id=". $row['id_barang'] ."' title='Delete Data' data-toggle='tooltip'><span class='glyphicon glyphicon-trash'></span></a></td>";
                                    echo "</tr>";
                                }
                                echo "</tbody>";
                            echo "</table>";

                            //membersihkan value dari variabel result pada memory
                            mysqli_free_result($result);
                        } else{
                            echo "<p class='lead'><em>Tidak ada data ditemukan.</em></p>";
                        }
                    } else{
                        echo "ERROR: " . mysqli_error($koneksi);
                    }

                    // menutup koneksi ke database
                    mysqli_close($koneksi);
                    ?>

                </div>
            </div>
        </div>
    </div>
</body>
</html>