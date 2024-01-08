<?php
require "src/views/layouts/header.php";
?>

<main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
    <div class="m-3">
    <h1>Input Medical</h1>
    <div class="row">
        <div class="col-6">
            <form method="POST" action="index.php?route=medical/update">
                <input type="hidden" name="id" value="<?=$pg['id_medical'];?>">
                <label for="patient">Patient:</label>
                <select name="patient" class="form-control">
                    <option value="">-- Pilih Patient --</option>
                    <?php foreach($patient as $p){
                        $selected = $p['id_patient'] == $pg['id_patient'] ? 'selected' :'';
                        echo '<option value="'.$p['id_patient'].'" '.$selected.'>'.$p['nama_patient'].'</option>';
                    }?>
                </select>    
                <label for="bulan">Bulan:</label>
                <select name="bulan" class="form-control">
                    <option value="">-- Pilih Bulan --</option>
                    <option value="1" <?= $pg['bulan'] == 1 ? 'selected': ''; ?>>Januari</option>
                    <option value="2" <?= $pg['bulan'] == 2 ? 'selected': ''; ?>>Februari</option>
                    <option value="3" <?= $pg['bulan'] == 3 ? 'selected': ''; ?>>Maret</option>
                    <option value="4" <?= $pg['bulan'] == 4 ? 'selected': ''; ?>>April</option>
                    <option value="5" <?= $pg['bulan'] == 5 ? 'selected': ''; ?>>Mei</option>
                    <option value="6" <?= $pg['bulan'] == 6 ? 'selected': ''; ?>>Juni</option>
                    <option value="7" <?= $pg['bulan'] == 7 ? 'selected': ''; ?>>Juli</option>
                    <option value="8" <?= $pg['bulan'] == 8 ? 'selected': ''; ?>>Agustus</option>
                    <option value="9" <?= $pg['bulan'] == 9 ? 'selected': ''; ?>>September</option>
                    <option value="10" <?= $pg['bulan'] == 10 ? 'selected': ''; ?>>Oktober</option>
                    <option value="11" <?= $pg['bulan'] == 11 ? 'selected': ''; ?>>November</option>
                    <option value="12" <?= $pg['bulan'] == 12 ? 'selected': ''; ?>>Desember</option>
                    
                </select> 
                <label for="email">Tahun:</label>
                <select name="tahun" class="form-control">
                    <option value="">-- Pilih Tahun --</option>
                    <?php
                    $past = date('Y', strtotime('-1 years'));
                    $now = date('Y');
                    ?>
                    <option value="<?=$past;?>" <?php echo $past === $pg['tahun'] ? 'selected' : ''; ?>><?=$past;?></option>
                    <option value="<?=$now;?>" <?php echo $now === $pg['tahun'] ? 'selected' : ''; ?>><?=$now;?></option>
                </select> 
                <label for="meterAwal">Meter Awal:</label>
                <input type="number" name="meterAwal" class="form-control" value="<?=$pg['meter_awal'];?>" required>
                <label for="email">Meter Ahir:</label>
                <input type="number" name="meterAhir" class="form-control" value="<?=$pg['meter_ahir'];?>" required>
                <input type="submit" class="btn btn-md btn-success mt-3" value="Ubah">
            </form>
        </div>
    </div>
    </div>
</main>
  
<?php
include "src/views/layouts/script.php";
include "src/views/layouts/footer.php";
?>
