<?php
require "src/views/layouts/header.php";
?>

<main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
    <div class="m-3">
    <h1>Buat Layanan</h1>
    <div class="row">
        <div class="col-6">
            <form method="POST" action="index.php?route=service/create">
                <div class="form-group">
                    <label for="daya">Nama:</label>
                    <input type="text" name="name" class="form-control" required>
                </div>
                <div class="form-group">
                    <label for="daya">Deskripsi:</label>
                    <input type="text" name="desc" class="form-control" required>
                </div>
                <div class="form-group">
                    <label for="service">Harga Layanan:</label>
                    <input type="number" name="price" class="form-control" required>
                </div>
                <label for="status">Status:</label>
                <select name="status" class="form-control">
                    <option value="">-- Pilih Status --</option>
                    <option value="Active"> Active</option>
                    <option value="Inactive"> Inactive</option>
                </select>
                <input type="submit" class="btn btn-md btn-success mt-3" value="Simpan Data">
            </form>
        </div>
    </div>
    </div>
</main>
  
<?php
include "src/views/layouts/script.php";
include "src/views/layouts/footer.php";
?>
