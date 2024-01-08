<?php
require "src/views/layouts/header.php";
?>

<main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
    <div class="m-3">
    <h1>Input Data Pemeriksaan Tanda Vital</h1>
    <div class="row">
        <div class="col-6">
            <form method="POST" action="index.php?route=vital/update">
                <input type="hidden" value="<?= $medical['medical_id']; ?>" name="id">
                <div class="form-group">
                    <label for="daya">Jenis Layanan:</label>
                    <input type="text" name="type" class="form-control" value="<?= $medical['type']; ?>" readonly>
                    <label for="daya">Nama Pasien:</label>
                    <input type="text" name="patient_name" class="form-control" value="<?= $medical['patient_name']; ?>" readonly>
                    <label for="daya">Keluhan:</label>
                    <input type="text" name="complaints" class="form-control" value="<?= $medical['complaints']; ?>" readonly>
                    <label for="daya">Dokter:</label>
                    <input type="text" name="doctor" class="form-control" value="<?= $medical['doctor_name']." / ".$medical['working_hours']; ?>" readonly>
                    <hr/>
                    <label for="daya">Suhu Tubuh:</label>
                    <input type="text" name="temperature" class="form-control" required>
                    <label for="daya">Berat Badan:</label>
                    <input type="text" name="weight" class="form-control" required>
                    <label for="daya">Tekanan Darah:</label>
                    <input type="text" name="presure" class="form-control" required>
                </div>
                <div class="form-group">
                    <input type="submit" class="btn btn-md btn-success mt-3" value="Simpan Data">
                    <a class="btn btn-md btn-secondary mt-3" href="index.php?route=role">Batal</a>
                </div>
            </form>
        </div>
    </div>
    </div>
</main>
  
<?php
include "src/views/layouts/script.php";
include "src/views/layouts/footer.php";
?>
