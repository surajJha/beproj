<?php

session_start();
require_once '../database.php';

$test_code=  rand(100, 999);

$query = "INSERT into TEST (`test_id`, `date`, `duration`, `no_questions`, `random`, `user_id`, `standard`, `division`, `subject_name`, `test_code`)
        values(NULL,'{$_POST['sqp_date']}','{$_POST['sqp_duration']}','{$_POST['sqp_no_question']}','{$_POST['sqp_random']}','{$_SESSION['user_id']}','{$_POST['sqp_standard']}','{$_POST['sqp_division']}','{$_POST['sqp_subject']}','{$test_code}')";
        
mysqli_query($connection, $query);

$test_id=  mysqli_insert_id($connection);
        
$topic=$_POST['sqp_topic'];

for($i=0;$i<sizeof($topic);$i++)
{
    $query="INSERT into test_on_topic (`test_id`, `topic_name`) values ('{$test_id}','{$topic[$i]}')";
    $result=  mysqli_query($connection, $query);
}

echo "hjwgdy";