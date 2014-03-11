<?php

header('Content-Type: application/json');
session_start();
require_once("../database.php");

$list = array();

$topics = array();

$query = " select * from response where test_id=18 ";

$result = mysqli_query($connection, $query);
if ($result)
{
    while ($row = mysqli_fetch_assoc($result))
    {
        array_push($list, $row);
    }

    
    
    
    
    
    
    
    
    
    
    
    
    
    /*// calculate total question answered, correctly answered, wrongly answered
    foreach ($list['topic_name'] as $value)
    {
        $x = $value;
        if (!in_array($x, $topics))
        {
            array_push($topics, $x);
            $topics["{$x}"] = array("t" => 0, "a" => 0, "c" => 0);
        }

        //for total
        $topics["{$x}"]['t'] = $topics["{$x}"]['t'] + 1;

        //for answered
        if ($list['answer'] != $list['response'])
        {
            $topics["{$x}"]['a'] = $topics["{$x}"]['a'] + 1;
        }

        if ($list['answer'] == $list['response'])
        {
            $topics["{$x}"]['c'] = $topics["{$x}"]['c'] + 1;
        }
    }
*/
    
    
    
    
    
    
    
    
    
    echo json_encode($list);
}
else
{
    echo mysqli_error($connection);
}
?>
