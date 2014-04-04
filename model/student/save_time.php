<?php

require '../database.php';

session_start();
$_SESSION['test']['duration'] = (int)($_POST['time'])/60;

$user_id = $_SESSION['user_id'];
$test_id = $_SESSION['test_id'];

//$start=$_SESSION['start_time'];
//$end=$_SESSION['end_time'];


    $query1 = "update active_test_time set time_left= {$_SESSION['test']['duration']} WHERE user_id='$user_id' and test_id= '$test_id'";
    
    mysqli_query($connection, $query1);
    
    echo "url";
?>
