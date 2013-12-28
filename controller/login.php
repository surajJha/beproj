<?php
session_start();
require_once("../model/database.php");
require_once ("functions.php");

$username = $_POST["username"];
$password = $_POST["password"];


//$hash_password=null;

$query="SELECT * FROM user ";
$result=mysqli_query($connection, $query);
$row = mysqli_fetch_assoc($result);
//var_dump($row);

?>

$hash = password_encrypt($password);
echo $hash;



?>
