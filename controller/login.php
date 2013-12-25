<?php
require_once("../model/database.php");
require_once ("functions.php");

$username = $_POST["username"];
$password = $_POST["password"];


//$hash_password=null;

$query="SELECT * FROM user WHERE username = '".$username."' and password='".$password."'";
$result=mysqli_query($connection, $query);

$hash = password_encrypt($password);
echo $hash;



?>