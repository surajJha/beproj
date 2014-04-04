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
        <link rel="stylesheet" type="text/css" href="../../lib/theme/css/jquery.countdown.css">
        <link href="../../lib/theme/font-awesome/css/font-awesome.min.css" rel="stylesheet">

        <!--*********************************SCRIPTS******************************************-->
        <script src="../../lib/theme/js/jquery-1.10.2.js"></script>
        <script src="../../lib/theme/js/jquery.cookies.2.2.0.min.js"></script>
        <script  src="../../lib/theme/js/jquery.cookie.js"></script>
        <!-- Countdown Timer-->

        <script type="text/javascript" src="../../lib/theme/js/jquery.plugin.js"></script> 
        <script src="../../lib/theme/js/jquery.countdown.js"></script>
        <script type = "text/javascript" >
            
            function preventBack() {
                window.history.forward();
            }
            setTimeout("preventBack()", 0);
            window.onunload = function() {
            };
        </script>
    </head>





    <body>
        <?php session_start();?>
        <div class="navbar navbar-inverse navbar-fixed-top">
            <div class =" container">
                <a href="#" class =" navbar-brand">HexaGraph</a>
            </div>
        </div>

        <div class="container">  

            <div class="row">
                </br></br>
                <div class=" col-lg-7" id="display_questions" >
                </div>



                <div class ="col-lg-offset-1 col-lg-4">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <div class="row">
                                <div style="font-size:16px; padding: 5%">
                                    <?php
                                    echo "<b>Test id : </b>" . $_SESSION['test']['test_id'] . "<br>";
                                    echo "<b>Number of questions : </b>" . sizeof($_SESSION['test']['questions']) . "<br>";
                                    echo "<b>Subject : </b>" . $_SESSION['test']['subject_name'] . "<br>";
                                    echo "<b>Date : </b>" . $_SESSION['test']['date'];
                                    ?>
                                </div>
                            </div>
                        </div>

                        <div class="panel-body">



                            <div class="row">
                                <div class="col-lg-8 col-lg-offset-2">
                                    <div class="panel panel-info">
                                        <div class="panel-heading">
                                            <div id="clock"></div>
                                        </div>
                                    </div>
                                </div>


                                <!--call to countdown-->
                                <script type="text/javascript">
    $("#display_questions").load("display_question.php");                                
    
    //countdown timer
                                    
<?php
if (!isset($_SESSION['test']['time_left']))
{
    $_SESSION['test']['time_left'] = $_SESSION['test']['duration'] * 60;
}
?>

                                    $("#clock").countdown({until: (<?php echo ($_SESSION['test']['time_left'] - 1) + "s"; ?>),
                                        onExpiry: function() {

                                            var values = $("#test_questions").serialize();
                                            $.ajax(
                                                    {
                                                        type: 'POST',
                                                        url: '../../model/student/submit_test.php',
                                                        cache: false,
                                                        data: values,
                                                        success: function(data)
                                                        {
                                                            window.location = "http://localhost/beproj/view/student/test_result.php";
                                                        }
                                                    });
                                        }
                                    });
                                    //store time of countdown timer
                                    setInterval(function() {

                                        //alert(time);
                                        $.ajax(
                                                {
                                                    type: 'POST',
                                                    url: '../../model/student/save_time.php',
                                                    cache: false,
                                                    success: function(data)
                                                    {
                                                        console.log("time stored to database");
                                                    }
                                                });

                                    }, 60000);

                                    setInterval(function() {
<?php
$_SESSION['test']['time_left'] = $_SESSION['test']['time_left'] - 1;
?>
                                    }, 1000);

                                </script>
                            </div>

                            <div class="row" style="padding: 5%">
                                <center>
                                    </br>
                                    <button style="margin-bottom: 05px" class="btn btn-lg btn-warning" id="submit_test"  type="submit" >Submit Test</button>
                                </center>
                            </div>

                        </div>

                    </div>

                </div>

            </div>
        </div>



        <!-- JavaScript -->

        <script src="../../lib/theme/js/bootstrap.js"></script>
        <script src="../../lib/theme/js/modern-business.js"></script>
        <script type="text/javascript" src="../../controller/student/test_window.js"></script>

    </body>
</html>
