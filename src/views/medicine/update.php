<?php
require "src/views/layouts/header.php";
?>

<main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
    <div class="m-3">
    <h1>Ubah Data Dokter</h1>
    <div class="row">
        <div class="col-6">
            <form method="POST" action="index.php?route=medicine/update">
            <label for="nama">Nama:</label>
                <input type="hidden" name="id" class="form-control" value="<?=$medicine['med_id']?>">
                <label for="nama">Nama:</label>
                <input type="text" name="nama" class="form-control" value="<?=$medicine['med_name']?>" required>
                <label for="nama">Deskripsi:</label>
                <input type="text" name="description" class="form-control" value="<?=$medicine['description']?>" required>
                <label for="nama">QTY:</label>
                <input type="number" name="qty" class="form-control" value="<?=$medicine['qty']?>" required>
                <label for="nama">Unit:</label>
                <select name="unit" class="form-control">
                    <option value="">-- Pilih Unit --</option>
                    <option value="pcs" <?=$medicine['unit'] == "pcs" ? "selected" : ""?>> PCS</option>
                    <option value="pack" <?=$medicine['unit'] == "pack" ? "selected" : ""?>> Pack</option>
                    <option value="strip" <?=$medicine['unit'] == "strip" ? "selected" : ""?>> Strip</option>
                </select> 
                <label for="email">Dosis:</label>
                <input type="text" name="dosage" class="form-control" value="<?=$medicine['dosage']?>" required>
                <label for="email">Harga:</label>
                <input type="number" name="price" class="form-control" value="<?=$medicine['price']?>" required>
                <label for="email">Tipe:</label>
                <input type="text" name="type" class="form-control" value="<?=$medicine['type']?>" required>
                <?php if($medicine['status'] != 'Infinity'): ?>
                <label for="status">Status:</label>
                <select name="status" class="form-control">
                    <option value="">-- Pilih Status --</option>
                    <option value="Active" <?=$medicine['status'] == "Active" ? "selected" : ""?>> Active</option>
                    <option value="Inactive" <?=$medicine['status'] == "Inactive" ? "selected" : ""?>> Inactive</option>
                </select>
                <?php endif; ?>
                <input type="submit" class="btn btn-md btn-success mt-3" value="Ubah Data">
                <a href="index.php?route=medicine" class="btn btn-md btn-secondary mt-3">Batal</a>
            </form>
        </div>
    </div>
    </div>
</main>
  
<?php
include "src/views/layouts/script.php";
include "src/views/layouts/footer.php";
?>
