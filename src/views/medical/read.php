<?php
require "src/views/layouts/header.php";
?>

<main class="col-md-12 ms-sm-auto col-lg-12 px-md-4">
    <div class="card">
        <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
            <h1>Data Pendaftaran</h1>
            <a href="index.php?route=medical" class="btn btn-md btn-success mb-2">Tambah Data</a>
        </div>
        <div class="card-body">
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
                                <a href="index.php?route=medical/update&id=<?= $p['medical_id']; ?>" class="btn btn-sm btn-success mr-3">Ubah</a>
                                <a href="index.php?route=medical/delete&id=<?= $p['medical_id']; ?>" onclick="return confirm('Yakin hapus data?');" class="btn btn-sm btn-danger">Hapus</a>
                            <?php } ?>
                        </div>
                    </td>
                </tr>
                <?php endforeach; ?>
            </table>
        </div>
    </div>
</main>
  
<?php
include "src/views/layouts/footer.php";
?>
