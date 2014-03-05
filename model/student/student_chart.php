<?php

header('Content-Type: application/json');
session_start();
require_once("../database.php");

$x = array();
//$no_question=$_SESSION['test']['no_questions'];
//while($no_question)
//  {
$query = "SELECT q.topic, r.response,q.question_id, q.answer " +
        "FROM student_gives_test AS s, question AS q, response AS r " +
        "WHERE s.test_id= (test_id) AND s.user_id='{$_SESSION["user_id"]}' AND s.uer_id=r.user_id AND s.test_id= r.test_id AND r.question_id=q.question_id";

$result = mysqli_query($connection, $query);
//session_start();
if ($result)
{
    while ($row = mysqli_fetch_assoc($result))
    {
        array_push($x, $row);
    }
    echo json_encode($x);
}
else
{
    echo "error";
}
?>
