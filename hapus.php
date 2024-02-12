<?php 

$id_barang = $_GET['id'];

$conn->query("DELETE FROM tb_powerbank WHERE id_barang = $id_barang") or die(mysqli_error($conn));
echo "<script>alert('Data Berhasil Dihapus.');window.location='?p=powerbank';</script>";

?>