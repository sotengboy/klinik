<?php
include "layouts/auth/header.php";
?>
    <!-- <main class="form-signin text-center">
  <form action="" method="post">
    <h1 class="h3 mb-3 fw-normal">Silahkan Login</h1>

    <div class="form-floating mb-3">
      <input type="text" class="form-control" id="floatingInput" placeholder="username" name="username">
      <label for="floatingInput">Username</label>
    </div>
    <div class="form-floating">
      <input type="password" class="form-control" id="floatingPassword" placeholder="Password" name="password">
      <label for="floatingPassword">Password</label>
    </div>
    <button class="w-100 btn btn-lg btn-success mb-5" type="submit">Masuk</button>
  </form>
</main> -->
<div class="row justify-content-center">

            <div class="col-xl-10 col-lg-12 col-md-9">

                <div class="card o-hidden border-0 shadow-lg my-5">
                    <div class="card-body p-0">
                        <!-- Nested Row within Card Body -->
                        <div class="row">
                            <div class="col-lg-6 d-none d-lg-block bg-login-image"></div>
                            <div class="col-lg-6">
                                <div class="p-5">
                                    <div class="text-center">
                                        <h1 class="h4 text-gray-900 mb-4">Selamat Datang Di Sistem Informasi Klinik Mufad Medika Bekasi</h1>
                                    </div>
                                    <form class="user" action="" method="post">
                                        <div class="form-group">
                                            <input type="text" class="form-control form-control-user"
                                                id="exampleInputUsername" aria-describedby="usernameHelp"
                                                placeholder="Username" name="username">
                                        </div>
                                        <div class="form-group">
                                            <input type="password" class="form-control form-control-user"
                                                id="exampleInputPassword" placeholder="Password" name="password">
                                        </div>
                                        
                                        <!-- <a href="index.html" class="btn btn-success btn-user btn-block">
                                            Login
                                        </a> -->
                                        <button class="btn btn-success btn-user btn-block mb-5" type="submit">Masuk</button>
                                        
                                    </form>
                                    <hr>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>

        </div>
<?php

include "layouts/auth/footer.php";
