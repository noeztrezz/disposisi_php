<?php

include "../koneksi.php";

$id 		= $_POST['id'];
$nama		= $_POST['nama'];
$ttl		= $_POST['ttl'];
$alamat		= $_POST['alamat'];
$nip_nik	= $_POST['nip_nik'];
$telepon	= $_POST['telepon'];
$email		= $_POST['email'];
$username	= $_POST['username'];
$password	= $_POST['password'];
$namaFile 		= $_FILES['foto']['name'];
$namaSementara 	= $_FILES['foto']['tmp_name'];
//tentukan lokasi file akan dipindahkan
$dirUpload = "../upload/";
$target_file = $dirUpload.$namaFile;
//pindahkan file
$terupload = move_uploaded_file($namaSementara, $target_file);

$query = "UPDATE user set nama_user='".$nama."', ttl='".$ttl."', alamat='".$alamat."', nip_nik='".$nip_nik."', telepon='".$telepon."', email='".$email."', username='".$username."', password='".$password."', foto_user='".$target_file."'";

if (mysqli_query($con, $query)) {
	echo "<script>
	alert('Data berhasil diubah')
	document.location = 'profil.php'
	</script>";
}else{
	echo "Error : " . $query . "<br/>" . mysqli_error($con);
}