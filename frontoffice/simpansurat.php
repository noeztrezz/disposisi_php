<?php
session_start();
include "../koneksi.php";

$id_proses		= $_SESSION['idpengirim'];
$idpengirim		= $_SESSION['idpenerima'];
$id_input		= $_POST['id_input'];
$judul			= $_POST['judul'];
$isi_singkat	= $_POST['isi_singkat'];
$jenis_surat	= $_POST['jenis_surat'];
$pengirim 		= $_POST['pengirim'];
$no_pengirim	= $_POST['no_pengirim'];
$namaFile 		= $_FILES['lampiran']['name'];
$namaSementara 	= $_FILES['lampiran']['tmp_name'];
//tentukan lokasi file akan dipindahkan
$dirUpload 		= "../upload/";
$target_file 	= $dirUpload.$namaFile;
//pindahkan file
$terupload 		= move_uploaded_file($namaSementara, $target_file);
$status			= "Belum Dikirim";
$tgl_surat		= $_POST['tanggal_surat'];
$tanggal 		= date("Y-m-d H:i:s");
$query = "INSERT INTO surat (judul, isi_singkat, jenis_surat, pengirim, no_pengirim, lampiran, status, id_input, tanggal_input, tanggal_surat) VALUES ('$judul', '$isi_singkat', '$jenis_surat', '$pengirim', '$no_pengirim', '$target_file', '$status', '$id_input', '$tanggal', '$tgl_surat')";

if (mysqli_query($con, $query)) {
	$last_id = $con->insert_id;
	$query2 = "INSERT INTO dis_surat (id_surat, idpengirim, status, tanggal, id_proses)
VALUES ('$last_id', '$idpengirim', '$status', '$tanggal', '$id_proses')";
	if (mysqli_query($con, $query2)) {
		echo "<script>
	alert('Data berhasil ditambah')
	document.location = 'surat.php'
	</script>";
	} else{
		echo "error";
	}
}else{
	echo "Error : " . $query . "<br/>" . mysqli_error($con);
}