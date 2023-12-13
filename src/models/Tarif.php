<?php
require_once 'src/config/database.php';

class Tarif {
    private $conn;

    public function __construct() {
        $databaseConfig = new Database();
        $this->conn = $databaseConfig->getConnection();
    }

    public function createTarif($daya, $tarif) {
        $query = "INSERT INTO tarif (daya, tarifperkwh) VALUES ('$daya', '$tarif')";
        $this->conn->query($query);
    }

    public function getAllTarif() {
        $query = "SELECT * FROM tarif";
        $result = $this->conn->query($query);
        $tarif = [];

        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $tarif[] = $row;
            }
        }

        return $tarif;
    }

    public function getTarif($id) {
        $query = "SELECT * FROM tarif WHERE id_tarif = $id";
        $result = $this->conn->query($query);
        $tarif = $result->fetch_assoc();

        return $tarif;
    }

    public function updateTarif($tarifId, $daya, $tarif) {
        
        $query = "UPDATE tarif SET daya='$daya', tarifperkwh='$tarif' WHERE id_tarif=$tarifId";
        $this->conn->query($query);
    }

    public function deleteTarif($id) {
        $query = "DELETE FROM tarif WHERE id_tarif = $id";
        $this->conn->query($query);
    }
}
?>
