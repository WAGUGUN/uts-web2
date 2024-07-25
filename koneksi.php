<?php

$host = "localhost";
$user = "root";
$pass = "";
$db = "gugun";

$conn = mysqli_connect($host, $user, $pass, $db);
if ($conn == false) {
  echo "Koneksi ke server gagal";
  die();
}
// echo "koneksi berhasil";