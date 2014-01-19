<?php
    session_start();
    print_r($_POST);
    
    $code = $_POST['test_code'];
    $test_id = $_SESSION['test_id'];
    $query= " SELECT test_code FROM test WHERE test_id='{$test_id}'"; 
    result
?>