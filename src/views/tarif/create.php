<?php
require "src/views/layouts/header.php";
?>

<main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
    <div class="m-3">
    <h1>Buat Tarif</h1>
    <div class="row">
        <div class="col-6">
            <form method="POST" action="index.php?route=tarif/create">
                <div class="form-group">
                    <label for="daya">Daya:</label>
                    <input type="number" name="daya" class="form-control" required>
                </div>
                <div class="form-group">
                    <label for="tarif">Tarif Per KWH:</label>
                    <input type="number" name="tarif" class="form-control" required>
                </div>
                
                <input type="submit" class="btn btn-md btn-success mt-3" value="Buat Tarif">
            </form>
        </div>
    </div>
    </div>
</main>
  
<?php
include "src/views/layouts/footer.php";
?>
