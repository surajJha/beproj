<?php

session_start();
require '../database.php';


$id = $_SESSION['test_id'];
$code = $_POST['test_code'];

// saving entire test in session variable
$test = array();

$query = "select * from test where test_id='{$id}' and test_code='{$code}'";

$result=mysqli_query($connection, $query);
$test = mysqli_fetch_assoc($result);

if ($test != NULL) 
{
    if ($test['random'] === '1')
    {
        // random test logic ->should actually be made 1 later 
        random_test();
    }
    else if ($test['random'] === '0')
    {
        // custom test logic -> this is for custom should be made 0 later
         custom_test();
    }
}
// test condition has failed
else
{
    echo "Entered test code doesn't match with the database code. Please Try Again.";
}

// logic for various types of test
function random_test()
{

    global $test;
    global $connection;

    $questions = [];

    $query = "SELECT q.question_id, q.question_desc, q.type, q.topic_name "
            . "FROM question AS q "
            . "WHERE q.standard= '{$test['standard']}' AND q.subject_name='{$test['subject_name']}' "
            . "AND q.topic_name IN (SELECT t.topic_name FROM test_on_topic AS t WHERE t.test_id= '{$test['test_id']}') "
            . "ORDER BY RAND() "
            . "LIMIT {$test['no_questions']}";


    if ($res = mysqli_query($connection, $query))
    {

        $i = 0;
        while ($row = mysqli_fetch_assoc($res))
        {
            array_push($questions, $row);

            if ($row['type'] === "Mcq")
            {

                $query = "SELECT optionA, optionB, optionC, optionD FROM mcq WHERE question_id='{$row['question_id']}'";

                $temp_res = mysqli_query($connection, $query);

                $temp_row = mysqli_fetch_assoc($temp_res);

                $questions[$i]['topic_name']=$row['topic_name'];
                $questions[$i]['optionA'] = $temp_row['optionA'];
                $questions[$i]['optionB'] = $temp_row['optionB'];
                $questions[$i]['optionC'] = $temp_row['optionC'];
                $questions[$i]['optionD'] = $temp_row['optionD'];
            }
            $questions[$i]['response'] = NULL;
            $i++;
        }
        $test['questions'] = $questions;

        $_SESSION['test'] = $test;

       echo "url";
    }
}

function custom_test()
{
    global $test;
    global $connection;

    $questions = [];

    $query = "SELECT q.question_id, q.question_desc, q.type, q.topic_name "
            . "FROM question AS q , test_has_question as t "
            . "WHERE q.question_id=t.question_id "
            . "AND t.test_id='{$test['test_id']}'";

    if ($res = mysqli_query($connection, $query))
    {

        $i = 0;
        while ($row = mysqli_fetch_assoc($res))
        {
            array_push($questions, $row);

            if ($row['type'] === "Mcq")
            {

                $query = "SELECT optionA, optionB, optionC, optionD FROM mcq WHERE question_id='{$row['question_id']}'";

                $temp_res = mysqli_query($connection, $query);

                $temp_row = mysqli_fetch_assoc($temp_res);

                $questions[$i]['topic_name']=$row['topic_name'];
                $questions[$i]['optionA'] = $temp_row['optionA'];
                $questions[$i]['optionB'] = $temp_row['optionB'];
                $questions[$i]['optionC'] = $temp_row['optionC'];
                $questions[$i]['optionD'] = $temp_row['optionD'];
            }
            $questions[$i]['response'] = NULL;
            $i++;
        }
        $test['questions'] = $questions;

        $_SESSION['test'] = $test;

        echo "url";
    }
}

?>
