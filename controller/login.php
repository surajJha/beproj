<?php

session_start();
require_once("../model/database.php");
require_once ("functions.php");

//username and password from login form 
$user_id = $_POST["username"];
$password = $_POST["password"];

//extract existing hash from database
$query = "SELECT * FROM user WHERE user_id='{$user_id}'";
$result = mysqli_query($connection, $query);
$row = mysqli_fetch_assoc($result);
$existing_hash = $row["password"];

//checking if password matches existing hash and redirect accordingly
if (password_check($password, $existing_hash))
{
    //login successful
   
    // saving session data for further use
    $_SESSION['user_id'] = $user_id;
    
    //$type -> teacher or student
    $type=$row["type"];
    
    if($user_id === "admin")
    {
        //header("Location:http://../adminpage.php");
    }
    else if ($type === "1")
    {
        
        //header("Location: teacher");
    }
    else if($type==="0")
        {
        
        //header("Location: student");
    }
} 
else 
{
    //login unsuccessful

    header("Location:http://localhost/beproj/view/index.php");
}
//echo "WELCOME {$_SESSION['user_id']}";
?>