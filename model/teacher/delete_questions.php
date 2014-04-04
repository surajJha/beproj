<?php

require_once '../database.php';

$q = $_POST['question_id'];

for ($i = 0; $i < sizeof($q); $i++)
{
    $query = "DELETE FROM `question` WHERE question_id='{$q[$i]}'";

    $result = mysqli_query($connection, $query);
}
