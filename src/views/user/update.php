<?php
require "src/views/layouts/header.php";
?>

<main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
    <div class="m-3">
    <h1>Ubah User</h1>
    <div class="row">
        <div class="col-6">
            <form method="POST" action="index.php?route=user/update">
                <input type="hidden" name="id" value="<?=$user['user_id']; ?>">
                <label for="nama">Nama:</label>
                <input type="text" name="nama" class="form-control" value="<?=$user['full_name'];?>" required>
                <label for="nama">Telepon:</label>
                <input type="text" name="phone" class="form-control" value="<?=$user['phone'];?>" required>
                <label for="nama">Email:</label>
                <input type="email" name="email" class="form-control" value="<?=$user['email'];?>" required>
                <label for="role">Role:</label>
                <select name="role" class="form-control">
                    <option value="">-- Pilih Role --</option>
                    <?php foreach($role as $l){
                        $selected = $l['role_id'] == $user['role'] ? 'selected':'';
                        echo '<option value="'.$l['role_id'].'" '.$selected.'>'.$l['role_name'].'</option>';
                    }?>
                </select>    
                
                <hr />
                <label for="email">Username:</label>
                <input type="text" name="username" class="form-control" value="<?=$user['username'];?>" required>
                <label for="email">Password:</label>
                <input type="password" name="password" class="form-control">
                <p><small>* Kosongkan password jika tidak ubah password</small></p>
                <select name="status" class="form-control">
                    <option value="">-- Pilih Status --</option>
                    <option value="Active"  <?= $user['status'] == 'Active' ? 'selected' : '' ?>> Active</option>
                    <option value="Inactive" <?= $user['status'] == 'Inactive' ? 'selected' : '' ?>> Inactive</option>
                </select>
                <input type="submit" class="btn btn-md btn-success mt-3" value="Ubah User">
            </form>
        </div>
    </div>
    </div>
</main>
  
<?php
include "src/views/layouts/script.php";
include "src/views/layouts/footer.php";
?>
