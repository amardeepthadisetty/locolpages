<?php
header('Access-Control-Allow-Origin: *');
error_reporting(0);
include 'connectDB.php';

$listingname = $address = $phone = $area = $category = $keywords = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $email = test_input($_POST["email"]);
   $lname = test_input($_POST["listingname"]);
   $address = test_input($_POST["address"]);
   $phone = test_input($_POST["phone"]);
   $area = test_input($_POST["area"]);
   $category = test_input($_POST["category"]);
   $keywords = test_input($_POST["keywords"]);

   if ($lname=='' || $address=='' || $phone=='' || $area=='' || $category=='' || $keywords=='') { 
    echo "<div id='ajax2'><p>It seems some fields are empty. Make sure all fields are filled in</p></div>";
   }
    
   else{
    //get id of user so as to save the form fields of user accordingly
    $id;
    $sql = "SELECT id FROM users WHERE username='$email'";
    $result = mysqli_query($conn, $sql);
    //echo "count is: ".mysqli_num_rows($result)."<br>";
    if (mysqli_num_rows($result) > 0) {
        while($row = mysqli_fetch_assoc($result)) {
        $id = $row['id'];
        //echo 'user id is :'. $id;
         }
        }
    

   $sql = "INSERT INTO list (lname, address, phone, area, category, keywords, userid)
   VALUES ('$lname', '$address', '$phone','$area','$category','$keywords', '$id')";

   if (mysqli_query($conn, $sql)) {
       echo "<div id='ajax2'><p>Thank You Successfully Submitted</p></div>";
   } else {
       //echo "Error: " . $sql . "<br>" . mysqli_error($conn);
   }

   //echo "user id is:".$id."<br>";
   } 
}

function test_input($data) {
   $data = trim($data);
   $data = stripslashes($data);
   $data = htmlspecialchars($data);
   return $data;
}





?>