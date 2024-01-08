<?php
require "src/views/layouts/header.php";
?>

<main class="col-md-12 ms-sm-auto col-lg-12 px-md-4">
    <div class="m-3">
        <h1>Input Data Pemeriksaan Dokter</h1>
        <form method="POST" action="index.php?route=inspection/create">
            <input type="hidden" value="<?= $medical['medical_id']; ?>" name="id">
            <div class="row">
                <div class="col-6">
                    <div class="form-group">
                        <label for="daya">Jenis Layanan:</label>
                        <input type="text" name="type" class="form-control" value="<?= $medical['type']; ?>" readonly>
                        <label for="daya">Nama Pasien:</label>
                        <input type="text" name="patient_name" class="form-control" value="<?= $medical['patient_name']; ?>" readonly>
                        <label for="daya">Keluhan:</label>
                        <input type="text" name="complaints" class="form-control" value="<?= $medical['complaints']; ?>" readonly>
                        <label for="daya">Dokter:</label>
                        <input type="text" name="doctor" class="form-control" value="<?= $medical['doctor_name']." / ".$medical['working_hours']; ?>" readonly>
                    </div>
                </div>
                <div class="col-6">
                    <div class="form-group">
                        <label for="daya">Suhu Tubuh:</label>
                        <input type="text" name="temperature" class="form-control" value="<?= $vital['temperature']; ?>" readonly>
                        <label for="daya">Berat Badan:</label>
                        <input type="text" name="weight" class="form-control" value="<?= $vital['weight']; ?>" readonly>
                        <label for="daya">Tekanan Darah:</label>
                        <input type="text" name="presure" class="form-control" value="<?= $vital['blood_presure']; ?>" readonly>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-6">
                    <h4>Pemeriksaan Dokter</h4>
                    <hr>
                    <label for="daya">Detak Jantung:</label>
                    <input type="text" name="heart_beat" class="form-control">
                    <label for="daya">Diagnosa:</label>
                    <input type="text" name="diagnosis" class="form-control">
                </div>
                <div class="col-6">
                    <h4>Resep Obat</h4>
                    <hr>
                    <?php
                     if(empty($pres)){
                        echo '<input type="submit" name="prescription" class="btn btn-md btn-success mt-3" value="Buat Resep">';
                     }else{
                        echo '<button>Tambah Obat</button>';
                     } ?>
                </div>
            </div>
            <div class="row">
                <div class="col-12">
                    <hr>
                    <div class="form-group">
                        <input type="submit" class="btn btn-md btn-success mt-3" value="Simpan Data">
                        <a class="btn btn-md btn-secondary mt-3" href="index.php?route=role">Batal</a>
                    </div>
                </div>
            </div>
        </form>
    </div>
</main>
<?php
include "src/views/layouts/script.php";
include "src/views/layouts/footer.php";
?>
