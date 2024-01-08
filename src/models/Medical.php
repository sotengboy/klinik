<?php
require_once 'src/config/database.php';

class Medical {
    private $conn;

    public function __construct() {
        $databaseConfig = new Database();
        $this->conn = $databaseConfig->getConnection();
    }

    public function createMedical($patient, $doctor, $user, $service, $trx, $date, $type, $admin) {
        $query = "INSERT INTO medical_services (patient_id, doctor_id, user_id, service_id, trx_no, date, type, admin_fee, subtotal, status) 
                    VALUES ('$patient', '$doctor', '$user', '$service', '$trx', '$date', '$type', '$admin', '$admin', 'Pending')";
        $this->conn->query($query);
    }

    public function getAllMedical() {
        $query = "SELECT ms.medical_id, date, p.full_name patient,ms.complaints, d.full_name doctor, ms.status FROM medical_services ms 
                    JOIN patients p ON ms.patient_id=p.patient_id
                    JOIN doctors d ON ms.doctor_id=d.doctor_id
                ";
        $result = $this->conn->query($query);
        $medical = [];

        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $medical[] = $row;
            }
        }

        return $medical;
    }
    public function getAllMedicalLimit($limit) {
        $query = "SELECT ms.medical_id, p.medical_number, ms.date, p.full_name patient,ms.complaints, d.full_name doctor, ms.status FROM medical_services ms 
                    JOIN patients p ON ms.patient_id=p.patient_id
                    JOIN doctors d ON ms.doctor_id=d.doctor_id
                    ORDER BY ms.date DESC LIMIT $limit
                ";
        $result = $this->conn->query($query);
        $medical = [];

        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $medical[] = $row;
            }
        }

        return $medical;
    }
    public function getAllMedicalByDoctor($doctor) {
        $query = "SELECT ms.medical_id, date, p.full_name patient,ms.complaints, d.full_name doctor, ms.status FROM medical_services ms 
                    JOIN patients p ON ms.patient_id=p.patient_id
                    JOIN doctors d ON ms.doctor_id=d.doctor_id
                    WHERE ms.doctor_id = $doctor
                ";
        $result = $this->conn->query($query);
        $medical = [];

        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $medical[] = $row;
            }
        }

        return $medical;
    }
    public function getMedical($id) {
        $query = "SELECT *, p.full_name patient_name, d.full_name doctor_name FROM medical_services m JOIN patients p ON p.patient_id=m.patient_id JOIN doctors d ON d.doctor_id=m.doctor_id WHERE medical_id =  $id";
        $result = $this->conn->query($query);
        $medical = $result->fetch_assoc();

        return $medical;
    }
    public function getMedicalByTrx($trx) {
        $query = "SELECT *, p.full_name patient_name, d.full_name doctor_name FROM medical_services m JOIN patients p ON p.patient_id=m.patient_id JOIN doctors d ON d.doctor_id=m.doctor_id WHERE trx_no = '$trx'";
        $result = $this->conn->query($query);
        $medical = $result->fetch_assoc();

        return $medical;
    }
    public function updateMedical($id, $patient, $doctor, $user, $service, $type, $complaints) {
        $query = "UPDATE medical_services SET 
                    patient_id='$patient', 
                    doctor_id='$doctor', 
                    user_id='$user', 
                    service_id='$service', 
                    type='$type',
                    complaints='$complaints'
                WHERE medical_id = $id";
        $this->conn->query($query);
    }

    public function deleteMedical($id) {
        $query = "DELETE FROM medical_services WHERE medical_id = $id";
        $this->conn->query($query);
    }
}
?>
