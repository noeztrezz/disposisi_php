<?php
session_start();
include "../koneksi.php";

$id_proses		= $_SESSION['idpengirim'];
$id_surat		= $_POST['id_surat'];
$idpengirim		= $_SESSION['idpenerima'];
$id_penerima	= $_POST['id_penerima'];
$isi_disposisi	= $_POST['isi_disposisi'];
$status			= "Sedang Diproses";
$tanggal 		= date("Y-m-d H:i:s");

$query = "UPDATE surat SET id_pengirim='".$idpengirim."', id_penerima='".$id_penerima."', status='".$status."', catatan='".$isi_disposisi."' WHERE id_surat='".$id_surat."';";
$query .= "INSERT INTO dis_surat (id_surat, idpengirim, idpenerima, isi_disposisi, status, tanggal, id_proses)
VALUES ('$id_surat', '$idpengirim', '$id_penerima', '$isi_disposisi', '$status', '$tanggal', '$id_proses')";

if (mysqli_multi_query($con, $query)) {
	echo "<script>
	alert('Surat berhasil di Disposisi')
	document.location = 'surat.php'
	</script>";
}else{
	echo "Error : " . $query . "<br/>" . mysqli_error($con);
}
mysqli_close($con);
?>