<?php
require_once 'src/models/Medical.php';
require_once 'src/models/Patient.php';
require_once 'src/models/Service.php';
require_once 'src/models/Doctor.php';

class MedicalController {
    private $medicalModel;
    private $patientModel;

    public function __construct() {
        $this->medicalModel = new Medical();
        $this->patientModel = new Patient();
        $this->serviceModel = new Service();
        $this->doctorModel = new Doctor();
    }

    public function create() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $patient = $_POST['patient'];
            $doctor = $_POST['doctor'];
            $type = $_POST['type'];
            $service = $_POST['service'];
            $user = $_SESSION['user_id'];
            $date = date('Y-m-d');
            $admin = 50000;
            $trx = "MED-".rand(999,9999);
            
            if (empty($patient) || empty($doctor) || empty($type) || empty($service)) {
                echo "Harap isi semua kolom.";
                return;
            }
            $this->medicalModel->createMedical($patient, $doctor, $user, $service, $trx, $date, $type, $admin);
            echo "<script>alert('Data Pendaftaran Berhasil Dibuat!');</script><meta http-equiv='refresh' content='0;url=index.php?route=medical/detail&trx=".$trx."' />";
            exit;
        }
        $patient = $this->patientModel->getAllPatient();
        $doctor = $this->doctorModel->getAllDoctor();
        $service = $this->serviceModel->getAllService();
        require 'src/views/medical/create.php';
    }

    public function read() {
        $medical = $this->medicalModel->getAllMedical();

        require 'src/views/medical/read.php';
    }

    public function update() {
        $medicalId = $_GET['id'] ?? null;

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $id = $_POST['id'];
            $patient = $_POST['patient'];
            $doctor = $_POST['doctor'];
            $type = $_POST['type'];
            $service = $_POST['service'];
            $complaints = $_POST['complaints'];
            $user = $_SESSION['user_id'];

            $this->medicalModel->updateMedical($id, $patient, $doctor, $user, $service, $type, $complaints);
            
            header('Location: index.php?route=medical');
            exit;
        }

        
        
        $pg = $this->medicalModel->getMedical($medicalId);
        $patient = $this->patientModel->getAllPatient();
        $doctor = $this->doctorModel->getAllDoctor();
        $service = $this->serviceModel->getAllService();

        require 'src/views/medical/update.php';
    }
    
    public function detail() {
        $trx = $_GET['trx'] ?? null;
        $med = $this->medicalModel->getMedicalByTrx($trx);

        require 'src/views/medical/detail.php';
    }
    public function delete() {
        
        $medicalId = $_GET['id'] ?? null;

        
        $this->medicalModel->deleteMedical($medicalId);

        
        header('Location: index.php?route=medical');
        exit;
    }
    public function createTagihan() {
        $medicalId = $_GET['id'] ?? null;
        $this->medicalModel->createTagihan($medicalId);
        
        header('Location: index.php?route=medical');
    }
}
?>
