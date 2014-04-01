<?php include('check.php'); ?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="description" content="">
        <meta name="author" content="">

        <title> HexaGraph   </title>

        <!-- Bootstrap core CSS -->
        <link href="lib/theme/css/bootstrap.css" rel="stylesheet">

        <!-- Add custom CSS here -->
        <link href="lib/theme/css/modern-business.css" rel="stylesheet">
        <link href="lib/theme/font-awesome/css/font-awesome.min.css" rel="stylesheet">
        <link href="lib/theme/css/mystyle.css" rel="stylesheet"> 
    </head>
    <body>

        <!-- ************LOGIN FORM *******************  -->

        <div id="fullscreen_bg" class="fullscreen_bg" >

            <div class="container">

                <form id="login_form" class="form-signin" method="post" >

                    <h1 class="form-signin-heading text-muted"><b>HexaGraph</b></h1>

                    <input type="text" class="form-control" placeholder="Username" name="username" id="username" required="" autofocus="">
                    <input type="password" class="form-control" placeholder="Password" name="password" id="password" required="">

                    <br/>

                    <button id="login_sub" class="btn btn-lg btn-primary btn-block" type="submit">
                        Sign In
                    </button>

                    <div id="forgot" style="text-align: center; font-weight: bold ; color:white">

                    </div>

                </form>

            </div>
        </div>
        <!-- ****************************************************** -->

        <!-- JavaScript -->
        <script src="lib/theme/js/jquery-1.10.2.js"></script>
        <script src="lib/theme/js/bootstrap.js"></script>
        <script src="lib/theme/js/modern-business.js"></script>
        <script src="controller/login.js"></script>
    </body>


</html>
