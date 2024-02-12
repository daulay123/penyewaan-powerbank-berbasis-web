<?php 
ob_start();
require_once '../config/koneksi.php';
require_once '../assets/vendor/autoload.php';

use Spipu\Html2Pdf\Html2Pdf;

$html2pdf = new Html2Pdf();

$semuaPowerbank = [];
$sqlPowerbank = $conn->query("SELECT * FROM tb_powerbank") or die(mysqli_error($conn));
while ($pecahPowerbank = $sqlPowerbank->fetch_assoc()) {
	$semuaPowerbank[] = $pecahPowerbank;
}
// $jk = ($pecahAnggota['jk'] == 'L') ? 'Laki-Laki' : 'Perempuan';


$html = '<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Export to PDF Powerbank</title>
</head>
<body>
<h2>Laporan Powerbank</h2>
	<table border="1" cellpadding="10" cellspacing="0">
		<tr>
      <th>No</th>
      <th>Foto</th>
      <th>Nama</th>
      <th>Harga</th>
      <th>Jumlah_Stok</th>
  	</tr>';
  	$no = 1;
  	foreach($semuaPowerbank as $key => $value) {
  		$html .= '
							<tr>
								<td>'. $no++ .'</td>
								<td>'. $value["foto"] .'</td>
                                <td>'. $value["nama"] .'</td>
								<td>'. $value["harga"] .'</td>
								<td>'. $value["jumlah_stok"] .'</td>
								

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