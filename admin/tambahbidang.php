<?php

include "../koneksi.php";

$nama	  	= $_POST['nama'];

$query = "INSERT INTO bagian_bidang (nama_bidang) VALUES ('$nama')";

if (mysqli_query($con, $query)) {
	echo "<script>
	alert('Data berhasil ditambah')
	document.location = 'bagian.php'
	</script>";
}else{
	echo "Error : " . $query . "<br/>" . mysqli_error($con);
}