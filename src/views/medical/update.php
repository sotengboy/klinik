<?php
require "src/views/layouts/header.php";
?>

<main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
    <div class="m-3">
    <h1>Input Medical</h1>
    <div class="row">
        <div class="col-6">
            <form method="POST" action="index.php?route=medical/update">
                <input type="hidden" name="id" value="<?=$pg['medical_id'];?>">
                <label for="patient">Patient:</label>
                <select name="patient" class="form-control">
                    <option value="">-- Pilih Pasien --</option>
                    <?php foreach($patient as $p){
                        $s1 = $p['patient_id'] == $pg['patient_id'] ? "selected" : "";
                        echo '<option value="'.$p['patient_id'].'" '.$s1.'>'.$p['full_name'].' / '.$p['medical_number'].'</option>';
                    }?>
                </select>
                <label for="jenis">Jenis Pasien:</label>
                <select name="type" class="form-control">
                    <option value="">-- Pilih Jenis Pasien --</option>
                    <option value="Umum" <?= $pg['type'] == "Umum" ? "selected" : "" ?>>Umum</option>
                    <option value="BPJS" <?= $pg['type'] == "BPJS" ? "selected" : "" ?>>BPJS</option>
                    <option value="Asuransi" <?= $pg['type'] == "Asuransi" ? "selected" : "" ?>>Asuransi</option>
                </select> 
                <label for="email">Jenis Layanan:</label>
                <select name="service" class="form-control">
                    <option value="">-- Pilih Jenis Layanan --</option>
                    <?php foreach($service as $s){
                        $s2 = $s['service_id'] == $pg['service_id'] ? "selected" : "";
                        echo '<option value="'.$s['service_id'].'" '.$s2.'>'.$s['service_name'].'</option>';
                    }?>
                </select> 
                <label for="keluhan">Keluhan:</label>
                <input type="text" name="complaints" class="form-control" value="<?=$pg['complaints'];?>" required>
                
                <label for="email">Dokter:</label>
                <select name="doctor" class="form-control">
                    <option value="">-- Pilih Dokter --</option>
                    <?php foreach($doctor as $d){
                        $s3 = $d['doctor_id'] == $pg['doctor_id'] ? "selected" : "";
                        echo '<option value="'.$d['doctor_id'].'" '.$s3.'>'.$d['full_name'].' / '.$d['working_hours'].'</option>';
                    }?>
                </select> 
                <input type="submit" class="btn btn-md btn-success mt-3" value="Ubah">
            </form>
        </div>
    </div>
    </div>
</main>
  
<?php
include "src/views/layouts/footer.php";
?>
