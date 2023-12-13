<?php
require_once 'src/config/database.php';

class Pembayaran {
    private $conn;

    public function __construct() {
        $databaseConfig = new Database();
        $this->conn = $databaseConfig->getConnection();
    }

    public function createPembayaran($tagihan, $patient, $tanggal, $bulan, $admin, $total, $user) {
        $query = "INSERT INTO pembayaran (id_tagihan, id_patient, tanggal_pembayaran, bulan_bayar, biaya_admin, total_bayar, id_user) 
                    VALUES ('$tagihan', '$patient', '$tanggal', '$bulan', '$admin', '$total', '$user')";
        $this->conn->query($query);
        $update = "UPDATE tagihan SET status='Lunas' WHERE id_tagihan=$tagihan";
        $this->conn->query($update);
    }

    public function getAllTagihan() {
        $query = "SELECT * FROM tagihan INNER JOIN patient ON tagihan.id_patient=patient.id_patient INNER JOIN penggunaan ON  tagihan.id_penggunaan=penggunaan.id_penggunaan";
        $result = $this->conn->query($query);
        $pembayaran = [];

        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $pembayaran[] = $row;
            }
        }

        return $pembayaran;
    }

    public function getPembayaran($id) {
        $query = "SELECT * FROM pembayaran WHERE id_pembayaran = $id";
        $result = $this->conn->query($query);
        $pembayaran = $result->fetch_assoc();

        return $pembayaran;
    }

    public function updatePembayaran($id, $patient, $bulan, $tahun, $meterAwal, $meterAhir) {
        $query = "UPDATE pembayaran SET 
                    id_patient='$patient', 
                    bulan='$bulan', 
                    tahun='$tahun', 
                    meter_awal='$meterAwal', 
                    meter_ahir='$meterAhir'WHERE id_pembayaran = $id";
        $this->conn->query($query);
    }

    public function deletePembayaran($id) {
        $query = "DELETE FROM pembayaran WHERE id_pembayaran = $id";
        $this->conn->query($query);
    }
    public function createTagihan($id){
        $pembayaran = $this->getPembayaran($id);
        $meterAwal = $pembayaran['meter_awal'];
        $meterAhir = $pembayaran['meter_ahir'];
        $patient = $pembayaran['id_patient'];
        $bulan = $pembayaran['bulan'];
        $tahun = $pembayaran['tahun'];
        $jumlah = $meterAhir - $meterAwal;

        $query = "INSERT INTO tagihan (id_pembayaran, id_patient, bulan, tahun, jumlah_meter, status) 
                    VALUES ('$id', '$patient', '$bulan', '$tahun', '$jumlah', 'Pending')";
        $this->conn->query($query);
        $update = "UPDATE pembayaran SET tagihan=1 WHERE id_pembayaran=$id";
        $this->conn->query($update);
    }
    public function getTagihan($id){
        $query = "SELECT * from tagihan INNER JOIN patient ON tagihan.id_patient=patient.id_patient WHERE id_tagihan=$id";
        $result = $this->conn->query($query);
        $tagihan = $result->fetch_assoc();
        return $tagihan;
    }
}
?>
