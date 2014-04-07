<?php

header('Content-Type: application/json');

session_start();

$f = $_GET['f'];

if ($f == "my")
{
    myPerformance();
}
if ($f == "get_test_id")
{
    populateTestCodes();
}

if ($f == "get_subject")
{
    populateSubject();
}

if( $f == "subject")
{
   // subject_charts();
}

if($f == "test")
{
    // testcharts
}

function myPerformance()
{
    require_once '../database.php';

    $query = "select t.test_name,g.marks_obtained, g.total_marks, t.subject_name,t.date,t.test_id from test as t, student_gives_test as g, academic_year as a"
            . " where  g.user_id='{$_SESSION['user_id']}' and g.test_id= t.test_id  and acad_start<t.date and  t.date<a.acad_end and a.flag_current=1";
    $result = mysqli_query($connection, $query);

    if ($result)
    {
        $x = array();

        while ($row = mysqli_fetch_assoc($result))
        {
            array_push($x, $row);
        }
        echo json_encode($x);
    }
}

function populateTestCodes()
{
    require_once("../database.php");
    $d = date("Y-m-d");
    $x = array();

    $query = "select t.test_id from student_gives_test as st, test as t,academic_year as a where st.user_id='{$_SESSION['user_id']}' and t.test_id=st.test_id and t.subject_name='Math' and t.date<'{$d}' and t.date >=a.acad_start and t.date<=a.acad_end and a.flag_current=1";

    $result = mysqli_query($connection, $query);

    if ($result)
    {
        while ($row = mysqli_fetch_assoc($result))
        {
            array_push($x, $row['test_id']);
        }

        echo json_encode($x);
    }
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
            array_push($x, $row['s']);
        }

        echo json_encode($x);
    }
}
