<?php
require_once 'src/config/database.php';

class Service {
    private $conn;

    public function __construct() {
        $databaseConfig = new Database();
        $this->conn = $databaseConfig->getConnection();
    }

    public function createService($name, $desc, $price, $status) {
        $query = "INSERT INTO services (service_name, service_desc, service_price, status) VALUES ('$name', '$desc', '$price', '$status')";
        $this->conn->query($query);
    }

    public function getAllService() {
        $query = "SELECT * FROM services";
        $result = $this->conn->query($query);
        $service = [];

        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $service[] = $row;
            }
        }

        return $service;
    }
    public function countService() {
        $query = "SELECT * FROM services";
        $result = $this->conn->query($query);
        $services = $result->num_rows;

        return $services;
    }
    public function getService($id) {
        $query = "SELECT * FROM services WHERE service_id = $id";
        $result = $this->conn->query($query);
        $service = $result->fetch_assoc();

        return $service;
    }

    public function updateService($id, $name, $desc, $price, $status) {
        
        $query = "UPDATE services SET service_name='$name', service_desc='$desc', service_price='$price', status='$status' WHERE service_id=$id";
        $this->conn->query($query);
    }

    public function deleteService($id) {
        $query = "DELETE FROM services WHERE service_id = $id";
        $this->conn->query($query);
    }
}
?>
