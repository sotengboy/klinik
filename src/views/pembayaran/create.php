<?php
require "src/views/layouts/header.php";
?>

<main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
    <div class="m-3">
    <h1>Input Pembayaran</h1>
    <div class="row">
        <div class="col-6">
            <h4>Rincian Tagihan</h4>
            <p>Nama Patient: <?= $tagihan['nama_patient']; ?></p>
            <p>Bulan/Tahun Penggunaan: <?= $tagihan['bulan']; ?>/<?= $tagihan['tahun']; ?></p>
            <p>Jumlah Penggunaan: <?= number_format($tagihan['jumlah_meter'],0,',','.'); ?></p>
            <p>Total Tagihan: Rp<?= number_format($tagihan['total_tagihan'],0,',','.'); ?></p>
            <p>Biaya Admin: Rp<?= number_format(5000,0,',','.'); ?></p>
            <p>Total yang harus dibayar: Rp<?= number_format($tagihan['total_tagihan']+5000,0,',','.'); ?></p>
            <form method="POST" action="index.php?route=pembayaran/create">
                <input type="hidden" name="id" value="<?=$tagihan['id_tagihan'];?>">
                <input type="hidden" name="bulan" value="<?=$tagihan['bulan'];?>">
                <input type="hidden" name="tagihan" value="<?=$tagihan['id_tagihan'];?>">
                <input type="hidden" name="patient" value="<?=$tagihan['id_patient'];?>">
                <input type="hidden" name="biaya_admin" value="5000">
                <input type="hidden" name="total" value="<?= $tagihan['total_tagihan']+5000 ?>">
                <label for="jumlah">Jumlah Pembayaran</label>
                <input type="number" name="total_bayar" id="" class="form-control">
                <label for="jumlah">Tanggal Pembayaran</label>
                <input type="text" name="tanggal" id="" class="form-control">
                <p><small>Format: yyyy-mm-dd</small></p>

                <input type="submit" class="btn btn-md btn-success mt-3" value="Bayar">
            </form>
        </div>
    </div>
    </div>
</main>
  
<?php
include "src/views/layouts/footer.php";
?>
