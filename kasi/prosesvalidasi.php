<?php
session_start();
include "../koneksi.php";

$id_proses		= $_SESSION['idpengirim'];
$idpengirim		= $_SESSION['idpenerima'];
$id_surat		= $_POST['id_surat'];
$status			= "Sedang diproses pegawai";
$pegawai		= "ya";
$catatan		= $_POST['catatan'];
$tanggal 		= date("Y-m-d H:i:s");

$query = "UPDATE surat SET status='".$status."', catatan='".$catatan."', pegawai='".$pegawai."' WHERE id_surat='".$id_surat."';";
$query .= "INSERT INTO dis_surat (id_surat, idpengirim, idpenerima, isi_disposisi, status, tanggal, id_proses)
VALUES ('$id_surat', '$idpengirim', '$idpengirim', '$catatan', '$status', '$tanggal', '$id_proses')";

if (mysqli_multi_query($con, $query)) {
	echo "<script>
	alert('Data berhasil di validasi')
	document.location = 'surat.php'
	</script>";
}else{
	echo "Error : " . $query . "<br/>" . mysqli_error($con);
}
mysqli_close($con);
?>