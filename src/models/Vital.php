<?php
require_once 'src/config/database.php';

class Vital {
    private $conn;

    public function __construct() {
        $databaseConfig = new Database();
        $this->conn = $databaseConfig->getConnection();
    }

    public function createVital($id, $complaint, $temp, $presure, $weight, $status) {
        // $mm = "SELECT * from medical_services WHERE medical_id=$id";
        // $mmm = $this->conn->query($mm);
        // $m = $mmm->fetch_assoc();
        // $medical = $m['service_id'];
        $user = $_SESSION['user_id'];
        $up = "UPDATE medical_services SET complaints='$complaint', status='$status' WHERE medical_id=$id";
        $upp = $this->conn->query($up);
        $query = "INSERT INTO vital_sign (user_id, medical_id, blood_presure, temperature, weight) VALUES ('$user', '$id', '$presure', '$temp', '$weight')";

        $this->conn->query($query);
    }

    public function getAllVital() {
        $query = "SELECT * FROM medical_services WHERE date=CURDATE()";
        $result = $this->conn->query($query);
        $vital = [];

        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $vital[] = $row;
            }
        }

        return $vital;
    }
    public function getAllMedical() {
        $query = "SELECT ms.medical_id, date, p.full_name patient,ms.complaints, d.full_name doctor, ms.status 
        FROM medical_services ms 
        JOIN patients p ON ms.patient_id=p.patient_id
        JOIN doctors d ON ms.doctor_id=d.doctor_id WHERE ms.status = 'Pending'";
        $result = $this->conn->query($query);
        $vital = [];

        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $vital[] = $row;
            }
        }

        return $vital;
    }

    public function getVital($id) {
        $query = "SELECT * FROM vitals WHERE vital_id = $id";
        $result = $this->conn->query($query);
        $vital = $result->fetch_assoc();

        return $vital;
    }
    public function getVitalByMedical($medical) {
        $query = "SELECT * FROM vital_sign WHERE medical_id = $medical";
        $result = $this->conn->query($query);
        $vital = $result->fetch_assoc();

        return $vital;
    }
    public function updateVital($id, $name, $desc, $price, $status) {
        
        $query = "UPDATE vital_sign SET vital_name='$name', vital_desc='$desc', vital_price='$price', status='$status' WHERE vital_id=$id";
        $this->conn->query($query);
    }

    public function deleteVital($id) {
        $query = "DELETE FROM vital_sign WHERE vital_id = $id";
        $this->conn->query($query);
    }
}
?>
