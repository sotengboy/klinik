<?php
require_once 'src/config/database.php';

class Payment {
    private $conn;

    public function __construct() {
        $databaseConfig = new Database();
        $this->conn = $databaseConfig->getConnection();
    }

    public function createPayment($tagihan, $patient, $tanggal, $bulan, $admin, $total, $user) {
        $query = "INSERT INTO payments (id_tagihan, id_patient, tanggal_payment, bulan_bayar, biaya_admin, total_bayar, id_user) 
                    VALUES ('$tagihan', '$patient', '$tanggal', '$bulan', '$admin', '$total', '$user')";
        $this->conn->query($query);
        $update = "UPDATE tagihan SET status='Lunas' WHERE id_tagihan=$tagihan";
        $this->conn->query($update);
    }

    public function getAllPayment() {
        $query = "SELECT * FROM payments pay INNER JOIN medical_services med ON med.medical_id=pay.medical_id JOIN patients pat ON pat.patient_id=med.patient_id WHERE pay.medical_id=med.medical_id";
        $result = $this->conn->query($query);
        $payment = [];

        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $payment[] = $row;
            }
        }

        return $payment;
    }

    public function getPayment($id) {
        $query = "SELECT * FROM payments WHERE payment_id = '$id'";
        $result = $this->conn->query($query);
        // $payment = "";
        if($result !== false)
            $payment = $result->fetch_assoc();

        return $payment;
    }

    public function updatePayment($id, $patient, $bulan, $tahun, $meterAwal, $meterAhir) {
        $query = "UPDATE payments SET 
                    id_patient='$patient', 
                    bulan='$bulan', 
                    tahun='$tahun', 
                    meter_awal='$meterAwal', 
                    meter_ahir='$meterAhir'WHERE payment_id = $id";
        $this->conn->query($query);
    }

    public function deletePayment($id) {
        $query = "DELETE FROM payments WHERE payment_id = $id";
        $this->conn->query($query);
    }
}
?>
