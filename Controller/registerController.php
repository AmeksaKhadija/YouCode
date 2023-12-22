<?php
include('../database/DB.php');
include('../Model/UserModel.php');

class RegisterController
{
    private $conn;

    public function __construct($conn)
    {
        $this->conn = $conn;
    }

    public function register()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $firstname = isset($_POST['firstname']) ? $_POST['firstname'] : '';
            $lastname = isset($_POST['lastname']) ? $_POST['lastname'] : '';
            $phone = isset($_POST['phone']) ? $_POST['phone'] : '';
            $email = isset($_POST['email']) ? $_POST['email'] : '';
            $CIN = isset($_POST['CIN']) ? $_POST['CIN'] : '';
            $birthdate = isset($_POST['birthdate']) ? $_POST['birthdate'] : '';
            $password = isset($_POST['password']) ? $_POST['password'] : '';

            $userModel = new UserModel($this->conn);
            $userModel->setFirstname($firstname);
            $userModel->setLastname($lastname);
            $userModel->setEmail($email);
            $userModel->setPhone($phone);
            $userModel->setCIN($CIN);
            $userModel->setBirthdate($birthdate);
            $userModel->setPassword($password);
            $userModel->insertUser();
            header('Location: ../view/login.php');
                
            }
        }
       
    }

$conn = new Database('localhost', 'root', '', 'youcode');

$registerController = new RegisterController($conn);
$registerController->register();
?>
