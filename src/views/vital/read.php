<?php
require "src/views/layouts/header.php";
?>

<main class="col-md-12 ms-sm-auto col-lg-12 px-md-4">
    <div class="m-3">
        <h1>Data Pemeriksaan Vital</h1>
        <table class="table table-striped table-bordered">
            <tr>
                <th>ID</th>
                <th>Tanggal</th>
                <th>Nama Pasien</th>
                <th>Keluhan</th>
                <th>Dokter</th>
                <th>Status</th>
                <th>Opsi</th>
            </tr>
            <?php foreach ($medical as $p): ?>
            <tr>
                <td><?= $p['medical_id']; ?></td>
                <td><?= $p['date']; ?></td>
                <td><?= $p['patient']; ?></td>
                <td><?= $p['complaints']; ?></td>
                <td><?= $p['doctor']; ?></td>
                <td><?= $p['status'] ?></td>
                <td>
                    <div class="form-group">
                        <?php if($p['status'] == 'Pending') { ?>
                            <a href="index.php?route=vital/create&id=<?= $p['medical_id']; ?>" class="btn btn-sm btn-success mr-3">Pemeriksaan Vital</a>
                        <?php }else{ ?>
                            <a href="index.php?route=vital/update&id=<?= $p['medical_id']; ?>" class="btn btn-sm btn-success mr-3">Ubah Data Vital</a>
                        <?php } ?>
                    </div>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
    </div>
</main>
  
<?php
include "src/views/layouts/script.php";
include "src/views/layouts/footer.php";
?>
