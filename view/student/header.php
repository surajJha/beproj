<?php session_start(); ?>
<div class="navbar navbar-inverse navbar-fixed-top">
    <div class =" container">
        <a href="#" class =" navbar-brand">HexaGraph</a>

        <div class="collapse navbar-collapse">
            <ul class="nav navbar-nav navbar-right">
                <li class="active"><a href="student_overview.php">Home</a></li>
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
