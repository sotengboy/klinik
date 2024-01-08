<?php
require "src/views/layouts/header.php";
?>

<main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
    <div class="m-3">
    <h1>Ubah Role</h1>
    <div class="row">
        <div class="col-6">
            <form method="POST" action="index.php?route=role/update">
                <input type="hidden" value="<?= $role['role_id']; ?>" name="id">
                <div class="form-group">
                    <label for="daya">Nama Role:</label>
                    <input type="text" name="nama" class="form-control" value="<?= $role['role_name']; ?>" required>
                </div>
                <div class="form-group">
                    <label for="nama">Hak Akses:</label>
                    <table class="table table-sm">
                        <tr>
                            <td><input type="checkbox" name="access[]" value="registration" <?= str_contains($role['access'], 'registration') ? 'checked' : ''; ?> ></td>
                            <td>Pendaftaran</td>
                            <td><input type="checkbox" name="access[]" value="vital" <?= str_contains($role['access'], 'vital') ? 'checked' : ''; ?> ></td>
                            <td>Pemeriksaan Vital</td>
                        </tr>
                        <tr>
                            <td><input type="checkbox" name="access[]" value="doctor" <?= str_contains($role['access'], 'doctor') ? 'checked' : ''; ?> ></td>
                            <td>Pemeriksaan Dokter</td>
                            <td><input type="checkbox" name="access[]" value="payment" <?= str_contains($role['access'], 'payment') ? 'checked' : ''; ?> ></td>
                            <td>Pembayaran</td>
                        </tr>
                        <tr>
                            <td><input type="checkbox" name="access[]" value="pharmacy" <?= str_contains($role['access'], 'pharmacy') ? 'checked' : ''; ?> ></td>
                            <td>Farmasi</td>
                            <td><input type="checkbox" name="access[]" value="master" <?= str_contains($role['access'], 'master') ? 'checked' : ''; ?> ></td>
                            <td>Master Data</td>
                        </tr>
                    </table>

                </div>
                <div class="form-group">
                <input type="submit" class="btn btn-md btn-success mt-3" value="Ubah Role">
                <a class="btn btn-md btn-secondary mt-3" href="index.php?route=role">Batal</a>
            </form>
        </div>
    </div>
    </div>
</main>
  
<?php
include "src/views/layouts/script.php";
include "src/views/layouts/footer.php";
?>
