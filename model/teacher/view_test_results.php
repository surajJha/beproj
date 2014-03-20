<?php

// function chart2 likhna hai 

header('Content-Type: application/json');
session_start();

$field = $_GET['f'];

if ($field == "t")
{
    test_summary();
}
if ($field == "q")
{
    question_details();
}
if ($field == "s")
{
    student_ranks();
}
if ($field == "c1")
{
    chart1();
}
if ($field == "c2")
{
    chart2();
}

function test_summary()
{
    require_once '../database.php';

    $query = "select * from test as t where t.test_id='{$_GET['test_id']}'";
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

    $query = "SELECT q.question_id,q.question_desc,q.answer,q.topic_name,q.type FROM question AS q, test_has_question as t WHERE t.question_id=q.question_id and t.test_id='{$_GET['test_id']}'";

    $result = mysqli_query($connection, $query);

    if ($result)
    {
        $x = array();
        while ($row = mysqli_fetch_assoc($result))
        {
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

function student_ranks()
{
    require_once '../database.php';

    $x = array();
    /* @var $query type */
    $query = "select s.user_id,u.fname,u.lname, round(s.marks_obtained/s.total_marks*100) as p from student_gives_test as s, user as u where s.test_id='{$_GET['test_id']}' and s.user_id=u.user_id order by p desc";
    $result = mysqli_query($connection, $query);

    if ($result)
    {
        while ($row = mysqli_fetch_assoc($result))
        {
            array_push($x, $row);
        }


        echo json_encode($x);
    }
}

function chart1()
{
    require_once '../database.php';

    $x = array();

    $query = "select count(*) as na from student_belongs_to as c, test as t where t.test_id='{$_GET['test_id']}' and c.standard=t.standard and c.division=t.division and c.user_id not in (select s.user_id from student_gives_test as s where t.test_id=s.test_id )";
    $result = mysqli_query($connection, $query);

    if ($result)
    {
        $row = mysqli_fetch_assoc($result);
        array_push($x, $row);
    }

    $query = "select count(*) as pass from student_belongs_to as c, test as t where t.test_id='{$_GET['test_id']}' and c.standard=t.standard and c.division=t.division and c.user_id in (select s.user_id from student_gives_test as s where t.test_id=s.test_id and round(s.marks_obtained/s.total_marks*100)>=40 )";
    $result = mysqli_query($connection, $query);

    if ($result)
    {
        $row = mysqli_fetch_assoc($result);
        array_push($x, $row);
    }

    $query = "select count(*) as fail from student_belongs_to as c, test as t where t.test_id='{$_GET['test_id']}' and c.standard=t.standard and c.division=t.division and c.user_id not in (select s.user_id from student_gives_test as s where t.test_id=s.test_id and round(s.marks_obtained/s.total_marks*100)>=40 )";
    $result = mysqli_query($connection, $query);

    if ($result)
    {
        $row = mysqli_fetch_assoc($result);
        array_push($x, $row);
    }

    echo json_encode($x);
}

function chart2()
{
/* we need code here to extract every question in the test 
 * 
 * then i want the question wise data for - no of students who answered correctly, incorrectly or did not answer
 * 
 * but this has to be question wise !
 * 
 * 
 */
}
