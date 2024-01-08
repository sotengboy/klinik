<?php
require "src/views/layouts/header.php";
?>

<main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
    <div class="m-3">
    <h1>Ubah Layanan</h1>
    <div class="row">
        <div class="col-6">
            <form method="POST" action="index.php?route=service/update">
                <input type="hidden" value="<?= $service['service_id']; ?>" name="id">
                <div class="form-group">
                    <label for="daya">Nama:</label>
                    <input type="text" name="name" class="form-control" value="<?= $service['service_name']; ?>" required>
                </div>
                <div class="form-group">
                    <label for="daya">Deskripsi:</label>
                    <input type="text" name="desc" class="form-control" value="<?= $service['service_desc']; ?>" required>
                </div>
                <div class="form-group">
                    <label for="service">Harga Layanan:</label>
                    <input type="number" name="price" class="form-control" value="<?= $service['service_price']; ?>" required>
                </div>
                <label for="status">Status:</label>
                <select name="status" class="form-control">
                    <option value="">-- Pilih Status --</option>
                    <option value="Active" <?=$service['status'] == "Active" ? "selected" : ""?>> Active</option>
                    <option value="Inactive" <?=$service['status'] == "Inactive" ? "selected" : ""?>> Inactive</option>
                </select>
                <input type="submit" class="btn btn-md btn-success mt-3" value="Ubah Layanan">
                <a class="btn btn-md btn-secondary mt-3" href="index.php?route=service">Batal</a>
            </form>
        </div>
    </div>
    </div>
</main>
  
<?php
include "src/views/layouts/script.php";
include "src/views/layouts/footer.php";
?>
