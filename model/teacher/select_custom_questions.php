<?php

header('Content-Type: application/json');

session_start();

require_once '../database.php';

$x = array();

$query = "SELECT *  FROM question AS q
                    WHERE q.standard='{$_SESSION['test']['standard']}'
                    AND q.subject_name='{$_SESSION['test']['subject']}'  
                    AND q.topic_name IN (";

for ($i = 0; $i < sizeof($_SESSION['test']['topics']); $i++) {
    $query.=" '{$_SESSION['test']['topics'][$i]}'";
    if ($i < (sizeof($_SESSION['test']['topics']) - 1)) {
        $query.=",";
    }
}
$query.=" )";

$result = mysqli_query($connection, $query);


if ($result) {
    while ($row = mysqli_fetch_assoc($result)) {

        array_push($x, $row);
    }
    echo json_encode($x);
}
?>
