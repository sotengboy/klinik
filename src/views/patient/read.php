<?php
require "src/views/layouts/header.php";
?>

<main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
    <div class="m-3">
        <h1>Data Pasien</h1>
        <a href="index.php?route=patient/create" class="btn btn-md btn-success mb-2">Tambah Pasien</a>
        <table class="table table-striped table-bordered">
            <tr>
                <th>ID</th>
                <th>Nama</th>
                <th>Alamat</th>
                <th>No. RM</th>
                <th>Opsi</th>
            </tr>
            <?php foreach ($patient as $p): ?>
            <tr>
                <td><?= $p['patient_id']; ?></td>
                <td><?= $p['full_name']; ?></td>
                <td><?= substr($p['address'],0,50); ?>...</td>
                <td><?= $p['medical_number']; ?></td>
                <td>
                    <div class="form-group">
                        <a href="index.php?route=patient/update&id=<?= $p['patient_id']; ?>" class="btn btn-sm btn-success mr-3">Ubah</a>
                        <a href="index.php?route=patient/delete&id=<?= $p['patient_id']; ?>" onclick="return confirm('Yakin hapus data?');" class="btn btn-sm btn-danger">Hapus</a>
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
