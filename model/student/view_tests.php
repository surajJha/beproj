<?php

header('Content-Type: application/json');
session_start();


if ($_POST['field'] == "up")
    up();
else
    previous_test();

function up()
{
    require_once("../database.php");

    $x = array();

    $query = "SELECT * FROM test as t WHERE t.standard='{$_SESSION['standard']}' and t.division='{$_SESSION['division']}' AND t.test_id NOT IN (select s.test_id from student_gives_test as s)";

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
}

function previous_test()
{
    require_once("../database.php");

    $x = array();

    $query = "SELECT * FROM test as t WHERE t.standard='{$_SESSION['standard']}' and t.division='{$_SESSION['division']}' AND t.test_id IN (select s.test_id from student_gives_test as s)";

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
}
