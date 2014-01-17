<?php

/*
 *      THIS FILE WILL BE USED FOR INSERTING THE QUESTIONS IN THE DATABASE
 *      DEPENDING ON THE MODAL TYPE THE APPROPRIATE FUNCTION WILL BE CALLLED 
 *      AND THE QUERY WILL BE EXECUTED.
 */

print_r($_POST);

//******** CHECKING FOR THE TYPE OF QUESTION*************

$type = $_POST["type"];

if ($type === "mcq") {
    insertMCQ();
} else if ($type === "subjective") {
    insertSubjective();
} else if ($type === "numeric") {
    insertNumeric();
} else if ($type === "tf") {
    insertTrueFalse();
}

//**************INSERTION FUNCTIONS****************************
//MCQ QUESTION INSERTION
function insertMCQ() {
    $question_desc = $_POST["mcq_question"];
    $level = $_POST["mcq_level"];
    $topic = $_POST["mcq_topic"];
    $subject = $_POST["mcq_subject"];
    $standard = $_POST["mcq_standard"];
    $type = $_POST["type"];

    $opa = $_POST["mcq_op_a"];
    $opb = $_POST["mcq_op_a"];
    $opc = $_POST["mcq_op_a"];
    $opd = $_POST["mcq_op_a"];
    $answer = $_POST["mcq_answer"];
    
    require_once 'database.php';
    
    $question_query = "INSERT into QUESTION (`question_id`, `question_desc`, `level`, `topic_name`, `subject_name`, `standard`, `type`) values(NULL,'{$question_desc}','{$level}','{$topic}','{$subject}','{$standard}','{$type}')";
    if (mysqli_query($connection, $question_query)) {
        echo 'success';
    } else {
        echo "THE ERROR IS" . mysqli_error($connection);
    }
    $temp_query = "SELECT question_id from QUESTION where question_desc = '{$question_desc}'";
    $temp_q = mysqli_query($connection, $temp_query);
    $temp = mysqli_fetch_assoc($temp_q);
    var_dump($temp);
    // $mcq_query = "INSERT INTO MCQ values('{$op1}','{$op2}','{$op3}','{$op4}',{$answer},{$temp})";
}
