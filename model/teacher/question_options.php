<?php

header('Content-Type: application/json');

session_start();

$field = $_GET['field'];

if ($field === "standard") {
    populateStandard();
} elseif ($field === "subject") {
    populateSubject();
} elseif ($field === "topic") {
    populateTopic();
} elseif ($field === "type") {
    populateType();
} elseif ($field === "level") {
    populateLevel();
}

//extract which standards teacher teaches from database
// !!** add current year clause to query 
function populateStandard() {
    require_once("../database.php");

    $x = array();

    $query = "SELECT t.standard
                                FROM teaches_class_subject AS t
                                WHERE t.user_id = '{$_SESSION['user_id']}'";
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

//extract which subjects teacher teaches corresponding to standard selected from database
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

    $query = "SELECT q.topic_name
                    FROM teaches_class_subject AS t, question AS q
                    WHERE t.user_id =  '{$_SESSION['user_id']}' 
                    AND q.standard='{$_GET['standard']}'
                    AND q.subject_name='{$_GET['subject']}'";

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

//extract which types of questions belong to standard, subject, topic selected from database
// !!** add current year clause to query 
function populateType() {
    require_once("../database.php");

    $x = array();

    $query = "SELECT q.type
                    FROM teaches_class_subject AS t, question AS q
                    WHERE t.user_id =  '{$_SESSION['user_id']}' 
                    AND q.standard='{$_GET['standard']}'
                    AND q.subject_name='{$_GET['subject']}' ";

    if (!$_GET['topic'] === "*") {

        $query.="AND q.topic_name='{$_GET['topic']}'";
    }

    $result = mysqli_query($connection, $query);

    if ($result) {
        while ($row = mysqli_fetch_assoc($result)) {

            if (!in_array($row['type'], $x)) {
                array_push($x, $row['type']);
            }
        }
    } else {
        echo mysqli_error($connection);
    }

    echo json_encode($x);
}


//extract which levels of questions belong to standard, subject, topic, type selected from database
// !!** add current year clause to query 
function populateLevel() {
    require_once("../database.php");

    $x = array();

    $query = "SELECT q.level
                    FROM teaches_class_subject AS t, question AS q
                    WHERE t.user_id =  '{$_SESSION['user_id']}' 
                    AND q.standard='{$_GET['standard']}'
                    AND q.subject_name='{$_GET['subject']}' ";

    if (!$_GET['topic'] === "*") {

        $query.="AND q.topic_name='{$_GET['topic']} '";
    }
    if(!$_GET['type'] === "*") {
        $query.="AND q.type='{$_GET['type']} '";
    }

    $result = mysqli_query($connection, $query);

    if ($result) {
        while ($row = mysqli_fetch_assoc($result)) {

            if (!in_array($row['level'], $x)) {
                array_push($x, $row['level']);
            }
        }
    } else {
        echo mysqli_error($connection);
    }

    echo json_encode($x);
}


?>