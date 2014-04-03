<?php

header('Content-Type: application/json');

session_start();

$f = $_GET['f'];

if ($f == "s1")
{
    populateSubject();
} elseif ($f == "s2")
{
    populateTeacher();
}
if ($f == "e")
{
    feedbackExist();
}

function populateSubject()
{

    require_once("../database.php");

    $x = array();

    $query = "select distinct(t.subject_name) as s from teaches_class_subject as t,academic_year as a
where t.standard='{$_SESSION['standard']}' and t.division='{$_SESSION['division']}' and t.acad_year=a.acad_year and a.flag_current=1";

    $result = mysqli_query($connection, $query);

    if ($result)
    {
        while ($row = mysqli_fetch_assoc($result))
        {
            array_push($x,$row['s']);
        }

        echo json_encode($x);
    }
}

function populateTeacher()
{

    require_once("../database.php");

    $x = array();

    $query = "select concat(u.fname,' ',u.lname) as name, u.user_id from teaches_class_subject as t,user as u,academic_year as a
where t.standard='{$_SESSION['standard']}' and t.division='{$_SESSION['division']}' and t.acad_year=a.acad_year and a.flag_current=1 and t.user_id=u.user_id and t.subject_name='{$_GET['subject']}'";
    
    $result = mysqli_query($connection, $query);

    if ($result)
    {
        while ($row = mysqli_fetch_assoc($result))
        {
            array_push($x,$row);
        }

        echo json_encode($x);
    }
}

function feedbackExist()
{
    // check and return value if does not exist
    
     echo json_encode("ne");
}