<?php

session_start();
include 'encryption.php';
require_once 'database.php';

$user_id = $_SESSION['user_id'];
$fname = $_POST['fname'];
$lname = $_POST['lname'];
$email = $_POST['email'];
$phone = $_POST['phone'];
$password = $_POST['password'];



$hashed_password = password_encrypt($password);

$query = "UPDATE user SET fname = '{$fname}' , 
                          lname = '{$lname}' ,
                          phone = '{$phone}' ";
                          
if ($email !== $_SESSION['email']) {
    $query.=", email = '{$email}' ";
}
if (strlen($password)>0) {
  $query.=", password = '{$hashed_password}' ";
}

$query.="WHERE user_id = '{$user_id}'";

if (mysqli_query($connection, $query)) {
    $_SESSION['fname'] = $fname;
    $_SESSION['lname'] = $lname;
    $_SESSION['email'] = $email;
    $_SESSION['phone'] = $phone;

    echo 'success';
} else {
    echo 'error';
}
  
  

