<?php
session_start();
include '../controller/encryption.php';
$user_id = $_SESSION['user_id'];
/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
$fname = $_POST['fname'];
$lname = $_POST['lname'];
$email = $_POST['email'];
$phone = $_POST['phone'];
$password = $_POST['password'];

$hashed_password=password_encrypt($password);

$query = "UPDATE USER set fname = '{$fname}' , 
                          lname = '{$lname}' ,
                          email = '{$email}' ,
                          phone = '{$phone}' ,
                          password = '{$hashed_password}'
                          where user_id = '{$user_id}'";
  if(mysqli_query($connection, $query)){
      
      echo 'Your details have been updated successfully!';
  }
  else{
      echo mysqli_error($connection);
  }
  
  

