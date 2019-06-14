<?php
session_start();
include "../koneksi.php";
$id_proses		= $_SESSION['idpengirim'];
$idpengirim		= $_SESSION['idpenerima'];
$id_surat		= $_POST['id_surat'];
$namaFile 		= $_FILES['surat_jadi']['name'];
$namaSementara 	= $_FILES['surat_jadi']['tmp_name'];
//tentukan lokasi file akan dipindahkan
$dirUpload 		= "../upload/";
$target_file 	= $dirUpload.$namaFile;
//pindahkan file
$terupload 		= move_uploaded_file($namaSementara, $target_file);
$status			= "Selesai";
$catatan		= $_POST['catatan'];
$tanggal 		= date("Y-m-d");
$waktu 		= date("Y-m-d H:i:s");

$query = "UPDATE surat SET surat_jadi='".$target_file."', status='".$status."', tanggal_selesai='".$tanggal."', catatan='".$catatan."' WHERE id_surat='".$id_surat."';";
$query .= "INSERT INTO dis_surat (id_surat, idpengirim, idpenerima, isi_disposisi, status, tanggal, id_proses)
VALUES ('$id_surat', '$idpengirim', '$idpengirim', '$catatan', '$status', '$waktu', '$id_proses')";

if (mysqli_multi_query($con, $query)) {
	echo "<script>
	alert('Data berhasil diproses. Selamat!')
	document.location = 'surat.php'
	</script>";
}else{
	echo "Error : " . $query . "<br/>" . mysqli_error($con);
}
mysqli_close($con);
?>