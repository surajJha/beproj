<?php

header('Content-Type: application/json');
session_start();

$field = $_GET['f'];

if ($field == "test_summary")
    test_summary();
else if ($field = "question_details")
    question_details();

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
            if ($row['type'] == "Mcq")
            {
                
                $query = "SELECT `optionA`, `optionB`, `optionC`, `optionD` FROM `mcq` WHERE `question_id`='{$row['question_id']}'";
                $result_temp = mysqli_query($connection, $query);
                
                if($result_temp)
                {
                    $row_temp=  mysqli_fetch_assoc($result_temp);
                    $row['mcq']['optionA']=$row_temp['optionA'];
                    $row['mcq']['optionB']=$row_temp['optionB'];
                    $row['mcq']['optionC']=$row_temp['optionC'];
                    $row['mcq']['optionD']=$row_temp['optionD'];
                }
                
                array_push($x, $row);
            }
        }

        echo json_encode($x);
    }
}
