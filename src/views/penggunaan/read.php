<?php
require "src/views/layouts/header.php";
?>

<main class="col-md-12 ms-sm-auto col-lg-12 px-md-4">
    <div class="m-3">
        <h1>Data Penggunaan</h1>
        <a href="index.php?route=penggunaan/create" class="btn btn-md btn-success mb-2">Tambah Data</a>
        <table class="table table-striped table-bordered">
            <tr>
                <th>ID</th>
                <th>Nama Patient</th>
                <th>Bulan</th>
                <th>Tahun</th>
                <th>Meter Awal</th>
                <th>Meter Ahir</th>
                <th>Opsi</th>
            </tr>
            <?php foreach ($penggunaan as $p): ?>
            <tr>
                <td><?= $p['id_penggunaan']; ?></td>
                <td><?= $p['nama_patient']; ?></td>
                <td><?= $p['bulan']; ?></td>
                <td><?= $p['tahun']; ?></td>
                <td><?= number_format($p['meter_awal'],0,',','.'); ?></td>
                <td><?= number_format($p['meter_ahir'],0,',','.'); ?></td>
                <td>
                    <div class="form-group">
                        <a href="index.php?route=penggunaan/update&id=<?= $p['id_penggunaan']; ?>" class="btn btn-sm btn-success mr-3">Ubah</a>
                        <a href="index.php?route=penggunaan/delete&id=<?= $p['id_penggunaan']; ?>" onclick="return confirm('Yakin hapus data?');" class="btn btn-sm btn-danger">Hapus</a>
                        <?php if($p['tagihan'] == 0){
                            ?>
                        <a href="index.php?route=penggunaan/tagihan&id=<?= $p['id_penggunaan']; ?>" class="btn btn-sm btn-success">Buat Tagihan</a>
                        <?php } ?>
                    </div>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
    </div>
</main>
  
<?php
include "src/views/layouts/footer.php";
?>
