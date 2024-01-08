<?php
require_once 'src/models/Doctor.php';

class DoctorController {
    private $doctorModel;

    public function __construct() {
        $this->doctorModel = new Doctor();
    }

    public function create() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            
            $nama = $_POST['nama'];
            $phone = $_POST['phone'];
            $email = $_POST['email'];
            $skill = $_POST['skill'];
            $working_hours = $_POST['working_hours'];
            $fee = $_POST['fee'];
            $status = $_POST['status'];
            $username = $_POST['username'];
            $password = $_POST['password'];
            
            if (empty($nama) || empty($phone) || empty($email) || empty($skill) || empty($username) || empty($password) || empty($status) || empty($fee)) {
                echo "<script>alert('Harap isi semua field.')</script>";
                return;
            }
            $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

            $this->doctorModel->createDoctor($nama, $username, $hashedPassword, $email, $phone, $skill, $working_hours, $fee, $status);

            echo "<script>alert('Data dokter berhasil disimpan');</script><meta http-equiv='refresh' content='0;url=index.php?route=doctor' />";
            exit;
        }
        
        require 'src/views/doctor/create.php';
    }
    public function read() {
        
        $doctor = $this->doctorModel->getAllDoctor();

        
        require 'src/views/doctor/read.php';
    }

    public function update() {
        
        $doctorId = $_GET['id'] ?? null;

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $id = $_POST['id'];
            $nama = $_POST['nama'];
            $phone = $_POST['phone'];
            $email = $_POST['email'];
            $status = $_POST['status'];
            $skill = $_POST['skill'];
            $working_hours = $_POST['working_hours'];
            $fee=$_POST['fee'];
            $username = $_POST['username'];
            $password = $_POST['password'];
            $u = $this->doctorModel->getDoctor($id);
            if(empty($password)){
                $updatePassword = $u['password'];
            }else{
                $updatePassword = password_hash($password, PASSWORD_DEFAULT);
            }
            $this->doctorModel->updateDoctor($id, $username, $updatePassword, $nama, $email, $phone, $skill, $working_hours, $fee, $status);
            echo "<script>alert('Data dokter berhasil diubah');</script><meta http-equiv='refresh' content='0;url=index.php?route=doctor' />";
            exit;
        }

        
        $doctor = $this->doctorModel->getDoctor($doctorId);

        
        require 'src/views/doctor/update.php';
    }

    public function delete() {
        
        $doctorId = $_GET['id'] ?? null;

        
        $this->doctorModel->deleteDoctor($doctorId);

        
        header('Location: index.php?route=doctor');
        exit;
    }
}
?>
