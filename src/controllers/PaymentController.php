<?php
require_once 'src/models/Payment.php';
require_once 'src/models/Patient.php';
require_once 'src/helper/Helper.php';

class PaymentController {
    private $paymentModel;
    private $patientModel;

    public function __construct() {
        $this->paymentModel = new Payment();
        $this->patientModel = new Patient();
        $this->helper = new Helper();
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
                echo "<script>alert('Total bayar lebih dari total tagihan');</script><meta http-equiv='refresh' content='0;url=index.php?route=payment/create&id=".$id."' />";
                exit;
            }else if($total_bayar <  $total){
                echo "<script>alert('Total bayar kurang dari total tagihan');</script><meta http-equiv='refresh' content='0;url=index.php?route=payment/create&id=".$id."' />";
                exit;
            }else{
                $this->paymentModel->createPayment($tagihan, $patient, $tanggal, $bulan, $admin, $total_bayar, $user);
                echo "<script>alert('Pembayaran berhasil disimpan');</script><meta http-equiv='refresh' content='0;url=index.php?route=payment' />";
                exit;
            }
        }
        $tagihan = $this->paymentModel->getTagihan($idTagihan);
        
        require 'src/views/payment/create.php';
    }

    public function read() {
        $payment = $this->paymentModel->getAllPayment();

        require 'src/views/payment/read.php';
    }

    public function update() {
        $paymentId = $_GET['id'] ?? null;

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $id = $_POST['id'];
            $patient = $_POST['patient'];
            $bulan = $_POST['bulan'];
            $tahun = $_POST['tahun'];
            $meterAwal = $_POST['meterAwal'];
            $meterAhir = $_POST['meterAhir'];
            
            $this->paymentModel->updatePayment($id, $patient, $bulan, $tahun, $meterAwal, $meterAhir);
            
            header('Location: index.php?route=payment');
            exit;
        }

        
        
        $pg = $this->paymentModel->getPayment($paymentId);
        $patient = $this->patientModel->getAllPatient();

        require 'src/views/payment/update.php';
    }

    public function delete() {
        
        $paymentId = $_GET['id'] ?? null;

        
        $this->paymentModel->deletePayment($paymentId);

        
        header('Location: index.php?route=payment');
        exit;
    }
    public function detail() {
        $paymentId = $_GET['id'] ?? null;
        $p = $this->paymentModel->getPayment($paymentId);
        $items = [];
        
        require 'src/views/payment/detail.php';
    }
}
?>
