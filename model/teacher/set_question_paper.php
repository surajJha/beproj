<?php

session_start();
require_once '../database.php';

$test_code=  rand(100, 999);
if($_POST['sqp_name']=="o")
{
     $n=$_POST['tname'];
}else
{
    $n=$_POST['sqp_name'];
}

$query = "INSERT into TEST (`test_id`,`test_name`, `date`, `duration`, `no_questions`, `random`, `user_id`, `standard`, `division`, `subject_name`, `test_code`)
        values(NULL,'{$n}','{$_POST['sqp_date']}','{$_POST['sqp_duration']}','{$_POST['sqp_no_question']}','{$_POST['sqp_random']}','{$_SESSION['user_id']}','{$_POST['sqp_standard']}','{$_POST['sqp_division']}','{$_POST['sqp_subject']}','{$test_code}')";
        
mysqli_query($connection, $query);

$test_id=  mysqli_insert_id($connection);
$_SESSION['test_id']=$test_id;
        
$topic=$_POST['sqp_topic'];

for($i=0;$i<sizeof($topic);$i++)
{
    $query="INSERT into test_on_topic (`test_id`, `topic_name`) values ('{$test_id}','{$topic[$i]}')";
    $result=  mysqli_query($connection, $query);
}

if($_POST['sqp_random'] === "0"){
    $test=[];
    $test['subject']=$_POST['sqp_subject'];
    $test['topics']=$topic;
    $test['standard']=$_POST['sqp_standard'];
    
    $_SESSION['test']=$test;
     echo "http://localhost/beproj/view/teacher/select_custom_questions.php";
}
else
{
     echo "The test has been scheduled successfully!";
}