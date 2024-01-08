<?php
require "src/views/layouts/header.php";
?>

<main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
    <h1>Buat Data Obat</h1>
    <form method="POST" action="index.php?route=medicine/create">
        <div class="row">
            <div class="col-6">
                <label for="nama">Nama:</label>
                <input type="text" name="nama" class="form-control" required>
                <label for="nama" class="mt-3">Deskripsi:</label>
                <input type="text" name="description" class="form-control" required>
                <label for="nama" class="mt-3">QTY:</label>
                <input type="number" name="qty" class="form-control" required>
                <label for="nama" class="mt-3">Unit:</label>
                <select name="unit" class="form-control">
                    <option value="">-- Pilih Unit --</option>
                    <option value="pcs"> PCS</option>
                    <option value="pack"> Pack</option>
                    <option value="strip"> Strip</option>
                </select> 
                
                <input type="submit" class="btn btn-md btn-success mt-3" value="Simpan Data">
                <a href="index.php?route=medicine" class="btn btn-md btn-secondary mt-3">Batal</a>
            </div>
            <div class="col-6">
                <label for="email">Dosis:</label>
                <input type="text" name="dosage" class="form-control" required>
                <label for="email" class="mt-3">Harga:</label>
                <input type="number" name="price" class="form-control" required>
                <label for="email" class="mt-3">Tipe:</label>
                <input type="text" name="type" class="form-control" required>
                <label for="status" class="mt-3">Status:</label>
                <select name="status" class="form-control">
                    <option value="">-- Pilih Status --</option>
                    <option value="Active"> Active</option>
                    <option value="Inactive"> Inactive</option>
                </select>
            </div>
        </div>
    </form>
</main>
  
<?php
include "src/views/layouts/script.php";
include "src/views/layouts/footer.php";
?>
