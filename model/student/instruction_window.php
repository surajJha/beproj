<?php

session_start();
require '../database.php';


$id = $_SESSION['test_id'];
$code = $_POST['test_code'];

// saving entire test in session variable
$test = array();
//Check test code is correct or not
$query = "select * from test where test_id='{$id}' and test_code='{$code}'";
$result = mysqli_query($connection, $query);
$test = mysqli_fetch_assoc($result);
//if test code is correct
if ($test != NULL)
{

    //check if new test request or to continue test request
    $query = "select * from active_test_time where test_id='{$id}' and user_id='{$_SESSION['user_id']}'";
    $r = mysqli_query($connection, $query);
    $active = mysqli_fetch_assoc($r);
    if ($active != NULL)
    {

        $test['duration'] = $active['time_left'];
        $query = "SELECT q.question_id, q.question_desc, q.type, q.topic_name,p.response "
                . "FROM question AS q, test_progress as p "
                . "WHERE q.question_id= p.question_id and p.test_id='{$test['test_id']}' and p.user_id= '{$_SESSION['user_id']}' "
                . "LIMIT {$test['no_questions']}";
        $questions = [];
        if ($res = mysqli_query($connection, $query))
        {

            $i = 0;
            while ($row = mysqli_fetch_assoc($res))
            {


                array_push($questions, $row);

                //For MCQ
                if ($row['type'] === "Mcq")
                {

                    $query = "SELECT optionA, optionB, optionC, optionD FROM mcq WHERE question_id='{$row['question_id']}'";

                    $temp_res = mysqli_query($connection, $query);

                    $temp_row = mysqli_fetch_assoc($temp_res);

                    $questions[$i]['topic_name'] = $row['topic_name'];
                    $questions[$i]['optionA'] = $temp_row['optionA'];
                    $questions[$i]['optionB'] = $temp_row['optionB'];
                    $questions[$i]['optionC'] = $temp_row['optionC'];
                    $questions[$i]['optionD'] = $temp_row['optionD'];
                }
                $i++;
            }
            $test['questions'] = $questions;

            $_SESSION['test'] = $test;
            $_SESSION['test']['i'] = 0;
            echo "url";
        }
        else
        {
            echo 'active but nothing found';
        }
    }
    else
    {
        if ($test['random'] === '1')
        {
            // random test logic ->should actually be made 1 later 
            $query = "SELECT q.question_id, q.question_desc, q.type, q.topic_name "
                    . "FROM question AS q "
                    . "WHERE q.standard= '{$test['standard']}' AND q.subject_name='{$test['subject_name']}' "
                    . "AND q.topic_name IN (SELECT t.topic_name FROM test_on_topic AS t WHERE t.test_id= '{$test['test_id']}') "
                    . "ORDER BY RAND() "
                    . "LIMIT {$test['no_questions']}";
        }
        else if ($test['random'] === '0')
        {
            // custom test logic -> this is for custom should be made 0 later
            $query = "SELECT q.question_id, q.question_desc, q.type, q.topic_name "
                    . "FROM question AS q , test_has_question as t "
                    . "WHERE q.question_id=t.question_id "
                    . "AND t.test_id='{$test['test_id']}'";
        }
        $questions = [];
        if ($res = mysqli_query($connection, $query))
        {
            //entry in active_test_time table
            $query1 = "insert into active_test_time values('{$_SESSION['user_id']}', '{$test['test_id']}','{$test['duration']}')";
            mysqli_query($connection, $query1);

            $i = 0;
            while ($row = mysqli_fetch_assoc($res))
            {
                array_push($questions, $row);

                //Entery in test_progress table
                $query2 = "insert into test_progress (user_id,test_id,question_id) values('{$_SESSION['user_id']}', '{$test['test_id']}','{$row['question_id']}')";
                mysqli_query($connection, $query2);

                //For MCQ
                if ($row['type'] === "Mcq")
                {

                    $query = "SELECT optionA, optionB, optionC, optionD FROM mcq WHERE question_id='{$row['question_id']}'";

                    $temp_res = mysqli_query($connection, $query);

                    $temp_row = mysqli_fetch_assoc($temp_res);

                    $questions[$i]['topic_name'] = $row['topic_name'];
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
            $_SESSION['test']['i'] = 0;
            echo "url";
        }
    }
}
// test condition has failed
else
{
    echo "Entered test code doesn't match with the database code. Please Try Again.";
}

// logic for various types of test
?>
