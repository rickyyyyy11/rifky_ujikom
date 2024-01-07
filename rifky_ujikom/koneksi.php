<?php

//membuat kelas untuk melakukan koneksi ke database
class koneksi{
	public function get_koneksi(){
		$conn = mysqli_connect("localhost","root","","db_rifkyfatah");
		
		//melakukan pengecekan koneksi
		if(mysqli_connect_errno()){
			echo "koneksi gagal : ".mysqli_connect_error();
		}
		return $conn;
	}
}

$konek = new koneksi();
$koneksi = $konek -> get_koneksi();

?>