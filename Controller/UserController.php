<?php
require_once(__DIR__ . '/../database/DB.php');
require_once(__DIR__ . '/../Model/UserModel.php');

$conn = new Database('localhost', 'root', '', 'youcode');

$userController = new UserController($conn);
$userController->getAllUsers();

class UserController
{
    private $conn;

    public function __construct($conn)
    {
        $this->conn = $conn;
    }

    public function getAllUsers()
    {
        $userModel = new UserModel($this->conn);
        $users = $userModel->getAllUsers();

    }
}


?>
