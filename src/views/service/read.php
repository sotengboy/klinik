<?php
require "src/views/layouts/header.php";
?>

<main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
    <div class="m-3">
        <h1>Data Layanan</h1>
        <a href="index.php?route=service/create" class="btn btn-md btn-success mb-2">Tambah Layanan</a>
        <table class="table table-striped table-bordered">
            <tr>
                <th>ID</th>
                <th>Nama Layanan</th>
                <th>Deskripsi</th>
                <th>Harga</th>
                <th>Opsi</th>
            </tr>
            <?php foreach ($service as $service): ?>
            <tr>
                <td><?= $service['service_id']; ?></td>
                <td><?= $service['service_name']; ?></td>
                <td><?= $service['service_desc']; ?></td>
                <td><?= $service['service_price']; ?></td>
                <td>
                    <div class="form-group">
                        <a href="index.php?route=service/update&id=<?= $service['service_id']; ?>" class="btn btn-sm btn-success mr-3">Ubah</a>
                        <a href="index.php?route=service/delete&id=<?= $service['service_id']; ?>" onclick="return confirm('Yakin hapus data?');" class="btn btn-sm btn-danger">Hapus</a>
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
