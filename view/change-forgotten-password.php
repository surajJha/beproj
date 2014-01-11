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
                        <h3>Enter your User-id and new Password here</h3>

                        <form parsley-validate method="post" id="change-password-form">
                            User_id : <br><input class="input-lg" type="text" name="user_id" id="user_id" required placeholder="User ID" /><br>
                            Password : <br><input class="input-lg"  type="password" name="mypassword" id="mypassword" placeholder="Enter new password" required data-type="password" parsley-required="change" /><br>
                            Re-Enter new password -<br>
                            <input class="input-lg"  type="password" name="re-password" id="re-password"  placeholder="Re-enter new password" required parsley-equalto="#mypassword" />
                            <div id="err-message">

                            </div>
                            <button style="margin-bottom: 05px" class="btn btn-lg btn-primary" id="change-password-buttton" type="submit">Submit</button>
                        </form>
                        <br>
                        <div id="result">
                            
                        </div>
                    </div>



                </center>  

            </div>
        </div>

        <!-- **************************************************** -->









        <!-- JavaScript -->
        <script src="../lib/theme/js/jquery-1.10.2.js"></script>
        <script src="../lib/theme/js/bootstrap.js"></script>
        <script src="../lib/theme/js/modern-business.js"></script>
        <script src="../controller/change-forgotten-password.js"></script>



       
