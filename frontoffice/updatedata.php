<?php

include "../koneksi.php";

$id 		= $_POST['id'];
$nama		= $_POST['nama'];
$ttl		= $_POST['ttl'];
$alamat		= $_POST['alamat'];
$telepon	= $_POST['telepon'];
$email		= $_POST['email'];
$username	= $_POST['username'];
$password	= $_POST['password'];
$namaFile 		= $_FILES['foto']['name'];
$namaSementara 	= $_FILES['foto']['tmp_name'];
//tentukan lokasi file akan dipindahkan
$dirUpload 		= "../upload/";
$target_file 	= $dirUpload.$namaFile;
//pindahkan file
$terupload 		= move_uploaded_file($namaSementara, $target_file);

if (isset($_POST['foto'])) {
	$querya = "UPDATE user SET nama_user='".$nama."', ttl='".$ttl."', alamat='".$alamat."', telepon='".$telepon."', email='".$email."', username='".$username."', password='".$password."' WHERE id='".$id."'";
	if (mysqli_query($con, $querya)) {
	echo "<script>
	alert('Data berhasil diubah')
	document.location = 'surat.php'
	</script>";
	}else{
		echo "Error : " . $querya . "<br/>" . mysqli_error($con);
	}

}else{
	$queryb = "UPDATE user SET nama_user='".$nama."', ttl='".$ttl."', alamat='".$alamat."', telepon='".$telepon."', email='".$email."', username='".$username."', password='".$password."', foto_user='".$target_file."' WHERE id='".$id."'";
	if (mysqli_query($con, $queryb)) {
	echo "<script>
	alert('Data berhasil diubah')
	document.location = 'profil.php'
	</script>";
	}else{
		echo "Error : " . $queryb . "<br/>" . mysqli_error($con);
	}
}