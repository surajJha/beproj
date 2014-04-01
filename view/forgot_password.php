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
    </head>

    <body>

        <!-- PAGE TITLE GOES HERE ************************************ -->
        <div class="container">
            <div class="navbar navbar-inverse navbar-fixed-top">
                <div class =" container">
                    <a href="../index.php" class =" navbar-brand">HexaGraph</a>
                </div>
            </div>


            <div class="row">
                <div class="col-lg-offset-2 col-lg-8" style="padding-top: 10%">


                    <div class="row">
                        <h2>Forgot Your Password?</h2>
                    </div>
                    <hr/>

                    <div class="row">
                        <p>
                            It seems you have forgotten your username or password. Please enter your email-id and a mail will be sent to you with your username and password. You may reset your password by editing your profile. 
                        </p>

                        <div class="row">
                            <form method="post" id="password-form">
                                <div class="col-lg-offset-3 col-lg-5">
                                    <center>
                                        <input class="form-control" type="email" name="myemail" id="myemail" required required /><br/>
                                        <button style="margin-bottom: 05px" class="btn btn-lg btn-primary" id="submit-buttton" type="submit">Submit</button>
                                    </center>

                                </div>

                                <div class="col-lg-5">

                                </div>
                            </form>
                        </div>
                    </div>

                    <br>
                    <div id="response" class="alert-success">

                    </div>
                    <div id="response2" class="alert-warning">

                    </div>        

                </div>
            </div>
        </div>

        <!-- **************************************************** -->

        <!-- JavaScript -->
        <script src="../lib/theme/js/jquery-1.10.2.js"></script>
        <script src="../lib/theme/js/bootstrap.js"></script>
        <script src="../lib/theme/js/modern-business.js"></script>
        <script src="../controller/forgot-password-mail.js"></script>

