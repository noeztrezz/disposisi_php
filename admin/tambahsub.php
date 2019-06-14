<?php

include "../koneksi.php";

$id_bidang		= $_POST['id_bidang'];
$nama_sub	  	= $_POST['nama_sub'];

$query = "INSERT INTO sub_bidang (nama_sub, id_bidang) VALUES ('$nama_sub', '$id_bidang')";

if (mysqli_query($con, $query)) {
	echo "<script>
	alert('Data berhasil ditambah')
	document.location = 'bagian.php'
	</script>";
}else{
	echo "Error : " . $query . "<br/>" . mysqli_error($con);
}