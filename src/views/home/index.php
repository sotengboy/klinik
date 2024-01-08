<?php
require "src/views/layouts/header.php";
?>

<main class="container-fluid">
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Dashboard</h1>
    </div>
    <div class="row">
        <!-- Earnings (Monthly) Card Example -->
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-primary shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                Jumlah Pasien</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800"><?= $patients; ?></div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-users fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Earnings (Monthly) Card Example -->
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-success shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                                Jumlah Dokter</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800"><?= $doctors; ?></div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-user-md fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Earnings (Monthly) Card Example -->
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-info shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-info text-uppercase mb-1">Jumlah Layanan
                            </div>
                            <div class="row no-gutters align-items-center">
                                <div class="col-auto">
                                    <div class="h5 mb-0 mr-3 font-weight-bold text-gray-800"><?= $services; ?></div>
                                </div>
                            </div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-clipboard-list fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Pending Requests Card Example -->
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-warning shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">
                                Total Pemeriksaan</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800"><?= $inspections; ?></div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-comments fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h4 class="h4">Menu Cepat</h4>
    </div>
    <div class="row">
        <div class="col-3 mb-4">
            <div class="card bg-primary text-white shadow">
                <div class="card-body">
                    Pendaftaran
                    <div class="text-white-50 small">#4e73df</div>
                </div>
            </div>
        </div>
        <div class="col-3 mb-4">
            <div class="card bg-success text-white shadow">
                <div class="card-body">
                    Primary
                    <div class="text-white-50 small">#4e73df</div>
                </div>
            </div>
        </div>
        <div class="col-3 mb-4">
            <div class="card bg-info text-white shadow">
                <div class="card-body">
                    Primary
                    <div class="text-white-50 small">#4e73df</div>
                </div>
            </div>
        </div>
        <div class="col-3 mb-4">
            <div class="card bg-warning text-white shadow">
                <div class="card-body">
                    Primary
                    <div class="text-white-50 small">#4e73df</div>
                </div>
            </div>
        </div>
    </div> -->
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    Data Pendaftaran Rawat Jalan Terahir
                </div>
                <div class="card-body">
                    <div class="">
                        <table class="table table-striped">
                            <thead>
                                <th>#</th>
                                <th>Tanggal</th>
                                <th>Nomor RM</th>
                                <th>Nama Pasien</th>
                                <th>Nama Dokter</th>
                            </thead>
                            <tbody>
                                <?php 
                                $no = 0;
                                foreach($medical as $m):
                                    $no++;
                                ?>
                                    <tr>
                                        <td><?= $no; ?></td>
                                        <td><?= $m['date']; ?></td>
                                        <td><?= $m['medical_number']; ?></td>
                                        <td><?= $m['patient']; ?></td>
                                        <td><?= $m['doctor']; ?></td>
                                    </tr>
                                <?php endforeach; ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>
<?php
include "src/views/layouts/script.php";
include "src/views/layouts/footer.php";
?>
