<?php
require_once 'src/config/database.php';

class Doctor {
    private $conn;

    public function __construct() {
        $databaseConfig = new Database();
        $this->conn = $databaseConfig->getConnection();
    }

    public function createDoctor($full_name, $username, $password, $email, $phone, $skill, $working_hours, $fee, $status) {
        $query = "INSERT INTO doctors (username, password, full_name, email, phone, skill, working_hours, fee, status) VALUES ('$username', '$password', '$full_name', '$email', '$phone', '$skill', '$working_hours', '$fee', '$status')";
        $this->conn->query($query);
    }

    public function getAllDoctor() {
        $query = "SELECT * FROM doctors";
        $result = $this->conn->query($query);
        $doctor = [];

        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $doctor[] = $row;
            }
        }

        return $doctor;
    }

    public function countDoctor() {
        $query = "SELECT * FROM doctors";
        $result = $this->conn->query($query);
        $doctor = $result->num_rows;

        return $doctor;
    }

    public function getDoctor($id) {
        $query = "SELECT * FROM doctors WHERE doctor_id = $id";
        $result = $this->conn->query($query);
        $doctor = $result->fetch_assoc();

        return $doctor;
    }

    public function updateDoctor($id, $username, $password, $nama, $email, $phone, $skill, $working_hours, $fee, $status ) {
        $query = "UPDATE doctors SET username = '$username', password = '$password', full_name='$nama', email='$email', phone='$phone', skill='$skill', working_hours='$working_hours', fee='$fee', status='$status' WHERE doctor_id = $id";
        $this->conn->query($query);
    }

    public function deleteDoctor($id) {
        $query = "DELETE FROM doctors WHERE doctor_id = $id";
        $this->conn->query($query);
    }
    public function getDoctorByDoctorname($username) {
        $query = "SELECT * FROM doctors WHERE username = ?";
        $stmt = $this->conn->prepare($query);
        $stmt->bind_param("s", $username);
        $stmt->execute();
        $result = $stmt->get_result();
        $doctor = $result->fetch_assoc();
        $stmt->close();

        return $doctor;
    }
    public function verifyPassword($password, $hashedPassword) {
        return password_verify($password, $hashedPassword);
    }
}
?>
