<?php 
/// edit sesuai dengan settingan database
$hostname	= "localhost";
$username	= "root";
$password	= "";
$database	= "combo_box";

$conn = mysqli_connect($hostname, $username, $password, $database);

if ($conn->connect_error) {
	echo "Gagal koneksi ke database";
}
?>