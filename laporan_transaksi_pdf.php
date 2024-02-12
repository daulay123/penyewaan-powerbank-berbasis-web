<?php 
ob_start();
require_once '../config/koneksi.php';
require_once '../assets/vendor/autoload.php';

use Spipu\Html2Pdf\Html2Pdf;

$html2pdf = new Html2Pdf();

$semuaTransaksi = [];
$sqlTransaksi = $conn->query("SELECT * FROM tb_transaksi") or die(mysqli_error($conn));
while ($pecahTransaksi = $sqlTransaksi->fetch_assoc()) {
	$semuaTransaksi[] = $pecahTransaksi;
}
// $jk = ($pecahAnggota['jk'] == 'L') ? 'Laki-Laki' : 'Perempuan';


$html = '<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Export to PDF Transaksi</title>
</head>
<body>
<h2>Laporan Transaksi</h2>
	<table border="1" cellpadding="10" cellspacing="0">
		<tr>
        <th>No</th>
      <th>id Transaksi</th>
      <th>id Barang</th>
      <th>Tanggal Pinjam</th>
      <th>Tanggal Kembali</th>
      <th>Status</th>
  	</tr>';
  	$no = 1;
  	foreach($semuaTransaksi as $key => $value) {
  		$html .= '
							<tr>
								<td>'. $no++ .'</td>
								<td>'. $value["id_transaksi"] .'</td>
                                <td>'. $value["id_barang"] .'</td>
								<td>'. $value["tgl_pinjam"] .'</td>
								<td>'. $value["tgl_kembali"] .'</td>
                                <td>'. $value["status"] .'</td>
								

							</tr>

  					';
  	}
$html .= '
</table>
</body>
</html>';

$html2pdf->writeHTML($html);
ob_end_clean();
$html2pdf->output();


?>