<?php

header('Content-Type: application/json');
session_start();
$f = $_GET['f'];
if ($f == 1)
{
    getSubjects();
}
if ($f == 2)
{
    getClass();
}
if ($f == 3)
{
    getPhoto();
}

// function to retrieve SUBJECT specific details for student
function getSubjects()
{
    require_once '../database.php';
    $query = " select t.subject_name,u.fname,u.lname from teaches_class_subject as t,academic_year as a,user as u
where a.acad_year=t.acad_year and a.flag_current=1 and t.user_id=u.user_id and t.standard='{$_SESSION['standard']}' and t.division='{$_SESSION['division']}'";

    $result = mysqli_query($connection, $query);
    $x = array();
    if ($result)
    {
        while ($row = mysqli_fetch_assoc($result))
        {
            array_push($x, $row);
        }

        echo json_encode($x);
    }
}

// function to retrieve class specific details about the teacher
function getClass()
{
    require_once '../database.php';
    $query = "select u.fname,u.lname from is_class_teacher as t, academic_year as a, user as u
where t.user_id=u.user_id and a.acad_year=t.acad_year and a.flag_current=1 and t.standard='{$_SESSION['standard']}' and t.division='{$_SESSION['division']}'";

    $result = mysqli_query($connection, $query);
    $x = array();
    if ($result)
    {
        while ($row = mysqli_fetch_assoc($result))
        {
            array_push($x, $row);
        }
        echo json_encode($x);
    }
}

// function to retrieve the profile pic of the user
function getPhoto()
{
    
}
