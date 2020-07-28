<?php

session_start();

include_once 'connect.php';

 

 

if(isset($_SESSION['tblUsers'])!="")

{

 header("Location: members.php");

}

if(isset($_POST['btn-login']))

{

 //create a variable $email and assign  the value

 //that been input to the email input text box contained

 //in the form

 //escapre variables for security

 $uname =  mysqli_real_escape_string($conn,$_POST['uname']);

 $pass = mysqli_real_escape_string($conn,$_POST['psw']);

 $sql="SELECT * FROM tblUsers WHERE username='$uname'";

 

 //select all fields from  users where the email address is what has been typed into the form

 

 $res=mysqli_query($conn,$sql);

 //store the three fields (userid, email and password) into an array $row

 $row=mysqli_fetch_array($res);

 

 

 //if the password in the array match the encrypted password in the form then

 //go to members.php - members area

 

 if($row['password']==md5($pass))

 {

  $_SESSION['user'] = $row['user_id'];

  header("Location: members.php");

 }

 else

 {

  ?>

  <!--If the table doesn't contain the email and username

  output a message-->

        <script>alert('We can’t find your email and/or password');</script>

        <?php

 }

 

}

?>


<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>

<h2>Login Form</h2>

<form method="post">
  <div class="container">
    <label for="username"><b>Username</b></label>
    <input type="text" placeholder="Enter Username" name="uname" required>

    <label for="psw"><b>Password</b></label>
    <input type="password" placeholder="Enter Password" name="psw" required>
        
    <button type="submit" name="btn-login">Login</button>
    <label>
      <input type="checkbox" checked="checked" name="remember"> Remember me
    </label>
  </div>

  <div class="container" style="background-color:#f1f1f1">
    <button type="button" class="cancelbtn">Cancel</button>
    <a href="register.php">Sign Up Here</a>
    <span class="psw">Forgot <a href="#">password?</a></span>
  </div>
</form>

</body>
</html>
