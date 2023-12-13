<?php
require_once 'src/models/Tarif.php';

class TarifController {
    private $tarifModel;

    public function __construct() {
        $this->tarifModel = new Tarif();
    }

    public function create() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            
            $daya = $_POST['daya'];
            $tarif = $_POST['tarif'];

            
            if (empty($daya) || empty($tarif)) {
                echo "Please provide a name and email.";
                return;
            }

            
            $this->tarifModel->createTarif($daya, $tarif);

            
            header('Location: index.php?route=tarif');
            exit;
        }

        
        require 'src/views/tarif/create.php';
    }

    public function read() {
        
        $tarif = $this->tarifModel->getAllTarif();

        
        require 'src/views/tarif/read.php';
    }

    public function update() {
        $tarifId = $_GET['id'] ?? null;

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $id = $_POST['id'];
            $daya = $_POST['daya'];
            $tarif = $_POST['tarif'];

            if (empty($daya) || empty($tarif)) {
                echo "Please provide a daya and tarif.";
                return;
            }
            echo $id." - ".$daya." - ".$tarif;
            $this->tarifModel->updateTarif($id, $daya, $tarif);

            header('Location: index.php?route=tarif');
            exit;
        }
        $tarif = $this->tarifModel->getTarif($tarifId);

        require 'src/views/tarif/update.php';
    }

    public function delete() {
        
        $tarifId = $_GET['id'] ?? null;

        
        $this->tarifModel->deleteTarif($tarifId);

        
        header('Location: index.php?route=tarif');
        exit;
    }
}
?>
