<?php

$hostname	= "localhost";
$username	= "root";
$password	= "";
$database	= "web_a";

$con = mysqli_connect($hostname, $username, $password, $database);

if ($con->connect_error) {
	echo "koneksi gagal ada error ini ". mysqli_error($con);
} 