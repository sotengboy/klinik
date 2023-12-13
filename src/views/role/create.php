<?php
require "src/views/layouts/header.php";
?>

<main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
    <div class="m-3">
    <h1>Buat Role</h1>
    <div class="row">
        <div class="col-6">
            <form method="POST" action="index.php?route=role/create">
                <div class="form-group">
                    <label for="nama">Nama Role:</label>
                    <input type="text" name="nama" class="form-control" required>
                </div>
                
                <input type="submit" class="btn btn-md btn-success mt-3" value="Buat Role">
            </form>
        </div>
    </div>
    </div>
</main>
  
<?php
include "src/views/layouts/footer.php";
?>
