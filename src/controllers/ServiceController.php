<?php
require_once 'src/models/Service.php';

class ServiceController {
    private $serviceModel;

    public function __construct() {
        $this->serviceModel = new Service();
    }

    public function create() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            
            $name = $_POST['name'];
            $desc = $_POST['desc'];
            $price = $_POST['price'];
            $status = $_POST['status'];
            
            if (empty($name) || empty($desc) || empty($price) || empty($status)) {
                echo "Harap isi semua field";
                return;
            }

            
            $this->serviceModel->createService($name, $desc, $price, $status);

            
            header('Location: index.php?route=service');
            exit;
        }

        
        require 'src/views/service/create.php';
    }

    public function read() {
        
        $service = $this->serviceModel->getAllService();

        
        require 'src/views/service/read.php';
    }

    public function update() {
        $serviceId = $_GET['id'] ?? null;

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

            $this->serviceModel->updateService($id, $name, $desc, $price, $status);

            header('Location: index.php?route=service');
            exit;
        }
        $service = $this->serviceModel->getService($serviceId);

        require 'src/views/service/update.php';
    }

    public function delete() {
        
        $serviceId = $_GET['id'] ?? null;

        
        $this->serviceModel->deleteService($serviceId);

        
        header('Location: index.php?route=service');
        exit;
    }
}
?>
