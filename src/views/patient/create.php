<?php
require "src/views/layouts/header.php";
?>

<main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
    <div class="m-3">
    <h1>Buat Data Pasien</h1>
    <div class="row">
        <div class="col-6">
            <form method="POST" action="index.php?route=patient/create">
                <label for="name">Nama:</label>
                <input type="text" name="nama" class="form-control" required>
                <label>Alamat:</label>
                <input type="text" name="alamat" class="form-control" required>
                <label>Nomor Rekam Medik:</label>
                <input type="text" name="no_rm" class="form-control" required>
                <label>Umur:</label>
                <input type="text" name="umur" class="form-control" required>
                <label>Jenis Kelamin:</label>
                <select name="jk" class="form-control">
                    <option value="">-- Pilih Jenis Kelamin --</option>
                    <option value="Laki-laki"> Laki-laki</option>
                    <option value="Perempuan"> Perempuan</option>
                </select>
                <label>NIK:</label>
                <input type="number" name="nik" class="form-control" required>
                <label>Telepon:</label>
                <input type="text" name="phone" class="form-control" required>
                <label>Email:</label>
                <input type="text" name="email" class="form-control" required>
                <label>Status:</label>
                <select name="status" class="form-control">
                    <option value="">-- Pilih Status --</option>
                    <option value="Active"> Active</option>
                    <option value="Inactive"> Inactive</option>
                </select>
                <input type="submit" class="btn btn-md btn-success mt-3" value="Buat Patient">
            </form>
        </div>
    </div>
    </div>
</main>
  
<?php
include "src/views/layouts/footer.php";
?>
