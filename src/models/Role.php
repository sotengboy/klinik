<?php
require_once 'src/config/database.php';

class Role {
    private $conn;

    public function __construct() {
        $databaseConfig = new Database();
        $this->conn = $databaseConfig->getConnection();
    }

    public function createRole($role) {
        $query = "INSERT INTO role (role_name) VALUES ('$role')";
        $this->conn->query($query);
    }

    public function getAllRole() {
        $query = "SELECT * FROM role";
        $result = $this->conn->query($query);
        $role = [];

        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $role[] = $row;
            }
        }

        return $role;
    }

    public function getRole($id) {
        $query = "SELECT * FROM role WHERE role_id = $id";
        $result = $this->conn->query($query);
        $role = $result->fetch_assoc();

        return $role;
    }

    public function updateRole($roleId, $role) {
        
        $query = "UPDATE role SET role_name='$role' WHERE role_id=$roleId";
        $this->conn->query($query);
    }

    public function deleteRole($id) {
        $query = "DELETE FROM role WHERE role_id = $id";
        $this->conn->query($query);
    }
}
?>
