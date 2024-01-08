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
            $access = $_POST['access'];
            if (empty($role)) {
                echo "<script>alert('Nama Role harus diisi.');</script>";
                return;
            }

            $this->roleModel->createRole($role,$access);

            echo "<script>alert('Data role berhasil disimpan');</script><meta http-equiv='refresh' content='0;url=index.php?route=role' />";
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
            $access = implode(",",$_POST['access']);

            if (empty($role)) {
                echo "Please provide a role.";
                return;
            }
            $this->roleModel->updateRole($id, $role, $access);

            echo "<script>alert('Data role berhasil diubah');</script><meta http-equiv='refresh' content='0;url=index.php?route=role' />";
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
