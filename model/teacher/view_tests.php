<?php

header('Content-Type: application/json');
session_start();
require_once("../database.php");

$x = array();

$query = "SELECT * FROM test as t WHERE t.user_id='{$_SESSION['user_id']}'";

$result = mysqli_query($connection, $query);
//session_start();
if ($result) {
    while ($row = mysqli_fetch_assoc($result)) {
        array_push($x, $row);
    }
}

echo json_encode($x);
?>
