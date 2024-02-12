<?php
$id_barang = $_GET['id'];

$sql = $conn->query("SELECT * FROM tb_powerbank WHERE id_barang = $id_barang") or die(mysqli_error($conn));
$pecahSql = $sql->fetch_assoc();

if(isset($_POST['ubah'])) {
    $nama = htmlspecialchars($_POST['nama']);
    $harga = htmlspecialchars($_POST['harga']);
    $jumlah_stok = htmlspecialchars($_POST['jumlah_stok']);

    // Validasi form
    if(empty($nama) || empty($harga) || empty($jumlah_stok)) {
        echo "<script>alert('Pastikan anda sudah mengisi semua formulir.');window.location='?p=powerbank';</script>";
    } else {
        // Validasi foto
        if(isset($_FILES['foto']['name']) && !empty($_FILES['foto']['name'])) {
            $rand = rand();
            $ekstensi = array('png','jpg','jpeg','gif');
            $filename = $_FILES['foto']['name'];
            $ukuran = $_FILES['foto']['size'];
            $ext = pathinfo($filename, PATHINFO_EXTENSION);

            if(!in_array($ext, $ekstensi)) {
                echo "<script>alert('Ekstensi foto tidak valid.');window.location='?p=powerbank';</script>";
            } else {
                if($ukuran < 1044070) {      
                    $xx = $rand.'_'.$filename;
                    move_uploaded_file($_FILES['foto']['tmp_name'], 'gambar/'.$rand.'_'.$filename);

                    // Update data dengan foto
                    $sql = $conn->query("UPDATE tb_powerbank SET nama = '$nama', harga = '$harga', jumlah_stok = '$jumlah_stok', foto = '$xx' WHERE id_barang = $id_barang") or die(mysqli_error($conn));

                    if($sql) {
                        echo "<script>alert('Data Berhasil Diubah.');window.location='?p=powerbank';</script>";
                    } else {
                        echo "<script>alert('Data Gagal Diubah.');window.location='?p=powerbank';</script>";
                    }
                } else {
                    echo "<script>alert('Ukuran foto terlalu besar.');window.location='?p=powerbank';</script>";
                }
            }
        } else {
            // Update data tanpa foto
            $sql = $conn->query("UPDATE tb_powerbank SET nama = '$nama', harga = '$harga', jumlah_stok = '$jumlah_stok' WHERE id_barang = $id_barang") or die(mysqli_error($conn));

            if($sql) {
                echo "<script>alert('Data Berhasil Diubah.');window.location='?p=powerbank';</script>";
            } else {
                echo "<script>alert('Data Gagal Diubah.');window.location='?p=powerbank';</script>";
            }
        }
    }
}
?>


<h1 class="mt-4">Ubah Data PowerBank</h1>
<ol class="breadcrumb mb-4">
    <li class="breadcrumb-item"><a href="index.php">Dashboard</a></li>
    <li class="breadcrumb-item active">ubah data powerbank</li>
</ol>
<div class="card-header mb-5">
	
	<form action="" method="post" enctype="multipart/form-data">
    <div class="form-group">
            <label class="small mb-1" for="foto">Foto</label>
            <input class="form-control" id="foto" name="foto" type="file" accept="image/*" />
            <!-- Tambahkan tag img untuk menampilkan gambar saat ini -->
            <?php if (isset($pecahSql['foto'])) : ?>
                <img src="gambar/<?= $pecahSql['foto']; ?>" alt="Current Image" style="max-width: 100px; margin-top: 10px;" />
            <?php endif; ?>
        </div>
    <div class="form-group">
        <label class="small mb-1" for="nama">Merk PowerBank</label>
        <input class="form-control" id="nama" name="nama" type="text" placeholder="Masukan merk powerbank" value="<?= $pecahSql['nama']; ?>" />
    </div>
    <div class="form-group">
        <label class="small mb-1" for="harga">Harga Sewa</label>
        <input class="form-control" id="harga" name="harga" type="number" value="<?= $pecahSql['harga']; ?>" placeholder="Masukan harga sewa"/>
    </div>
    <div class="form-group">
        <label class="small mb-1" for="jumlah_stok">Stok PowerBank</label>
        <input class="form-control" id="jumlah_stok" name="jumlah_stok" type="number" value="<?= $pecahSql['jumlah_stok']; ?>" placeholder="Masukan jumlah stok"/>
    </div>
    <div class="form-group">
    	<button type="submit" class="btn btn-primary" name="ubah">Ubah Data</button>
    </div>
	</form>
</div>