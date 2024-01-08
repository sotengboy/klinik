<?php
require_once 'src/models/Medicine.php';
require_once 'src/models/Role.php';

class MedicineController {
    private $medicineModel;

    public function __construct() {
        $this->medicineModel = new Medicine();
    }

    public function create() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            
            $nama = $_POST['nama'];
            $desc = $_POST['description'];
            $qty = $_POST['qty'];
            $unit = $_POST['unit'];
            $dosage = $_POST['dosage'];
            $status = $_POST['status'];
            $price = $_POST['price'];
            $type = $_POST['type'];
            
            if (empty($nama) || empty($desc) || empty($qty) || empty($unit) || empty($dosage) || empty($price) || empty($type) || empty($status)) {
                echo "Harap isi semua field.";
                return;
            }

            $this->medicineModel->createMedicine($nama, $desc, $qty, $unit, $dosage, $price, $type, $status);

            header('Location: index.php?route=medicine');
            exit;
        }
        
        require 'src/views/medicine/create.php';
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
            $medicine = $this->medicineModel->getMedicineByMedicinename($username);
            $hashedPassword = password_hash($password, PASSWORD_DEFAULT);
            if (empty($medicine)) {
                $this->medicineModel->createMedicine($nama, $username, $hashedPassword, $role);
                $message = 'Berhasil mendaftarkan medicine dengan nama '.$nama;
                echo "<script type='text/javascript'>alert('$message');</script>";
                header('Location: index.php?route=login');
                exit();
            } else {
                echo 'Medicine sudah pernah terdaftar';
            }
        }

        
        require_once 'src/views/register.php';
    }
    public function read() {
        
        $medicine = $this->medicineModel->getAllMedicine();

        
        require 'src/views/medicine/read.php';
    }

    public function update() {
        
        $medicineId = $_GET['id'] ?? null;

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $id = $_POST['id'];
            $nama = $_POST['nama'];
            $desc = $_POST['description'];
            $qty = $_POST['qty'];
            $unit = $_POST['unit'];
            $dosage = $_POST['dosage'];
            $status = $_POST['status'];
            $price = $_POST['price'];
            $type = $_POST['type'];
            if (empty($nama) || empty($desc) || empty($qty) || empty($unit) || empty($dosage) || empty($price) || empty($type) || empty($status)) {
                echo "Harap isi semua field.";
                return;
            }
            $this->medicineModel->updateMedicine($id, $nama, $desc, $qty, $unit, $dosage, $price, $type, $status);

            header('Location: index.php?route=medicine');
            exit;
        }

        
        $medicine = $this->medicineModel->getMedicine($medicineId);
 
        require 'src/views/medicine/update.php';
    }

    public function delete() {
        
        $medicineId = $_GET['id'] ?? null;

        
        $this->medicineModel->deleteMedicine($medicineId);

        
        header('Location: index.php?route=medicine');
        exit;
    }
}
?>
