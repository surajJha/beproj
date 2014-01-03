<?php

session_start();
require_once 'database.php';

// taking data from view_question_form - AJAX
$subject = $_POST['subject'];
$class = $_POST['class'];
$level = $_POST['level'];
$type = $_POST['type'];
$topic = $_POST['topic'];

$query = "";
       

?>