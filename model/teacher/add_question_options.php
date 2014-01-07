<?php

header('Content-Type: application/json');

session_start();

$field = $_GET['field'];

if ($field === "subject") {
    populateSubject();
} elseif ($field === "topic") {
    populateTopic();
} elseif ($field === "level") {
    populateLevel();
}

//extract which standards teacher teaches from database
// !!** add current year clause to query 
function populateSubject() {
    require_once("../database.php");

    $x = array();

    $query = "SELECT t.subject_name
                    FROM teaches_class_subject AS t
                    WHERE t.user_id =  '{$_SESSION['user_id']}'
                    AND t.standard='{$_GET['standard']}'";

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

//extract which topics belong to standard, subject selected from database
// !!** add current year clause to query 
function populateTopic() {
    require_once("../database.php");

    $x = array();
 $query = "SELECT t.topic_name
                    FROM topic AS t
                    WHERE t.subject_name='{$_GET['subject']}'";

                    
    $result = mysqli_query($connection, $query);
    if ($result) {
        while ($row = mysqli_fetch_assoc($result)) {

            if (!in_array($row['topic_name'], $x)) {
                array_push($x, $row['topic_name']);
            }
        }
    } else {
        echo mysqli_error($connection);
    }

    echo json_encode($x);
}

?>