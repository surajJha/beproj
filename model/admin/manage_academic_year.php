<?php

header('Content-Type: application/json');
if ($_POST['field'] == "display")
{
    display();
}
else 
{
    insert();
}

function display()
{   require_once '../database.php';
    $query = "SELECT * FROM `academic_year`";
        $result = mysqli_query($connection, $query);

    if ($result)
    {
        $x = array();

        while ($row = mysqli_fetch_assoc($result))
        {
            array_push($x, $row);
        }
        echo json_encode($x);
    }
    else
    {
        echo json_encode("");
    }
}

function insert()
{
    require_once '../database.php';
    $acad_start = $_POST['acad_start'];
    $acad_end = $_POST['acad_end'];

   // $query = "TRUNCATE TABLE academic_year";
    //$result = mysqli_query($connection, $query);
    $query = "INSERT into academic_year (`acad_start`, `acad_end`) values ('{$acad_start}','{$acad_end}')";
    if (mysqli_query($connection, $query))
    {

        echo 'Academic year updated succesfully!';
    }
    else
    {

        echo "THE ERROR IS" . mysqli_error($connection);
    }
}

?>