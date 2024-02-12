<?php 
$conn = new mysqli("localhost", "root", "", "penyewaan");

if ($conn->connect_errno) {
  echo "Koneksi Gagal, silahkan coba lihat DB: " . $conn->connect_error;
  exit();
}

function query($sql) {
  global $conn;
  return $conn->query($sql);
}

?>