<?php
require "src/views/layouts/header.php";
?>
<style>
    @media print {
        body {
            width: '100%';
        }
        .no-print {
            display: none;
        }
        img {
            display: block;
            max-width: 100%;
            height: auto;
        }
    }
</style>
<div class="page-header">
    <div class="page-block">
        <div class="row align-items-center">
            <div class="col-md-12">
                <div class="page-header-title">
                    <h5 class="m-b-10">Detail Data Pembayaran</h5>
                </div>
                <ul class="breadcrumb">
                    <li class="breadcrumb-item"><a href="index.php?route=home"><i class="feather icon-home"></i></a></li>
                    <li class="breadcrumb-item"><a href="#!">Detail Data Pembayaran</a></li>
                </ul>
            </div>
        </div>
    </div>
</div>
<main class="col-md-12 ms-sm-auto col-lg-12 px-md-4">
    <div class="card">
        <div class="card-body" id="printArea">
            <table width="100%">
                <thead>
                    <tr>
                        <td>
                            <table>
                                <tr>
                                    <td>
                                        <img src="assets/img/icon.png" style="width:100px;margin-right:20px" />
                                    </td>
                                    <td>
                                        <h3>Klinik Mufad Medika</h3>
                                        <p>
                                        Telepon: 0857 7664 0207<br>
                                        Alamat: Jl Raya Pule, Kel. Karanganyar, Kec. Karangbahagia,<br>
                                        Kabupaten Bekasi, Jawa Barat.</p>
                                    </td>
                                </tr>
                            </table>
                        </td>
                        <td>
                            <table class="table">
                                <tr>
                                    <td colspan="3"><h3>KWITANSI PEMBAYARAN</h3></td>
                                </tr>
                                <tr>
                                    <td><span class="ml-2">Nomor</span></td>
                                    <td>:</td>
                                    <td><?= $p['payment_number']; ?></td>
                                </tr>
                                <tr>
                                    <td><span class="ml-2">Tanggal</span></td>
                                    <td>:</td>
                                    <td><?= $this->helper->formatDate($p['payment_date']); ?></td>
                                </tr>
                                <tr>
                                    <td><span class="ml-2">Status</span></td>
                                    <td>:</td>
                                    <td><?= $p['payment_status']; ?></td>
                                </tr>
                            </table>
                        </td>
                    </tr>
                    <tr>
                        <td colspan="2">
                            <table class="table mt-5" width="100%">
                                <tr>
                                    <td>No.</td>
                                    <td>Jenis Pembayaran</td>
                                    <td>Bulan</td>
                                    <td style="text-align:right">Nominal</td>
                                </tr>
                                <?php 
                                $no = 0;
                                foreach ($items as $item):
                                    $no++;
                                ?>
                                <tr>
                                    <td><?= $no; ?></td>
                                    <td><?= $item['nama_iuran']; ?></td>
                                    <td><?= $item['bulan']; ?></td>
                                    <td style="text-align:right">Rp<?= number_format($item['nominal'],0,',','.'); ?>,-</td>
                                </tr>
                                <?php endforeach; ?>
                                <tr>
                                    <td colspan="2">Terbilang: <strong><em># <?= $this->helper->konversi(intval($p['total'])) ?> #</em></strong></td>
                                    <td style="text-align:right">TOTAL</td>
                                    <td style="text-align:right">Rp<?= number_format($p['total'],0,',','.'); ?>,-</td>
                                </tr>
                                
                            </table>
                        </td>
                    </tr>
                </thead>
            </table>
        </div>
        <div class="card-footer">
            <div style="text-align:center" class="no-print"><button class="btn btn-primary" id="print"><i class="feather icon-printer"></i> Cetak Kwitansi</button></div>
        </div>
    </div>
</main>
  
<?php
include "src/views/layouts/script.php";
?>
<script>
    $(document).ready(function() {
        $('#print').click(function() {
            var contentToPrint = $('#printArea').html();
            var originalContent = $('body').html();
            $('body').html(contentToPrint);
            window.print();
            $('body').html(originalContent);
        });
    });
</script>
<?php
include "src/views/layouts/footer.php";
?>
