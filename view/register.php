
<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Registration or Sign Up form in HTML CSS | CodingLab</title>
  <link rel="stylesheet" href="../assets/styles/registerstyle.css">
</head>

<body>
  <div class="wrapper">
    <h2>Registration</h2>
    <form method="POST" action="../Controller/registerController.php">
      <div class="input-box">
        <input type="text" name="lastname" placeholder="Enter your last name" required>
      </div>
      <div class="input-box">
        <input type="text" name="firstname" placeholder="Enter your first name" required>
      </div>
      <div class="input-box">
        <input type="text" name="email" placeholder="Enter your email" required>
      </div>
      <div class="input-box">
        <input type="password" name="password" placeholder="Create password" required>
      </div>
      <div class="input-box">
        <input type="text" name="CIN" placeholder="Enter your cin" required>
      </div>
      <div class="input-box">
        <input type="text" name="phone" placeholder="Enter your phone" required>
      </div>
      <div class="input-box">
        <input type="date" name="birthdate" placeholder="Enter your date" required>
      </div>
      <div class="policy">
        <input type="checkbox" required>
        <h3>I accept all terms & condition</h3>
      </div>
      <div class="input-box button">
        <input type="submit" value="Register Now">
      </div>
      <div class="text">
        <h3>Already have an account? <a href="login.php">Login now</a></h3>
      </div>
    </form>
  </div>
</body>

</html>