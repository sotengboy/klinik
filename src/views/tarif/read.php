<?php
require "src/views/layouts/header.php";
?>

<main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
    <div class="m-3">
        <h1>Data Tarif</h1>
        <a href="index.php?route=tarif/create" class="btn btn-md btn-success mb-2">Tambah Tarif</a>
        <table class="table table-striped table-bordered">
            <tr>
                <th>ID</th>
                <th>Daya</th>
                <th>Tafir per KWH</th>
                <th>Opsi</th>
            </tr>
            <?php foreach ($tarif as $tarif): ?>
            <tr>
                <td><?= $tarif['id_tarif']; ?></td>
                <td><?= $tarif['daya']; ?></td>
                <td><?= $tarif['tarifperkwh']; ?></td>
                <td>
                    <div class="form-group">
                        <a href="index.php?route=tarif/update&id=<?= $tarif['id_tarif']; ?>" class="btn btn-sm btn-success mr-3">Ubah</a>
                        <a href="index.php?route=tarif/delete&id=<?= $tarif['id_tarif']; ?>" onclick="return confirm('Yakin hapus data?');" class="btn btn-sm btn-danger">Hapus</a>
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
