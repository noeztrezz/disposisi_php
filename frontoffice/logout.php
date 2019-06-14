<?php
session_start(); // Start session nya
session_destroy(); // Hapus semua session
header("location: ../index.php"); // Redirect ke halaman login.php
?>