<?php

session_start();

if (isset($_SESSION['user_id']))
{
    if ($_SESSION['type'] == 0)
    {
        header("Location:http://localhost/beproj/view/student/overview.php");
    }
    
    if ($_SESSION['type'] == 1)
    {
        header("Location:http://localhost/beproj/view/teacher/overview.php");
    }
    if ($_SESSION['type'] == 9)
    {
        header("Location:http://localhost/beproj/view/admin/overview.php");
    }
}
?>