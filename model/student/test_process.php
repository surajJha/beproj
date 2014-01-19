<?php

session_start();
require_once '../database.php';

$id = $_SESSION['test_id'];
$code = $_POST['test_code'];
// savin entire test in session variable
$test = array();

$query = "select * from test where test_id='{$id}' and test_code='{$code}'";
if ($res = mysqli_query($connection, $query)) {
    
    $row = mysqli_fetch_assoc($res);
    $test = $row;
    print_r($test);

    // $result = mysqli_query($connection, $query);
    // $row = mysqli_fetch_assoc($result);

    if ($test['random'] === '1') {
        // random test logic
        random_test();
    } else if ($test['random'] === '0') {
        // custom test logic
        custom_test();
    }
}
// test condition has failed
else {
    echo "Entered test code doesn't match with the database code. Please Try Again.";
}

// logic for various types of test
function random_test() {
    $query = "SELECT q.question_id, q.question_desc, q.type"
            ."FROM question AS q"
            ."WHERE q.standard= '{$test['standard']}' AND q.subject_name='{$test['subject_name']}'"
            ."AND q.topic_name IN (SELECT t.topic_name FROM test_on_topic AS t WHERE t.test_id= '{$test['test_id']}')";
            
            
            
    if ($res = mysqli_query($connection, $query)) {

        while($row = mysqli_fetch_assoc($res))
            $questions=$row;
    }
}
/*
function custom_test() {
    $query = "";
    if ($res = mysqli_query($connection, $query)) {

        $row = mysqli_fetch_assoc($res);
    }
}
 * */
 
?>