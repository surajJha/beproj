<?php
    session_start();
    require_once '../database.php';
    
    $id = $_SESSION['test_id'];
      $code = $_POST['test_code'];
   
    $query= " SELECT test_code FROM test WHERE test_id='{$id}' AND test_code='{$code}'"; 
    $result = mysqli_query($connection, $query);
    $row = mysqli_fetch_assoc($result);
    
    if(// test cond is true)
    {
        if(test is random)
        {
            random_test();
        }
        else if(test is custom)
        {
            custom_test();
        }
    }
    
    else
    {
        echo "Entered test code doesn't match with the database code. Please Try Again.";
    }
    
    // logic for various types of test
    function random_test()
    {
        
    }
    
    
?>