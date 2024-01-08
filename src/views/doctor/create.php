<?php
require "src/views/layouts/header.php";
?>

<main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
    <div class="card">
        <div class="card-header">
            <h1>Buat Data Dokter</h1>
        </div>
        <div class="card-body">
            <form method="POST" action="index.php?route=doctor/create">
                <div class="row">
                    <div class="col-6">
                        <label for="nama">Nama:</label>
                        <input type="text" name="nama" class="form-control" required>
                        <label for="nama">Spesialis:</label>
                        <select name="skill" class="form-control">
                            <option value="">-- Pilih Spesialis --</option>
                            <option value="Umum">Umum</option>
                            <option value="Gigi">Dokter Gigi</option>
                        </select>  
                        <label for="nama">Jam Kerja:</label>
                        <input type="text" name="working_hours" class="form-control" required>
                        <label for="nama">Telepon:</label>
                        <input type="text" name="phone" class="form-control" required>
                        <label for="nama">Email:</label>
                        <input type="email" name="email" class="form-control" required>  
                        
                        <input type="submit" class="btn btn-md btn-success mt-3" value="Simpan Data">
                        <a href="index.php?route=doctor" class="btn btn-md btn-secondary mt-3">Batal</a>
                    
                    </div>
                    <div class="col-6">
                        <label for="nama">Biaya Jasa:</label>
                        <input type="text" name="fee" class="form-control" required>
                        <label for="status">Status:</label>
                        <select name="status" class="form-control">
                            <option value="">-- Pilih Status --</option>
                            <option value="Active"> Active</option>
                            <option value="Inactive"> Inactive</option>
                        </select>
                        <hr />
                        <label for="email">Username:</label>
                        <input type="text" name="username" class="form-control" required>
                        <label for="email">Password:</label>
                        <input type="password" name="password" class="form-control">
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
