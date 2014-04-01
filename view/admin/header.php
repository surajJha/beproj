<?php session_start();

if (!isset($_SESSION['user_id']))
{
    header("Location:http://localhost/beproj/index.php");
} else
{
    if (!($_SESSION['type'] == 9))
    {
        header("Location:http://localhost/beproj/view/unauthorized_access.php");
    }
}

?>
<div class="navbar navbar-inverse navbar-fixed-top">
    <div class =" container">
        <a href="admin_overview.php" class =" navbar-brand">HexaGraph</a>

        <div class="collapse navbar-collapse">
            <ul class="nav navbar-nav navbar-right">
                <li class="active"><a href="admin_overview.php">Home</a></li>
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown"><?php echo $_SESSION['fname']; ?> <b class="caret"></b></a>
                    <ul class="dropdown-menu">
                        <li><a href="edit_profile.php">Edit profile</a></li>
                        <li><a href="../../model/logout.php">Logout</a></li>

                    </ul>
                </li>
            </ul>
        </div>
    </div>
</div>
