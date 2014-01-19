<?php

require_once '../database.php';

$acad_start = $_POST['acad_start'];
$acad_end = $_POST['acad_end'];

$query = "TRUNCATE TABLE academic_year";
$result=mysqli_query($connection, $query);
$query="INSERT into academic_year (`acad_start`, `acad_end`) values ('{$acad_start}','{$acad_end}')";
if (mysqli_query($connection, $query)) {

    echo 'Academic year updated succesfully!';
    
} else {
    
    echo "THE ERROR IS" . mysqli_error($connection);
}


