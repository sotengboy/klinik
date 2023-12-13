<?php
require_once 'src/models/Pembayaran.php';
require_once 'src/models/Patient.php';

class PembayaranController {
    private $pembayaranModel;
    private $patientModel;

    public function __construct() {
        $this->pembayaranModel = new Pembayaran();
        $this->patientModel = new Patient();
    }

    public function create() {
        $idTagihan = @$_GET['id'];
        $user = $_SESSION['user_id'];
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $id = $_POST['id'];
            $tagihan = $_POST['tagihan'];
            $patient = $_POST['patient'];
            $tanggal = $_POST['tanggal'];
            $bulan = $_POST['bulan'];
            $admin = $_POST['biaya_admin'];
            $total = $_POST['total'];
            $total_bayar = $_POST['total_bayar'];
            if($total_bayar >  $total){
                echo "<script>alert('Total bayar lebih dari total tagihan');</script><meta http-equiv='refresh' content='0;url=index.php?route=pembayaran/create&id=".$id."' />";
                exit;
            }else if($total_bayar <  $total){
                echo "<script>alert('Total bayar kurang dari total tagihan');</script><meta http-equiv='refresh' content='0;url=index.php?route=pembayaran/create&id=".$id."' />";
                exit;
            }else{
                $this->pembayaranModel->createPembayaran($tagihan, $patient, $tanggal, $bulan, $admin, $total_bayar, $user);
                echo "<script>alert('Pembayaran berhasil disimpan');</script><meta http-equiv='refresh' content='0;url=index.php?route=pembayaran' />";
                exit;
            }
        }
        $tagihan = $this->pembayaranModel->getTagihan($idTagihan);
        
        require 'src/views/pembayaran/create.php';
    }

    public function read() {
        $pembayaran = $this->pembayaranModel->getAllTagihan();

        require 'src/views/pembayaran/read.php';
    }

    public function update() {
        $pembayaranId = $_GET['id'] ?? null;

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $id = $_POST['id'];
            $patient = $_POST['patient'];
            $bulan = $_POST['bulan'];
            $tahun = $_POST['tahun'];
            $meterAwal = $_POST['meterAwal'];
            $meterAhir = $_POST['meterAhir'];
            
            $this->pembayaranModel->updatePembayaran($id, $patient, $bulan, $tahun, $meterAwal, $meterAhir);
            
            header('Location: index.php?route=pembayaran');
            exit;
        }

        
        
        $pg = $this->pembayaranModel->getPembayaran($pembayaranId);
        $patient = $this->patientModel->getAllPatient();

        require 'src/views/pembayaran/update.php';
    }

    public function delete() {
        
        $pembayaranId = $_GET['id'] ?? null;

        
        $this->pembayaranModel->deletePembayaran($pembayaranId);

        
        header('Location: index.php?route=pembayaran');
        exit;
    }
    public function createTagihan() {
        $pembayaranId = $_GET['id'] ?? null;
        $this->pembayaranModel->createTagihan($pembayaranId);
        
        header('Location: index.php?route=pembayaran');
    }
}
?>
