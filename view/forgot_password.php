<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="description" content="">
        <meta name="author" content="">

        <title> HexaGraph   </title>
        <script src="../lib/theme/js/parsley.js"></script>

        <!-- Bootstrap core CSS -->
        <link href="../lib/theme/css/bootstrap.css" rel="stylesheet">

        <!-- Add custom CSS here -->
        <link href="../lib/theme/css/modern-business.css" rel="stylesheet">
        <link href="../lib/theme/font-awesome/css/font-awesome.min.css" rel="stylesheet">
        <link href="../lib/theme/css/mystyle.css" rel="stylesheet">
    </head>
    <body style="background-color: wheat" >

        <!-- PAGE TITLE GOES HERE ************************************ -->
        <div class="container">
            <div class="row">
                <center> 
                    <h1 class="text-center">
                        <EM><b><i>
                                    HexaGraph   
                                </i></b></EM> 
                    </h1>
                </center>
            </div>
            <div class="row">
                <center> <div class="page-header">
                        <h3>Forgot Your Password ?</h3>
                        <h4>
                            Please enter your email id and press submit to proceed
                        </h4>
                        <form parsley-validate method="post" action="../controller/forgot-password-mail.php">
                            <input class="input-lg"  type="email" name="myemail" id="myemail" required data-type="email" parsley-required="change" />&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                            <button style="margin-bottom: 05px" class="btn btn-lg btn-primary" id="submit-buttton" type="submit">Submit</button>
                        </form>
                    </div>
                    <div id="err-message" class="alert-danger">

                    </div>


                </center>  

            </div>
        </div>

        <!-- **************************************************** -->









        <!-- JavaScript -->
        <script src="../lib/theme/js/jquery-1.10.2.js"></script>
        <script src="../lib/theme/js/bootstrap.js"></script>
        <script src="../lib/theme/js/modern-business.js"></script>
       



    </body>


</html>
