<?php 
session_start();

$t=$_SESSION['teaches'];
for($i=0;$i<count($t);$i++)
{
    $s[]=$t[$i]['standard'];
}

echo json_encode($s);
?>