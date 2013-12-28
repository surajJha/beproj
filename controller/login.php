<?php

session_start();
require_once("../model/database.php");
require_once ("functions.php");

//username and password from login form 
$username = $_POST["username"];
$password = $_POST["password"];

//extract existing hash from database
$query = "SELECT * FROM user WHERE user_id='{$username}'";
$result = mysqli_query($connection, $query);
$row = mysqli_fetch_assoc($result);
$existing_hash = $row["password"];

//checking if password matches existing hash and redirect accordingly
if (password_check($password, $existing_hash))
{
    //tors -> teacher or student
    //$tors=$row["tors"];
    
    //login successful
    if($username === "admin")
    {
        //header("Location:http://../adminpage.php");
    }
    else if (1)
    {
        //header("Location: teacher");
    }
    else 
        {
        //header("Location: student");
    }
} 
else 
{
    //login unsuccessful

    header("Location:http://localhost/beproj/view/index.php");
}
?>