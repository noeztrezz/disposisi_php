<?php

include "../koneksi.php";

$title					= $_POST['title'];
$start					= $_POST['start'];
$end					= $_POST['end'];
$backgroundColor		= $_POST['backgroundColor'];

$query = "INSERT INTO events (title, start, end, backgroundColor) VALUES ('$title', '$start', '$end', '$backgroundColor')";

if (mysqli_query($con, $query)) {
	echo "<script>
	alert('Data berhasil ditambah')
	document.location = 'kalender.php'
	</script>";
}else{
	echo "Error : " . $query . "<br/>" . mysqli_error($con);
}