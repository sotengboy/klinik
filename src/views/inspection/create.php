<?php
require "src/views/layouts/header.php";
?>
<link href="vendor/select2/css/select2.min.css" rel="stylesheet">
<main class="col-12">
    <div class="card">
        <div class="card-header">
            <h3>Input Data Pemeriksaan Dokter</h3>
        </div>
        <div class="card-body">
            <form method="POST" action="index.php?route=inspection/create">
                <input type="hidden" value="<?= $medical['medical_id']; ?>" name="id">
                <div class="row">
                    <div class="col-6">
                        <div class="form-group">
                            <label>Jenis Layanan:</label>
                            <input type="text" name="type" class="form-control" value="<?= $medical['type']; ?>" readonly>
                            <label>Nama Pasien:</label>
                            <input type="text" name="patient_name" class="form-control" value="<?= $medical['patient_name']; ?>" readonly>
                            <label>Keluhan:</label>
                            <input type="text" name="complaints" class="form-control" value="<?= $medical['complaints']; ?>" readonly>
                            <label>Dokter:</label>
                            <input type="text" name="doctor" class="form-control" value="<?= $medical['doctor_name']." / ".$medical['working_hours']; ?>" readonly>
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="form-group">
                            <label>Suhu Tubuh:</label>
                            <input type="text" name="temperature" class="form-control" value="<?= $vital['temperature']; ?>" readonly>
                            <label>Berat Badan:</label>
                            <input type="text" name="weight" class="form-control" value="<?= $vital['weight']; ?>" readonly>
                            <label>Tekanan Darah:</label>
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
                        <input type="text" name="heart_beat" class="form-control" required>
                    </div>
                    <div class="col-6">
                        <label>Diagnosa:</label>
                        <input type="text" name="diagnosis" class="form-control" required>
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
                                    <input type="hidden" name="meds[]" id="type" value="0">
                                </td>
                                <td>
                                    <input name="dosage[]" placeholder="" />
                                </td>
                                <td>
                                <input name="qty[]" value="1" />
                                <input type="hidden" name="price[]" value="3000">

                                </td>
                                <td>
                                <input name="remark[]" placeholder="Keterangan Lain" />
                                </td>
                                <td style="text-align:right">
                                </td>
                            </tr>
                        </table>
                        <input type="number" class="d-none" name="totalPrice" id="totalPrice">
                        <input type="number" class="d-none" name="totalQty" id="totalQty">
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
                                        <?php if($med['med_id'] != 0): ?>
                                        <tr>
                                            <td><input type="checkbox"></td>
                                            <td><?= $med['med_id']; ?></td>
                                            <td><?= $med['med_name']; ?></td>
                                            <td class="d-none"><?= $med['price']; ?></td>
                                            <td><?= $med['description']; ?></td>
                                            <td><?= $med['unit']; ?></td>
                                            <td><?= $med['type']; ?></td>
                                        </tr>
                                        <?php endif; ?>
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
    </div>
</main>
<?php
include "src/views/layouts/script.php";
?>
<script src="vendor/select2/js/select2.min.js"></script>
<script>
    $(document).ready(function() {
        $('#obat').select2();
        $('#totalPrice').val(3000);
        $('#totalQty').val(1);
        $("#medSearch").on("keyup", function() {
            var value = $(this).val().toLowerCase();
            $("#itemList tr").filter(function() {
                $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
            });
        });
        var medModal = new bootstrap.Modal(document.getElementById('medicineModal'), {
            keyboard: false
        })
        let numRows = 0;
        let totalPrice = 0;
        let totalQty = 0;
        $('#medicineModal').on('click', '#addMed', function(){
            var tableControl = document.getElementById('itemTable');
            
            $('input:checkbox:checked', tableControl).each(function () {
                var id = $(this).closest('tr').find('td:eq(1)').text();
                var name = $(this).closest('tr').find('td:eq(2)').text();
                var price = $(this).closest('tr').find('td:eq(3)').text();
                $('#medHolder').append(`
                    <tr id="p_${numRows}">
                        <td id="labelType">
                            <input type="hidden" name="meds[]" id="type" value="${id}">
                            ${name}
                        </td>
                        <td>
                            <input name="dosage[]" required/>
                        </td>
                        <td>
                        <input type="number" name="qty[]" value="0" class="qty" id="qty-${numRows}" required />
                        <input type="hidden" name="price[]" id="price${numRows}" value="${price}">
                        </td>
                        <td>
                        <input name="remark[]" placeholder="Keterangan" />
                        </td>
                        <td>
                            <i class="fas fa-times text-danger removeRow" id="${numRows}-${price}" style="font-size:22px"></i>
                        </td>
                    </tr>`);
                numRows++
                totalPrice += parseInt(price);
            });
            // $('#totalPrice').val(totalPrice)
            medModal.hide();
        })

        $('#medHolder').on('click', '.removeRow', function() {  
            var row = $(this).attr('id');
            var arr = row.split('-');
            var id = arr[0];
            var val = arr[1];
            var q = $('#qty-'+id).val();
            
            var tot = $('#totalPrice').val();
            var qty = $('#totalQty').val();
            console.log("ID: "+id, "TOTAL: "+tot, "VAL: "+val, "QTY: "+q, "TOTQTY: "+qty)
            totalPrice = parseInt(tot) - parseInt(val);
            totalQty = parseInt(qty) - parseInt(q);
            $('#totalPrice').val(totalPrice);
            $('#totalQty').val(totalQty);
            $('#p_'+id).remove();
            return false;
        })
        $('#medHolder').on('input', '.qty', function () {
            let total = 0;
            let totalQty = 0
            $('.qty').each(function(index, value) {
                var row = $(this).attr('id');
                var arr = row.split('-');
                var id = arr[1];
                var qty = $(this).val();
                var price = $('#price'+id).val();
                console.log("ID: "+id, "QTY: "+qty, "PRICE "+price)
                var sub = parseInt(qty) * parseInt(price);
                total += sub;
                totalQty += parseInt(qty);

            })
            var totalVal = new Intl.NumberFormat('id-ID', { maximumSignificantDigits: 3 }).format(total)
            $('#totalPrice').val(total);
            $('#totalQty').val(totalQty);
            
        })
    });
</script>
<?php
include "src/views/layouts/footer.php";
?>
