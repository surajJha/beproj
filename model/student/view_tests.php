<?php

header('Content-Type: application/json');
session_start();
require_once("../database.php");

$x = array();

$query ="SELECT t.test_id,t.subject_name,t.date,t.duration FROM test as t WHERE t.standard='{$_SESSION['standard']}' and t.division='{$_SESSION['division']}' AND t.test_id NOT IN (select s.test_id from student_gives_test as s)";
        
$result = mysqli_query($connection, $query);
//session_start();
if ($result) {
    while ($row = mysqli_fetch_assoc($result)) {
        array_push($x, $row);
       
    }
    echo json_encode($x);
} 
 else
{
     echo "error";
}

?>
