<?php

header('Content-Type: application/json');
session_start();
require_once("../database.php");

$acad_year=date("Y-m-d");

$query="SELECT standard,division from student_belongs_to WHERE user_id = '{$_SESSION['user_id']}' and acad_start <= '{$acad_year}' and acad_end >= '{$acad_year}' ";

$result = mysqli_query($connection, $query);

if($result)
{
  $row = mysqli_fetch_assoc($result);
    $standard=$row['standard'];
    $division=$row['division'];
}
$x = array();

$query ="SELECT t.test_id,t.subject_name,t.date,t.duration FROM test as t WHERE t.standard='{$standard}' and t.division='{$division}'"; 
        
$result = mysqli_query($connection, $query);
//session_start();
if ($result) {
    while ($row = mysqli_fetch_assoc($result)) {
        array_push($x, $row);
       
    }
} else {
    //$x[0]="0";
}

echo json_encode($x);
?>