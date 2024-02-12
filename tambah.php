<?php 

$tampilNamaPowerbank = $conn->query("SELECT * FROM tb_powerbank ORDER BY id_barang") or die(mysqli_error($conn));

$tampilNamaAnggota = $conn->query("SELECT * FROM tb_anggota ORDER BY tlp") or die(mysqli_error($conn));


$tgl_pinjam = date('d-m-Y');
$tujuh_hari = mktime(0,0,0, date('n'), date('j') + 7, date('Y'));
$kembali = date('d-m-Y', $tujuh_hari);

if(isset($_POST['tambah'])) {
    
    $tgl_pinjam = htmlspecialchars($_POST['tgl_pinjam']);
    $tgl_kembali = htmlspecialchars($_POST['tgl_kembali']);
    
    $nama_powerbank = $_POST['powerbank'];
    $pecahB = explode(".", $nama_powerbank);
    $id = $pecahB[0];
    $merk = $pecahB[1];

    $nama_anggota = $_POST['nama'];
    $pecahN = explode(".", $nama_anggota);
    $tlp = $pecahN[0];
    $nama = $pecahN[1];

    $sql = $conn->query("SELECT * FROM tb_powerbank WHERE nama = '$merk'") or die(mysqli_error($conn));
    while($data = $sql->fetch_assoc()) {
        $sisa = $data['jumlah_stok'];

        if($sisa == 0) {
            echo "<script>alert('Stok Powerbank Habis, Transaksi, tidak dapat dilakukan, silahkan tambahkan stok powerbank dulu.');window.location='?p=transaksi&aksi=tambah';</script>";
        } else {
            $conn->query("INSERT INTO tb_transaksi VALUES(null, '$id', '$tlp', '$tlp', '$tgl_pinjam', '$tgl_kembali', 'pinjam')") or die(mysqli_error($conn));
            $conn->query("UPDATE tb_powerbank SET jumlah_stok = (jumlah_stok-1) WHERE id_barang = '$id'") or die(mysqli_error($conn));
            echo "<script>alert('Data transaksi berhasil ditambahkan.');window.location='?p=transaksi';</script>";
        }
    }
}


?>

<h1 class="mt-4">Tambah Data Transaksi</h1>
<ol class="breadcrumb mb-4">
    <li class="breadcrumb-item"><a href="index.php">Dashboard</a></li>
    <li class="breadcrumb-item active">tambah data transaksi</li>
</ol>
<div class="card-header mb-5">
	
	<form action="" method="post">
    
    <div class="form-group">
        <label class="small mb-1" for="nama_powerbank">PowerBank</label>
        <select name="powerbank" id="nama_powerbank" class="form-control">
            <option value="">-- Pilih PowerBank --</option>
            <?php 
            while ($pecahPowerbank = $tampilNamaPowerbank->fetch_assoc()) {
            echo "<option value='$pecahPowerbank[id_barang].$pecahPowerbank[nama]'>$pecahPowerbank[nama]</option>";
            
            }
            ?>
        </select>
    </div>
    <div class="form-group">
        <label class="small mb-1" for="nama_anggota">Nama</label>
        <select name="nama" id="nama_anggota" class="form-control">
            <option value="">-- Pilih Anggota --</option>
            <?php 
            while ($pecahAnggota = $tampilNamaAnggota->fetch_assoc()) {
            echo "<option value='$pecahAnggota[id_anggota].$pecahAnggota[nama_anggota]'>$pecahAnggota[tlp].$pecahAnggota[nama_anggota]</option>";
            }
            ?>
        </select>
    </div>
    <div class="form-group">
        <label for="tgl_pinjam">Tanggal Pinjam</label>
        <input type="text" name="tgl_pinjam" id="tgl_pinjam" class="form-control" readonly="" value="<?= $tgl_pinjam ?>">
    </div>
    <div class="form-group">
        <label for="tgl_kembali">Tanggal Kembali</label>
        <input type="text" name="tgl_kembali" id="tgl_kembali" class="form-control" readonly="" value="<?= $kembali ?>">
    </div>
    <div class="form-group">
    	<button type="submit" class="btn btn-primary" name="tambah">Tambah Data</button>
    </div>
	</form>
</div>