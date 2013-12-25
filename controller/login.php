<?php
session_start();
require_once("../model/database.php");

echo "woo";

$username = $_POST["username"];
$password = $_POST["password"];

//$hash_password=null;

$query="SELECT * FROM user ";
$result=mysqli_query($connection, $query);
$row = mysqli_fetch_assoc($result);
//var_dump($row);
?>

 <?php  
 
 
 $_SESSION["username"] = "SURAJ KUMAR JHA";
 $_SESSION["userid"] = $row["user_id"];
 $_SESSION["start_time"] = time();
         
         ?>  
<pre>
   <?php print_r($row);
   echo $row["user_id"];
   print_r($_SESSION);
   ?> 

</pre>

 
<a href="../view/contact.php">CMON CLICK ME</a>