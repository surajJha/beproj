<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="description" content="">
        <meta name="author" content="">

        <title> HexaGraph   </title>

        <!-- Bootstrap core CSS -->
        <link href="../../lib/theme/css/bootstrap.css" rel="stylesheet">
        <link href="../../lib/theme/css/sidebar.css" rel="stylesheet">         
        <script type = "text/javascript" >
            function preventBack() {
                window.history.forward();
            }
            setTimeout("preventBack()", 0);
            window.onunload = function() {
                
              //  window.reload();
            };
        </script>


    </head>

    <body>
        <?php include('header.php'); ?>
        <!-- setting test id in session variables -->
        <?php
        $_SESSION['test_id'] = $_GET['test_id'];
        ?>
        <!-- PAGE TITLE GOES HERE ************************************ -->


        <div class="container">
            <div class="row">
                <?php include('student_sidebar.php'); ?>
            </div>
            <div class="col-lg-10 col-lg-offset-2 main" >  
                <div class="panel panel-primary">
                    <div class="panel-heading">
                        <center>
                            <h2>Instructions</h2>
                        </center>    
                    </div>

                    <div>
                        <div class="row" style="padding:5%; font-size: 15px">
                            </br>
                            1. Your exam will begin once the invigilator enters the code.</br>
                            2. Duration of the exam will be 30 minutes.</br>
                            3. Exam consists of 25 questions. The exam will end once all questions are attempted or when time ends.</br>
                            4. You are not allowed to go back to the previous questions once submitted.</br>
                            5. Do not close the test window during the exam.</br>
                            6. You are not allowed to leave the place while giving exam.</br>
                            7. Incase of any query/ problem, please contact the invigilator.</br>
                            </br>
                            
                            <div style="font-size: 20px">
                                <center>ALL THE BEST !</center>
                            </div>
                        </div>

                    </div>
                </div>


                <div class="row">
                    <center>
                        <form  method="post" id="test_code_form">
                            <input type="hidden" value="<?php echo $_GET['test_id']; ?>">

                            <div  class="col-lg-offset-3 col-lg-3">
                                <input class="form-control"  type="text" name="test_code" id="test_code" required="required" placeholder="Enter Test Code" />
                            </div>

                            <div  class="col-lg-2">
                                <button class="btn btn-group-vertical btn-primary" id="submit_test_code"  type="submit" >Start Test</button>
                            </div>


                        </form>
                    </center>
                </div>

                <div class="row">
                    <div class="alert-warning" id="error_message">

                    </div>
                </div>
            </div>
        </div>

        <!-- **************************************************** -->


        <!-- JavaScript -->
        <script src="../../lib/theme/js/jquery-1.10.2.js"></script>
        <script src="../../lib/theme/js/bootstrap.js"></script>
        <script src="../../lib/theme/js/modern-business.js"></script>
        <script src="../../lib/theme/docs-assets/js/holder.js"></script>
        <script src="../../controller/student/instruction_window.js"></script>

    </body>
</html>
