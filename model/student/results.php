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

if ($f == "subject")
{
    subject_wise();
}

if ($f == "t")
{
    test_summary();
}

if ($f == "q")
{
    question_details();
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

    $query = "select t.test_id from student_gives_test as st, test as t,academic_year as a where st.user_id='{$_SESSION['user_id']}' and t.test_id=st.test_id and t.subject_name='{$_GET['subj']}' and t.date<'{$d}' and t.date >=a.acad_start and t.date<=a.acad_end and a.flag_current=1";

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

function subject_wise()
{
    require_once '../database.php';

    $query = "select t.test_name, round((g.marks_obtained/ g.total_marks *100),2) as percent, t.subject_name from student_gives_test as g , test as t where g.test_id= t.test_id and g.user_id='{$_SESSION['user_id']}'";
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

function test_summary()
{
    require_once '../database.php';

    $query = "select s.marks_obtained,s.total_marks,t.date,t.subject_name,t.standard,t.division,t.duration from test as t, student_gives_test as s where s.user_id='{$_SESSION['user_id']}' and s.test_id=t.test_id and s.test_id='{$_GET['test_id']}'";
    $result = mysqli_query($connection, $query);

    if ($result)
    {
        $row = mysqli_fetch_assoc($result);
        echo json_encode($row);
    }
}

function question_details()
{
    require_once '../database.php';

    $query = "SELECT q.question_id,q.question_desc,r.response,q.answer,q.topic_name,q.type
FROM response AS r, student_gives_test AS s, question AS q
WHERE r.response_id = s.response_id
AND s.user_id =  '{$_SESSION['user_id']}'
AND r.test_id =  '{$_GET['test_id']}'
and r.question_id=q.question_id";

    $result = mysqli_query($connection, $query);

    if ($result)
    {
        $x = array();
        while ($row = mysqli_fetch_assoc($result))
        {
            //var_dump($row['response']);
            if ($row['type'] == "Mcq")
            {

                $query = "SELECT `optionA`, `optionB`, `optionC`, `optionD` FROM `mcq` WHERE `question_id`='{$row['question_id']}'";
                $result_temp = mysqli_query($connection, $query);

                if ($result_temp)
                {
                    $row_temp = mysqli_fetch_assoc($result_temp);
                    $row['mcq']['optionA'] = $row_temp['optionA'];
                    $row['mcq']['optionB'] = $row_temp['optionB'];
                    $row['mcq']['optionC'] = $row_temp['optionC'];
                    $row['mcq']['optionD'] = $row_temp['optionD'];
                }

                array_push($x, $row);
            }
        }

        echo json_encode($x);
    }
}
