<?php
require_once 'src/models/User.php';
require_once 'src/models/Role.php';

class UserController {
    private $userModel;
    private $roleModel;

    public function __construct() {
        $this->userModel = new User();
        $this->roleModel = new Role();
    }

    public function create() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            
            $nama = $_POST['nama'];
            $phone = $_POST['phone'];
            $email = $_POST['email'];
            $role = $_POST['role'];
            $status = $_POST['status'];
            $username = $_POST['username'];
            $password = $_POST['password'];
            
            if (empty($nama) || empty($phone) || empty($email) || empty($role) || empty($username) || empty($password) || empty($status)) {
                echo "Harap isi semua field.";
                return;
            }
            $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

            $this->userModel->createUser($nama, $username, $hashedPassword, $email, $phone, $role, $status);

            header('Location: index.php?route=user');
            exit;
        }

        $role = $this->roleModel->getAllRole();
        
        require 'src/views/user/create.php';
    }
    public function register() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $nama = $_POST['nama'];
            $username = $_POST['username'];
            $password = $_POST['password'];
            $role = 1;
            if (empty($nama) || empty($username) || empty($password)) {
                echo "Harap isi semua kolom";
                return;
            }
            $user = $this->userModel->getUserByUsername($username);
            $hashedPassword = password_hash($password, PASSWORD_DEFAULT);
            if (empty($user)) {
                $this->userModel->createUser($nama, $username, $hashedPassword, $role);
                $message = 'Berhasil mendaftarkan user dengan nama '.$nama;
                echo "<script type='text/javascript'>alert('$message');</script>";
                header('Location: index.php?route=login');
                exit();
            } else {
                echo 'User sudah pernah terdaftar';
            }
        }

        
        require_once 'src/views/register.php';
    }
    public function read() {
        
        $user = $this->userModel->getAllUser();

        
        require 'src/views/user/read.php';
    }

    public function update() {
        
        $userId = $_GET['id'] ?? null;

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $id = $_POST['id'];
            $nama = $_POST['nama'];
            $phone = $_POST['phone'];
            $email = $_POST['email'];
            $status = $_POST['status'];
            $role = $_POST['role'];
            $username = $_POST['username'];
            $password = $_POST['password'];
            $u = $this->userModel->getUser($id);
            if(empty($password)){
                $updatePassword = $u['password'];
            }else{
                $updatePassword = password_hash($password, PASSWORD_DEFAULT);
            }
            $this->userModel->updateUser($id, $username, $updatePassword, $nama, $email, $phone, $role, $status);

            header('Location: index.php?route=user');
            exit;
        }

        
        $user = $this->userModel->getUser($userId);
        $role = $this->roleModel->getAllRole();

        
        require 'src/views/user/update.php';
    }

    public function delete() {
        
        $userId = $_GET['id'] ?? null;

        
        $this->userModel->deleteUser($userId);

        
        header('Location: index.php?route=user');
        exit;
    }
}
?>
