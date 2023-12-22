<?php
// include('../database/DB.php');
class UserModel
{
  public $conn;
  private $email;
  private $password;
  private $lastname;
  private $firstname;

  private $phone;
  private $birthdate;
  private $CIN;


  public function __construct($conn) {
      $this->conn = $conn;
  }

  public function setFirstname($firstname)
  {
    $this->firstname = $firstname;
  }
  public function setLastname($lastname)
  {
    $this->lastname = $lastname;
  }

  public function setEmail($email)
  {
    $this->email = $email;
  }
  public function setPhone($phone)
  {
    $this->phone = $phone;
  }
  public function setCIN($CIN)
  {
    $this->CIN = $CIN;
  }
  public function setBirthdate($birthdate)
  {
    $this->birthdate = $birthdate;
  }

  public function setPassword($password)
  {
    $this->password = password_hash($password, PASSWORD_DEFAULT);
  }

  public function getPassword()
  {
    return $this->password;
  }

  public function getUserName()
  {
    return $this->username;
  }

  public function setRoleName($role_name)
  {
    $this->role_name = $role_name;
  }

  public function getRoleName()
  {
    return $this->role_name;
  }


public function insertUser() {
  $insert_user_query = "INSERT INTO utilisateur (lastname, firstname, email, phone, CIN, birthdate, password,role_name) VALUES (?, ?, ?, ?, ?, ?, ?,'user')";

  $stmt = $this->conn->prepare($insert_user_query);

  if (!$stmt) {
      die("Preparation failed: " . $this->conn->error);
  }

  $stmt->bind_param("sssssss", $this->lastname, $this->firstname, $this->email, $this->phone, $this->CIN, $this->birthdate, $this->password);

  if (!$stmt->execute()) {
      die("Execute failed: " . $stmt->error);
  }

  $stmt->close();
}



public function loginUser($password)
{
  $email = isset($_POST['email']) ? trim($_POST['email']) : '';
    $fetch_user_query = "SELECT * FROM utilisateur WHERE email = ?";
    $req = $this->conn->prepare($fetch_user_query);
    $req->bind_param("s", $email);
    $req->execute();
    $result = $req->get_result();
    if ($result->num_rows > 0) {
        $user = $result->fetch_assoc();
        $hashedPassword = $user['password'];
        if (password_verify($password, $hashedPassword)) {
            header('Location: ../view/index.php');
            exit();
        } else {
            echo 'Invalid password';
        }
    } else {
        echo 'Invalid EMAIL';
    }

    $req->close();
}

}
?>