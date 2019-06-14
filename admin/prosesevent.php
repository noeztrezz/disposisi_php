<?php

include "../koneksi.php";

$id 					= $_POST['id'];
$title					= $_POST['title'];
$start					= $_POST['start'];
$end					= $_POST['end'];
$backgroundColor		= $_POST['backgroundColor'];

$query = "INSERT INTO events (title, start, end, backgroundColor, user_id) VALUES ('$title', '$start', '$end', '$backgroundColor', '$id')";

if (mysqli_query($con, $query)) {
	echo "<script>
	alert('Data berhasil ditambah')
	document.location = 'kalender.php'
	</script>";
}else{
	echo "Error : " . $query . "<br/>" . mysqli_error($con);
}