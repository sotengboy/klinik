<?php
require_once 'src/models/Vital.php';
require_once 'src/models/Medical.php';

class VitalController {
    private $vitalModel;
    private $medicalModel;

    public function __construct() {
        $this->vitalModel = new Vital();
        $this->medicalModel = new Medical();
    }

    public function create() {
        $getId = $_GET['id'] ?? null;

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $id = $_POST['id'];
            $complaint = $_POST['complaint'];
            $temp = $_POST['temperature'];
            $presure = $_POST['presure'];
            $weight = $_POST['weight'];
            $status = "Vital Sign";
            
            if (empty($temp) || empty($presure) || empty($weight)) {
                echo "Harap isi semua field";
                return;
            }

            $this->vitalModel->createVital($id, $complaint, $temp, $presure, $weight, $status);
            echo "<script>alert('Data berhasil disimpan');</script><meta http-equiv='refresh' content='0;url=index.php?route=vital'/>";
            exit;
        }

        $medical = $this->medicalModel->getMedical($getId);
        
        require 'src/views/vital/create.php';
    }

    public function read() {
        
        $medical = $this->vitalModel->getAllMedical();

        
        require 'src/views/vital/read.php';
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

            $this->vitalModel->updateVital($id, $name, $desc, $price, $status);

            header('Location: index.php?route=vital');
            exit;
        }

        $medical = $this->medicalModel->getMedical($getId);
        require 'src/views/vital/update.php';
    }

    public function delete() {
        
        $vitalId = $_GET['id'] ?? null;

        
        $this->vitalModel->deleteVital($vitalId);

        
        header('Location: index.php?route=vital');
        exit;
    }
}
?>
