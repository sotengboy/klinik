<?php
require "src/views/layouts/header.php";
?>

<main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
    <div class="m-3">
        <h1>Data Role</h1>
        <a href="index.php?route=role/create" class="btn btn-md btn-success mb-2">Tambah Role</a>
        <table class="table table-striped table-bordered">
            <tr>
                <th>ID</th>
                <th>Nama Role</th>
                <th>Opsi</th>
            </tr>
            <?php foreach ($role as $role): ?>
            <tr>
                <td><?= $role['role_id']; ?></td>
                <td><?= $role['role_name']; ?></td>
                <td>
                    <div class="form-group">
                        <a href="index.php?route=role/update&id=<?= $role['role_id']; ?>" class="btn btn-sm btn-success mr-3">Ubah</a>
                        <a href="index.php?route=role/delete&id=<?= $role['role_id']; ?>" onclick="return confirm('Yakin hapus data?');" class="btn btn-sm btn-danger">Hapus</a>
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
