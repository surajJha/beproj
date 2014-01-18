<?php

$t = $_POST['tab'];

if ($t === "1") {
    assignClassTeacher();
} elseif ($t === "2") {
    assignSubjectTeacher();
} elseif ($t === "3") {
    assignStudents();
} elseif ($t === "4") {
    addClass();
}

function assignClassTeacher() {

    require_once '../database.php';
    
    $query="SELECT * FROM academic_year";
    $result=  mysqli_query($connection, $query);
    $row=  mysqli_fetch_assoc($result);
    $acad_start=$row['acad_start'];
    $acad_end=$row['acad_end'];
    
    $name=  explode(" ", $_POST['ct_teacher']);
    
    $query="SELECT user_id FROM user WHERE fname='{$name[0]}' and lname='{$name[1]}'";
    $result=  mysqli_query($connection, $query);
    $row=  mysqli_fetch_assoc($result);
    $user_id=$row['user_id'];
    
    $query = "INSERT into is_class_teacher (`user_id`, `standard`, `division`, `acad_start`, `acad_end`) 
        values('{$user_id}','{$_POST['ct_standard']}','{$_POST['ct_division']}','{$acad_start}','{$acad_end}')";

    if (mysqli_query($connection, $query)) {
        echo "Class teacher has been assigned successfully!";
    } else {
        echo "THE ERROR IS" . mysqli_error($connection);
    }
}
?>
