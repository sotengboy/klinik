<?php
require "src/views/layouts/header.php";
?>

<main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
    <div class="m-3">
        <h1>Data User</h1>
        <a href="index.php?route=user/create" class="btn btn-md btn-success mb-2">Tambah User</a>
        <table class="table table-striped table-bordered">
            <tr>
                <th>ID</th>
                <th>Nama</th>
                <th>Username</th>
                <th>Role</th>
                <th>Opsi</th>
            </tr>
            <?php foreach ($user as $p): ?>
            <tr>
                <td><?= $p['user_id']; ?></td>
                <td><?= $p['full_name']; ?></td>
                <td><?= $p['username']; ?></td>
                <td><?= $p['role_name']; ?></td>
                <td>
                    <div class="form-group">
                        <a href="index.php?route=user/update&id=<?= $p['user_id']; ?>" class="btn btn-sm btn-success mr-3">Ubah</a>
                        <a href="index.php?route=user/delete&id=<?= $p['user_id']; ?>" onclick="return confirm('Yakin hapus data?');" class="btn btn-sm btn-danger">Hapus</a>
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
