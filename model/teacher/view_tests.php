<?php

header('Content-Type: application/json');
session_start();

$f = $_GET['f'];
if ($f == "up")
    up();
else
    previous_test();

function up()
{
    require_once("../database.php");

    $x = array();
    $d = date("Y-m-d");

    $query = "SELECT * FROM test as t,academic_year as a WHERE t.user_id='{$_SESSION['user_id']}' and t.date >= a.acad_start and t.date < a.acad_end and a.flag_current=1 and t.date >= '{$d}'";

    $result = mysqli_query($connection, $query);

    if ($result)
    {
        while ($row = mysqli_fetch_assoc($result))
        {
            array_push($x, $row);
        }
        echo json_encode($x);
    } else
    {
        $x = "error";
        echo json_encode($x);
    }
}

function previous_test()
{
    require_once("../database.php");

    $x = array();
    $d = date("Y-m-d");

    $query = "SELECT * FROM test as t,academic_year as a WHERE t.user_id='{$_SESSION['user_id']}' and t.date >= a.acad_start and t.date < a.acad_end and a.flag_current=1 and t.date < '{$d}'";

    $result = mysqli_query($connection, $query);

    if ($result)
    {
        while ($row = mysqli_fetch_assoc($result))
        {
            array_push($x, $row);
        }
        echo json_encode($x);
    } else
    {
        $x = "error";
        echo json_encode($x);
    }
}

?>
