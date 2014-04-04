<?php

require '../database.php';

session_start();
$i=$_SESSION['test']['i'];
$_SESSION['test']['questions'][$i]['response'] = $_POST[$i];

$user_id = $_SESSION['user_id'];
$test_id = $_SESSION['test_id'];
$question_id= $_SESSION['test']['questions'][$i]['question_id'];
//$start=$_SESSION['start_time'];
//$end=$_SESSION['end_time'];


    $query1 = "update active_test_time set time_left= WHERE user_id='$user_id' and test_id= '$test_id'";


    $query2 = "UPDATE test_progress SET response= '{$_SESSION['test']['questions'][$i]['response']}' WHERE user_id='$user_id' and test_id= '$test_id' and question_id= '$question_id'";
    
    mysqli_query($connection, $query2);
    
    echo "url";
?>
