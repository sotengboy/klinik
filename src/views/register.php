<?php
include "layouts/header.php";
?>
    <main class="form-signin text-center">
  <form action="" method="post">
    <h1 class="h3 mb-3 fw-normal">Form Pendaftaran</h1>
    <div class="form-floating mb-3">
      <input type="text" class="form-control" id="floatingInput" placeholder="Nama" name="nama">
      <label for="floatingInput">Nama</label>
    </div>
    <div class="form-floating mb-3">
      <input type="text" class="form-control" id="floatingInput" placeholder="Username" name="username">
      <label for="floatingInput">Username</label>
    </div>
    <div class="form-floating mb-3">
      <input type="password" class="form-control" id="floatingPassword" placeholder="Password" name="password">
      <label for="floatingPassword">Password</label>
    </div>
    <br />
    <button class="w-100 btn btn-lg btn-success mb-5" type="submit">Daftar</button>
  
    <p class="mt-5 mb-3 text-muted">&copy; 2023</p>
  </form>
</main>
<?php

include "layouts/footer.php";
