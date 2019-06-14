
<?php 
// mengaktifkan session pada php
session_start();

// menghubungkan php dengan koneksi database
include 'koneksi.php';

// menangkap data yang dikirim dari form login
$username = $_POST['username'];
$password = $_POST['password'];


// menyeleksi data user dengan username dan password yang sesuai
$login = mysqli_query($con,"select * from v_user where username='$username' and password='$password'");
// menghitung jumlah data yang ditemukan
$cek = mysqli_num_rows($login);

// cek apakah username dan password di temukan pada database
if($cek > 0){

	$aja = mysqli_fetch_assoc($login);

	// cek jika user login sebagai admin
	if($aja['jabatan']=="Admin"){

		// buat session login dan username
		$_SESSION['username'] = $username;
		$_SESSION['jabatan'] = $aja['jabatan'];
		$_SESSION['idpengirim'] = $aja['id'];
		$_SESSION['idpenerima'] = $aja['id_sub'];
		// alihkan ke halaman dashboard admin
		header("location:admin/index.php");

	// cek jika user login sebagai pegawai
	}else if($aja['jabatan']=="Kepala Dinas"){
		// buat session login dan username
		$_SESSION['username'] = $username;
		$_SESSION['jabatan'] = $aja['jabatan'];
		$_SESSION['idpengirim'] = $aja['id'];
		$_SESSION['idpenerima'] = $aja['id_sub'];
		$_SESSION['id_disposisi'] = $aja['id_bag'];
		// alihkan ke halaman dashboard pegawai
		header("location:kadis/index.php");

	}else if($aja['jabatan']=="Sekretaris"){
		// buat session login dan username
		$_SESSION['username'] = $username;
		$_SESSION['jabatan'] = $aja['jabatan'];
		$_SESSION['idpengirim'] = $aja['id'];
		$_SESSION['idpenerima'] = $aja['id_sub'];
		$_SESSION['id_disposisi'] = $aja['id_bag'];
		// alihkan ke halaman dashboard pegawai
		header("location:sekretaris/index.php");

	// cek jika user login sebagai pegawai
	}else if($aja['jabatan']=="Kepala Bidang"){
		// buat session login dan username
		$_SESSION['username'] = $username;
		$_SESSION['jabatan'] = $aja['jabatan'];
		$_SESSION['idpengirim'] = $aja['id'];
		$_SESSION['idpenerima'] = $aja['id_sub'];
		$_SESSION['id_disposisi'] = $aja['id_bag'];
		// alihkan ke halaman dashboard pegawai
		header("location:kabid/index.php");
	
	// cek jika user login sebagai pegawai
	}else if($aja['jabatan']=="Kepala Seksi"){
		// buat session login dan username
		$_SESSION['username'] = $username;
		$_SESSION['jabatan'] = $aja['jabatan'];
		$_SESSION['idpengirim'] = $aja['id'];
		$_SESSION['idpenerima'] = $aja['id_sub'];
		$_SESSION['id_disposisi'] = $aja['id_bag'];
		// alihkan ke halaman dashboard pegawai
		header("location:kasi/index.php");
	
	// cek jika user login sebagai pegawai
	}else if($aja['jabatan']=="Pegawai"){
		// buat session login dan username
		$_SESSION['username'] = $username;
		$_SESSION['jabatan'] = $aja['jabatan'];
		$_SESSION['idpengirim'] = $aja['id'];
		$_SESSION['idpenerima'] = $aja['id_sub'];
		$_SESSION['id_disposisi'] = $aja['id_bag'];
		// alihkan ke halaman dashboard pegawai
		header("location:pegawai/index.php");

	}else if($aja['jabatan']=="Front Office"){
		// buat session login dan username
		$_SESSION['username'] = $username;
		$_SESSION['jabatan'] = $aja['jabatan'];
		$_SESSION['idpengirim'] = $aja['id'];
		$_SESSION['idpenerima'] = $aja['id_sub'];
		$_SESSION['id_disposisi'] = $aja['id_bag'];
		// alihkan ke halaman dashboard pegawai
		header("location:frontoffice/index.php");
	
	}else if($aja['jabatan']=="Tata Usaha"){
		// buat session login dan username
		$_SESSION['username'] = $username;
		$_SESSION['jabatan'] = $aja['jabatan'];
		$_SESSION['idpengirim'] = $aja['id'];
		$_SESSION['idpenerima'] = $aja['id_sub'];
		$_SESSION['id_disposisi'] = $aja['id_bag'];
		// alihkan ke halaman dashboard pegawai
		header("location:tu/index.php");

	}else{

		// alihkan ke halaman login kembali
		header("location:index.php?pesan=gagal");
	}	
}else{
	header("location:index.php?pesan=gagal");
}

?>