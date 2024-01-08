<?php
require_once 'src/config/database.php';

class Patient {
    private $conn;

    public function __construct() {
        $databaseConfig = new Database();
        $this->conn = $databaseConfig->getConnection();
    }

    public function createPatient($name,$address,$no_rm,$age,$gender,$no_id,$phone,$email,$status) {
        $query = "INSERT INTO patients (full_name,address,medical_number,age,gender,nik,phone,email,status) 
                    VALUES ('$name', '$address', '$no_rm', '$age', '$gender', '$no_id','$phone','$email','$status')";
        $this->conn->query($query);
    }

    public function getAllPatient() {
        $query = "SELECT * FROM patients";
        $result = $this->conn->query($query);
        $patient = [];

        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $patient[] = $row;
            }
        }

        return $patient;
    }
    public function countPatient() {
        $query = "SELECT * FROM patients";
        $result = $this->conn->query($query);
        $patient = $result->num_rows;

        return $patient;
    }
    public function getPatient($id) {
        $query = "SELECT * FROM patients WHERE patient_id = $id";
        $result = $this->conn->query($query);
        $patient = $result->fetch_assoc();

        return $patient;
    }

    public function updatePatient($id, $name,$address,$no_rm,$age,$gender,$no_id,$phone,$email,$status) {
        $query = "UPDATE patients SET 
                    full_name='$name', 
                    address='$address', 
                    medical_number='$no_rm', 
                    age='$age',
                    gender='$gender',
                    nik='$nik',
                    phone='$phone',
                    email='$email',
                    status='$status'
                    WHERE patient_id = $id";
        $this->conn->query($query);
    }

    public function deletePatient($id) {
        $query = "DELETE FROM patients WHERE patient_id = $id";
        $this->conn->query($query);
    }
}
?>
