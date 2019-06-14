<?php
session_start();
include "../koneksi.php";

$id_proses		= $_SESSION['idpengirim'];
$idpengirim		= $_SESSION['idpenerima'];
$id_surat		= $_POST['id_surat'];
$judul			= $_POST['judul'];
$isi_singkat	= $_POST['isi_singkat'];
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
$status2		= "Proses Ulang";
$tgl_surat		= $_POST['tanggal_surat'];
$tanggal 		= date("Y-m-d h:i:s");

$query = "UPDATE surat SET judul='".$judul."', isi_singkat='".$isi_singkat."', pengirim='".$pengirim."', no_pengirim='".$no_pengirim."', lampiran='".$target_file."', status='".$status."', tanggal_surat='".$tgl_surat."' where id_surat='".$id_surat."';";
$query .= "INSERT INTO dis_surat (id_surat, idpengirim, status, tanggal, id_proses)
VALUES ('$id_surat', '$idpengirim', '$status2', '$tanggal', '$id_proses')";

if (mysqli_multi_query($con, $query)) {
	echo "<script>
	alert('Data berhasil disimpan')
	document.location = 'surat.php'
	</script>";
}else{
	echo "Error : " . $query . "<br/>" . mysqli_error($con);
}
mysqli_close($con);
?>