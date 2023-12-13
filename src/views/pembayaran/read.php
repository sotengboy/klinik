<?php
require "src/views/layouts/header.php";
?>

<main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
    <div class="m-3">
        <h1>Data Tagihan</h1>
        <hr />
        <table class="table table-striped table-bordered">
            <tr>
                <th>ID</th>
                <th>Nama Patient</th>
                <th>Bulan</th>
                <th>Tahun</th>
                <th>Jumlah Pemakaian</th>
                <th>Total Tagihan</th>
                <th>Status</th>
                <th>Opsi</th>
            </tr>
            <?php foreach ($pembayaran as $p): ?>
            <tr>
                <td><?= $p['id_penggunaan']; ?></td>
                <td><?= $p['nama_patient']; ?></td>
                <td><?= $p['bulan']; ?></td>
                <td><?= $p['tahun']; ?></td>
                <td><?= number_format($p['jumlah_meter'],0,',','.'); ?></td>
                <td>Rp<?= number_format($p['total_tagihan'], 0, ',','.'); ?></td>
                <td><?= $p['status']; ?></td>
                <td>
                    <?php 
                    if($p['status'] == "Pending"){?>
                        <a href="index.php?route=pembayaran/create&id=<?= $p['id_tagihan']; ?>" class="btn btn-sm btn-success">Bayar Tagihan</a>
                    <?php } ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
    </div>
</main>
  
<?php
include "src/views/layouts/footer.php";
?>
