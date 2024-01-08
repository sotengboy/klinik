<?php
require "src/views/layouts/header.php";
?>

<main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
    <div class="m-3">
        <h1>Data Dokter</h1>
        <a href="index.php?route=doctor/create" class="btn btn-md btn-success mb-2">Tambah Dokter</a>
        <table class="table table-striped table-bordered">
            <tr>
                <th>ID</th>
                <th>Nama</th>
                <th>Spesialis</th>
                <th>Jam Kerja</th>
                <th>Telepon</th>
                <th>Opsi</th>
            </tr>
            <?php foreach ($doctor as $p): ?>
            <tr>
                <td><?= $p['doctor_id']; ?></td>
                <td><?= $p['full_name']; ?></td>
                <td><?= $p['skill']; ?></td>
                <td><?= $p['working_hours']; ?></td>
                <td><?= $p['phone']; ?></td>
                <td>
                    <div class="form-group">
                        <a href="index.php?route=doctor/update&id=<?= $p['doctor_id']; ?>" class="btn btn-sm btn-success mr-3">Ubah</a>
                        <a href="index.php?route=doctor/delete&id=<?= $p['doctor_id']; ?>" onclick="return confirm('Yakin hapus data?');" class="btn btn-sm btn-danger">Hapus</a>
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
