<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="description" content="">
        <meta name="author" content="">

        <title> HexaGraph   </title>

        <!-- Bootstrap core CSS -->
        <link href="../lib/theme/css/bootstrap.css" rel="stylesheet">

        <!-- Add custom CSS here -->
        <link href="../lib/theme/css/modern-business.css" rel="stylesheet">
        <link href="../lib/theme/font-awesome/css/font-awesome.min.css" rel="stylesheet">
        <link href="../lib/theme/css/mystyle.css" rel="stylesheet">

    <body >

        <!-- PAGE TITLE GOES HERE ************************************ -->
        <div class="container">
            <div class="row clearfix">
                <div class="col-md-10 column">
                    <h1 class="text-center">
                        <EM><b><i>
                                    HexaGraph   
                                </i></b></EM> 
                    </h1>
                </div>
            </div>
        </div>

        <!-- **************************************************** -->





        <!-- ************LOGIN FORM *******************  -->
        <style type="text/css">
            body{padding-top:20px;}
        </style>
        <div id="fullscreen_bg" class="fullscreen_bg"/>

        <div class="container">

            <form class="form-signin" method="post" action = "../controller/login.php">
                <h1 class="form-signin-heading text-muted"><b>HexaGraph</b>   </h1>
                <input type="text" class="form-control" placeholder="Username" name="username" required="" autofocus="">
                <hr>
                <input type="password" class="form-control" placeholder="Password" name="password" required=""><hr>
                <button class="btn btn-lg btn-primary btn-block" type="submit">
                    Sign In
                </button>
            </form>

        </div>
        <!-- ****************************************************** -->



        <?php include("footer.php"); ?>
        
        
        <!-- JavaScript -->
        <script src="../lib/theme/js/jquery-1.10.2.js"></script>
        <script src="../lib/theme/js/bootstrap.js"></script>
        <script src="../lib/theme/js/modern-business.js"></script>

    </body>


</html>
