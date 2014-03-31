<?php

header('Content-Type: application/json');

session_start();

$f = $_GET['f'];

if ($f == "s2")
{
    populateS2();
}
if ($f == "test_codes")
{
    populateTestCodes();
}
if ($f == "student")
{
    populateStudent();
}
if ($f == "subject")
{
    populateSubject();
}

if ($f == "cc")
{
    classChart();
}

if ($f == "tc")
{
    testChart();
}

if ($f == "sc")
{
    studentChart();
}

if ($f == "subc")
{
    subjectChart();
}

function populateS2()
{
    require_once("../database.php");

    $x = array();

    $query = "select concat(t.standard,'-',t.division) as c from teaches_class_subject as t, academic_year as a
where t.user_id='{$_SESSION['user_id']}' and t.acad_year=a.acad_year and a.flag_current=1";

    $result = mysqli_query($connection, $query);

    if ($result)
    {
        while ($row = mysqli_fetch_assoc($result))
        {
            array_push($x, $row['c']);
        }

        echo json_encode($x);
    }
}

function populateTestCodes()
{
    require_once("../database.php");
    $d = date("Y-m-d");
    $x = array();

    $query = "select t.test_id from test as t, academic_year as a
where t.user_id='{$_SESSION['user_id']}' and t.date<'{$d}' and t.date >=a.acad_start and t.date<=a.acad_end and a.flag_current=1";

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

function populateStudent()
{
    require_once("../database.php");

    $x = array();

    $query = "select concat(u.fname,' ',u.lname,' - ',u.user_id) as s from user as u, student_belongs_to as s, academic_year as a
where s.standard='{$_GET['std']}' and s.division='{$_GET['div']}' and a.acad_year=s.acad_year and u.user_id=s.user_id and
a.flag_current=1";

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

function populateSubject()
{

    require_once("../database.php");

    $x = array();

    $query = "select t.subject_name as s from teaches_class_subject as t,academic_year as a
where t.user_id='{$_SESSION['user_id']}' and t.standard='{$_GET['std']}' and t.division='{$_GET['div']}' and t.acad_year=a.acad_year and a.flag_current=1";

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

function classChart()
{

    require_once '../database.php';

    $query = "select u.fname,u.lname,t.subject_name, g.marks_obtained,g.total_marks  
        from student_belongs_to as b, user as u, student_gives_test as g, test as t 
        where b.user_id= u.user_id and b.user_id= g.user_id and  g.test_id = t.test_id 
        and b.standard='{$_GET['std']}' and b.division= '{$_GET['div']}' and t.test_name='Unit test 1'";
    $result = mysqli_query($connection, $query);
    if ($result)
    {
        $x = array();
        while ($row = mysqli_fetch_assoc($result))
        {
            array_push($x, $row);
        }
        /* echo "<prev";
          var_dump($x);
          echo "</prev>"; */
        echo json_encode($x);
    }
}

function testChart()
{
    
}

function studentChart()
{
    require_once '../database.php';

    $query = "select t.test_name,g.marks_obtained, g.total_marks, t.subject_name,t.date,t.test_id from test as t, student_gives_test as g, academic_year as a"
            . " where  g.user_id='{$_GET['user_id']}' and g.test_id= t.test_id  and acad_start<t.date and  t.date<a.acad_end and a.flag_current=1";
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

function subjectChart()
{
    require_once '../database.php';

    $query = "select u.user_id,u.fname,u.lname,t.test_name, g.marks_obtained,g.total_marks, round((g.marks_obtained/ g. total_marks)*100,2) as percent  
        from student_belongs_to as b, user as u, student_gives_test as g, test as t
        where b.user_id= u.user_id and b.user_id= g.user_id and  g.test_id = t.test_id and t.standard=b.standard and t.division=b.division  
        and b.standard='{$_GET['std']}' and b.division='{$_GET['div']}' and t.subject_name='{$_GET['subject']}' order by percent desc";
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
