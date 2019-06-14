<?php

include "../koneksi.php";

$id 		= $_POST['id'];
$nip_nik	= $_POST['nip_nik'];
$jabatan	= $_POST['jabatan'];
$id_bag		= $_POST['provinsi'];
$id_sub		= $_POST['kota'];

$queryb = "UPDATE user SET nip_nik='".$nip_nik."', jabatan='".$jabatan."', id_bag='".$id_bag."', id_sub='".$id_sub."' WHERE id='".$id."'";

if (mysqli_query($con, $queryb)) {
	echo "<script>
	alert('Data berhasil diubah')
	document.location = 'user.php'
	</script>";
}else{
		echo "Error : " . $queryb . "<br/>" . mysqli_error($con);
	}
