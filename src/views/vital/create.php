<?php
require "src/views/layouts/header.php";
?>

<main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
    <div class="card">
        <div class="card-header">
            <h3>Input Data Pemeriksaan Tanda Vital</h3>
        </div>
        <div class="card-body">

            <form method="POST" action="index.php?route=vital/create">
                <div class="row">
                    <div class="col-6">
                        <input type="hidden" value="<?= $medical['medical_id']; ?>" name="id">
                        <div class="form-group">
                            <label>Jenis Layanan:</label>
                            <input type="text" name="type" class="form-control" value="<?= $medical['type']; ?>" readonly>
                            <label class="mt-3">Nama Pasien:</label>
                            <input type="text" name="patient_name" class="form-control" value="<?= $medical['patient_name']; ?>" readonly>
                            <label class="mt-3">Dokter:</label>
                            <input type="text" name="doctor" class="form-control" value="<?= $medical['doctor_name']." / ".$medical['working_hours']; ?>" readonly>
                            
                        </div>
                        <div class="form-group">
                            <input type="submit" class="btn btn-md btn-success mt-3" value="Simpan Data">
                            <a class="btn btn-md btn-secondary mt-3" href="index.php?route=role">Batal</a>
                        </div>
                    </div>
                    <div class="col-6">
                        <label>Keluhan:</label>
                        <input type="text" name="complaint" class="form-control" required>
                        <label>Suhu Tubuh:</label>
                        <input type="text" name="temperature" class="form-control" required>
                        <label class="mt-3">Berat Badan:</label>
                        <input type="text" name="weight" class="form-control" required>
                        <label class="mt-3">Tekanan Darah:</label>
                        <input type="text" name="presure" class="form-control" required>
                    </div>
                </div>
            </form>
        </div>
    </div>
</main>
  
<?php
include "src/views/layouts/script.php";
include "src/views/layouts/footer.php";
?>
