<?php

require '../database.php';

session_start();

for ($i = 0; $i < sizeof($_POST); $i++)
{
    $_SESSION['test']['questions'][$i]['response'] = $_POST[$i];
}

$user_id = $_SESSION['user_id'];
$test_id = $_SESSION['test_id'];
//$start=$_SESSION['start_time'];
//$end=$_SESSION['end_time'];
$t = $_SESSION['test']['no_questions'];
$m = 0;

$response = "";

for ($i = 0; $i < sizeof($_SESSION['test']['questions']); $i++)
{
    $query = "SELECT `answer` FROM `question` WHERE `question_id`='{$_SESSION['test']['questions'][$i]['question_id']}'";
    $result = mysqli_query($connection, $query);

    $row = mysqli_fetch_assoc($result);
    $answer = $row['answer'];

    $_SESSION['test']['questions'][$i]['answer'] = $answer;
    
    $response.="({$_SESSION['test']['questions'][$i]['question_id']},";

    if ($_SESSION['test']['questions'][$i]['response'] == NULL)
    {
        $_SESSION['test']['questions'][$i]['response'] = "-";
        $response.="NULL,";
    } else
    {
        $response.="{$_SESSION['test']['questions'][$i]['response']},";
    }
    if ($answer == $_SESSION['test']['questions'][$i]['response'])
    {
        $m++;
    }
    $response.=$answer.")";
}

$response = mysqli_real_escape_string($connection, $response);

$_SESSION['test']['m'] = $m;

//save start time and end time also in session
$query = "INSERT INTO `student_gives_test`(`user_id`, `test_id`, `start_time`, `end_time`, `response`, `marks_obtained`, `total_marks`) "
        . "VALUES ('{$user_id}','{$test_id}','','','{$response}','{$m}','{$t}')";

if (mysqli_query($connection, $query))
{
    echo "success";
}
?>

