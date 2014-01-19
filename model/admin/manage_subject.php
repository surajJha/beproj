<?php

//HI SURAJ

require_once '../database.php';

$subject_name = $_POST['ms_subject'];
$standard = $_POST['ms_standard'];
$topic = preg_split("/[\n,]+/", $_POST['ms_topics']);
$query = "";

if ($subject_name === "other") {
    $subject_name = $_POST['ms_new_subject'];
    $query = "INSERT into SUBJECT (`subject_name`) 
        values('{$subject_name}')";
    mysqli_query($connection, $query);
}


$flag = 0;
for ($i = 0; $i < sizeof($topic); $i++) {

    $topic[$i] = mysqli_real_escape_string($connection, $topic[$i]);
    $query = "INSERT into TOPIC (`topic_name`, `subject_name`, `standard`) values ('{$topic[$i]}','{$subject_name}','{$standard}')";
    if (mysqli_query($connection, $query)) {
        continue;
    } else {
        $message = "THE ERROR IS" . mysqli_error($connection);
        $flag = 1;
        break;
    }
}
if ($flag == 0) {
    echo 'The topics have been added succesfully!';
} else {
    echo $message;
}