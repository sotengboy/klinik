<?php
session_start();
require_once 'src/config/database.php';
require_once 'src/controllers/UserController.php';
require_once 'src/controllers/DoctorController.php';
require_once 'src/controllers/HomeController.php';
require_once 'src/controllers/AuthController.php';
require_once 'src/controllers/PatientController.php';
require_once 'src/controllers/ServiceController.php';
require_once 'src/controllers/MedicalController.php';
require_once 'src/controllers/PaymentController.php';
require_once 'src/controllers/RoleController.php';
require_once 'src/controllers/MedicineController.php';
require_once 'src/controllers/VitalController.php';
require_once 'src/controllers/InspectionController.php';
require_once 'src/controllers/PharmaController.php';

$userController = new UserController();
$doctorController = new DoctorController();
$homeController = new HomeController();
$authController = new AuthController();
$patientController = new PatientController();
$serviceController = new ServiceController();
$medicalController = new MedicalController();
$paymentController = new PaymentController();
$roleController = new RoleController();
$medicineController = new MedicineController();
$vitalController = new VitalController();
$inspectionController = new InspectionController();
$pharmaController = new PharmaController();

error_reporting(E_ALL);
ini_set('display_errors', 1);
$route = $_GET['route'] ?? 'home';
if (!isset($_SESSION['user_id']) && !in_array($_GET['route'], ['login', 'register'])) {
    header('Location: index.php?route=login');
    exit();
}

switch ($route) {
    case 'home':
        $homeController->index();
        break;
    case 'login':
        $authController->login();
        break;
    case 'register':
        $userController->register();
        break;
    case 'logout':
        $authController->logout();
        break;
    case 'user/create':
        $userController->create();
        break;
    case 'user':
        $userController->read();
        break;
    case 'user/update':
        $userController->update();
        break;
    case 'user/delete':
        $userController->delete();
        break;
    case 'doctor/create':
        $doctorController->create();
        break;
    case 'doctor':
        $doctorController->read();
        break;
    case 'doctor/update':
        $doctorController->update();
        break;
    case 'doctor/delete':
        $doctorController->delete();
        break;
    case 'patient':
        $patientController->read();
        break;
    case 'patient/create':
        $patientController->create();
        break;
    case 'patient/update':
        $patientController->update();
        break;
    case 'patient/delete':
        $patientController->delete();
        break;
    case 'service':
        $serviceController->read();
        break;
    case 'service/create':
        $serviceController->create();
        break;
    case 'service/update':
        $serviceController->update();
        break;
    case 'service/delete':
        $serviceController->delete();
        break;
    case 'medicine/create':
        $medicineController->create();
        break;
    case 'medicine':
        $medicineController->read();
        break;
    case 'medicine/update':
        $medicineController->update();
        break;
    case 'medicine/delete':
        $medicineController->delete();
        break;
    case 'role':
        $roleController->read();
        break;
    case 'role/create':
        $roleController->create();
        break;
    case 'role/update':
        $roleController->update();
        break;
    case 'role/delete':
        $roleController->delete();
        break;
    case 'medical':
        $medicalController->create();
        break;
    case 'medical/list':
        $medicalController->read();
        break;
    case 'medical/detail':
        $medicalController->detail();
        break;
    case 'medical/update':
        $medicalController->update();
        break;
    case 'medical/delete':
        $medicalController->delete();
        break;
    case 'payment':
        $paymentController->read();
        break;
    case 'payment/create':
        $paymentController->create();
        break;
    case 'payment/update':
        $paymentController->update();
        break;
    case 'payment/delete':
        $paymentController->delete();
        break;
    case 'payment/detail':
        $paymentController->detail();
        break;
    case 'vital':
        $vitalController->read();
        break;
    case 'vital/create':
        $vitalController->create();
        break;
    case 'vital/update':
        $vitalController->update();
        break;
    case 'inspection':
        $inspectionController->read();
        break;
    case 'inspection/create':
        $inspectionController->create();
        break;
    case 'inspection/update':
        $inspectionController->update();
        break;
    case 'pharmacy':
        $pharmaController->read();
        break;
    default:
        $homeController->index();
        break;
}
?>
