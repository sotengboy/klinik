<?php
require "src/views/layouts/header.php";
?>

<main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
    <div class="m-3">
        <h1>Data Obat</h1>
        <a href="index.php?route=medicine/create" class="btn btn-md btn-success mb-2">Tambah Obat</a>
        <table class="table table-striped table-bordered">
            <tr>
                <th>ID</th>
                <th>Nama Obat</th>
                <th>Unit</th>
                <th>Dosis</th>
                <th>Harga</th>
                <th>Opsi</th>
            </tr>
            <?php $n = 1; foreach ($medicine as $p): ?>
            <tr>
                <td><?= $n++; ?></td>
                <td><?= $p['med_name']; ?></td>
                <td><?= $p['unit']; ?></td>
                <td><?= $p['dosage']; ?></td>
                <td><?= $p['price']; ?></td>
                <td>
                    <div class="form-group">
                        <a href="index.php?route=medicine/update&id=<?= $p['med_id']; ?>" class="btn btn-sm btn-success mr-3">Ubah</a>
                        <?php if($p['med_id'] != 0 || $p['status'] != 'Infinity'): ?>
                        <a href="index.php?route=medicine/delete&id=<?= $p['med_id']; ?>" onclick="return confirm('Yakin hapus data?');" class="btn btn-sm btn-danger">Hapus</a>
                        <?php endif; ?>
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
