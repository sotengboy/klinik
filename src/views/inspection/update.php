<?php
require "src/views/layouts/header.php";
?>

<main class="col-md-12 ms-sm-auto col-lg-12 px-md-4">
    <div class="m-3">
        <h1>Input Data Pemeriksaan Dokter</h1>
        
        <form method="POST" action="index.php?route=vital/update">
        <input type="hidden" value="<?= $medical['medical_id']; ?>" name="id">
            <div class="row">
                <div class="col-6">
                    <div class="form-group">
                        <label for="daya">Jenis Layanan:</label>
                        <input type="text" name="type" class="form-control" value="<?= $medical['type']; ?>" readonly>
                        <label for="daya">Nama Pasien:</label>
                        <input type="text" name="patient_name" class="form-control" value="<?= $medical['patient_name']; ?>" readonly>
                        <label for="daya">Keluhan:</label>
                        <input type="text" name="complaints" class="form-control" value="<?= $medical['complaints']; ?>" readonly>
                        <label for="daya">Dokter:</label>
                        <input type="text" name="doctor" class="form-control" value="<?= $medical['doctor_name']." / ".$medical['working_hours']; ?>" readonly>
                    </div>
                </div>
                <div class="col-6">
                    <div class="form-group">
                        <label for="daya">Suhu Tubuh:</label>
                        <input type="text" name="temperature" class="form-control" value="<?= $vital['temperature']; ?>" readonly>
                        <label for="daya">Berat Badan:</label>
                        <input type="text" name="weight" class="form-control" value="<?= $vital['weight']; ?>" readonly>
                        <label for="daya">Tekanan Darah:</label>
                        <input type="text" name="presure" class="form-control" value="<?= $vital['blood_presure']; ?>" readonly>
                    </div>
                </div>
            </div>
            <div class="row">
                    <div class="col-12">
                    <h4>Pemeriksaan Dokter</h4>
                    <hr>
                    </div>
                </div>
                <div class="row">
                    <div class="col-6">
                        <label>Detak Jantung:</label>
                        <input type="text" name="heart_beat" class="form-control" value="<?= $inspec['heart_beat']; ?>">
                    </div>
                    <div class="col-6">
                        <label>Diagnosa:</label>
                        <input type="text" name="diagnosis" class="form-control" value="<?= $inspec['diagnosis']; ?>">
                    </div>
                </div>
                <div class="row mt-2">
                    <div class="col-12">
                        <h4>Resep Obat</h4>
                        <hr>
                        
                        <button class="btn btn-md btn-success mb-2" type="button" data-bs-toggle="modal" data-bs-target="#medicineModal" id="addPayment">Tambah Obat</button>
                        <table id="medHolder" class="table">
                            <tr>
                                <th>Nama Obat</th>
                                <th>Dosis</th>
                                <th>QTY</th>
                                <th>Keterangan</th>
                                <th>X</th>
                            </tr>
                            <tr class="d-none">
                                <td id="labelType">
                                    <input type="hidden" name="meds[]" id="type" value="${id}">
                                </td>
                                <td>
                                    <input name="dosage[]" placeholder="" />
                                </td>
                                <td>
                                <input name="qty[]" placeholder="Jumlah" />
                                <input type="hidden" name="price[]" value="0">

                                </td>
                                <td>
                                <input name="remark[]" placeholder="Keterangan Lain" />
                                </td>
                                <td style="text-align:right">
                                </td>
                            </tr>
                        </table>
                        <input type="hidden" name="totalPrice" id="totalPrice">
                        <input type="hidden" name="totalQty" id="totalQty">
                        <div class="modal fade" id="medicineModal" tabindex="-1" aria-labelledby="medicineModalLabel" aria-hidden="true">
                          <div class="modal-dialog modal-lg">
                            <div class="modal-content">
                              <div class="modal-header">
                                <h5 class="modal-title" id="medicineModalLabel">Tambah Obat</h5>
                                <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close"></button>
                              </div>
                              <div class="modal-body">
                                <input type="text" placeholder="Cari obat..." class="form-control" id="medSearch">
                                <table class="table" id="itemTable">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Nama Obat</th>
                                            <th class="d-none">Harga</th>
                                            <th>ID</th>
                                            <th>Deskripsi</th>
                                            <th>Unit</th>
                                            <th>Tipe</th>
                                        </tr>
                                    </thead>
                                    <tbody id="itemList">
                                    <?php foreach($medicines as $med): ?>
                                        <tr>
                                            <td><input type="checkbox"></td>
                                            <td><?= $med['med_id']; ?></td>
                                            <td><?= $med['med_name']; ?></td>
                                            <td class="d-none"><?= $med['price']; ?></td>
                                            <td><?= $med['description']; ?></td>
                                            <td><?= $med['unit']; ?></td>
                                            <td><?= $med['type']; ?></td>
                                        </tr>
                                    <?php endforeach; ?>
                                    </tbody>
                                </table>
                                <small>Centang untuk memilih</small>
                              </div>
                              <div class="modal-footer">
                                <button type="button" class="btn btn-primary" id="addMed">Tambah</button>
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
                              </div>
                            </div>
                          </div>
                        </div>
                    </div>
                </div>
            <div class="row">
                <div class="col-12">
                    <hr>
                    <div class="form-group">
                        <input type="submit" class="btn btn-md btn-success mt-3" value="Simpan Data">
                        <a class="btn btn-md btn-secondary mt-3" href="index.php?route=role">Batal</a>
                    </div>
                </div>
            </div>
        </form>
    </div>
</main>
  
<?php
include "src/views/layouts/script.php";
include "src/views/layouts/footer.php";
?>
