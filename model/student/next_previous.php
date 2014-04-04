<?php

require '../database.php';

session_start();


if ($_POST['field'] == "next")
{
    if ($_SESSION['test']['i'] >= sizeof($_SESSION['test']['questions']) - 1)
    {
        $_SESSION['test']['i'] = sizeof($_SESSION['test']['questions']) - 1;
    }
    else
    {
        $_SESSION['test']['i']+=1;
    }
}
else if ($_POST['field'] == "previous")
{
    if ($_SESSION['test']['i'] < 0)
    {
        $_SESSION['test']['i'] = 0;
    }
    else
    {

        $_SESSION['test']['i']-=1;
    }
}echo "url";
?>
