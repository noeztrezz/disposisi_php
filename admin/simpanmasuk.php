<?php

include "../koneksi.php";

$judul  	= $_POST['judul'];
$tempat		= $_POST['tempat'];
$mulai		= $_POST['mulai'];
$selesai	= $_POST['selesai'];

$query = "INSERT INTO agenda (judul, mulai, selesai, tempat) VALUES ('$judul','$mulai','$selesai', '$tempat')";

if (mysqli_query($con, $query)) {
	echo "Data berhasil ditambah dan menunggu konfirmasi. Silahkan klik link dibawah untuk melihat status surat.";
	echo "Link: <a href=kalender.php>kembali</a>";
}else{
	echo "Error : " . $query . "<br/>" . mysqli_error($con);
}