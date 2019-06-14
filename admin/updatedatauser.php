<?php

include "../koneksi.php";

$id 		= $_POST['id'];
$nama		= $_POST['nama'];
$ttl		= $_POST['ttl'];
$alamat		= $_POST['alamat'];
$nip_nik	= $_POST['nip_nik'];
$jabatan	= $_POST['jabatan'];
$id_bag		= $_POST['provinsi'];
$id_sub		= $_POST['kota'];
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
	$querya = "UPDATE user SET nama_user='".$nama."', ttl='".$ttl."', alamat='".$alamat."', nip_nik='".$nip_nik."', jabatan='".$jabatan."', id_bag='".$id_bag."', id_sub='".$id_sub."', telepon='".$telepon."', email='".$email."', username='".$username."', password='".$password."' WHERE id='".$id."'";
	if (mysqli_query($con, $querya)) {
	echo "Data tanpa foto berhasil diubah <br>";
	echo "Link: <a href='user.php'>Klik Untuk Kembali</a><br/>";
	}else{
		echo "Error : " . $querya . "<br/>" . mysqli_error($con);
	}

}else{
	$queryb = "UPDATE user SET nama_user='".$nama."', ttl='".$ttl."', alamat='".$alamat."', nip_nik='".$nip_nik."', jabatan='".$jabatan."', id_bag='".$id_bag."', id_sub='".$id_sub."', telepon='".$telepon."', email='".$email."', username='".$username."', password='".$password."', foto_user='".$target_file."' WHERE id='".$id."'";
	if (mysqli_query($con, $queryb)) {
	echo "<script>
	alert('Data berhasil diubah')
	document.location = 'data_sinopsis.php'
	</script>";
	}else{
		echo "Error : " . $queryb . "<br/>" . mysqli_error($con);
	}
}