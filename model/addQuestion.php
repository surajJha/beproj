<?php

/* 
 *      THIS FILE WILL BE USED FOR INSERTING THE QUESTIONS IN THE DATABASE
 *      DEPENDING ON THE MODAL TYPE THE APPROPRIATE FUNCTION WILL BE CALLLED 
 *      AND THE QUERY WILL BE EXECUTED.
 */

//print_r( $_POST)
function isEmpty(){
foreach($_POST as $val){
    if(empty($val)){
        return true;
    }
    else{
        return false;
    }
  
}

}
//******** CHECKING FOR THE TYPE OF QUESTION*************
  
$question_type = $_POST["model_type"];
if($question_type === mcq){
    insertMCQ();
}
else if($question_type === subjective){
    insertSubjective();
}
else if($question_type === numeric){
   insertNumeric();
}
else if($question_type === tf){
    insertTrueFalse();
}
else{
    echo 'SYSTEM DOES NOT SUPPORT THE SELECTED QUESTION TYPE';
}

//**************INSERTION FUNCTIONS****************************
$question_desc = $_POST["question"];
$level =  $_POST["level"];
$topic =  $_POST["topic"];
$subject =  $_POST["subject"];
$standard =  $_POST["standard"];
$type =  $_POST["type"];

//MCQ QUESTION INSERTION
function insertMCQ()
{
    $op1 = $_POST["option1_mcqModal"];
    $op2 = $_POST["option2_mcqModal"];
    $op3 = $_POST["option3_mcqModal"];
    $op4 = $_POST["option4_mcqModal"];
    $answer = $_POST["answer_mcqModal"];
    require_once 'database.php';
    $question_query = "INSERT into QUESTION values('{$question_desc}',{$level},'{$topic}','{$subject}',{$standard},'{$type}')";
    $temp_query = "SELECT question_id from QUESTION where question_desc = '{$question_desc}'";
    $mcq_query = "INSERT INTO MCQ values('{$op1}','{$op2}','{$op3}','{$op4}',{$answer},{})";
    
}