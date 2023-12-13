<?php
require_once 'src/models/Role.php';

class RoleController {
    private $roleModel;

    public function __construct() {
        $this->roleModel = new Role();
    }

    public function create() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $role = $_POST['nama'];
            if (empty($role)) {
                echo "Nama Role harus diisi.";
                return;
            }

            $this->roleModel->createRole($role);

            header('Location: index.php?route=role');
            exit;
        }


        require 'src/views/role/create.php';
    }

    public function read() {
        
        $role = $this->roleModel->getAllRole();

        
        require 'src/views/role/read.php';
    }

    public function update() {
        $roleId = $_GET['id'] ?? null;

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $id = $_POST['id'];
            $role = $_POST['nama'];

            if (empty($role)) {
                echo "Please provide a role.";
                return;
            }
            $this->roleModel->updateRole($id, $role);

            header('Location: index.php?route=role');
            exit;
        }
        $role = $this->roleModel->getRole($roleId);

        require 'src/views/role/update.php';
    }

    public function delete() {
        
        $roleId = $_GET['id'] ?? null;
        $this->roleModel->deleteRole($roleId);
        
        header('Location: index.php?route=role');
        exit;
    }
}
?>
