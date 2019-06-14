<?php
session_start();
include "../koneksi.php";

$id_proses		= $_SESSION['idpengirim'];
$id_surat		= $_POST['id_surat'];
$no_dinas		= $_POST['no_dinas'];
$idpengirim		= $_SESSION['idpenerima'];
$id_penerima	= $_POST['id_penerima'];
$catatan		= $_POST['catatan'];
$status			= "Menunggu Disposisi";
$tanggal 		= date("Y-m-d H:i:s");

$query = "UPDATE surat SET id_pengirim='".$idpengirim."', id_penerima='".$id_penerima."', status='".$status."', catatan='".$catatan."', no_dinas='".$no_dinas."' WHERE id_surat='".$id_surat."';";
$query .= "INSERT INTO dis_surat (id_surat, idpengirim, idpenerima, isi_disposisi, status, tanggal, id_proses)
VALUES ('$id_surat', '$idpengirim', '$id_penerima', '$catatan', '$status', '$tanggal', '$id_proses')";

if (mysqli_multi_query($con, $query)) {
	echo "<script>
	alert('Data berhasil dikirim')
	document.location = 'surat.php'
	</script>";
}else{
	echo "Error : " . $query . "<br/>" . mysqli_error($con);
}
mysqli_close($con);
?>