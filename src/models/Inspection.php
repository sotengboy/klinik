<?php
require_once 'src/config/database.php';

class Inspection {
    private $conn;

    public function __construct() {
        $databaseConfig = new Database();
        $this->conn = $databaseConfig->getConnection();
    }

    public function createInspection($id, $hb, $diagnosis, $totalPrice, $totalQty, $meds, $dosage, $price, $qty, $remark) {
        $mm = "SELECT *, d.doctor_id doctor from medical_services ms JOIN doctors d ON ms.doctor_id=d.doctor_id  WHERE ms.medical_id=$id";
        $mmm = $this->conn->query($mm);
        $m = $mmm->fetch_assoc();
        $doctor = $m['doctor'];
        $doctor_fee = $m['fee'];
        $user = $_SESSION['user_id'];
        $admin = $m['admin_fee'];
        $date = date('Y-m-d');
        $status = "Inspection";
        $up = "UPDATE medical_services SET status='$status' WHERE medical_id=$id";
        $upp = $this->conn->query($up);
        $query = "INSERT INTO inspections (medical_id, doctor_id, date, heart_beat, diagnosis) VALUES ('$id', '$doctor', '$date', '$hb', '$diagnosis')";
        
        $pres = "INSERT INTO prescriptions (medical_id, total_price, total_qty) 
            VALUES ('$id', '$totalPrice', '$totalQty')";
        $this->conn->query($pres);
        $query2 = "SELECT * FROM prescriptions WHERE medical_id = '$id'";
        $result = $this->conn->query($query2);
        $prescript = $result->fetch_assoc();
        $presid = $prescript['pres_id'];
        foreach($meds as $key => $med){
            $d = $dosage[$key];
            $p = $price[$key];
            $q = $qty[$key];
            $r = $remark[$key];
            $saveitem = "INSERT INTO prescription_items (pres_id, med_id, price, dosage, qty, remarks) 
                         VALUES ('$presid', '$med', '$p', '$d', '$q', '$r')";
            $this->conn->query($saveitem);
        }
        $this->conn->query($query);

        // Buat tagihan pembayaran
        $total = $admin + $doctor_fee + $totalPrice;
        $number = date('y').date('m').rand(999,9999);
        $pay = "INSERT INTO payments (payment_number,payment_date,medical_id,pres_id,total,payment_status)
                VALUES ('$number','$date','$id','$presid','$total','Pending Payment')";
        $this->conn->query($pay);      
    }

    public function getAllInspection() {
        $query = "SELECT * FROM medical_services";
        $result = $this->conn->query($query);
        $inspection = [];

        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $inspection[] = $row;
            }
        }

        return $inspection;
    }
    public function getAllMedical() {
        $query = "SELECT ms.medical_id, date, p.full_name patient,ms.complaints, d.full_name doctor, ms.status FROM medical_services ms 
        JOIN patients p ON ms.patient_id=p.patient_id
        JOIN doctors d ON ms.doctor_id=d.doctor_id WHERE ms.status = 'Vital Sign'";
        $result = $this->conn->query($query);
        $inspection = [];

        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $inspection[] = $row;
            }
        }

        return $inspection;
    }
    public function getAllMedicalByDoctor($id) {
        $query = "SELECT ms.medical_id, date, p.full_name patient,ms.complaints, d.full_name doctor, ms.status FROM medical_services ms 
        JOIN patients p ON ms.patient_id=p.patient_id
        JOIN doctors d ON ms.doctor_id=d.doctor_id WHERE ms.status = 'Vital Sign' AND d.doctor_id = '$id'";
        $result = $this->conn->query($query);
        $inspection = [];

        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $inspection[] = $row;
            }
        }

        return $inspection;
    }
    public function getInspection($id) {
        $query = "SELECT * FROM inspections WHERE medical_id = $id";
        $result = $this->conn->query($query);
        $inspection = $result->fetch_assoc();

        return $inspection;
    }

    public function updateInspection($id, $name, $desc, $price, $status) {
        
        $query = "UPDATE inspections SET inspection_name='$name', inspection_desc='$desc', inspection_price='$price', status='$status' WHERE inspection_id=$id";
        $this->conn->query($query);
    }

    public function deleteInspection($id) {
        $query = "DELETE FROM inspections WHERE inspection_id = $id";
        $this->conn->query($query);
    }
    public function getPrescription($id) {
        $query = "SELECT * from prescriptions WHERE medical_id='$id'";
        $result = $this->conn->query($query);
        $prescription = $result->fetch_assoc();
        return $prescription;
    }
    public function getPrescriptionItems($id) {
        $query = "SELECT * from prescription_items pi JOIN medicines m ON pi.med_id=m.med_id WHERE pres_id='$id'";
        $result = $this->conn->query($query);
        $result = $this->conn->query($query);
        $prescription = [];

        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $prescription[] = $row;
            }
        }
        return $prescription;
    }
    public function createPrescription($id) {
        $query = "INSERT INTO prescriptions (medical_id,total_price, total_qty) VALUE ('$id', '0', '0');";
        $this->conn->query($query);
    }
    public function countInspection() {
        $query = "SELECT * FROM inspections";
        $result = $this->conn->query($query);
        $inspections = $result->num_rows;

        return $inspections;
    }
}   
?>
