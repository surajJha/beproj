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

    $query = "SELECT q.question_id,q.question_desc,q.answer,q.topic_name,q.type
FROM question AS q, test_has_question as t
WHERE t.question_id=q.question_id and t.test_id='{$_GET['test_id']}'";

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
