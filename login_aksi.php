<?php
session_start();
include 'koneksi.php';
$username = (mysqli_real_escape_string($konek, $_POST['username']));
$password = md5((mysqli_real_escape_string($konek, $_POST['password'])));
$login = mysqli_query($konek, "SELECT * from tbl_user where user_name='$username' and password='$password'");
$cek = mysqli_num_rows($login);
if ($cek > 0) {
	$data = mysqli_fetch_assoc($login);
	$_SESSION['user_name'] = $username;
	$_SESSION['status'] = $data['status'];
	header("location:master.php");
} else {
	header("location:index.php?pesan=gagal");
}
