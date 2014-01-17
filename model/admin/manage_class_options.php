<?php

header('Content-Type: application/json');

session_start();

$field = $_GET['field'];

if ($field === "standard") {
    populateStandard();
} elseif ($field === "division") {
    populateDivision();
} elseif ($field === "subject") {
    populateSubject();
} elseif ($field === "teacher") {
    populateTeacher();
}

//extract standards 
function populateStandard() {
    require_once("../database.php");

    $x = array();

    $query = "SELECT c.standard FROM class AS c ";
    $result = mysqli_query($connection, $query);

    if ($result) {
        while ($row = mysqli_fetch_assoc($result)) {

            if (!in_array($row['standard'], $x)) {
                array_push($x, $row['standard']);
            }
        }
    } else {
        echo mysqli_error($connection);
    }

    echo json_encode($x);
}

//extract divsions
function populateDivision() {
    require_once("../database.php");

    $x = array();

    $query = "SELECT c.division
                                FROM class AS c
                                WHERE c.standard='{$_GET['standard']}'";

    $result = mysqli_query($connection, $query);

    if ($result) {
        while ($row = mysqli_fetch_assoc($result)) {

            if (!in_array($row['division'], $x)) {
                array_push($x, $row['division']);
            }
        }
    } else {
        echo mysqli_error($connection);
    }

    echo json_encode($x);
}

//extract subjects
function populateSubject() {
    require_once("../database.php");

    $x = array();

    $query = "SELECT s.subject_name
                    FROM subject AS s";

    $result = mysqli_query($connection, $query);

    if ($result) {
        while ($row = mysqli_fetch_assoc($result)) {

            if (!in_array($row['subject_name'], $x)) {
                array_push($x, $row['subject_name']);
            }
        }
    } else {
        echo mysqli_error($connection);
    }

    echo json_encode($x);
}

//extract teachers
function populateTeacher() {
    require_once("../database.php");

    $x = array();

    $query = "SELECT u.fname,u.lname
                    FROM user AS u WHERE u.type='1'";

    $result = mysqli_query($connection, $query);

    if ($result) {
        while ($row = mysqli_fetch_assoc($result)) {
            $name=$row['fname']." ".$row['lname'];

            if (!in_array($name, $x)) {
                array_push($x, $name);
            }
        }
    } else {
        echo mysqli_error($connection);
    }

    echo json_encode($x);
}


?>