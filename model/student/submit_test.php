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
$t = sizeof($_SESSION['test']['questions']);
$m = 0;


for ($i = 0; $i < sizeof($_SESSION['test']['questions']); $i++)
{
    $query = "SELECT `answer` FROM `question` WHERE `question_id`='{$_SESSION['test']['questions'][$i]['question_id']}'";
    $result = mysqli_query($connection, $query);

    $row = mysqli_fetch_assoc($result);
    $answer = $row['answer'];

    $_SESSION['test']['questions'][$i]['answer'] = $answer;

    if ($_SESSION['test']['questions'][$i]['response'] == NULL)
    {
        $_SESSION['test']['questions'][$i]['response'] = "-";
    }
    if ($answer == $_SESSION['test']['questions'][$i]['response'])
    {
        $m++;
    }
}

$_SESSION['test']['m']=$m;

//save start time and end time also in session
$query = "INSERT INTO `student_gives_test`(`user_id`, `test_id`, `start_time`, `end_time`, `response_id`, `marks_obtained`, `total_marks`) "
        . "VALUES ('{$user_id}','{$test_id}','','','NULL','{$m}','{$t}')";

if (mysqli_query($connection, $query))
{
    $id = mysqli_insert_id($connection);

    for ($i = 0; $i < sizeof($_SESSION['test']['questions']); $i++)
    {
        $query = "INSERT INTO `response`(`response_id`, `test_id`, `question_id`, `response`, `answer`, `subject_name`, `topic_name`, `standard`, `division`) 
                VALUES ('{$id}','{$test_id}','{$_SESSION['test']['questions'][$i]['question_id']}','{$_SESSION['test']['questions'][$i]['response']}','{$_SESSION['test']['questions'][$i]['answer']}','{$_SESSION['test']['subject_name']}','{$_SESSION['test']['questions'][$i]['topic_name']}','{$_SESSION['standard']}','{$_SESSION['division']}')";

        mysqli_query($connection, $query);
    }

    echo "success";
    
    print_r($_SESSION);
} else
{
    echo mysqli_error($connection);
}
?>

