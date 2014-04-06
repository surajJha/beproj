<?php

header('Content-Type: application/json');

session_start();

$field = $_GET['field'];

if ($field === "standard")
{
    populateStandard();
} elseif ($field === "division")
{
    populateDivision();
} elseif ($field === "subject")
{
    populateSubject();
} elseif ($field === "topic")
{
    populateTopic();
} elseif ($field === "name")
{
    populateName();
}

//extract which standards teacher teaches from database
// !!** add current year clause to query 
function populateStandard()
{
    require_once("../database.php");

    $x = array();

    $query = "SELECT t.standard
                                FROM teaches_class_subject AS t
                                WHERE t.user_id = '{$_SESSION['user_id']}'";
    $result = mysqli_query($connection, $query);

    if ($result)
    {
        while ($row = mysqli_fetch_assoc($result))
        {

            if (!in_array($row['standard'], $x))
            {
                array_push($x, $row['standard']);
            }
        }
    }
    echo json_encode($x);
}

//extract which divsions teacher teaches from database
// !!** add current year clause to query 
function populateDivision()
{
    require_once("../database.php");

    $x = array();

    $query = "SELECT t.division
                                FROM teaches_class_subject AS t
                                WHERE t.user_id = '{$_SESSION['user_id']}'
                                AND t.standard='{$_GET['standard']}'";
    $result = mysqli_query($connection, $query);

    if ($result)
    {
        while ($row = mysqli_fetch_assoc($result))
        {

            if (!in_array($row['division'], $x))
            {
                array_push($x, $row['division']);
            }
        }
    }

    echo json_encode($x);
}

//extract which subjects teacher teaches from database
// !!** add current year clause to query 
function populateSubject()
{
    require_once("../database.php");

    $x = array();

    $query = "SELECT t.subject_name
                    FROM teaches_class_subject AS t
                    WHERE t.user_id =  '{$_SESSION['user_id']}'
                    AND t.standard='{$_GET['standard']}'
                    AND t.division='{$_GET['division']}'";

    $result = mysqli_query($connection, $query);

    if ($result)
    {
        while ($row = mysqli_fetch_assoc($result))
        {

            if (!in_array($row['subject_name'], $x))
            {
                array_push($x, $row['subject_name']);
            }
        }
    }

    echo json_encode($x);
}

//extract which topics belong to standard, subject selected from database
// !!** add current year clause to query 
function populateTopic()
{
    require_once("../database.php");

    $x = array();
    $query = "SELECT t.topic_name
                    FROM topic AS t
                    WHERE t.subject_name='{$_GET['subject']}' AND t.standard='{$_GET['standard']}'";


    $result = mysqli_query($connection, $query);
    if ($result)
    {
        while ($row = mysqli_fetch_assoc($result))
        {

            if (!in_array($row['topic_name'], $x))
            {
                array_push($x, $row['topic_name']);
            }
        }
    }

    echo json_encode($x);
}

function populateName()
{
    require_once("../database.php");

    $x = array();
    $query = "SELECT distinct(t.test_name) FROM test AS t";

    $result = mysqli_query($connection, $query);
    if ($result)
    {
        while ($row = mysqli_fetch_assoc($result))
        {
            array_push($x, $row['test_name']);
        }
    }

    echo json_encode($x);
}

?>