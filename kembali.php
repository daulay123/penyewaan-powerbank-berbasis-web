<?php 
$id_transaksi = $_GET['id'];
$id_stok_powerbank = $_GET['nama'];
$id_barang = $_GET['id_barang'];

$conn->query("UPDATE tb_transaksi SET status = 'kembali' WHERE id_transaksi = $id_transaksi") or die(mysqli_error($conn));

$conn->query("UPDATE tb_powerbank SET jumlah_stok = (jumlah_stok+1) WHERE id_barang = '$id_barang'") or die(mysqli_error($conn));

	echo "<script>alert('Proses, kembalian powerbank berhasil.');window.location='?p=transaksi';</script>";

?>