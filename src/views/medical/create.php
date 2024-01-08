<?php
require "src/views/layouts/header.php";
?>

<main class="col-12">
    <div class="card">
        <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
            <h3>Input Pendaftaran</h3>
            <a href="index.php?route=medical/list" class="btn btn-md btn-success mb-2">List Data Pendaftaran</a>
        </div>
        <div class="card-body">
            <div class="row">
                <div class="col-6">
                    <form method="POST" action="index.php?route=medical">
                        <label for="patient">Pasien:</label>
                        <div class="d-flex flex-row">
                            <select name="patient" class="form-control">
                                <option value="">-- Pilih Pasien --</option>
                                <?php foreach($patient as $p){
                                    echo '<option value="'.$p['patient_id'].'">'.$p['full_name'].' / '.$p['medical_number'].'</option>';
                                }?>
                            </select>
                            <button type="button" class="btn btn-primary ml-2" data-bs-toggle="modal" data-bs-target="#exampleModal">+</button>
                        </div>
                        <label for="jenis">Jenis Pasien:</label>
                        <select name="type" class="form-control">
                            <option value="">-- Pilih Jenis Pasien --</option>
                            <option value="Umum">Umum</option>
                            <option value="BPJS">BPJS</option>
                            <option value="Asuransi">Asuransi</option>
                        </select> 
                        <label for="email">Jenis Layanan:</label>
                        <select name="service" class="form-control">
                            <option value="">-- Pilih Jenis Layanan --</option>
                            <?php foreach($service as $s): ?>
                                <option value="<?= $s['service_id']; ?>"><?= $s['service_name']; ?></option>';
                            <?php endforeach; ?>
                        </select> 
                        
                        <label for="email">Dokter:</label>
                        <select name="doctor" class="form-control">
                            <option value="">-- Pilih Dokter --</option>
                            <?php foreach($doctor as $d): ?>
                                <option value="<?= $d['doctor_id']; ?>"><?= $d['full_name']; ?></option>
                            <?php endforeach; ?>
                        </select> 
                        
                        <input type="submit" class="btn btn-md btn-success mt-3" value="Simpan">
                    </form>
                    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                      <div class="modal-dialog modal-lg">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Tambah Pasien</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <form method="POST" action="index.php?route=patient/create">
                                    <div class="row">
                                        <div class="col-6">
                                            <input type="hidden" name="from" value="medical">
                                            <label for="name">Nama:</label>
                                            <input type="text" name="nama" class="form-control" required>
                                            <label class="mt-2">Alamat:</label>
                                            <input type="text" name="alamat" class="form-control" required>
                                            <label class="mt-2">Nomor Rekam Medik:</label>
                                            <input type="text" name="no_rm" class="form-control" value="<?= date('ymd').rand(100,999);?>" required>
                                            <label class="mt-2">Umur:</label>
                                            <input type="text" name="umur" class="form-control" required>
                                            <label class="mt-2">Jenis Kelamin:</label>
                                            <select name="jk" class="form-control">
                                                <option value="">-- Pilih Jenis Kelamin --</option>
                                                <option value="Laki-laki"> Laki-laki</option>
                                                <option value="Perempuan"> Perempuan</option>
                                            </select>
                                            <input type="submit" class="btn btn-md btn-success mt-2" value="Buat Pasien">
                                        </div>
                                        <div class="col-6">
                                            <label>NIK:</label>
                                            <input type="number" name="nik" class="form-control" required>
                                            <label class="mt-2">Telepon:</label>
                                            <input type="text" name="phone" class="form-control" required>
                                            <label class="mt-2">Email:</label>
                                            <input type="text" name="email" class="form-control">
                                            <label class="mt-2">Status:</label>
                                            <select name="status" class="form-control">
                                                <option value="">-- Pilih Status --</option>
                                                <option value="Active"> Active</option>
                                                <option value="Inactive"> Inactive</option>
                                            </select>
                                        </div>
                                    </div>
                                </form>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                <button type="button" class="btn btn-primary">Save changes</button>
                            </div>
                        </div>
                      </div>
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
