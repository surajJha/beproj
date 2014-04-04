<?php

header('Content-Type: application/json');
session_start();

require_once '../database.php';
$query = " DELETE FROM `test` WHERE `test_id`='{$_GET['test_id']}'";

$result = mysqli_query($connection, $query);
if ($result)
{
    echo json_encode("deleted");
}
