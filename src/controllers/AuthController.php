<?php
require_once 'src/models/User.php';

class AuthController {
    private $userModel;

    public function __construct() {
        $this->userModel = new User();
    }

    public function login() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $username = $_POST['username'];
            $password = $_POST['password'];

            $user = $this->userModel->getUserByUsername($username);
            if ($user && $this->userModel->verifyPassword($password, $user['password'])) {
                $_SESSION['user_id'] = $user['user_id'];
                $_SESSION['admin_name'] = $user['full_name'];
                session_write_close();
                echo '<meta http-equiv="refresh" content="0;url=index.php?route=home"/>';
                return true;
            } else {
                echo 'Invalid username or password';
            }
            
        }

        require_once 'src/views/login.php';
    }
    
    public function logout() {
        session_start();
        session_unset();
        session_destroy();

        header('Location: index.php?route=login');
        exit();
    }
}
?>
