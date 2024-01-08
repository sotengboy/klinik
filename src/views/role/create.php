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
                <div class="form-group">
                    <label for="nama">Hak Akses:</label>
                    <table class="table table-sm">
                        <tr>
                            <td><input type="checkbox" name="access[]" value="registration" ></td>
                            <td>Pendaftaran</td>
                            <td><input type="checkbox" name="access[]" value="vital" ></td>
                            <td>Pemeriksaan Vital</td>
                        </tr>
                        <tr>
                            <td><input type="checkbox" name="access[]" value="doctor" ></td>
                            <td>Pemeriksaan Dokter</td>
                            <td><input type="checkbox" name="access[]" value="payment" ></td>
                            <td>Pembayaran</td>
                        </tr>
                        <tr>
                            <td><input type="checkbox" name="access[]" value="pharmacy" ></td>
                            <td>Farmasi</td>
                            <td><input type="checkbox" name="access[]" value="master" ></td>
                            <td>Master Data</td>
                        </tr>
                    </table>

                </div>
                <input type="submit" class="btn btn-md btn-success mt-3" value="Buat Role">
            </form>
        </div>
    </div>
    </div>
</main>
  
<?php
include "src/views/layouts/script.php";
include "src/views/layouts/footer.php";
?>
