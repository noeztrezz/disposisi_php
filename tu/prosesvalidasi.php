<?php
session_start();
include "../koneksi.php";

$id_proses		= $_SESSION['idpengirim'];
$id_surat		= $_POST['id_surat'];
$idpengirim		= $_SESSION['idpenerima'];
$sql = $con->query("SELECT * FROM surat WHERE id_surat=".$id_surat);
          $sin = mysqli_fetch_array($sql);
$idpenerima		= $sin['id_pengirim'];
$status			= "Ditolak";
$catatan		= $_POST['catatan'];
$tanggal 		= date("Y-m-d H:i:s");

$query = "UPDATE surat SET status='".$status."', catatan='".$catatan."', id_pengirim='".$idpengirim."', id_penerima='".$idpenerima."' WHERE id_surat='".$id_surat."';";
$query .= "INSERT INTO dis_surat (id_surat, idpengirim, idpenerima, isi_disposisi, status, tanggal, id_proses)
VALUES ('$id_surat', '$idpengirim', '$idpenerima', '$catatan', '$status', '$tanggal', '$id_proses')";

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