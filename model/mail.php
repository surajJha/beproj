<?php
error_reporting(E_ALL);
ini_set('display_errors', '1');
/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

$to = "skj48817@gmail.com";
$subject = "test";
$body = "Body of your message here you can use HTML too. e.g. <br> <b> Bold </b>";
$headers = "From: skj48817@gmail.com\r\n";
//$headers .= "Reply-To: info@yoursite.com\r\n";
//$headers .= "Return-Path: info@yoursite.com\r\n";
//$headers .= "X-Mailer: PHP5\n";
$headers .= 'MIME-Version: 1.0' . "\n";
$headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
if(mail($to,$subject,$body,$headers)){
    echo" mail sent";
}
else{
    echo 'FAILURE';
}
?> 