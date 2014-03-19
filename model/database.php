<?php

$host = "localhost";
$user = "root";
$password = "root";
$database = "beproj";

$connection = mysqli_connect($host, $user, $password, $database);
if(mysqli_connect_errno())
{
    die("DATABASE CONNECTION FAILED". mysqli_connect_error(). "(".mysqli_connect_errno().")"
            );
}
/* else connnection was successful */