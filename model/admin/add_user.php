<?php

header('Content-Type: application/json');

var_dump($_POST);

$t = $_POST['au_type'];

if ($t === "student") {
    insertStudent();
} else {
    insertFaculty();
}

function insertStudent() {

    require_once '../database.php';
    include 'http://localhost/beproj/controller/encryption.php';

    $user_id = $_POST['au_user_id'];
    $fname = $_POST['au_fname'];
    $lname = $_POST['au_lname'];
    $email = $_POST['au_email'];
    $dob = $_POST['au_dob'];
    $phone = $_POST['au_phone'];
    $mt = $_POST['au_mothertongue'];

    $password = password_encrypt("0000");

    $query = "INSERT into USER (`user_id`, `password`, `fname`, `lname`, `email`, `phone`, `dob`, `type`) 
        values('{$user_id}','{$password}','{$fname}','{$lname}','{$email}','{$phone}','{$dob}','0')";
    if (mysqli_query($connection, $query)) {
        $query = "INSERT into STUDENT (`mother_tongue`, `user_id`) values ('{$mt}','{$user_id}')";
        if (mysqli_query($connection, $query)) {
            echo 'success';
        } else {
            echo "THE ERROR IS" . mysqli_error($connection);
        }
    } else {
        echo "THE ERROR IS" . mysqli_error($connection);
    }
}

function insertFaculty() {
    require_once '../database.php';
    include '../encryption.php';

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
    }

    $password = password_encrypt("0000");

    $query = "INSERT into USER (`user_id`, `password`, `fname`, `lname`, `email`, `phone`, `dob`, `type`) 
        values('{$user_id}','{$password}','{$fname}','{$lname}','{$email}','{$phone}','{$dob}','{$type}')";
    if (mysqli_query($connection, $query)) {
        $query = "INSERT into FACULTY (`access_level`, `user_id`) values ('{$access}','{$user_id}')";
        if (mysqli_query($connection, $query)) {
            echo 'success';
        } else {
            echo "THE ERROR IS" . mysqli_error($connection);
        }
    } else {
        echo "THE ERROR IS" . mysqli_error($connection);
    }
}
