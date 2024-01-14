<?php
require "src/views/layouts/header.php";
?>

<main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
    <div class="m-3">
    <h1>Ubah Patient</h1>
    <div class="row">
        <div class="col-6">
            <form method="POST" action="index.php?route=patient/update">
                <input type="hidden" name="id" value="<?=$patient['patient_id']; ?>">
                <label for="nama">Nama:</label>
                <input type="text" name="nama" class="form-control" value="<?=$patient['full_name'];?>" required>
                <label for="alamat">Alamat:</label>
                <input type="text" name="alamat" class="form-control" value="<?=$patient['address'];?>" required>
                <label for="email">Nomor Rekam Medik:</label>
                <input type="text" name="no_rm" class="form-control" value="<?=$patient['medical_number'];?>" readonly>
                <label>Umur:</label>
                <input type="text" name="umur" class="form-control" value="<?=$patient['age'];?>" required>
                <label>Jenis Kelamin:</label>
                <select name="jk" class="form-control">
                    <option value="">-- Pilih Jenis Kelamin --</option>
                    <option value="Laki-laki" <?= $patient['gender'] == 'Laki-laki' ? 'selected' : '' ?>> Laki-laki</option>
                    <option value="Perempuan" <?= $patient['gender'] == 'Perempuan' ? 'selected' : '' ?>> Perempuan</option>
                </select>
                <label>NIK:</label>
                <input type="number" name="nik" class="form-control" value="<?=$patient['nik'];?>" required>
                <label>Telepon:</label>
                <input type="text" name="phone" class="form-control" value="<?=$patient['phone'];?>" required>
                <label>Email:</label>
                <input type="text" name="email" class="form-control" value="<?=$patient['email'];?>">
                <label>Status:</label>
                <select name="status" class="form-control">
                    <option value="">-- Pilih Status --</option>
                    <option value="Active" <?= $patient['status'] == 'Active' ? 'selected' : '' ?>> Active</option>
                    <option value="Inactive" <?= $patient['status'] == 'Inactive' ? 'selected' : '' ?>> Inactive</option>
                </select>
                <input type="submit" class="btn btn-md btn-success mt-3" value="Ubah Patient">
            </form>
        </div>
    </div>
    </div>
</main>
<?php
include "src/views/layouts/script.php";
include "src/views/layouts/footer.php";
?>
