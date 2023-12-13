<?php
require "src/views/layouts/header.php";
?>

<main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
    <div class="m-3">
    <h1>Input Penggunaan</h1>
    <div class="row">
        <div class="col-6">
            <form method="POST" action="index.php?route=penggunaan/create">
                <label for="patient">Patient:</label>
                <select name="patient" class="form-control">
                    <option value="">-- Pilih Patient --</option>
                    <?php foreach($patient as $p){
                        echo '<option value="'.$p['id_patient'].'">'.$p['nama_patient'].'</option>';
                    }?>
                </select>    
                <label for="bulan">Bulan:</label>
                <select name="bulan" class="form-control">
                    <option value="">-- Pilih Bulan --</option>
                    <option value="1">Januari</option>
                    <option value="2">Februari</option>
                    <option value="3">Maret</option>
                    <option value="4">April</option>
                    <option value="5">Mei</option>
                    <option value="6">Juni</option>
                    <option value="7">Juli</option>
                    <option value="8">Agustus</option>
                    <option value="9">September</option>
                    <option value="10">Oktober</option>
                    <option value="11">November</option>
                    <option value="12">Desember</option>
                    
                </select> 
                <label for="email">Tahun:</label>
                <select name="tahun" class="form-control">
                    <option value="">-- Pilih Tahun --</option>
                    <?php
                    $past = date('Y', strtotime('-1 years'));
                    $now = date('Y');
                    ?>
                    <option value="<?=$past;?>"><?=$past;?></option>
                    <option value="<?=$now;?>"><?=$now;?></option>
                </select> 
                <label for="meterAwal">Meter Awal:</label>
                <input type="number" name="meterAwal" class="form-control" required>
                <label for="email">Meter Ahir:</label>
                <input type="number" name="meterAhir" class="form-control" required>
                <input type="submit" class="btn btn-md btn-success mt-3" value="Simpan">
            </form>
        </div>
    </div>
    </div>
</main>
  
<?php
include "src/views/layouts/footer.php";
?>
