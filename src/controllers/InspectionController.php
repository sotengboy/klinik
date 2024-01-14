<?php
require_once 'src/models/Inspection.php';
require_once 'src/models/Medical.php';
require_once 'src/models/Medicine.php';
require_once 'src/models/Vital.php';

class InspectionController {
    private $inspectionModel;
    private $medicalModel;
    private $medicineModel;
    private $vitalModel;

    public function __construct() {
        $this->inspectionModel = new Inspection();
        $this->medicalModel = new Medical();
        $this->medicineModel = new Medicine();
        $this->vitalModel = new Vital();
    }

    public function create() {
        $getId = $_GET['id'] ?? null;

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {

            $id = $_POST['id'];
            $hb = $_POST['heart_beat'];
            $diagnosis = $_POST['diagnosis'];
            $totalPrice = $_POST['totalPrice'];
            $totalQty = $_POST['totalQty'];

            $meds       = $_POST['meds'];
            $dosage     = $_POST['dosage'];
            $price     = $_POST['price'];
            $qty        = $_POST['qty'];
            $remark    = $_POST['remark'];
            
            if (empty($hb) || empty($diagnosis)) {
                echo "<script>alert('Harap isi diagnosa');</script>";
                return;
            }

            $this->inspectionModel->createInspection($id, $hb, $diagnosis, $totalPrice, $totalQty, $meds, $dosage, $price, $qty, $remark);
            // if($_POST['prescription']){
            //     $this->inspectionModel->createPrescription($id);
            // }
            echo '<script>alert("Data pemeriksaan tersimpan");</script><meta http-equiv="refresh" content="0;url=index.php?route=inspection" />';
            // header('Location: index.php?route=inspection/update&id='.$id);
            exit;
        }
        $medical = $this->medicalModel->getMedical($getId);
        $medicines = $this->medicineModel->getAllMedicine();
        $vital = $this->vitalModel->getVitalByMedical($getId);
        $pres = $this->inspectionModel->getPrescription($getId);
        if(!empty($pres)){
            $items = $this->inspectionModel->getPrescriptionItems($pres['pres_id']);
        }
        require 'src/views/inspection/create.php';
    }

    public function read() {
        if($_SESSION['user_role'] == "Administrator"){
            $medical = $this->medicalModel->getAllMedical();
        }else{
            $medical = $this->medicalModel->getAllMedicalByDoctor($_SESSION['user_id']);
        }
        
        require 'src/views/inspection/read.php';
    }

    public function update() {
        $getId = $_GET['id'] ?? null;

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $id = $_POST['id'];
            $name = $_POST['name'];
            $desc = $_POST['desc'];
            $price = $_POST['price'];
            $status = $_POST['status'];
            
            if (empty($name) || empty($desc) || empty($price) || empty($status)) {
                echo "Harap isi semua field";
                return;
            }

            $this->inspectionModel->updateInspection($id, $name, $desc, $price, $status);

            header('Location: index.php?route=inspection');
            exit;
        }

        $medical = $this->medicalModel->getMedical($getId);
        $vital = $this->vitalModel->getVitalByMedical($getId);
        $pres = $this->inspectionModel->getPrescription($getId);
        $inspec = $this->inspectionModel->getInspection($getId);
        require 'src/views/inspection/update.php';
    }

    public function delete() {
        
        $inspectionId = $_GET['id'] ?? null;

        
        $this->inspectionModel->deleteInspection($inspectionId);

        
        header('Location: index.php?route=inspection');
        exit;
    }
    public function createPrescription($medical) {
        $this->inspectionModel->createPrescription($medical);
        header('Location: index.php?route=inspection/create&id='.$medical);
        exit;
    }
}
?>
