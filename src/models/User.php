<?php
require_once 'src/config/database.php';

class User {
    private $conn;

    public function __construct() {
        $databaseConfig = new Database();
        $this->conn = $databaseConfig->getConnection();
    }

    public function createUser($full_name, $username, $password, $email, $phone, $role, $status) {
        $query = "INSERT INTO users (username, password, full_name, email, phone, role, status) VALUES ('$username', '$password', '$full_name', '$email', '$phone', '$role', '$status')";
        $this->conn->query($query);
    }

    public function getAllUser() {
        $query = "SELECT * FROM users INNER JOIN `role` ON users.role=role.role_id";
        $result = $this->conn->query($query);
        $user = [];

        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $user[] = $row;
            }
        }

        return $user;
    }

    public function getUser($id) {
        $query = "SELECT * FROM users WHERE user_id = $id";
        $result = $this->conn->query($query);
        $user = $result->fetch_assoc();

        return $user;
    }

    public function updateUser($id, $username, $password, $nama, $email, $phone, $role, $status ) {
        $query = "UPDATE users SET username = '$username', password = '$password', full_name='$nama', email='$email', phone='$phone', role='$role', status='$status' WHERE user_id = $id";
        $this->conn->query($query);
    }

    public function deleteUser($id) {
        $query = "DELETE FROM users WHERE user_id = $id";
        $this->conn->query($query);
    }
    public function getUserByUsername($username) {
        $query = "SELECT * FROM users WHERE username = ?";
        $stmt = $this->conn->prepare($query);
        $stmt->bind_param("s", $username);
        $stmt->execute();
        $result = $stmt->get_result();
        $user = $result->fetch_assoc();
        $stmt->close();

        return $user;
    }
    public function verifyPassword($password, $hashedPassword) {
        return password_verify($password, $hashedPassword);
    }
}
?>
