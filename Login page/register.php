<?php
session_start();
if(isset($_SESSION['user'])!=""){
 header("Location: members.php");
}
include_once 'connect.php';
if(isset($_POST['btn-register']))
{
          //create a variable $uname and assign  the value
           //that been input to the username input text box contained
          //in the form
 $uname = ($_POST['uname']);
 $pass = md5(($_POST['psw']));

 //insert a username, email and password into the users table.
 // the values of those items are received from the form input fields.
 if(mysqli_query($conn, "INSERT INTO tblUser(username,password) VALUES('$uname','$pass')"))
 {
  ?>
  <script>alert('Congratulations – you are now registered! ');</script>
  <?php
 }
 else
 {
  ?>
  <script>alert('error while registering you...Please try again.');</script>
  <?php
 }
}
?>
<!DOCTYPE html>
<html>
<head>
<title>Registration Page</title>
<link rel="stylesheet" type="text/css" href="style.css">
</head>

<body>

<form method="post">
  <div class="container">
    <h1>Register</h1>
    <p>Please fill in this form to create an account.</p>
    <hr>
    
    <label for="uname"><b>User Name</b></label>
    <input type="text" placeholder="Enter user name" name="uname" required>

    <label for="psw"><b>Password</b></label>
    <input type="password" placeholder="Enter Password" name="psw" required>

    
    <hr>
    <p>By creating an account you agree to our <a href="#">Terms & Privacy</a>.</p>

    <button type="submit" name="btn-register" class="registerbtn">Register</button>
  </div>
  
  <div class="container signin">
    <p>Already have an account? <a href="index.php">Sign in</a>.</p>
  </div>
</form>

</body>
</html>