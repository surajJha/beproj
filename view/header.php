
        <div class="navbar navbar-inverse navbar-fixed-top">
            <div class =" container">
                <a href="#" class =" navbar-brand">HexaGraph</a>
                   <?php 
                   session_start();
                   $name = $_SESSION['fname'];
                   $type = $_SESSION['type'];
                   $url = '';
                   if($type === "0"){
                       $url = "student_edit_profile.php";
                   }
                   else if($type === "1"){
                      $url = "teacher_edit_profile.php"; 
                   }
                    else if($type === "2"){
                      $url = "admin_edit_profile.php"; 
                   }
                 
                   
                   ?>
                <div class="collapse navbar-collapse">
                    <ul class="nav navbar-nav navbar-right">
                        <li class="active"><a href="#">Home</a></li>
                        <li><a href="#">Blog</a></li>
                        <li><a href="#">Social</a></li>
                        <li><a href="#">Contact Us</a></li>
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown"><?php echo $name ?> <b class="caret"></b></a>
                            <ul class="dropdown-menu">
                                <li><a href="<?php echo $url?>">Edit profile</a></li>
                                <li><a href="../controller/logout.php">Logout</a></li>
                           
                            </ul>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
 