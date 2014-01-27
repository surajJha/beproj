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

        <!-- Add custom CSS here -->
        <link href="../../lib/theme/css/modern-business.css" rel="stylesheet">
        <link href="../../lib/theme/font-awesome/css/font-awesome.min.css" rel="stylesheet">

    </head>

    <body style="background-color:#cccccc" >
        <!-- setting test id in session variables -->
        <?php
        session_start();
        $_SESSION['test_id'] = $_GET['test_id'];
        ?>
        <!-- PAGE TITLE GOES HERE ************************************ -->
        <div class="container">
            <div class="row">
                <center> 
                    <h1 class="page-header">
                        <EM><b><i>
                                    HexaGraph   
                                </i></b></EM> 
                    </h1>
                </center>
            </div>
            <div class="row">
                <center> <div>
                        <h2>Instructions</h2>
                        <center><br/>

                            <hr/>

                            <pre>
     1. Your exam will begin once the invigilator enters the code.
     2. Duration of the exam will be 30 minutes.
     3. Exam consists of 25 questions. The exam will end once all questions are attempted or when time ends.
     4. You are not allowed to go back to the previous questions once submitted.
     5. Do not close the test window during the exam.
     6. You are not allowed to leave the place while giving exam.
     7. Incase of any query/ problem, please contact the invigilator.

----------------------------------------------------------------------------
                                     ALL THE BEST
----------------------------------------------------------------------------
           
                            </pre>
                        </center>
                        <form  method="post" id="test_code_form">
                            <input type="hidden" value="<?php echo $_GET['test_id']; ?>">

                            <input class="input-lg"  type="text" min =" 5" max = "5" name="test_code" id="test_code" required="required" placeholder="Enter Test Code" style="margin-left: 75px" />&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                            <button style="margin-bottom: 05px" class="btn btn-lg btn-primary" id="submit_test_code"  type="submit" >Start Test</button>
                        </form>
                    </div><br>


                </center>  

            </div>
        </div>

        <!-- **************************************************** -->


        <!-- JavaScript -->
        <script src="../../lib/theme/js/jquery-1.10.2.js"></script>
        <script src="../../lib/theme/js/bootstrap.js"></script>
        <script src="../../lib/theme/js/modern-business.js"></script>

        <script src="../../controller/student/instruction_window.js"></script>

    </body>
</html>