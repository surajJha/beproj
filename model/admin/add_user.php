<?php

$t = $_POST['au_type'];

if ($t === "student") {
    insertStudent();
} else {
    insertFaculty();
}

function insertStudent() {

    require_once '../database.php';

    $user_id = $_POST['au_user_id'];
    $fname = $_POST['au_fname'];
    $lname = $_POST['au_lname'];
    $email = $_POST['au_email'];
    $dob = $_POST['au_dob'];
    $phone = $_POST['au_phone'];
    $mt = $_POST['au_mothertongue'];

    $password = "$2y$10\$wO2x/jcoyd8oJdu7cNng3.nGpOZ7ByMB0YDih5d3OWDY5p/r6qZay";

    $query = "INSERT into USER (`user_id`, `password`, `fname`, `lname`, `email`, `phone`, `dob`, `type`) 
        values('{$user_id}','{$password}','{$fname}','{$lname}','{$email}','{$phone}','{$dob}','0')";
    if (mysqli_query($connection, $query)) {
        $query = "INSERT into STUDENT (`mother_tongue`, `user_id`) values ('{$mt}','{$user_id}')";
        if (mysqli_query($connection, $query)) {
            echo 'The user has been added succesfully!';
        } else {
            echo "THE ERROR IS" . mysqli_error($connection);
        }
    } else {
        echo "THE ERROR IS" . mysqli_error($connection);
    }
}

function insertFaculty() {
    require_once '../database.php';

    $user_id = $_POST['au_user_id'];
    $fname = $_POST['au_fname'];
    $lname = $_POST['au_lname'];
    $email = $_POST['au_email'];
    $dob = $_POST['au_dob'];
    $phone = $_POST['au_phone'];
    $access = $_POST['au_access'];

    $type = $_POST['au_type'];
    if ($type === "teacher") {
        $type = 1;
    } else {
        $type = 9;
        $access=9;
    }

    $password = "$2y$10\$wO2x/jcoyd8oJdu7cNng3.nGpOZ7ByMB0YDih5d3OWDY5p/r6qZay";

    $query = "INSERT into USER (`user_id`, `password`, `fname`, `lname`, `email`, `phone`, `dob`, `type`) 
        values('{$user_id}','{$password}','{$fname}','{$lname}','{$email}','{$phone}','{$dob}','{$type}')";
    if (mysqli_query($connection, $query)) {
        $query = "INSERT into FACULTY (`access_level`, `user_id`) values ('{$access}','{$user_id}')";
        if (mysqli_query($connection, $query)) {
            echo 'The user has been added succesfully!';
        } else {
            echo "THE ERROR IS" . mysqli_error($connection);
        }
    } else {
        echo "THE ERROR IS" . mysqli_error($connection);
    }
}
