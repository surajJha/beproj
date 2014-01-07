<?php

session_start();

require_once("../model/database.php");
require_once ("encryption.php");

//username and password from login form 
$user_id = $_POST["username"];
$password = $_POST["password"];

//extract existing hash from database
$query = "SELECT * FROM user WHERE user_id='{$user_id}'";
$result = mysqli_query($connection, $query);
$row = mysqli_fetch_assoc($result);
$existing_hash = $row["password"];

//checking if password matches existing hash and redirect accordingly
if (password_check($password, $existing_hash)) {
    //login successful
    // saving session data for further use
    $_SESSION['user_id'] = $user_id;
    
    $sql = "SELECT fname from USER where user_id = '{$_SESSION["user_id"]}'";
    $res = mysqli_query($connection, $sql);
    $temp = mysqli_fetch_assoc($res);
    $_SESSION['fname'] = $temp['fname'];


    //$type -> teacher or student
    $type = $row["type"];
    echo $type;

    if ($user_id === "admin") {
        header("Location:http://localhost/beproj/view/admin/adminview.php");
    } else if ($type === "1") {

          header("Location:http://localhost/beproj/view/teacher/teacherview.php");
        
    } else if ($type === "0") {
        header("Location:http://localhost/beproj/view/student/studentview.php");
    }
} 
else {
    
    echo "Incorrect username or password!<br/><a href=#>Forgot ?</a><br/>";
}

