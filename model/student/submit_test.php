<?php 

session_start();

for($i=0;$i<sizeof($_POST);$i++)
{
    $_SESSION['test']['questions'][$i]['response']=$_POST[$i];
}

print_r($_SESSION['test']);