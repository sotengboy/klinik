<?php
require_once 'src/config/database.php';

class Inspection {
    private $conn;

    public function __construct() {
        $databaseConfig = new Database();
        $this->conn = $databaseConfig->getConnection();
    }

    public function createInspection($id, $hb, $diagnosis) {
        $mm = "SELECT * from medical_services WHERE medical_id=$id";
        $mmm = $this->conn->query($mm);
        $m = $mmm->fetch_assoc();
        $doctor = $m['doctor_id'];
        $user = $_SESSION['user_id'];
        $date = date('Y-m-d');
        $status = "Inspection";
        $up = "UPDATE medical_services SET status='$status' WHERE medical_id=$id";
        $upp = $this->conn->query($up);
        $query = "INSERT INTO inspections (medical_id, doctor_id, date, heart_beat, diagnosis) VALUES ('$id', '$doctor', '$date', '$hb', '$diagnosis')";
        $this->conn->query($query);
    }

    public function getAllInspection() {
        $query = "SELECT * FROM medical_services WHERE date=CURDATE()";
        $result = $this->conn->query($query);
        $inspection = [];

        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $inspection[] = $row;
            }
        }

        return $inspection;
    }
    public function getAllMedical() {
        $query = "SELECT ms.medical_id, date, p.full_name patient,ms.complaints, d.full_name doctor, ms.status FROM medical_services ms 
        JOIN patients p ON ms.patient_id=p.patient_id
        JOIN doctors d ON ms.doctor_id=d.doctor_id WHERE ms.date=CURDATE()";
        $result = $this->conn->query($query);
        $inspection = [];

        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $inspection[] = $row;
            }
        }

        return $inspection;
    }

    public function getInspection($id) {
        $query = "SELECT * FROM inspections WHERE medical_id = $id";
        $result = $this->conn->query($query);
        $inspection = $result->fetch_assoc();

        return $inspection;
    }

    public function updateInspection($id, $name, $desc, $price, $status) {
        
        $query = "UPDATE inspections SET inspection_name='$name', inspection_desc='$desc', inspection_price='$price', status='$status' WHERE inspection_id=$id";
        $this->conn->query($query);
    }

    public function deleteInspection($id) {
        $query = "DELETE FROM inspections WHERE inspection_id = $id";
        $this->conn->query($query);
    }
    public function getPrescription($id) {
        $query = "SELECT * from prescriptions WHERE medical_id='$id'";
        $result = $this->conn->query($query);
        $prescription = $result->fetch_assoc();
        return $prescription;
    }
    public function createPrescription($id) {
        $query = "INSERT INTO prescriptions (medical_id,total_price, total_qty) VALUE ('$id', '0', '0');";
        $this->conn->query($query);
    }
    public function countInspection() {
        $query = "SELECT * FROM inspections";
        $result = $this->conn->query($query);
        $inspections = $result->num_rows;

        return $inspections;
    }
}   
?>
