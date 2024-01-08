<?php
require_once 'src/config/database.php';

class Medicine {
    private $conn;

    public function __construct() {
        $databaseConfig = new Database();
        $this->conn = $databaseConfig->getConnection();
    }

    public function createMedicine($nama, $desc, $qty, $unit, $dosage, $price, $type, $status) {
        $query = "INSERT INTO medicines (med_name, description, qty, unit, dosage, price, type, status) VALUES ('$nama', '$desc', '$qty', '$unit', '$dosage', '$price', '$type', '$status')";
        $this->conn->query($query);
    }

    public function getAllMedicine() {
        $query = "SELECT * FROM medicines";
        $result = $this->conn->query($query);
        $medicine = [];

        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $medicine[] = $row;
            }
        }

        return $medicine;
    }

    public function getMedicine($id) {
        $query = "SELECT * FROM medicines WHERE med_id = $id";
        $result = $this->conn->query($query);
        $medicine = $result->fetch_assoc();

        return $medicine;
    }

    public function updateMedicine($id, $nama, $desc, $qty, $unit, $dosage, $price, $type, $status) {
        $query = "UPDATE medicines SET med_name = '$nama', description = '$desc', qty='$qty', unit='$unit', dosage='$dosage', price='$price', type='$type', status='$status' WHERE med_id = $id";
        $this->conn->query($query);
    }

    public function deleteMedicine($id) {
        $query = "DELETE FROM medicines WHERE med_id = $id";
        $this->conn->query($query);
    }
    public function getMedicineByMedicinename($username) {
        $query = "SELECT * FROM medicines WHERE username = ?";
        $stmt = $this->conn->prepare($query);
        $stmt->bind_param("s", $username);
        $stmt->execute();
        $result = $stmt->get_result();
        $medicine = $result->fetch_assoc();
        $stmt->close();

        return $medicine;
    }
    public function verifyPassword($password, $hashedPassword) {
        return password_verify($password, $hashedPassword);
    }
}
?>
