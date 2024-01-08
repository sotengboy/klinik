<?php
require "src/views/layouts/header.php";
?>

<main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
    <h1>Buat Data Pasien</h1>
    <form method="POST" action="index.php?route=patient/create">
        <div class="row">
            <div class="col-6">
                <input type="hidden" name="from" value="patient">
                <label for="name">Nama:</label>
                <input type="text" name="nama" class="form-control" required>
                <label class="mt-2">Alamat:</label>
                <input type="text" name="alamat" class="form-control" required>
                <label class="mt-2">Nomor Rekam Medik:</label>
                <input type="text" name="no_rm" class="form-control" value="<?=date('ymd').rand(100,999);?>" required>
                <label class="mt-2">Umur:</label>
                <input type="text" name="umur" class="form-control" required>
                <label class="mt-2">Jenis Kelamin:</label>
                <select name="jk" class="form-control">
                    <option value="">-- Pilih Jenis Kelamin --</option>
                    <option value="Laki-laki"> Laki-laki</option>
                    <option value="Perempuan"> Perempuan</option>
                </select>
                <input type="submit" class="btn btn-md btn-success mt-2" value="Buat Pasien">
            </div>
            <div class="col-6">
                <label>NIK:</label>
                <input type="number" name="nik" class="form-control" required>
                <label class="mt-2">Telepon:</label>
                <input type="text" name="phone" class="form-control" required>
                <label class="mt-2">Email:</label>
                <input type="text" name="email" class="form-control">
                <label class="mt-2">Status:</label>
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
