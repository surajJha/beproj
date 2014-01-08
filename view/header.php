<?php session_start(); ?>
<div class="navbar navbar-inverse navbar-fixed-top">
    <div class =" container">
        <a href="#" class =" navbar-brand">HexaGraph</a>

        <div class="collapse navbar-collapse">
            <ul class="nav navbar-nav navbar-right">
                <li class="active"><a href="#">Home</a></li>
                <li><a href="#">Blog</a></li>
                <li><a href="#">Social</a></li>
                <li><a href="#">Contact Us</a></li>
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown"><?php echo $_SESSION['fname']; ?> <b class="caret"></b></a>
                    <ul class="dropdown-menu">
                        <li><a href="edit_profile.php">Edit profile</a></li>
                        <li><a href="../controller/logout.php">Logout</a></li>

                    </ul>
                </li>
            </ul>
        </div>
    </div>
</div>
