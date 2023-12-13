<?php
session_start();
require_once 'src/config/database.php';
require_once 'src/controllers/UserController.php';
require_once 'src/controllers/HomeController.php';
require_once 'src/controllers/AuthController.php';
require_once 'src/controllers/PatientController.php';
require_once 'src/controllers/TarifController.php';
require_once 'src/controllers/PenggunaanController.php';
require_once 'src/controllers/PembayaranController.php';
require_once 'src/controllers/RoleController.php';

$userController = new UserController();
$homeController = new HomeController();
$authController = new AuthController();
$patientController = new PatientController();
$tarifController = new TarifController();
$penggunaanController = new PenggunaanController();
$pembayaranController = new PembayaranController();
$roleController = new RoleController();

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
    case 'tarif':
        $tarifController->read();
        break;
    case 'tarif/create':
        $tarifController->create();
        break;
    case 'tarif/update':
        $tarifController->update();
        break;
    case 'tarif/delete':
        $tarifController->delete();
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
    case 'penggunaan':
        $penggunaanController->read();
        break;
    case 'penggunaan/create':
        $penggunaanController->create();
        break;
    case 'penggunaan/update':
        $penggunaanController->update();
        break;
    case 'penggunaan/delete':
        $penggunaanController->delete();
        break;
    case 'penggunaan/tagihan':
        $penggunaanController->createTagihan();
        break;
    case 'pembayaran':
        $pembayaranController->read();
        break;
    case 'pembayaran/create':
        $pembayaranController->create();
        break;
    case 'pembayaran/update':
        $pembayaranController->update();
        break;
    case 'pembayaran/delete':
        $pembayaranController->delete();
        break;
    case 'pembayaran/tagihan':
        $pembayaranController->createTagihan();
        break;
    default:
        $homeController->index();
        break;
}
?>
