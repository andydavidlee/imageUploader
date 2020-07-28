<?php

session_start();

include_once 'connect.php';

 

if(!isset($_SESSION['user']))

{

 header("Location: index.php");

}

$sql="SELECT * FROM tblUser WHERE user_id ='".$_SESSION['tblUser']."'";

$res=mysqli_query($conn, $sql);

$userRow=mysqli_fetch_array($res);

?>

<!doctype html>

<html>    

<meta charset="utf-8">
<head>
<title>Welcome - <?php echo $userRow['username']; ?></title>

<!--<link rel="stylesheet" href="myStyle.css" type="text/css" />-->
<link rel="stylesheet" href="style.css" type="text/css" />

</head>

<body>

<div id="header">

 <div id="left">

    </div>

    <div id="right">

     <div id="content">

         <h2>Hello <?php echo $userRow['username']; ?></h2><a href="logout.php?logout">Sign Out</a>

        </div>

    </div>

</div>

</body>

</html>

