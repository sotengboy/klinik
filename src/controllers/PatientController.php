<?php
require_once 'src/models/Patient.php';
require_once 'src/models/Tarif.php';

class PatientController {
    private $patientModel;
    private $tarifModel;

    public function __construct() {
        $this->patientModel = new Patient();
        $this->tarifModel = new Tarif();
    }

    public function create() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $name       = $_POST['nama'];
            $address    = $_POST['alamat'];
            $no_rm      = $_POST['no_rm'];
            $age        = $_POST['umur'];
            $gender     = $_POST['jk'];
            $no_id      = $_POST['nik'];
            $phone      = $_POST['phone'];
            $email      = $_POST['email'];
            $status     = $_POST['status'];

            if (empty($name) || empty($address) || empty($no_rm) || empty($age) || empty($gender) || empty($no_id) || empty($phone) || empty($email) || empty($status)) {
                echo "Harap isi semua kolom.";
                return;
            }
        
            $this->patientModel->createPatient($name,$address,$no_rm,$age,$gender,$no_id,$phone,$email,$status);

            header('Location: index.php?route=patient');
            exit;
        }
        
        require 'src/views/patient/create.php';
    }

    public function read() {
        $patient = $this->patientModel->getAllPatient();

        require 'src/views/patient/read.php';
    }

    public function update() {
        $patientId = $_GET['id'] ?? null;

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $id = $_POST['id'];
            $name       = $_POST['nama'];
            $address    = $_POST['alamat'];
            $no_rm      = $_POST['no_rm'];
            $age        = $_POST['umur'];
            $gender     = $_POST['jk'];
            $no_id      = $_POST['nik'];
            $phone      = $_POST['phone'];
            $email      = $_POST['email'];
            $status     = $_POST['status'];

            if (empty($name) || empty($address) || empty($no_rm) || empty($age) || empty($gender) || empty($no_id) || empty($phone) || empty($email) || empty($status)) {
                echo "Harap isi semua kolom.";
                return;
            }
            $p = $this->patientModel->getPatient($id);
            
            $this->patientModel->updatePatient($id, $name,$address,$no_rm,$age,$gender,$no_id,$phone,$email,$status);

            header('Location: index.php?route=patient');
            exit;
        }

        
        
        $patient = $this->patientModel->getPatient($patientId);
        
        
        require 'src/views/patient/update.php';
    }

    public function delete() {
        
        $patientId = $_GET['id'] ?? null;

        
        $this->patientModel->deletePatient($patientId);

        
        header('Location: index.php?route=patient');
        exit;
    }
}
?>
