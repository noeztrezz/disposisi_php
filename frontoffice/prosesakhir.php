<?php

include "../koneksi.php";

$id_surat		= $_POST['id_surat'];
$namaFile 		= $_FILES['surat_jadi']['name'];
$namaSementara 	= $_FILES['surat_jadi']['tmp_name'];
//tentukan lokasi file akan dipindahkan
$dirUpload 		= "../upload/";
$target_file 	= $dirUpload.$namaFile;
//pindahkan file
$terupload 		= move_uploaded_file($namaSementara, $target_file);
$status			= "Belum Validasi";
$catatan		= $_POST['catatan'];
$tanggal 		= date("Y-m-d");

$query = "UPDATE surat SET surat_jadi='".$target_file."', status='".$status."', tanggal_selesai='".$tanggal."', catatan='".$catatan."' WHERE id_surat='".$id_surat."'";

if (mysqli_query($con, $query)) {
	echo "Selamat Surat Anda sudah Diproses <br>";
	echo "Link: <a href='surat.php'>Klik Untuk Kembali</a><br/>";
}else{
	echo "Error : " . $query . "<br/>" . mysqli_error($con);
}