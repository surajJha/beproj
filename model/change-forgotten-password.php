<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
// update the new password in the ddatabase. this
// file will be called by change-forgotten-password,js via ajax method

require_once 'database.php';
require_once '../controller/encryption.php';
$password = $_POST['mypassword'];
$user_id = $_POST['user_id'];
$hashed_password = password_encrypt($password);
$query = "UPDATE user set password = '{$hashed_password}' where user_id = '{$user_id}'";
if($result = mysqli_query($connection, $query)){
    echo 'PASSWORD UPDATED IN THE DATABASE! CONGRULATIONS. NOW LOGIN WITH THE NEW PASSWORD';
}
else{
    echo mysqli_error($connection);
}


