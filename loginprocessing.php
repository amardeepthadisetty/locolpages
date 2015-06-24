<?php
header('Access-Control-Allow-Origin: *');
error_reporting(0);
include 'connectDB.php';

$username = $password = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
   $username = test_input($_POST["email"]);
   $password = test_input($_POST["password"]);
   if ($username=='' & $password=='') { 
   	echo "2";
   }
else{
   $sql = "SELECT * FROM users WHERE username='$username' AND password='$password'";
   $result = mysqli_query($conn, $sql);
   if (mysqli_num_rows($result) > 0) {
    echo "0";
    
	} else {
	    echo "1";
	}

   }
}

function test_input($data) {
   $data = trim($data);
   $data = stripslashes($data);
   $data = htmlspecialchars($data);
   return $data;
}





?>