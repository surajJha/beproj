<?php
header('Content-Type: application/json');
/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
require_once("../model/database.php");
 $query = "SELECT * FROM user limit 20";
$result = mysqli_query($connection, $query);
$row = mysqli_fetch_assoc($result);

while ($row =  mysqli_fetch_assoc($result)){
    //print result
    $returned_data[] = $row;
}
 $final_result = json_encode($returned_data);
// echo $final_result;
 