<?php
require_once("../model/database.php");

echo "woo";

$username = $_POST["username"];
$password = $_POST["password"];

//$hash_password=null;

$query="SELECT * FROM user WHERE username = '".$username."' and password='".$password."'";
$result=mysqli_query($connection, $query);

if(is_null($result))
{
    //echo "Login not successful";
    
    //redirect to homepage with error
}
 else {
    //redirect to new page 
}
 
?>