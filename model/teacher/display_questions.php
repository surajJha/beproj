<?php

header('Content-Type: application/json');
require_once("../database.php");

$x = array();

$query = "SELECT q.question_id,q.level,q.type,q.question_desc
                    FROM question AS q
                    WHERE q.standard='{$_POST['vq_standard']}'
                    AND q.subject_name='{$_POST['vq_subject']}' ";

if (!$_POST['vq_topic'] === "*") {

    $query.="AND q.topic_name='{$_POST['vq_topic']} '";
}
if (!$_POST['vq_type'] === "*") {
    $query.="AND q.type='{$_POST['vq_type']} '";
}
if (!$_POST['vq_level'] === "*") {
    $query.="AND q.level='{$_POST['vq_level']} '";
}


$result = mysqli_query($connection, $query);

if ($result) {
    while ($row = mysqli_fetch_assoc($result)) {
        array_push($x, $row);
    }
} else {
    echo mysqli_error($connection);
}

echo json_encode($x);
?>