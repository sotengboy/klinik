<?php
require "src/views/layouts/header.php";
?>

<main class="col-12">
    <h1>Data Pembayaran</h1>
    <hr />
    <table class="table table-striped table-bordered">
        <tr>
            <th>Nomor Pembayaran</th>
            <th>ID Pasien</th>
            <th>Nama Pasien</th>
            <th>Jumlah Pembayaran</th>
            <th>Status</th>
            <th>Opsi</th>
        </tr>
        <?php foreach ($payment as $p): ?>
        <tr>
            <td><?= $p['payment_number']; ?></td>
            <td><?= $p['medical_number']; ?></td>
            <td><?= $p['full_name']; ?></td>
            <td><?= number_format($p['subtotal'],0,',','.'); ?></td>
            <!-- <td><?= $p['bulan']; ?></td>
            <td><?= $p['tahun']; ?></td>
            <td>Rp<?= number_format($p['total_tagihan'], 0, ',','.'); ?></td> -->
            <td><?= $p['payment_status']; ?></td>
            <td>
                <a href="index.php?route=payment/detail&id=<?= $p['payment_id']; ?>" class="btn btn-sm btn-primary">Lihat</a>
                <?php 
                if($p['payment_status'] == "Pending Payment"){?>
                    <a href="index.php?route=payment/create&id=<?= $p['payment_id']; ?>" class="btn btn-sm btn-success">Bayar Tagihan</a>
                <?php } ?>
            </td>
        </tr>
        <?php endforeach; ?>
    </table>
</main>
  
<?php
include "src/views/layouts/script.php";
include "src/views/layouts/footer.php";
?>
