<?php

header('Content-Type: application/json');

session_start();

require_once '../database.php';

$x = array();

$query = "SELECT q.question_id, q.type, q.question_desc
                    FROM question AS q
                    WHERE q.standard='{$_POST['standard']}'
                    AND q.subject_name='{$_POST['subject']}'  
                    AND ";

$result = mysqli_query($connection, $query);

if ($result) {
    while ($row = mysqli_fetch_assoc($result)) {
        array_push($x, $row);
    }
} else {
    $x[]="There are no questions that match your selection!";
}

echo json_encode($x);
?>
