<?php

include "../koneksi.php";

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

$query = "INSERT INTO user (nama_user, ttl, alamat, nip_nik, jabatan, id_bag, id_sub, telepon,  email, username, password,  foto_user) VALUES ('$nama','$ttl','$alamat', '$nip_nik', '$jabatan', '$id_bag', '$id_sub', '$telepon', '$email','$username', '$password', '$target_file')";

if (mysqli_query($con, $query)) {
	echo "Data berhasil ditambah dan menunggu konfirmasi. Silahkan klik link dibawah untuk melihat status surat. <br>";
	echo "Link: <a href=user.php>kembali</a>";
}else{
	echo "Error : " . $query . "<br/>" . mysqli_error($con);
}