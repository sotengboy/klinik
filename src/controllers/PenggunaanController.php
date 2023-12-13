<?php
require_once 'src/models/Penggunaan.php';
require_once 'src/models/Patient.php';
require_once 'src/models/Tarif.php';

class PenggunaanController {
    private $penggunaanModel;
    private $patientModel;

    public function __construct() {
        $this->penggunaanModel = new Penggunaan();
        $this->patientModel = new Patient();
        $this->tarifModel = new Tarif();
    }

    public function create() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $patient = $_POST['patient'];
            $bulan = $_POST['bulan'];
            $tahun = $_POST['tahun'];
            $meterAwal = $_POST['meterAwal'];
            $meterAhir = $_POST['meterAhir'];

            if (empty($patient) || empty($bulan) || empty($tahun) || empty($meterAwal) || empty($meterAhir)) {
                echo "Harap isi semua kolom.";
                return;
            }
            $this->penggunaanModel->createPenggunaan($patient, $bulan, $tahun, $meterAwal, $meterAhir);

            header('Location: index.php?route=penggunaan');
            exit;
        }
        $patient = $this->patientModel->getAllPatient();
        require 'src/views/penggunaan/create.php';
    }

    public function read() {
        $penggunaan = $this->penggunaanModel->getAllPenggunaan();

        require 'src/views/penggunaan/read.php';
    }

    public function update() {
        $penggunaanId = $_GET['id'] ?? null;

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $id = $_POST['id'];
            $patient = $_POST['patient'];
            $bulan = $_POST['bulan'];
            $tahun = $_POST['tahun'];
            $meterAwal = $_POST['meterAwal'];
            $meterAhir = $_POST['meterAhir'];
            
            $this->penggunaanModel->updatePenggunaan($id, $patient, $bulan, $tahun, $meterAwal, $meterAhir);
            
            header('Location: index.php?route=penggunaan');
            exit;
        }

        
        
        $pg = $this->penggunaanModel->getPenggunaan($penggunaanId);
        $patient = $this->patientModel->getAllPatient();

        require 'src/views/penggunaan/update.php';
    }

    public function delete() {
        
        $penggunaanId = $_GET['id'] ?? null;

        
        $this->penggunaanModel->deletePenggunaan($penggunaanId);

        
        header('Location: index.php?route=penggunaan');
        exit;
    }
    public function createTagihan() {
        $penggunaanId = $_GET['id'] ?? null;
        $this->penggunaanModel->createTagihan($penggunaanId);
        
        header('Location: index.php?route=penggunaan');
    }
}
?>
