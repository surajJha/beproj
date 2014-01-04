<?php



session_start();


var_dump($_POST);

$s = array();
$c = $_POST['standard'];

$t = $_SESSION['teaches'];

print_r($t);

for ($i = 0; $i < count($t); $i++) {
    if ($t[$i]['standard'] === $c) {
        $s[] = $t[$i]['subject_name'];
    }
}

echo json_encode($s);
?>