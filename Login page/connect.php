<?php

$servername = "www.thisismodus.com";

$username = "pn6vnjuhteqx";

$password = "IE&}9bwX<.";

$dbname = "membersDB";

 

// Create connection

$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection

if ($conn->connect_error) {

    die("Connection failed: " . $conn->connect_error);

} else {
    echo("Connection Successful");
}

?>
