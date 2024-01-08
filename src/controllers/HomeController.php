<?php
require_once 'src/models/Patient.php';
require_once 'src/models/Service.php';
require_once 'src/models/Doctor.php';
require_once 'src/models/Inspection.php';
require_once 'src/models/Medical.php';

class HomeController {
    private $patientModel;
    private $serviceModel;

    public function __construct() {
        $this->patientModel = new Patient();
        $this->serviceModel = new Service();
        $this->doctorModel = new Doctor();
        $this->inspectionModel = new Inspection();
        $this->medicalModel = new Medical();
    }

    public function index(){
        $patients = $this->patientModel->countPatient();
        $doctors = $this->doctorModel->countDoctor();
        $services = $this->serviceModel->countService();
        $inspections = $this->inspectionModel->countInspection();
        $medical = $this->medicalModel->getAllMedicalLimit(10);
        require 'src/views/home/index.php';
    }
}