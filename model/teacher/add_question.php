<?php

/*
 *      THIS FILE WILL BE USED FOR INSERTING THE QUESTIONS IN THE DATABASE
 *      DEPENDING ON THE MODAL TYPE THE APPROPRIATE FUNCTION WILL BE CALLLED 
 *      AND THE QUERY WILL BE EXECUTED.
 */

//******** CHECKING FOR THE TYPE OF QUESTION*************

$type = $_POST["q_type"];

if ($type === "Mcq") {
    insertMCQ();
} else if ($type === "Subjective") {
    insertSubjective();
} else if ($type === "Numeric") {
    insertNumeric();
} else if ($type === "True-False") {
    insertTF();
}

//**************INSERTION FUNCTIONS****************************
//MCQ QUESTION INSERTION
function insertMCQ() {
    $question_desc = $_POST["mcq_question"];
    $level = $_POST["mcq_level"];
    $topic = $_POST["mcq_topic"];
    $subject = $_POST["mcq_subject"];
    $standard = $_POST["mcq_standard"];
    $type = $_POST["q_type"];

    $opa = $_POST["mcq_op_a"];
    $opb = $_POST["mcq_op_b"];
    $opc = $_POST["mcq_op_c"];
    $opd = $_POST["mcq_op_d"];
    $answer = $_POST["mcq_answer"];

    require_once '../database.php';

    $query = "INSERT into QUESTION (`question_id`, `question_desc`,`answer`, `level`, `topic_name`, `subject_name`, `standard`, `type`)
                        values(NULL,'{$question_desc}','{$answer}','{$level}','{$topic}','{$subject}','{$standard}','{$type}')";

    if (mysqli_query($connection, $query)) {

        $id = mysqli_insert_id($connection);
        $query = "INSERT into MCQ (`optionA`, `optionB`, `optionC`, `optionD`, `answer`, `question_id`) 
        values('{$opa}','{$opb}','{$opc}','{$opd}','{$answer}','{$id}')";
        if (mysqli_query($connection, $query)) {
            echo "success";
        }
    }
}

//SUBJECTIVE QUESTION INSERTION
function insertSubjective() {

    $question_desc = $_POST["sub_question"];
    $level = $_POST["sub_level"];
    $topic = $_POST["sub_topic"];
    $subject = $_POST["sub_subject"];
    $standard = $_POST["sub_standard"];
    $type = $_POST["q_type"];
    $answer = $_POST["sub_keyword"];

    require_once '../database.php';

    $query = "INSERT into QUESTION (`question_id`, `question_desc`,`answer`, `level`, `topic_name`, `subject_name`, `standard`, `type`)
                        values(NULL,'{$question_desc}','{$answer}','{$level}','{$topic}','{$subject}','{$standard}','{$type}')";

    if (mysqli_query($connection, $query)) {

        $id = mysqli_insert_id($connection);
        $query = "INSERT into SUBJECTIVE (`keyword`, `question_id`) 
        values('{$answer}','{$id}')";
        if (mysqli_query($connection, $query)) {
            echo "success";
        }
    }
}

//NUMERIC QUESTION INSERTION
function insertNumeric() {
    $question_desc = $_POST["num_question"];
    $level = $_POST["num_level"];
    $topic = $_POST["num_topic"];
    $subject = $_POST["num_subject"];
    $standard = $_POST["num_standard"];
    $type = $_POST["q_type"];
    $answer = $_POST["num_answer"];

    require_once '../database.php';

    $query = "INSERT into QUESTION (`question_id`, `question_desc`,`answer`, `level`, `topic_name`, `subject_name`, `standard`, `type`)
                        values(NULL,'{$question_desc}','{$answer}','{$level}','{$topic}','{$subject}','{$standard}','{$type}')";

    if (mysqli_query($connection, $query)) {

        $id = mysqli_insert_id($connection);

        $query = "INSERT INTO `numeric`(`answer`, `question_id`) VALUES ('{$answer}','{$id}')";
        if (mysqli_query($connection, $query)) {
            echo "success";
        }
    }
}

//TRUE OR FALSE QUESTION INSERTION
function insertTF() {

    $question_desc = $_POST["tf_question"];
    $level = $_POST["tf_level"];
    $topic = $_POST["tf_topic"];
    $subject = $_POST["tf_subject"];
    $standard = $_POST["tf_standard"];
    $type = $_POST["q_type"];
    $answer = $_POST["tf_answer"];

    require_once '../database.php';

    $query = "INSERT into QUESTION (`question_id`, `question_desc`,`answer`, `level`, `topic_name`, `subject_name`, `standard`, `type`)
                        values(NULL,'{$question_desc}','{$answer}','{$level}','{$topic}','{$subject}','{$standard}','{$type}')";
    if (mysqli_query($connection, $query)) {

        $id = mysqli_insert_id($connection);
        $query = "INSERT INTO `true_false`(`answer`, `question_id`) VALUES ('{$answer}','{$id}')";
        if (mysqli_query($connection, $query)) {
            echo "success";
        } else {
            echo mysqli_error($connection);
        }
    } else {
        echo mysqli_error($connection);
    }
}
