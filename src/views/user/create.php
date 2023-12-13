<?php
require "src/views/layouts/header.php";
?>

<main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
    <div class="m-3">
    <h1>Buat User</h1>
    <div class="row">
        <div class="col-6">
            <form method="POST" action="index.php?route=user/create">
                <label for="nama">Nama:</label>
                <input type="text" name="nama" class="form-control" required>
                <label for="nama">Telepon:</label>
                <input type="text" name="phone" class="form-control" required>
                <label for="nama">Email:</label>
                <input type="email" name="email" class="form-control" required>
                <label for="role">Role:</label>
                <select name="role" class="form-control">
                    <option value="">-- Pilih Role --</option>
                    <?php foreach($role as $l){
                        echo '<option value="'.$l['role_id'].'">'.$l['role_name'].'</option>';
                    }?>
                </select>    
                
                <hr />
                <label for="email">Username:</label>
                <input type="text" name="username" class="form-control" required>
                <label for="email">Password:</label>
                <input type="password" name="password" class="form-control">
                <select name="status" class="form-control">
                    <option value="">-- Pilih Status --</option>
                    <option value="Active"> Active</option>
                    <option value="Inactive"> Inactive</option>
                </select>
                <input type="submit" class="btn btn-md btn-success mt-3" value="Buat User">
            </form>
        </div>
    </div>
    </div>
</main>
  
<?php
include "src/views/layouts/footer.php";
?>
