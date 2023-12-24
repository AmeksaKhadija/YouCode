<?php
require_once(__DIR__ . '/../database/DB.php');
require_once(__DIR__ . '/../Model/UserModel.php');

$conn = new Database('localhost', 'root', '', 'youcode');

$editController = new editController($conn);
$editController->updateUser();

class editController
{
    private $conn;

    public function __construct($conn)
    {
        $this->conn = $conn;
    }

    public function updateUser()
    {
        $userDetail = null;

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $idModifier = $_GET['id'];
            $usermodifier = new UserModel($this->conn);
        
            $userDetail = $usermodifier->getUserById($idModifier);
            if ($userDetail) {
                $firstname = isset($_POST['firstname']) ? $_POST['firstname'] : '';
                $lastname = isset($_POST['lastname']) ? $_POST['lastname'] : '';
                $phone = isset($_POST['phone']) ? $_POST['phone'] : '';
                $email = isset($_POST['email']) ? $_POST['email'] : '';
                $CIN = isset($_POST['CIN']) ? $_POST['CIN'] : '';
                $birthdate = isset($_POST['birthdate']) ? $_POST['birthdate'] : '';
                $role_name = isset($_POST['role_name']) ? $_POST['role_name'] : '';
        
                $usermodifier->setFirstname($firstname);
                $usermodifier->setLastname($lastname);
                $usermodifier->setEmail($email);
                $usermodifier->setPhone($phone);
                $usermodifier->setCIN($CIN);
                $usermodifier->setBirthdate($birthdate);
                $usermodifier->setRoleName($role_name);
                $usermodifier->updateUser($idModifier);
                header('Location: users.php');
                exit();
            }
        } elseif (isset($_GET['id'])) {
            $idModifier = $_GET['id'];
            $usermodifier = new UserModel($this->conn);
            $userDetail = $usermodifier->getUserById($idModifier);
        } 
    }
}
?>
