<?php
require_once 'src/config/database.php';

class Penggunaan {
    private $conn;

    public function __construct() {
        $databaseConfig = new Database();
        $this->conn = $databaseConfig->getConnection();
    }

    public function createPenggunaan($patient, $bulan, $tahun, $meterAwal, $meterAhir) {
        $query = "INSERT INTO penggunaan (id_patient, bulan, tahun, meter_awal, meter_ahir) 
                    VALUES ('$patient', '$bulan', '$tahun', '$meterAwal', '$meterAhir')";
        $this->conn->query($query);
    }

    public function getAllPenggunaan() {
        $query = "SELECT * FROM penggunaan JOIN patient ON penggunaan.id_patient=patient.id_patient ";
        $result = $this->conn->query($query);
        $penggunaan = [];

        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $penggunaan[] = $row;
            }
        }

        return $penggunaan;
    }

    public function getPenggunaan($id) {
        $query = "SELECT * FROM penggunaan INNER JOIN patient ON penggunaan.id_patient=patient.id_patient INNER JOIN tarif ON patient.id_tarif=tarif.id_tarif WHERE id_penggunaan = $id";
        $result = $this->conn->query($query);
        $penggunaan = $result->fetch_assoc();

        return $penggunaan;
    }

    public function updatePenggunaan($id, $patient, $bulan, $tahun, $meterAwal, $meterAhir) {
        $query = "UPDATE penggunaan SET 
                    id_patient='$patient', 
                    bulan='$bulan', 
                    tahun='$tahun', 
                    meter_awal='$meterAwal', 
                    meter_ahir='$meterAhir'WHERE id_penggunaan = $id";
        $this->conn->query($query);
    }

    public function deletePenggunaan($id) {
        $query = "DELETE FROM penggunaan WHERE id_penggunaan = $id";
        $this->conn->query($query);
    }
    public function createTagihan($id){
        $penggunaan = $this->getPenggunaan($id);
        $meterAwal = $penggunaan['meter_awal'];
        $meterAhir = $penggunaan['meter_ahir'];
        $patient = $penggunaan['id_patient'];
        $bulan = $penggunaan['bulan'];
        $tahun = $penggunaan['tahun'];
        $jumlah = $meterAhir - $meterAwal;
        $tarif = $penggunaan['tarifperkwh'];
        $total = $jumlah*$tarif; 

        $query = "INSERT INTO tagihan (id_penggunaan, id_patient, bulan, tahun, jumlah_meter, total_tagihan, status) 
                    VALUES ('$id', '$patient', '$bulan', '$tahun', '$jumlah', '$total', 'Pending')";
        $this->conn->query($query);
        
        $update = "UPDATE penggunaan SET tagihan=1 WHERE id_penggunaan=$id";
        $this->conn->query($update);
    }
}
?>
