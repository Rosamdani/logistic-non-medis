<?php
date_default_timezone_set('Asia/Jakarta');
$server = 'localhost';
$user = 'root';
$password = '';
$database = 'logistik_non_medis';
$konek = mysqli_connect ($server, $user, $password, $database);
if ($konek) {
	echo "";
} else {
	echo "Gagal Konek ke database";
}
