<?php
require_once 'src/models/Medicine.php';
require_once 'src/models/Role.php';

class PharmaController {
    private $pharmaModel;

    public function __construct() {
        $this->pharmaModel = new Medicine();
    }

    public function read() {
        
        $pharma = $this->pharmaModel->getAllData();

        
        require 'src/views/pharma/read.php';
    }

    public function update() {
        
        $pharmaId = $_GET['id'] ?? null;

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            

            header('Location: index.php?route=pharma');
            exit;
        }

        
        $pharma = $this->pharmaModel->getPharma($pharmaId);
 
        require 'src/views/pharma/update.php';
    }

}
?>
