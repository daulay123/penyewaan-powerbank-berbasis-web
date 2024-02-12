<?php 

$ambilPowerbank = $conn->query("SELECT * FROM tb_powerbank ORDER BY id_barang DESC") or die(mysqli_error($conn));

?>
<h1 class="mt-4">Data PowerBank</h1>
<ol class="breadcrumb mb-4">
    <li class="breadcrumb-item"><a href="index.php">Dashboard</a></li>
    <li class="breadcrumb-item active">data powerbank</li>
</ol>
<div class="col-md-6">
    <a href="?p=powerbank&aksi=tambah" class="btn btn-primary mb-3"><i class="fa fa-plus"></i> Tambah PowerBank</a>
    <a href="./laporan/laporan_powerbank_pdf.php" target="_blank" class="btn btn-danger mb-3"><i class="fa fa-file-pdf"></i>
    Export to PDF</a>
</div>

<div class="card mb-4">
    <div class="card-header">
        <i class="fas fa-table mr-1"></i>
        Data PowerBank
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Foto</th>
                        <th>Nama PowerBank</th>
                        <th>Harga Sewa</th>
                        <th>Jumlah Stok</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php 
                    $no = 1;
                    while ($pecahPowerbank = $ambilPowerbank->fetch_assoc()) {
                    
                    ?>
                    <tr>
                        <td><?= $no++; ?></td>
                        <td align="center"><img src="gambar/<?php echo $pecahPowerbank['foto'];?>" width="80" height="80"></td>
                        <td><?= $pecahPowerbank['nama']; ?></td>
                        <td><?= $pecahPowerbank['harga']; ?></td>
                        <td><?= $pecahPowerbank['jumlah_stok']; ?></td>
                        <td>
                            <a href="?p=powerbank&aksi=ubah&id=<?= $pecahPowerbank['id_barang']; ?>" class="btn btn-info btn-sm"><i class="fa fa-edit"></i></a>
                            <a href="?p=powerbank&aksi=hapus&id=<?= $pecahPowerbank['id_barang']; ?>" class="btn btn-danger btn-sm"><i class="fa fa-trash" onclick="return confirm('Yakin ?')"></i></a>
                        </td>
                    </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>
    </div>
</div>