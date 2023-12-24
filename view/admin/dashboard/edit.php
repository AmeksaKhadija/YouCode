<?php 
require_once('../../../Controller/editController.php');
if(isset($_GET['id'])){
    $idModifier=$_GET['id'];
}
$usermodifier = new UserModel($conn);
$userDetail = $usermodifier->getUserById($idModifier);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../dashboard.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
</head>

<body>
    <div class="container">

        <form method="POST" id="forms">

            <!-- 2 column grid layout with text inputs for the first and last names -->
            <div class="mb-4">
                <label class="form-label">First name</label>
                <input type="text" class="form-control task-desc" name="firstname"
                    value="<?php echo  $userDetail['firstname']; ?>">

            </div>
            <div class="mb-4">
                <label class="form-label">Last name</label>
                <input type="text" class="form-control task-desc" name="lastname"
                    value="<?php echo isset($userDetail['lastname']) ? $userDetail['lastname'] : ''; ?>">

            </div>
            <div class="mb-4">
                <label class="form-label">email</label>
                <input type="text" class="form-control task-desc" name="email"
                    value="<?php echo isset($userDetail['email']) ? $userDetail['email'] : ''; ?>">

            </div>
            <div class="mb-4">
                <label class="form-label">phone</label>
                <input type="text" class="form-control task-desc" name="phone"
                    value="<?php echo isset($userDetail['phone']) ? $userDetail['phone'] : ''; ?>">

            </div>

            <div class="mb-4">
                <label class="form-label">CIN</label>
                <input type="text" class="form-control task-desc" name="CIN"
                    value="<?php echo isset($userDetail['CIN']) ? $userDetail['CIN'] : ''; ?>">
            </div>
            <div class="mb-4">
                <label class="form-label">date birthday</label>
                <input type="date" class="form-control task-desc" name="birthdate"
                    value="<?php echo isset($userDetail['birthdate']) ? $userDetail['birthdate'] : ''; ?>">
            </div>
            <div class="mb-4">
                <label class="form-label">Role</label>
                <input type="text" class="form-control task-desc" name="role_name"
                    value="<?php echo isset($userDetail['role_name']) ? $userDetail['role_name'] : ''; ?>">
            </div>


            <div class="d-flex w-100 justify-content-center">
                <button type="submit" class="btn btn-success btn-block mb-4 me-4 save">Save Edit</button>
                <a href="index.php"><div class="btn btn-danger btn-block mb-4 annuler">Annuler</div></a>
            </div>
        </form>
    </div>

</body>

</html>