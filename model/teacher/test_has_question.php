<?php

session_start();
require_once '../database.php';

$q = $_POST['question_id'];

for ($i = 0; $i < sizeof($q); $i++) {
    $query = "INSERT INTO `test_has_question`(`question_id`, `test_id`) VALUES ('{$q[$i]}','{$_SESSION['test_id']}')";
    $result = mysqli_query($connection, $query);
}

unset($_SESSION['test_id']);

echo "akjfgwif";
//echo "http://localhost/beproj/view/teacher/set_question_paper.php";