<?php
require "src/views/layouts/header.php";
?>

<main class="col-md-6 ms-sm-auto col-lg-6 px-md-4">
    <div class="card">
        <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
            <h3>Detail Pendaftaran</h3>
        </div>
        <div class="card-body">
            <table class="table table-sm table-borderless" width="70%" id="printArea">
                <tr>
                    <td colspan="3" class="text-center"><span style="font-weight:700">Klinik Mufad Medika</span><br>Jl Raya Pule, Kel. Karanganyar, Kec. Karangbahagia,<br>
                                        Kabupaten Bekasi, Jawa Barat.<hr></td>
                </tr>
                <tr>
                    <td>Tanggal</td>
                    <td>:</td>
                    <td style="font-weight:700"><?= $med['date']; ?></td>
                </tr>
                <tr>
                    <td>No</td>
                    <td>:</td>
                    <td style="font-weight:700"><?= $med['trx_no']; ?></td>
                </tr>
                <tr>
                    <td>Nama Pasien</td>
                    <td>:</td>
                    <td style="font-weight:700"><?= $med['patient_name']; ?></td>
                </tr>
                <tr>
                    <td>Nomor RM</td>
                    <td>:</td>
                    <td style="font-weight:700"><?= $med['medical_number']; ?></td>
                </tr>
                <tr>
                    <td>Nama Dokter</td>
                    <td>:</td>
                    <td style="font-weight:700"><?= $med['doctor_name']; ?></td>
                </tr>
            </table>
            <div class="text-center">
                <hr>
                <button type="button" class="btn btn-sm btn-success" id="print"><i class="fas fa-fw fa-print"></i> Cetak Bukti Pendaftaran</button>
            </div>
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
